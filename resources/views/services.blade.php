@extends('layouts.app')
@section('title', 'Services')

@section('content')

    <div class="services" class="text-center">
        <!-- HERO -->
        <div class="services" class="text-center">
            <video class="bg-video" autoplay muted loop playsinline>
                <source src="{{ asset('assets/videos/intro.mp4') }}" type="video/mp4">
            </video>

            <!-- Overlay (optional dark mask) -->
            <div class="mask">
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

                <!-- RIGHT TEXT BOXES -->
                <div class="col-xs-12">
                    <div class="d-flex flex-column h-100 gap-4">

                        <div class="feature-box flex-fill">
                            <h2 class="text-center">Our law services in Sydney</h2>
                            <p>At Sterling Wills & Estate Planning, we provide clear, reliable will writing and estate
                                planning services to give you peace of mind. We take a personal, straightforward
                                approach, ensuring your wishes are clearly explained and legally recorded. Every client
                                is unique, and our focus is on creating well-structured wills that protect loved ones,
                                reduce uncertainty, and help prevent future disputes.</p>
                            <p>Our experienced team upholds the highest standards of professionalism, confidentiality,
                                and compliance. We also offer guidance on broader estate planning needs, including
                                updating wills and planning for life changes. By choosing Sterling Wills & Estate
                                Planning, you gain clarity, trust, and long-term reassurance—protecting what matters
                                most, now and in the future.</p>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="bg_grey page py-5 mt-3">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <h3>Trusted Expertise with a Personal Approach</h3>
                    <p>At Wills & Sterling, we understand that estate planning is deeply personal and often emotional.
                        Our team takes the time to listen, explain every option clearly, and tailor solutions to your
                        unique circumstances. We combine legal expertise with a compassionate approach, ensuring your
                        wishes are accurately documented and legally sound. Clients value our clarity, transparency, and
                        commitment to making complex matters simple and stress-free. From first consultation to final
                        documentation, you can be confident that your interests and your family’s future are our
                        priority.</p>
                </div>

                <div class="col-sm-6 col-xs-12">
                    <h3>Comprehensive Planning for Long-Term Peace of Mind</h3>
                    <p>Wills & Sterling offers more than just will writing. We provide comprehensive estate and trust
                        planning designed to protect your assets, minimise future disputes, and adapt to life’s changes.
                        Our forward-thinking approach helps safeguard your legacy today while allowing flexibility for
                        tomorrow. By planning carefully now, we help you achieve lasting peace of mind, knowing your
                        loved ones will be protected exactly as you intend.</p>
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

    <section class="cta py-5 cmt10">
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
                    <a href="#" class="btn btn-light w-100 py-3 rounded-0 text-uppercase fw-semibold">
                        Fill Out Our Form
                    </a>
                </div>

                <div class="col-md-5 col-lg-4">
                    <a href="tel:0292621666" class="btn btn-light w-100 py-3 rounded-0 text-uppercase fw-semibold">
                        Call 02 9262 1666
                    </a>
                </div>

            </div>
        </div>
    </section>

    <section class="section page">
        <div class="container">
            <div class="row g-4">

                <!-- RIGHT TEXT BOXES -->
                <div class="col-xs-12">
                    <div class="d-flex flex-column h-100 gap-4">

                        <div class="feature-box flex-fill">
                            <h2 class="text-center">Why Wills & Sterling</h2>
                            <p class="text-center">Wills & Sterling is dedicated to providing clear, dependable, and
                                personalised estate planning services tailored to your individual needs. We understand
                                that planning for the future can be complex, which is why we take a straightforward and
                                supportive approach, ensuring every step is explained clearly and with care.</p>
                            <p class="text-center">Our experienced team focuses on accuracy, compliance, and long-term
                                protection for you and your loved ones. Beyond will writing, we offer thoughtful
                                guidance on trusts and ongoing estate planning, helping you achieve confidence and
                                lasting peace of mind knowing your wishes are properly safeguarded.</p>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
