@extends('adminlte::page')

@section('content_header')
<h1>Add Company</h1>
@endsection

@section('content')
<form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
    @include('companies._form', ['button' => 'Create'])
</form>
@endsection