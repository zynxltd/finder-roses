<header id="nav" class="site-nav">
    {{-- Classic header (default) --}}
    <div class="header-top-wrapper header-legacy" data-header-variant="legacy">
        <div class="header-container">
            <div class="header-toolbar">
                <div class="header-toolbar-start">
                    <div class="header-mobile-actions mobile-only">
                        <button type="button" class="top-icons mobile-menu-toggle" aria-label="Open menu">
                            <span class="material-icons icon" aria-hidden="true">menu</span>
                            <span class="label">Menu</span>
                        </button>
                        <button type="button" class="top-icons mobile-search-toggle" aria-label="Open search">
                            <span class="material-icons icon" aria-hidden="true">search</span>
                            <span class="label">Search</span>
                        </button>
                    </div>

                    <div class="desktop-search-wrapper desktop-only">
                        <label class="visually-hidden" for="site-search">Search</label>
                        <form class="search" action="https://www.roses.co.uk/search/results/" method="get" role="search">
                            <div class="search-input">
                                <input
                                    id="site-search"
                                    type="search"
                                    name="search"
                                    placeholder="Search our site..."
                                >
                                <button type="submit" aria-label="Search">
                                    <span class="material-icons" aria-hidden="true">search</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <a class="header-logo" href="https://www.roses.co.uk/" aria-label="Harkness Roses home">
                    <img
                        src="{{ asset('images/brand/logo_harkn.png') }}"
                        class="desktop-logo"
                        alt="Harkness Roses"
                        width="400"
                        height="75"
                    >
                    <img
                        src="{{ asset('images/brand/logo_harkn_mobile.png') }}"
                        class="small-logo"
                        alt="Harkness Roses"
                        width="300"
                        height="127"
                    >
                </a>

                <div class="header-toolbar-end">
                    <a class="header-utility desktop-only" href="https://support.roses.co.uk/" target="_blank" rel="noopener">
                        <img src="{{ asset('images/header/contact_icon.png') }}" alt="" width="60" height="50">
                        <span class="label">Contact</span>
                    </a>

                    <a class="header-utility" href="https://www.roses.co.uk/csp/secure/rose/web/accaccount.csp">
                        <img src="{{ asset('images/header/account_icon.png') }}" alt="" width="60" height="50">
                        <span class="label">Account</span>
                    </a>

                    <a class="header-utility header-basket" href="https://www.roses.co.uk/basket" rel="nofollow" aria-label="Your Shopping Basket">
                        <span class="count"><span>0</span></span>
                        <img src="{{ asset('images/header/basket_icon.png') }}" alt="" width="60" height="50">
                        <span class="label">Basket</span>
                    </a>
                </div>
            </div>

            <nav class="header-menu desktop-only" aria-label="Main navigation">
                <ul class="menu">
                    <li class="top">
                        <a href="https://www.roses.co.uk/bare-root-roses">Bare Root Roses</a>
                    </li>
                    <li class="top">
                        <a href="https://www.roses.co.uk/potted-roses">Potted Roses</a>
                    </li>
                    <li class="top">
                        <a href="https://www.roses.co.uk/shop-by-type-of-rose">Shop By Type Of Rose</a>
                        <span class="material-icons" aria-hidden="true">expand_more</span>
                    </li>
                    <li class="top">
                        <a href="https://www.roses.co.uk/shop-by-colour">Shop By Colour</a>
                        <span class="material-icons" aria-hidden="true">expand_more</span>
                    </li>
                    <li class="top">
                        <a href="https://www.roses.co.uk/charity-roses">Charity Roses</a>
                    </li>
                    <li class="top">
                        <a href="https://www.roses.co.uk/gift-roses">Gift Roses</a>
                        <span class="material-icons" aria-hidden="true">expand_more</span>
                    </li>
                    <li class="top">
                        <a href="https://www.roses.co.uk/the-essential-guide-to-roses">Rose Care and Maintenance</a>
                    </li>
                    <li class="top nav-rose-finder">
                        <a class="is-active" href="{{ route('rose-finder') }}">Rose Finder</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    {{-- CRO header (prototype toggle) --}}
    <div class="header-cro" data-header-variant="cro">
        <div class="header-cro-utility">
            <div class="header-cro-container">
                <p class="header-cro-promise">
                    <span class="material-icons" aria-hidden="true">verified</span>
                    Lifetime guarantee on all roses
                </p>
                <a class="header-cro-phone" href="tel:03332101044">
                    <span class="material-icons" aria-hidden="true">call</span>
                    <span class="header-cro-phone-text">
                        <span class="header-cro-phone-label">Need help? Call</span>
                        <strong>0333 210 1044</strong>
                    </span>
                </a>
                <p class="header-cro-years desktop-only">
                    <span class="material-icons" aria-hidden="true">local_florist</span>
                    Growing British roses for over 140 years
                </p>
            </div>
        </div>

        <div class="header-cro-bar" data-cro-sticky>
            <div class="header-cro-container header-cro-main">
                <div class="header-cro-mobile mobile-only">
                    <button type="button" class="header-cro-icon-btn mobile-menu-toggle" aria-label="Open menu">
                        <span class="material-icons" aria-hidden="true">menu</span>
                    </button>
                </div>

                <a class="header-cro-logo" href="https://www.roses.co.uk/" aria-label="Harkness Roses home">
                    <img
                        src="{{ asset('images/brand/logo_harkn.png') }}"
                        class="desktop-logo"
                        alt="Harkness Roses"
                        width="400"
                        height="75"
                    >
                    <img
                        src="{{ asset('images/brand/logo_harkn_mobile.png') }}"
                        class="small-logo"
                        alt="Harkness Roses"
                        width="300"
                        height="127"
                    >
                </a>

                <div class="header-cro-search">
                    <label class="visually-hidden" for="site-search-cro">Search roses</label>
                    <form class="search" action="https://www.roses.co.uk/search/results/" method="get" role="search">
                        <div class="search-input">
                            <span class="material-icons search-leading desktop-only" aria-hidden="true">search</span>
                            <input
                                id="site-search-cro"
                                type="search"
                                name="search"
                                placeholder="Search roses, colours, gifts..."
                            >
                            <button type="submit" class="header-cro-search-submit desktop-only">Search</button>
                            <button type="submit" class="header-cro-search-icon mobile-only" aria-label="Search">
                                <span class="material-icons" aria-hidden="true">search</span>
                            </button>
                        </div>
                    </form>
                </div>

                <div class="header-cro-actions">
                    <a class="header-cro-action desktop-only" href="https://support.roses.co.uk/" target="_blank" rel="noopener">
                        <span class="header-cro-action-icon">
                            <img class="header-cro-contact-icon" src="{{ asset('images/header/contact_icon.png') }}" alt="" width="60" height="50">
                        </span>
                        <span class="label">Contact</span>
                    </a>
                    <a class="header-cro-action" href="https://www.roses.co.uk/csp/secure/rose/web/accaccount.csp">
                        <span class="header-cro-action-icon">
                            <span class="material-icons" aria-hidden="true">person_outline</span>
                        </span>
                        <span class="label">Account</span>
                    </a>
                    <a class="header-cro-basket" href="https://www.roses.co.uk/basket" rel="nofollow" aria-label="Your Shopping Basket">
                        <span class="header-cro-action-icon header-cro-basket-icon">
                            <span class="material-icons" aria-hidden="true">shopping_basket</span>
                            <span class="count"><span>0</span></span>
                        </span>
                        <span class="label">Basket</span>
                    </a>
                </div>
            </div>

            <nav class="header-cro-nav desktop-only" aria-label="Main navigation">
                <div class="header-cro-container">
                    <ul class="header-cro-menu">
                        <li>
                            <a href="https://www.roses.co.uk/bare-root-roses">Bare Root Roses</a>
                        </li>
                        <li>
                            <a href="https://www.roses.co.uk/potted-roses">Potted Roses</a>
                        </li>
                        <li>
                            <a href="https://www.roses.co.uk/shop-by-type-of-rose">
                                Shop By Type Of Rose
                                <span class="material-icons" aria-hidden="true">expand_more</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.roses.co.uk/shop-by-colour">
                                Shop By Colour
                                <span class="material-icons" aria-hidden="true">expand_more</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.roses.co.uk/charity-roses">Charity Roses</a>
                        </li>
                        <li>
                            <a href="https://www.roses.co.uk/gift-roses">
                                Gift Roses
                                <span class="material-icons" aria-hidden="true">expand_more</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.roses.co.uk/the-essential-guide-to-roses">Rose Care and Maintenance</a>
                        </li>
                    </ul>
                    <a class="header-cro-finder is-active" href="{{ route('rose-finder') }}">
                        <span class="material-icons" aria-hidden="true">auto_awesome</span>
                        Rose Finder
                    </a>
                </div>
            </nav>
        </div>
    </div>

    <div class="usp-wrapper">
        <div class="usp-inner">
            <div class="usp-box">
                Lifetime Guarantee On All Roses
                <span class="divider" aria-hidden="true"></span>
            </div>
            <div class="usp-box">
                Growing British Roses For Over 140 Years
                <span class="divider" aria-hidden="true"></span>
            </div>
            <div class="usp-box">
                Chelsea Flower Show Award Winning Roses
                <span class="divider" aria-hidden="true"></span>
            </div>
            <div class="usp-box tp">
                <div
                    class="trustpilot-widget"
                    data-locale="en-GB"
                    data-template-id="5419b732fbfb950b10de65e5"
                    data-businessunit-id="611f7c601eaa59001db5cde6"
                    data-style-height="24px"
                    data-style-width="100%"
                    data-theme="light"
                >
                    <a href="https://uk.trustpilot.com/review/roses.co.uk" target="_blank" rel="noopener">Trustpilot</a>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="mobile-menu-overlay" id="mobile-menu-overlay" hidden></div>

