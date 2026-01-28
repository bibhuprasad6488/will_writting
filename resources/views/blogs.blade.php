@extends('layouts.app')
@section('title', 'Insights')

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
                    <h2 class="mb-3 inner-page-title">Case Study</h2>
                    <p></p>
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

                        <div class="feature-box flex-fill border-bottom border-secondary p-3">
                            <div class="fw-bold fs-5 mb-2">Filter:</div>

                            <form action="{{ route('blogs') }}" method="get">
                                {{-- Search bar --}}
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control border border-secondary rounded"
                                        name="search" placeholder="Search..." value="{{ $search }}">
                                    <button class="btn btn-secondary mx-1" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                    <a href="{{ route('blogs') }}" class="btn btn-secondary">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>

                                {{-- Topic buttons --}}
                                <div class="d-flex flex-wrap gap-2">
                                    {{-- All topics --}}
                                    <a class="btn btn-outline-secondary text-dark
                    @if (!isset($topic)) active text-white @endif"
                                        href="{{ route('blogs') }}">
                                        All
                                    </a>

                                    {{-- Individual topics --}}
                                    @foreach ($topics as $t)
                                        <a class="btn btn-outline-secondary text-dark
                        @if (isset($topic) && $topic->id === $t->id) active text-white @endif"
                                            href="{{ route('blogs', array_merge(request()->query(), ['topic' => $t->slug])) }}">
                                            {{ $t->name }}
                                        </a>
                                    @endforeach
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            {{-- <h2 class="text-center mb-5 maastrix">Our Services</h2> --}}
            <div class="row g-4">
                @foreach ($blogs as $k => $blog)
                    <div class="@if ($k == 0) col-md-8
                    @else col-md-4 @endif ">
                        <a href="{{ route('blog.details', $blog->slug) }}" class="text-decoration-none">
                            <div class="card service-card h-100 rounded-0 border-0 ">
                                <img src="{{ asset('storage/images/case_studies/' . $blog->image) }}" class="card-img-top"
                                    width="100" height="200" alt="{{ $blog->title }}">
                                <div class="card-body">
                                    <div class="d-flex justify-content-start align-items-left mb-2 p-0 border-0">
                                        <div
                                            class="text-dark fw-bold @if ($k == 0) fs-5 @else fs-5 @endif  text-decoration-none">
                                            {{ $blog->title }}</div>
                                    </div>
                                    <div class="d-flex justify-content-start align-items-center mb-3 p-0 border-0">
                                        @if ($k == 0)
                                            <p>{{ Str::limit($blog->short_desc, 100, '...') }}</p>
                                        @else
                                            <p>{{ Str::limit($blog->short_desc, 40, '...') }}</p>
                                        @endif
                                    </div>
                                    <div class="d-flex">
                                        <div><i class="fa fa-calendar mx-1"></i>
                                            {{ \Carbon\Carbon::parse($blog->created_at)->format('d-m-Y') }}</div>
                                        <div class="ms-auto"><i class="fa fa-arrow-right" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="row mt-4">
                <div class="col-12 d-flex justify-content-center">
                    {{ $blogs->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
        <style>
            /* 1. Hide "Showing X to Y of Z results" text */
            .pagination+div,
            .pagination-info,
            .small.text-muted {
                display: none !important;
            }

            /* 2. Center align pagination */
            .pagination {
                justify-content: center;
            }

            /* 3. Space between pagination buttons */
            .pagination .page-item {
                margin: 0 6px;
            }


            /* 4. Base pagination button styling */
            .pagination .page-link {
                color: #555;
                border: 1px solid #ddd;
                border-radius: 4px;
                padding: 6px 12px;
                font-size: 16px;
                /* try 16–18px */
                font-weight: 500;
            }

            /* 5. Active page styling */
            .pagination .page-item.active .page-link {
                background-color: #e0e0e0;
                /* grey */
                border-color: #ccc;
                color: #000;
                font-size: 17px;
                font-weight: 600;
            }

            /* 6. Hover effect (optional but polished) */
            .pagination .page-link:hover {
                background-color: #f2f2f2;
                color: #000;
            }

            /* 7. Disabled state cleanup */
            .pagination .page-item.disabled .page-link {
                color: #aaa;
                background-color: #fafafa;
                border-color: #eee;
            }

            /* Optional: arrows a bit bolder */
            .pagination .page-link[aria-label="Next »"],
            .pagination .page-link[aria-label="« Previous"],
            .pagination .page-link[rel="next"] {
                font-size: 18px;
            }
        </style>
    </section>


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


@endsection
