@extends('layouts.app')

@section('title', 'Rose Finder')

@section('content')

<style>
/* =========================================================
   HARKNESS ROSE FINDER
   ========================================================= */

@import url('https://fonts.googleapis.com/css2?family=Forum&family=Raleway:wght@300;400;500;600;700&display=swap');

.rose-finder {
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
    max-width: 100%;
    overflow-x: clip;

    color: var(--rf-ink);
    font-family: "Raleway", sans-serif;
}

.rose-finder-page {
    width: 100%;
    max-width: var(--rf-max);
    margin: 0 auto;
    padding: 0 24px 90px;
}

.rose-finder *,
.rose-finder *::before,
.rose-finder *::after {
    box-sizing: border-box;
}

.rose-finder a {
    color: inherit;
    text-decoration: none;
}

.rose-finder button,
.rose-finder input,
.rose-finder select {
    font: inherit;
}

.rose-finder button {
    cursor: pointer;
}

.rose-finder img {
    max-width: 100%;
}

.rose-finder .visually-hidden {
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

.rose-finder .rose-finder-hero {
    position: relative;
    overflow: hidden;

    width: 100%;
    max-width: 100%;
    margin: 0;
    padding: 68px 24px 64px;

    background:
        linear-gradient(
            115deg,
            #f2eadd 0%,
            #f4eee3 55%,
            #ebe8dc 100%
        );
}

.rose-finder .rose-finder-hero-content {
    position: relative;
    z-index: 2;

    width: min(100%, var(--rf-max));
    margin: 0 auto;
}

.rose-finder .rose-finder-hero h1 {
    max-width: 850px;

    margin: 0;

    color: var(--rf-muted);

    font-family: "Forum", serif;
    font-size: clamp(48px, 6vw, 78px);
    font-weight: 400;
    letter-spacing: -.015em;
    line-height: .95;
}

.rose-finder .rose-finder-hero p {
    max-width: 1000px;

    margin: 24px 0 0;

    color: var(--rf-ink);

    font-size: 16px;
    line-height: 1.75;
}

.rose-finder .finder-hero-actions {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    gap: 18px;

    margin-top: 28px;
}

.rose-finder .hero-customise {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 10px;

    min-height: 48px;

    padding: 0 22px;

    border: 1px solid var(--rf-charcoal);

    background: var(--rf-charcoal);
    color: #fff;

    font-size: 11px;
    font-weight: 700;
    letter-spacing: .08em;

    text-transform: uppercase;

    transition:
        background .2s ease,
        transform .2s ease;
}

.rose-finder .hero-customise:hover {
    background: var(--rf-charcoal-dark);
}

.rose-finder .hero-customise:focus-visible {
    outline: 2px solid var(--rf-charcoal);
    outline-offset: 3px;
}

.rose-finder .finder-hero-meta {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    gap: 15px;

    color: var(--rf-muted);

    font-size: 13px;
}

.rose-finder .finder-hero-meta strong {
    color: var(--rf-charcoal);

    font-size: 18px;
    font-weight: 700;
}

.rose-finder .finder-hero-meta a {
    font-weight: 600;

    text-decoration: underline;
    text-decoration-thickness: 1px;
    text-underline-offset: 4px;
}

.rose-finder .finder-hero-meta a:hover {
    opacity: .7;
}

.rose-finder .meta-divider {
    width: 1px;
    height: 20px;

    background: rgba(71, 71, 71, .25);
}


/* =========================================================
   HERO DECORATION
   ========================================================= */

.rose-finder .rose-finder-hero-decoration {
    position: absolute;
    inset: 0;

    pointer-events: none;
}

.rose-finder .hero-circle {
    position: absolute;

    border: 1px solid rgba(71, 71, 71, .09);
    border-radius: 50%;
}

.rose-finder .hero-circle-one {
    width: 520px;
    height: 520px;

    top: -330px;
    right: -80px;
}

.rose-finder .hero-circle-two {
    width: 380px;
    height: 380px;

    right: 190px;
    bottom: -300px;
}

.rose-finder .hero-leaf {
    position: absolute;

    color: rgba(71, 71, 71, .08);

    font-family: "Forum", serif;
    line-height: 1;
}

.rose-finder .hero-leaf-one {
    top: 45px;
    right: 12%;

    font-size: 125px;
}

.rose-finder .hero-leaf-two {
    right: 25%;
    bottom: -75px;

    font-size: 180px;
}


/* =========================================================
   TOP BAR
   ========================================================= */

.rose-finder .finder-topbar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 25px;

    padding: 27px 0 21px;

    border-bottom: 1px solid var(--rf-line);
}

.rose-finder .finder-heading {
    display: flex;
    align-items: center;
    gap: 13px;
}

