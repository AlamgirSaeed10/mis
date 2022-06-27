@extends('HR.hr-layout.main')
@section('title', 'POS Terminal')
@section('content')


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>


<style type="text/css">
.card .img-wrap {
overflow: hidden;
}
.card-product .img-wrap {
border-radius: 0.2rem 0.2rem 0 0;
overflow: hidden;
position: relative;
height: 200px;
text-align: center;
}
.img-wrap {
text-align: center;
display: block;
}
.card-product .img-wrap img {
max-height: 100%;
max-width: 100%;
width: auto;
display: inline-block;
-o-object-fit: cover;
object-fit: cover;
}
td {
text-align: right;
}
</style>
<div class="main-content">
	<div class="page-content">
		<div class="container-fluid">
			@if (session('error'))
			<div class="alert alert-danger p-3" id="success-alert">
				{{ Session::get('error') }}
			</div>
			@endif
			@if (session('success'))
			<div class="alert alert-success p-3" id="success-alert">
				{{ Session::get('success') }}
			</div>
			@endif
			<!-- enctype="multipart/form-data" -->
			<form action="{{URL('/Checkout')}}" method="post">
				{{csrf_field()}}
				
				<div class="row">
					@if(session()->has('qwick'))
					<input type="hidden" id="rand" value="{{session()->get('qwick')}}">
					
					@else
					{{ $rand = rand(1,9999)}} {{session()->put('qwick',$rand)}}
					@endif
					<div class="col-sm-12 col-lg-7 col-md-7">
						<div class="card">
							<div class="card-body border-success border-top border-3 rounded-top">
								<ul class="nav nav-pills nav-justified" role="tablist">
									@foreach($Categories as $key => $value)
									<li class="nav-item waves-effect waves-light">
										<a class="nav-link {{($key == 0)? 'active' : ''}}" data-bs-toggle="tab" href="#{{$value->CategoryName}}" role="tab">
											<span class="">{{$value->CategoryName}}</span>
										</a>
									</li>
									@endforeach
								</ul>
								<!-- Tab panes -->
								<div class="tab-content p-3 text-muted">
									@foreach($Categories as $key => $value)
									<div class="tab-pane {{($key ==0)? 'active' : ''}}" id="{{$value->CategoryName}}" role="tabpanel">
										<p class="mb-0">
											<div class="row">
												@php $summary = DB::table('item')->where('CategoryID',$value->CategoryID)->get();
												@endphp
												
												@foreach($summary as $value)
												<div class="col-md-3 col-sm-12 lg-4" onclick="CreateOrder({{$value->ItemID}})">
													<figure class="card card-product shadow p-3 mb-5 bg-white rounded">
														<div class="img-wrap">
															<input type="hidden" id="ItemID" value="{{$value->ItemID}}">
															<img src="{{ asset('assets/images/product/' . $value->ItemImage) }}" />
															<h6>{{$value->ItemName}} </h6>
														</div>
													</figure>
												</div>
												@endforeach
											</div>
										</p>
									</div>
									@endforeach
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-12 col-lg-5 col-md-5">
						<div id="result">
							<div class="card">
								<div class="card-body border-success border-top border-3 rounded-top">
									<div class="col-md-12">
										<div class="mb-3">
											<label for="basicpill-firstname-input">Customer Type</label>
											<select name="PartyID" id="PartyID" class="form-select">
												<option value="Walk-in">Walk-in</option>
											</div>
										</select>
									</div>
									<div class="table-responsive">
										<table class="table align-middle mb-0 table-nowrap">
											<thead>
												<tr>
													<th>Item</th>
													<th>Price</th>
													<th>Qty</th>
													<th>Total</th>
													<th><i class="bx bx-trash"></i></th>
												</tr>
											</thead>
											<tbody>
												@if(count($Flag) > 0)
												@foreach($LastInvoiceData as $value)
												<tr>
													<td style="text-align: left;">
														<span class="font-size-13 text-truncate text-left"
															style="text-align: left;">
															{{$value->ItemName}}
														</span>
													</td>
													<td>
														{{$value->TotalAmount}}
														<input type="hidden" name="changeNoo" id="CostPrice_{{$value->ItemID}}" value="{{$value->TotalAmount}}">
													</td>
													<td width="20%">
														<input type="text" value="{{$value->Quantity}}" id="qty_{{$value->ItemID}}" value="1" name="demo_vertical1" class="form-control changesNoo text-center">
													</td>
													<td>
														<input type="hidden" name="changeNoo" id="TotalPrice_{{$value->ItemID}}" value="{{$value->TotalAmount}}" class="totalLinePrice">
														<div id="TotalPriceDiv_{{$value->ItemID}}">{{$value->Quantity * $value->TotalAmount}}
														</div>
													</td>
													<td>
														<a href="DeleteOrderItem/{{$value->ItemID}}" class="action-icon text-danger">
															<i class="mdi mdi-trash-can font-size-16"></i>
														</a>
													</td>
												</tr>
												@endforeach
												@endif
											</tbody>
										</table>
									</div>
									<div class="table-responsive" style="height: 260px;">
										<table>
											<tbody>
												<tr>
													<td style="text-align: left;">Grand Total</td>
													<td>
														<div class="col-sm-4 col-lg-12 col-md-12">
															<div class="form-group mt-1">
																<div class="input-group mt-1">
																	
																	<input type="text" value="0" class="form-control order_summary bg-white" id="subTotal" name="subTotal" readonly="">
																	<label class="input-group-text">PKR</label>
																</div>
															</div>
														</div>
													</td>
												</tr>
												<tr>
													<td style="text-align: left;">Discount  </td>
													<td>
														<div class="col-sm-4 col-lg-12 col-md-12">
															<div class="form-group mt-1">
																<div class="input-group mt-1">
																	<input type="text" value="0" class="form-control order_summary bg-white" id="discount" name="discount">
																	<input type="hidden" value="0" class="form-control order_summary" id="discountAmount" name="discountAmount">
																	<label id="discPer" class="input-group-text">0.0 &nbsp;</label>
																</div>
																
															</div>
														</div>
													</td>
												</tr>
												<tr>
													<td style="text-align: left;">Tax % </td>
													<td>
														<div class="col-sm-4 col-lg-12 col-md-12">
															<div class="form-group mt-1">
																<div class="input-group mt-1">
																	<input type="text" value="0" class="form-control order_summary bg-white" id="tax" name="tax">
																	<input type="hidden" value="0" class="form-control order_summary" id="taxAmount" name="taxAmount">
																	<label id="taxPer" class="input-group-text">0.0 &nbsp;</label>
																</div>
															</div>
														</div>
													</td>
												</tr>
												<tr>
													<td style="text-align: left;">Total</td>
													<td>
														<div class="col-sm-4 col-lg-12 col-md-12">
															<div class="form-group mt-1">
																<div class="input-group mt-1">
																	
																	<input type="text" value="0" class="form-control order_summary bg-white" id="itemTotal" name="itemTotal" readonly="">
																	<label class="input-group-text">PKR</label>
																</div>
															</div>
														</div>
													</td>
												</tr>
												<tr>
													<td style="text-align: left;">Paid</td>
													<td>
														<div class="col-sm-4 col-lg-12 col-md-12">
															<div class="form-group mt-1">
																<div class="input-group mt-1">
																	<input type="text" value="0" class="form-control order_summary bg-white" id="Paid" name="Paid">
																	<label class="input-group-text">PKR</label>
																</div>
															</div>
														</div>
													</td>
												</tr>
												<tr>
													<td style="text-align: left;">Balance</td>
														<td>
															<div class="col-sm-4 col-lg-12 col-md-12">
																<div class="form-group mt-1">
																	<div class="input-group mt-1">
																		<input type="text" value="0" class="form-control order_summary bg-white" id="Balance" name="Balance" readonly="">
																		<label class="input-group-text">PKR</label>
																	</div>
																	
																</div>
															</div>
														</td>
												</tr>
											</tbody>
										</table>
									</div>

									<div class="col-sm-12">
										<div class="text-sm-end mt-2 mt-sm-0">
											<button type="submit" id="submit" class="btn btn-success">
												<i class="mdi mdi-cart-arrow-right me-1"></i> Checkout
											</button>
										</div>
									</div>
									</div>
								</div>
							</div>
						</div>
						
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<script>
// 	 $( document ).ready(function() {
    