<div class="mobile-menu-top" id="mobile-menu-top" hidden>
    <button type="button" class="mobile-menu-close close-menu" aria-label="Close menu">
        <span class="material-icons" aria-hidden="true">clear</span>
    </button>
    <div class="logo-wrapper">
        <a href="https://www.roses.co.uk/" aria-label="Harkness Roses home">
            <img
                src="{{ asset('images/brand/logo_harkn_mobile.png') }}"
                alt="Harkness Roses"
                width="300"
                height="127"
            >
        </a>
    </div>
</div>

<nav
    class="mobile-menu-wrapper"
    id="mobile-menu-drawer"
    hidden
    aria-hidden="true"
    aria-label="Site menu"
>
    <a href="https://www.roses.co.uk/bare-root-roses">
        <div class="menu-item top">Bare Root Roses</div>
    </a>
    <a href="https://www.roses.co.uk/potted-roses">
        <div class="menu-item top">Potted Roses</div>
    </a>
    <a href="https://www.roses.co.uk/shop-by-type-of-rose">
        <div class="menu-item top">Shop By Type Of Rose</div>
    </a>
    <a href="https://www.roses.co.uk/shop-by-colour">
        <div class="menu-item top">Shop By Colour</div>
    </a>
    <a href="https://www.roses.co.uk/charity-roses">
        <div class="menu-item top">Charity Roses</div>
    </a>
    <a href="https://www.roses.co.uk/gift-roses">
        <div class="menu-item top">Gift Roses</div>
    </a>
    <a href="https://www.roses.co.uk/the-essential-guide-to-roses">
        <div class="menu-item top">Rose Care and Maintenance</div>
    </a>
    <a href="{{ route('rose-finder') }}">
        <div class="menu-item top is-active">Rose Finder</div>
    </a>
    <a href="https://support.roses.co.uk/" target="_blank" rel="noopener">
        <div class="menu-item top">Contact</div>
    </a>
    <a class="mobile-menu-phone" href="tel:03332101044">
        <div class="menu-item top">Call 0333 210 1044</div>
    </a>
</nav>

<div class="mobile-search-overlay" id="mobile-search-wrapper" hidden>
    <button type="button" class="mobile-search-close material-icons" aria-label="Close search">close</button>
    <form class="search" action="https://www.roses.co.uk/search/results/" method="get" role="search">
        <div class="search-input">
            <input type="search" name="search" placeholder="Search roses, colours, gifts..." autocomplete="off">
            <button type="submit" class="search-button" aria-label="Search">
                <span class="material-icons" aria-hidden="true">search</span>
            </button>
        </div>
    </form>
</div>
