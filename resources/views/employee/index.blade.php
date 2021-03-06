@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a class="btn btn-outline-primary mb-5" href="{{ route('employee.create') }}" role="button">Create</a>

            <h4 class="mb-2">Employees</h4>

            @if(count($employees))
                <div class="table-responsive">
                    <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Department</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($employees as $employee)
                            <tr>
                                <td>{{ $employee->name }}</td>
                                <td>{{ $employee->department }}</td>
                                <td>
                                    <a class="btn btn-outline-info btn-sm" href="/employee/{{ $employee->id }}" role="button"><i class="fas fa-eye"></i></a>
                                    <a class="btn btn-outline-success btn-sm" href="/employee/{{ $employee->id }}/edit" role="button"><i class="fas fa-edit"></i></a>
                                    <button class="btn btn-outline-danger btn-sm" role="button"
                                        data-toggle="modal"
                                        data-target="#confirm-delete-employee"
                                        data-id="{{ $employee->id }}"
                                        data-name="{{ $employee->name }}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
                {{ $employees->links() }}
            @else
                <h3>No employee added.</h3>
            @endif
        </div>
    </div>
</div>
<div class="modal fade" id="confirm-delete-employee" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            {!! Form::open(['action' => 'EmployeeController@index', 'method' => 'DELETE']) !!}
               <div class="modal-header">
                   <h5 class="modal-title" id="exampleModalLabel"></h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
               </div>
               <div class="modal-body"></div>
               <div class="modal-footer">
                   <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                   {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
               </div> 
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection