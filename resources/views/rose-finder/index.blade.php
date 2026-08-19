@extends('layouts.app')

@section('title', 'Rose Finder')

@section('content')

<style>
/* =========================================================
   HARKNESS ROSE FINDER
   ========================================================= */

@import url('https://fonts.googleapis.com/css2?family=Forum&family=Raleway:wght@300;400;500;600;700&display=swap');

.rose-finder-page {
    --rf-ink: #474747;
    --rf-muted: #504e4e;
    --rf-charcoal: #474747;
    --rf-charcoal-dark: #2e2e2e;
    --rf-cream: #f2eadd;
    --rf-sage: #dee5ca;
    --rf-blush: #f4dce0;
    --rf-page: #efeeea;
    --rf-line: #ddd8d0;
    --rf-white: #fff;
    --rf-max: 1400px;

    width: 100%;
    max-width: var(--rf-max);
    margin: 0 auto;
    padding: 0 24px 90px;

    color: var(--rf-ink);
    font-family: "Raleway", sans-serif;
}

.rose-finder-page *,
.rose-finder-page *::before,
.rose-finder-page *::after {
    box-sizing: border-box;
}

.rose-finder-page a {
    color: inherit;
    text-decoration: none;
}

.rose-finder-page button,
.rose-finder-page input,
.rose-finder-page select {
    font: inherit;
}

.rose-finder-page button {
    cursor: pointer;
}

.rose-finder-page img {
    max-width: 100%;
}

.rose-finder-page .visually-hidden {
    position: absolute !important;
    width: 1px !important;
    height: 1px !important;
    padding: 0 !important;
    margin: -1px !important;
    overflow: hidden !important;
    clip: rect(0, 0, 0, 0) !important;
    white-space: nowrap !important;
    border: 0 !important;
}


/* =========================================================
   HERO
   ========================================================= */

.rose-finder-page .rose-finder-hero {
    position: relative;
    overflow: hidden;

    margin: 0 -24px;
    padding: 68px 24px 64px;

    background:
        linear-gradient(
            115deg,
            #f2eadd 0%,
            #f4eee3 55%,
            #ebe8dc 100%
        );
}

.rose-finder-page .rose-finder-hero-content {
    position: relative;
    z-index: 2;

    width: min(100%, var(--rf-max));
    margin: 0 auto;
}

.rose-finder-page .finder-eyebrow {
    display: block;

    margin-bottom: 14px;

    color: var(--rf-charcoal);

    font-size: 11px;
    font-weight: 700;
    letter-spacing: .18em;
    line-height: 1.2;

    text-transform: uppercase;
}

.rose-finder-page .rose-finder-hero h1 {
    max-width: 850px;

    margin: 0;

    color: var(--rf-muted);

    font-family: "Forum", serif;
    font-size: clamp(48px, 6vw, 78px);
    font-weight: 400;
    letter-spacing: -.015em;
    line-height: .95;
}

.rose-finder-page .rose-finder-hero p {
    max-width: 700px;

    margin: 24px 0 0;

    color: var(--rf-ink);

    font-size: 16px;
    line-height: 1.75;
}

.rose-finder-page .finder-hero-meta {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    gap: 15px;

    margin-top: 27px;

    color: var(--rf-muted);

    font-size: 13px;
}

.rose-finder-page .finder-hero-meta strong {
    color: var(--rf-charcoal);

    font-size: 18px;
    font-weight: 700;
}

.rose-finder-page .finder-hero-meta a {
    font-weight: 600;

    text-decoration: underline;
    text-decoration-thickness: 1px;
    text-underline-offset: 4px;
}

.rose-finder-page .finder-hero-meta a:hover {
    opacity: .7;
}

.rose-finder-page .meta-divider {
    width: 1px;
    height: 20px;

    background: rgba(71, 71, 71, .25);
}


/* =========================================================
   HERO DECORATION
   ========================================================= */

.rose-finder-page .rose-finder-hero-decoration {
    position: absolute;
    inset: 0;

    pointer-events: none;
}

.rose-finder-page .hero-circle {
    position: absolute;

    border: 1px solid rgba(71, 71, 71, .09);
    border-radius: 50%;
}

.rose-finder-page .hero-circle-one {
    width: 520px;
    height: 520px;

    top: -330px;
    right: -80px;
}

.rose-finder-page .hero-circle-two {
    width: 380px;
    height: 380px;

    right: 190px;
    bottom: -300px;
}

.rose-finder-page .hero-leaf {
    position: absolute;

    color: rgba(71, 71, 71, .08);

    font-family: "Forum", serif;
    line-height: 1;
}

.rose-finder-page .hero-leaf-one {
    top: 45px;
    right: 12%;

    font-size: 125px;
}

.rose-finder-page .hero-leaf-two {
    right: 25%;
    bottom: -75px;

    font-size: 180px;
}


/* =========================================================
   TOP BAR
   ========================================================= */

.rose-finder-page .finder-topbar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 25px;

    padding: 27px 0 21px;

    border-bottom: 1px solid var(--rf-line);
}

.rose-finder-page .finder-heading {
    display: flex;
    align-items: center;
    gap: 13px;
}

.rose-finder-page .finder-step {
    display: inline-flex;
    align-items: center;
    justify-content: center;

    flex: 0 0 auto;

    width: 32px;
    height: 32px;

    border: 1px solid var(--rf-charcoal);
    border-radius: 50%;

    color: var(--rf-charcoal);

    font-size: 9px;
    font-weight: 700;
}

.rose-finder-page .finder-label {
    display: block;

    color: var(--rf-muted);

    font-size: 10px;
    font-weight: 700;
    letter-spacing: .12em;
    line-height: 1.2;

    text-transform: uppercase;
}

.rose-finder-page .finder-heading h2 {
    margin: 5px 0 0;

    color: var(--rf-muted);

    font-family: "Forum", serif;
    font-size: 29px;
    font-weight: 400;
    line-height: 1.05;
}

.rose-finder-page .finder-toolbar-actions {
    display: flex;
    align-items: center;
    gap: 16px;
}

.rose-finder-page .clear-filters {
    color: var(--rf-charcoal);

    font-size: 11px;
    font-weight: 700;
    letter-spacing: .06em;

    text-transform: uppercase;
}

.rose-finder-page .clear-filters:hover {
    text-decoration: underline;
}


/* =========================================================
   FILTER BUTTON
   ========================================================= */

.rose-finder-page .filter-trigger {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 10px;

    min-height: 42px;

    padding: 0 17px;

    border: 1px solid var(--rf-charcoal);

    background: var(--rf-charcoal);
    color: #fff;

    font-size: 10px;
    font-weight: 700;
    letter-spacing: .08em;

    text-transform: uppercase;

    transition:
        background .2s ease,
        color .2s ease;
}

.rose-finder-page .filter-trigger:hover {
    background: var(--rf-charcoal-dark);
}

.rose-finder-page .filter-trigger:focus-visible {
    outline: 2px solid var(--rf-charcoal);
    outline-offset: 3px;
}

.rose-finder-page .filter-trigger-icon {
    font-size: 16px;
    line-height: 1;
}


/* =========================================================
   ACTIVE FILTERS
   ========================================================= */

.rose-finder-page .active-filters {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    gap: 11px;

    padding: 16px 0 0;
}

.rose-finder-page .active-filters-label {
    color: var(--rf-muted);

    font-size: 10px;
    font-weight: 700;
    letter-spacing: .08em;

    text-transform: uppercase;
}

.rose-finder-page .active-chips {
    display: flex;
    flex-wrap: wrap;
    gap: 7px;

    margin: 0;
    padding: 0;

    list-style: none;
}

.rose-finder-page .active-chips li {
    margin: 0;
}

.rose-finder-page .active-chips a {
    display: inline-flex;
    align-items: center;
    gap: 8px;

    padding: 7px 9px 7px 11px;

    border: 1px solid #e7cbd0;

    background: var(--rf-blush);

    color: var(--rf-charcoal);

    font-size: 11px;
    font-weight: 600;

    transition:
        background .2s ease,
        border-color .2s ease;
}

.rose-finder-page .active-chips a:hover {
    border-color: #dcb9bf;
    background: #f0d3d8;
}

.rose-finder-page .chip-remove {
    display: inline-flex;
    align-items: center;
    justify-content: center;

    width: 17px;
    height: 17px;

    border-radius: 50%;

    background: rgba(71, 71, 71, .1);

    font-size: 13px;
}


/* =========================================================
   RESULTS
   ========================================================= */

.rose-finder-page .plant-finder-layout {
    display: block;

    width: 100%;

    margin-top: 32px;
}

.rose-finder-page .plant-finder-results {
    width: 100%;
    min-width: 0;
}

.rose-finder-page .results-header {
    display: flex;
    align-items: flex-end;
    justify-content: space-between;
    gap: 20px;

    margin-bottom: 24px;
}

.rose-finder-page .results-header h2 {
    margin: 5px 0 0;

    color: var(--rf-muted);

    font-family: "Forum", serif;
    font-size: 35px;
    font-weight: 400;
    line-height: 1;
}

.rose-finder-page .results-header p {
    margin: 0;

    color: var(--rf-muted);

    font-size: 12px;
}


/* =========================================================
   RESULTS GRID
   ========================================================= */

.rose-finder-page .results-grid {
    display: grid;

    grid-template-columns:
        repeat(3, minmax(0, 1fr));

    gap: 38px 22px;

    width: 100%;
}

.rose-finder-page .rose-card {
    min-width: 0;

    background: var(--rf-white);
}

.rose-finder-page .rose-image-wrap {
    position: relative;

    display: block;

    overflow: hidden;

    width: 100%;

    aspect-ratio: 1 / 1;

    background: var(--rf-page);
}

.rose-finder-page .rose-image-wrap img {
    display: block;

    width: 100%;
    height: 100%;

    object-fit: cover;

    transition: transform .45s ease;
}

.rose-finder-page .rose-image-wrap:hover img {
    transform: scale(1.045);
}

.rose-finder-page .rose-card-badge {
    position: absolute;
    z-index: 2;

    top: 12px;
    left: 12px;

    padding: 7px 9px;

    background: rgba(255,255,255,.93);

    color: var(--rf-charcoal);

    font-size: 9px;
    font-weight: 700;
    letter-spacing: .08em;
    line-height: 1;

    text-transform: uppercase;
}

.rose-finder-page .rose-image-arrow {
    position: absolute;
    z-index: 2;

    right: 12px;
    bottom: 12px;

    display: flex;
    align-items: center;
    justify-content: center;

    width: 40px;
    height: 40px;

    background: var(--rf-charcoal);
    color: #fff;

    font-size: 17px;

    opacity: 0;

    transform: translateY(5px);

    transition:
        opacity .2s ease,
        transform .2s ease;
}

.rose-finder-page .rose-image-wrap:hover .rose-image-arrow,
.rose-finder-page .rose-image-wrap:focus-visible .rose-image-arrow {
    opacity: 1;
    transform: translateY(0);
}

.rose-finder-page .rose-image-wrap:focus-visible {
    outline: 2px solid var(--rf-charcoal);
    outline-offset: 3px;
}

.rose-finder-page .rose-card-body {
    padding: 16px 2px 0;
}

.rose-finder-page .rose-card-type {
    display: block;

    margin-bottom: 7px;

    color: var(--rf-muted);

    font-size: 10px;
    font-weight: 700;
    letter-spacing: .13em;

    text-transform: uppercase;
}

.rose-finder-page .rose-card-body h3 {
    margin: 0;

    color: var(--rf-muted);

    font-family: "Forum", serif;
    font-size: 29px;
    font-weight: 400;
    line-height: 1.05;
}

.rose-finder-page .rose-card-body p {
    display: -webkit-box;

    overflow: hidden;

    margin: 10px 0 0;

    color: var(--rf-ink);

    font-size: 13px;
    line-height: 1.65;

    -webkit-box-orient: vertical;
    -webkit-line-clamp: 3;
}

.rose-finder-page .rose-card-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 12px;

    margin-top: 16px;
    padding-top: 13px;

    border-top: 1px solid var(--rf-line);
}

.rose-finder-page .rose-price {
    color: var(--rf-charcoal);

    font-size: 13px;
    font-weight: 700;
}

.rose-finder-page .view-rose {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;

    padding: 10px 13px;

    background: var(--rf-charcoal);
    color: #fff;

    font-size: 10px;
    font-weight: 700;
    letter-spacing: .07em;
    line-height: 1;

    text-transform: uppercase;

    transition: background .2s ease;
}

