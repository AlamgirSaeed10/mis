@extends('HR.hr-layout.main')
@section('title', $pagetitle)
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

					<form action="{{URL('userInsert')}}" method="post"> {{csrf_field()}}

						<div class="row mb-2">
							<label for="horizontal-firstname-input" class="col-md-2 col-form-label">Full Name</label>
							<div class="col-md-6">
								<input type="text" name="FullName" class="form-control" id="FullName">
							</div>
						</div>

						<div class="row mb-2">
							<label for="horizontal-firstname-input" class="col-md-2 col-form-label">Email</label>
						    	<div class="col-md-6">
						        	<input type="text" name="Email" class="form-control" id="Email">
						        </div>
						</div>
						<div class="row mb-2">
							<label for="horizontal-firstname-input" class="col-md-2 col-form-label">Password</label>
						    	<div class="col-md-6">
						        	<input type="text" name="Password" class="form-control" id="Password">
						        </div>
						</div>

						<div class="mb-2 row">
							<label class="col-md-2 col-form-label">User Type</label>
							<div class="col-md-6">
								<select class="form-select" name="UserType" id="UserType">
									<option value="Admin">Admin</option>
									<option value="User">User</option>
								</select>
							</div>
						</div>
						<div class="mb-2 row">
							<label class="col-md-2 col-form-label">Active</label>
							<div class="col-md-6">
								<select class="form-select" name="Active" id="Active">
									<option value="Yes">Yes</option>
									<option value="No">No</option>
								</select>
							</div>
						</div>

						<div>
						<button type="submit" class="btn btn-success w-sm float-right">Save</button>
						</div>
						
					</form>
				</div>
			</div>
			<div class="card">
				<h4 class="card-header">Manage Users</h4>
				<div class="card-body">
					@if(count($userCreate)>0)
					<table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
						<thead>
							<tr>
								<td>#</td>
								<td>FullName</td>
								<td>Email</td>
								<td>Password</td>
								<td>UserType</td>
								<td>eDate</td>
								<td>Active</td>
								<td>Action</td>
							</tr>
						</thead>
						<tbody>
							@foreach ($userCreate as $key =>$value)
							<?php
							$hidden_password = preg_replace("|.|","*",$value->Password,255);
							$password = substr($hidden_password,0,8);
							?>
							<tr>
								<td>{{$key+1}}</td>
								<td>{{$value->FullName}}</td>
								<td>{{$value->Email}}</td>
								<td>{{$password}}</td>
								<td>{{$value->UserType}}</td>
								<td>{{$value->eDate}}</td>
								<td>{{$value->Active}}</td>
								<td>
									<a href="{{URL('userEdit/'.$value->UserID)}}"><i class="mdi mdi-pencil align-middle"></i></a>
									<a href="#" onclick="delete_confirm2('userDelete',{{$value->UserID}})"><i class="mdi mdi-trash-can-outline align-middle"></i></a>
									<a href="#"><i class="mdi mdi-account-lock align-middle"></i></a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					@else
					<p class=" text-danger">No data found</p>
					@endif
					
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
$(document).ready(function () {
$('#dtBasicExample').DataTable();
$('.dataTables_length').addClass('bs-select');
});
</script>
@endsection