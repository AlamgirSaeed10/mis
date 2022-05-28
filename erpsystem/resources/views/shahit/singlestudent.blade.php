



@extends('HR.hr-layout.main')

@section('title', 'Employee Details')


@section('content')

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Employee Detail</h4>

                        <div class="page-title-right">
                            <div class="page-title-right">
                                <!-- button will appear here -->

                                <a href="{{ URL('/students') }}" class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i class="mdi mdi-arrow-left  me-1 pt-5"></i> Go Back</a>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-xl-9">
                    @if (session('error'))
                    <div class="alert alert-{{ Session::get('class') }} p-3 ">

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

                    @include('shahit.layout.studentnav')

                    <form action="{{ URL('/EmployeeUpdate') }}" method="post" enctype="multipart/form-data">
                        <div class="row">

                            {{ csrf_field() }}
                            <input type="hidden" name="EmployeeID" value="" readonly="">


                            <div>







                                <div class="card">
                                    <div class="card-header bg-transparent border-bottom h5">
                                        Personal Information
                                    </div>
                                    <div class="card-body">
                                        <!-- start of personal detail row -->
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-striped table-sm table-responsive">



                                            <tr>
                                                <td class="fw-bold">Full Name</td>
                                                <td>{{ $student[0]->StudentFullName }}</td>
                                            </tr>
                                          
                                          
                                            <tr>
                                                <td class="fw-bold">Father Name</td>
                                                <td>{{ $student[0]->StudentFatherName }}</td>
                                            </tr>

                                            <?php

                                            $dob=  $student[0]->StudentDob;
                                           $dateofbirth= ( $dob==null) ? null :  date("Y-m-d", strtotime($dob) )
                                          
                                          
                                            ?>
                                            <tr>
                                                <td class="fw-bold">Date of Birth</td>
                                                <td>{{  $dateofbirth }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold">Gender</td>
                                                <td>{{ $student[0]->StudentGender }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold">Martial Status</td>
                                                <td>{{ $student[0]->StudentMartialStatus }}</td>
                                            </tr>
                                           

                                        </table>

                                        <div class="row">








                                        </div>
                                        <!-- end of personal detail row -->
                                    </div>
                                </div>


                                <div class="card">
                                    <div class="card-header bg-transparent border-bottom h5">
                                        Contact Detail
                                    </div>
                                    <div class="card-body">

                                        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-striped table-sm table-responsive">
                                            <tr>
                                                <td class="fw-bold col-md-5">Address</td>
                                                <td class="col-md-6">{{ $student[0]->StudentAddress }}</td>

                                            </tr>

                                            <tr>
                                                <td class="fw-bold">Phone No</td>
                                                <td>{{ $student[0]->StudentPhone }}</td>
                                            </tr>



                                            <tr>
                                                <td class="fw-bold">Student Email</td>
                                                <td>{{ $student[0]->StudentEmail }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold">Guardian Name</td>
                                                <td>{{ $student[0]->StudentGuardianName }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold">Guardian Phone</td>
                                                <td>{{ $student[0]->StudentGuardianPhone }}</td>
                                            </tr>


                                        </table>

                                    </div>
                                </div>


                                <div class="card">
                                    <div class="card-header bg-transparent border-bottom h5">
                                        It Course
                                    </div>
                                    <div class="card-body">

                                        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-striped table-sm table-responsive">
                                          




                                            <tr>
                                                <td class="fw-bold col-md-5">Course Name</td>
                                                <td class="col-md-6">{{ $student[0]->CourseName }}</td>

                                            </tr>
                                            <tr>
                                                <td class="fw-bold">Course Duration</td>
                                                <td class="col-md-6">{{ $student[0]->CourseDuration  }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold">Course Fee</td>
                                                <td>{{ $student[0]->CourseFee }}</td>
                                            </tr>



                                          



                                        </table>



                                    </div>
                                </div>




                       

                                


                               

                                

                                <!-- end card -->




                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->
                    </form>
                    <!-- end card -->
                </div>

            

            </div>
        </div>
    </div>



    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <script>
                        document.write(new Date().getFullYear())
                    </script> © ShahCorporation.
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-end d-none d-sm-block">
                        Design & Develop by Teqholic
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>





@endsection