.rose-finder .finder-step {
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

.rose-finder .finder-label {
    display: block;

    color: var(--rf-muted);

    font-size: 10px;
    font-weight: 700;
    letter-spacing: .12em;
    line-height: 1.2;

    text-transform: uppercase;
}

.rose-finder .finder-heading h2 {
    margin: 5px 0 0;

    color: var(--rf-muted);

    font-family: "Forum", serif;
    font-size: 29px;
    font-weight: 400;
    line-height: 1.05;
}

.rose-finder .finder-toolbar-actions {
    display: flex;
    align-items: center;
    gap: 16px;
}

.rose-finder .clear-filters {
    color: var(--rf-charcoal);

    font-size: 11px;
    font-weight: 700;
    letter-spacing: .06em;

    text-transform: uppercase;
}

.rose-finder .clear-filters:hover {
    text-decoration: underline;
}


/* =========================================================
   FILTER BUTTON
   ========================================================= */

.rose-finder .filter-trigger {
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

.rose-finder .filter-trigger:hover {
    background: var(--rf-charcoal-dark);
}

.rose-finder .filter-trigger:focus-visible {
    outline: 2px solid var(--rf-charcoal);
    outline-offset: 3px;
}

.rose-finder .filter-trigger-icon {
    font-size: 16px;
    line-height: 1;
}


/* =========================================================
   ACTIVE FILTERS
   ========================================================= */

.rose-finder .active-filters {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    gap: 11px;

    padding: 28px 0 0;
}

.rose-finder .active-filters .clear-filters {
    margin-left: auto;
}

.rose-finder .active-filters-label {
    color: var(--rf-muted);

    font-size: 10px;
    font-weight: 700;
    letter-spacing: .08em;

    text-transform: uppercase;
}

.rose-finder .active-chips {
    display: flex;
    flex-wrap: wrap;
    gap: 7px;

    margin: 0;
    padding: 0;

    list-style: none;
}

.rose-finder .active-chips li {
    margin: 0;
}

.rose-finder .active-chips a {
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

.rose-finder .active-chips a:hover {
    border-color: #dcb9bf;
    background: #f0d3d8;
}

.rose-finder .chip-remove {
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

.rose-finder .plant-finder-layout {
    display: block;

    width: 100%;

    margin-top: 28px;
}

.rose-finder .plant-finder-results {
    position: relative;
    width: 100%;
    min-width: 0;
}

.rose-finder .results-header {
    display: flex;
    align-items: flex-end;
    justify-content: space-between;
    gap: 20px;

    margin-bottom: 24px;
}

.rose-finder .results-header h2 {
    margin: 5px 0 0;

    color: var(--rf-muted);

    font-family: "Forum", serif;
    font-size: 35px;
    font-weight: 400;
    line-height: 1;
}

.rose-finder .results-header p {
    margin: 0;

    color: var(--rf-muted);

    font-size: 12px;
}


/* =========================================================
   RESULTS GRID
   ========================================================= */

.rose-finder .results-grid {
    display: grid;

    grid-template-columns:
        repeat(3, minmax(0, 1fr));

    gap: 38px 22px;

    width: 100%;
}

.rose-finder .rose-card {
    min-width: 0;

    background: var(--rf-white);
}

.rose-finder .rose-image-wrap {
    position: relative;

    display: block;

    overflow: hidden;

    width: 100%;

    aspect-ratio: 1 / 1;

    background: var(--rf-page);
}

.rose-finder .rose-image-wrap img {
    display: block;

    width: 100%;
    height: 100%;

    object-fit: cover;

    transition: transform .45s ease;
}

.rose-finder .rose-image-wrap:hover img {
    transform: scale(1.045);
}

.rose-finder .rose-card-badge {
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

.rose-finder .rose-image-arrow {
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

.rose-finder .rose-image-wrap:hover .rose-image-arrow,
.rose-finder .rose-image-wrap:focus-visible .rose-image-arrow {
    opacity: 1;
    transform: translateY(0);
}

.rose-finder .rose-image-wrap:focus-visible {
    outline: 2px solid var(--rf-charcoal);
    outline-offset: 3px;
}

.rose-finder .rose-card-body {
    padding: 16px 2px 0;
}

.rose-finder .rose-card-type {
    display: block;

    margin-bottom: 7px;

    color: var(--rf-muted);

    font-size: 10px;
    font-weight: 700;
    letter-spacing: .13em;

    text-transform: uppercase;
}

.rose-finder .rose-card-body h3 {
    margin: 0;

    color: var(--rf-muted);

    font-family: "Forum", serif;
    font-size: 29px;
    font-weight: 400;
    line-height: 1.05;
}

.rose-finder .rose-card-body p {
    display: -webkit-box;

    overflow: hidden;

    margin: 10px 0 0;

    color: var(--rf-ink);

    font-size: 13px;
    line-height: 1.65;

    -webkit-box-orient: vertical;
    -webkit-line-clamp: 3;
}

.rose-finder .rose-card-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 12px;

    margin-top: 16px;
    padding-top: 13px;

    border-top: 1px solid var(--rf-line);
}

.rose-finder .rose-price {
    color: var(--rf-charcoal);

    font-size: 13px;
    font-weight: 700;
}

.rose-finder .view-rose {
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

.rose-finder .view-rose:hover {
    background: var(--rf-charcoal-dark);
}

.rose-finder .view-rose:focus-visible {
    outline: 2px solid var(--rf-charcoal);
    outline-offset: 3px;
}


.rose-finder.is-loading [data-finder-results] {
    opacity: .55;
    pointer-events: none;
}

.rose-finder.is-loading [data-finder-results]::after {
    content: '';
    position: absolute;
    inset: 0;
    background: rgba(255, 255, 255, .35);
}

.rose-finder .finder-drawer-overlay {
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

.rose-finder.drawer-open .finder-drawer-overlay {
    opacity: 1;
    visibility: visible;
}


/* =========================================================
   DRAWER
   ========================================================= */

.rose-finder .finder-drawer {
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

.rose-finder.drawer-open .finder-drawer {
    transform: translateX(0);
}


/* =========================================================
   DRAWER HEADER
   ========================================================= */

.rose-finder .finder-drawer-header {
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
    gap: 20px;

    flex: 0 0 auto;

    padding: 27px 28px 22px;

    border-bottom: 1px solid var(--rf-line);

    background: var(--rf-cream);
}

.rose-finder .finder-drawer-header h2 {
    margin: 5px 0 0;

    color: var(--rf-muted);

    font-family: "Forum", serif;
    font-size: 34px;
    font-weight: 400;
    line-height: 1;
}

.rose-finder .finder-drawer-close {
    position: relative;

    flex: 0 0 auto;

    width: 42px;
    height: 42px;

    padding: 0;

    border: 1px solid var(--rf-charcoal);

    background: transparent;
}

.rose-finder .finder-drawer-close:hover {
    background: rgba(71, 71, 71, .06);
}

.rose-finder .finder-drawer-close:focus-visible {
    outline: 2px solid var(--rf-charcoal);
    outline-offset: 3px;
}

.rose-finder .finder-drawer-close span {
    position: absolute;

    top: 50%;
    left: 50%;

    width: 17px;
    height: 1px;

    background: var(--rf-charcoal);
}

.rose-finder .finder-drawer-close span:first-child {
    transform: translate(-50%, -50%) rotate(45deg);
}

.rose-finder .finder-drawer-close span:last-child {
    transform: translate(-50%, -50%) rotate(-45deg);
}


/* =========================================================
   DRAWER BODY
   ========================================================= */

.rose-finder .finder-drawer-body {
    flex: 1 1 auto;

    overflow-y: auto;

    padding: 25px 28px 35px;

    overscroll-behavior: contain;
}

.rose-finder .finder-form {
    width: 100%;
}


/* =========================================================
   DRAWER SECTIONS
   ========================================================= */

.rose-finder .drawer-filter-section {
    margin-bottom: 28px;
}

.rose-finder .drawer-section-heading {
    display: flex;
    align-items: center;
    gap: 11px;

    margin-bottom: 17px;
}

.rose-finder .drawer-section-heading .finder-step {
    width: 29px;
    height: 29px;

    font-size: 8px;
}

.rose-finder .drawer-section-heading h3 {
    margin: 4px 0 0;

    color: var(--rf-muted);

    font-family: "Forum", serif;
    font-size: 26px;
    font-weight: 400;
    line-height: 1;
}

.rose-finder .drawer-description {
    margin: -4px 0 25px;

    color: var(--rf-ink);

    font-size: 13px;
    line-height: 1.65;
}


/* =========================================================
   DRAWER SELECTS
   ========================================================= */

.rose-finder .drawer-select-section {
    padding-bottom: 25px;

    border-bottom: 1px solid var(--rf-line);
}

.rose-finder .filter-select {
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

.rose-finder .filter-select:last-child {
    margin-bottom: 0;
}

.rose-finder .filter-select:hover {
    border-color: var(--rf-charcoal);

    box-shadow: 0 5px 18px rgba(0, 0, 0, .04);
}

.rose-finder .filter-select:focus-within {
    outline: 2px solid var(--rf-charcoal);
    outline-offset: 2px;
}

.rose-finder .filter-icon,
.rose-finder .colour-swatch {
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

.rose-finder .filter-icon img {
    display: block;

    width: 27px;
    height: 27px;

    object-fit: contain;
}

.rose-finder .colour-swatch-all {
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

.rose-finder .colour-swatch-image {
    padding: 4px;
    overflow: hidden;
}

.rose-finder .colour-swatch-image img {
    display: block;
    width: 100%;
    height: 100%;
    object-fit: contain;
}

.rose-finder .colour-picker {
    position: relative;
    margin: 0 0 11px;
}

.rose-finder .colour-picker-trigger {
    width: 100%;
    text-align: left;
}

.rose-finder .colour-picker-panel {
    position: absolute;
    z-index: 20;
    top: calc(100% + 6px);
    left: 0;
    right: 0;

    display: none;
    flex-direction: column;
    gap: 2px;

    max-height: min(320px, 50vh);
    overflow-y: auto;

    padding: 8px;

    border: 1px solid var(--rf-line);
    background: #fff;
    box-shadow: 0 12px 30px rgba(0, 0, 0, .1);
}

.rose-finder .colour-picker.is-open .colour-picker-panel {
    display: flex;
}

.rose-finder .colour-picker.is-open .colour-picker-trigger {
    border-color: var(--rf-charcoal);
}

.rose-finder .colour-option {
    display: flex;
    align-items: center;
    gap: 12px;

    width: 100%;
    min-height: 48px;

    margin: 0;
    padding: 8px 10px;

    border: 0;
    background: transparent;
    color: var(--rf-ink);

    font: inherit;
    text-align: left;
    cursor: pointer;
}

.rose-finder .colour-option:hover,
.rose-finder .colour-option:focus-visible {
    background: var(--rf-cream);
    outline: none;
}

.rose-finder .colour-option.is-active {
    background: var(--rf-cream);
    font-weight: 600;
}

.rose-finder .colour-option-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    flex: 0 0 34px;
    width: 34px;
    height: 34px;
    border-radius: 50%;
    overflow: hidden;
    background: var(--rf-page);
}

.rose-finder .colour-option-icon img {
    display: block;
    width: 100%;
    height: 100%;
    object-fit: contain;
}

.rose-finder .colour-option-label {
    font-size: 14px;
    line-height: 1.2;
}

.rose-finder .filter-select-copy {
    display: flex;
    flex-direction: column;
    gap: 4px;

    min-width: 0;
}

.rose-finder .filter-select-copy small {
    color: var(--rf-muted);

    font-size: 9px;
    font-weight: 700;
    letter-spacing: .09em;
    line-height: 1;

    text-transform: uppercase;
}

.rose-finder .filter-select-copy strong {
    overflow: hidden;

    color: var(--rf-ink);

    font-family: "Forum", serif;
    font-size: 18px;
    font-weight: 400;
    line-height: 1.1;

    text-overflow: ellipsis;
    white-space: nowrap;
}

.rose-finder .filter-select select {
    position: absolute;

    inset: 0;

    width: 100%;
    height: 100%;

    margin: 0;
    padding: 0;

    opacity: 0;

    cursor: pointer;
}

.rose-finder .select-chevron {
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

.rose-finder .characteristic-group {
    display: block;

    min-width: 0;

    margin: 0 0 27px;
    padding: 0 0 27px;

    border: 0;
    border-bottom: 1px solid var(--rf-line);
}

.rose-finder .characteristic-group:last-child {
    margin-bottom: 0;
}

.rose-finder .characteristic-group legend {
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

.rose-finder .characteristic-group legend small {
    color: var(--rf-muted);

    font-size: 9px;
    font-weight: 500;
    letter-spacing: .05em;

    text-transform: uppercase;
}

.rose-finder .characteristic-grid {
    display: grid;

    grid-template-columns:
        repeat(3, minmax(0, 1fr));

    gap: 8px;

    width: 100%;
}

.rose-finder .characteristic {
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

.rose-finder .characteristic:hover {
    border-color: var(--rf-charcoal);

    transform: translateY(-1px);

    box-shadow: 0 5px 15px rgba(0, 0, 0, .05);
}

.rose-finder .characteristic:focus-within {
    outline: 2px solid var(--rf-charcoal);
    outline-offset: 2px;
}

.rose-finder .characteristic input {
    position: absolute;

    inset: 0;

    width: 100%;
    height: 100%;

    margin: 0;

    opacity: 0;

    cursor: pointer;
}

.rose-finder .characteristic-icon {
    display: flex;
    align-items: center;
    justify-content: center;

    width: 58px;
    height: 58px;

    margin-bottom: 7px;
}

.rose-finder .characteristic-icon img {
    display: block;

    width: 54px;
    height: 54px;

    object-fit: contain;
}

.rose-finder .characteristic-name {
    display: block;

    max-width: 100%;

    color: var(--rf-ink);

    font-size: 11px;
    font-weight: 600;
    line-height: 1.3;
}

.rose-finder .characteristic-check {
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

.rose-finder .characteristic.is-selected {
    border: 2px solid var(--rf-charcoal);

    background: var(--rf-cream);

    padding: 8px 6px;
}

.rose-finder .characteristic.is-selected .characteristic-check {
    opacity: 1;

    transform: scale(1);
}


/* =========================================================
   DRAWER FOOTER
   ========================================================= */

.rose-finder .finder-drawer-footer {
    display: flex;
    align-items: center;
    gap: 12px;

    flex: 0 0 auto;

    padding: 17px 28px;

    border-top: 1px solid var(--rf-line);

    background: #fff;

    box-shadow: 0 -5px 20px rgba(0, 0, 0, .04);
}

.rose-finder .drawer-result-summary {
    display: flex;
    flex-direction: column;

    margin-right: auto;
}

.rose-finder .drawer-result-summary strong {
    color: var(--rf-charcoal);

    font-family: "Forum", serif;
    font-size: 24px;
    font-weight: 400;
    line-height: 1;
}

.rose-finder .drawer-result-summary span {
    margin-top: 3px;

    color: var(--rf-muted);

    font-size: 9px;
    font-weight: 700;
    letter-spacing: .07em;

    text-transform: uppercase;
}

.rose-finder .drawer-clear {
    padding: 10px 4px;

    color: var(--rf-charcoal);

    font-size: 10px;
    font-weight: 700;
    letter-spacing: .06em;

    text-transform: uppercase;
}

.rose-finder .drawer-clear:hover {
    text-decoration: underline;
}

.rose-finder .drawer-done {
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

.rose-finder .drawer-done:hover {
    background: var(--rf-charcoal-dark);
}

.rose-finder .drawer-done:focus-visible {
    outline: 2px solid var(--rf-charcoal);
    outline-offset: 3px;
}


/* =========================================================
   EMPTY RESULTS
   ========================================================= */

.rose-finder .empty-results {
    max-width: 680px;

    margin: 30px auto;
    padding: 65px 30px;

    border: 1px solid var(--rf-line);

    background: var(--rf-page);

    text-align: center;
}

.rose-finder .empty-results-icon {
    margin-bottom: 14px;

    color: var(--rf-charcoal);

    font-family: "Forum", serif;
    font-size: 48px;
    line-height: 1;
}

.rose-finder .empty-results h2 {
    margin: 9px 0 12px;

    color: var(--rf-muted);

    font-family: "Forum", serif;
    font-size: 38px;
    font-weight: 400;
    line-height: 1;
}

.rose-finder .empty-results p {
    max-width: 500px;

    margin: 0 auto;

    color: var(--rf-ink);

    font-size: 13px;
    line-height: 1.7;
}

.rose-finder .primary-button {
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

.rose-finder .primary-button:hover {
    background: var(--rf-charcoal-dark);
}


/* =========================================================
   PAGINATION
   ========================================================= */

.rose-finder .finder-pagination {
    display: flex;
    justify-content: center;

    width: 100%;

    margin-top: 45px;
}

.rose-finder .finder-pagination nav {
    display: block;
}

.rose-finder .finder-page-list {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-wrap: wrap;
    gap: 6px;

    margin: 0;
    padding: 0;

    list-style: none;
}

.rose-finder .finder-page-list li {
    margin: 0;
    padding: 0;
}

.rose-finder .finder-page-list a,
.rose-finder .finder-page-list span {
    display: inline-flex;
    align-items: center;
    justify-content: center;

    min-width: 40px;
    height: 40px;

    padding: 0 12px;

    border: 1px solid var(--rf-line);

    background: var(--rf-white);
    color: var(--rf-charcoal);

    font-family: inherit;
    font-size: 12px;
    font-weight: 600;
    line-height: 1;
    text-decoration: none;

    box-sizing: border-box;
}

.rose-finder .finder-page-list a {
    cursor: pointer;

    transition:
        background-color .15s ease,
        border-color .15s ease,
        color .15s ease;
}

.rose-finder .finder-page-list a:hover {
    border-color: var(--rf-charcoal);
    background: var(--rf-cream);
}

.rose-finder .finder-page-list a:focus-visible {
    outline: 2px solid var(--rf-charcoal);
    outline-offset: 2px;
}

.rose-finder .finder-page-list .active span {
    border-color: var(--rf-charcoal);
    background: var(--rf-charcoal);
    color: #fff;
}

.rose-finder .finder-page-list .disabled span {
    border-color: transparent;
    background: transparent;
    color: #b5b5b5;
    cursor: default;
}


/* =========================================================
   RESPONSIVE
   ========================================================= */

@media (max-width: 1100px) {

    .rose-finder .results-grid {
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

    .rose-finder .rose-finder-hero {
        padding: 50px 16px 48px;
    }

    .rose-finder .finder-hero-actions {
        flex-direction: column;
        align-items: flex-start;
        gap: 16px;
    }

    .rose-finder .hero-customise {
        width: 100%;
        max-width: 320px;
    }

    .rose-finder .rose-finder-hero h1 {
        font-size: 50px;
    }

    .rose-finder .rose-finder-hero p {
        font-size: 14px;
    }

    .rose-finder .hero-circle-one {
        width: 300px;
        height: 300px;

        top: -180px;
        right: -130px;
    }

    .rose-finder .hero-circle-two,
    .rose-finder .hero-leaf {
        display: none;
    }

    .rose-finder .finder-topbar {
        align-items: flex-start;
        flex-direction: column;
    }

    .rose-finder .finder-toolbar-actions {
        width: 100%;
    }

    .rose-finder .filter-trigger {
        width: 100%;
    }

    .rose-finder .results-grid {
        grid-template-columns:
            repeat(2, minmax(0, 1fr));

        gap: 30px 14px;
    }

}


@media (max-width: 560px) {

    .rose-finder .results-grid {
        grid-template-columns: 1fr;
    }

    .rose-finder .results-header {
        align-items: flex-start;
        flex-direction: column;
    }

    .rose-finder .finder-drawer {
        width: 100%;
    }

    .rose-finder .finder-drawer-header {
        padding: 22px 20px 18px;
    }

    .rose-finder .finder-drawer-body {
        padding: 22px 20px 30px;
    }

    .rose-finder .finder-drawer-footer {
        padding: 14px 20px;
        padding-bottom: calc(14px + env(safe-area-inset-bottom));
    }

    .rose-finder .characteristic-grid {
        grid-template-columns:
            repeat(2, minmax(0, 1fr));
    }

    .rose-finder .drawer-done {
        flex: 0 0 auto;
    }

    .rose-finder .drawer-clear {
        display: none;
    }

}


@media (max-width: 390px) {

    .rose-finder .rose-finder-hero h1 {
        font-size: 43px;
    }

    .rose-finder .finder-drawer-footer {
        gap: 8px;
    }

    .rose-finder .drawer-result-summary strong {
        font-size: 20px;
    }

    .rose-finder .drawer-done {
        padding: 0 13px;
    }

}


/* =========================================================
   REDUCED MOTION
   ========================================================= */

@media (prefers-reduced-motion: reduce) {

    .rose-finder *,
    .rose-finder *::before,
    .rose-finder *::after {
        scroll-behavior: auto !important;
        transition-duration: .01ms !important;
        animation-duration: .01ms !important;
        animation-iteration-count: 1 !important;
    }

}
</style>


<div
    class="rose-finder"
    data-finder
>

    {{-- =====================================================
         HERO
         ===================================================== --}}

    <header class="rose-finder-hero">

        <div class="rose-finder-hero-content">

            <h1>
                Find your perfect rose
            </h1>

            <p>
                Discover roses chosen for your garden. Select the qualities
                you're looking for and we'll narrow the collection down for you.
            </p>

            <div class="finder-hero-actions">

                <button
                    type="button"
                    class="hero-customise"
                    data-filter-open
                    aria-controls="filter-drawer"
                    aria-expanded="false"
                >
                    <span aria-hidden="true">☰</span>
                    <span>Customise your search</span>
                </button>

                <div
                    class="finder-hero-meta"
                    data-finder-hero-meta
                >
                    @include('rose-finder.partials.hero-meta')
                </div>

            </div>

            <div class="proto-hero-tools" data-proto-hero-extras>
                <button type="button" class="proto-chip-btn is-accent" data-proto-surprise>
                    Surprise me
                </button>
                <button type="button" class="proto-chip-btn" data-proto-share>
                    Share this search
                </button>
            </div>

            <div class="proto-quick-start" data-proto-quick-start>
                <button type="button" class="proto-chip-btn" data-proto-jump="colour">
                    Colour
                </button>
                <button type="button" class="proto-chip-btn" data-proto-jump="locations">
                    Where it will grow
                </button>
                <button type="button" class="proto-chip-btn" data-proto-jump="fragrances">
                    Fragrance
                </button>
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


    <div class="rose-finder-page">

        <div class="rose-finder-shell">

        {{-- Active filter chips --}}
        <div data-finder-chips>
            @include('rose-finder.partials.chips')
        </div>


        {{-- Results --}}
        <div class="plant-finder-layout">

            <main
                class="plant-finder-results"
                data-finder-results
            >
                @include('rose-finder.partials.results')
            </main>

        </div>

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
                action="{{ url()->current() }}"
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

                    @php
                        $selectedColour = $filters['colour'] ?? '';
                        $colourIcons = \App\Support\RoseFinderCatalog::colourIcons();
                        $selectedColourIcon = $selectedColour !== ''
                            ? ($colourIcons[$selectedColour] ?? null)
                            : null;
                    @endphp

                    <div
                        class="colour-picker"
                        data-colour-picker
                        data-proto-section="colour"
                    >
                        <input
                            type="hidden"
                            name="colour"
                            value="{{ $selectedColour }}"
                            data-colour-input
                        >

                        <button
                            type="button"
                            class="filter-select colour-select colour-picker-trigger"
                            data-colour-trigger
                            aria-haspopup="listbox"
                            aria-expanded="false"
                            aria-controls="colour-picker-panel"
                        >
                            @if($selectedColourIcon)
                                <span class="colour-swatch colour-swatch-image">
                                    <img
                                        src="{{ asset('images/finder/colours/'.$selectedColourIcon) }}"
                                        alt=""
                                        width="34"
                                        height="34"
                                        data-colour-trigger-icon
                                    >
                                </span>
                            @else
                                <span
                                    class="colour-swatch colour-swatch-all"
                                    data-colour-trigger-icon
                                ></span>
                            @endif

                            <span class="filter-select-copy">
                                <small>Flower colour</small>
                                <strong data-colour-trigger-label>
                                    @if($selectedColour !== '')
                                        {{ $colours[$selectedColour] ?? 'Choose a colour' }}
                                    @else
                                        Choose a colour
                                    @endif
                                </strong>
                            </span>

                            <span class="select-chevron" aria-hidden="true">⌄</span>
                        </button>

                        <div
                            id="colour-picker-panel"
                            class="colour-picker-panel"
                            data-colour-panel
                            role="listbox"
                            aria-label="Flower colour"
                        >
                            <button
                                type="button"
                                class="colour-option {{ $selectedColour === '' ? 'is-active' : '' }}"
                                role="option"
                                data-colour-value=""
                                data-colour-label="Any colour"
                                aria-selected="{{ $selectedColour === '' ? 'true' : 'false' }}"
                            >
                                <span class="colour-option-icon">
                                    <span class="colour-swatch colour-swatch-all" style="width:34px;height:34px;margin:0;flex:none;"></span>
                                </span>
                                <span class="colour-option-label">Any colour</span>
                            </button>

                            @foreach($colours as $value => $label)
                                <button
                                    type="button"
                                    class="colour-option {{ $selectedColour === $value ? 'is-active' : '' }}"
                                    role="option"
                                    data-colour-value="{{ $value }}"
                                    data-colour-label="{{ $label }}"
                                    data-colour-icon="{{ asset('images/finder/colours/'.$colourIcons[$value]) }}"
                                    aria-selected="{{ $selectedColour === $value ? 'true' : 'false' }}"
                                >
                                    <span class="colour-option-icon">
                                        <img
                                            src="{{ asset('images/finder/colours/'.$colourIcons[$value]) }}"
                                            alt=""
                                            width="34"
                                            height="34"
                                            loading="lazy"
                                        >
                                    </span>
                                    <span class="colour-option-label">{{ $label }}</span>
                                </button>
                            @endforeach
                        </div>
                    </div>

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

                    <fieldset class="characteristic-group" data-proto-section="{{ $group['key'] }}">

                        <legend>

                            @if(! empty($group['options'][0]['icon']))
                                <span class="proto-drawer-icon" aria-hidden="true">
                                    <img
                                        src="{{ asset('images/finder/'.$group['options'][0]['icon']) }}"
                                        alt=""
                                        width="28"
                                        height="28"
                                    >
                                </span>
                            @endif

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

        <div
            class="finder-drawer-footer"
            data-finder-drawer-footer
        >
            @include('rose-finder.partials.drawer-footer')
        </div>

    </aside>

</div>


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

    const openButtons =
        finder.querySelectorAll('[data-filter-open]');

    const form =
        finder.querySelector('[data-finder-form]');


    let lastFocusedElement = null;


    function setOpenButtonsExpanded(expanded) {

        openButtons.forEach(function (button) {
            button.setAttribute(
                'aria-expanded',
                expanded ? 'true' : 'false'
            );
        });

    }


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
        sessionStorage.setItem('rose-finder-drawer', 'open');

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

        setOpenButtonsExpanded(true);

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
        sessionStorage.removeItem('rose-finder-drawer');

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

        setOpenButtonsExpanded(false);

        document.body.style.overflow = '';


        if (
            restoreFocus &&
            lastFocusedElement &&
            typeof lastFocusedElement.focus === 'function'
        ) {

            lastFocusedElement.focus();

        }

    }


    openButtons.forEach(function (button) {

        button.addEventListener(
            'click',
            openDrawer
        );

    });


    finder.addEventListener(
        'click',
        function (event) {

            const closeButton =
                event.target.closest(
                    '[data-filter-close]'
                );

            if (!closeButton || !finder.contains(closeButton)) {
                return;
            }

            closeDrawer();

        }
    );


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

            if (event.key !== 'Escape') {
                return;
            }

            if (
                colourPicker &&
                colourPicker.classList.contains('is-open')
            ) {
                event.preventDefault();
                closeColourPicker();
                return;
            }

            if (finder.classList.contains('drawer-open')) {
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
       COLOUR PICKER
       ========================================================= */

    const colourPicker =
        finder.querySelector('[data-colour-picker]');

    function closeColourPicker() {
        if (!colourPicker) {
            return;
        }

        colourPicker.classList.remove('is-open');

        const trigger = colourPicker.querySelector('[data-colour-trigger]');
        const panel = colourPicker.querySelector('[data-colour-panel]');

        if (trigger) {
            trigger.setAttribute('aria-expanded', 'false');
        }
    }

    function openColourPicker() {
        if (!colourPicker) {
            return;
        }

        colourPicker.classList.add('is-open');

        const trigger = colourPicker.querySelector('[data-colour-trigger]');

        if (trigger) {
            trigger.setAttribute('aria-expanded', 'true');
        }
    }

    function setColourSelection(option, options) {
        if (!colourPicker || !option) {
            return;
        }

        const shouldSubmit = !options || options.submit !== false;
        const value = option.getAttribute('data-colour-value') || '';
        const label = option.getAttribute('data-colour-label') || 'Choose a colour';
        const icon = option.getAttribute('data-colour-icon') || '';
        const input = colourPicker.querySelector('[data-colour-input]');
        const labelEl = colourPicker.querySelector('[data-colour-trigger-label]');
        const iconHost = colourPicker.querySelector('[data-colour-trigger-icon]');

        if (input) {
            input.value = value;
        }

        if (labelEl) {
            labelEl.textContent = value === '' ? 'Choose a colour' : label;
        }

        if (iconHost) {
            if (icon) {
                iconHost.className = 'colour-swatch colour-swatch-image';
                iconHost.innerHTML =
                    '<img src="' + icon + '" alt="" width="34" height="34">';
                iconHost.setAttribute('data-colour-trigger-icon', '');
            } else {
                iconHost.className = 'colour-swatch colour-swatch-all';
                iconHost.innerHTML = '';
                iconHost.setAttribute('data-colour-trigger-icon', '');
            }
        }

        colourPicker.querySelectorAll('.colour-option').forEach(function (item) {
            const active = item === option;
            item.classList.toggle('is-active', active);
            item.setAttribute('aria-selected', active ? 'true' : 'false');
        });

        closeColourPicker();

        if (shouldSubmit) {
            submitFilters();
        }
    }

    if (colourPicker) {
        const trigger = colourPicker.querySelector('[data-colour-trigger]');
        const panel = colourPicker.querySelector('[data-colour-panel]');

        if (trigger) {
            trigger.addEventListener('click', function (event) {
                event.preventDefault();

                if (colourPicker.classList.contains('is-open')) {
                    closeColourPicker();
                } else {
                    openColourPicker();
                }
            });
        }

        if (panel) {
            panel.addEventListener('click', function (event) {
                const option = event.target.closest('[data-colour-value]');

                if (!option) {
                    return;
                }

                event.preventDefault();
                setColourSelection(option);
            });
        }

        document.addEventListener('click', function (event) {
            if (!colourPicker.contains(event.target)) {
                closeColourPicker();
            }
        });
    }


    /* =========================================================
       FILTER FORM
       ========================================================= */

    if (form) {

        form.addEventListener('submit', function (event) {
            event.preventDefault();
            submitFilters();
        });

        form.querySelectorAll('select').forEach(function (select) {
            select.addEventListener('change', function () {
                updateSelectLabel(select);
                submitFilters();
            });
        });

        form.querySelectorAll('input[type="checkbox"]').forEach(function (input) {
            input.addEventListener('change', function () {
                updateCheckboxState(input);
                submitFilters();
            });
        });

    }


    /* =========================================================
       FILTER SUBMISSION (AJAX — keep drawer open)
       ========================================================= */

    let submitting = false;
    let pendingSubmit = false;

    const heroMeta =
        finder.querySelector('[data-finder-hero-meta]');

    const chipsContainer =
        finder.querySelector('[data-finder-chips]');

    const resultsContainer =
        finder.querySelector('[data-finder-results]');

    const drawerFooter =
        finder.querySelector('[data-finder-drawer-footer]');


    function buildFilterUrl(page) {
        const params = new URLSearchParams();

        params.set('partial', '1');

        if (form) {
            form.querySelectorAll('select').forEach(function (select) {
                if (select.value !== '') {
                    params.set(select.name, select.value);
                }
            });

            form.querySelectorAll(
                'input[type="hidden"][name="colour"], input[type="hidden"][name="size"]'
            ).forEach(function (input) {
                if (input.value !== '') {
                    params.set(input.name, input.value);
                }
            });

            form.querySelectorAll(
                'input[type="checkbox"]:checked'
            ).forEach(function (input) {
                params.append(input.name, input.value);
            });
        }

        if (page && page > 1) {
            params.set('page', String(page));
        }

        const query = params.toString();

        return window.location.pathname + (query ? '?' + query : '');
    }


    function publicFilterUrl(requestUrl) {
        const url = new URL(
            requestUrl || buildFilterUrl(),
            window.location.origin
        );

        url.searchParams.delete('partial');

        const query = url.searchParams.toString();

        return url.pathname + (query ? '?' + query : '');
    }


    async function loadFinder(requestUrl) {

        if (submitting) {
            pendingSubmit = requestUrl || true;
            return;
        }

        submitting = true;
        pendingSubmit = false;

        finder.classList.add('is-loading');

        const fetchUrl = requestUrl || buildFilterUrl();
        const historyUrl = publicFilterUrl(fetchUrl);

        try {

            const response = await fetch(fetchUrl, {
                headers: {
                    'Accept': 'application/json',
                    'X-Finder-Partial': '1',
                    'X-Requested-With': 'XMLHttpRequest',
                },
                credentials: 'same-origin',
            });

            const contentType =
                response.headers.get('content-type') || '';

            if (!response.ok || !contentType.includes('application/json')) {
                throw new Error('Unexpected finder response');
            }

            const data = await response.json();

            if (resultsContainer) {
                resultsContainer.innerHTML = data.results;
            }

            if (chipsContainer) {
                chipsContainer.innerHTML = data.chips;
            }

            if (heroMeta) {
                heroMeta.innerHTML = data.heroMeta || '';
            }

            if (drawerFooter) {
                drawerFooter.innerHTML = data.drawerFooter;
            }

            window.history.replaceState(
                { finderFilters: true },
                '',
                historyUrl
            );

            document.dispatchEvent(new CustomEvent('rose-finder:updated', {
                detail: { total: data.total },
            }));

            if (sessionStorage.getItem('rose-finder-drawer') === 'open') {
                finder.classList.add('drawer-open');
                setOpenButtonsExpanded(true);
                document.body.style.overflow = 'hidden';
            }

        } catch (error) {

            console.error('Rose finder update failed', error);

            if (requestUrl) {
                window.location.assign(publicFilterUrl(fetchUrl));
            }

        } finally {

            finder.classList.remove('is-loading');
            submitting = false;

            if (pendingSubmit) {
                const next = pendingSubmit === true
                    ? null
                    : pendingSubmit;

                pendingSubmit = false;
                loadFinder(next);
            }

        }

    }


    function submitFilters() {
        if (!form) {
            return;
        }

        loadFinder(buildFilterUrl());
    }


    function queryValues(params, field) {
        const values = [];

        params.forEach(function (value, key) {
            if (
                key === field ||
                key === field + '[]' ||
                key.indexOf(field + '[') === 0
            ) {
                values.push(value);
            }
        });

        return values;
    }


    function syncFormFromUrl(requestUrl) {
        if (!form) {
            return;
        }

        const url = new URL(
            requestUrl || window.location.href,
            window.location.origin
        );
        const params = url.searchParams;

        form.querySelectorAll('input[type="checkbox"]').forEach(function (input) {
            const field = input.name.replace(/\[\]$/, '');
            const selected = queryValues(params, field);

            input.checked = selected.indexOf(input.value) !== -1;
            updateCheckboxState(input);
        });

        const sizeSelect = form.querySelector('select[name="size"]');

        if (sizeSelect) {
            sizeSelect.value = params.get('size') || '';
            updateSelectLabel(sizeSelect);
        }

        const colourValue = params.get('colour') || '';
        const colourInput = form.querySelector('[data-colour-input]');

        if (colourInput) {
            colourInput.value = colourValue;
        }

        if (colourPicker) {
            const option = colourPicker.querySelector(
                '.colour-option[data-colour-value="' + colourValue + '"]'
            ) || colourPicker.querySelector('.colour-option[data-colour-value=""]');

            if (option) {
                setColourSelection(option, { submit: false });
            }
        }
    }


    /*
     * Chips, reset/clear links, and pagination should update via AJAX —
     * never full-page navigate (or land on a partial=1 URL).
     */
    finder.addEventListener('click', function (event) {
        const link = event.target.closest(
            [
                '.active-chips a[href]',
                '[data-finder-hero-meta] a[href]',
                'a.clear-filters[href]',
                'a.drawer-clear[href]',
                '.empty-results a[href]',
                '.proto-relax-colour a[href]',
                '.finder-pagination a[href]',
            ].join(', ')
        );

        if (!link || !finder.contains(link)) {
            return;
        }

        const url = new URL(link.href, window.location.origin);

        if (url.origin !== window.location.origin) {
            return;
        }

        event.preventDefault();

        url.searchParams.delete('partial');
        url.searchParams.set('partial', '1');

        const requestUrl = url.pathname + url.search;

        syncFormFromUrl(url);
        loadFinder(requestUrl);

        if (link.closest('.finder-pagination') && resultsContainer) {
            resultsContainer.scrollIntoView({
                behavior: 'smooth',
                block: 'start',
            });
        }
    });


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
       RESTORE DRAWER / CLEAN UP
       ========================================================= */

    if (sessionStorage.getItem('rose-finder-drawer') === 'open') {
        openDrawer();
    }


    window.addEventListener(
        'popstate',
        function () {
            window.location.reload();
        }
    );


    window.addEventListener(
        'pageshow',
        function () {

            submitting = false;

            if (sessionStorage.getItem('rose-finder-drawer') === 'open') {
                openDrawer();
            } else {
                document.body.style.overflow = '';
            }

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