@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{ route('inventory.index') }}" class="btn btn-outline-secondary mb-5" role="button">Back</a>
            <h2>Create Inventory</h2>

            <a class="btn btn-outline-primary" href="">Add Equipment</a>
        </div>
    </div>
</div>
@endsection