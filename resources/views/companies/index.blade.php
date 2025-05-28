@extends('adminlte::page')

@section('title', 'Companies')

@section('content_header')
<h1>Companies</h1>
@endsection

@section('content')
<a href="{{ route('companies.create') }}" class="btn btn-primary mb-3">Add Company</a>
@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Website</th>
            <th>Logo</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($companies as $company)
        <tr>
            <td>{{ $company->name }}</td>
            <td>{{ $company->email }}</td>
            <td>{{ $company->website }}</td>
            <td>
                @if($company->logo)
                <img src="{{ asset('storage/' . $company->logo) }}" width="50">
                @endif
            </td>
            <td>
                <a href="{{ route('companies.edit', $company) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('companies.destroy', $company) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $companies->links() }}
@endsection