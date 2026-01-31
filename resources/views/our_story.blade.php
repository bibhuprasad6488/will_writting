@extends('layouts.app')
@section('title', 'Our Story')

@section('content')

    <!-- HERO -->
    <div class="services text-center position-relative">
        <video class="bg-video" autoplay muted loop playsinline>
            <source src="{{ asset('assets/videos/intro.mp4') }}" type="video/mp4">
        </video>

        <!-- Overlay -->
        <div class="mask d-flex align-items-center justify-content-center">
            <div class="text-white text-center">
                <h2 class="mb-3 inner-page-title">Our Story</h2>
            </div>
        </div>
    </div>

    <!-- MOBILE HEADER -->
    @include('layouts.mob_header')

    <!-- INTRO -->
    <section class="py-5 cmt10">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">

                    <h2 class="fw-bold mb-3">
                        About Sterling Wills
                    </h2>

                    <p class="fs-5 mb-4">
                        At Sterling Wills, we believe everyone deserves clarity and peace of mind when planning for the
                        future. Our work is guided by trust, transparency, and a genuine commitment to protecting what
                        matters most.
                    </p>

                    <p class="fs-5">
                        Sterling Wills was established to provide clear, professional will writing and estate planning
                        services, delivered with care, integrity, and attention to detail.
                    </p>

                </div>
            </div>
        </div>
    </section>

    <!-- FULL WIDTH IMAGE -->
    <section class="cta">
        <div class="cta-image">
            <img src="{{ asset('assets/images/story.jpg') }}" alt="Our story" class="img-fluid w-100">
        </div>
    </section>

    <!-- CONTENT -->
    <section class="py-5 mb-6 cmt10">
        <div class="container">
            <div class="row g-5">

                <!-- Left -->
                <div class="col-md-6">
                    <h2 class="fw-bold fs-3 mb-3">
                        Our Team Is Dedicated
                    </h2>

                    <p class="fs-5">
                        to making the process of will writing and estate planning as straightforward and stress-free as
                        possible. We take the time to understand every client’s individual circumstances, ensuring their
                        wishes are clearly documented and properly protected.
                    </p>
                </div>

                <!-- Right -->
                <div class="col-md-6">
                    <h2 class="fw-bold fs-3 mb-3">
                        With Years of Experience
                    </h2>

                    <p class="fs-5">
                        supporting individuals and families across the UK, Sterling Wills has built a reputation for
                        professionalism, reliability, and compassionate service. Our focus has always been on long-term
                        peace of mind, not short-term solutions.
                    </p>
                </div>

                <!-- Full width -->
                <div class="col-12">
                    <p class="fs-5">
                        With thoughtful guidance and unwavering support, our focus at Sterling Wills has always been to
                        provide peace of mind for today and security for the future.
                    </p>
                </div>

                <!-- VALUES -->
                <div class="col-md-6 text-center">
                    <i class="fa fa-podcast fa-4x mb-3 text-secondary"></i>
                    <h2 class="fw-bold fs-3 mb-3">
                        Our Values
                    </h2>

                    <p class="fs-5">
                        We are committed to honesty, clarity, and care. Every client is treated with respect, and every
                        plan is created with attention to detail and long-term security in mind.
                    </p>
                </div>

                <!-- EXPERIENCE -->
                <div class="col-md-6 text-center">
                    <i class="fa fa-user-secret fa-4x mb-3 text-secondary"></i>
                    <h2 class="fw-bold fs-3 mb-3">
                        Our Experience
                    </h2>

                    <p class="fs-5">
                        Years of industry experience allow us to provide reliable, compliant, and compassionate support,
                        ensuring our clients feel confident and protected at every stage.
                    </p>
                </div>

            </div>
        </div>
    </section>

@endsection
