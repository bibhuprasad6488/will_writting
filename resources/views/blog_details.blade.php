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

            </div>
        </div>
    </section>

@endsection
