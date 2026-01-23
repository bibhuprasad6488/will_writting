<div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="mobileMenu" aria-labelledby="mobileMenuLabel">

@php
        $siteSetting = \App\Models\SiteSetting::find(1);
    @endphp
    <div class="offcanvas-header">
        <a class="navbar-brand" href="{{ route('home') }}">
            @if ($siteSetting && $siteSetting->site_logo)
                <img src="{{ asset('storage/images/settings/' . $siteSetting->site_logo) }}"
                    alt="{{ $siteSetting->site_title }}">
            @else
                <img src="{{ asset('assets/images/logo.png') }}" alt="Sterling Wills & Estate Planning">
            @endif
        </a>

        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
            aria-label="Close"></button>
    </div>

    <div class="offcanvas-body d-flex flex-column justify-content-center">

        <ul class="navbar-nav text-center fs-4 my_menu">
            <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="#">About Us</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('service.lists') }}">Services</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Pricing</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Protection</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
        </ul>

        <div class="text-center mt-4">
            <a href="#" class="btn btn-outline-light rounded-0 px-4 py-2">
                Start Your Will
            </a>
        </div>

    </div>
</div>
