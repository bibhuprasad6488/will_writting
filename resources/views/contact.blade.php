@extends('layouts.app')
@section('title', 'Contact Us')

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
                    <h2 class="mb-3 inner-page-title">Contact Us</h2>
                    <p></p>
                </div>
            </div>
        </div>

        <!-- MOB HEADER -->
        @include('layouts.mob_header')

    </div>


    <section class="cta ">
        @php
            $siteSetting = \App\Models\SiteSetting::find(1);
        @endphp
        @if ($siteSetting)
            {!! $siteSetting->site_map_key !!}
        @endif
        <div class="container py-7">
            <div class="row  text-center rounded-0">
                <div class="col-lg-6 px-5">
                    <h2 class="cta-title mb-3">
                        Office Address one
                    </h2>

                    <p class="cta-subtitle mb-4">
                        Contact us today and experience personalised and expert legal assistance
                        to support all of your personal matters.
                    </p>
                </div>

                <div class="col-lg-6 px-5">
                    <h2 class="cta-title mb-3">
                        Office Address two
                    </h2>

                    <p class="cta-subtitle mb-4">
                        Contact us today and experience personalised and expert legal assistance
                        to support all of your personal matters.
                    </p>
                </div>

            </div>

        </div>
    </section>

    <section class="py-5 mb-6 cmt10 ">
        <div class="container">
            <div class="row text-center rounded-0 ">
                <div class="col-lg-12">
                    <h2 class="fw-bold fs-1 mb-4">
                        Get in touch today For A Free Consultation
                    </h2>

                    @if (session('success'))
                        <div class="alert alert-success mx-1 mt-3 rounded-3 shadow-sm" id="success-alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger mx-1 mt-3 rounded-3 shadow-sm" id="success-alert">
                            {{ session('error') }}
                        </div>
                    @endif
                    <form action="{{ route('contact.submit') }}" method="post">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="text" class="form-control border-secondary rounded-0" name="ct_name"
                                placeholder="Your name" required>
                        </div>
                        <div class="input-group mb-3">
                            <input type="email" class="form-control border-secondary rounded-0" name="ct_email"
                                placeholder="Your email" required>
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control border-secondary rounded-0 numeric-only"
                                name="ct_phone" placeholder="Your phone" required>
                        </div>
                        <div class="input-group mb-3">
                            <textarea name="ct_message" id="ct_message" rows="5" class="form-control border-secondary rounded-0"
                                placeholder="Your message" required></textarea>
                        </div>
                        <button type="submit"
                            class="btn btn-dark rounded-circle fw-bold d-flex align-items-center justify-content-center p-4"
                            style="width: 65px; height: 65px;">
                            Submit
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
@push('scripts')
    <script>
        $(document).on('input', '.numeric-only', function() {
            this.value = this.value.replace(/\D/g, '');
        });
    </script>
@endpush