.rose-finder-page .view-rose:hover {
    background: var(--rf-charcoal-dark);
}

.rose-finder-page .view-rose:focus-visible {
    outline: 2px solid var(--rf-charcoal);
    outline-offset: 3px;
}


/* =========================================================
   DRAWER OVERLAY
   ========================================================= */

.rose-finder-page .finder-drawer-overlay {
    position: fixed;
    z-index: 9998;

    inset: 0;

    background: rgba(35, 35, 35, .42);

    opacity: 0;
    visibility: hidden;

    transition:
        opacity .3s ease,
        visibility .3s ease;
}

.rose-finder-page.drawer-open .finder-drawer-overlay {
    opacity: 1;
    visibility: visible;
}


/* =========================================================
   DRAWER
   ========================================================= */

.rose-finder-page .finder-drawer {
    position: fixed;
    z-index: 9999;

    top: 0;
    right: 0;
    bottom: 0;

    display: flex;
    flex-direction: column;

    width: min(560px, 92vw);

    background: #fff;

    box-shadow: -15px 0 45px rgba(0, 0, 0, .12);

    transform: translateX(105%);

    transition: transform .35s cubic-bezier(.22, .61, .36, 1);
}

.rose-finder-page.drawer-open .finder-drawer {
    transform: translateX(0);
}


/* =========================================================
   DRAWER HEADER
   ========================================================= */

.rose-finder-page .finder-drawer-header {
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
    gap: 20px;

    flex: 0 0 auto;

    padding: 27px 28px 22px;

    border-bottom: 1px solid var(--rf-line);

    background: var(--rf-cream);
}

.rose-finder-page .finder-drawer-header h2 {
    margin: 5px 0 0;

    color: var(--rf-muted);

    font-family: "Forum", serif;
    font-size: 34px;
    font-weight: 400;
    line-height: 1;
}

.rose-finder-page .finder-drawer-close {
    position: relative;

    flex: 0 0 auto;

    width: 42px;
    height: 42px;

    padding: 0;

    border: 1px solid var(--rf-charcoal);

    background: transparent;
}

.rose-finder-page .finder-drawer-close:hover {
    background: rgba(71, 71, 71, .06);
}

.rose-finder-page .finder-drawer-close:focus-visible {
    outline: 2px solid var(--rf-charcoal);
    outline-offset: 3px;
}

.rose-finder-page .finder-drawer-close span {
    position: absolute;

    top: 50%;
    left: 50%;

    width: 17px;
    height: 1px;

    background: var(--rf-charcoal);
}

.rose-finder-page .finder-drawer-close span:first-child {
    transform: translate(-50%, -50%) rotate(45deg);
}

.rose-finder-page .finder-drawer-close span:last-child {
    transform: translate(-50%, -50%) rotate(-45deg);
}


/* =========================================================
   DRAWER BODY
   ========================================================= */

.rose-finder-page .finder-drawer-body {
    flex: 1 1 auto;

    overflow-y: auto;

    padding: 25px 28px 35px;

    overscroll-behavior: contain;
}

.rose-finder-page .finder-form {
    width: 100%;
}


/* =========================================================
   DRAWER SECTIONS
   ========================================================= */

.rose-finder-page .drawer-filter-section {
    margin-bottom: 28px;
}

.rose-finder-page .drawer-section-heading {
    display: flex;
    align-items: center;
    gap: 11px;

    margin-bottom: 17px;
}

.rose-finder-page .drawer-section-heading .finder-step {
    width: 29px;
    height: 29px;

    font-size: 8px;
}

.rose-finder-page .drawer-section-heading h3 {
    margin: 4px 0 0;

    color: var(--rf-muted);

    font-family: "Forum", serif;
    font-size: 26px;
    font-weight: 400;
    line-height: 1;
}

.rose-finder-page .drawer-description {
    margin: -4px 0 25px;

    color: var(--rf-ink);

    font-size: 13px;
    line-height: 1.65;
}


/* =========================================================
   DRAWER SELECTS
   ========================================================= */

.rose-finder-page .drawer-select-section {
    padding-bottom: 25px;

    border-bottom: 1px solid var(--rf-line);
}

.rose-finder-page .filter-select {
    position: relative;

    display: flex;
    align-items: center;

    min-height: 72px;

    margin: 0 0 11px;
    padding: 10px 42px 10px 12px;

    border: 1px solid var(--rf-line);

    background: var(--rf-white);

    cursor: pointer;

    transition:
        border-color .2s ease,
        box-shadow .2s ease;
}

.rose-finder-page .filter-select:last-child {
    margin-bottom: 0;
}

.rose-finder-page .filter-select:hover {
    border-color: var(--rf-charcoal);

    box-shadow: 0 5px 18px rgba(0, 0, 0, .04);
}

.rose-finder-page .filter-select:focus-within {
    outline: 2px solid var(--rf-charcoal);
    outline-offset: 2px;
}

.rose-finder-page .filter-icon,
.rose-finder-page .colour-swatch {
    display: flex;
    align-items: center;
    justify-content: center;

    flex: 0 0 43px;

    width: 43px;
    height: 43px;

    margin-right: 12px;

    border-radius: 50%;

    background: var(--rf-sage);
}

.rose-finder-page .filter-icon img {
    display: block;

    width: 27px;
    height: 27px;

    object-fit: contain;
}

.rose-finder-page .colour-swatch-all {
    border: 4px solid #faf9f4;

    background:
        conic-gradient(
            #a83d4d 0 25%,
            #e2a248 25% 50%,
            #f1d6d6 50% 75%,
            #756d8a 75% 100%
        );

    box-shadow: 0 0 0 1px var(--rf-line);
}

.rose-finder-page .filter-select-copy {
    display: flex;
    flex-direction: column;
    gap: 4px;

    min-width: 0;
}

.rose-finder-page .filter-select-copy small {
    color: var(--rf-muted);

    font-size: 9px;
    font-weight: 700;
    letter-spacing: .09em;
    line-height: 1;

    text-transform: uppercase;
}

.rose-finder-page .filter-select-copy strong {
    overflow: hidden;

    color: var(--rf-ink);

    font-family: "Forum", serif;
    font-size: 18px;
    font-weight: 400;
    line-height: 1.1;

    text-overflow: ellipsis;
    white-space: nowrap;
}

