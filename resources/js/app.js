import './bootstrap';
import { initPrototypeEnhancements } from './prototype-enhancements';

const layoutStorageKey = 'roseFinderLayout';

function applyFinderLayout(finder, layout) {
    finder.classList.toggle('is-horizontal', layout === 'horizontal');
    finder.classList.toggle('is-sidebar', layout === 'sidebar');
    finder.dataset.layout = layout;

    finder.querySelectorAll('[data-layout]').forEach((button) => {
        button.setAttribute('aria-pressed', String(button.dataset.layout === layout));
    });
}

function setBodyOverlayOpen(isOpen) {
    document.body.classList.toggle('mobile-overlay-open', isOpen);
}

document.addEventListener('DOMContentLoaded', () => {
    initPrototypeEnhancements();

    const mobileSearch = document.getElementById('mobile-search-wrapper');
    const openSearch = document.querySelector('.mobile-search-toggle');
    const closeSearch = document.querySelector('.mobile-search-close');

    const mobileMenu = document.getElementById('mobile-menu-drawer');
    const mobileMenuTop = document.getElementById('mobile-menu-top');
    const mobileMenuOverlay = document.getElementById('mobile-menu-overlay');
    const openMenu = document.querySelector('.mobile-menu-toggle');
    const closeMenu = document.querySelector('.mobile-menu-close');
    const mobileMenuPanels = [mobileMenuTop, mobileMenu].filter(Boolean);
    let mobileMenuHideTimer = null;

    function mobileMenuIsOpen() {
        return mobileMenu?.classList.contains('active') === true;
    }

    function openMobileSearch() {
        if (!mobileSearch) {
            return;
        }

        closeMobileMenu();
        mobileSearch.hidden = false;
        setBodyOverlayOpen(true);
        mobileSearch.querySelector('input')?.focus();
    }

    function closeMobileSearch() {
        if (!mobileSearch) {
            return;
        }

        mobileSearch.hidden = true;

        if (!mobileMenuIsOpen()) {
            setBodyOverlayOpen(false);
        }
    }

    function openMobileMenu() {
        if (!mobileMenu) {
            return;
        }

        closeMobileSearch();

        if (mobileMenuHideTimer) {
            window.clearTimeout(mobileMenuHideTimer);
            mobileMenuHideTimer = null;
        }

        mobileMenuPanels.forEach((panel) => {
            panel.hidden = false;
        });

        if (mobileMenuOverlay) {
            mobileMenuOverlay.hidden = false;
        }

        requestAnimationFrame(() => {
            mobileMenuPanels.forEach((panel) => {
                panel.classList.add('active');
            });
        });

        mobileMenu.setAttribute('aria-hidden', 'false');
        setBodyOverlayOpen(true);
    }

    function closeMobileMenu() {
        if (!mobileMenu) {
            return;
        }

        mobileMenuPanels.forEach((panel) => {
            panel.classList.remove('active');
        });

        mobileMenu.setAttribute('aria-hidden', 'true');

        if (mobileMenuHideTimer) {
            window.clearTimeout(mobileMenuHideTimer);
        }

        mobileMenuHideTimer = window.setTimeout(() => {
            mobileMenuHideTimer = null;

            if (mobileMenuIsOpen()) {
                return;
            }

            mobileMenuPanels.forEach((panel) => {
                panel.hidden = true;
            });

            if (mobileMenuOverlay) {
                mobileMenuOverlay.hidden = true;
            }
        }, 500);

        if (mobileSearch?.hidden !== false) {
            setBodyOverlayOpen(false);
        }
    }

    openSearch?.addEventListener('click', openMobileSearch);
    closeSearch?.addEventListener('click', closeMobileSearch);
    openMenu?.addEventListener('click', openMobileMenu);
    closeMenu?.addEventListener('click', closeMobileMenu);
    mobileMenuOverlay?.addEventListener('click', closeMobileMenu);

    document.addEventListener('keydown', (event) => {
        if (event.key !== 'Escape') {
            return;
        }

        if (mobileSearch && !mobileSearch.hidden) {
            closeMobileSearch();
            return;
        }

        if (mobileMenuIsOpen()) {
            closeMobileMenu();
        }
    });

    const finder = document.querySelector('[data-finder]');

    if (finder) {
        const savedLayout = window.localStorage.getItem(layoutStorageKey);
        const layout = savedLayout === 'sidebar' || savedLayout === 'horizontal'
            ? savedLayout
            : (finder.dataset.defaultLayout || 'horizontal');

        applyFinderLayout(finder, layout);

        finder.querySelectorAll('[data-layout]').forEach((button) => {
            button.addEventListener('click', () => {
                const nextLayout = button.dataset.layout;

                applyFinderLayout(finder, nextLayout);
                window.localStorage.setItem(layoutStorageKey, nextLayout);
            });
        });
    }
});
