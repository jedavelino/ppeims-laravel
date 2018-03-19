@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{ route('department.index') }}" class="btn btn-outline-secondary mb-2" role="button">Back</a>
            <h2>{{ $department->name }}</h2>
            <p>TODO: Show all employees in this department.</p>
            {{-- <div class="table-responsive">
                <table class="table table-sm">
                <thead>
                    <tr>
                        <th>Name</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Avelino, Jedidiah Concepcion</td>
                    </tr>
                </tbody>
                </table>
            </div> --}}
            {{--  @if(count($employees))
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
                                <td>{{ _prettyName($employee->name) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
                {{ $employee->links() }}
            @else
                <h3>No employee added.</h3>
            @endif
        </div>  --}}
    </div>
</div>
@endsection