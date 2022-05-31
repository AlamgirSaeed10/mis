@extends('template.main_tmp')

@section('title', 'Update Employee')


@section('content')

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">

                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Employee Section</h4>

                        <div class="page-title-right">
                            <div class="page-title-right">
                                <!-- button will appear here <-->
                                <a href="{{ URL('/employee') }}"
                                    class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2 w-md"><i
                                        class="mdi mdi-arrow-left pr-3"></i> Go Back</a>
                                </-->
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->





          


            <form action="{{ route('updateemployee') }}" method="post" enctype="multipart/form-data">
                <div class="row">
                    
                    @csrf


                    <div>
                        <div class="card">
                            <div class="card-header bg-transparent border-bottom h5">
                              Update  Personal Information
                            </div>
                            <div class="card-body">
                                <!-- start of personal detail row -->
                                <div class="row">
                                    {{-- <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input">Branch <span
                                                    class="text-danger">*</span></label>
                                            <select name="BranchID" id="BranchID" class="form-select">
                                                <option value="">---Select---</option>
                                                <option value="1">Jhelum</option>
                                                <option value="2">Islamabad</option>
                                            
                                            </select>
                                        </div>
                                    </div> --}}

                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="control-label" for="IsSupervisor">Is Supervisor? <span
                                                    class="text-danger">*</span>
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline pt-1">
                                            <input class="form-check-input" type="radio" name="IsSupervisor"
                                                id="inlineRadio1" value="Yes" required=""
                                                {{  $employee[0]->IsSupervisor  == 'Yes' ? 'Checked' : '' }}
                                                >
                                            <label class="form-check-label" for="inlineRadio1">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" required="" name="IsSupervisor"
                                                id="inlineRadio2" value="No"  {{  $employee[0]->IsSupervisor  == 'No' ? 'Checked' : '' }} >
                                            <label class="form-check-label" for="inlineRadio2">No</label>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input">Title </label>
                                            <select name="Title" id="Title" class="form-select">
                                                <option>--Select---</option>
                                               
                                                @foreach ($title as $value)
                                                <option value="{{  $value->Title }}"  {{  $employee[0]->Title  == $value->Title ? 'Selected' : '' }}>{{ $value->Title }}</option>
                                            @endforeach

                                            </select>
                                        </div>
                                    </div>



                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input">Staff Type <span
                                                    class="text-danger">*</span></label>
                                            <select name="StaffType" id="StaffType" class="form-select">
                                                <option>---Select----</option>
                                                @foreach ($stafftype as $value)
                                                <option value="{{ $value->StaffType }}"{{ $employee[0]->StaffType == $value->StaffType ? 'selected=selected' : '' }}>
                                                    {{ $value->StaffType }}</option>
                                            @endforeach


                                            </select>
                                        </div>
                                       
                                    </div>

                              
     
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input">First Name</label>
                                            <input type="text" class="form-control" name="FirstName"
                                                value="{{ $employee[0]->FirstName }}">
                                        </div>


                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input">Middle Name</label>
                                            <input type="text" class="form-control" name="MiddleName"
                                                value="{{$employee[0]->MiddleName  }} ">
                                        </div>


                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input">Last Name</label>
                                            <input type="text" class="form-control" name="LastName"
                                            value="{{ $employee[0]->LastName }} ">
                                        </div>

                                    </div>
                                     <div class="col-md-4">
                                    <label for="input-mask">CNIC</label>
                                    <input type="text"  class="form-control" 
                                  name="CNIC" value="{{ $employee[0]->CNIC }}" required>
                                    <span class="text-muted">e.g 12345-6789456-1</span>
                                </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input">Date of Birth <span
                                                    class="text-danger">*</span></label>


                                            <input type="date" name="DateOfBirth" id="input-date1" class="form-control input-mask"
                                                data-inputmask="'alias': 'datetime'"
                                                data-inputmask-inputformat="dd/mm/yyyy"
                                                value="{{$employee[0]->DateOfBirth}}" im-insert="false">
                                            <span class="text-muted">e.g "dd/mm/yyyy"</span>



                                        </div>

                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input">Gender</label>
                                            <select name="Gender" id="Gender" class="form-select">
                                                <option value="Male" {{ $employee[0]->Gender == 'Male'  ? 'selected=selected' : ''}}>Male</option>
                                                <option value="Female"  {{ $employee[0]->Gender == 'Female'  ? 'selected=selected' : ''}}>Female</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input">Email <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="Email"
                                            value="{{$employee[0]->Email}}">
                                        </div>


                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input">Nationality</label>
                                            <input type="text" class="form-control" name="Nationality"
                                            value="{{$employee[0]->Nationality}}">
                                        </div>


                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input">Mobile No</label>
                                            <input type="text" class="form-control" name="MobileNo"
                                            value="{{$employee[0]->MobileNo}}">
                                        </div>


                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input">Home Phone</label>
                                            <input type="text" class="form-control" name="HomePhone"
                                            value="{{$employee[0]->HomePhone}}">
                                        </div>


                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input">Full Address</label>
                                            <input type="text" class="form-control" name="FullAddress"
                                            value="{{$employee[0]->FullAddress}}">
                                        </div>


                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input">Education Level</label>
                                            <select name="EducationLevel" id="EducationLevel" class="form-select">

                                                @foreach ($educationlevel as $value)
                                                    <option value="{{ $value->EducationLevelName }}"
                                                        {{ $employee[0]->EducationLevel == $value->EducationLevelName ? 'selected=selected' : '' }}>
                                                        {{ $value->EducationLevelName }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input">Last Degree</label>
                                            <input type="text" class="form-control" name="LastDegree"
                                            value="{{$employee[0]->LastDegree}}">
                                        </div>


                                    </div>
                                </div>
                                <!-- end of personal detail row -->
                            </div>
                        </div>


                        <div class="card">
                            <div class="card-header bg-transparent border-bottom h5">
                                Marital Detail
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input">Marital Status</label>
                                            <select name="MaritalStatus" id="MaritalStatus" class="form-select">
                                                <option value="Single">Single</option>
                                                <option value="Married">Married</option>
                                            </select>
                                        </div>
                                    </div>

                                    {{-- <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input">SSN or GID</label>
                                            <input type="text" class="form-control" name="SSNorGID"
                                                value="{{ old('SSNorGID') }} ">
                                        </div>


                                    </div> --}}


                                    <div class="clearfix"></div>



                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input">Spouse Name</label>
                                            <input type="text" class="form-control" name="SpouseName"
                                            value="{{$employee[0]->SpouseName}}">
                                        </div>


                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input">Spouse Employer</label>
                                            <input type="text" class="form-control" name="SpouseEmployer"
                                            value="{{$employee[0]->SpouseEmployer}}">
                                        </div>


                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input">Spouse Work Phone</label>
                                            <input type="text" class="form-control" name="SpouseWorkPhone"
                                            value="{{$employee[0]->SpouseWorkPhone}}">
                                        </div>


                                    </div>

                                </div>
                            </div>
                        </div>




                        <div class="card">
                            <div class="card-header bg-transparent border-bottom h5">
                                Visa / Passport Section
                            </div>
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-md-4 ">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input">Visa Issue Date</label>


                                            <input name="VisaIssueDate" id="input-date1"
                                                class="form-control input-mask" data-inputmask="'alias': 'datetime'"
                                                data-inputmask-inputformat="dd/mm/yyyy"
                                                value="{{$employee[0]->VisaIssueDate}}" im-insert="false">
                                            <span class="text-muted">e.g "dd/mm/yyyy"</span>



                                        </div>

                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input">Visa Expiry Date</label>


                                            <input name="VisaExpiryDate" id="input-date1"
                                                class="form-control input-mask" data-inputmask="'alias': 'datetime'"
                                                data-inputmask-inputformat="dd/mm/yyyy"
                                                value="{{$employee[0]->VisaExpiryDate}}" im-insert="false">
                                            <span class="text-muted">e.g "dd/mm/yyyy"</span>



                                        </div>

                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input">Passport No</label>


                                            <input name="PassportNo" id="input-date1" class="form-control"
                                            value="{{$employee[0]->PassportNo}}">




                                        </div>

                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input">Passport Expiry</label>


                                            <input name="PassportExpiry" id="input-date1"
                                                class="form-control input-mask" data-inputmask="'alias': 'datetime'"
                                                data-inputmask-inputformat="dd/mm/yyyy"
                                                value="{{$employee[0]->PassportExpiry}}" im-insert="false">
                                            <span class="text-muted">e.g "dd/mm/yyyy"</span>



                                        </div>

                                    </div>
                                    <div class="clearfix"></div>
                                    {{-- <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input">Eid No</label>


                                            <input name="EidNo" id="input-date1" class="form-control"
                                                value="{{ old('EidNo') }}">



                                        </div>

                                    </div> --}}

                                    {{-- <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input">Eid Expiry</label>


                                            <input name="EidExpiry" id="input-date1" class="form-control input-mask"
                                                data-inputmask="'alias': 'datetime'"
                                                data-inputmask-inputformat="dd/mm/yyyy" value="{{ old('EidExpiry') }}"
                                                im-insert="false">
                                            <span class="text-muted">e.g "dd/mm/yyyy"</span>



                                        </div>

                                    </div> --}}

                                </div>
                            </div>
                        </div>




                        <div class="card">
                            <div class="card-header bg-transparent border-bottom h5">
                                Next of Kin
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input">Next of Kin Name </label>
                                            <input type="text" class="form-control" name="NextofKinName"
                                            value="{{$employee[0]->NextofKinName}}">
                                        </div>


                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input">Next of Kin Address </label>
                                            <input type="text" class="form-control" name="NextofKinAddress"
                                            value="{{$employee[0]->NextofKinAddress}}">
                                        </div>


                                    </div>


                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input">Next of Kin Phone </label>
                                            <input type="text" class="form-control" name="NextofKinPhone"
                                            value="{{$employee[0]->NextofKinPhone}}">
                                        </div>


                                    </div>


                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input">Next of Kin Relationship </label>
                                            <input type="text" class="form-control" name="NextofKinRelationship"
                                            value="{{$employee[0]->NextofKinRelationship}}">
                                        </div>


                                    </div>

                                </div>
                            </div>
                        </div>

                        
                        <div class="card">
                            <div class="card-header bg-transparent border-bottom h5">
                                Bank Details
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input">Bank Name </label>
                                            <input type="text" class="form-control" name="BankName"
                                                value="{{$employee[0]->BankName}} ">
                                        </div>


                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input"> Branch </label>
                                            <input type="text" class="form-control" name="BankBranch"
                                                value="{{$employee[0]->BankBranch}}">
                                        </div>


                                    </div>


                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input">Account/IBAN No </label>
                                            <input type="text" class="form-control" name="AccountNo"
                                                value="{{$employee[0]->AccountNo}} ">
                                        </div>


                                    </div>




                                </div>
                            </div>
                        </div>


                        <div class="card">
                            <div class="card-header bg-transparent border-bottom h5  ">
                                Offical Details
                            </div>
                            <div class="card-body">
                                <div class="row">


                                    <div class="clearfix"></div>


                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input">Job Title </label>
                                            <select name="JobTitleID" id="JobTitleID" class="form-select">
                                                <option>--Select---</option>
                                               
                                                @foreach ($jobtitle as $value)
                                                <option value="{{ $value->JobTitleID }}"
                                                    {{ $employee[0]->JobTitleID == $value->JobTitleID ? 'selected=selected' : '' }}>
                                                    {{ $value->JobTitleName }}</option>
                                            @endforeach
                                             
                                                    <option value="">
                                                       </option>
                                               
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input">Department </label>
                                            <select name="DepartmentID" id="DepartmentID" class="form-select">

                                                @foreach ($department as $value)
                                                    <option value="{{ $value->DepartmentID }}"
                                                        {{ $employee[0]->DepartmentID == $value->DepartmentID ? 'selected=selected' : '' }}>
                                                        {{ $value->DepartmentName }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                        

                                            </select>
                                        </div>
                                    </div>

                                    <div class="clearfix"></div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input">Work Location </label>
                                            <input type="text" class="form-control" name="WorkLocation"
                                            value="{{$employee[0]->WorkLocation}}">
                                        </div>


                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input">Email Offical</label>
                                            <input type="text" class="form-control" name="EmailOffical"
                                            value="{{$employee[0]->EmailOffical}}">
                                        </div>


                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input">Work Phone</label>
                                            <input type="text" class="form-control" name="WorkPhone"
                                            value="{{$employee[0]->WorkPhone}}">
                                        </div>


                                    </div>

                                  
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input">Password</label>
                                            <input type="text" class="form-control" name="Password"   value="{{$employee[0]->Password}}">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <input type="hidden" class="form-control" name="oldpicture"   value="{{$employee[0]->Picture}}">
                                        <div class="mb-3"><label for="basicpill-firstname-input"
                                                class="pr-5">Upload Staff Picture</label><br><input
                                                type="file" name="newpicture" id="UploadPicture"></div>
                                    </div>
                                    
                                    <input type="hidden" class="form-control" name="EmployeeID"   value="{{$employee[0]->EmployeeID}}">
                                   
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header bg-transparent border-bottom h5">
                                Job Leaving Details
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input">Leaving Date</label>
                                            <input type="date" class="form-control" name="JobLeavingDate"
                                               >
                                        </div>


                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input">Job Leaving Reason</label>
                                            <input type="text" class="form-control" name="JobLeavingReason"
                                                value="{{ old('BankBranch') }} ">
                                        </div>


                                    </div>


                              


                                    <div><button type="submit" class="btn btn-success w-lg float-right">Save /
                                        Update</button>
                                    <a href="#" onclick="history.back()"
                                        class="btn btn-secondary w-md float-right">Cancel</a>
                                </div>

                                </div>
                            </div>
                        </div>

                        <!-- end card -->




                    </div>
                    <!-- end col -->


                </div>
                <!-- end row -->

            </form>






        </div> <!-- container-fluid -->
    </div>


    
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <script>document.write(new Date().getFullYear())</script> © ShahCorporation.
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