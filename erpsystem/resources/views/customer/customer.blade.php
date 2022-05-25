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
                <h4 class="card-header"> Add Party / Customer</h4>
                <div class="card-body">

                <!-- enctype="multipart/form-data" -->
                <form action="{{URL('customerInsert')}}" method="post"> {{csrf_field()}} 
                    <div class="row mb-2">
                        <label for="horizontal-firstname-input" class=" font-weight-bold col-md-2 col-form-label">Party Name</label>
                            <div class="col-md-6">
                                <input type="text" name="PartyName" class="form-control" id="PartyName">
                            </div>
                    </div>
                    <div class="row mb-2">
                        <label for="horizontal-firstname-input" class="col-md-2 col-form-label">Address</label>
                            <div class="col-md-6">
                                <input type="text" name="Address" class="form-control" id="Address">
                            </div>
                    </div>
                    <div class="row mb-2">
                        <label for="horizontal-firstname-input" class="col-md-2 col-form-label">Phone</label>
                            <div class="col-md-6">
                                <input type="text" name="Phone" class="form-control" id="Phone">
                            </div>
                    </div>
                    <div class="row mb-2">
                        <label for="horizontal-firstname-input" class="col-md-2 col-form-label">Email</label>
                            <div class="col-md-6">
                                <input type="text" name="Email" class="form-control" id="Email">
                            </div>
                    </div>
                    <div class="row mb-2">
                        <label for="horizontal-firstname-input" class="col-md-2 col-form-label">Invoice Due Days</label>
                            <div class="col-md-6">
                                <input type="number" name="InvoiceDueDays" class="form-control" id="InvoiceDueDays">
                            </div>
                    </div>
                    <div class="mb-2 row">
                        <label class="col-md-2 col-form-label">Active</label>
                        <div class="col-md-6">
                            <select class="form-select" name="Active" id="Active">
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-success w-sm float-right">Save</button>
                        <button type="reset" class="btn btn-secondary w-sm float-right">Reset</button>

                    </div>
                    
                </form>
                </div>
            </div>
            <div class="card">
            <h4 class="card-header">Party/ Customer Detail</h4>
                <div class="card-body">
                    @if(count($customerCreate)>0)
                    <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <td>#</td>
                            <td>PartyName</td>
                            <td>Address</td>
                            <td>Phone</td>
                            <td>Email</td>
                            <td>Active</td>
                            <td>InvoiceDueDays</td>
                            <td>eDate</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customerCreate as $key =>$value)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$value->PartyName}}</td>
                            <td>{{$value->Address}}</td>
                            <td>{{$value->Phone}}</td>
                            <td>{{$value->Email}}</td>
                            <td>{{$value->Active}}</td>
                            <td>{{$value->InvoiceDueDays}}</td>
                            <td>{{$value->eDate}}</td>
                            <td>
                            <a href="{{URL('customerEdit/'.$value->PartyID)}}"><i class="bx bx-pencil align-middle me-1"></i></a> <a href="#" onclick="delete_confirm2('customerDelete',{{$value->PartyID}})"><i class="bx bx-trash  align-middle me-1"></i></a>                               
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

    $(document).ready(function () {
    $('#dtBasicExample').DataTable();
    $('.dataTables_length').addClass('bs-select');
    });

    </script>
@endsection