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

                                <form action="{{ Route('updatecoursefee') }}" method="post"> {{ csrf_field() }}
                                   
                                    <input type="hidden" class="form-control"
                                    value="{{  $coursefee[0]->CourseFeeID }}" name="CourseFeeID">
                                    <input type="hidden" class="form-control"
                                    value="{{  $coursefee[0]->StudentID }}" name="StudentID">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="basicpill-firstname-input">Paid Amount*</label>
                                                <input type="text" class="form-control" value="{{  $coursefee[0]->CourseFeePaid }}" name="CourseFeePaid" required>
                                            </div>
                                        </div>




                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="basicpill-firstname-input">Date<span
                                                        class="text-danger">*</span></label>

                                                        <input type="date" class="form-control" value="{{  $coursefee[0]->CourseFeeDate }}" name="CourseFeeDate">

                                            </div>
                                        </div>

                                      
                                        <div class="clearfix"></div>
                                        <div class="col-md-4">
                                            <button type="submit"
                                                class="btn  btn-rounded btn-success w-md float-right">Save</button>
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
