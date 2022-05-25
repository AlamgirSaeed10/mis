@extends('HR.hr-layout.main')
@section('content')
<div class="main-content">
	<div class="page-content">
		<div class="container-fluid">
			<div class="card">
				<h4 class="card-header">Edit Party/ Customer</h4>
				<div class="card-body">
					<form action="{{URL('/customerUpdate')}}" method="post"> {{csrf_field()}}
						<input type="hidden" name="PartyID" value="{{$customerEdit[0]->PartyID}}">
						<div class="row mb-2">
							<label for="horizontal-firstname-input" class="col-md-2 col-form-label">Party Name</label>
							<div class="col-md-6">
								<input type="text" name="PartyName"  value="{{$customerEdit[0]->PartyName}}" class="form-control" id="PartyName">
							</div>
						</div>
						<div class="row mb-2">
							<label for="horizontal-firstname-input" class="col-md-2 col-form-label">Address</label>
							<div class="col-md-6">
								<input type="text" name="Address"  value="{{$customerEdit[0]->Address}}" class="form-control" id="Address">
							</div>
						</div>
						<div class="row mb-2">
							<label for="horizontal-firstname-input" class="col-md-2 col-form-label">Phone</label>
							<div class="col-md-6">
								<input type="text" name="Phone"  value="{{$customerEdit[0]->Phone}}" class="form-control" id="Phone">
							</div>
						</div>
						<div class="row mb-2">
							<label for="horizontal-firstname-input" class="col-md-2 col-form-label">Email</label>
							<div class="col-md-6">
								<input type="text" name="Email" value="{{$customerEdit[0]->Email}}"  class="form-control" id="Email">
							</div>
						</div>
						<div class="row mb-2">
							<label for="horizontal-firstname-input"  class="col-md-2 col-form-label">Invoic Due Days</label>
							<div class="col-md-6">
								<input type="text"  value="{{$customerEdit[0]->InvoiceDueDays}}" name="InvoiceDueDays" class="form-control" id="InvoiceDueDays">
							</div>
						</div>
						<div class="mb-2 row">
							<label class="col-md-2 col-form-label">Active</label>
							<div class="col-md-6">
								<select class="form-select" name="Active" id="Active">
									<option value="Yes"

									{{($customerEdit[0]->Active === 'Yes') ? 'checked':''}}


									 >Yes</option>
									<option value="No"

									{{($customerEdit[0]->Active === 'No')? 'checked':''}}


									>No</option>
								</select>
							</div>
						</div>
						<div>
							<button type="submit" class="btn btn-success w-lg float-right">Update</button>
						</div>
						
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection