@extends('layouts.app') 

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a class="btn btn-outline-primary mb-5" href="{{ route('department.create') }}" role="button">Create</a>

            <h4 class="mb-2">Department</h4> 
            @if(count($department))
                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($department as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>
                                    <a class="btn btn-outline-info btn-sm" href="/department/{{ $item->id }}" role="button"><i class="fas fa-eye"></i></a>
                                    <a class="btn btn-outline-success btn-sm" href="/department/{{ $item->id }}/edit" role="button"><i class="fas fa-edit"></i></a>
                                    <button class="btn btn-outline-danger btn-sm" role="button" data-toggle="modal" data-target="#confirm-delete-department" data-id="{{ $item->id }}" data-name="{{ $item->name }}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            {{ $department->links() }} 
            @else
                <h3>No department added.</h3> 
            @endif
        </div>
    </div>
</div>
<div class="modal fade" id="confirm-delete-department" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            {!! Form::open(['action' => 'DepartmentController@index', 'method' => 'DELETE']) !!}
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