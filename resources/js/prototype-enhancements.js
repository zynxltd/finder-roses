export const PROTOTYPE_FEATURES = [
    { id: 'cro-header', label: 'CRO header (vs classic)', defaultOn: true },
    { id: 'card-hover', label: 'Card hover zoom + chips', defaultOn: false },
    { id: 'count-pulse', label: 'Animated rose count', defaultOn: true },
    { id: 'stagger-grid', label: 'Staggered grid entrance', defaultOn: true },
    { id: 'usp-ticker', label: 'USP rotating ticker', defaultOn: false },
    { id: 'quick-start', label: 'Hero quick-start choices', defaultOn: true },
    { id: 'surprise-me', label: 'Surprise me button', defaultOn: false },
    { id: 'compare-tray', label: 'Compare tray (pin 3)', defaultOn: false },
    { id: 'share-search', label: 'Share this search', defaultOn: false },
    { id: 'colour-empty', label: 'Colour-aware empty state', defaultOn: true },
    { id: 'hero-atmosphere', label: 'Hero atmosphere / parallax', defaultOn: false },
    { id: 'drawer-icons', label: 'Drawer section icons', defaultOn: true },
    { id: 'product-cues', label: 'Inline product cues', defaultOn: false },
    { id: 'match-reasons', label: 'Why this rose?', defaultOn: false },
];

const STORAGE_KEY = 'roseFinderPrototypeFeatures.v8';

const DEFAULTS = Object.fromEntries(
    PROTOTYPE_FEATURES.map((feature) => [feature.id, feature.defaultOn]),
);

function prefersReducedMotion() {
    return window.matchMedia('(prefers-reduced-motion: reduce)').matches;
}

function readFeatures() {
    try {
        const raw = window.localStorage.getItem(STORAGE_KEY);

        if (!raw) {
            return { ...DEFAULTS };
        }

        return { ...DEFAULTS, ...JSON.parse(raw) };
    } catch {
        return { ...DEFAULTS };
    }
}

function writeFeatures(features) {
    window.localStorage.setItem(STORAGE_KEY, JSON.stringify(features));
}

function applyFeatureClasses(features) {
    const root = document.documentElement;

    PROTOTYPE_FEATURES.forEach((feature) => {
        root.setAttribute(
            `data-proto-${feature.id}`,
            features[feature.id] ? 'on' : 'off',
        );
    });
}

function buildPanel(features) {
    const existing = document.querySelector('[data-prototype-panel]');

    if (existing) {
        return existing;
    }

    const root = document.createElement('div');
    root.className = 'prototype-panel';
    root.dataset.prototypePanel = '';
    root.innerHTML = `
        <button type="button" class="prototype-panel-tab" data-prototype-toggle aria-expanded="false" aria-controls="prototype-panel-body">
            <span class="prototype-panel-tab-label">Prototype</span>
        </button>
        <div class="prototype-panel-body" id="prototype-panel-body" hidden>
            <div class="prototype-panel-head">
                <strong>Enhancements</strong>
                <div class="prototype-panel-actions">
                    <button type="button" data-prototype-all="on">All on</button>
                    <button type="button" data-prototype-all="off">All off</button>
                </div>
            </div>
            <ul class="prototype-panel-list">
                ${PROTOTYPE_FEATURES.map((feature) => `
                    <li>
                        <label>
                            <input
                                type="checkbox"
                                data-prototype-feature="${feature.id}"
                                ${features[feature.id] ? 'checked' : ''}
                            >
                            <span>${feature.label}</span>
                        </label>
                    </li>
                `).join('')}
            </ul>
        </div>
    `;

    document.body.appendChild(root);

    return root;
}

function initPanel(features, onChange) {
    const panel = buildPanel(features);
    const tab = panel.querySelector('[data-prototype-toggle]');
    const body = panel.querySelector('.prototype-panel-body');

    const setOpen = (open) => {
        panel.classList.toggle('is-open', open);
        tab?.setAttribute('aria-expanded', String(open));

        if (body) {
            body.hidden = !open;
        }
    };

    tab?.addEventListener('click', () => {
        setOpen(!panel.classList.contains('is-open'));
    });

    panel.addEventListener('mouseenter', () => setOpen(true));
    panel.addEventListener('mouseleave', () => setOpen(false));

    panel.querySelectorAll('[data-prototype-feature]').forEach((input) => {
        input.addEventListener('change', () => {
            features[input.dataset.prototypeFeature] = input.checked;
            writeFeatures(features);
            applyFeatureClasses(features);
            onChange(features);
        });
    });

    panel.querySelectorAll('[data-prototype-all]').forEach((button) => {
        button.addEventListener('click', () => {
            const enable = button.dataset.prototypeAll === 'on';

            PROTOTYPE_FEATURES.forEach((feature) => {
                features[feature.id] = enable;
            });

            panel.querySelectorAll('[data-prototype-feature]').forEach((input) => {
                input.checked = enable;
            });

            writeFeatures(features);
            applyFeatureClasses(features);
            onChange(features);
        });
    });
}

function pulseCount(features) {
    if (!features['count-pulse'] || prefersReducedMotion()) {
        return;
    }

    const targets = document.querySelectorAll('[data-finder-results] .results-header h2');

    targets.forEach((el) => {
        const match = (el.textContent || '').trim().match(/^(\d+)/);

        if (!match) {
            return;
        }

        const next = Number(match[1]);
        const prev = Number(el.dataset.protoCount || next);
        el.dataset.protoCount = String(next);

        if (prev === next) {
            return;
        }

        el.classList.remove('proto-count-pulse');
        void el.offsetWidth;
        el.classList.add('proto-count-pulse');

        const start = prev;
        const end = next;
        const duration = 420;
        const started = performance.now();
        const suffix = (el.textContent || '').replace(/^\d+/, '').trim();

        const tick = (now) => {
            const t = Math.min(1, (now - started) / duration);
            const value = Math.round(start + (end - start) * t);
            el.textContent = value + (suffix ? ' ' + suffix : '');

            if (t < 1) {
                requestAnimationFrame(tick);
            }
        };

        requestAnimationFrame(tick);
    });
}

function restaggerGrid(features) {
    if (!features['stagger-grid'] || prefersReducedMotion()) {
        return;
    }

    document.querySelectorAll('.results-grid .rose-card').forEach((card, index) => {
        card.style.setProperty('--proto-stagger', `${Math.min(index, 12) * 45}ms`);
        card.classList.remove('proto-stagger-in');
        void card.offsetWidth;
        card.classList.add('proto-stagger-in');
    });
}

function initUspTicker(features) {
    const boxes = document.querySelectorAll('.site-nav .usp-box');

    if (!boxes.length) {
        return;
    }

    if (window.__protoUspTimer) {
        window.clearInterval(window.__protoUspTimer);
        window.__protoUspTimer = null;
    }

    boxes.forEach((box) => box.classList.remove('proto-usp-active'));

    if (!features['usp-ticker']) {
        return;
    }

    let index = 0;
    boxes[0]?.classList.add('proto-usp-active');

    if (prefersReducedMotion() || boxes.length < 2) {
        return;
    }

    window.__protoUspTimer = window.setInterval(() => {
        boxes[index]?.classList.remove('proto-usp-active');
        index = (index + 1) % boxes.length;
        boxes[index]?.classList.add('proto-usp-active');
    }, 3200);
}

function initQuickStart(features) {
    const finder = document.querySelector('[data-finder]');
    const bar = finder?.querySelector('[data-proto-quick-start]');

    if (!bar) {
        return;
    }

    bar.hidden = !features['quick-start'];

    if (bar.dataset.protoBound === '1') {
        return;
    }

    bar.dataset.protoBound = '1';

    bar.querySelectorAll('[data-proto-jump]').forEach((button) => {
        button.addEventListener('click', () => {
            const target = button.dataset.protoJump;
            const open = finder.querySelector('[data-filter-open]');

            open?.click();

            window.setTimeout(() => {
                const el = finder.querySelector(`[data-proto-section="${target}"]`);
                el?.scrollIntoView({ behavior: prefersReducedMotion() ? 'auto' : 'smooth', block: 'start' });
            }, 360);
        });
    });
}

function initSurpriseAndShare(features) {
    const actions = document.querySelector('[data-proto-hero-extras]');

    if (!actions) {
        return;
    }

    const surprise = actions.querySelector('[data-proto-surprise]');
    const share = actions.querySelector('[data-proto-share]');

    if (surprise) {
        surprise.hidden = !features['surprise-me'];
    }

    if (share) {
        share.hidden = !features['share-search'];
    }

    actions.hidden = !features['surprise-me'] && !features['share-search'];

    if (actions.dataset.protoBound === '1') {
        return;
    }

    actions.dataset.protoBound = '1';

    surprise?.addEventListener('click', () => {
        const cards = [...document.querySelectorAll('.rose-card a.rose-image-wrap, .rose-card a.view-rose')];
        const hrefs = [...new Set(cards.map((a) => a.href).filter(Boolean))];

        if (!hrefs.length) {
            return;
        }

        window.location.assign(hrefs[Math.floor(Math.random() * hrefs.length)]);
    });

    share?.addEventListener('click', async () => {
        const url = window.location.href;

        try {
            await navigator.clipboard.writeText(url);
            share.dataset.copied = '1';
            share.textContent = 'Link copied';
            window.setTimeout(() => {
                share.dataset.copied = '0';
                share.textContent = 'Share this search';
            }, 1800);
        } catch {
            window.prompt('Copy this search link:', url);
        }
    });
}

function compareKey(card) {
    return card.dataset.compareId || card.querySelector('h3')?.textContent?.trim() || '';
}

function readCompare() {
    try {
        return JSON.parse(window.localStorage.getItem('roseFinderCompare') || '[]');
    } catch {
        return [];
    }
}

function writeCompare(items) {
    window.localStorage.setItem('roseFinderCompare', JSON.stringify(items.slice(0, 3)));
}

function ensureCompareTray() {
    let tray = document.querySelector('[data-proto-compare-tray]');

    if (tray) {
        return tray;
    }

    tray = document.createElement('div');
    tray.className = 'proto-compare-tray';
    tray.dataset.protoCompareTray = '';
    tray.hidden = true;
    tray.innerHTML = `
        <div class="proto-compare-inner">
            <strong>Compare</strong>
            <div class="proto-compare-slots" data-proto-compare-slots></div>
            <button type="button" class="proto-compare-clear" data-proto-compare-clear>Clear</button>
        </div>
    `;
    document.body.appendChild(tray);

    tray.querySelector('[data-proto-compare-clear]')?.addEventListener('click', () => {
        writeCompare([]);
        renderCompareTray(readFeatures());
        syncCompareButtons();
    });

    return tray;
}

function renderCompareTray(features) {
    const tray = ensureCompareTray();
    const slots = tray.querySelector('[data-proto-compare-slots]');
    const items = readCompare();

    if (!features['compare-tray'] || !items.length) {
        tray.hidden = true;
        document.body.classList.remove('proto-compare-open');
        return;
    }

    tray.hidden = false;
    document.body.classList.add('proto-compare-open');

    if (!slots) {
        return;
    }

    slots.innerHTML = items.map((item) => `
        <article class="proto-compare-card">
            <img src="${item.image}" alt="">
            <div>
                <h4>${item.name}</h4>
                <p>${item.meta}</p>
                <a href="${item.url}">View</a>
            </div>
            <button type="button" data-proto-compare-remove="${item.id}" aria-label="Remove">×</button>
        </article>
    `).join('');

    slots.querySelectorAll('[data-proto-compare-remove]').forEach((button) => {
        button.addEventListener('click', () => {
            writeCompare(readCompare().filter((item) => item.id !== button.dataset.protoCompareRemove));
            renderCompareTray(features);
            syncCompareButtons();
        });
    });
}

function syncCompareButtons() {
    const ids = new Set(readCompare().map((item) => item.id));

    document.querySelectorAll('[data-proto-compare]').forEach((button) => {
        const card = button.closest('.rose-card');
        const id = card ? compareKey(card) : '';
        const pressed = ids.has(id);
        button.setAttribute('aria-pressed', String(pressed));
        button.textContent = pressed ? 'Pinned' : 'Compare';
    });
}

function initCompare(features) {
    renderCompareTray(features);

    if (!features['compare-tray']) {
        return;
    }

    document.querySelectorAll('[data-proto-compare]').forEach((button) => {
        if (button.dataset.protoBound === '1') {
            return;
        }

        button.dataset.protoBound = '1';

        button.addEventListener('click', (event) => {
            event.preventDefault();
            event.stopPropagation();

            if (!readFeatures()['compare-tray']) {
                return;
            }

            const card = button.closest('.rose-card');

            if (!card) {
                return;
            }

            const id = compareKey(card);
            const items = readCompare();
            const existing = items.findIndex((item) => item.id === id);

            if (existing >= 0) {
                items.splice(existing, 1);
            } else {
                if (items.length >= 3) {
                    items.shift();
                }

                items.push({
                    id,
                    name: card.querySelector('h3')?.textContent?.trim() || 'Rose',
                    image: card.querySelector('img')?.src || '',
                    url: card.querySelector('a.view-rose, a.rose-image-wrap')?.href || '#',
                    meta: [
                        card.dataset.sizeLabel,
                        card.dataset.fragranceLabel,
                        card.dataset.floweringLabel,
                    ].filter(Boolean).join(' · '),
                });
            }

            writeCompare(items);
            renderCompareTray(readFeatures());
            syncCompareButtons();
        });
    });

    syncCompareButtons();
}

function initHeroAtmosphere(features) {
    const hero = document.querySelector('.rose-finder-hero');

    if (!hero) {
        return;
    }

    if (!features['hero-atmosphere'] || prefersReducedMotion()) {
        hero.onpointermove = null;
        return;
    }

    if (hero.dataset.protoAtmosphereBound === '1') {
        return;
    }

    hero.dataset.protoAtmosphereBound = '1';

    hero.addEventListener('pointermove', (event) => {
        if (!readFeatures()['hero-atmosphere'] || prefersReducedMotion()) {
            return;
        }

        const rect = hero.getBoundingClientRect();
        const x = ((event.clientX - rect.left) / rect.width - 0.5) * 12;
        const y = ((event.clientY - rect.top) / rect.height - 0.5) * 8;
        hero.style.setProperty('--proto-parallax-x', `${x.toFixed(1)}px`);
        hero.style.setProperty('--proto-parallax-y', `${y.toFixed(1)}px`);
    });
}

function initCroHeader(features) {
    const sticky = document.querySelector('[data-cro-sticky]');

    if (!sticky || sticky.dataset.croStickyBound === '1') {
        return;
    }

    sticky.dataset.croStickyBound = '1';

    const onScroll = () => {
        sticky.classList.toggle('is-scrolled', window.scrollY > 8 && !!readFeatures()['cro-header']);
    };

    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();
}

function refreshBehaviors(features) {
    initUspTicker(features);
    initQuickStart(features);
    initSurpriseAndShare(features);
    initCompare(features);
    initHeroAtmosphere(features);
    initCroHeader(features);
    restaggerGrid(features);
    pulseCount(features);
}

export function initPrototypeEnhancements() {
    const features = readFeatures();
    applyFeatureClasses(features);
    initPanel(features, refreshBehaviors);
    refreshBehaviors(features);

    document.addEventListener('rose-finder:updated', () => {
        const next = readFeatures();
        refreshBehaviors(next);
    });
}
