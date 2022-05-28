@extends('template.hr_tmp')
@section('title', 'Users')
@section('content')
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
         @if (session('error'))
         <div class="alert alert-danger p-3" id="success-alert">
             {{ Session::get('error') }}
         </div>
         @endif
         @if (session('success'))
         <div class="alert alert-success p-3" id="success-alert">
             {{ Session::get('success') }}
         </div>
         @endif
         @if (count($errors) > 0)
         <div class="card-body ">
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
                                    <th width="10%">Action</th>
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
        ajax: "{{'/viewAllNotices'}}",
        columns: [
            {data: 'NoticeID'},
            {data: 'Title'},
            {data: 'action', orderable: true, searchable:true},
        ]
    });
    
  });
    
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