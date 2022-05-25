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
            <h4 class="mb-sm-0 font-size-18">All Notices</h4>
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
                        <h4 class="card-title pb-3">Manage Users</h4>
                        <div class="table-responsive">
                           <table class="table table-hover table-sm mb-0" id="datatable">
                              <thead>
                                 <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th width="20%">Action</th>
                                 </tr>
                              </thead>
                              <tbody> 
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
<script type="text/javascript">
  $(function () {
    
    $('#datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{url('/viewAllNotices')}}",
        columns: [
            {data: 'NoticeID'},
            {data: 'Title'},
            {data: 'action', orderable: true, searchable:true},
        ]
    });
    
  });
</script>

@endsection