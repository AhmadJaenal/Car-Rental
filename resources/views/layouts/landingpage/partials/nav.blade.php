<!-- START nav -->
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="index.html">Car<span>Book</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item {{ request()->routeIs('index') ? 'active' : '' }}"><a href="{{ route('index') }}"
                        class="nav-link">Home</a></li>
                <li class="nav-item {{ request()->routeIs('about') ? 'active' : '' }}"><a href="{{ route('about') }}"
                        class="nav-link">About</a></li>
                <li class="nav-item {{ request()->routeIs('services') ? 'active' : '' }}"><a
                        href="{{ route('services') }}" class="nav-link">Services</a></li>
                <li class="nav-item {{ request()->routeIs('pricing') ? 'active' : '' }}"><a
                        href="{{ route('pricing') }}" class="nav-link">Pricing</a></li>
                <li class="nav-item {{ request()->routeIs('car') ? 'active' : '' }}"><a href="{{ route('car') }}"
                        class="nav-link">Cars</a></li>
                <li class="nav-item {{ request()->routeIs('contact') ? 'active' : '' }}"><a
                        href="{{ route('contact') }}" class="nav-link">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- END nav -->
