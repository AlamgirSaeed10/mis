@extends('template.tmp') @section('title', $pagetitle) @section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Dashboard</h4>
                        <div class="page-title-right "> <strong class="text-danger">{{ Session::get('Email') }}</strong>
                        </div>
                        <div>
                            <p> {{Session::get('EmployeeID')}}</p>
                            <p> {{Session::get('FirstName')}}</p>
                            <p> {{Session::get('LastName')}}</p>
                            <p> {{Session::get('Email')}}</p>
                            <p> {{Session::get('StaffType')}}</p>
                        </div> 
                    </div>
                </div>
                
    
            </div>
        </div>
    </div>
</div>
@endsection