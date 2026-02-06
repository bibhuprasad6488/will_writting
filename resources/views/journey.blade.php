@extends('layouts.app')
@section('title', 'Guided Journey')

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
                    <h2 class="mb-3 inner-page-title">Your Guided Will Experience</h2>
                    <p><b>Expert support at each step to ensure your wishes are clearly recorded and protected.</b></p>
                </div>
            </div>
        </div>

        <!-- MOB HEADER -->
        @include('layouts.mob_header')

    </div>

    <section class="section page cm10">
        <div class="container">
            <div class="row g-4">

                <!-- RIGHT TEXT BOXES -->
                <div class="col-xs-12">
                    <div class="d-flex flex-column h-100 gap-4">

                        <div class="feature-box flex-fill">
                            <h2 class="text-center">How the journey works...</h2>
                            <p>Our guided journey is designed to make will writing and estate planning clear, structured,
                                and stress-free. Whether you need a will, trust planning, estate planning, lasting power of
                                attorney, or related services, we guide you through every stage with expert support. From
                                understanding your personal circumstances and choosing the right service, to gathering
                                information, preparing your documents, and ensuring they are correctly signed, we take care
                                of the details. </p>
                            <p>Once complete, your documents are securely stored, with ongoing support
                                available as your needs change. This step-by-step approach ensures your wishes are
                                accurately recorded, legally compliant, and protected for the future. With clear guidance at
                                every step, you can move forward with confidence, knowing your assets, family, and legacy
                                are in safe hands.</p>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- <section class="section guided_journey pb-5">
        <div class="container">
            <h2 class="text-center mb-5 maastrix">Guided Journey</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card text-center rounded-0"><img src="{{ asset('assets/images/step1.jpg') }}">
                        <p>Step1 : Analysis</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-center rounded-0"><img src="{{ asset('assets/images/step2.jpg') }}">
                        <p>Step2 : Choose Right Service</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-center rounded-0"><img src="{{ asset('assets/images/step3.jpg') }}">
                        <p>Step3 : Detailed Fact Finding</p>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-4">
                    <div class="card text-center rounded-0"><img src="{{ asset('assets/images/step4.jpg') }}">
                        <p>Step4 : Review Your Info</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-center rounded-0"><img src="{{ asset('assets/images/step5.jpg') }}">
                        <p>Step5 : Document Preparation</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-center rounded-0"><img src="{{ asset('assets/images/step6.jpg') }}">
                        <p>Step6 : Signing and Next</p>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-6">
                    <div class="card text-center rounded-0"><img src="{{ asset('assets/images/step7.jpg') }}">
                        <p>Step7 : Secure Storage</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card text-center rounded-0"><img src="{{ asset('assets/images/step8.jpg') }}">
                        <p>Step8 : Ongoing Support</p>
                    </div>
                </div>
            </div>
        </div>


    </section> --}}


    <section class="py-5">

        <div class="timeline">
            <div class="timeline-progress"></div>

            <ul>
                <li>
                    <div class="content">
                        <h3>Getting Started </h3>
                        <p>(Analysis + Choosing the right service)</p>
                        <p>Kick off your estate planning journey by understanding your needs and choosing the right service.
                            Whether it’s will writing, trust setup, or estate planning, our guided approach ensures you make
                            informed decisions that protect your assets and secure your family’s future.</p>
                    </div>
                    <div class="time">
                        <!-- <h4>January 2018</h4> -->
                        <img src="{{ asset('assets/images/step1.jpg') }}" class="img-fluid step-img" alt="Consultation">
                    </div>
                </li>

                <li>
                    <div class="content">
                        <h3>Provide Your Information </h3>
                        <p>(Fact finding + Review)</p>
                        <p>Share all necessary details about your assets, family, and personal wishes. Our experts carefully
                            review the information to ensure nothing is missed, creating a complete and accurate picture.
                            This step ensures your estate plan is fully tailored to your circumstances and long-term goals.
                        </p>
                    </div>
                    <div class="time">
                        <!-- <h4>February 2018</h4> -->
                        <img src="{{ asset('assets/images/step2.jpg') }}" class="img-fluid step-img" alt="Consultation">
                    </div>
                </li>

                <li>
                    <div class="content">
                        <h3>We Prepare Your Will </h3>
                        <p>(Document preparation + Signing)</p>
                        <p>We draft your will or legal documents in line with your instructions. Our team ensures every
                            detail is precise, then guides you through the signing process to make it legally binding. This
                            step gives you confidence that your wishes will be followed exactly as intended.</p>
                    </div>
                    <div class="time">
                        <!-- <h4>March 2018</h4> -->
                        <img src="{{ asset('assets/images/step3.jpg') }}" class="img-fluid step-img" alt="Consultation">
                    </div>
                </li>

                <li>
                    <div class="content">
                        <h3>Storage and Ongoing Support </h3>
                        <p>(Secure storage + Ongoing support)</p>
                        <p>Once your documents are prepared, we securely store them and provide ongoing support. Updates and
                            guidance are available whenever your circumstances change, ensuring your estate plan remains
                            effective and your family’s future is always protected.</p>
                    </div>
                    <div class="time">
                        <!-- <h4>April 2018</h4> -->
                        <img src="{{ asset('assets/images/step4.jpg') }}" class="img-fluid step-img" alt="Consultation">
                    </div>
                </li>

                <div style="clear:both;"></div>
            </ul>
        </div>
    </section>

    <style>
        .timeline {
            position: relative;
            margin: 50px auto;
            padding: 40px 0;
            max-width: 1000px;
            box-sizing: border-box;
        }

        /* Base vertical line */
        .timeline::before {
            content: '';
            position: absolute;
            left: 50%;
            top: 0;
            bottom: 0;
            width: 2px;
            background: #e0e0e0;
            z-index: 0;
        }

        /* Animated progress line */
        .timeline-progress {
            position: absolute;
            left: 50%;
            top: 0;
            width: 5px;
            height: 0;
            background: gray;
            transition: height 0.25s ease-out;
        }

        /* Reset list */
        .timeline ul {
            margin: 0;
            padding: 0;
            list-style: none;
            counter-reset: step;
        }

        /* Timeline item */
        .timeline ul li:nth-child(odd) {
            position: relative;
            width: 50%;
            padding: 20px 104px 40px 10px;
            box-sizing: border-box;
            opacity: 0.35;
            transition: opacity 0.4s ease, transform 0.4s ease;
            margin-bottom: 100px;
        }

        .timeline ul li:nth-child(even) {
            position: relative;
            width: 50%;
            padding: 20px 10px 40px 100px;
            box-sizing: border-box;
            opacity: 0.35;
            transition: opacity 0.4s ease, transform 0.4s ease;
            margin-bottom: 100px;
        }

        .timeline ul li:last-child {
            margin-bottom: 0px;
        }

        /* Alternating layout */
        .timeline ul li:nth-child(odd) {
            float: left;
            text-align: right;
            clear: both;
        }

        .timeline ul li:nth-child(even) {
            float: right;
            text-align: left;
            clear: both;
        }

        .timeline ul li::before {
            counter-increment: step;
            content: counter(step);
            position: absolute;
            top: 24px;
            width: 50px;
            height: 50px;
            background: #1b1618;
            color: #fff;
            font-size: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 2;
            box-shadow: 0 0 0 3px rgba(29, 18, 21, 0.2);
            transition: all 0.3s ease;
        }

        /* Circle positioning */
        .timeline ul li:nth-child(odd)::before {
            right: -26px;
        }

        .timeline ul li:nth-child(even)::before {
            left: -23px;
        }

        /* Active step */
        .timeline ul li.active {
            opacity: 1;
        }

        .timeline ul li.active::before {
            background: gray;
            transform: scale(1.15);
            box-shadow: -4px 6px 13px 5px rgba(0, 0, 0, 0.3);
        }

        .content {
            display: block;
        }

        .timeline ul li h3 {
            margin: 0;
            font-size: 22px;
            color: #000;
        }

        .timeline ul li p {
            margin: 10px 0 0;
            line-height: 1.6;
            color: #444;
        }

        .step-img {
            max-width: 350px;
        }

        .timeline ul li .time {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: transparent;
            box-shadow: 0 0 0 3px rgba(24, 20, 21, 0.25);
        }

        /* Image positioning */
        .timeline ul li:nth-child(odd) .time {
            right: -482px;
        }

        .timeline ul li:nth-child(even) .time {
            left: -482px;
        }

        /* Clear floats */
        .timeline ul li::after {
            content: '';
            display: block;
            clear: both;
        }

        @media (max-width: 1000px) {
            .timeline {
                max-width: 100%;
            }
        }

        @media (max-width: 767px) {

            /* Timeline spine */
            .timeline::before,
            .timeline-progress {
                left: 20px;
            }

            /* Reset layout */
            .timeline ul li {
                width: 100%;
                float: none;
                padding: 20px 15px 30px 60px;
                text-align: left;
                margin-bottom: 40px;
                opacity: 1;
            }

            /* Step circle */
            .timeline ul li::before {
                top: 18px;
                left: 0;
                right: auto;
                width: 36px;
                height: 36px;
                font-size: 18px;
            }

            /* Content spacing */
            .timeline ul li .content h3 {
                font-size: 18px;
            }

            .timeline ul li .content p {
                font-size: 14px;
                margin-top: 6px;
            }

            /* Image container reset */
            .timeline ul li .time {
                position: relative;
                top: auto;
                left: auto;
                right: auto;
                transform: none;
                margin-top: 12px;
                box-shadow: none;
            }


            /* Image sizing */
            .step-img {
                max-width: 100%;
                width: 180px;
                display: block;
            }
        }

        @media (max-width: 576px) {

            /* Kill desktop behavior completely */
            .timeline ul li,
            .timeline ul li:nth-child(odd),
            .timeline ul li:nth-child(even) {
                float: none !important;
                width: 100% !important;
                padding: 20px 15px 30px 60px !important;
                text-align: left !important;
                margin-bottom: 40px !important;
                opacity: 1 !important;
            }

            /* Timeline vertical line */
            .timeline::before,
            .timeline-progress {
                left: 20px !important;
            }

            /* Step number circle */
            .timeline ul li::before {
                left: 4px !important;
                right: auto !important;
                top: 18px !important;
                width: 34px !important;
                height: 34px !important;
                font-size: 16px !important;
            }

            /* Image container — HARD RESET */
            .timeline ul li .time {
                position: relative !important;
                left: auto !important;
                right: auto !important;
                top: auto !important;
                transform: none !important;
                margin-top: 12px !important;
                box-shadow: none !important;
            }

            /* Images */
            .step-img {
                max-width: 100% !important;
                width: 160px !important;
            }
        }
    </style>

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
                    <a href="{{ route('start.will') }}"
                        class="btn btn-light w-100 py-3 rounded-0 text-uppercase fw-semibold">
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
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const timeline = document.querySelector('.timeline');
            const progressLine = document.querySelector('.timeline-progress');
            const items = document.querySelectorAll('.timeline ul li');

            function updateTimeline() {
                const timelineRect = timeline.getBoundingClientRect();
                const windowHeight = window.innerHeight;
                const scrollMiddle = window.scrollY + windowHeight / 1.5;

                const start = timeline.offsetTop;
                const end = start + timeline.offsetHeight;

                let progress = scrollMiddle - start;
                progress = Math.max(0, Math.min(progress, timeline.offsetHeight));

                progressLine.style.height = progress + 'px';

                items.forEach(item => {
                    const itemTop = item.offsetTop + timeline.offsetTop;
                    if (scrollMiddle >= itemTop) {
                        item.classList.add('active');
                    } else {
                        item.classList.remove('active');
                    }
                });
            }

            window.addEventListener('scroll', updateTimeline);
            window.addEventListener('resize', updateTimeline);
            updateTimeline();
        });
    </script>
@endpush
