@extends('layouts.app')
@section('title', 'Our Story')
@section('meta_title', 'Our Story | Why Sterling Wills & Estate Planning Exists')
@section('meta_description',
    'Founded after years of costly probate disputes, Sterling Wills & Estate Planning exists to
    protect families from conflict, confusion, and invalid wills.')

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
                        Why Sterling Wills & Estate Planning Exists
                    </h2>
                    <h4>Sterling Wills & Estate Planning was born from experience — not theory.</h4>

                    <p class=" mb-3">
                        Years ago, my family went through something I wouldn’t wish on anyone.
                    </p>
                    <p class=" mb-3">
                        My parents built a successful life. They worked hard, invested wisely, and over time created an
                        estate worth millions. Like many people, they believed they had “things in place” and assumed their
                        affairs would be straightforward when the time came.
                    </p>
                    <p class=" mb-3">
                        They didn’t.
                    </p>
                    <p class=" mb-3">
                        There was no <b>valid, legally watertight will</b>.
                    </p>
                    <p class=" mb-3">
                        What followed was not a smooth transition, but <b>years of stress, uncertainty, and costly legal
                            disputes.</b> Family relationships were strained. Assets were frozen. Decisions were delayed.
                    </p>

                    <p class=" mb-0">
                        What should have been a time to grieve turned into a prolonged battle through probate, solicitors,
                        and courtrooms.
                    </p>
                    <p class=" mb-0">
                        The financial cost was huge.
                    </p>
                    <p class=" mb-0">
                        The emotional cost was worse.
                    </p>

                </div>
            </div>
        </div>
    </section>

    <section class="bg_grey page py-2 mt-3 cm10">
        <div class="container">
            <div class="row gx-2 justify-content-between">
                <div class="col-sm-5 col-xs-12">
                    <h3 class="fw-bold">When Good Intentions Aren’t Enough</h3>
                    <p class=" mb-0">My parents never meant to leave things unclear. Like many families, they believed
                        informal
                        arrangements and conversations were enough. They assumed everything would “sort itself out.”</p>
                    <p class=" mb-3">It didn’t.</p>
                    <p class=" mb-0">Without a properly drafted will:</p>
                    <ul>
                        <li>The estate was contested</li>
                        <li>Timelines stretched into years</li>
                        <li>Legal fees escalated</li>
                        <li>Family members were pitted against one another</li>
                    </ul>
                    <p class="mb-3 ">Watching this unfold changed my perspective forever.</p>
                    <p>I realised something crucial: <b>estate planning isn’t about documents — it’s about protecting
                            people.</b></p>
                </div>

                <div class="col-sm-5 col-xs-12">
                    <h3 class="fw-bold">Turning a Hard Lesson Into a Purpose</h3>
                    <p>Sterling Wills & Estate Planning exists so other families <b>don’t have to learn this lesson the hard
                            way</b>.</p>
                    <p class=" mb-0">We built this firm to make sure:</p>
                    <ul>
                        <li>Your wishes are legally clear</li>
                        <li>Your family is protected from unnecessary conflict</li>
                        <li>Your estate passes efficiently, privately, and exactly as you intend</li>
                    </ul>
                    <p class="mb-0 ">No confusion.</p>
                    <p class="mb-0 ">No loopholes.</p>
                    <p class="mb-3 ">No avoidable disputes.</p>
                    <p class="mb-3 ">We believe proper estate planning shouldn’t be intimidating, overpriced, or left until
                        it’s too late. It should be <b>clear, thorough, and done right the first time</b>.</p>
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
    <section class="py-5 mb-6 cm10">
        <div class="container">
            <div class="row gx-2 justify-content-between">

                <!-- Left -->
                <xd2 class="col-md-5">
                    <div class="text-center">
                        <i class="fa fa-user-secret fa-4x mb-3 text-secondary"></i>
                    </div>
                    <h2 class="fw-bold fs-3 mb-3">
                        Our Promise to You
                    </h2>

                    <ul class="">
                        <li>Everything we do is shaped by lived experience.
                        </li>
                        <li>
                            We take time to understand your situation.</li>
                        <li>
                            We explain things in plain English.</li>
                        <li>
                            We don’t cut corners — because we’ve seen the cost when others do.</li>
                    </ul>
                    <p>Whether your estate is simple or complex, modest or substantial, our goal is the same: <b>peace of mind for you, and protection for the people you love</b>.
                    </p>
                </xd2 justify-content-betweenv>

                <!-- Right -->
                <div class="col-md-5">
                    <div class="text-center">
                        <i class="fa fa-podcast fa-4x mb-3 text-secondary"></i>
                    </div>
                    <h2 class="fw-bold fs-3 mb-3">
                        Why Clients Trust Sterling
                    </h2>

                    <p>
                       Clients choose Sterling Wills & Estate Planning because we understand what’s at stake — emotionally and financially.
                    </p>
                    <p>We’re not here to sell paperwork.</p>
                    <p>We’re here to help you avoid the years of pain, stress, and uncertainty that my family endured.</p>
                    <p>If this business had existed back then, our story would have been very different.</p>
                    <p>That’s why it exists today.</p>
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
