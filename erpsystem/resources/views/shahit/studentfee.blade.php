@extends('HR.hr-layout.main')

@section('title', 'Add Course Fee')


@section('content')

    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Salary</h4>

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
                        @if (session('error'))
                            <div class="alert alert-{{ Session::get('class') }} p-3 ">

                                {{ Session::get('error') }}
                            </div>
                        @endif

                
                        @include('shahit.layout.studentnav')
                        <div class="card">
                            <div class="card-body">
                                <div>
                                    <div class="row mb-3">
                                        <div class="col-xl-3 col-sm-6">
                                            <div class="mt-2">
                                                <h5>Course Fee</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                </div>



                                @if (count($coursefee) > 0)
                                    <div>
                                        <table
                                            class="table dt-responsive table-sm table-striped align-middle table-nowrap mb-0">
                                            <thead>
                                                <tr>
                                                    <th scope="col">
                                                        #
                                                    </th>
                                                    <th scope="col">Course Name</th>
                                                    <th scope="col">Paid Amount</th>
                                                    <th scope="col">Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1;
                                                $totalfee=0;
                                                ?>
                                                <?php foreach ($coursefee
                                                as $fee => $value) :  
                                            
                                                // $salary = number_format($totalsalary);
                                                ?>
                                                <tr>
                                                    <td>{{ $i }}.</td>
                                                    <td>{{ $student[0]->CourseName }}</td>

                                                    <?php  $totalfee=$totalfee+$value->CourseFeePaid;  ?>
                                                    <td>{{  $value->CourseFeePaid }}</td>
                                                  

                                                    <?php
                                                    
                                                    $e_date_modified = $value->CourseFeeDate;
                                                    $e_date_modified1 = date('d/m/Y', strtotime($e_date_modified));
                                                    
                                                    ?>
                                                    <td>{{  $e_date_modified1 }}</td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <a class="font-size-16 text-muted dropdown-toggle" role="button"
                                                                data-bs-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">
                                                                <i class="mdi mdi-dots-horizontal"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-end"
                                                                style="margin: 0px;">
                                                                <a href="{{ url('/editcoursefee') }}/{{ $value->CourseFeeID }}"
                                                                    class="dropdown-item" style="cursor: pointer;"><i
                                                                        class="fa fa-pen text-secondary"></i>&nbsp; Edit</a>
                                                                <a class="dropdown-item" style="cursor: pointer;"
                                                                    onclick="delete_confirm('{{ $value->CourseFeeID }}')"><i
                                                                        class="fa fa-trash text-secondary"></i>&nbsp;
                                                                    Delete</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php $i++; ?>
                                                <?php endforeach ?>

                                                <td></td>

                                                <td><b>Remaining Fee</b></td>
                                                
                                                <td><b> {{  $student[0]->CourseFee-$totalfee }}</b></td>
                                                <td></td>
                                                <td></td>

                                            </tbody>
                                        </table>
                                    </div>
                                @endif


                                @if (count($coursefee) == 0)
                                    <p class="text-danger">No fee submitted</p>
                                @endif
                            </div>
                        </div>
                        <!-- end card -->

                        <div class="card">
                            <div class="card-header bg-transparent   mt-2">
                                <h5>Add Student Course Fee</h5>
                            </div>
                            <div class="card-body">

                                <form action="{{ Route('addcoursefee') }}" method="post"> {{ csrf_field() }}
                                    <input type="hidden" class="form-control"
                                    value="{{ $student[0]->StudentID }}" name="StudentID">
                                    <input type="hidden" class="form-control"
                                    value="{{ $student[0]->CourseID }}" name="CourseID">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="basicpill-firstname-input">Paid Amount*</label>
                                                <input type="text" class="form-control" name="CourseFeePaid" required>
                                            </div>
                                        </div>




                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="basicpill-firstname-input">Date<span
                                                        class="text-danger">*</span></label>

                                                        <input type="date" class="form-control" name="CourseFeeDate" required>

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


    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Confirmation</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p class="text-center">Are you sure to delete this information ?</p>
                        <p class="text-center">



                            <a href="#" class="btn btn-danger " id="delete_link">Delete</a>
                            <button type="button" class="btn btn-info" data-bs-dismiss="modal">Cancel</button>

                        </p>
                    </div>

                </div>
            </div>
</div>

<script>

    function delete_confirm(id) {


        // alert('hello');
        url = '{{ URL::TO('/') }}/'+'deletecoursefee'+'/' +id;



        jQuery('#staticBackdrop').modal('show', {
            backdrop: 'static'
        });
        document.getElementById('delete_link').setAttribute('href', url);

    }


 

</script>
@endsection
