@extends('admin.layouts.app')

@section('title', 'Home Page')

@section('content')
    <div class="container ">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h1 class="fw-bold mb-1">Home Page</h1>
                    </div>
                </div>
                <!-- Card -->
                <div class="card shadow-sm border-0">
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
                        <form method="POST" action="{{ route('admin.home-page-cms') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row g-4">
                                <!-- Name -->
                                <div class="col-md-12">
                                    <label class="form-label fw-semibold">
                                        Banner Title <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="banner_title"
                                        value="{{ old('banner_title', optional($homePage)->banner_title) }}"
                                        placeholder="Enter title" required>
                                    @error('banner_title')
                                        <span class="alert text-danger py-1">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label fw-semibold">
                                        Banner sub Title <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="banner_sub_title"
                                        value="{{ old('banner_sub_title', optional($homePage)->banner_sub_title) }}"
                                        placeholder="Enter sub title" required>
                                    @error('banner_sub_title')
                                        <span class="alert text-danger py-1">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">
                                        Banner Btn one Text <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="banner_btn_one_text"
                                        value="{{ old('banner_btn_one_text', optional($homePage)->banner_btn_one_text) }}"
                                        placeholder="" required>
                                    @error('banner_btn_one_text')
                                        <span class="alert text-danger py-1">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">
                                        Banner Btn two Text <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="banner_btn_two_text"
                                        value="{{ old('banner_btn_two_text', optional($homePage)->banner_btn_two_text) }}"
                                        placeholder="" required>
                                    @error('banner_btn_two_text')
                                        <span class="alert text-danger py-1">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Banner Upload -->
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">
                                        Banner Image @if (!isset($homePage->banner_image))
                                            <span class="text-danger">*</span>
                                        @endif
                                    </label>
                                    <input type="file" class="form-control" name="banner_image"
                                        accept=".jpg,.jpeg,.png,.webp" onchange="previewImageBanner(event)"
                                        @if (!isset($homePage->banner_image)) required @endif>

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
                                            @if (isset($homePage->banner_image)) src="{{ $homePage->banner_image }}" style="max-height: 120px;max-width:100%;" @else style="max-height: 120px; display: none;max-width:100%;" @endif
                                            alt="Banner Preview" style="max-height: 120px; display: none;">
                                        <div class="text-muted small mt-2">
                                            Banner Preview
                                        </div>
                                    </div>
                                </div>

                                <!-- Banner Upload -->
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">
                                        Left Image @if (!isset($homePage->ww_image))
                                            <span class="text-danger">*</span>
                                        @endif
                                    </label>
                                    <input type="file" class="form-control" name="ww_image"
                                        accept=".jpg,.jpeg,.png,.webp" onchange="previewImage(event)"
                                        @if (!isset($homePage->ww_image)) required @endif>

                                    <small class="text-muted">
                                        Supported formats: JPG, PNG, JPEG, WEBP (Max 2MB)
                                    </small>
                                    @error('ww_image')
                                        <span class="alert text-danger py-1">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Banner Preview -->
                                <div class="col-md-6 py-2">
                                    <div class="border rounded p-2 w-100 text-center bg-light">
                                        <img id="imagePreview"
                                            @if (isset($homePage->ww_image)) src="{{ $homePage->ww_image }}" style="max-height: 120px;max-width:100%;" @else style="max-height: 120px; display: none;max-width:100%;" @endif
                                            alt="Preview" style="max-height: 120px; display: none;">
                                        <div class="text-muted small mt-2">
                                            Preview
                                        </div>
                                    </div>
                                </div>

                                <!-- Description -->
                                <div class="col-md-12">
                                    <label class="form-label fw-semibold">
                                        Right Content
                                    </label>
                                    <textarea name="ww_desc" rows="4" class="form-control" id="summernote" placeholder="Optional description">{{ old('ww_desc', optional($homePage)->ww_desc) }}</textarea>
                                </div>
                                <!-- Meta Title -->
                                <div class="col-md-4 d-none">
                                    <label class="form-label fw-semibold">
                                        Meta Title
                                    </label>
                                    <input type="text" class="form-control" name="meta_title"
                                        value="{{ old('meta_title', optional($homePage)->meta_title) }}"
                                        placeholder="Meta title">
                                </div>
                                <!-- Meta Desc -->
                                <div class="col-md-4 d-none">
                                    <label class="form-label fw-semibold">
                                        Meta Description
                                    </label>
                                    <textarea name="meta_desc" id="meta_desc" cols="" class="form-control" rows="5"
                                        placeholder="Meta Description">{{ old('meta_desc', optional($homePage)->meta_desc) }}</textarea>
                                </div>
                                <!-- Meta Keys -->
                                <div class="col-md-4 d-none">
                                    <label class="form-label fw-semibold">
                                        Meta Keywords
                                    </label>
                                    <textarea name="meta_key" id="meta_key" cols="" class="form-control" rows="5"
                                        placeholder="Meta keywords">{{ old('meta_key', optional($homePage)->meta_key) }}</textarea>
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
        </div>

    </div>
@endsection

@push('scripts')
    <script>
        function previewImage(event) {
            const input = event.target;
            const preview = document.getElementById('imagePreview');

            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = e => {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

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
