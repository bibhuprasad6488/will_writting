@extends('layouts.app')
@section('title', $siteSetting->site_title ?? 'Home')
@section('meta_title', $siteSetting->site_title ?? 'Sterling Wills | Clear, Fixed-Fee Wills & Estate Planning')
@section('meta_description',
    $siteSetting->site_desc ??
    'Protect what matters most with Sterling Wills. Clear advice,
    fixed fees, and expert guidance to help you create a legally sound will with confidence.')
@section('meta_keyword', $siteSetting->meta_keyword ?? '')
@section('content')
    <!-- HERO -->
    <div id="intro-example" class="text-center">
        {{-- <video class="bg-video" autoplay muted loop playsinline>
            <source src="{{ asset('assets/videos/intro.mp4') }}" type="video/mp4">
        </video> --}}
        <img src="{{ optional($home_page_data)->banner_image ?? asset('assets/images/banner_bg.jpg') }}" class="bg-video"
            alt="{{ optional($siteSetting)->site_title }}">

        <div class="mask">
            <div class="text-white">
                <h1 class="mt-5 banner-title">{{ optional($home_page_data)->banner_title }}</h1>
                <h4 class="my-4 banner-subtitle">{{ optional($home_page_data)->banner_sub_title }}</h4>

                <a class="btn btn-light btn-lg m-2 rounded-0" href="{{ route('journey') }}"
                    role="button">{{ optional($home_page_data)->banner_btn_one_text }}</a>
                <a class="btn btn-light btn-lg m-2 rounded-0" href="{{ route('contact') }}"
                    role="button">{{ optional($home_page_data)->banner_btn_two_text }}</a>
            </div>
        </div>
    </div>

    <!-- MOB HEADER -->
    @include('layouts.mob_header')

    <section class="section about_us">
        <div class="container">
            <div class="row g-4 py-6">

                <!-- LEFT IMAGE BOX -->
                <div class="col-md-6 px-5">
                    <div class="feature-box h-100">
                        <img src="{{ optional($home_page_data)->ww_image ?? asset('assets/images/about_us.png') }}"
                            alt="Will Writing" class="img-fluid feature-image">
                    </div>
                </div>

                <!-- RIGHT TEXT BOXES -->
                <div class="col-md-6 px-5">
                    <div class="d-flex flex-column h-100 gap-4">

                        <div class="feature-box flex-fill">
                            <h3>Who are we?</h3>
                            {!! optional($home_page_data)->ww_desc !!}
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>


    <section>
        <div class="container">
            <h2 class="text-center mb-5 maastrix">Our Services</h2>
            <div class="row g-4">
                @foreach ($services as $service)
                    <div class="col-md-4 px-5 py-4">
                        <div class="card service-card h-100 text-center rounded-0">
                            <img src="{{ $service->service_image }}" class="card-img-top">
                            <div class="card-body text-center">
                                <h5 class="service-title">
                                    {{ $service->name }}
                                </h5>

                                <div class="service-divider"></div>

                                <a href="{{ route('service.details', $service->slug) }}"
                                    class="btn btn-outline-dark rounded-0 mt-auto">
                                    FIND OUT MORE >
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="start_will"><a class="btn btn-secondary mt-3 rounded-0 fs-4 px-4 py-2"
                        href="{{ url('/services') }}">View
                        all</a></div>
            </div>
        </div>
    </section>

    @include('cta_common')


    {{-- <section class="section guided_journey pb-5">
        <div class="container">
            <h2 class="text-center mb-5 maastrix">Guided Journey</h2>
            <div class="row g-4">
                <div class="col-md-4 ">
                    <div class="card text-center rounded-0"><img src="{{ asset('assets/images/step1.jpg') }}">
                        <p>Step1 : Getting Started</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-center rounded-0"><img src="{{ asset('assets/images/step2.jpg') }}">
                        <p>Step2 : Provide Your Information</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-center rounded-0"><img src="{{ asset('assets/images/step3.jpg') }}">
                        <p>Step3 : We Prepare Your Will</p>
                    </div>
                </div>
            </div>
            <div class="start_will"><a class="btn btn-dark mt-3 rounded-0 fs-4 px-4 py-2" href="{{ route('journey') }}">View
                    all</a></div>
            <div class="start_will"><a class="btn btn-dark mt-3 rounded-0 fs-4 px-4 py-2">Make your will today</a></div>
        </div>
    </section> --}}

    <section class="section client_testimonials pb-5">
        <div class="container position-relative">
            <h2 class="text-center mb-5 maastrix">Client Testimonials</h2>

            <!-- Left Arrow -->
            <button class="scroll-btn left" onclick="scrollTestimonials(-1)">&#10094;</button>

            <!-- Scroll Area -->
            <div class="testimonial-scroll" id="testimonialScroll">
                @foreach ($testimonials as $t)
                    @php
                        $rating = $t->client_rating ?? 0;
                        $fullStars = floor($rating);
                        $halfStar = $rating - $fullStars >= 0.5 ? true : false;
                        $emptyStars = 5 - $fullStars - ($halfStar ? 1 : 0);
                    @endphp
                    <div class="testimonial-card">
                        <div class="card p-3 text-center rounded-0">

                            <p class="fs-4"> <i>{{ $t->client_name }} ,{{ $t->client_position }}</i>
                            </p>
                            <p>{{ $t->testimonial_text }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Right Arrow -->
            <button class="scroll-btn right" onclick="scrollTestimonials(1)">&#10095;</button>
        </div>
    </section>
    @if ($siteSetting->partner_show)
        <div class="container partner">
            <h2 class="text-center mb-5 maastrix">Partners list</h2>

            <div class="partner-marquee">
                <div class="partner-track">
                    @foreach ($partners as $p)
                        <span class="partner-card {{ $loop->iteration }}"><img src="{{ $p->logo_path }}"
                                alt="{{ $p->name }}"></span>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
@endsection
@push('scripts')
    <script>
        const container = document.getElementById('testimonialScroll');
        let autoScrollInterval;

        function scrollTestimonials(direction) {
            container.scrollBy({
                left: direction * container.clientWidth * 0.9,
                behavior: 'smooth'
            });
        }

        function autoScroll() {
            const maxScrollLeft = container.scrollWidth - container.clientWidth;

            if (container.scrollLeft >= maxScrollLeft - 10) {
                container.scrollTo({
                    left: 0,
                    behavior: 'smooth'
                });
            } else {
                container.scrollBy({
                    left: container.clientWidth * 0.9,
                    behavior: 'smooth'
                });
            }
        }

        function startAutoScroll() {
            autoScrollInterval = setInterval(autoScroll, 3500);
        }

        function stopAutoScroll() {
            clearInterval(autoScrollInterval);
        }

        /* Pause on interaction */
        container.addEventListener('mouseenter', stopAutoScroll);
        container.addEventListener('mouseleave', startAutoScroll);
        container.addEventListener('touchstart', stopAutoScroll);
        container.addEventListener('touchend', startAutoScroll);

        startAutoScroll();
    </script>
@endpush
