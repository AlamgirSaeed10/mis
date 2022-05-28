@extends('template.hr_tmp')
 @section('title', 'pagetitle')
  @section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            @if (session('error'))
            <div class="alert alert-danger p-3" id="alert-danger">
                {{ Session::get('error') }}
            </div>
            @endif @if (session('success'))
            <div class="alert alert-success p-3" id="success-alert">
                {{ Session::get('success') }}
            </div>
            @endif @if (count($errors) > 0)
            <div class="card-body" id="alert-danger">
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
                <div class="col-lg-4">
                    <div class="card card-body">
                        <div class="col-sm-12">
                            <div class="input-group col-sm-12 mb-2">
                                <select class="form-select" id="" name="">
                                    <option value="Walk-in Customer" selected="">Walk-in Customer</option>
                                </select>
                            </div>
                            <div class="col-sm-12 mb-2">
                                <input class="form-control" type="text" id="" name="" placeholder="Reference Note" />
                            </div>
                            <div class="col-sm-12 mb-2">
                                <input class="form-control" type="text" id="" name="" placeholder="Search product by code,name or scan barcode" />
                            </div>
                        </div>
                        <div id="list-table-div" style="overflow: auto; width: auto; height: 382px;">
                            <div class="fixed-table-header">
                                <table class="table table-striped table-condensed table-hover list-table" style="margin: 0;" id="employeeList">
                                    <thead>
                                        <tr class="success">
                                            <th>Product</th>
                                            <th>Price</th>
                                            <th>Qty</th>
                                            <th>Subtotal</th>
                                            <th><i class="mdi mdi-delete-sweep"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div id="totaldiv">
                            <table id="totaltbl" class="table table-condensed totals" style="margin-bottom: 10px; height: 120px;">
                                <tbody>
                                    <tr class="bg-info text-white">
                                        <td>Total Items</td>
                                        <td><span id="count">1 (1.00)</span></td>
                                        <td>Total</td>
                                        <td class="text-right" colspan="2"><span id="total">15.00</span></td>
                                    </tr>
                                    <tr class="bg-info text-white">
                                        <td><a href="#" class="text-white" id="add_discount">Discount</a></td>
                                        <td class="text-right" style="padding-right: 10px;"><span id="ds_con">(0.00) 11.00</span></td>
                                        <td><a href="#" id="add_tax" class="text-white">Order Tax</a></td>
                                        <td class="text-right"><span id="ts_con">20.00</span></td>
                                    </tr>
                                    <tr class="bg-success text-white">
                                        <td colspan="2" style="font-weight: bold;">
                                            Total Payable
                                        </td>
                                        <td class="text-right" colspan="2" style="font-weight: bold;"><span id="total-payable text-center">24.00</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8" style="height:700px; overflow: auto;">
                    <div class="card card-body text-center">
                        <table id="posTable" class="table table-striped table-condensed table-hover list-table" style="margin: 0px;" data-height="100">
                            <thead>
                                <div class="row">
                                    <form action="">
                                        <?php
                                        $items = json_decode($item);
                                        foreach ($items as $key => $value): ?>
                                        <div class="col-md-6 col-xl-3">
                                            
                                            <input type="hidden" id="abc_{{$value->ItemID}} " value="{{$value->ItemID}}" class="abc" >
                                            
                                            <div class="card" id="order_id1" onclick="k({{$value->ItemID}});">
                                                <img class="card-img-top img-fluid" src="{{asset('/img/hr.png')}}">
                                                <div class="card-body">
                                                    <p id="title">{{$value->ItemName}}</p>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <?php endforeach ?>
                                    </form>
                                </div>
                            </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script>

function k($valuee)
{

var id_value = $valuee;

var data =<?php echo $item; ?>

var index = -1;

var filteredObj = data.find(function(item, i){

if(item.ItemID === id_value){

index = i;
return i;

}

});
const data1 = `{
    "name": "Alex",
    "age": 20,
    "grade": "A",
    "marks": [
        {"sub1" : 80},
        {"sub2" : 30}
    ]
}`;
let n =filteredObj.ItemName;
let d =filteredObj.ItemID;
let json = JSON.parse(data1);
console.log(json);

console.log(`sub1: ${json.marks[0].n} sub2: ${json.marks[1].d}`);
  
}
function onDelete(td) {
    if (confirm('Are you sure to delete this record ?')) {
        row = td.parentElement.parentElement;
        document.getElementById("employeeList").deleteRow(row.rowIndex);
    }
}
</script>
@endsection