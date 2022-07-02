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
					@foreach($Flag as $value)
					<tr>
						<td style="text-align: left;">
							<span class="font-size-13 text-truncate text-left" style="text-align: left;">
								{{$value->ItemName}}
							</span>
						</td>
						<td>
							{{$value->TotalAmount}}
							<input type="hidden" name="changeNoo" id="CostPrice_{{$value->ItemID}}"
								value="{{$value->TotalAmount}}">
						</td>
						<td width="20%">
							<input type="text" value="{{$value->Quantity}}" id="qty_{{$value->ItemID}}" value="1"
								name="demo_vertical1" class="form-control changesNoo text-center">
						</td>
						<td>
							<input type="hidden" name="changeNoo" id="TotalPrice_{{$value->ItemID}}"
								value="{{$value->TotalAmount}}" class="totalLinePrice">
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

										<input type="text" value="0" class="form-control order_summary bg-white"
											id="subTotal" name="subTotal" readonly="">
										<label class="input-group-text">PKR</label>
									</div>
								</div>
							</div>
						</td>
					</tr>
					<tr>
						<td style="text-align: left;">Discount </td>
						<td>
							<div class="col-sm-4 col-lg-12 col-md-12">
								<div class="form-group mt-1">
									<div class="input-group mt-1">
										<input type="text" value="0" class="form-control order_summary bg-white"
											id="discount" name="discount">
										<input type="hidden" value="0" class="form-control order_summary"
											id="discountAmount" name="discountAmount">
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
										<input type="text" value="0" class="form-control order_summary bg-white"
											id="tax" name="tax">
										<input type="hidden" value="0" class="form-control order_summary" id="taxAmount"
											name="taxAmount">
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

										<input type="text" value="0" class="form-control order_summary bg-white"
											id="itemTotal" name="itemTotal" readonly="">
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
										<input type="text" value="0" class="form-control order_summary bg-white"
											id="Paid" name="Paid">
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
										<input type="text" value="0" class="form-control order_summary bg-white"
											id="Balance" name="Balance" readonly="">
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