@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <button class="btn btn-outline-primary mb-5" data-target="#add-equipment" data-toggle="modal" type="button">Select Equipment</button>
            <h2>Receive</h2>
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Equipment</th>
                        <th scole="col">Quantity</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="table-success">
                        <td scope="row">1</td>
                        <td>Hat</td>
                        <td>10</td>
                        <td>
                            <a class="btn btn-outline-success btn-sm" href="#" role="button"><i class="fas fa-edit"></i></a>
                            <button class="btn btn-outline-danger btn-sm" role="button">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td scope="row">2</td>
                        <td>Glove</td>
                        <td></td>
                        <td>
                            <a class="btn btn-outline-success btn-sm" href="#" role="button"><i class="fas fa-edit"></i></a>
                            <button class="btn btn-outline-danger btn-sm" role="button">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
            {!! Form::open(['action' => 'ReceiveController@store']) !!}
				<div class="form-group">
					{{ Form::submit('Submit', ['class' => 'btn btn-outline-success']) }}
				</div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
<div class="modal fade" id="add-equipment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            {!! Form::open(['action' => 'EquipmentController@index', 'method' => 'DELETE']) !!}
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Select Equipment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th scope="col">Select</th>
                            <th scole="col">Equipment</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($equipment as $item)
                        <tr>
                            <td>{{ Form::checkbox('name', 'value') }}</td>
                            <td>{{ $item->name }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                {{ Form::submit('Submit', ['class' => 'btn btn-success']) }}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection