@extends('HR.hr-layout.main')

@section('title', 'Service Invoice')


@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}" />

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
            <div class="card">
                <div class="card-body">
                    <div class="row mb-5">
                        <div class="col-md-6">
                            <div class="mb-5" style="margin-bottom: 4rem!important;">
                                <img src="{{ asset('assets/images/Shah-Corps_Logo.png') }}" style="height:100px; width:200px;">
                            </div>


                            <div class="row mb-1">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Invoice</label>
                                <div class="col-sm-8">
                                    <select class="form-control form-control-sm form-select">
                                        <option>Select Type</option>
                                        <option>Large select</option>
                                        <option>Small select</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-1">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Customer</label>
                                <div class="col-sm-8">
                                    <select class="form-control form-control-sm form-select">
                                        <option>Select Customer</option>
                                        <option>Large select</option>
                                        <option>Small select</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-1 d-none">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Customer</label>
                                <div class="col-sm-8">
                                    <input id="BranchID" type="text" onfocus="myFunction(this)">

                                    <div style="background-color: #dfdfdf;
                                        margin-right: 196px;
                                        padding-left: 8px;" id="result">

                                    </div>
                                </div>
                            </div>




                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-5">
                            <div class="row mb-1">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Invoice
                                    No</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="InvoiceNo" id="horizontal-firstname-input" placeholder="Invoice No">
                                </div>
                            </div>
                            <div class="row mb-1">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Date</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" name="CurrentDate" id="horizontal-firstname-input" placeholder="Item Name">
                                </div>
                            </div>
                            <div class="row mb-1">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">DueDate</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" name="DueDate" id="horizontal-firstname-input" placeholder="Due Date">
                                </div>
                            </div>
                            <div class="row mb-1">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Payment</label>
                                <div class="col-sm-9">
                                    <select class="form-control form-control-sm form-select">
                                        <option>Cash</option>
                                        <option>Credit Card</option>
                                        <option> Bank Check</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="mb-5">


                    <table class="table table-bordered  mb-3" id="tbl">
                        <thead>
                            <tr>

                                <th>Service</th>
                                <th>Account</th>
                                <th>Quantity</th>
                                <th>Rate</th>
                                <th>Discount</th>
                                <th>Tax</th>
                                <th>Amount</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>

                                <td>
                                    <input type="text" class="form-control col-sm-12 outline item" name="item" id="items" style="width: 200px">
                   

                                </td>

                                <td><select name="allowance" name="UnitName" class="form-select col-sm-12 outline">
                                        <option value=""></option>
                                        <option value="single">Single</option>
                                        <option value="multiple">Multiple</option>
                                    </select></td>
                                <td><input type="text" class="form-control outline" name="ItemName" id="horizontal-firstname-input" style="width:100px;"></td>
                                <td>
                                    <input type="number" class="form-control outline" name="ItemName" id="horizontal-firstname-input" style="width:100px;">
                                </td>
                                <td><input type="text" class="form-control outline" name="ItemName" id="horizontal-firstname-input" style="width:100px;"></td>
                                <td><input type="text" class="form-control outline" name="ItemName" id="horizontal-firstname-input" style="width:100px;"></td>
                                <td><input type="text" class="form-control outline" name="ItemName" id="horizontal-firstname-input" style="width:100px;"></td>
                            </tr>
                        </tbody>
                    </table>



                    <button type="submit" class="btn btn-danger w-md"><i class="fa fa-trash"></i>&nbsp;&nbsp;
                        Delete</button>
                    <button type="button" class="btn btn-success w-md" id="addBtn"><i class="fa fa-plus"></i>
                        Add More</button>
                </div>
                <div class="row">
                    <div class="col-md-6">

                    </div>
                    <div class="col-md-6">
                    </div>
                </div>



            </div>
            <button type="submit" class="btn btn-primary w-md waves-effect waves-light">Save</button>
            <button class="btn btn-secondary w-md waves-effect waves-light">Cancel</button>
        </div>

    </div>

</div>
</div>
</div>
<!-- <script>
         var i;
            var myHTML = '';
            var itemsdropdown = document.getElementById("#inneritems");

        $('#addBtn').on('click', function() {

            var $tableBody = $('#tbl').find("tbody"),
                $trLast = $tableBody.find("tr:last"),
                $trNew = $trLast.clone();
            $trLast.after($trNew);

        });
        $(".item").click(function(){
 

  $.ajax({

type: "GET",
url: "/getitems",
success: function(response) {

    var items = response.items;
    var lenth=items.length;

   

                    for (i = 0; i < lenth; i++) {
                       
                        myHTML ='<h1>Hello</h1> <br>';
                    }
                    

                    document.getElementById("#inneritems").innerHTML = myHTML;

  
}
});
});
       


    </script> -->
<script>
    $("#BranchID").click(function() {

        //    alert('ddd');
     
       

    });

    function myFunction(x) {
        
        //   x.style.background = "yellow";
        
        // var BranchID =  'hello';
        var BranchID = $('#BranchID').val();
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        // alert(BranchID);

        /*  $("#butsave").attr("disabled", "disabled"); */
        $.ajax({
            url: "http://127.0.0.1:8000/getServiceItems",
            type: "POST",
            data: {
                _token: CSRF_TOKEN,
                BranchID: BranchID,

            },
            cache: false,
            success: function(data) {
                $('#result').html(data);
            }
        });
    }
</script>


@endsection