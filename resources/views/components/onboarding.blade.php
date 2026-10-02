{{-- ═══════════════════════════════════════════
     PREMIUM TEFA-HUB ONBOARDING SPLASH ANIMATION
     ═══════════════════════════════════════════ --}}
<div id="tefaOnboarding" class="onboarding-overlay" role="presentation" aria-hidden="false">
    <div class="onboarding-container">
        {{-- Pure White Circular Logo Wrapper with Soft Light Shadow (No dark overlay) --}}
        <div class="onboarding-logo-circle" id="onboardingLogoCircle">
            <img src="{{ asset('assets/logo.png') }}" alt="Logo Tefa-Hub" class="onboarding-logo-img" id="onboardingLogoImg">
        </div>

        {{-- Expanding Brand Text ("Tefa-Hub") Emerging smoothly from the Logo --}}
        <div class="onboarding-brand-reveal" id="onboardingBrandReveal">
            <div class="onboarding-brand-inner">
                <span class="onboarding-brand-text">Tefa<span>-Hub</span></span>
                <span class="onboarding-brand-tagline">Digital Vocational Ecosystem</span>
            </div>
        </div>
    </div>
</div>

<script>
(function() {
    'use strict';
    const onboardingEl = document.getElementById('tefaOnboarding');
    const logoCircle   = document.getElementById('onboardingLogoCircle');
    const logoImg      = document.getElementById('onboardingLogoImg');
    const brandReveal  = document.getElementById('onboardingBrandReveal');

    if (!onboardingEl) return;

    // Lock body scroll during onboarding sequence
    document.body.classList.add('onboarding-active');

    function runOnboardingSequence() {
        // Step 1: Smooth Pop in of Logo Circle
        setTimeout(function() {
            if (logoCircle) logoCircle.classList.add('is-popped');
        }, 260);

        // Step 2: Smooth 360deg rotation & fluid text expansion
        setTimeout(function() {
            if (logoImg) logoImg.classList.add('is-spinning');
            if (brandReveal) brandReveal.classList.add('is-revealed');
            if (logoCircle) logoCircle.classList.add('is-settled');
        }, 1150);

        // Step 3: Hold complete state then smoothly exit and reveal homepage
        setTimeout(function() {
            onboardingEl.classList.add('is-exiting');
            document.body.classList.remove('onboarding-active');

            // Trigger scroll reveal observer for hero elements
            if (window.dispatchEvent) {
                window.dispatchEvent(new Event('scroll'));
            }

            // Remove from interaction tree after smooth fade-out
            setTimeout(function() {
                onboardingEl.classList.add('is-done');
                onboardingEl.setAttribute('aria-hidden', 'true');
            }, 850);
        }, 3500);
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', runOnboardingSequence);
    } else {
        runOnboardingSequence();
    }
})();
</script>
