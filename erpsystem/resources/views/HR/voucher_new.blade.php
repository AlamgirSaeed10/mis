@extends('template.main_tmp')
@section('title', 'Voucher')
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
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18"><b>Voucher</b></h4>
                            <div class="page-title-right">
                                <div class="page-title-right">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- start page title -->

                <!-- end page title -->
                <form>
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-5">
                                <div class="col-lg-6">
                                    <textarea class="form-control" rows="8" placeholder="Narration"></textarea>
                                </div>
                                <div class="col-lg-6">
                                    <div class="row mb-2">
                                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Invoice
                                            #</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="ItemName"
                                                id="horizontal-firstname-input" placeholder="Item Name"
                                                style="border-radius:0.1px">
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Voucher
                                            Type</label>
                                        <div class="col-sm-8">
                                            <select name="allowance" name="UnitName" class="form-select"
                                                style="border-radius:0.1px">
                                                <option value="">Select</option>
                                                <option value="single">single</option>
                                                <option value="multiple">multiple</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Chart of
                                            Account</label>
                                        <div class="col-sm-8">
                                            <select name="allowance" name="UnitName" class="form-select"
                                                style="border-radius:0.1px">
                                                <option value="">Select</option>
                                                <option value="single">single</option>
                                                <option value="multiple">multiple</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Date</label>
                                        <div class="col-sm-8">
                                            <input type="date" class="form-control" name="ItemName"
                                                id="horizontal-firstname-input" placeholder="Item Name"
                                                style="border-radius:0.1px">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            {{-- <hr class="mb-5"> --}}
                            {{-- <input type="text" placeholder="Enter text" id="total"> --}}
                        </div>

                        <div class='row'>
                            <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th width="2%"><input id="check_all" class="formcontrol" type="checkbox" />
                                            </th>
                                            <th width="15%">Account</th>
                                            <th width="15%">Supplier</th>
                                            <th width="15%">Party</th>
                                            <th width="15%">Narration</th>
                                            <th width="15%">invoice</th>
                                            <th width="15%">Ref No</th>
                                            <th width="15%">Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><input class="case" type="checkbox" /></td>
                                            <td>
                                                    <select name="Account[]" id="Account_1" class="form-control select2" data-select2-id="1" tabindex="-1" aria-hidden="true" autocomplete="off">
                                                        <option data-select2-id="3">Select</option>
                                                            <option value="AK" data-select2-id="22">Alaska</option>
                                                            <option value="HI" data-select2-id="23">Hawaii</option>
                                                    </select>
                                            </td>
                                            <td>
                                                    <select name="Supplier[]" id="Supplier_1" class="form-control select2 select2-hidden-accessible" data-select2-id="1" tabindex="-1" aria-hidden="true" autocomplete="off">
                                                        <option data-select2-id="3">Select</option>
                                                            <option value="AK" data-select2-id="22">Alaska</option>
                                                            <option value="HI" data-select2-id="23">Hawaii</option>
                                                    </select>
                                            </td>
                                            <td>
                                                    <select name="Party[]" id="Party_1" class="form-control select2 select2-hidden-accessible" data-select2-id="1" tabindex="-1" aria-hidden="true" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;"
                                                    onpaste="return false;">
                                                        <option data-select2-id="3">Select</option>
                                                            <option value="AK" data-select2-id="22">Alaska</option>
                                                            <option value="HI" data-select2-id="23">Hawaii</option>
                                                    </select>
                                            </td>
                                            <td><input type="text" name="Narration[]" id="Narration_1"
                                                    class="form-control " autocomplete="off"
                                                    onkeypress="return IsNumeric(event);" ondrop="return false;"
                                                    onpaste="return false;"></td>
                                            <td><input type="text" name="invoice[]" id="invoice_1"
                                                    class="form-control" autocomplete="off"
                                                    onkeypress="return IsNumeric(event);" ondrop="return false;"
                                                    onpaste="return false;"></td>
                                            <td><input type="text" name="Ref_No[]" id="Ref_No_1"
                                                    class="form-control " autocomplete="off"
                                                    onkeypress="return IsNumeric(event);" ondrop="return false;"
                                                    onpaste="return false;"></td>
                                            <td><input type="text" name="Amount[]"
                                                    class="form-control totalLinePricee changesNo" autocomplete="off"
                                                    onkeypress="return IsNumeric(event);" ondrop="return false;"
                                                    onpaste="return false;" id="Amount sum_dr"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-xs-12 col-sm-3 col-md-3 col-lg-3'>
                                <button type="button" class="btn btn-danger delete">- Delete</button>
                                <button type="button" class="btn btn-success addmore">+ Add More</button>
                                <input type="text" class="form-control"
                                    style="margin-left: 390%;width:100px;margin-top:-35px;" id="total">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary w-md waves-effect waves-light">Save</button>
                    <button class="btn btn-secondary w-md waves-effect waves-light">Cancel</button>
                </form>


                <!-- end row -->
                <script>


                    $('#addBtn').on('click', function() {

                        var $tableBody = $('#tbl').find("tbody"),
                            $trLast = $tableBody.find("tr:last"),
                            $trNew = $trLast.clone();

                        $trLast.after($trNew);

                    });

                    ////////////////////////////////////////////

                    $(document).on(' keyup blur', '.changesNo', function() {
                        var sum_dr = 0;
                    $.each($('.totalLinePricee'), function() {

                        if ($(this).val().length == 0) {
                        }
                        else {

                             sum_dr += parseInt($(this).val());


                            }
                            $("#total").val(sum_dr);
                            });



                    });
                    $(document).on('keyup blur', '.changesNo', function() {
            calculate();

        });
        $(".delete").on('click', function() {
    $('.case:checkbox:checked').parents("tr").remove();
    $('#check_all').prop("checked", false);
    calculate();
});

        function calculate() {


            var sum_dr = 0;
            $.each($('.totalLinePricee'), function() {

                if ($(this).val().length == 0) {} else {

                    sum_dr += parseInt($(this).val());


                }
                $("#check").val(sum_dr);
            });
        }
                </script>
            </div>
        </div>
    </div>

@endsection