.rose-finder-page .filter-select select {
    position: absolute;

    inset: 0;

    width: 100%;
    height: 100%;

    margin: 0;
    padding: 0;

    opacity: 0;

    cursor: pointer;
}

.rose-finder-page .select-chevron {
    position: absolute;

    right: 14px;
    top: 50%;

    color: var(--rf-charcoal);

    font-size: 17px;

    transform: translateY(-50%);
}


/* =========================================================
   CHARACTERISTIC GROUPS
   ========================================================= */

.rose-finder-page .characteristic-group {
    display: block;

    min-width: 0;

    margin: 0 0 27px;
    padding: 0 0 27px;

    border: 0;
    border-bottom: 1px solid var(--rf-line);
}

.rose-finder-page .characteristic-group:last-child {
    margin-bottom: 0;
}

.rose-finder-page .characteristic-group legend {
    display: flex;
    align-items: center;
    justify-content: space-between;

    width: 100%;

    margin: 0 0 12px;
    padding: 0;

    color: var(--rf-muted);

    font-size: 10px;
    font-weight: 700;
    letter-spacing: .1em;

    text-transform: uppercase;
}

.rose-finder-page .characteristic-group legend small {
    color: var(--rf-muted);

    font-size: 9px;
    font-weight: 500;
    letter-spacing: .05em;

    text-transform: uppercase;
}

.rose-finder-page .characteristic-grid {
    display: grid;

    grid-template-columns:
        repeat(3, minmax(0, 1fr));

    gap: 8px;

    width: 100%;
}

.rose-finder-page .characteristic {
    position: relative;

    display: flex;

    flex-direction: column;
    align-items: center;
    justify-content: center;

    min-width: 0;
    min-height: 112px;

    margin: 0;
    padding: 9px 7px;

    border: 1px solid var(--rf-line);

    background: var(--rf-white);
    color: var(--rf-ink);

    text-align: center;

    cursor: pointer;

    font-size: 11px;
    font-weight: 500;
    line-height: 1.3;

    transition:
        border-color .2s ease,
        background .2s ease,
        transform .2s ease,
        box-shadow .2s ease;
}

.rose-finder-page .characteristic:hover {
    border-color: var(--rf-charcoal);

    transform: translateY(-1px);

    box-shadow: 0 5px 15px rgba(0, 0, 0, .05);
}

.rose-finder-page .characteristic:focus-within {
    outline: 2px solid var(--rf-charcoal);
    outline-offset: 2px;
}

.rose-finder-page .characteristic input {
    position: absolute;

    inset: 0;

    width: 100%;
    height: 100%;

    margin: 0;

    opacity: 0;

    cursor: pointer;
}

.rose-finder-page .characteristic-icon {
    display: flex;
    align-items: center;
    justify-content: center;

    width: 58px;
    height: 58px;

    margin-bottom: 7px;
}

.rose-finder-page .characteristic-icon img {
    display: block;

    width: 54px;
    height: 54px;

    object-fit: contain;
}

.rose-finder-page .characteristic-name {
    display: block;

    max-width: 100%;

    color: var(--rf-ink);

    font-size: 11px;
    font-weight: 600;
    line-height: 1.3;
}

.rose-finder-page .characteristic-check {
    position: absolute;

    top: 7px;
    right: 7px;

    display: flex;
    align-items: center;
    justify-content: center;

    width: 19px;
    height: 19px;

    background: var(--rf-charcoal);
    color: #fff;

    font-size: 10px;
    font-weight: 700;

    opacity: 0;

    transform: scale(.8);

    transition:
        opacity .15s ease,
        transform .15s ease;
}

.rose-finder-page .characteristic.is-selected {
    border: 2px solid var(--rf-charcoal);

    background: var(--rf-cream);

    padding: 8px 6px;
}

.rose-finder-page .characteristic.is-selected .characteristic-check {
    opacity: 1;

    transform: scale(1);
}


/* =========================================================
   DRAWER FOOTER
   ========================================================= */

.rose-finder-page .finder-drawer-footer {
    display: flex;
    align-items: center;
    gap: 12px;

    flex: 0 0 auto;

    padding: 17px 28px;

    border-top: 1px solid var(--rf-line);

    background: #fff;

    box-shadow: 0 -5px 20px rgba(0, 0, 0, .04);
}

.rose-finder-page .drawer-result-summary {
    display: flex;
    flex-direction: column;

    margin-right: auto;
}

.rose-finder-page .drawer-result-summary strong {
    color: var(--rf-charcoal);

    font-family: "Forum", serif;
    font-size: 24px;
    font-weight: 400;
    line-height: 1;
}

.rose-finder-page .drawer-result-summary span {
    margin-top: 3px;

    color: var(--rf-muted);

    font-size: 9px;
    font-weight: 700;
    letter-spacing: .07em;

    text-transform: uppercase;
}

.rose-finder-page .drawer-clear {
    padding: 10px 4px;

    color: var(--rf-charcoal);

    font-size: 10px;
    font-weight: 700;
    letter-spacing: .06em;

    text-transform: uppercase;
}

.rose-finder-page .drawer-clear:hover {
    text-decoration: underline;
}

.rose-finder-page .drawer-done {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 10px;

    min-height: 43px;

    padding: 0 17px;

    border: 0;

    background: var(--rf-charcoal);
    color: #fff;

    font-size: 10px;
    font-weight: 700;
    letter-spacing: .07em;

    text-transform: uppercase;
}

.rose-finder-page .drawer-done:hover {
    background: var(--rf-charcoal-dark);
}

.rose-finder-page .drawer-done:focus-visible {
    outline: 2px solid var(--rf-charcoal);
    outline-offset: 3px;
}


/* =========================================================
   EMPTY RESULTS
   ========================================================= */

.rose-finder-page .empty-results {
    max-width: 680px;

    margin: 30px auto;
    padding: 65px 30px;

    border: 1px solid var(--rf-line);

    background: var(--rf-page);

    text-align: center;
}

.rose-finder-page .empty-results-icon {
    margin-bottom: 14px;

    color: var(--rf-charcoal);

    font-family: "Forum", serif;
    font-size: 48px;
    line-height: 1;
}

