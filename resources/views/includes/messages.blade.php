@if($errors->any())
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			@foreach($errors->all() as $error)
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					{{ $error }}
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
			@endforeach
		</div>
	</div>
</div>
@endif

@if(session('success'))
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				{{ session('success') }}
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
		</div>
	</div>
</div>
@endif

@if(session('error'))
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
				{{ session('error') }}
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
		</div>
	</div>
</div>
@endif