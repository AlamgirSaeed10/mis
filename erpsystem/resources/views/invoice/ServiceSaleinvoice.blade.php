@extends('employe_section.layout.employeemain')
<?php 

$invoicetypes = DB::table('invoice_type')->get();
$products = DB::table('product')->get();


?>

@section('title', 'Sale Invoice')


@section('content')
    <style>
        .outline {
            border: none;
            background-color: transparent;
            resize: none;
            outline: none;
        }

    </style>
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">
                <form method="POST" action="{{ route('itemsaleinvoice') }}">
                    @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-5">
                            <div class="col-md-6">
                                <div class="mb-5" style="margin-bottom: 4rem!important;">
                                    <img src="{{ asset('assets/images/Shah-Corps_Logo.png') }}"
                                        style="height:100px; width:200px;">
                                </div>

                                    @csrf
                                    <div class="row mb-1">
                                        <label for="horizontal-firstname-input"
                                            class="col-sm-3 col-form-label">Invoice</label>
                                        <div class="col-sm-8">
                                            <select class="form-control form-control-sm form-select" name="InvoiceTypeID">
                                                <option>Select Type</option>
                                                @foreach ($invoicetypes as $invoicetype)
                                                    <option value="{{ $invoicetype->InvoiceTypeID }}">
                                                        {{ $invoicetype->InvoiceType }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <label for="horizontal-firstname-input"
                                            class="col-sm-3 col-form-label">Customer</label>
                                        <div class="col-sm-8">
                                            <select class="form-control form-control-sm form-select" name="PartyID">
                                                <option>Select Customer</option>
                                                <option value="1">Customer 1</option>
                                                <option value="2">Customer 2</option>
                                            </select>
                                        </div>
                                    </div>




                            </div>
                            <div class="col-md-1"></div>
                            <div class="col-md-5">
                                <div class="row mb-1">
                                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Invoice
                                        No</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="InvoiceNo"
                                            id="horizontal-firstname-input" placeholder="Invoice No">
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Date</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" name="CurrentDate"
                                            id="horizontal-firstname-input CurrentDate" value="<?php echo date('Y-m-d'); ?>">
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">DueDate</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" name="DueDate" value="<?php echo date('Y-m-d'); ?>"
                                            id="horizontal-firstname-input" placeholder="Due Date">
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Payment</label>
                                    <div class="col-sm-9">
                                        <select class="form-control form-control-sm form-select" name="PaymentMode">
                                            <option value="Cash">Cash</option>
                                            <option value="Card">Credit Card</option>
                                            <option value="Check"> Bank Check</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr class="mb-5">
                        <div class='row'>
                            <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
                            
                             
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th width="2%"><input id="check_all" class="formcontrol" type="checkbox" />
                                            </th>
                                            <th width="25%">Item</th>

                                            <th width="10%">Quantity</th>
                                            <th width="10%">Rate</th>
                                            <th width="10%">Discount</th>
                                            <th width="12%">Tax</th>
                                            <th width="12%">Tax Amount</th>
                                            <th width="15%">Amount</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="row_1">
                                            <td><input class="case" type="checkbox" /></td>
                                            <td>
                                                <select name="Items[]" id="Items_1" class="form-control items"
                                                    data-select2-id="1" tabindex="-1" aria-hidden="true" autocomplete="off">
                                                    <option data-select2-id="1">Select</option>
                                                    @foreach ($products as  $product)
                                                    <option value="{{ $product->ProductID }}.{{ $product->Price }}" data-select2-id="2">{{ $product->Name }}</option>

                                                    @endforeach
                                                    <option value="1.150" data-select2-id="2">Alaska</option>
                                                    <option value="2.200" data-select2-id="3">Hawaii</option>
                                                </select>
                                                <input type="hidden" name="ItemID[]" id="ItemID_1" class="form-countrol">
                                            </td>

                                            <td><input type="number" value="1" name="Quantity[]" id="quantity_1"
                                                    class="form-control quantity" autocomplete="off"
                                                    onkeypress="return IsNumeric(event);" ondrop="return false;"
                                                    onpaste="return false;"></td>
                                            <td><input type="text" name="Rate[]" id="rate_1" class="form-control rate"
                                                    autocomplete="off" onkeypress="return IsNumeric(event);"
                                                    ondrop="return false;" onpaste="return false;"></td>
                                            <td><input type="number" name="Discount[]" value="0" id="discount_1"
                                                    class="form-control discount" autocomplete="off"
                                                    onkeypress="return IsNumeric(event);" ondrop="return false;"
                                                    onpaste="return false;"></td>
                                            <td><input type="text" name="Tax[]" id="tax_1" class="form-control tax"
                                                    autocomplete="off" value="5%" nkeypress="return IsNumeric(event);"
                                                    ondrop="return false;" onpaste="return false;"></td>
                                                 
                                            <td><input type="text" name="TaxAmount[]" id="taxamount_1" class="form-control tax"
                                                    autocomplete="off"  nkeypress="return IsNumeric(event);"
                                                    ondrop="return false;" onpaste="return false;"></td>
                                            <td><input type="number" name="Amount[]"
                                                    class="form-control totalLinePricee changes" autocomplete="off"
                                                    onkeypress="return IsNumeric(event);" ondrop="return false;"
                                                    onpaste="return false;" id="Amount_1"></td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-xs-12 col-sm-3 col-md-3 col-lg-3'>
                                <button class="btn btn-danger delete" type="button">- Delete</button>
                                <button class="btn btn-success addmore" type="button">+ Add More</button>

                            </div>
                        </div>
                    </div>
                    <div class="row mb-4" style="margin-left:10px">
                        <div class="col-md-8">

                            <label for="basicpill-firstname-input">Notes*</label>

                            <textarea class="form-control mb-4" name="Note" rows="5" placeholder="Notes"></textarea>



                        </div>

                        <div class="col-md-4" style="margin-left:-5px;">
                            <label for="basicpill-firstname-input">Total*</label>
                            <div class="input-group">

                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="validationTooltipUsernamePrepend">Rs</span>
                                </div>
                                <input type="text" name="Total" class="form-control" id="check" placeholder="Total"
                                    aria-describedby="validationTooltipUsernamePrepend" required="">


                            </div>
                            <label for="basicpill-firstname-input">Amount Paid*</label>
                            <div class="input-group">

                                <div class="input-group-prepend">
                                    <span class="input-group-text " id="validationTooltipUsernamePrepend">Rs</span>
                                </div>
                                <input type="text" class="form-control paid" id="validationTooltipUsername"
                                    placeholder="Amount Paid" name="Paid" aria-describedby="validationTooltipUsernamePrepend"
                                    required="">

                            </div>
                            <label for="basicpill-firstname-input">Amount Due*</label>
                            <div class="input-group">

                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="validationTooltipUsernamePrepend">Rs</span>
                                </div>
                                <input type="text" class="form-control due" id="validationTooltipUsername due"
                                    placeholder="Amount Due" name="Balance" aria-describedby="validationTooltipUsernamePrepend"
                                    required="">

                            </div>
                        </div>

                    </div>
                    <div class="row mb-4" style="margin-left:10px">

                        <div class="col-md-12">

                            <button type="submit" class="btn btn-primary w-md waves-effect waves-light">Save</button>
                            <button class="btn btn-secondary w-md waves-effect waves-light">Cancel</button>



                        </div>
                       
                    </div>


                </div>
                </form> 
            </div>


        </div>

    </div>
    </div>
    </div>
    <script>
        var i = $('table tr').length;



        $(document).on('keyup change', '.items', function() {

            var id_arr = $(this).attr('id');
            var id = id_arr.split("_");
            var val = $(this).val();
            const values = val.split(".");
            var ItemID = values[0];
            var ItemRate = values[1];
            $('#ItemID_' + id[1]).val(ItemID);
            $('#rate_' + id[1]).val(ItemRate);
            var tax = $('#tax_' + id[1]).val();
            tax = tax.split("%");
            var taxx = tax[0] * ItemRate / 100;
            var totalamount = parseInt(ItemRate) + parseInt(taxx);
            $('#taxamount_' + id[1]).val(taxx);
            $('#Amount_' + id[1]).val(totalamount);
            calculate();
        });



        //when quantity changes
        $(document).on('keyup change', '.quantity', function() {
            var id_arr = $(this).attr('id');
            var id = id_arr.split("_");
            var quantity = $(this).val();
            var rate = $('#rate_' + id[1]).val();
            var tax = $('#tax_' + id[1]).val();
            tax = tax.split("%");
            var discount = $('#discount_' + id[1]).val();
            var total = quantity * rate;
            var taxx= tax[0] * total / 100;
            var discounttotal =parseInt(taxx) + parseInt(total)  - parseInt(discount);
            $('#taxamount_' + id[1]).val(taxx);
            $('#Amount_' + id[1]).val(discounttotal);
            calculate();
        });

        //when discount
        $(document).on('keyup change', '.discount', function() {
            var id_arr = $(this).attr('id');
            var id = id_arr.split("_");
            var discount = $(this).val();
            var rate = $('#rate_' + id[1]).val();
            var tax = $('#tax_' + id[1]).val();
            tax = tax.split("%");
            var quantity = $('#quantity_' + id[1]).val();        
            var amount = quantity * rate;
            var taxx = tax[0] * amount / 100;
            var inctax = parseInt(taxx) + parseInt(amount);
            var discounttotal = inctax - discount;
            $('#taxamount_' + id[1]).val(taxx);
            $('#Amount_' + id[1]).val(discounttotal);
            calculate();

        });


        //when tax changes
        $(document).on('keyup change', '.tax', function() {

            var id_arr = $(this).attr('id');
            var id = id_arr.split("_");
            var tax = $(this).val();
            tax = tax.split("%");

            var rate = $('#rate_' + id[1]).val();
            var discount = $('#discount_' + id[1]).val();
            var quantity = $('#quantity_' + id[1]).val();
           
            var amount = quantity * rate;
            var taxx = tax[0] * amount / 100;
            var inctax = parseInt(taxx) + parseInt(amount);
            var discounttotal = inctax - discount;
            $('#taxamount_' + id[1]).val(taxx);
            $('#Amount_' + id[1]).val(discounttotal);
            calculate();

        });

        // when rate changes

        $(document).on('keyup change', '.rate', function() {

            var id_arr = $(this).attr('id');
            var id = id_arr.split("_");
            var rate = $(this).val();
            var quantity = $('#quantity_' + id[1]).val();
            var tax = $('#tax_' + id[1]).val();
            tax = tax.split("%");
            var discount = $('#discount_' + id[1]).val();
            var amount = quantity * rate;
            var taxx = tax[0] * amount  / 100;
            var inctax = parseInt(taxx) + parseInt(amount);
            var discounttotal = inctax - discount;
            $('#taxamount_' + id[1]).val(taxx);
            $('#Amount_' + id[1]).val(discounttotal);
            calculate();

        });

        //when amount paid
        $(document).on('keyup change', '.paid', function() {

            var amountpaid = $(this).val();
            var totalamount = $("#check").val();
            var amountdue = parseInt(totalamount) - parseInt(amountpaid);
            $(".due").val(amountdue);




        });


        $(".addmore").on('click', function() {

            html = '<tr>';
            html += '<td><input class="case" type="checkbox"/></td>';
            html += '<td><select type="text" name="Items[]" id="Items_' + i +
                '" class="form-control items" data-select2-id="1" tabindex="-1" aria-hidden="true" autocomplete="off"><option data-select2-id="3">Select</option>  @foreach ($products as  $product)<option value="{{ $product->ProductID }}.{{ $product->Price }}" data-select2-id="2">{{ $product->Name }}</option> @endforeach <option value="1.150" data-select2-id="22">Alaska</option><option value="2.200" data-select2-id="23">Hawaii</option></select><input type="hidden" name="ItemID[]"  id="ItemID_' +
                i + '"  class="form-countrol"></td>';


            html += '<td><input type="number" name="Quantity[]" id="quantity_' + i +
                '" value="1" class="form-control quantity" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>';
            html += '<td><input type="text" name="Rate[]" id="rate_' + i +
                '" class="form-control rate" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>';
            html += '<td><input type="number" name="Discount[]" value="0" id="discount_' + i +
                '" class="form-control discount " autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>';
            html += '<td><input type="text" name="Tax[]" value="5%" id="tax_' + i +
                '" class="form-control tax " autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>';
            html += '<td><input type="text" name="TaxAmount[]" value="" id="taxamount_' + i +
                '" class="form-control tax " autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>';
            html += '<td><input type="text" name="Amount[]" id="Amount_' + i +
                '" class="form-control totalLinePricee changes" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>';
            html += '</tr>';
            $('table').append(html);
            // $(".row_1").after(html);
            // $('#'+'Service_'+i, 'table').select2();
            // $('#'+'Account_'+i, 'table').select2();
            // $('#'+'tax_'+i, 'table').select2();
            i++;
        });








        $(document).on('keyup blur', '.changes', function() {
            calculate();

        });
        $(".delete").on('click', function() {
            $('.case:checkbox:checked').parents("tr").remove();
            $('#check_all').prop("checked", false);
            calculate();
        });

        function calculate() {
            var i = $('table tr').length;


            var sum_dr = 0;
            $.each($('.totalLinePricee'), function() {

                if ($(this).val().length == 0) {} else {

                    sum_dr += parseInt($(this).val());


                }
                $("#check").val(sum_dr);
            });
        }
    </script>


@endsection
