@extends('template.tmp')
@section('title', 'Users')
@section('content')
<head>  
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
 {{-- <script src="{{URL('/')}}/assets/js/ckeditor.js"></script> --}}
 </head>
<div class="main-content">
<div class="page-content">
<div class="container-fluid">
   <!-- start page title -->
   <div class="row">
      <div class="col-12">
         <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Notice Board</h4>
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
               <form action = "/UploadData" method = "post" class="form-group">
                  {{csrf_field()}}
                  <div class="card">
                     <div class="card-body">
                        <h4 class="card-title">Add New Notice</h4>
                        <p class="card-title-desc"></p>
                        <div class="mb-3 row">
                           <label for="example-email-input" class="col-md-2 col-form-label">Title</label>
                           <div class="col-md-10">
                              <input class="form-control" type="text"  value="{{old('Title')}}" id="Title"  name="Title" id="example-email-input">
                           </div>
                        </div>
                        <div class="mb-3 row">
                           <label for="example-url-input" class="col-md-2 col-form-label">Description</label>
                           <div class="col-md-10">
                               <textarea name="Description" id="Description" cols="30" rows="10" class="form-control"></textarea>
                           </div>
                        </div>
                        <input type="hidden" name="FromEmployeeID" value="{{Session::get("EmployeeID")}}" placeholder="">
                        <input type="submit" class="btn btn-primary w-md">                                   
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
      <!-- container-fluid -->
   </div>
</div>

  <script>
   CKEDITOR.replace('Description',{
       height:350,
   });
</script>
@endsection