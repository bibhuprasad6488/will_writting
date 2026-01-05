@extends('admin.layouts.app')
@section('title', 'Partners Add')
@section('content')
    <div class="container-fluid px-4">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="py-2">
                <h1 class="mt-4">Partners Add</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item">Dashboard</li>
                    <li class="breadcrumb-item active">Partners List</li>
                    <li class="breadcrumb-item active">Partners Add</li>
                </ol>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ route('admin.partners.index') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
        <div class="card mb-4">
            {{-- <div class="card-header">
                <i class="fas fa-table me-1"></i>
                DataTable Example
            </div> --}}
            <div class="card-body">
                <form method="POST" action="{{ route('admin.partners.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="name" name="name" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label for="logo" class="form-label">Logo <span class="text-danger">*</span></label>
                        <input type="file" class="form-control" id="logo_path" name="logo_path" required
                            accept=".jpg,.png,.jpeg,.webp" onchange="previewImage(event)">
                    </div>
                    <div class="mb-3">
                        <label for="website_url" class="form-label">Website URL</label>
                        <input type="url" class="form-control" id="website_url" name="website_url"
                            placeholder="Ex- example.com">
                    </div>
                    <div class="mb-3">
                        <label for="website_url" class="form-label">Description (Optional)</label>
                        <textarea name="desc" id="desc" cols="" rows="5" class="form-control"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
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
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(input.files[0]);
            } else {
                preview.src = '#';
                preview.style.display = 'none';
            }
        }
    </script>
@endpush
