@extends('adminlte::page')

@section('content_header')
    <h1>Edit Company</h1>
@endsection

@section('content')
    <form action="{{ route('companies.update', $company) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @include('companies._form', ['button' => 'Update'])
    </form>
@endsection
