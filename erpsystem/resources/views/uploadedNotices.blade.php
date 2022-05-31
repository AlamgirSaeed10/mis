@extends('template.main_tmp')
@section('title', 'Notices')
@section('content')
<div class="main-content">
  <div class="page-content">
    <div class="container-fluid">
      <!-- start page title -->
      <div class="row">
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
                  <div class="col-12">
                    <div class="d-sm-flex flex-wrap">
                      <h4 class="card-title mb-4">All Uploaded Notices</h4>
                      <div class="ms-auto">
                        <a href="{{URL('/addNewNotice')}}" class="btn btn-success waves-effect waves-light mb-3">
                        <b><i class="mdi mdi-plus font-size-16 align-middle me-2"></i>  Add Notice </b>
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="table-responsive">
                    <table class="table table-hover align-middle table-sm" id="notices">
                      <thead>
                        <tr>
                          <th width="10%">#</th>
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
    $('#notices').DataTable({
    processing: true,
    serverSide: true,
    ajax: "{{ route('viewAllNotices')}}",
    columns: [
    {data: 'NoticeID'},
    {data: 'Title'},
    {data: 'action', orderable: false, searchable:false},
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