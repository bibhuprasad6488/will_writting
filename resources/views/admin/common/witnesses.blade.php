@extends('admin.layouts.app')
@section('title', 'Witnesses Page')
@section('content')
    <div class="container-fluid px-4">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="py-2">
                <h1 class="mt-4">Witnesses Page</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item">Dashboard</li>
                    <li class="breadcrumb-item active">Witnesses Page</li>
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
                Witnesses Page Information
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
                <form method="POST" action="{{ route('admin.witnesses.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="row mb-3 g-4">
                        <!-- Description -->
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">
                                Main Description
                            </label>
                            <textarea name="w_desc_one" rows="4" class="form-control cont" placeholder="Content">{{ $witness->w_desc_one ?? old('w_desc_one') }}</textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">
                                Second Description
                            </label>
                            <textarea name="w_desc_two" rows="4" class="form-control cont" placeholder="Content">{{ $witness->w_desc_two ?? old('w_desc_two') }}</textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">
                                Third Description
                            </label>
                            <textarea name="w_desc_three" rows="4" class="form-control cont" placeholder="Content">{{ $witness->w_desc_three ?? old('w_desc_three') }}</textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">
                                Witnress Image
                            </label>
                            <input type="file" name="w_img" id="w_img" class="form-control border-secondary"
                                accept=".jpg,.png,.jpeg,.webp">
                            <div class="my-2 border-secondary">
                                @if (!empty($witness->w_img))
                                    <img width="150" src="{{ $witness->w_img }}" alt="Witness Image">
                                @endif
                            </div>
                        </div>
                    </div>


                    <!-- Approach -->
                    <div class="col-md-6 d-none">
                        <div class="card border-0">
                            <div class="card-header border-0 fw-bold">
                                Meta Title
                            </div>
                            <div class="card-body p-1">
                                <div class="mb-3">
                                    <input type="text" class="form-control border-secondary" name="meta_title"
                                        placeholder="Title" value="{{ $witness->meta_title ?? old('meta_title') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Approach -->
                    <div class="col-md-6 d-none">
                        <div class="card border-0">
                            <div class="card-header border-0 fw-bold">
                                Meta Description
                            </div>
                            <div class="card-body p-1">
                                <textarea name="meta_desc" rows="4" class="form-control border-secondary" placeholder="Description..">{{ $witness->meta_desc ?? old('meta_desc') }}</textarea>
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
            // Loop through all elements with the class 'cont'
            document.querySelectorAll(".cont").forEach(function(editor) {

                // Initialize TinyMCE for each editor
                tinymce.init({
                    target: editor, // Use 'target' to bind TinyMCE to the specific element
                    height: 400,
                    plugins: 'advlist autolink link image lists charmap preview code fullscreen',
                    toolbar: 'undo redo | blocks | bold italic underline strikethrough forecolor backcolor | alignleft aligncenter alignright | bullist numlist blockquote | link image | code fullscreen ',

                    // NEW: use "blocks" instead of "formatselect" in TinyMCE 6+
                    block_formats: 'Paragraph=p; Heading 1=h1; Heading 2=h2; Heading 3=h3; Heading 4=h4; Heading 5=h5; Heading 6=h6; Preformatted=pre; Blockquote=blockquote',

                    setup: function(editorInstance) {
                        // Sync content
                        editorInstance.on('change', function() {
                            editor.value = editorInstance.getContent();
                        });
                    }
                });
            });
        });
    </script>
@endpush
