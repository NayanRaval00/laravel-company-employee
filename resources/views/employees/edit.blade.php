@extends('adminlte::page')

@section('content_header')
<h1>Edit Employee</h1>
@endsection

@section('content')
<form action="{{ route('employees.update', $employee) }}" method="POST">
    @method('PUT')
    @include('employees._form', ['button' => 'Update'])
</form>
@endsection