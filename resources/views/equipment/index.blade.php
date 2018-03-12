@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
			<a class="btn btn-outline-primary mb-5" href="{{ route('equipment.create') }}" role="button">Create</a>

            <h4 class="mb-2">Equipment</h4>

            @if(count($equipment))
            	<div class="table-responsive">
            		<table class="table table-sm">
            		<thead>
            			<tr>
            				<th>Name</th>
            				<th>Created</th>
            				<th>Actions</th>
            			</tr>
            		</thead>
            		<tbody>
            			@foreach($equipment as $item)
	            			<tr>
	            				<td>{{ $item->name }}</td>
	            				<td>{{ $item->created_at }}</td>
	            				<td>
	            					<a class="btn btn-outline-info btn-sm" href="/equipment/{{ $item->id }}" role="button"><i class="fas fa-eye"></i></a>
	            					<a class="btn btn-outline-success btn-sm" href="/equipment/{{ $item->id }}/edit" role="button"><i class="fas fa-edit"></i></a>
	            					<a class="btn btn-outline-danger btn-sm" 
                                        href="/equipment/{{ $item->id }}" 
                                        data-id="{{ $item->id }}" 
                                        data-name="{{ $item->name }}" 
                                        data-target="#delete-equipment-modal" 
                                        role="button" 
                                        data-toggle="modal"><i class="fas fa-trash"></i>
                                    </a>
	            				</td>
	            			</tr>
            			@endforeach
            		</tbody>
            		</table>
            	</div>
            	{{ $equipment->links() }}
            @else
            	<h3>No equipment added.</h3>
            @endif
        </div>
    </div>
</div>
<div class="modal fade" id="delete-equipment-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            {!! Form::open(['action' => ['EquipmentController@destroy', '0'], 'method' => 'DELETE', 'id' => 'delete-equipment-in-modal']) !!}
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