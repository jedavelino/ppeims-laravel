@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{ route('department.index') }}" class="btn btn-outline-secondary mb-5" role="button">Back</a>
            <h2>Create Department</h2>

            {!! Form::open(['action' => 'DepartmentController@store']) !!}
				<div class="form-group">
					{{ Form::label('name', 'Name') }}
					{{ Form::text('name', '', ['class' => 'form-control', 'autofocus']) }}
				</div>
				<div class="form-group">
					{{ Form::label('description', 'Description (Optional)') }}
					{{ Form::textarea('description', '', ['class' => 'form-control']) }}
				</div>
				<div class="form-group">
					{{ Form::submit('Submit', ['class' => 'btn btn-outline-success']) }}
				</div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection