@extends('HR.hr-layout.main')

@section('title', 'Add Courses')


@section('content')

<div class="main-content">

    <div class="page-content">
        
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Shah IT Courses</h4>

                        <div class="page-title-right">
                            <div class="page-title-right">
                                <!-- button will appear here -->

                                <a href="" class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i class="mdi mdi-arrow-left  me-1 pt-5"></i> Go Back</a>

                            </div>
                        </div>

                    </div>
                </div>
            </div>


            <div class="card">
                <div class="row">
                    <div class="col-md-12">
                        @if (session('error'))
                        <div class="alert alert-{{ Session::get('class') }} p-3 ">
    
                            {{ Session::get('error') }}
                        </div>
                        @endif
                    </div>
                </div>
                <div class="card-header bg-transparent   mt-2">
                    <h5>Add Courses</h5>
                </div>
                <div class="card-body">

                    <form action="{{ route('addcourse') }}" method="post"> {{ csrf_field() }}

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="basicpill-firstname-input">Course Name</label>
                                    <input type="text" class="form-control" name="CourseName" required>
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
                                    <input type="text" class="form-control" name="CourseFee"  required>
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

            <div class="card">
                <div class="card-body">
                    <div>
                        <div class="row mb-3">
                            <div class="col-xl-3 col-sm-6">
                                <div class="mt-2">
                                    <h5>Salary</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                    </div>



                    @if (count($courses) > 0)
                    <div>
                        <table class="table dt-responsive table-sm table-striped align-middle table-nowrap mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">
                                        #
                                    </th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Duration</th>
                                    <th scope="col">Fee</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               

                                @foreach ($courses as $course)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $course->CourseName }}</td>
                                    <td>{{ $course->CourseDuration }}</td>
                                    <td>{{ $course->CourseFee }}</td>
                                  
                                 
                                   
                                    <td>
                                        <div class="dropdown">
                                            <a class="font-size-16 text-muted dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="mdi mdi-dots-horizontal"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end" style="margin: 0px;">
                                                <a href="{{ url('/editcourse') }}/{{ $course->CourseID }}" class="dropdown-item" style="cursor: pointer;"><i class="fa fa-pen text-secondary"></i>&nbsp; Edit</a>
                                                <a class="dropdown-item" style="cursor: pointer;" onclick="delete_confirm2('delete_salary',1)"><i class="fa fa-trash text-secondary"></i>&nbsp; Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                    
                                   
                                 

                                
                              
                               

                            </tbody>
                        </table>
                    </div>
                    @endif


                    @if (count($courses) == 0)
                    <p class="text-danger">No Courses</p>
                    @endif
                </div>
            </div>
        </div>

    </div>

</div>

@endsection