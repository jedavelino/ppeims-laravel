@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a class="btn btn-outline-primary mb-5" href="{{ route('inventory.create') }}" role="button">Create</a>
            <h4 class="mb-2">Inventory</h4> 
    </div>
</div>
@endsection