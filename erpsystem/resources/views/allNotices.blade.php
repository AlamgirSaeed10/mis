@extends('HR.hr-layout.main')
@section('title', 'Users')
@section('content')
<head>
    {{-- <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet"> --}}
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
</head>

<div class="main-content">
<div class="page-content">
<div class="container-fluid">
   <!-- start page title -->
   <div class="row">
      <div class="col-12">
         <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Add New notice</h4>
            <div class="page-title-right">
               <div class="page-title-right">
               </div>
            </div>
         </div>
      </div>
      <div>
         <!-- end page title -->
         @if (count($errors) > 0)
         <div >
            <div class="alert alert-danger pt-3 pl-0   border-3">
               <p class="font-weight-bold"> There were some problems with your input.</p>
               <ul>
                  @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                  @endforeach
               </ul>
            </div>
         </div>
         @endif
            <div class="row">
            <div class="col-12">
                <div class="card">
                <div class="card-body">
                        <h4 class="card-title pb-3">Title</h4>
                        {{$getRelatedNotice[0]->Title}}
                     </div>
                  </div>
            </div>

              <div class="col-12">
                <div class="card">
                <div class="card-body">
                        <h4 class="card-title pb-3">Manage Users</h4>
                        <div class="table-responsive">
                        
                           <table class="table table-hover table-sm mb-0">
                              <thead>
                                 <tr>
                                    <th>#</th>
                                    <th>Employee ID</th>
                                    <th>Employee Name</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                 </tr>
                              </thead>
                              <tbody> 
                              @foreach($getRelatedNotice as $key => $value)
                              <tr>
                                <td>{{++$key}}</td>
                                <td>{{$value->EmployeeID}}</td>
                                <td>{{$value->FirstName}} {{$value->LastName}}</td>
                                <td>{{$value->eDate}}</td>
                               @if($value->Status =='1')         
                                  <td><i class="bx bx-check-double" style="color:blue; font-size: 16px;"></i></td>         
                            @else
                                  <td></td>        
                            @endif
                                </td>
                              </tr>
                              @endforeach

                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
            </div>
         </div>
      </div>
      <!-- container-fluid -->
   </div>
</div>

@endsection