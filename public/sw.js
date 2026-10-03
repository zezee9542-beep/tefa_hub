const STATIC_CACHE = 'tefa-hub-static-v1';
const PAGE_CACHE = 'tefa-hub-pages-v1';
const OFFLINE_URL = '/offline.html';

const precachedUrls = [
    OFFLINE_URL,
    '/manifest.webmanifest',
    '/assets/logo.webp',
];

const publicPagePaths = new Set(['/', '/bkk', '/pkl', '/ppdb']);

self.addEventListener('install', (event) => {
    event.waitUntil(
        caches.open(STATIC_CACHE)
            .then((cache) => cache.addAll(precachedUrls))
            .then(() => self.skipWaiting()),
    );
});

self.addEventListener('activate', (event) => {
    event.waitUntil(
        caches.keys().then((cacheNames) => Promise.all(
            cacheNames
                .filter((cacheName) => cacheName.startsWith('tefa-hub-') && ![STATIC_CACHE, PAGE_CACHE].includes(cacheName))
                .map((cacheName) => caches.delete(cacheName)),
        )).then(() => self.clients.claim()),
    );
});

self.addEventListener('fetch', (event) => {
    const { request } = event;

    if (request.method !== 'GET') {
        return;
    }

    const url = new URL(request.url);

    if (url.origin !== self.location.origin) {
        return;
    }

    if (request.mode === 'navigate') {
        event.respondWith(networkFirstPage(request, url));

        return;
    }

    if (isStaticAsset(url)) {
        event.respondWith(cacheFirstAsset(request));
    }
});

async function networkFirstPage(request, url) {
    try {
        const response = await fetch(request);

        if (response.ok && publicPagePaths.has(url.pathname)) {
            const cache = await caches.open(PAGE_CACHE);
            await cache.put(request, response.clone());
        }

        return response;
    } catch {
        const cachedResponse = await caches.match(request);

        return cachedResponse ?? caches.match(OFFLINE_URL);
    }
}

async function cacheFirstAsset(request) {
    const cachedResponse = await caches.match(request);

    if (cachedResponse) {
        return cachedResponse;
    }

    const response = await fetch(request);

    if (response.ok) {
        const cache = await caches.open(STATIC_CACHE);
        await cache.put(request, response.clone());
    }

    return response;
}

function isStaticAsset(url) {
    return url.pathname.startsWith('/assets/') || url.pathname.startsWith('/build/');
}