.rose-finder-page .empty-results h2 {
    margin: 9px 0 12px;

    color: var(--rf-muted);

    font-family: "Forum", serif;
    font-size: 38px;
    font-weight: 400;
    line-height: 1;
}

.rose-finder-page .empty-results p {
    max-width: 500px;

    margin: 0 auto;

    color: var(--rf-ink);

    font-size: 13px;
    line-height: 1.7;
}

.rose-finder-page .primary-button {
    display: inline-flex;
    align-items: center;
    gap: 12px;

    margin-top: 22px;
    padding: 13px 18px;

    background: var(--rf-charcoal);
    color: #fff;

    font-size: 10px;
    font-weight: 700;
    letter-spacing: .07em;

    text-transform: uppercase;
}

.rose-finder-page .primary-button:hover {
    background: var(--rf-charcoal-dark);
}


/* =========================================================
   PAGINATION
   ========================================================= */

.rose-finder-page .finder-pagination {
    display: flex;
    justify-content: center;

    width: 100%;

    margin-top: 45px;
}

.rose-finder-page .finder-pagination nav {
    display: flex;
    align-items: center;
    justify-content: center;
}

.rose-finder-page .finder-pagination nav > div {
    display: flex;
    align-items: center;
    gap: 4px;
}

.rose-finder-page .finder-pagination a,
.rose-finder-page .finder-pagination span {
    display: inline-flex;
    align-items: center;
    justify-content: center;

    min-width: 38px;
    height: 38px;

    padding: 0 10px;
    margin: 0;

    border: 1px solid transparent;
    border-radius: 0;

    background: transparent;
    color: var(--rf-charcoal);

    font-family: inherit;
    font-size: 11px;
    font-weight: 600;
    line-height: 1;
    text-decoration: none;

    box-sizing: border-box;
}

.rose-finder-page .finder-pagination a {
    cursor: pointer;

    transition:
        background-color .15s ease,
        border-color .15s ease,
        color .15s ease;
}

.rose-finder-page .finder-pagination a:hover {
    border-color: var(--rf-line);
    background: var(--rf-cream);
    color: var(--rf-charcoal);
}

.rose-finder-page .finder-pagination .active span {
    border-color: var(--rf-charcoal);
    background: var(--rf-charcoal);
    color: #fff;
}

.rose-finder-page .finder-pagination .disabled span {
    border-color: transparent;
    background: transparent;
    color: #b5b5b5;
    cursor: default;
    opacity: .65;
}

.rose-finder-page .finder-pagination .ellipsis span,
.rose-finder-page .finder-pagination span[aria-disabled="true"] {
    border-color: transparent;
    background: transparent;
    color: #999;
}

.rose-finder-page .finder-pagination svg {
    width: 16px;
    height: 16px;
}

.rose-finder-page .finder-pagination a svg {
    display: block;
}

.rose-finder-page .finder-pagination ul {
    display: flex;
    align-items: center;
    gap: 4px;

    margin: 0;
    padding: 0;

    list-style: none;
}

.rose-finder-page .finder-pagination li {
    margin: 0;
    padding: 0;
}


/* =========================================================
   RESPONSIVE
   ========================================================= */

@media (max-width: 1100px) {

    .rose-finder-page .results-grid {
        grid-template-columns:
            repeat(2, minmax(0, 1fr));
    }

}


@media (max-width: 700px) {

    .rose-finder-page {
        padding-right: 16px;
        padding-left: 16px;
        padding-bottom: 65px;
    }

    .rose-finder-page .rose-finder-hero {
        margin-right: -16px;
        margin-left: -16px;

        padding: 50px 16px 48px;
    }

    .rose-finder-page .rose-finder-hero h1 {
        font-size: 50px;
    }

    .rose-finder-page .rose-finder-hero p {
        font-size: 14px;
    }

    .rose-finder-page .hero-circle-one {
        width: 300px;
        height: 300px;

        top: -180px;
        right: -130px;
    }

    .rose-finder-page .hero-circle-two,
    .rose-finder-page .hero-leaf {
        display: none;
    }

    .rose-finder-page .finder-topbar {
        align-items: flex-start;
        flex-direction: column;
    }

    .rose-finder-page .finder-toolbar-actions {
        width: 100%;
    }

    .rose-finder-page .filter-trigger {
        width: 100%;
    }

    .rose-finder-page .results-grid {
        grid-template-columns:
            repeat(2, minmax(0, 1fr));

        gap: 30px 14px;
    }

}


@media (max-width: 560px) {

    .rose-finder-page .results-grid {
        grid-template-columns: 1fr;
    }

    .rose-finder-page .results-header {
        align-items: flex-start;
        flex-direction: column;
    }

    .rose-finder-page .finder-drawer {
        width: 100%;
    }

    .rose-finder-page .finder-drawer-header {
        padding: 22px 20px 18px;
    }

    .rose-finder-page .finder-drawer-body {
        padding: 22px 20px 30px;
    }

    .rose-finder-page .finder-drawer-footer {
        padding: 14px 20px;
    }

    .rose-finder-page .characteristic-grid {
        grid-template-columns:
            repeat(2, minmax(0, 1fr));
    }

    .rose-finder-page .drawer-done {
        flex: 0 0 auto;
    }

    .rose-finder-page .drawer-clear {
        display: none;
    }

}


@media (max-width: 390px) {

    .rose-finder-page .rose-finder-hero h1 {
        font-size: 43px;
    }

    .rose-finder-page .finder-drawer-footer {
        gap: 8px;
    }

    .rose-finder-page .drawer-result-summary strong {
        font-size: 20px;
    }

    .rose-finder-page .drawer-done {
        padding: 0 13px;
    }

}


/* =========================================================
   REDUCED MOTION
   ========================================================= */

@media (prefers-reduced-motion: reduce) {

    .rose-finder-page *,
    .rose-finder-page *::before,
    .rose-finder-page *::after {
        scroll-behavior: auto !important;
        transition-duration: .01ms !important;
        animation-duration: .01ms !important;
        animation-iteration-count: 1 !important;
    }

}
</style>


<section
    class="rose-finder-page"
    data-finder
>

    {{-- =====================================================
         HERO
         ===================================================== --}}

    <header class="rose-finder-hero">

        <div class="rose-finder-hero-content">

            <span class="finder-eyebrow">
                Harkness Roses
            </span>

            <h1>
                Find your perfect rose
            </h1>

            <p>
                Discover roses chosen for your garden. Select the qualities
                you're looking for and we'll narrow the collection down for you.
            </p>

            <div class="finder-hero-meta">

                <span>
                    <strong>{{ $roses->total() }}</strong>
                    {{ Str::plural('rose', $roses->total()) }}
                </span>

                @if($hasFilters)

                    <span class="meta-divider"></span>

                    <a href="{{ route('rose-finder') }}">
                        Reset your search
                    </a>

                @endif

            </div>

        </div>


        <div
            class="rose-finder-hero-decoration"
            aria-hidden="true"
        >
            <span class="hero-circle hero-circle-one"></span>
            <span class="hero-circle hero-circle-two"></span>

            <span class="hero-leaf hero-leaf-one">✦</span>
            <span class="hero-leaf hero-leaf-two">❧</span>
        </div>

    </header>


    {{-- =====================================================
         FINDER HEADER
         ===================================================== --}}

    <div class="rose-finder-shell">

        <div class="finder-topbar">

            <div class="finder-heading">

                <span class="finder-step">
                    01
                </span>

                <div>

                    <span class="finder-label">
                        Refine your search
                    </span>

                    <h2>
                        What are you looking for?
                    </h2>

                </div>

            </div>


            <div class="finder-toolbar-actions">

                @if($hasFilters)

                    <a
                        class="clear-filters"
                        href="{{ route('rose-finder') }}"
                    >
                        <span aria-hidden="true">↺</span>
                        Clear all
                    </a>

                @endif


                <button
                    type="button"
                    class="filter-trigger"
                    data-filter-open
                    aria-controls="filter-drawer"
                    aria-expanded="false"
                >

                    <span
                        class="filter-trigger-icon"
                        aria-hidden="true"
                    >
                        ☰
                    </span>

                    <span>
                        Customise
                    </span>

                </button>

            </div>

        </div>


        {{-- =====================================================
             ACTIVE FILTER CHIPS
             ===================================================== --}}

        @if($chips)

            <div class="active-filters">

                <span class="active-filters-label">
                    Your selection
                </span>

                <ul class="active-chips">

                    @foreach($chips as $chip)

                        <li>

                            <a href="{{ $chip['url'] }}">

                                <span>
                                    {{ $chip['label'] }}
                                </span>

                                <span
                                    class="chip-remove"
                                    aria-hidden="true"
                                >
                                    ×
                                </span>

                                <span class="visually-hidden">
                                    Remove {{ $chip['label'] }}
                                </span>

                            </a>

                        </li>

                    @endforeach

                </ul>

            </div>

        @endif


        {{-- =====================================================
             RESULTS
             ===================================================== --}}

        <div class="plant-finder-layout">

            <main class="plant-finder-results">

                <div class="results-header">

                    <div>

                        <span class="finder-label">
                            Your results
                        </span>

                        <h2>
                            {{ $roses->total() }}
                            {{ Str::plural('rose', $roses->total()) }}
                        </h2>

                    </div>


                    @if($roses->total())

                        <p>
                            Showing roses matching your selected criteria
                        </p>

                    @endif

                </div>


                @if($roses->isEmpty())

                    <div class="empty-results">

                        <div
                            class="empty-results-icon"
                            aria-hidden="true"
                        >
                            ♧
                        </div>

                        <span class="finder-label">
                            Nothing quite yet
                        </span>

                        <h2>
                            No roses match those filters
                        </h2>

                        <p>
                            Try removing one of your selections or start again
                            with a broader size or colour.
                        </p>

                        <a
                            class="primary-button"
                            href="{{ route('rose-finder') }}"
                        >
                            <span>
                                Clear all filters
                            </span>

                            <span aria-hidden="true">
                                →
                            </span>
                        </a>

                    </div>

                @else

                    <div class="results-grid">

                        @foreach($roses as $rose)

                            <article class="rose-card">

                                <a
                                    class="rose-image-wrap"
                                    href="{{ $rose->shop_url ?: 'https://www.roses.co.uk/' }}"
                                    aria-label="View {{ $rose->name }}"
                                >

                                    <span class="rose-card-badge">
                                        {{ $rose->type }}
                                    </span>

                                    <img
                                        src="{{ $rose->image_url }}"
                                        alt="{{ $rose->name }}"
                                        loading="lazy"
                                    >

                                    <span
                                        class="rose-image-arrow"
                                        aria-hidden="true"
                                    >
                                        ↗
                                    </span>

                                </a>


                                <div class="rose-card-body">

                                    <span class="rose-card-type">
                                        {{ $rose->type }}
                                    </span>

                                    <h3>
                                        {{ $rose->name }}
                                    </h3>


                                    @if($rose->description)

                                        <p>
                                            {{ $rose->description }}
                                        </p>

                                    @endif


                                    <div class="rose-card-footer">

                                        @if($rose->price)

                                            <span class="rose-price">
                                                {{ Number::currency(
                                                    (float) $rose->price,
                                                    'GBP'
                                                ) }}
                                            </span>

                                        @else

                                            <span></span>

                                        @endif


                                        <a
                                            class="view-rose"
                                            href="{{ $rose->shop_url ?: 'https://www.roses.co.uk/' }}"
                                        >

                                            <span>
                                                View rose
                                            </span>

                                            <span aria-hidden="true">
                                                →
                                            </span>

                                        </a>

                                    </div>

                                </div>

                            </article>

                        @endforeach

                    </div>


                    @if($roses->hasPages())

                        <nav
                            class="finder-pagination"
                            aria-label="Rose finder pages"
                        >
                            {{ $roses->links() }}
                        </nav>

                    @endif

                @endif

            </main>

        </div>

    </div>


    {{-- =====================================================
         DRAWER OVERLAY
         ===================================================== --}}

    <div
        class="finder-drawer-overlay"
        data-filter-overlay
        aria-hidden="true"
    ></div>


    {{-- =====================================================
         FILTER DRAWER
         ===================================================== --}}

    <aside
        id="filter-drawer"
        class="finder-drawer"
        data-filter-drawer
        aria-hidden="true"
        aria-labelledby="filter-drawer-title"
        role="dialog"
        aria-modal="true"
    >

        {{-- Drawer header --}}

        <div class="finder-drawer-header">

            <div>

                <span class="finder-label">
                    Refine your search
                </span>

                <h2 id="filter-drawer-title">
                    Find your rose
                </h2>

            </div>


            <button
                type="button"
                class="finder-drawer-close"
                data-filter-close
                aria-label="Close filters"
            >
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </button>

        </div>


        {{-- Drawer content --}}

        <div class="finder-drawer-body">

            <form
                method="GET"
                action="{{ route('rose-finder') }}"
                data-finder-form
                class="finder-form"
            >

                {{-- =================================================
                     BASIC FILTERS
                     ================================================= --}}

                <div class="drawer-filter-section drawer-select-section">

                    <div class="drawer-section-heading">

                        <span class="finder-step">
                            01
                        </span>

                        <div>

                            <span class="finder-label">
                                Basics
                            </span>

                            <h3>
                                Choose your rose
                            </h3>

                        </div>

                    </div>


                    {{-- SIZE --}}

                    <label class="filter-select size-select">

                        <span class="filter-icon">

                            <img
                                src="{{ asset('images/finder/height.png') }}"
                                alt=""
                                width="28"
                                height="28"
                            >

                        </span>


                        <span class="filter-select-copy">

                            <small>
                                Rose size
                            </small>

                            <strong>

                                @if(!empty($filters['size']))
                                    {{ $sizes[$filters['size']] ?? 'Choose a size' }}
                                @else
                                    Choose a size
                                @endif

                            </strong>

                        </span>


                        <select
                            name="size"
                            aria-label="Choose a rose size"
                        >

                            <option value="">
                                Any size
                            </option>

                            @foreach($sizes as $value => $label)

                                <option
                                    value="{{ $value }}"
                                    @selected(($filters['size'] ?? '') === $value)
                                >
                                    {{ $label }}
                                </option>

                            @endforeach

                        </select>


                        <span
                            class="select-chevron"
                            aria-hidden="true"
                        >
                            ⌄
                        </span>

                    </label>


                    {{-- COLOUR --}}

                    <label class="filter-select colour-select">

                        <span class="colour-swatch colour-swatch-all"></span>


                        <span class="filter-select-copy">

                            <small>
                                Flower colour
                            </small>

                            <strong>

                                @if(!empty($filters['colour']))
                                    {{ $colours[$filters['colour']] ?? 'Choose a colour' }}
                                @else
                                    Choose a colour
                                @endif

                            </strong>

                        </span>


                        <select
                            name="colour"
                            aria-label="Choose a flower colour"
                        >

                            <option value="">
                                Any colour
                            </option>

                            @foreach($colours as $value => $label)

                                <option
                                    value="{{ $value }}"
                                    @selected(($filters['colour'] ?? '') === $value)
                                >
                                    {{ $label }}
                                </option>

                            @endforeach

                        </select>


                        <span
                            class="select-chevron"
                            aria-hidden="true"
                        >
                            ⌄
                        </span>

                    </label>

                </div>


                {{-- =================================================
                     CHARACTERISTICS INTRO
                     ================================================= --}}

                <div class="drawer-filter-section">

                    <div class="drawer-section-heading">

                        <span class="finder-step">
                            02
                        </span>

                        <div>

                            <span class="finder-label">
                                Personalise
                            </span>

                            <h3>
                                Select characteristics
                            </h3>

                        </div>

                    </div>


                    <p class="drawer-description">
                        Choose as many qualities as you'd like.
                        We'll find roses that match your garden.
                    </p>

                </div>


                {{-- =================================================
                     CHARACTERISTIC GROUPS
                     ================================================= --}}

                @foreach($groups as $group)

                    <fieldset class="characteristic-group">

                        <legend>

                            <span>
                                {{ $group['title'] }}
                            </span>

                            <small>
                                Select any
                            </small>

                        </legend>


                        <div class="characteristic-grid">

                            @foreach($group['options'] as $option)

                                @php

                                    $selectedValues =
                                        $filters[$group['key']] ?? [];

                                    $isSelected = in_array(
                                        $option['value'],
                                        $selectedValues,
                                        true
                                    );

                                @endphp


                                <label
                                    class="characteristic {{ $isSelected ? 'is-selected' : '' }}"
                                >

                                    <input
                                        type="checkbox"
                                        name="{{ $group['key'] }}[]"
                                        value="{{ $option['value'] }}"
                                        @checked($isSelected)
                                        aria-label="{{ $option['label'] }}"
                                    >


                                    <span class="characteristic-icon">

                                        <img
                                            src="{{ asset('images/finder/'.$option['icon']) }}"
                                            alt=""
                                            width="56"
                                            height="56"
                                            loading="lazy"
                                        >

                                    </span>


                                    <span class="characteristic-name">
                                        {{ $option['label'] }}
                                    </span>


                                    <span
                                        class="characteristic-check"
                                        aria-hidden="true"
                                    >
                                        ✓
                                    </span>

                                </label>

                            @endforeach

                        </div>

                    </fieldset>

                @endforeach

            </form>

        </div>


        {{-- =====================================================
             DRAWER FOOTER
             ===================================================== --}}

        <div class="finder-drawer-footer">

            <div class="drawer-result-summary">

                <strong>
                    {{ $roses->total() }}
                </strong>

                <span>
                    {{ Str::plural('rose', $roses->total()) }} found
                </span>

            </div>


            @if($hasFilters)

                <a
                    href="{{ route('rose-finder') }}"
                    class="drawer-clear"
                >
                    Clear all
                </a>

            @endif


            <button
                type="button"
                class="drawer-done"
                data-filter-close
            >

                <span>
                    View results
                </span>

                <span aria-hidden="true">
                    →
                </span>

            </button>

        </div>

    </aside>

