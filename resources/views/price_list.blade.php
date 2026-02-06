@extends('layouts.app')
@section('title', 'Price Lists')

@section('content')

    <div class="services" class="text-center">
        <!-- HERO -->
        <div class="services" class="text-center">
            {{-- <video class="bg-video" autoplay muted loop playsinline>
            <source src="{{ asset('assets/videos/intro.mp4') }}" type="video/mp4">
        </video> --}}
            <img src="{{ asset('assets/images/banner_bg.jpg') }}" class="bg-video" alt="Sterling Wills & Estate Planning">

            <!-- Overlay (optional dark mask) -->
            <div class="mask">
                <div class="text-white">
                    <h2 class="mb-3 inner-page-title">Price Lists</h2>
                    <p></p>
                </div>
            </div>
        </div>

        <!-- MOB HEADER -->
        @include('layouts.mob_header')

    </div>

    <section class="section page">
        <div class="container">
            <div class="row g-4">

                <!-- RIGHT TEXT BOXES -->
                <div class="col-xs-12">
                    <div class="d-flex flex-column h-100 gap-4">

                        <div class="feature-box flex-fill">
                            <p>At our firm, we believe that planning for the future should be clear, straightforward, and
                                accessible. That’s why our pricing is fully transparent, with no hidden fees or surprises.
                                Whether you need will writing, trust planning, estate planning, or lasting power of
                                attorney, we offer packages designed to meet different needs and budgets. Each service
                                includes expert guidance from our experienced team, ensuring your documents are accurate,
                                legally valid, and tailored to your unique circumstances.</p>
                            <p>Our pricing reflects the value of peace of mind—protecting your assets, securing your
                                family’s future, and making sure your wishes are followed exactly as intended. We provide
                                ongoing support, updates, and advice so your estate plan remains effective as your life and
                                circumstances evolve. Explore our packages, choose the one that fits your requirements, and
                                gain confidence knowing your estate and loved ones are fully protected with professional,
                                trusted care.</p>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="section py-5">
        <div class="container">
            {{-- <h2 class="text-center mb-5 maastrix">Our Services</h2> --}}
            <div class="row g-4">
                @foreach ($priceArr as $category => $prices)
                    <div class="col-12">
                        <h3 class="mb-2">{{ $category }}</h3>
                    </div>

                    @foreach ($prices as $item)
                        <div class="col-12">
                            <div class="d-flex justify-content-between align-items-center p-1 border-0 rounded">
                                <div class="flex-fill">
                                    <p class="mb-0">{{ $item['text'] }}</p>
                                </div>
                                <div class="flex-shrink-0">
                                    <p class="fw-bold mb-0">{{ '£ ' . $item['price'] }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
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
