@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{ route('employee.index') }}" class="btn btn-outline-secondary mb-5" role="button">Back</a>
            <h2>Edit Employee</h2>

            {!! Form::open(['action' => ['EmployeeController@update', $employee->id], 'method' => 'PUT']) !!}
				<div class="form-row form-group">
					<div class="col">
						{{ Form::label('name', 'First Name') }}
						{{ Form::text('first_name', _getNameByIndex($employee->name, 1), ['class' => 'form-control']) }}
					</div>
					<div class="col">
						{{ Form::label('name', 'Last Name') }}
						{{ Form::text('last_name', _getNameByIndex($employee->name, 0), ['class' => 'form-control', 'autofocus']) }}
					</div>
					<div class="col">
						{{ Form::label('name', 'Middle Name') }}
						{{ Form::text('middle_name', _getNameByIndex($employee->name, 2), ['class' => 'form-control']) }}
					</div>
				</div>
				<div class="form-group">
					{{ Form::submit('Submit', ['class' => 'btn btn-outline-success']) }}
				</div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection