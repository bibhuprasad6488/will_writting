@extends('layouts.app')
@section('title', 'Witnesses')

@section('content')

    <div class="services text-center">
        <!-- HERO -->
        <div class="services text-center">
            {{-- <video class="bg-video" autoplay muted loop playsinline>
            <source src="{{ asset('assets/videos/intro.mp4') }}" type="video/mp4">
        </video> --}}
            <img src="{{ asset('assets/images/banner_bg.jpg') }}" class="bg-video" alt="Sterling Wills & Estate Planning">

            <div class="mask">
                <div class="text-white">
                    <h2 class="mb-3 inner-page-title">Witnesses</h2>
                </div>
            </div>
        </div>

        @include('layouts.mob_header')
    </div>

    <!-- INTRO -->
    <section class="py-2 cm10">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">

                    <h2 class="fw-bold fs-2 mb-2">
                        Witnesses for Your Will
                    </h2>

                    <p class="fs-4 mb-3">
                        Simple. Clear. Taken Care Of.
                    </p>

                    <p class="fs-5 mb-4">
                        Every will must be signed in front of two witnesses to be legally valid.
                        It’s a straightforward step — and in most cases, the right people are already in your life.
                    </p>

                    <p class="fs-4 fw-semibold mb-2">
                        No solicitors. No notaries. No strangers.
                    </p>

                    <p class="fs-5">
                        Just two independent adults who can watch you sign.
                    </p>

                </div>
            </div>
        </div>
    </section>

    <!-- WHY WITNESSES -->
    <section class="py-4 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">

                    <h2 class="fw-bold fs-2 mb-3">
                        Why Witnesses Are Required
                    </h2>

                    <p class="fs-5 mb-3">
                        Witnesses are there to protect you and your wishes. They confirm that:
                    </p>

                    <ul class="list-unstyled fs-5">
                        <li class="mb-2">
                            <i class="fa fa-check-square me-2"></i>
                            You signed the will willingly
                        </li>
                        <li class="mb-2">
                            <i class="fa fa-check-square me-2"></i>
                            You understood what you were signing
                        </li>
                        <li class="mb-2">
                            <i class="fa fa-check-square me-2"></i>
                            No one influenced or pressured you
                        </li>
                    </ul>

                    <p class="fs-5 mt-3">
                        Having the correct witnesses helps ensure your will stands up legally and avoids problems later.
                    </p>

                </div>
            </div>
        </div>
    </section>

    <!-- RULES -->
    <section class="py-5 mb-6 cmt10">
        <div class="container">
            <div class="row align-items-center g-5">

                <!-- Left -->
                <div class="col-md-6">
                    <h2 class="fw-bold fs-3 mb-3">
                        The 3 Witness Rules
                    </h2>

                    <p class="fs-5 mb-3">
                        Your witnesses must:
                    </p>

                    <ul class="list-unstyled fs-5">
                        <li class="mb-2">
                            <i class="fa fa-check-square me-2"></i>
                            Be 18 or over
                        </li>
                        <li class="mb-2">
                            <i class="fa fa-check-square me-2"></i>
                            Be present at the same time as you when you sign
                        </li>
                        <li class="mb-2">
                            <i class="fa fa-check-square me-2"></i>
                            Not be named in your will (or married to someone who is)
                        </li>
                    </ul>

                    <p class="fs-5 mt-3 fw-semibold">
                        If all three apply, they’re suitable.
                    </p>
                </div>

                <!-- Right -->
                <div class="col-md-6 text-center">
                    <img src="{{ asset('assets/images/witness.jpg') }}" alt="Will witnesses"
                        class="img-fluid rounded-0 shadow-sm d-none d-md-block"
                        style="max-height: 350px; object-fit: cover;">
                </div>

            </div>
        </div>
    </section>

@endsection
