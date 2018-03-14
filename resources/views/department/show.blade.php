@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{ route('department.index') }}" class="btn btn-outline-secondary mb-2" role="button">Back</a>
            <h2>{{ $department->name }}</h2>
            <div>
                {{ $department->description }}
            </div>
        </div>
    </div>
</div>
@endsection