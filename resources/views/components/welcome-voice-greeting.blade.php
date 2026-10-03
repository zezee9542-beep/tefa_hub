<script>
    (() => {
        const greetingKey = 'tefa-hub-voice-greeting-v1';
        const greetingText = 'Selamat datang di TefaHub. Saya adalah asisten AI TefaHub. Adakah yang bisa saya bantu?';
        const interactionEvents = ['pointerdown', 'keydown', 'touchstart'];
        let greetingStarted = false;
        let greetingRequested = false;

        if (!('speechSynthesis' in window) || sessionStorage.getItem(greetingKey)) {
            return;
        }

        const removeInteractionFallback = () => {
            interactionEvents.forEach((eventName) => {
                document.removeEventListener(eventName, speakGreeting);
            });
        };

        const preferredVoice = () => {
            const voices = window.speechSynthesis.getVoices();
            const indonesianVoices = voices.filter((voice) => voice.lang.toLowerCase().startsWith('id'));

            return indonesianVoices.find((voice) => /female|woman|perempuan|google|microsoft/i.test(voice.name))
                ?? indonesianVoices[0]
                ?? voices.find((voice) => voice.lang.toLowerCase().startsWith('id'));
        };

        function speakGreeting(event) {
            if (greetingStarted || sessionStorage.getItem(greetingKey)) {
                return;
            }

            if (greetingRequested && !event?.isTrusted) {
                return;
            }

            greetingRequested = true;

            const utterance = new SpeechSynthesisUtterance(greetingText);
            const voice = preferredVoice();

            utterance.lang = 'id-ID';
            utterance.rate = 0.92;
            utterance.pitch = 1.12;
            utterance.volume = 0.9;

            if (voice) {
                utterance.voice = voice;
            }

            utterance.onstart = () => {
                greetingStarted = true;
                sessionStorage.setItem(greetingKey, 'played');
                removeInteractionFallback();
            };

            utterance.onerror = () => {
                greetingRequested = false;
            };

            window.speechSynthesis.cancel();
            window.speechSynthesis.speak(utterance);
        }

        interactionEvents.forEach((eventName) => {
            document.addEventListener(eventName, speakGreeting, { passive: true });
        });

        window.addEventListener('load', () => {
            window.setTimeout(speakGreeting, 700);
        }, { once: true });
    })();
</script>
