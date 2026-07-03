@extends('admin.layouts.app')
@section('title', 'Our Story')
@section('content')
    <div class="container-fluid px-4">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="py-2">
                <h1 class="mt-4">Our Story</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item">Dashboard</li>
                    <li class="breadcrumb-item active">Our Story</li>
                </ol>
            </div>
            <div class="ms-auto d-none">
                <div class="btn-group">
                    <a href="#" class="btn btn-primary">Add</a>
                </div>
            </div>
        </div>
        <!-- Card -->
        <div class="card shadow-sm border-0">
            <div class="card-header bg-light fw-semibold">
                Our Story Information
            </div>

            @if (session('success'))
                <div class="alert alert-success mx-4 mt-3 rounded-3 shadow-sm" id="success-alert">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger mx-4 mt-3 rounded-3 shadow-sm" id="success-alert">
                    {{ session('error') }}
                </div>
            @endif
            <div class="card-body">
                <form method="POST" action="{{ route('admin.our.story.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="row mb-3 g-4">
                        <!-- Name -->
                        <div class="col-md-12">
                            <label class="form-label fw-semibold">
                                Banner Title <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" name="page_title"
                                value="{{ old('page_title', optional($story)->page_title) }}" placeholder="Enter title"
                                required>
                            @error('page_title')
                                <span class="alert text-danger py-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Banner Upload -->
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">
                                Banner Image @if (!isset($story->banner_image))
                                    <span class="text-danger">*</span>
                                @endif
                            </label>
                            <input type="file" class="form-control" name="banner_image" accept=".jpg,.jpeg,.png,.webp"
                                onchange="previewImageBanner(event)" @if (!isset($story->banner_image)) required @endif>

                            <small class="text-muted">
                                Supported formats: JPG, PNG, JPEG, WEBP (Max 2MB)
                            </small>
                            @error('banner_image')
                                <span class="alert text-danger py-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Banner Preview -->
                        <div class="col-md-6 py-2">
                            <div class="border rounded p-2 w-100 text-center bg-light">
                                <img id="imagePreview1"
                                    @if (isset($story->banner_image)) src="{{ $story->banner_image }}" style="max-height: 120px;max-width:100%;" @else style="max-height: 120px; display: none;max-width:100%;" @endif
                                    alt="Banner Preview" style="max-height: 120px; display: none;">
                                <div class="text-muted small mt-2">
                                    Banner Preview
                                </div>
                            </div>
                        </div>
                        <!-- Description -->
                        <div class="col-md-12">
                            <label class="form-label fw-semibold">
                                First Description
                            </label>
                            <textarea name="story_desc_one" rows="4" class="form-control" id="summernote" placeholder="Content">{{ $story->story_desc_one ?? old('story_desc_one') }}</textarea>
                        </div>

                    </div>
                    <div class="row mb-3 g-4">
                        <!-- Description -->
                        <div class="col-md-12">
                            <label class="form-label fw-semibold">
                                Second Description
                            </label>
                            <textarea name="story_desc_two" rows="4" class="form-control" id="cont" placeholder="Content">{{ $story->story_desc_two ?? old('story_desc_two') }}</textarea>
                        </div>

                    </div>
                    <div class="row mb-3 g-4">
                        <!-- Approach -->
                        <div class="col-md-4">
                            <div class="card border-0">
                                <div class="card-header border-0 fw-bold">
                                    1st Approach
                                </div>
                                <div class="card-body p-1">
                                    <div class="mb-3">
                                        <input type="text" class="form-control border-secondary" name="ap_title_one"
                                            placeholder="Title" value="{{ $story->ap_title_one ?? old('ap_title_one') }}">
                                    </div>
                                    <textarea name="ap_desc_one" rows="4" class="form-control" placeholder="Content">{{ $story->ap_desc_one ?? old('ap_desc_one') }}</textarea>
                                </div>
                            </div>
                        </div>
                        <!-- Approach -->
                        <div class="col-md-4">
                            <div class="card border-0">
                                <div class="card-header border-0 fw-bold">
                                    2nd Approach
                                </div>
                                <div class="card-body p-1">
                                    <div class="mb-3">
                                        <input type="text" class="form-control border-secondary" name="ap_title_two"
                                            placeholder="Title" value="{{ $story->ap_title_two ?? old('ap_title_two') }}">
                                    </div>
                                    <textarea name="ap_desc_two" rows="4" class="form-control" placeholder="Content">{{ $story->ap_desc_two ?? old('ap_desc_two') }}</textarea>
                                </div>
                            </div>
                        </div>
                        <!-- Approach -->
                        <div class="col-md-4">
                            <div class="card border-0">
                                <div class="card-header border-0 fw-bold">
                                    3rd Approach
                                </div>
                                <div class="card-body p-1">
                                    <div class="mb-3">
                                        <input type="text" class="form-control border-secondary" name="ap_title_three"
                                            placeholder="Title"
                                            value="{{ $story->ap_title_three ?? old('ap_title_three') }}">
                                    </div>
                                    <textarea name="ap_desc_three" rows="4" class="form-control" placeholder="Content">{{ $story->ap_desc_three ?? old('ap_desc_three') }}</textarea>
                                </div>
                            </div>
                        </div>
                        <!-- Approach -->
                        <div class="col-md-6">
                            <div class="card border-0">
                                <div class="card-header border-0 fw-bold">
                                    Meta Title
                                </div>
                                <div class="card-body p-1">
                                    <div class="mb-3">
                                        <input type="text" class="form-control border-secondary" name="meta_title"
                                            placeholder="Title" value="{{ $story->meta_title ?? old('meta_title') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Approach -->
                        <div class="col-md-6">
                            <div class="card border-0">
                                <div class="card-header border-0 fw-bold">
                                    Meta Description
                                </div>
                                <div class="card-body p-1">
                                    <textarea name="meta_desc" rows="4" class="form-control" placeholder="Description..">{{ $story->meta_desc ?? old('meta_desc') }}</textarea>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Actions -->
                    <div class="mt-4 d-flex justify-content-end gap-2">
                        <button type="submit" class="btn btn-primary px-4">
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <style>
        .tox-editor-container {
            border: 1px solid #adb5bd !important;
        }
    </style>
@endsection
@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            $('#cont').summernote({
                placeholder: 'Content',
                tabsize: 2,
                height: 300
            });
        });

        function previewImageBanner(event) {
            const input = event.target;
            const preview = document.getElementById('imagePreview1');

            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = e => {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endpush
