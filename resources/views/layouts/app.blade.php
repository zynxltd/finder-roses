<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Rose Finder') | Harkness Roses</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="top-site-message">
        Next Day Delivery available — select at checkout and order before 12:00 midday.
        <a href="https://www.roses.co.uk/delivery-information">Find out more</a>
    </div>

    <header class="site-header">
        <div class="header-top">
            <div class="header-inner">
                <form class="site-search" action="https://www.roses.co.uk/search/results/" method="get" role="search">
                    <label class="visually-hidden" for="search">Search</label>
                    <input id="search" type="search" name="search" placeholder="Search our site...">
                    <button type="submit" aria-label="Search">Search</button>
                </form>

                <a class="brand" href="https://www.roses.co.uk/" aria-label="Harkness Roses home">
                    <img src="{{ asset('images/brand/logo_harkn.png') }}" alt="Harkness Roses" width="400" height="75">
                </a>

                <nav class="header-tools" aria-label="Account">
                    <a href="https://support.roses.co.uk/">Contact</a>
                    <a href="https://www.roses.co.uk/csp/secure/rose/web/accaccount.csp">Account</a>
                    <a href="https://www.roses.co.uk/basket">Basket</a>
                </nav>
            </div>
        </div>

        <nav class="main-nav" aria-label="Main navigation">
            <a href="https://www.roses.co.uk/bare-root-roses">Bare Root Roses</a>
            <a href="https://www.roses.co.uk/potted-roses">Potted Roses</a>
            <a href="https://www.roses.co.uk/shop-by-type-of-rose">Shop By Type</a>
            <a href="https://www.roses.co.uk/shop-by-colour">Shop By Colour</a>
            <a href="https://www.roses.co.uk/gift-roses">Gift Roses</a>
            <a href="https://www.roses.co.uk/the-essential-guide-to-roses">Rose Care</a>
            <a class="active" href="{{ route('rose-finder') }}">Rose Finder</a>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="site-footer">
        <div class="footer-grid">
            <div>
                <h3>Company Information</h3>
                <p><strong>Harkness Roses</strong><br>Eventus House, Sunderland Road,<br>Market Deeping, Peterborough, PE6 8FD</p>
                <a href="https://support.roses.co.uk/">Contact us</a>
                <a href="tel:03332101044">0333 210 1044</a>
            </div>
            <div>
                <h3>Help &amp; Information</h3>
                <a href="https://www.roses.co.uk/about-us">About Us</a>
                <a href="https://www.roses.co.uk/delivery-information">Delivery Information</a>
                <a href="https://www.roses.co.uk/lifetime-guarantee">Lifetime Guarantee</a>
                <a href="https://www.roses.co.uk/refund-policy">Refund &amp; Returns</a>
            </div>
            <div>
                <h3>Tips &amp; Advice</h3>
                <a href="https://www.roses.co.uk/planting-tips">Planting Tips</a>
                <a href="https://www.roses.co.uk/pruning-tips">Pruning Tips</a>
                <a href="https://www.roses.co.uk/rose-care-tips">Rose Care Tips</a>
                <a href="https://www.roses.co.uk/the-essential-guide-to-roses">The Essential Guide To Roses</a>
            </div>
            <div>
                <h3>Rose Finder</h3>
                <a href="{{ route('rose-finder') }}">Find your rose</a>
                <a href="https://www.roses.co.uk/">Shop all roses</a>
            </div>
        </div>
        <div class="sub-footer">
            <p>Copyright © Harkness Roses (Global) Ltd. Harkness Roses is a trading style operated under licence by You Garden Ltd on behalf of Harkness Roses (Global) Ltd.</p>
        </div>
    </footer>
</body>
</html>
