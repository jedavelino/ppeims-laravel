@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{ route('employee.index') }}" class="btn btn-outline-secondary mb-5" role="button">Back</a>
            <h2>Create Employee</h2>

            {!! Form::open(['action' => 'EmployeeController@store']) !!}
				<div class="form-row form-group">
					<div class="col">
						{{ Form::label('name', 'Last Name') }}
						{{ Form::text('last_name', '', ['class' => 'form-control']) }}
					</div>
					<div class="col">
						{{ Form::label('name', 'First Name') }}
						{{ Form::text('first_name', '', ['class' => 'form-control']) }}
					</div>
					<div class="col">
						{{ Form::label('name', 'Middle Name') }}
						{{ Form::text('middle_name', '', ['class' => 'form-control']) }}
					</div>
				</div>
				<div class="form-group">
					{{ Form::select('department', $options, null, ['placeholder' => 'Select a Department', 'class' => 'form-control']) }}
				</div>
				<div class="form-group">
					{{ Form::submit('Submit', ['class' => 'btn btn-outline-success']) }}
				</div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection