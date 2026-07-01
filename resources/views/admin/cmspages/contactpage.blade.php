@extends('admin.layouts.app')

@section('title', 'Contact Us Page')

@section('content')
    <div class="container ">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h1 class="fw-bold mb-1">Contact Us Page</h1>
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
                        <form method="POST" action="{{ route('admin.contact-us-page') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row g-4">
                                <!-- Name -->
                                <div class="col-md-12">
                                    <label class="form-label fw-semibold">
                                        Page Title <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="page_title"
                                        value="{{ old('page_title', optional($contactPage)->page_title) }}"
                                        placeholder="Enter page title" required>
                                    @error('page_title')
                                        <span class="alert text-danger py-1">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Banner Upload -->
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">
                                        Banner Image @if (!isset($contactPage->banner_image))
                                            <span class="text-danger">*</span>
                                        @endif
                                    </label>
                                    <input type="file" class="form-control" name="banner_image"
                                        accept=".jpg,.jpeg,.png,.webp" onchange="previewImageBanner(event)"
                                        @if (!isset($contactPage->banner_image)) required @endif>

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
                                            @if (isset($contactPage->banner_image)) src="{{ $contactPage->banner_image }}" style="max-height: 120px;max-width:100%;" @else style="max-height: 120px; display: none;max-width:100%;" @endif
                                            alt="Banner Preview" style="max-height: 120px; display: none;">
                                        <div class="text-muted small mt-2">
                                            Banner Preview
                                        </div>
                                    </div>
                                </div>

                                <!-- Banner Upload -->
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">
                                        Right Image @if (!isset($contactPage->c_img))
                                            <span class="text-danger">*</span>
                                        @endif
                                    </label>
                                    <input type="file" class="form-control" name="c_img"
                                        accept=".jpg,.jpeg,.png,.webp" onchange="previewImage(event)"
                                        @if (!isset($contactPage->c_img)) required @endif>

                                    <small class="text-muted">
                                        Supported formats: JPG, PNG, JPEG, WEBP (Max 2MB)
                                    </small>
                                    @error('c_img')
                                        <span class="alert text-danger py-1">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Banner Preview -->
                                <div class="col-md-6 py-2">
                                    <div class="border rounded p-2 w-100 text-center bg-light">
                                        <img id="imagePreview"
                                            @if (isset($contactPage->c_img)) src="{{ $contactPage->c_img }}" style="max-height: 120px;max-width:100%;" @else style="max-height: 120px; display: none;max-width:100%;" @endif
                                            alt="Preview" style="max-height: 120px; display: none;">
                                        <div class="text-muted small mt-2">
                                            Preview
                                        </div>
                                    </div>
                                </div>

                                <!-- Description -->
                                <div class="col-md-12">
                                    <label class="form-label fw-semibold">
                                        Page Content
                                    </label>
                                    <textarea name="page_desc" rows="4" class="form-control" id="summernote" placeholder="Optional description">{{ old('page_desc', optional($contactPage)->page_desc) }}</textarea>
                                </div>
                                <!-- Meta Title -->
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold">
                                        Meta Title
                                    </label>
                                    <input type="text" class="form-control" name="meta_title"
                                        value="{{ old('meta_title', optional($contactPage)->meta_title) }}"
                                        placeholder="Meta title">
                                </div>
                                <!-- Meta Desc -->
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold">
                                        Meta Description
                                    </label>
                                    <textarea name="meta_desc" id="meta_desc" cols="" class="form-control" rows="5"
                                        placeholder="Meta Description">{{ old('meta_desc', optional($contactPage)->meta_desc) }}</textarea>
                                </div>
                                <!-- Meta Keys -->
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold">
                                        Meta Keywords
                                    </label>
                                    <textarea name="meta_key" id="meta_key" cols="" class="form-control" rows="5" placeholder="Meta keywords">{{ old('meta_key', optional($contactPage)->meta_key) }}</textarea>
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
