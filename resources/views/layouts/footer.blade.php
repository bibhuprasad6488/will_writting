<footer class="site-footer">
    <div class="container">
        <div class="row align-items-start text-center text-md-start">

            <!-- Column 1: Company -->
            <div class="col-md-3 col-xs-12 mb-4 mb-md-0">
                <p><a href="{{ route('home') }}">
                        @if ($siteSetting && $siteSetting->footer_logo)
                            <img src="{{ asset('storage/images/settings/' . $siteSetting->footer_logo) }}"
                                alt="{{ $siteSetting->site_title }}">
                        @else
                            <img src="{{ asset('assets/images/logo.png') }}" alt="Sterling Wills & Estate Planning">
                        @endif
                    </a>
                </p>
                <p>Call:
                    @if ($siteSetting && $siteSetting->contact_phone)
                        {{ $siteSetting->contact_phone }}
                    @elseif ($siteSetting && $siteSetting->alt_phone)
                        {{ $siteSetting->alt_phone }}
                    @else
                        (0)
                        123-456-7899
                    @endif
                </p>
            </div>

            <!-- Column 2: Services -->
            <div class="col-md-3 col-xs-12 mb-4 mb-md-0">
                <h6 class="footer-title">Services</h6>
                <ul class="footer-links">
                    @foreach ($services as $s)
                        <li>
                            <a href="{{ route('service.details', $s->slug) }}">
                                {{ strtolower($s->name) }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- Column 3: Navigation -->
            <div class="col-md-3 col-xs-12 mb-4 mb-md-0">
                <h6 class="footer-title">Guided Journey</h6>
                <ul class="footer-links">
                    <li><a href="#">Analysic</a></li>
                    <li><a href="#">Choose right service</a></li>
                    <li><a href="#">Detailed fact finding</a></li>
                    <li><a href="#">Review your info</a></li>
                    <li><a href="#">Document Preparation<a></li>
                    <li><a href="#">Signing and next</a></li>
                    <li><a href="#">Secure storage</a></li>
                    <li><a href="#">Ongoing support</a></li>
                </ul>
            </div>

            <div class="col-md-3 col-xs-12 text-center text-md-end">

                <!-- Row 1: Compliance logos -->
                <div class="footer-logos mb-4">
                    <div class="logo-box">
                        @if ($siteSetting && $siteSetting->footer_logo_one)
                            <img src="{{ asset('storage/images/settings/' . $siteSetting->footer_logo_one) }}"
                                alt="{{ $siteSetting->site_title }}">
                        @else
                            <img src="{{ asset('assets/images/sww.png') }}" alt="Sterling Wills & Estate Planning">
                        @endif
                    </div>
                    <div class="logo-box">
                        @if ($siteSetting && $siteSetting->footer_logo_two)
                            <img src="{{ asset('storage/images/settings/' . $siteSetting->footer_logo_two) }}"
                                alt="{{ $siteSetting->site_title }}">
                        @else
                            <img src="{{ asset('assets/images/f2.jpg') }}" alt="Sterling Wills & Estate Planning">
                        @endif
                    </div>
                </div>

                <!-- Row 2: Social icons -->
                <div class="footer-socials">
                    <div class="social-box">
                        <img src="{{ asset('assets/images/fb.png') }}" alt="Facebook">
                    </div>
                    <div class="social-box">
                        <img src="{{ asset('assets/images/gplus.png') }}" alt="Google Plus">
                    </div>
                    <div class="social-box">
                        <img src="{{ asset('assets/images/twitter.png') }}" alt="Twitter">
                    </div>
                    <div class="social-box">
                        <img src="{{ asset('assets/images/whatsapp.png') }}" alt="WhatsApp">
                    </div>
                </div>

            </div>

        </div>

        <!-- <hr class="footer-divider"> -->


    </div>
</footer>

<div class="footer-bottom">
    <div class="container">
        <div class="col-xs-12">
            <div class="text-center small">
                @if ($siteSetting && $siteSetting->copyright)
                    {{ $siteSetting->copyright }}
                @else
                    © {{ date('Y') }} Sterling Wills &amp; Estate Planning
                @endif
            </div>
        </div>
    </div>
</div>
