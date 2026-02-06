@extends('layouts.app')
@section('title', $service->name)

@section('content')

    <div class="services" class="text-center">
        <!-- HERO -->
        <div class="services" class="text-center">
            {{-- <video class="bg-video" autoplay muted loop playsinline>
            <source src="{{ asset('assets/videos/intro.mp4') }}" type="video/mp4">
        </video> --}}
            <img src="{{ $service->banner_image }}" class="bg-video" alt="{{ $service->name }}">
            <!-- Overlay (optional dark mask) -->
            <div class="mask d-none">
                <div class="text-white">
                    <h2 class="mb-3 inner-page-title">We offer various services</h2>
                    <p><b>Entertainment law services in Sydney that protect your creative intellectual property to develop
                            and produce your creative projects.</b></p>
                </div>
            </div>
        </div>

        <!-- MOB HEADER -->
        @include('layouts.mob_header')
    </div>

    <section class="section page">
        <div class="container">
            <div class="row g-4">

                <div class="col-xs-12">
                    <h2 class="text-center">{{ $service->name }}</h2>
                </div>
                <!-- LEFT TEXT BOXES -->
                <div class="col-sm-3 col-xs-12">
                    <div class="d-flex flex-column h-100 gap-4">

                        <div class="feature-box flex-fill">
                            @foreach ($services as $s)
                                <p class="mb-3">
                                    <a href="{{ route('service.details', $s->slug) }}"
                                        class="d-block text-decoration-none text-secondary {{ $s->id == $service->id ? 'fw-bold ' : '' }}">
                                        {{ $s->name }}
                                    </a>
                                </p>
                            @endforeach

                        </div>

                    </div>
                </div>
                <!-- RIGHT TEXT BOXES -->
                <div class="col-sm-9 col-xs-12">
                    <div class="d-flex flex-column h-100 gap-4">

                        <div class="feature-box flex-fill">
                            {!! $service->description !!}
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <h2 class="text-center mb-5 maastrix">Our expert specialist services will take care of the rest:</h2>
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
            </div>
        </div>
    </section>

    <section class="cta py-5 cm10">
        <div class="container">
            <div class="row justify-content-center text-center rounded-0">

                <div class="col-lg-10">
                    <h2 class="cta-title mb-3">
                        Wills Sterling Law is your trusted Will Lawyer in Sydney
                    </h2>

                    <p class="cta-subtitle mb-4">
                        Contact us today and experience personalised and expert legal assistance
                        to support all of your personal matters.
                    </p>
                </div>

            </div>

            <div class="row justify-content-center mt-3 g-3 rounded-0">

                <div class="col-md-5 col-lg-4">
                    <a href="{{ route('start.will') }}" class="btn btn-light w-100 py-3 rounded-0 text-uppercase fw-semibold">
                        Fill Out Our Form
                    </a>
                </div>

                <div class="col-md-5 col-lg-4">
                    <a href="tel:{{ $siteSetting->contact_phone ?? '' }}"
                        class="btn btn-light w-100 py-3 rounded-0 text-uppercase fw-semibold">
                        Call
                        @if ($siteSetting && $siteSetting->contact_phone)
                            {{ $siteSetting->contact_phone }}
                        @endif
                    </a>
                </div>

            </div>
        </div>
    </section>

@endsection
