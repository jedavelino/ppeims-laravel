@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{ route('employee.index') }}" class="btn btn-outline-secondary mb-2" role="button">Back</a>
            <h2>{{ $employee->name }}</h2>
            <h3>{{ $employee->department->name }}</h3>
        </div>
    </div>
</div>
@endsection