@extends('layouts.app')
@section('title', 'Terms of Business')

@section('content')

    <!-- HERO -->
    <div class="services text-center" style="background-image: url('{{ asset('assets/images/banner_bg.jpg') }}')">
        {{-- <video class="bg-video" autoplay muted loop playsinline>
            <source src="{{ asset('assets/videos/intro.mp4') }}" type="video/mp4">
        </video> --}}
        {{-- <img src="{{ asset('assets/images/banner_bg.jpg') }}" class="bg-video" alt="Sterling Wills & Estate Planning"> --}}

        <div class="mask">
            <div class="text-white">
                <h2 class="mb-3 inner-page-title">Terms of Business</h2>
            </div>
        </div>
    </div>

    @include('layouts.mob_header')

    <section class=" mb-6 cm10">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    {!! $term->content ?? '' !!}
                </div>
            </div>
        </div>
    </section>
@endsection
