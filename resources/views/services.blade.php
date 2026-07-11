@extends('layouts.app')
@section('title', optional($allServicePage)->meta_title ?? 'All Services')
@section('meta_title',
    optional($allServicePage)->meta_title ??
    'Expert Services | Will Writing & Estate Planning –
    Sterling Wills')
@section('meta_description',
    optional($allServicePage)->meta_desc ??
    'Professional will writing & estate planning services from Sterling Wills. Personal
    guidance, legal compliance, and lasting peace of mind.')

@section('content')

    <!-- HERO -->
    <div class="services" class="text-center"
        style="background-image: url('{{ optional($allServicePage)->banner_image ?? asset('assets/images/banner_bg.jpg') }}')">
        {{-- <video class="bg-video" autoplay muted loop playsinline>
            <source src="{{ asset('assets/videos/intro.mp4') }}" type="video/mp4">
        </video> --}}
        {{-- <img src="{{ optional($allServicePage)->banner_image ?? asset('assets/images/banner_bg.jpg') }}" class="bg-video"
                alt="Sterling Wills & Estate Planning"> --}}

        <!-- Overlay (optional dark mask) -->
        <div class="mask">
            <div class="text-white">
                <h2 class="mb-3 inner-page-title">{{ optional($allServicePage)->banner_title }}</h2>
                <h3 class="inner-page-subtitle">{{ optional($allServicePage)->banner_sub_title }}</h3>
            </div>
        </div>
    </div>

    <!-- MOB HEADER -->
    @include('layouts.mob_header')

    <section class="section page">
        <div class="container">
            <div class="row g-4">

                <!-- RIGHT TEXT BOXES -->
                <div class="col-xs-12">
                    <div class="d-flex flex-column h-100 gap-4">

                        <div class="feature-box flex-fill">
                            {!! optional($allServicePage)->law_services !!}
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="bg_grey page py-5 mt-3">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-xs-12 px-5 ">
                    {!! optional($allServicePage)->our_expertise !!}
                </div>

                <div class="col-sm-6 col-xs-12 px-5 ">
                    {!! optional($allServicePage)->guided_approach !!}
                </div>
            </div>
        </div>
    </section>


    <section class="section">
        <div class="container">
            <h2 class="text-center mb-5 maastrix">Our Services</h2>
            <div class="row g-4">
                @foreach ($services as $service)
                    <div class="col-md-4 px-5 py-4">
                        <div class="card service-card h-100 text-center rounded-0">
                            <img src="{{ $service->service_image }}" class="card-img-top" alt="{{ $service->name }}">
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
            </div>
        </div>
    </section>

    @include('cta_common')

    <section class="section page">
        <div class="container">
            <div class="row g-4">

                <!-- RIGHT TEXT BOXES -->
                <div class="col-xs-12">
                    <div class="d-flex flex-column h-100 gap-4">

                        <div class="feature-box flex-fill">
                            {!! optional($allServicePage)->wws_content !!}
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
