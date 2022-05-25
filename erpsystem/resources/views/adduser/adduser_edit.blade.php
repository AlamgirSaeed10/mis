@extends('HR.hr-layout.main')
@section('title','Add User')
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
				<h4 class="card-header">Add New User</h4>
				<div class="card-body">
					<!-- enctype="multipart/form-data" -->

					<form action="{{URL('userUpdate')}}" method="post"> {{csrf_field()}}
					<input type="text" name="UserID" value="{{$userEdit[0]->UserID}}">

						<div class="row mb-2">
							<label for="horizontal-firstname-input" class="col-md-2 col-form-label">Full Name</label>
							<div class="col-md-6">
								<input type="text" name="FullName" class="form-control" id="FullName" value="{{$userEdit[0]->FullName}}">
							</div>
						</div>

						<div class="row mb-2">
							<label for="horizontal-firstname-input" class="col-md-2 col-form-label">Email</label>
						    	<div class="col-md-6">
						        	<input type="text" name="Email" class="form-control" id="Email" value="{{$userEdit[0]->Email}}">
						        </div>
						</div>
						<div class="row mb-2">
							<label for="horizontal-firstname-input" class="col-md-2 col-form-label">Password</label>
						    	<div class="col-md-6">
						        	<input type="text" name="Password" class="form-control" id="Password" value="{{$userEdit[0]->Password}}">
						        </div>
						</div>

						<div class="mb-2 row">
							<label class="col-md-2 col-form-label">User Type</label>
							<div class="col-md-6">
								<select class="form-select" name="UserType" id="UserType">
									<option value="Admin" {{($userEdit[0]->UserType === 'Admin') ? 'checked':
									''}}>Admin</option>
									<option value="User" {{($userEdit[0]->UserType === 'User')?'checked':''}}>User</option>
								</select>
							</div>
						</div>
						<div class="mb-2 row">
							<label class="col-md-2 col-form-label">Active</label>
							<div class="col-md-6">
								<select class="form-select" name="Active" id="Active">
									<option value="Yes" {{($userEdit[0]->Active === 'Yes')? 'checked':''}}>Yes</option>
									<option value="No" {{($userEdit[0]->Active === 'No')? 'checked':''}}>No</option>
								</select>
							</div>
						</div>

						<div>
						<button type="submit" class="btn btn-info w-sm float-right">Update</button>
						</div>
						
					</form>
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