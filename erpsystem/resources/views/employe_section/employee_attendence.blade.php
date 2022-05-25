@extends('employe_section.layout.employeemain')
@section('title', 'Employee Letter')
@section('content')

    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Employee Attendence</h4>
                            <div class="page-title-right">
                                <div class="page-title-right">
                                    <a href="" class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i
                                            class="mdi mdi-arrow-left  me-1 pt-5"></i> Go Back</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        @if (session('error'))
                            <div class="alert alert-sucess p-3 ">
                                {{ Session::get('error') }}
                            </div>
                        @endif
                        @if (count($errors) > 0)
                            <div>
                                <div class="alert alert-danger pt-3 pl-0   border-3 bg-danger text-white">
                                    <p class="font-weight-bold"> There were some problems with your input.</p>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif

                    </div>

                    <div class="row">
                        <div class="col-xl-6">
                            <div class="card">
                                <div class="card-body">
                                    <?php
                                // $todayattendence=DB::table('attendance')->where( DATE('CheckIN') , '=' ,  date("h:i:s") )->where('EmployeeID',session::get('EmployeeID'))->get(); 
                                // dd($todayattendence);
                                date_default_timezone_set("Asia/Karachi");
                                if( date("h:i:s a") > '11:40:0')
                                {
                                    ?>
                                    <div class="alert alert-danger p-3 ">
                                        You are late today
                                    </div>
                                    <?php  } ?>
                                    <h4 class="card-title">Employee Attendence</h4>
                                    <p>Mark your attendence when you will enter the office. </p>
                                    <form class="needs-validation" action="{{ route('Inattendence') }}" method="POST">
                                        {{ csrf_field() }}
                                        <?php
                                        
                                        ?>

                                        <div class="row mb-4">
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" value="{{ date('h:i:s a') }}"
                                                    id="horizontal-firstname-input" readonly><br>

                                                <input type="text" class="form-control" value="{{ date('m/d/Y') }}"
                                                    id="horizontal-firstname-input" readonly>

                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-success waves-effect waves-light">
                                            IN <i class="bx bx-check-double font-size-18 align-middle"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="card">
                                <div class="card-body">
                                
                                    <h4 class="card-title">Employee Attendence</h4>
                                    <p>Mark your attendence when you will enter the office. </p>
                                    <form class="needs-validation" action="{{ route('Outattendence') }}" method="POST">
                                        {{ csrf_field() }}
                                       

                                        <div class="row mb-4">
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" value="{{ date('h:i:s a') }}"
                                                    id="horizontal-firstname-input" readonly><br>

                                                <input type="text" class="form-control" value="{{ date('m/d/Y') }}"
                                                    id="horizontal-firstname-input" readonly>

                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-success waves-effect waves-light">
                                            Out <i class="bx bx-check-double font-size-18 align-middle"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="card">
                        <div class="card-header bg-transparent border-bottom h5  ">
                            Attendance Section
                        </div>
                        <div class="card-body">
                            @if (count($attendance) != 0)
                                <div class="table-responsive">
                                    <table class="table table-striped mb-0 table-sm">

                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            @foreach ($attendance as $value)
                                                <tr>
                                                    <th scope="row">{{ $i++ }}</th>
                                                    <td>{{ $value->CheckIN }}</td>
                                                    <td>{{ $value->Status }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <p class="text-danger text-center">No Record Found</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
