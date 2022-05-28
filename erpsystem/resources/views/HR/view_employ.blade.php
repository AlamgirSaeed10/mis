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

                                <a href="{{ URL('/employee') }}" class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i class="mdi mdi-arrow-left  me-1 pt-5"></i> Go Back</a>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-xl-9 col-lg-9 col-md-9 ">
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

                    @include('HR.hr-layout.nav')

                    <form action="{{ URL('/EmployeeUpdate') }}" method="post" enctype="multipart/form-data">
                        <div class="row">

                            {{ csrf_field() }}
                            <input type="hidden" name="EmployeeID" value="{{ Session::get('EmployeeID') }}" readonly="">


                            <div>







                                <div class="card">
                                    <div class="card-header bg-transparent border-bottom h5">
                                        Personal Information
                                    </div>
                                    <div class="card-body">
                                        <!-- start of personal detail row -->
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-striped table-sm table-responsive">



                                            <tr>
                                                <td class="fw-bold">Title</td>
                                                <td>{{ $employee[0]->Title }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold">First Name</td>
                                                <td>{{ $employee[0]->FirstName }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold">Middle Name</td>
                                                <td>{{ $employee[0]->MiddleName }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold">Last Name</td>
                                                <td>{{ $employee[0]->LastName }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold">CNIC</td>
                                                <td>{{ $employee[0]->CNIC }}</td>
                                            </tr>

                                            <?php


                                            $dob=  $employee[0]->DateOfBirth;
                                           $dateofbirth= ( $dob==null) ? null :  date("d/m/Y", strtotime($dob) );
                                          
                                          
                                            ?>
                                            <tr>
                                                <td class="fw-bold">Date of Birth</td>
                                                <td>{{  $dateofbirth }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold">Is Supervisor</td>
                                                <td>{{  $employee[0]->IsSupervisor }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold">Gender</td>
                                                <td>{{ $employee[0]->Gender }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold">Email</td>
                                                <td>{{ $employee[0]->Email }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold">Password</td>
                                                <td class="text-success">{{ $employee[0]->Password }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold">Nationality</td>
                                                <td>{{ $employee[0]->Nationality }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold">Mobile No</td>
                                                <td>{{ $employee[0]->MobileNo }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold">Home Phone</td>
                                                <td>{{ $employee[0]->HomePhone }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold">Full Address</td>
                                                <td>{{ $employee[0]->FullAddress }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold">Education Level</td>
                                                <td>{{ $employee[0]->EducationLevel }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold">Last Degree</td>
                                                <td>{{ $employee[0]->LastDegree }}</td>
                                            </tr>

                                        </table>

                                        <div class="row">








                                        </div>
                                        <!-- end of personal detail row -->
                                    </div>
                                </div>


                                <div class="card">
                                    <div class="card-header bg-transparent border-bottom h5">
                                        Marital Detail
                                    </div>
                                    <div class="card-body">

                                        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-striped table-sm table-responsive">
                                            <tr>
                                                <td class="fw-bold col-md-5">Marital Status</td>
                                                <td class="col-md-6">{{ $employee[0]->MaritalStatus }}</td>

                                            </tr>

                                            <tr>
                                                <td class="fw-bold">Spouse Name</td>
                                                <td>{{ $employee[0]->SpouseName }}</td>
                                            </tr>



                                            <tr>
                                                <td class="fw-bold">Spouse Employer</td>
                                                <td>{{ $employee[0]->SpouseEmployer }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold">Spouse Work Phone</td>
                                                <td>{{ $employee[0]->SpouseWorkPhone }}</td>
                                            </tr>


                                        </table>

                                    </div>
                                </div>


                                <div class="card">
                                    <div class="card-header bg-transparent border-bottom h5">
                                        Visa / Passport Section
                                    </div>
                                    <div class="card-body">

                                        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-striped table-sm table-responsive">
                                            <?php

                                            $VisaIssueDate =  $employee[0]->VisaIssueDate;
                                            $VisaExpiryDate =  $employee[0]->VisaExpiryDate;
                                            $PassportExpiry =  $employee[0]->PassportNo;
                                            $VisaIssueDate1=  ($VisaIssueDate==null) ? null :  date("d/m/Y", strtotime($VisaIssueDate) );
                                            // $VisaIssueDate1 = date("d/m/Y", strtotime($VisaIssueDate));
                                            $VisaExpiryDate1 = ($VisaExpiryDate==null) ? null :  date("d/m/Y", strtotime($VisaExpiryDate) );
                                            $PassportExpiry1 = ( $PassportExpiry==null) ? null :  date("d/m/Y", strtotime( $PassportExpiry) );
                                            
                                            ?>




                                            <tr>
                                                <td class="fw-bold col-md-5">Visa Issue Date</td>
                                                <td class="col-md-6"><?php echo  $VisaIssueDate1; ?></td>

                                            </tr>
                                            <tr>
                                                <td class="fw-bold">Visa Expiry Date</td>
                                                <td class="col-md-6"><?php echo  $VisaExpiryDate1; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold">Passport No</td>
                                                <td>{{ $employee[0]->PassportNo }}</td>
                                            </tr>



                                            <tr>
                                                <td class="fw-bold">Passport Expiry</td>
                                                <td class="col-md-6"><?php echo  $PassportExpiry1; ?></td>
                                            </tr>



                                        </table>



                                    </div>
                                </div>




                                <div class="card">
                                    <div class="card-header bg-transparent border-bottom h5">
                                        Next of Kin
                                    </div>
                                    <div class="card-body">

                                        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-striped table-sm table-responsive">
                                            <tr>
                                                <td class="fw-bold col-md-5">Next of Kin Name</td>
                                                <td class="col-md-6">{{ $employee[0]->NextofKinName }}</td>

                                            </tr>
                                            <tr>
                                                <td class="fw-bold">Next of Kin Address</td>
                                                <td>{{ $employee[0]->NextofKinAddress }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold">Next of Kin Phone</td>
                                                <td>{{ $employee[0]->NextofKinPhone }}</td>
                                            </tr>



                                            <tr>
                                                <td class="fw-bold">Next of Kin Relationship</td>
                                                <td>{{ $employee[0]->NextofKinRelationship }}</td>
                                            </tr>



                                        </table>





                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header bg-transparent border-bottom h5">
                                      Bank Details
                                    </div>
                                    <div class="card-body">

                                        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-striped table-sm table-responsive">
                                            <tr>
                                                <td class="fw-bold col-md-5">Bank Name</td>
                                                <td class="col-md-6">{{ $employee[0]->BankName }}</td>

                                            </tr>
                                            <tr>
                                                <td class="fw-bold">Bank Branch</td>
                                                <td>{{ $employee[0]->BankBranch}}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold">AccountNo/IBan</td>
                                                <td>{{ $employee[0]->AccountNo }}</td>
                                            </tr>



                                         


                                        </table>





                                    </div>
                                </div>



                                <div class="card">
                                    <div class="card-header bg-transparent border-bottom h5  ">
                                        Offical Details
                                    </div>
                                    <div class="card-body">

                                        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-striped table-sm table-responsive">
                                            <tr>
                                                <td class="fw-bold col-md-5">JobTitle</td>
                                                <td class="col-md-6">{{ $employee[0]->JobTitleName }}</td>

                                            </tr>
                                            <tr>
                                                <td class="fw-bold">Department</td>
                                                <td>{{ $employee[0]->DepartmentName }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold">Supervisor</td>
                                                <td>{{ $employee[0]->SupervisorID }}</td>
                                            </tr>



                                            <tr>
                                                <td class="fw-bold">Work Location</td>
                                                <td>{{ $employee[0]->WorkLocation }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold">EmailOffical</td>
                                                <td>{{ $employee[0]->EmailOffical }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold">Work Phone</td>
                                                <td>{{ $employee[0]->WorkPhone }}</td>
                                            </tr>
                                            <tr>
                                               <?php
                                               $start=  $employee[0]->eDate;
                                               $startDate=  ($start==null) ? null :  date("d/m/Y", strtotime($start) );

                                             
                                               ?>
                                                <td class="fw-bold">Start Date</td>
                                                <td>{{  $startDate }}</td>
                                            </tr>






                                        </table>


                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header bg-transparent border-bottom h5">
                                      Leaving Details
                                    </div>
                                    <div class="card-body">

                                        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-striped table-sm table-responsive">
                                            <tr>
                                            <?php
                                               $leaving=  $employee[0]->JobLeavingDate;
                                               $leavingDate=  ($leaving==null) ? null :  date("d/m/Y", strtotime($leaving) );
                                               ?>
                                                <td class="fw-bold col-md-5">Leaving Date</td>
                                                <td class="col-md-6">{{  $leavingDate }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold">Leaving Detail</td>
                                                <td>{{ $employee[0]->JobLeavingReson}}</td>
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
                @include('template.hr-rightsidebar')
            </div>
        </div>
    </div>
   



@endsection