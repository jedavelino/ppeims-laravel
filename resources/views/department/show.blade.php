@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{ route('department.index') }}" class="btn btn-outline-secondary mb-2" role="button">Back</a>
            <h2>{{ $department->name }}</h2>
            @if(count($employees))
                <div class="table-responsive">
                    <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($employees as $employee)
                            <tr>
                                <td>{{ $employee->name }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
            @else
                <h3>No employee added.</h3>
            @endif
        </div> 
    </div>
</div>
@endsection