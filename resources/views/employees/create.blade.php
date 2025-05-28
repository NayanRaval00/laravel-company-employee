@extends('adminlte::page')

@section('content_header')
    <h1>Add Employee</h1>
@endsection

@section('content')
    <form action="{{ route('employees.store') }}" method="POST">
        @include('employees._form', ['button' => 'Create'])
    </form>
@endsection
