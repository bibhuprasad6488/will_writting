@extends('layouts.app')
@section('title', 'Our Story')
@section('meta_title', 'Sterling Wills | Professional Will Writing & Estate Planning Services UK')
@section('meta_description', 'Sterling Wills provides professional will writing, estate planning, lasting power of
    attorney and inheritance planning services across the UK. Protect your family and secure your legacy today.')

@section('content')

    <!-- HERO -->
    <div class="services text-center position-relative">
        {{-- <video class="bg-video" autoplay muted loop playsinline>
            <source src="{{ asset('assets/videos/intro.mp4') }}" type="video/mp4">
        </video> --}}
        <img src="{{ asset('assets/images/banner_bg.jpg') }}" class="bg-video" alt="Sterling Wills & Estate Planning">

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
                    {{-- <h4>Sterling Wills & Estate Planning was born from experience — not theory.</h4> --}}

                    <p class=" mb-3">
                        We recognised that many individuals and families delay putting proper arrangements in place — often
                        due to confusion, cost concerns, or uncertainty about the process.
                    </p>
                    <p class=" mb-3">
                        Without a legally valid will, loved ones can face unnecessary stress, financial complications, and
                        delays during an already difficult time.
                    </p>
                    <p class=" mb-3">
                        Our goal is simple: to make estate planning straightforward, accessible, and legally robust — giving
                        clients confidence that their wishes will be respected and their families protected.
                    </p>

                    <h2 class="fw-bold my-3"> Why We Founded Sterling Wills </h2>
                    <p class=" mb-3">
                        Across the UK, millions of adults do not have an up-to-date will. Many are unaware of how intestacy
                        laws determine the distribution of assets, or how failing to plan can affect children, property
                        ownership, and inheritance tax liabilities.
                    </p>
                    <p class=" mb-3">
                        We believe estate planning should not be reserved for the wealthy. It is an essential safeguard for
                        anyone who owns property, has savings, runs a business, or wants to protect their family’s future.
                    </p>

                </div>
            </div>
        </div>
    </section>

    <section class="bg_grey page py-2 mt-3 cm10">
        <div class="container">
            <div class="row gx-5 justify-content-between">
                <div class="col-md-12">
                    <h2 class="fw-bold text-center pb-4 mb-3 maastrix">Our Approach</h2>
                </div>
                <div class="col-sm-4 col-xs-12">
                    <div class="card rounded-0 border-0">
                        <div class="card-body">
                            <h3 class="fw-bold mb-3">Clear Advice</h3>
                            <p class=" mb-0">We explain wills and estate planning in plain English, avoiding unnecessary
                                legal
                                jargon. Our clients understand their options before making decisions.</p>
                        </div>
                    </div>

                </div>
                <div class="col-sm-4 col-xs-12">
                    <div class="card rounded-0 border-0">
                        <div class="card-body">
                            <h3 class="fw-bold mb-3">Professional Standards</h3>
                            <p class=" mb-0">Every document is prepared with care, accuracy, and compliance in mind. We
                                work to
                                high professional standards to ensure your wishes are legally enforceable.</p>
                        </div>
                    </div>

                </div>
                <div class="col-sm-4 col-xs-12">
                    <div class="card rounded-0 border-0">
                        <div class="card-body">
                            <h3 class="fw-bold mb-3">Practical Protection</h3>
                            <p class=" mb-0">Estate planning is more than paperwork — it is about protecting assets,
                                minimising inheritance tax where possible, and ensuring loved ones are provided for
                                according to your wishes.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FULL WIDTH IMAGE -->
    {{-- <section class="cta">
        <div class="cta-image">
            <img src="{{ asset('assets/images/story.jpg') }}" alt="Our story" class="img-fluid w-100">
        </div>
    </section> --}}

    <!-- CONTENT -->
    <section class="py-5 mb-6 cm10">
        <div class="container">
            <div class="row gx-2 justify-content-between">

                <!-- Left -->
                <div class="col-md-12">
                    {{-- <div class="text-center">
                        <i class="fa fa-user-secret fa-4x mb-3 text-secondary"></i>
                    </div> --}}
                    <h2 class="fw-bold fs-3 mb-3">
                        Planning for Every Stage of Life
                    </h2>
                    <p class="mb-3">Life changes — marriage, children, property purchases, business ownership, and
                        retirement all affect your estate planning needs.</p>
                    <p class="mb-2">Sterling Wills supports clients at every stage, whether you are:</p>
                    <ul class="">
                        <li>
                            Creating your first will</li>
                        <li>
                            Updating an existing will</li>
                        <li>
                            Setting up a Lasting Power of Attorney</li>
                        <li>
                            Planning to reduce inheritance tax exposure</li>
                        <li>
                            Protecting property for future generations</li>
                    </ul>
                    <p>We aim to provide long-term solutions that offer clarity and peace of mind. </p>
                </div>

                <!-- Right -->
                <div class="col-md-12 my-4">
                    {{-- <div class="text-center">
                        <i class="fa fa-podcast fa-4x mb-3 text-secondary"></i>
                    </div> --}}
                    <h2 class="fw-bold fs-3 mb-3">
                        Our Commitment
                    </h2>

                    <p>
                        We are committed to making professional will writing and estate planning services in the UK
                        accessible, transparent, and reliable.
                    </p>
                    <p class="mb-0">Good planning removes uncertainty.</p>
                    <p class="mb-0">Proper documentation protects your legacy.</p>
                    <p class="mb-3">Clear advice protects the people who matter most.</p>
                    <p>If you are ready to take the first step toward securing your estate, Sterling Wills is here to help.
                    </p>
                </div>

                <!-- Full width -->
                <div class="col-12  d-none">
                    <p>
                        With thoughtful guidance and unwavering support, our focus at Sterling Wills has always been to
                        provide peace of mind for today and security for the future.
                    </p>
                </div>

                <!-- VALUES -->
                <div class="col-md-6 text-center  d-none">
                    <i class="fa fa-podcast fa-4x mb-3 text-secondary"></i>
                    <h2 class="fw-bold fs-3 mb-3">
                        Our Values
                    </h2>

                    <p>
                        We are committed to honesty, clarity, and care. Every client is treated with respect, and every
                        plan is created with attention to detail and long-term security in mind.
                    </p>
                </div>

                <!-- EXPERIENCE -->
                <div class="col-md-6 text-center d-none">
                    <i class="fa fa-user-secret fa-4x mb-3 text-secondary"></i>
                    <h2 class="fw-bold fs-3 mb-3">
                        Our Experience
                    </h2>

                    <p>
                        Years of industry experience allow us to provide reliable, compliant, and compassionate support,
                        ensuring our clients feel confident and protected at every stage.
                    </p>
                </div>

            </div>
        </div>
    </section>

@endsection
