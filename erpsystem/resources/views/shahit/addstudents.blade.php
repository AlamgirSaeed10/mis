@extends('HR.hr-layout.main')

@section('title', 'Add Student')


@section('content')

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">

                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Student Section</h4>

                        <div class="page-title-right">
                            <div class="page-title-right">
                                <!-- button will appear here <-->
                                <a href="{{ url('/students')}}"
                                    class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2 w-md"><i
                                        class="mdi mdi-arrow-left pr-3"></i> Go Back</a>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->








            <form action="{{ route('addstudent') }}" method="post" enctype="multipart/form-data">
                <div class="row">

                    @csrf


                    <div class="duplicate">
                        <div class="card">
                            <div class="card-header bg-transparent border-bottom h5">
                                Student Personal Information
                            </div>
                            <div class="card-body">
                                <!-- start of personal detail row -->
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="control-label" for="Gender">Gender<span
                                                    class="text-danger">*</span>
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline pt-1">
                                            <input class="form-check-input" type="radio" name="StudentGender"
                                                id="inlineRadio1" value="Male" required>
                                            <label class="form-check-label" for="inlineRadio1">Male</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"  name="StudentGender"
                                                id="inlineRadio2" value="Female" required>
                                            <label class="form-check-label" for="inlineRadio2">Female</label>
                                        </div>
                                    </div>
                                   <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input">Full Name</label>
                                            <input type="text" class="form-control" name="StudentFullName" required>
                                        </div>


                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input">Father Name</label>
                                            <input type="text" class="form-control" name="StudentFatherName" required>
                                        </div>


                                    </div>

                                  
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input">Date of Birth <span
                                                    class="text-danger">*</span></label>


                                            <input type="date" name="StudentDob" 
                                                class="form-control input-mask" 
                                                im-insert="false" required>



                                        </div>

                                    </div>


                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input">Martial Status<span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="StudentMartialStatus"
                                                value="{{ old('Email') }} " required>
                                        </div>


                                    </div>
                                
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input"
                                            class="pr-5 mt-1">Upload Student Picture</label><br><input
                                            type="file" name="StudentPicture"  required>
                                        </div>
                                    </div>

                                   

                              
                                  
                                </div>
                                <!-- end of personal detail row -->
                            </div>
                        </div>


                        <div class="card">
                            <div class="card-header bg-transparent border-bottom h5">
                              Student  Contact Detail
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input">Student Address</label>
                                            <input type="text" class="form-control" name="StudentAddress">
                                        </div>
                                    </div>

                                    



                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input">Email</label>
                                            <input type="text" class="form-control" name="StudentEmail">
                                        </div>


                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input">Student Phone</label>
                                            <input type="text" class="form-control" name="StudentPhone">
                                        </div>


                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input">Parent/Guardian Name</label>
                                            <input type="text" class="form-control" name="GuardianName">
                                        </div>


                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input">Guardian Phone</label>
                                            <input type="text" class="form-control" name="GuardianPhone">
                                        </div>


                                    </div>
                                   
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header bg-transparent border-bottom h5">
                             It Courses
                            </div>
                            <div class="card-body">
                                <div class="row ">
                                    <div class="col-md-8">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input">It Courses</label>
                                            <select name="StudentCourse" id="studentcourse" class="form-control select selectcourse" required>
                                            <option data-select2-id="1">Select</option>
                                            @foreach ($courses as $course)
                                        <option  value="{{ $course->CourseID }}.{{ $course->CourseFee }}" data-select2-id="{{ $course->CourseID }}">{{ $course->CourseName }} ({{ $course->CourseDuration }})</option>

                                            @endforeach
                                        </select>                                        </div>
                                    </div>
                                     <div class="col-md-4">

                                            <div class="mb-3">
                                                <input type="hidden" class="form-control" id="CourseID" name="CourseID">

                                            </div>
                                        </div>
                                </div>
                               
                                
                            </div>
                        </div>


                        <div class="card">
                            <div class="card-header bg-transparent border-bottom h5">
                              Academic Qualification
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input">Student Qualification</label>
                                            <input type="text" class="form-control" name="StudentQualification">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input">Institute Name</label>
                                            <input type="text" class="form-control" name="Institute">
                                        </div>


                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input">From</label>
                                            <input type="date" class="form-control" name="QualificationFrom">
                                        </div>


                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input">To</label>
                                            <input type="date" class="form-control" name="QualificationTo">
                                        </div>


                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input">Result</label>
                                            <input type="text" class="form-control" name="Result">
                                        </div>


                                    </div>
                                   
                                </div>
                            
                                
                            </div>
                        </div>
                
                        <div class="card">
                            <div class="card-header bg-transparent border-bottom h5">
                             Course Fee
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input">Total Fee</label>
                                            <input type="text" class="form-control" id="CourseFee" name="CourseFee">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input">Advance Fee Paid</label>
                                            <input type="text" class="form-control advancefee " id="CourseFeeAdvance" name="CourseFeePaid">
                                        </div>


                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input">Remaining Fee</label>
                                            <input type="text" class="form-control" id="CourseFeeRemaining" name="CourseFeeRemaining">
                                        </div> 


                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input">Date</label>
                                            <input type="date" class="form-control" name="CourseFeeDate">
                                        </div>


                                    </div>

                                    
                                   
                                </div>
                            
                                <div>
                                    <button type="submit" class="btn btn-success w-lg float-right">Save /
                                    Update</button>
                                <a href="#" onclick="history.back()"
                                    class="btn btn-secondary w-md float-right">Cancel</a>
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
    var i=2;
    var fee;

     $(".selectcourse").on('change',function()
     {  
        var val = $(this).val();
          const values = val.split(".");
          var id=values[0];
          var fee=values[1];
        $("#CourseID").val(id);
        $("#CourseFee").val(fee);
     });

     $(".advancefee").on('keyup',function(){
        var totalfee = $("#CourseFee").val();
        var advancefee = $("#CourseFeeAdvance").val();

        var remainingfee=totalfee-advancefee;

        $("#CourseFeeRemaining").val(remainingfee);


        


    });

</script>
@endsection