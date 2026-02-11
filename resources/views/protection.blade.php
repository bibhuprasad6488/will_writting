@extends('layouts.app')
@section('title', 'Protection')

@section('content')

    <!-- HERO -->
    <div class="servics cmt10 pt-5" class="text-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="fw-bold">Protection</h1>
                    <h4 class="mt-3">Safeguarding Your Family’s Future</h4>
                    <p class="mt-3">
                        At Sterling Wills, we believe that protecting your family and financial security is just as important as preparing your will. That’s why we work in partnership with <b>independent protection specialists </b> offer you tailored advice on financial protection solutions that may help provide peace of mind.
                    </p>

                    <ul class="list-unstyled mt-4">
                        <li>✔ Qualified & Experienced Advisers</li>
                        <li>✔ Independent & FCA Regulated</li>
                    </ul>
                </div>
                <div class="col-lg-6 text-center">
                    <!-- Replace with your image -->
                    <img src="{{ asset('assets/images/protection.png') }}" class="img-fluid rounded" alt="Protection">
                </div>
            </div>
        </div>
    </div>

    <!-- MOB HEADER -->
    @include('layouts.mob_header')

    <!-- SERVICES -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-5 fw-bold">Our Protection Services</h2>

            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="service-card text-center">
                        <div class="service-icon">
                            <img src="{{ asset('assets/images/ps1.png') }}" alt="Life Insurance">
                        </div>
                        <h5 class="fw-bold">Life Insurance</h5>
                        <p>Financial security for your loved ones.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="service-card text-center">
                        <div class="service-icon">
                            <img src="{{ asset('assets/images/ps2.png') }}" alt="Income Protection">
                        </div>
                        <h5 class="fw-bold">Income Protection</h5>
                        <p>Safeguard your income if you’re unable to work.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="service-card text-center">
                        <div class="service-icon">
                            <img src="{{ asset('assets/images/ps3.png') }}" alt="Critical Illness Cover">
                        </div>
                        <h5 class="fw-bold">Critical Illness Cover</h5>
                        <p>Support in case of serious illness.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="service-card text-center">
                        <div class="service-icon">
                            <img src="{{ asset('assets/images/ps4.png') }}" alt="Family Protection">
                        </div>
                        <h5 class="fw-bold">Family Protection</h5>
                        <p>Comprehensive cover for your family’s future.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- PARTNER -->
    <section class="py-4 bg-light">
        <div class="container partn">
            <h5 class="fs-4 text-center">In Partnership with <strong>Portman Rise</strong></h5>
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <p class="mt-3 fs-5">
                        All protection advice is provided by the independent specialists at Portman Rise. Experts you can
                        trust.
                    </p>

                </div>
                <div class="col-lg-6 text-center border-secondary portman">
                    <!-- Replace with your image -->
                    <img src="{{ asset('assets/images/Portman_Rise_Logo.svg') }}" class="img-fluid rounded border"
                        alt="Protection">
                </div>
            </div>
        </div>
    </section>

    <!-- HOW IT WORKS -->
    <section class="py-5">
        <div class="container">
            <p class="mb-5">Our process starts with an <b>initial consultation</b> to understand your situation, followed by a referral to the regulated advisers at Portman Rise. They’ll provide <b>personalised, FCA-regulated advice </b> recommend protection solutions tailored to your needs.</p>
            <h2 class="text-center mb-5 fw-bold">How It Works</h2>

            <div class="row g-4">
                <div class="col-md-3">
                    <div class="step-box text-center">
                        <strong>1</strong>
                            <img src="{{ asset('assets/images/hw1.png') }}" height="100" alt="Life Insurance">
                        <p class="mt-2">✔ Initial Consultation</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="step-box text-center">
                        <strong>2</strong>
                            <img src="{{ asset('assets/images/hw2.png') }}" height="100" alt="Life Insurance">
                        <p class="mt-2">✔ Referred to Portman Rise</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="step-box text-center">
                        <strong>3</strong>
                            <img src="{{ asset('assets/images/hw3.png') }}" height="100" alt="Life Insurance" style="transform: rotateY(180deg)">
                        <p class="mt-2">✔ Personalised Advice</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="step-box text-center">
                        <strong>4</strong>
                            <img src="{{ asset('assets/images/hw4.png') }}" height="100" alt="Life Insurance"  style="transform: rotateY(180deg)">
                        <p class="mt-2">✔ Tailored Solutions</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="py-5">
        <div class="container">
            <div class="cta text-center py-4">
                <h3 class="text-white">Speak to a Protection Adviser</h3>
                <span class="w-50">
                    <hr class="text-secondary">
                </span>
                <a href="{{ route('contact') }}" class="btn btn-light  rounded-0 text-uppercase fw-semibold mt-3 px-5">Get
                    in
                    Touch</a>
            </div>

            <div class="py-5">
                <p>
                    Please note that <b>Sterling Wills is not authorised or regulated by the Financial Conduct Authority (FCA)</b> and does not provide financial advice. All protection advice is provided independently by Portman Rise, who are FCA-regulated specialists.
                </p>
                <p class="fst-italic d-none">
                    All protection advice is provided by Portman Rise, independent and FCA regulated specialists.
                </p>
            </div>
        </div>
    </section>
    <style>
        .service-card {
            border: 1px solid #e5e5e5;
            padding: 30px;
            border-radius: 8px;
            height: 100%;
        }

        .service-icon {
            font-size: 40px;
            margin-bottom: 15px;
            filter: grayscale(100%);
        }

        .partner-box {
            border: 1px solid #ddd;
            padding: 20px;
            text-align: center;
        }

        .step-box {
            background: #f8f9fa;
            padding: 25px;
            border-radius: 8px;
            height: 100%;
        }

        .step-box strong {
            background: #000;
            color: #fff;
            border-radius: 25px;
            padding: 6px 14px;
            justify-content: start;
            font-size: 19px;
        }

        .cta {
            background: #2b2b2b;
            color: #fff;
            padding: 50px 20px;
            text-align: center;
            /* border-radius: 8px; */
        }

        .cta .btn {
            background: #fff;
            color: #000;
            font-weight: 600;
        }

        .disclaimer {
            font-size: 14px;
            color: #312f2f;
            margin-top: 40px;
        }
    </style>
@endsection
