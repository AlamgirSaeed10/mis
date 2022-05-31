@extends('template.main_tmp')
@section('title', 'Notifications')
@section('content')



<div class="main-content">
  <div class="page-content">
    <div class="container-fluid">
        <div class="card">
          <h4 class="card-header"> Notice</h4>
          <div class="card-body">


          
            <div class="row mb-4">
              <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Title </label>
                  <div class="col-sm-9">
                       {{$get_notice[0]->Title}}
                  </div>
            </div>
            <div class="row mb-4">
              <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Description </label>
                  <div class="col-sm-9">
                       {{!!$get_notice[0]->Description!!}}
                  </div>
            </div>
              
          </div>
        </div>
    </div>
  </div>
</div> @endsection