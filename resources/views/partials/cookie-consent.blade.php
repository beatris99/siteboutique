<div
    id="sitego-cookie-banner"
    class="fixed inset-x-0 bottom-0 z-[100] hidden px-4 pb-4 sm:px-6 sm:pb-6"
>
    <div class="mx-auto max-w-5xl overflow-hidden rounded-[1.5rem] border border-black/10 bg-white shadow-[0_24px_80px_rgba(0,0,0,0.22)]">
        <div class="grid gap-5 p-5 sm:p-6 lg:grid-cols-[1.1fr_0.9fr] lg:items-start">
            <div>
                <p class="text-[11px] font-semibold uppercase tracking-[0.28em] text-[#a67c3a]">
                    Cookies SiteGo
                </p>

                <h2 class="mt-2 text-xl font-semibold tracking-[-0.03em] text-[#171717]">
                    Folosim cookies pentru funcționare, analiză și marketing.
                </h2>

                <p class="mt-3 text-sm leading-7 text-black/60">
                    Cookie-urile necesare ajută site-ul să funcționeze. Cu acordul tău, folosim și Google Analytics,
                    Microsoft Clarity și Meta Pixel pentru statistici și promovare.
                </p>

                <a
                    href="/politica-cookies"
                    class="mt-3 inline-flex text-sm font-semibold text-[#a67c3a] underline-offset-4 hover:underline"
                >
                    Citește politica de cookies
                </a>
            </div>

            <div>
                <div
                    id="sitego-cookie-options"
                    class="hidden rounded-2xl bg-[#f7f4ef] p-4"
                >
                    <label class="flex items-start justify-between gap-4 border-b border-black/10 pb-3">
                        <span>
                            <span class="block text-sm font-semibold text-[#171717]">Necesare</span>
                            <span class="mt-1 block text-xs leading-5 text-black/55">Active mereu. Ajută la funcționarea site-ului.</span>
                        </span>
                        <input type="checkbox" checked disabled class="mt-1">
                    </label>

                    <label class="mt-3 flex items-start justify-between gap-4 border-b border-black/10 pb-3">
                        <span>
                            <span class="block text-sm font-semibold text-[#171717]">Analytics</span>
                            <span class="mt-1 block text-xs leading-5 text-black/55">Google Analytics și Microsoft Clarity.</span>
                        </span>
                        <input id="sitego-cookie-analytics" type="checkbox" class="mt-1">
                    </label>

                    <label class="mt-3 flex items-start justify-between gap-4">
                        <span>
                            <span class="block text-sm font-semibold text-[#171717]">Marketing</span>
                            <span class="mt-1 block text-xs leading-5 text-black/55">Meta Pixel pentru reclame și măsurare campanii.</span>
                        </span>
                        <input id="sitego-cookie-marketing" type="checkbox" class="mt-1">
                    </label>
                </div>

                <div class="mt-4 grid gap-2 sm:grid-cols-2">
                    <button
                        type="button"
                        id="sitego-cookie-accept"
                        class="rounded-full bg-[#171717] px-5 py-3 text-sm font-semibold text-white transition hover:bg-[#a67c3a]"
                    >
                        Accept toate
                    </button>

                    <button
                        type="button"
                        id="sitego-cookie-reject"
                        class="rounded-full border border-black/10 bg-white px-5 py-3 text-sm font-semibold text-[#171717] transition hover:border-black/30"
                    >
                        Refuz opționale
                    </button>

                    <button
                        type="button"
                        id="sitego-cookie-customize"
                        class="rounded-full border border-black/10 bg-white px-5 py-3 text-sm font-semibold text-[#171717] transition hover:border-black/30"
                    >
                        Setări
                    </button>

                    <button
                        type="button"
                        id="sitego-cookie-save"
                        class="hidden rounded-full bg-[#d8c3a5] px-5 py-3 text-sm font-semibold text-[#171717] transition hover:bg-[#c8ad83]"
                    >
                        Salvează setările
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    (function () {
        const STORAGE_KEY = 'sitego_cookie_consent_v1';

        const GA_ID = 'G-20JGBZL604';
        const META_PIXEL_ID = '1721525405849532';
        const CLARITY_ID = 'xbyogs1xur';

        const banner = document.getElementById('sitego-cookie-banner');
        const options = document.getElementById('sitego-cookie-options');
        const analyticsInput = document.getElementById('sitego-cookie-analytics');
        const marketingInput = document.getElementById('sitego-cookie-marketing');

        const acceptButton = document.getElementById('sitego-cookie-accept');
        const rejectButton = document.getElementById('sitego-cookie-reject');
        const customizeButton = document.getElementById('sitego-cookie-customize');
        const saveButton = document.getElementById('sitego-cookie-save');

        let analyticsLoaded = false;
        let marketingLoaded = false;
        let clarityLoaded = false;

        function readConsent() {
            try {
                return JSON.parse(localStorage.getItem(STORAGE_KEY) || 'null');
            } catch (error) {
                return null;
            }
        }

        function writeConsent(consent) {
            localStorage.setItem(STORAGE_KEY, JSON.stringify({
                necessary: true,
                analytics: Boolean(consent.analytics),
                marketing: Boolean(consent.marketing),
                savedAt: new Date().toISOString(),
            }));
        }

        function showBanner() {
            if (!banner) return;
            banner.classList.remove('hidden');
        }

        function hideBanner() {
            if (!banner) return;
            banner.classList.add('hidden');
        }

        function loadScript(src, id, onload) {
            if (id && document.getElementById(id)) {
                if (onload) onload();
                return;
            }

            const script = document.createElement('script');
            script.async = true;
            script.src = src;

            if (id) {
                script.id = id;
            }

            if (onload) {
                script.onload = onload;
            }

            document.head.appendChild(script);
        }

        function loadGoogleAnalytics() {
            if (analyticsLoaded) return;
            analyticsLoaded = true;

            window.dataLayer = window.dataLayer || [];
            window.gtag = window.gtag || function () {
                window.dataLayer.push(arguments);
            };

            loadScript('https://www.googletagmanager.com/gtag/js?id=' + GA_ID, 'sitego-ga4-script', function () {
                window.gtag('js', new Date());
                window.gtag('config', GA_ID, { anonymize_ip: true });
            });
        }

        function loadClarity() {
            if (clarityLoaded) return;
            clarityLoaded = true;

            (function(c,l,a,r,i,t,y) {
                c[a] = c[a] || function() {
                    (c[a].q = c[a].q || []).push(arguments);
                };
                t = l.createElement(r);
                t.async = 1;
                t.id = 'sitego-clarity-script';
                t.src = 'https://www.clarity.ms/tag/' + i;
                y = l.getElementsByTagName(r)[0];
                y.parentNode.insertBefore(t, y);
            })(window, document, 'clarity', 'script', CLARITY_ID);
        }

        function loadMetaPixel() {
            if (marketingLoaded) return;
            marketingLoaded = true;

            !function(f,b,e,v,n,t,s) {
                if (f.fbq) return;
                n = f.fbq = function() {
                    n.callMethod ? n.callMethod.apply(n, arguments) : n.queue.push(arguments);
                };
                if (!f._fbq) f._fbq = n;
                n.push = n;
                n.loaded = true;
                n.version = '2.0';
                n.queue = [];
                t = b.createElement(e);
                t.async = true;
                t.id = 'sitego-meta-pixel-script';
                t.src = v;
                s = b.getElementsByTagName(e)[0];
                s.parentNode.insertBefore(t, s);
            }(window, document, 'script', 'https://connect.facebook.net/en_US/fbevents.js');

            window.fbq('init', META_PIXEL_ID);
            window.fbq('track', 'PageView');
        }

        function eraseCookie(name) {
            const hostname = window.location.hostname;
            const parts = hostname.split('.');
            const rootDomain = parts.length > 1 ? '.' + parts.slice(-2).join('.') : hostname;

            document.cookie = name + '=; Max-Age=0; path=/';
            document.cookie = name + '=; Max-Age=0; path=/; domain=' + hostname;
            document.cookie = name + '=; Max-Age=0; path=/; domain=' + rootDomain;
        }

        function cleanupOptionalCookies() {
            document.cookie.split(';').forEach(function(cookie) {
                const name = cookie.split('=')[0].trim();

                if (
                    name.indexOf('_ga') === 0 ||
                    name === '_gid' ||
                    name === '_gat' ||
                    name === '_fbp' ||
                    name === '_fbc' ||
                    name === '_clck' ||
                    name === '_clsk'
                ) {
                    eraseCookie(name);
                }
            });
        }

        function applyConsent(consent) {
            if (!consent) return;

            if (consent.analytics) {
                loadGoogleAnalytics();
                loadClarity();
            }

            if (consent.marketing) {
                loadMetaPixel();
            }

            if (!consent.analytics && !consent.marketing) {
                cleanupOptionalCookies();
            }
        }

        function saveAndApply(consent) {
            writeConsent(consent);
            applyConsent(consent);
            hideBanner();
        }

        function openSettings() {
            const current = readConsent() || { analytics: false, marketing: false };

            if (analyticsInput) analyticsInput.checked = Boolean(current.analytics);
            if (marketingInput) marketingInput.checked = Boolean(current.marketing);

            if (options) options.classList.remove('hidden');
            if (saveButton) saveButton.classList.remove('hidden');

            showBanner();
        }

        const savedConsent = readConsent();

        if (savedConsent) {
            applyConsent(savedConsent);
        } else {
            showBanner();
        }

        if (acceptButton) {
            acceptButton.addEventListener('click', function () {
                saveAndApply({ analytics: true, marketing: true });
            });
        }

        if (rejectButton) {
            rejectButton.addEventListener('click', function () {
                saveAndApply({ analytics: false, marketing: false });
                cleanupOptionalCookies();
            });
        }

        if (customizeButton) {
            customizeButton.addEventListener('click', openSettings);
        }

        if (saveButton) {
            saveButton.addEventListener('click', function () {
                saveAndApply({
                    analytics: analyticsInput ? analyticsInput.checked : false,
                    marketing: marketingInput ? marketingInput.checked : false,
                });
            });
        }

        document.addEventListener('click', function (event) {
            const trigger = event.target.closest('a[href="#cookie-settings"], [data-cookie-settings]');

            if (!trigger) return;

            event.preventDefault();
            openSettings();
        });

        window.SiteGoCookies = {
            open: openSettings,
            reset: function () {
                localStorage.removeItem(STORAGE_KEY);
                cleanupOptionalCookies();
                window.location.reload();
            }
        };
    })();
</script>