</section>


<script>
document.addEventListener('DOMContentLoaded', function () {

    const finder = document.querySelector('[data-finder]');

    if (!finder) {
        return;
    }


    const drawer =
        finder.querySelector('[data-filter-drawer]');

    const overlay =
        finder.querySelector('[data-filter-overlay]');

    const openButton =
        finder.querySelector('[data-filter-open]');

    const closeButtons =
        finder.querySelectorAll('[data-filter-close]');

    const form =
        finder.querySelector('[data-finder-form]');


    let lastFocusedElement = null;


    /* =========================================================
       DRAWER
       ========================================================= */

    function openDrawer() {

        if (!drawer) {
            return;
        }

        lastFocusedElement =
            document.activeElement;

        finder.classList.add('drawer-open');

        drawer.setAttribute(
            'aria-hidden',
            'false'
        );

        if (overlay) {

            overlay.setAttribute(
                'aria-hidden',
                'false'
            );

        }

        if (openButton) {

            openButton.setAttribute(
                'aria-expanded',
                'true'
            );

        }

        document.body.style.overflow = 'hidden';


        requestAnimationFrame(function () {

            const closeButton =
                drawer.querySelector(
                    '[data-filter-close]'
                );

            if (closeButton) {
                closeButton.focus();
            }

        });

    }


    function closeDrawer(
        restoreFocus = true
    ) {

        if (!drawer) {
            return;
        }

        finder.classList.remove('drawer-open');

        drawer.setAttribute(
            'aria-hidden',
            'true'
        );

        if (overlay) {

            overlay.setAttribute(
                'aria-hidden',
                'true'
            );

        }

        if (openButton) {

            openButton.setAttribute(
                'aria-expanded',
                'false'
            );

        }

        document.body.style.overflow = '';


        if (
            restoreFocus &&
            lastFocusedElement &&
            typeof lastFocusedElement.focus === 'function'
        ) {

            lastFocusedElement.focus();

        }

    }


    if (openButton) {

        openButton.addEventListener(
            'click',
            openDrawer
        );

    }


    closeButtons.forEach(function (button) {

        button.addEventListener(
            'click',
            function () {
                closeDrawer();
            }
        );

    });


    if (overlay) {

        overlay.addEventListener(
            'click',
            function () {
                closeDrawer();
            }
        );

    }


    /* =========================================================
       ESCAPE KEY
       ========================================================= */

    document.addEventListener(
        'keydown',
        function (event) {

            if (
                event.key === 'Escape' &&
                finder.classList.contains('drawer-open')
            ) {

                event.preventDefault();

                closeDrawer();

            }

        }
    );


    /* =========================================================
       DRAWER FOCUS TRAP
       ========================================================= */

    document.addEventListener(
        'keydown',
        function (event) {

            if (
                event.key !== 'Tab' ||
                !finder.classList.contains('drawer-open') ||
                !drawer
            ) {
                return;
            }


            const focusableElements =
                drawer.querySelectorAll(
                    'button:not([disabled]), ' +
                    'a[href], ' +
                    'input:not([disabled]), ' +
                    'select:not([disabled]), ' +
                    'textarea:not([disabled]), ' +
                    '[tabindex]:not([tabindex="-1"])'
                );


            if (!focusableElements.length) {
                return;
            }


            const firstElement =
                focusableElements[0];

            const lastElement =
                focusableElements[
                    focusableElements.length - 1
                ];


            if (
                event.shiftKey &&
                document.activeElement === firstElement
            ) {

                event.preventDefault();

                lastElement.focus();

            } else if (
                !event.shiftKey &&
                document.activeElement === lastElement
            ) {

                event.preventDefault();

                firstElement.focus();

            }

        }
    );


    /* =========================================================
       FILTER FORM
       ========================================================= */

    if (form) {


        /*
         * Submit selects immediately.
         */

        form.querySelectorAll('select')
            .forEach(function (select) {

                select.addEventListener(
                    'change',
                    function () {

                        updateSelectLabel(
                            select
                        );

                        submitFilters();

                    }
                );

            });


        /*
         * Submit checkbox changes immediately.
         */

        form.querySelectorAll(
            'input[type="checkbox"]'
        ).forEach(function (input) {

            input.addEventListener(
                'change',
                function () {

                    updateCheckboxState(
                        input
                    );

                    submitFilters();

                }
            );

        });

    }


    /* =========================================================
       FILTER SUBMISSION
       ========================================================= */

    let submitting = false;


    function submitFilters() {

        if (!form || submitting) {
            return;
        }

        submitting = true;

        /*
         * Ensure empty checkbox groups don't create
         * unexpected values in the query string.
         */

        form.querySelectorAll(
            'input[type="checkbox"]'
        ).forEach(function (input) {

            if (!input.checked) {
                input.removeAttribute('name');
            }

        });


        /*
         * Use native submit so no other submit handler
         * can interfere.
         */

        HTMLFormElement.prototype.submit.call(form);

    }


    /* =========================================================
       CHECKBOX VISUAL STATE
       ========================================================= */

    function updateCheckboxState(input) {

        const label =
            input.closest('.characteristic');

        if (!label) {
            return;
        }

        if (input.checked) {

            label.classList.add(
                'is-selected'
            );

        } else {

            label.classList.remove(
                'is-selected'
            );

        }

    }


    /* =========================================================
       SELECT LABEL
       ========================================================= */

    function updateSelectLabel(select) {

        if (!select) {
            return;
        }


        const wrapper =
            select.closest('.filter-select');

        if (!wrapper) {
            return;
        }


        const strong =
            wrapper.querySelector(
                '.filter-select-copy strong'
            );

        if (!strong) {
            return;
        }


        const selectedOption =
            select.options[
                select.selectedIndex
            ];


        if (
            selectedOption &&
            selectedOption.value !== ''
        ) {

            strong.textContent =
                selectedOption.textContent.trim();

            return;

        }


        if (
            wrapper.classList.contains(
                'colour-select'
            )
        ) {

            strong.textContent =
                'Choose a colour';

        } else {

            strong.textContent =
                'Choose a size';

        }

    }


    /* =========================================================
       INITIALISE CHECKBOX STATES
       ========================================================= */

    if (form) {

        form.querySelectorAll(
            'input[type="checkbox"]'
        ).forEach(function (input) {

            updateCheckboxState(
                input
            );

        });


        form.querySelectorAll(
            '.filter-select select'
        ).forEach(function (select) {

            updateSelectLabel(
                select
            );

        });

    }


    /* =========================================================
       CLEAN UP BODY SCROLL
       ========================================================= */

    window.addEventListener(
        'pageshow',
        function () {

            document.body.style.overflow = '';

            submitting = false;

        }
    );


    window.addEventListener(
        'beforeunload',
        function () {

            document.body.style.overflow = '';

        }
    );

});
</script>

@endsection