//   $('body').addClass('sidebar-enable vertical-collpsed');
// });

	$('#submit').click(function() {  

	 
		paid = parseFloat($('#Paid').val());
		itemTotal = parseFloat($('#itemTotal').val());

		alert(paid + '---' + itemTotal);

 if ( paid < itemTotal) {
        $('#Paid').css("border", "1px dashed red");
        $('#itemTotal').css("border", "1px dashed red");

        Swal.fire({
			  icon: 'error',
			  title: 'Not Found...',
			  text: 'Something went wrong!',
			  footer: '<a href>Are you facing any issue?</a>'
			})

        return false;
    }
});

$(document).on('change keyup blur', '.changesNoo', function() {
	
	id_arr = $(this).attr('id');
	id = id_arr.split("_");
	Price = $('#CostPrice_' + id[1]).val();
	Qty = $('#qty_' + id[1]).val();
	$('#TotalPrice_' + id[1]).val((parseFloat(Price) * parseFloat(Qty)).toFixed(2));
	$('#TotalPriceDiv_' + id[1]).text((parseFloat(Price) * parseFloat(Qty)).toFixed(2));
	Subtotal();
});
$(document).ready(function() {
	Subtotal();
});
function Subtotal(){
	subTotal=0;
	$('.totalLinePrice').each(function() {
		if ($(this).val() != '') subTotal += parseFloat($(this).val());
	});
	
	$('#subTotal').val(subTotal.toFixed(2));
}
$(document).on('change keyup blur', '.order_summary', function() {
	$('#subTotal').val(subTotal.toFixed(2));
		
	discount = parseFloat($('#discount').val());
	discPer = (subTotal / 100) * discount;
	tax = parseFloat($('#tax').val());
	taxPer = subTotal / 100 * tax;
	paid = parseFloat($('#Paid').val());
	
	total = (subTotal + taxPer) - discPer;
	
	document.getElementById('discPer').innerText = discPer.toFixed(2) ;
	document.getElementById('taxPer').innerText = taxPer.toFixed(2) ;
	$('#discountAmount').val(discPer.toFixed(2));
	$('#taxAmount').val(taxPer.toFixed(2));
	$('#itemTotal').val(total.toFixed(2));
	
	$('#Balance').val((paid - total).toFixed(2));
});
function CalculateTotal () {
	subTotal = 0;
	total = 0;
	discount =0;
	tax = 0;
	taxPer =0;
	paid =0;
	balance = 0;
	
	$('.totalLinePrice').each(function() {
		if ($(this).val() != '') subTotal += parseFloat($(this).val());
	});
	
	$('#subTotal').val(subTotal.toFixed(2));
	
	discount = parseFloat($('#discount').val());
	discPer = (subTotal / 100) * discount;
	tax = parseFloat($('#tax').val());
	taxPer = (subTotal/100) * tax;
	
	paid = parseFloat($('#Paid').val());
	balance = parseFloat($('#Balance').val());
	total = (subTotal + taxPer) - discPer;
	
	document.getElementById('discPer').innerText = discPer.toFixed(2) ;
	document.getElementById('taxPer').innerText = taxPer.toFixed(2) ;
	$('#discountAmount').val(discPer).toFixed(2);
	$('#itemTotal').val(total.toFixed(2));
	
	$('#Balance').val((Paid - total).toFixed(2));
	
}
function CreateOrder($ItemID) {
	$.ajax({
		url: "{{URL('/CreateOrder/')}}/" + $ItemID,
		type: "GET",
		data: {
			"_token": "{{ csrf_token() }}",
		},
		cache: false,
		success: function(data) {
			$('#result').html(data);
		}
	});
}
$("#success-alert").fadeTo(4000, 500).slideUp(100, function() {
	$("#success-alert").slideUp("slow");
	$("#success-alert").alert('close');
});
</script>
@endsection