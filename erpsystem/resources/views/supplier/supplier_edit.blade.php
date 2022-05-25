@extends('HR.hr-layout.main')
@section('title', $pagetitle)
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
                <h5 class="card-header">Edit Party / Supplier</h5>
                <div class="card-body">
                    <form action="{{URL('supplierUpdate/')}}" method="post">
                    {{csrf_field()}}
                    <input type="hidden" name="SupplierID" value="{{$supplierEdit[0]->SupplierID}}">
                    <div class="row mb-3">
                        <label for="horizontal-firstname-input" class="col-md-2 col-form-label">Party Name</label>
                            <div class="col-md-6">
                                <input type="text" name="SupplierName" class="form-control" id="SupplierName" value="{{$supplierEdit[0]->SupplierName}}">
                            </div>
                    </div>
                    <div class="row mb-3">
                        <label for="horizontal-firstname-input" class="col-md-2 col-form-label">Address</label>
                            <div class="col-md-6">
                                <input type="text" name="Address" class="form-control" id="Address" value="{{$supplierEdit[0]->Address}}">
                            </div>
                    </div>
                    <div class="row mb-3">
                        <label for="horizontal-firstname-input" class="col-md-2 col-form-label">Phone</label>
                            <div class="col-md-6">
                                <input type="number" name="Phone" class="form-control" id="Phone" value="{{$supplierEdit[0]->Phone}}">
                            </div>
                    </div>
                    <div class="row mb-3">
                        <label for="horizontal-firstname-input" class="col-md-2 col-form-label">Email</label>
                            <div class="col-md-6">
                                <input type="text" name="Email" class="form-control" id="Email" value="{{$supplierEdit[0]->Email}}">
                            </div>
                    </div>
                    <div class="row mb-3">
                        <label for="horizontal-firstname-input" class="col-md-2 col-form-label">Invoice Due Days</label>
                            <div class="col-md-6">
                                <input type="text" name="InvoiceDueDays" class="form-control" id="InvoiceDueDays" value="{{$supplierEdit[0]->InvoiceDueDays}}">
                            </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-md-2 col-form-label">Active</label>
                        <div class="col-md-6">
                            <select class="form-select" name="Active" id="Active" >
                                <option value="Yes" {{( $supplierEdit[0]->Active == 'Yes') ? 'checked': '' }}>Yes</option>
                                <option value="No" {{( $supplierEdit[0]->Active == 'No') ? 'checked': '' }} >No</option>
                            </select>
                        </div>
                    </div>
                    

                    <div>
                    <button type="submit" class="btn btn-success w-sm float-right">Update</button>

                    </form>
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
      </script>
    @endsection