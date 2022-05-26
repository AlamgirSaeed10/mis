@extends('HR.hr-layout.main')
@section('title', 'Add Employee')
@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div>
                
            @if (session('error'))
         <div class="alert alert-danger p-3" id="alert-danger">
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
            </div>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <form action="{{ route('addemployee') }}" method="post" enctype="multipart/form-data" autocomplete="">
                <div class="row">
                    @csrf
                    <div>
                        <div class="card">
                            <div class="card-header bg-transparent border-bottom h5">
                                Personal Information
                            </div>
                            <div class="card-body">
                                <!-- start of personal detail row -->
                                <div class="row">
                                    
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="control-label" for="IsSupervisor">Is Supervisor? <span
                                            class="text-danger">*</span>
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline pt-1">
                                        <input class="form-check-input" type="radio" name="IsSupervisor"
                                        id="inlineRadio1" value="Yes" required="required">
                                        <label class="form-check-label" for="inlineRadio1">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio"  name="IsSupervisor"
                                        id="inlineRadio2" value="No" required>
                                        <label class="form-check-label" for="inlineRadio2">No</label>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="basicpill-firstname-input">Title </label>
                                        <select name="Title"  class="form-select" required>
                                            <option value="">Select Title</option>
                                            @foreach ($title as $value)
                                            <option value="{{ $value->Title }}">{{ $value->Title }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="basicpill-firstname-input">Staff Type <span
                                        class="text-danger">*</span></label>
                                        <select name="StaffType"  class="form-select" aria-required="true"
                                            required="required">
                                            <option value="">Select Staff Type</option>
                                            @foreach ($stafftype as $value)
                                            <option value="{{ $value->StaffType }}">
                                                {{ $value->StaffType }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="basicpill-firstname-input">First Name</label>
                                        <input type="text" class="form-control" name="FirstName" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="basicpill-firstname-input">Middle Name</label>
                                        <input type="text" class="form-control" name="MiddleName"
                                        value="{{ old('MiddleName') }} ">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="basicpill-firstname-input">Last Name</label>
                                        <input type="text" class="form-control" name="LastName"
                                        value="{{ old('LastName') }} " required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="input-mask">CNIC</label>
                                    <input id="input-mask" class="form-control input-mask" 
                                    data-inputmask="'mask': 'xxxxx-xxxxxxx-x'" im-insert="true" name="CNIC" required>
                                    <span class="text-muted">e.g 12345-6789456-1</span>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="basicpill-firstname-input">Date of Birth <span
                                        class="text-danger">*</span></label>
                                        <input type="date" name="DateOfBirth"
                                        class="form-control" value="{{ old('DateOfBirth') }}"
                                        im-insert="false" required>
                                        <span class="text-muted">e.g "dd/mm/yyyy"</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="basicpill-firstname-input">Gender</label>
                                        <select name="Gender" id="Gender" class="form-select" required>
                                            <option value="">Select Gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="basicpill-firstname-input">Email <span
                                        class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="Email"
                                        value="{{ old('Email') }} " required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="basicpill-firstname-input">Nationality</label>
                                        <select name="Nationality" id="Nationality" class="form-select" required>
                                            <option  value="" selected>Select Nationality</option>
                                            <option value="Pakistani">Pakistani</option>
                                            <option value="UK">UK</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="basicpill-firstname-input">Mobile No</label>
                                        <input type="text" class="form-control" name="MobileNo"
                                        value="{{ old('MobileNo') }} " required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="basicpill-firstname-input">Home Phone</label>
                                        <input type="text" class="form-control" name="HomePhone"
                                        value="{{ old('HomePhone') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="basicpill-firstname-input">Full Address</label>
                                        <input type="text" class="form-control" name="FullAddress"
                                        required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="basicpill-firstname-input">Education Level</label>
                                        <select name="EducationLevel" id="EducationLevel" class="form-select" required>
                                            <option value="">Select Education Level</option>
                                            @foreach ($educationlevel as $value)
                                            <option value="{{ $value->EducationLevelName }}">
                                                {{ $value->EducationLevelName }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="basicpill-firstname-input">Last Degree</label>
                                        <input type="text" class="form-control" name="LastDegree"
                                        value="{{ old('LastDegree') }} ">
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
                                <div class="clearfix"></div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="basicpill-firstname-input">Spouse Name</label>
                                        <input type="text" class="form-control" name="SpouseName"
                                        value="{{ old('SpouseName') }} ">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="basicpill-firstname-input">Spouse Employer</label>
                                        <input type="text" class="form-control" name="SpouseEmployer"
                                        value="{{ old('SpouseEmployer') }} ">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="basicpill-firstname-input">Spouse Work Phone</label>
                                        <input type="text" class="form-control" name="SpouseWorkPhone"
                                        value="{{ old('SpouseWorkPhone') }} ">
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
                                        <input type="date" name="VisaIssueDate"
                                        class="form-control input-mask" value="{{ old('VisaIssueDate') }}"
                                        im-insert="false">
                                        <span class="text-muted">e.g "dd/mm/yyyy"</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="basicpill-firstname-input">Visa Expiry Date</label>
                                        <input type="date" name="VisaExpiryDate"
                                        class="form-control input-mask" value="{{ old('VisaExpiryDate') }}"
                                        im-insert="false">
                                        <span class="text-muted">e.g "dd/mm/yyyy"</span>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="basicpill-firstname-input">Passport No</label>
                                        <input name="PassportNo"  class="form-control"
                                        value="{{ old('PassportNo') }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="basicpill-firstname-input">Passport Expiry</label>
                                        <input type="date" name="PassportExpiry" id=""
                                        class="form-control input-mask" value="{{ old('PassportExpiry') }}"
                                        im-insert="false">
                                        <span class="text-muted">e.g "dd/mm/yyyy"</span>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header bg-transparent border-bottom h5">
                            Emergency Contact Details
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="basicpill-firstname-input">Next of Kin Name </label>
                                        <input type="text" class="form-control" name="NextofKinName"
                                        value="{{ old('NextofKinName') }} " >
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="basicpill-firstname-input">Next of Kin Address </label>
                                        <input type="text" class="form-control" name="NextofKinAddress"
                                        value="{{ old('NextofKinAddress') }} " required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="basicpill-firstname-input">Next of Kin Phone </label>
                                        <input type="text" class="form-control" name="NextofKinPhone"
                                        value="{{ old('NextofKinPhone') }} " required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="basicpill-firstname-input">Next of Kin Relationship </label>
                                        <input type="text" class="form-control" name="NextofKinRelationship"
                                        value="{{ old('NextofKinRelationship') }} " required>
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
                                        value="{{ old('BankName') }} ">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="basicpill-firstname-input"> Branch </label>
                                        <input type="text" class="form-control" name="BankBranch"
                                        value="{{ old('BankBranch') }} ">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="basicpill-firstname-input">Account/IBAN No </label>
                                        <input type="text" class="form-control" name="AccountNo"
                                        value="{{ old('IBanNo') }} ">
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
                                        <select name="JobTitleID"  class="form-select" required="required">
                                            <option value="">Select Jobtitle</option>
                                            @foreach ($jobtitle as $value)
                                            <option value="{{ $value->JobTitleID }}">
                                                {{ $value->JobTitleName }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="basicpill-firstname-input">Department </label>
                                        <select name="DepartmentID"  class="form-select"  required="required">
                                            <option value="">Select Department</option>
                                            @foreach ($department as $value)
                                            <option value="{{ $value->DepartmentID }}">
                                                {{ $value->DepartmentName }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="basicpill-firstname-input">Work Location </label>
                                        <input type="text" class="form-control" name="WorkLocation"
                                        value="{{ old('WorkLocation') }} ">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="basicpill-firstname-input">Offical Email</label>
                                        <input type="text" class="form-control" name="EmailOffical"
                                        value="{{ old('EmailOffical') }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="basicpill-firstname-input">Work Phone</label>
                                        <input type="text" class="form-control" name="WorkPhone"
                                        value="{{ old('WorkPhone') }}">
                                    </div>
                                </div>
                                
                                
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="basicpill-firstname-input">Password </label>
                                        <input type="password" class="form-control" name="Password" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3"><label for="basicpill-firstname-input"
                                    class="pr-5">Upload Staff Picture</label><br><input
                                type="file" name="Uploadpicture"  required></div>
                            </div>
                            
                        </div>
                        
                        <div>
                            <button type="submit" class="btn btn-success w-lg float-right">Save Employee</button>
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
<script>
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