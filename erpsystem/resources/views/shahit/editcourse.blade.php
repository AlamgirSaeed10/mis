@extends('HR.hr-layout.main')

@section('title', 'Edit Course Fee')


@section('content')

    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Course Fee</h4>

                            <div class="page-title-right">
                                <div class="page-title-right">
                                    <!-- button will appear here -->

                                    <a href="{{ URL('/Employee') }}"
                                        class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i
                                            class="mdi mdi-arrow-left  me-1 pt-5"></i> Go Back</a>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-xl-9">
                        

                
                    
                        <!-- end card -->

                        <div class="card">
                            <div class="card-header bg-transparent   mt-2">
                                <h5>Edit Student Course Fee</h5>
                            </div>
                            <div class="card-body">

                                <form action="" method="post"> {{ csrf_field() }}
            
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="basicpill-firstname-input">Course Name</label>
                                                <input type="text" class="form-control" value="{{ $course[0]->CourseName }}" name="CourseName" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="basicpill-firstname-input">Course Duration<span class="text-danger">*</span></label>
                                                <select name="CourseDuration" class="form-select">
                                                    <option value="">Select</option>                                     
                                                    <option value="3 Months" style="">3 Months</option>
                                                    <option value="6 Months" style="">6 Months</option>
                                                   
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="basicpill-firstname-input">Course Fee</label>
                                                <input type="text" class="form-control" value="{{ $course[0]->CourseFee }}" name="CourseFee"  required>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-md-4">
                                            <button type="submit" class="btn  btn-rounded btn-success w-md float-right">Save</button>
                                        </div>
            
            
            
                                    </div>
            
            
                                </form>
            
            
                            </div>
                        </div>

                    </div>
                    <!-- end col -->





                </div>


            </div> <!-- container-fluid -->
        </div>
    </div> <!-- end col -->


    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <script>
                        document.write(new Date().getFullYear())
                    </script> © Shah Corporation.
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-end d-none d-sm-block">
                        Design & Develop by TeqHolic
                    </div>
                </div>
            </div>
        </div>
    </footer>
@endsection
