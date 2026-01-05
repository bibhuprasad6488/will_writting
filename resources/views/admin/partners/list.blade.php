@extends('admin.layouts.app')
@section('title', 'Partners List')
@section('content')
    <div class="container-fluid px-4">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="py-2">
                <h1 class="mt-4">Partners List</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item">Dashboard</li>
                    <li class="breadcrumb-item active">Partners List</li>
                </ol>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ route('admin.partners.create') }}" class="btn btn-primary">Create</a>
                </div>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                {{-- DataTable Example --}}
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>SL No</th>
                            <th>Name</th>
                            <th>Logo</th>
                            <th>Created</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($partners as $p)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $p->name }}</td>
                                <td></td>
                                <td>{{ $p->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
