@extends('template.main_tmp')
@section('title', 'Supplier')
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
                <h5 class="card-header">Add Party / Supplier</h5>
                <div class="card-body">
                    <form action="{{URL('supplierInsert')}}" method="post">
                    {{csrf_field()}}
                    <div class="row mb-3">
                        <label for="horizontal-firstname-input" class="col-md-2 col-form-label">Party Name</label>
                            <div class="col-md-6">
                                <input type="text" name="SupplierName" class="form-control" id="SupplierName">
                            </div>
                    </div>
                    <div class="row mb-3">
                        <label for="horizontal-firstname-input" class="col-md-2 col-form-label">Address</label>
                            <div class="col-md-6">
                                <input type="text" name="Address" class="form-control" id="Address">
                            </div>
                    </div>
                    <div class="row mb-3">
                        <label for="horizontal-firstname-input" class="col-md-2 col-form-label">Phone</label>
                            <div class="col-md-6">
                                <input type="number" name="Phone" class="form-control" id="Phone">
                            </div>
                    </div>
                    <div class="row mb-3">
                        <label for="horizontal-firstname-input" class="col-md-2 col-form-label">Email</label>
                            <div class="col-md-6">
                                <input type="email" name="Email" class="form-control" id="Email">
                            </div>
                    </div>
                    <div class="row mb-3">
                        <label for="horizontal-firstname-input" class="col-md-2 col-form-label">Invoice Due Days</label>
                            <div class="col-md-6">
                                <input type="text" name="InvoiceDueDays" class="form-control" id="InvoiceDueDays">
                            </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-md-2 col-form-label">Active</label>
                        <div class="col-md-6">
                            <select class="form-select" name="Active" id="Active">
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                    </div>
                    

                    <div>
                    <button type="submit" class="btn btn-success w-sm float-right">Submit</button>

                    <button type="reset" class="btn btn-secondary w-sm float-right">Reset</button>
                    </div>
                    

                    </form>
                </div>
            </div>
              




            <div class="card">
                <h5 class="card-header">Party / Supplier Detail</h5>
                <div class="card-body">
                     @if(count($allSuppliers)>0)        
                 <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
            <thead>
            <tr>
            <tr>
                                <th>#</th>
                                <th>Party Name</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Invoice Days</th>
                                <th>Active</th>
                                <th>Action</th>
                            </tr>
            </tr>
            </thead>
            <tbody>
            @foreach ($allSuppliers as $key =>$value)
             <tr>
             <td>{{++$key}}</td>
                            <td>{{$value->SupplierName}}</td>
                            <td>{{$value->Address}}</td>
                            <td>{{$value->Phone}}</td>
                            <td>{{$value->Email}}</td>
                            <td>{{$value->InvoiceDueDays}}</td>
                            <td>{{$value->Active}}</td>
                            <td>
                            <a href="{{URL('supplierEdit/'.$value->SupplierID)}}"><i class="bx bx-pencil align-middle me-1"></i></a> <a href="#" onclick="delete_confirm2('supplierDelete',{{$value->SupplierID}})"><i class="bx bx-trash  align-middle me-1"></i></a>
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
            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
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