import './bootstrap';

const layoutStorageKey = 'roseFinderLayout';

function applyFinderLayout(finder, layout) {
    finder.classList.toggle('is-horizontal', layout === 'horizontal');
    finder.classList.toggle('is-sidebar', layout === 'sidebar');
    finder.dataset.layout = layout;

    finder.querySelectorAll('[data-layout]').forEach((button) => {
        button.setAttribute('aria-pressed', String(button.dataset.layout === layout));
    });
}

document.addEventListener('DOMContentLoaded', () => {
    const finder = document.querySelector('[data-finder]');
    const form = document.querySelector('[data-finder-form]');

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

    if (!form) {
        return;
    }

    form.addEventListener('change', () => {
        form.submit();
    });
});
