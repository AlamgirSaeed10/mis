@extends('template.main_tmp')
@section('title', 'Dashboard')
@section('content')
<div class="main-content">
	<div class="page-content">
		<div class="container-fluid">
			 <!-- display error -->
            @if (session('error'))
            <div class="alert alert-danger p-3" id="error-alert">
                {{ Session::get('error') }}
            </div>
            @endif
            @if (session('success'))
            <div class="alert alert-success p-3" id="success-alert">
                {{ Session::get('success') }}
            </div>
            @endif
            @if (count($errors) > 0)
            <div class="card-body ">
                <div class="alert alert-warning pt-3 pl-0">
                    There were some problems with your input.
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endif
			<div class="row">
				<div class="col-sm-12 col-lg-12 col-md-12">
					
				<div class="card">
					<div class="card-body">
						<form method="POST" action="{{url('uploadFile')}}" enctype="multipart/form-data">
							<h6>File Upload</h6>
							@csrf
							<div class="row">
								<div class="col-sm-12 col-md-6 col-lg-6">
									<input name="file" type="file" id="file" class="form-control">
								</div>
								<div class="col-sm-12 col-md-2 col-lg-2">
									<input type="submit" id="submit" value="Submit" class="btn btn-outline-success">
								</div>
							</div>
						</form>
					</div>
				</div>
				</div>
				</div>
			</div>
			<div class="row">
				@foreach($ViewAll as $value)
				<div mg="6" class="col-lg-2 col-sm-12 col-md-2">
					<div class="card">

						@if($value->MimeType == 0)
							<img src="{{URL('/uploaded-files/' . $value->ReportFile) }}" name="image" id="image" class="img-fluid card-img-top">
						@else
						<img src="https://cdn.iconscout.com/icon/free/png-256/docs-1-93408.png" alt="This is document" class="img-fluid card-img-top">
						@endif
						<div class="card-body align-items-center">
							<div class="col-lg-2 col-sm-12 col-md-2">
								
									<div class="d-inline-flex align-items-center">
										<a class="m-1" id="bitcoin" href="{{URL('/downloadFile/'.$value->ReportID)}}">
											<div class="avatar-xs">
												<span class="avatar-title rounded-circle bg-success bg-soft text-success font-size-18">
												<i class="mdi mdi-download"></i></span></div>
											</a>
											<a class="m-1" id="ethereum" href="{{URL('/ViewFile/'.$value->ReportID)}}">
												<div class="avatar-xs"><span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-18"><i class="mdi mdi-eye-outline"></i></span></div>
											</a>
											<a class="m-1" id="litecoin" href="{{URL('/deleteReport/'.$value->ReportID)}}">
												<div class="avatar-xs"><span class="avatar-title rounded-circle bg-danger bg-soft text-danger font-size-18"><i class="mdi mdi-delete"></i></span></div>
											</a>
										</div>
									
								</div>
						</div>
					</div>
				</div>
				@endforeach
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
