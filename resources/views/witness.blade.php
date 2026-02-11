@extends('layouts.app')
@section('title', 'Witnesses')
@section('meta_title', 'Will Witnesses Explained | Legal Witness Requirements UK | Sterling Wills')
@section('meta_description', 'Learn who can legally witness a will in the UK, the rules to follow, and how to avoid
    common mistakes. Clear guidance from Sterling Wills & Estate Planning.')

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
                        Witnesses for Your Will – Legal Requirements & Guidance
                    </h2>

                    <p class="mb-2">
                        Creating a valid <b>last will and testament</b> is an important step in protecting your assets and
                        ensuring your wishes are carried out. One of the key legal requirements in the UK is that your will
                        must be signed in front of <b>two independent witnesses.</b> This ensures that your signature is
                        genuine and that the will can be legally enforced after your death.
                    </p>
                    <p class="mb-2">
                        At <b>Sterling Wills & Estate Planning,</b> we explain everything you need to know about who can act
                        as a witness, why witnesses are essential, and how to complete this step correctly to avoid disputes
                        or challenges later. Whether you’re preparing your first will or updating an existing one, our clear
                        guidance helps you tick this legal box with confidence.
                    </p>

                    <p class=" fw-semibold mb-2">
                        No solicitors. No notaries. No strangers.
                    </p>

                    <p>
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

                    <p class=" mb-3">
                        Witnesses are there to protect you and your wishes. They confirm that:
                    </p>

                    <ul class="list-unstyled ">
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

                    <p class=" mt-3">
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

                    <p class=" mb-3">
                        Your witnesses must:
                    </p>

                    <ul class="list-unstyled ">
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

                    <p class=" mt-3 fw-semibold">
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
