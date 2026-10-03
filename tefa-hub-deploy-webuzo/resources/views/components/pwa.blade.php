<link rel="manifest" href="{{ asset('manifest.webmanifest') }}">
<meta name="theme-color" content="#2563eb">
<script>
    if ('serviceWorker' in navigator) {
        window.addEventListener('load', () => {
            navigator.serviceWorker.register('{{ asset('sw.js') }}', { scope: '/' }).catch(() => {});
        });
    }

</script>
