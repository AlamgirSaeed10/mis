@extends('template.tmp2')
@section('title', $pagetitle)
@section('content')
<div class="page-content">
	<div class="container-fluid">
		<style>
		.card-custom {
		font-family: sans-serif;
		width: 10rem;
		text-align: center;
		margin: 0px 10px 10px 0px;
		}
		.sett {
		justify-content: center;
		}
		.card-image-top {
		width: 100px;
		height: 100px;
		align-self: center;
		margin-top: 20px;
		}
		.card-custom:hover {
		border: 1px solid royalblue;
		box-shadow: 0 0.75rem 1.5rem rgb(18 38 63 / 3%);
		border-radius: 10px;
		}
		.img-responsive {
		display: block;
		margin-left: auto;
		margin-right: auto;
		width: auto;
		height: 105px;
		}
		@media(max-width: 992px) {
		.img-responsive {
		max-height: 80px;
		max-width: auto;
		}
		}
		body {
		background-repeat: no-repeat;
		background-size: cover;
		background-image: url('https://wallpapercave.com/wp/wp9815055.png');
		}
		</style>
		<body>
		</body>
		<div class="modal fade bs-example-modal-xl" id="subscribeModal" data-bs-backdrop="static"
			data-bs-keyboard="false" tabindex="-1" aria-labelledby="subscribeModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-fullscreen ">
				<div class="modal-content">
					<div class="modal-header border-bottom-0">
						<img src="{{URL('/')}}/img/teqholic.png" alt="teqholic logo" class="img-responsive">
					</div>
					<div class="modal-body">
						<div class="row sett">
							<div class="card-custom">
								<a href="{{URL('/login')}}">
									<img src="{{URL('/')}}/img/CEO.png" class="card-image-top" alt="CEO vector icon ">
									<div class="card-body">
										<h5 class="card-title">CEO</h5>
									</div>
								</a>
							</div>
							<div class="card-custom">
								<a href="{{URL('/login')}}">
									<img src="{{URL('/')}}/img/hr.png" class="card-image-top" alt="HR vector icon ">
									<div class="card-body">
										<h5 class="card-title">HR</h5>
									</div>
								</a>
							</div>
							<div class="card-custom">
								<a href="{{URL('/login')}}">
									<img src="{{URL('/')}}/img/Operations.png" class="card-image-top" alt="Operations vector icon ">
									<div class="card-body">
										<h5 class="card-title">Operations</h5>
									</div>
								</a>
							</div>
							<div class="card-custom">
								<a href="{{URL('/login')}}">
									<img src="{{URL('/')}}/img/sales.png" class="card-image-top" alt="Sales vector icon ">
									<div class="card-body">
										<h5 class="card-title">Sales</h5>
									</div>
								</a>
							</div>
							<div class="card-custom">
								<a href="{{URL('/login')}}">
									<img src="{{URL('/')}}/img/it-institute.png" class="card-image-top" alt="IT Institute vector icon ">
									<div class="card-body">
										<h5 class="card-title">IT Institute</h5>
									</div>
								</a>
							</div>
							<div class="card-custom">
								<a href="{{URL('/login')}}">
									<img src="{{URL('/')}}/img/finance.png" class="card-image-top" alt="Accounting & Finance vector icon ">
									<div class="card-body">
										<h5 class="card-title">Accounting & Finance</h5>
									</div>
								</a>
							</div>
							<div class="card-custom">
								<a href="{{URL('/login')}}">
									<img src="{{URL('/')}}/img/purchase.png" class="card-image-top" alt="Purchases vector icon ">
									<div class="card-body">
										<h5 class="card-title">Purchase</h5>
									</div>
								</a>
							</div>
							<div class="card-custom">
								<a href="{{URL('/login')}}">
									<img src="{{URL('/')}}/img/inventory.png" class="card-image-top" alt="Inventory vector icon ">
									<div class="card-body">
										<h5 class="card-title">Inventory</h5>
									</div>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection