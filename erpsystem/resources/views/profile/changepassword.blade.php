@extends('template.hr_tmp')
@section('title', 'Password')
@section('content')
<div class="main-content">
	<div class="page-content">
		<div class="container-fluid">
			@if (session('error'))
			<div class="alert alert-danger p-3" id="alert-danger">
				{{ Session::get('error') }}
			</div>
			@endif
			@if (session('success'))
			<div class="alert alert-success p-3" id="success-alert">
				{{ Session::get('success') }}
			</div>
			@endif
			@if (count($errors) > 0)
			<div class="card-body " id="alert-danger">
				<div class="alert alert-warning pt-3 pl-0" >
					There were some problems with your input.
					<ul>
						@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			</div>
			@endif
			<div class="card">
				<h3 class="card-header">Manage Password</h3>
				<div class="card-body">
					<!-- enctype="multipart/form-data" -->

					<form action="{{URL('/userPasswordUpdate')}}" method="post"> {{csrf_field()}}

					
						<div class="row mb-2">
							<label for="horizontal-firstname-input" class="col-md-2 col-form-label">Old Password</label>
							<div class="col-md-6">
								<input type="text" name="OldPassword" class="form-control" id="Password">
							</div>
						</div>

						<div class="row mb-2">
							<label for="horizontal-firstname-input" class="col-md-2 col-form-label">New Password</label>
						    	<div class="col-md-6">
						        	<input type="text" name="Password" class="form-control" id="Password">
						        </div>
						</div>
						<div class="row mb-2">
							<label for="horizontal-firstname-input" class="col-md-2 col-form-label">Confirm New Password</label>
						    	<div class="col-md-6">
						        	<input type="text" name="ConfirmPassword" class="form-control" id="Password">
						        </div>
						</div>

						<div>
						<button type="submit" class="btn btn-success w-sm float-right">Save</button>
						</div>
						
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
$("#success-alert").fadeTo(4000, 500).slideUp(100, function(){
$("#success-alert").slideUp("slow");
$("#success-alert").alert('close');
});
$("#alert-danger").fadeTo(4000, 500).slideUp(100, function(){
$("#alert-danger").slideUp("slow");
$("#alert-danger").alert('close');
});

</script>
@endsection