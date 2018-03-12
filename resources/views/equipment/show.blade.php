@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{ route('equipment.index') }}" class="btn btn-outline-secondary mb-2" role="button">Back</a>
            <h2>{{ $equipment->name }}</h2>
            <div>
                {{ $equipment->description }}
            </div>
        </div>
    </div>
</div>
@endsection