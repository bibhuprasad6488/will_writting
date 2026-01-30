@extends('layouts.app')
@section('title', $blog->title)

@section('content')

    <!-- HERO -->
    <section class="section page my-6">
        <div class="container">
            <div class="row g-4"></div>
        </div>

    </section>

    <!-- MOB HEADER -->
    @include('layouts.mob_header')

    <section class="section page mt-4 mb-4">
        <div class="container mt-4">
            <div class="row g-4">
                <!-- LEFT TEXT BOXES -->
                <div class="col-sm-6 col-xs-12">
                    <div class="d-flex flex-column h-100 gap-4 mt-4 mb-4 py-4 px-0">
                        <h1>{{ $blog->title }}</h1>
                        <div class="d-flex flex-row h-100 gap-4">
                            <div class=""><i class="fa fa-user" aria-hidden="true"></i> {{ $blog->user?->name }}
                            </div>
                            <div><i class="fa fa-calendar mx-1"></i>
                                {{ \Carbon\Carbon::parse($blog->created_at)->format('M Y') }}</div>
                            <div class="feature-box flex-fill">
                                {!! $blog->description !!}
                            </div>

                        </div>

                        <div class="feature-box flex-fill">

                        </div>

                    </div>
                </div>
                <!-- RIGHT TEXT BOXES -->
                <div class="col-sm-6 col-xs-12">
                    <img src="{{ $blog->image }}" alt="{{ $blog->title }}" class="img-fluid rounded" width="100%"
                        height="500">
                    <div class="d-flex flex-column h-100 gap-4">

                        <div class="feature-box flex-fill">
                            {!! $blog->description !!}
                        </div>

                    </div>
                </div>
                <div class="col-md-9 mx-auto">
                    <div class="my-2">
                        <a href="{{ route('blogs') }}" class="text-dark">< Back to List</a>
                    </div>
                    <div>
                        @foreach ($topics as $t)
                            <a class="btn btn-secondary rounded-0 "
                                href="{{ route('blogs', array_merge(request()->query(), ['topic' => $t->slug])) }}">
                                {{ $t->name }}
                            </a>
                        @endforeach
                    </div>
                    <div class="fs-5 my-5 py-5">
                        {!! $blog->long_desc !!}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container py-5">
            <div class="fw-bold fs-5 mb-2">Featured Insights:</div>
            <h2 class="mb-3">Stay up to date with our latest insights</h2>
            <div class="row py-5">
                <div class="col-sm-3">
                    <a href="{{ route('blogs') }}" class="btn btn-secondary">View All Insights</a>
                </div>
            </div>
            <div class="row g-4">
                @foreach ($relatedBlogs as $k => $b)
                    <div class="col-md-4">
                        <a href="{{ route('blog.details', $b->slug) }}" class="text-decoration-none">
                            <div class="card service-card h-100 rounded-0 border-0 ">
                                <img src="{{ $b->image }}" class="card-img-top" width="100" height="200"
                                    alt="{{ $b->title }}">
                                <div class="card-body">
                                    <div class="d-flex justify-content-start align-items-left mb-2 p-0 border-0">
                                        <div
                                            class="text-dark fw-bold @if ($k == 0) fs-5 @else fs-5 @endif  text-decoration-none">
                                            {{ $b->title }}</div>
                                    </div>
                                    <div class="d-flex justify-content-start align-items-center mb-3 p-0 border-0">
                                        @if ($k == 0)
                                            <p>{{ Str::limit($b->short_desc, 100, '...') }}</p>
                                        @else
                                            <p>{{ Str::limit($b->short_desc, 40, '...') }}</p>
                                        @endif
                                    </div>
                                    <div class="d-flex">
                                        <div><i class="fa fa-calendar mx-1"></i>
                                            {{ \Carbon\Carbon::parse($b->created_at)->format('d-m-Y') }}</div>
                                        <div class="ms-auto"><i class="fa fa-arrow-right" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>



@endsection
