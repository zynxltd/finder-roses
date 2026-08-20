<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Rose Finder') | Harkness Roses</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script type="text/javascript" src="//widget.trustpilot.com/bootstrap/v5/tp.widget.bootstrap.min.js" async></script>
</head>
<body>
    @include('partials.site-header')

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
