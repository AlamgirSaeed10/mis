@extends('template.main_tmp')
@section('title', 'Employee Salary')
@section('content')


<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Salary</h4>

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
                    @include('HR.hr-layout.nav')
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



                            @if (count($employeesalary) > 0)
                            <div>
                                <table class="table dt-responsive table-sm table-striped align-middle table-nowrap mb-0">
                                    <thead>
                                        <tr>
                                            <th scope="col">
                                                #
                                            </th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Amount</th>
                                            <th scope="col">Category</th>
                                            <th scope="col">Date modified</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; $totalsalary= 0;?>
                                        <?php foreach ($employeesalary
                                            as $key => $value) :  

                                            if($value->AllowanceCategory == 'Dr')
                                            {
                                                $totalsalary=$totalsalary+$value->Basic;
                                            }
                                            else
                                            {
                                                $totalsalary=$totalsalary-$value->Basic;
                                            }
                                           
                                            $salary = number_format($totalsalary);
                                            ?>
                                            <tr>
                                                <td>{{$i}}.</td>
                                                <td>{{$value->Allowncetitle}}</td>
                                                <td id="amount">{{$value->Basic}}</td>
                                                <td id="amount">{{$value->AllowanceCategory}}</td>
                                              
                                                <?php

                                                $e_date_modified = $value->eDate;
                                                $e_date_modified1 = date("d/m/Y", strtotime($e_date_modified));
                                                
                                                ?>
                                                <td><?php echo $e_date_modified1;?></td>
                                                <td>
                                                    <div class="dropdown">
                                                        <a class="font-size-16 text-muted dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="mdi mdi-dots-horizontal"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-end" style="margin: 0px;">
                                                            <a href="{{ url ('/editemployesalary')}}/{{$value->EmployeeSalaryID}}" class="dropdown-item" style="cursor: pointer;"><i class="fa fa-pen text-secondary"></i>&nbsp; Edit</a>
                                                            <a class="dropdown-item" style="cursor: pointer;" onclick="delete_confirm2('delete_salary','{{ $value->EmployeeSalaryID  }}')"><i class="fa fa-trash text-secondary"></i>&nbsp; Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php $i++; ?>
                                        <?php endforeach ?>

                                        <td></td>
                                        <td><b>Total</b></td>
                                        <td><b >{{ $salary }}</b></td>
                                        <td></td>
                                        <td></td>

                                    </tbody>
                                </table>
                            </div>
                            @endif


                            @if (count($employeesalary) == 0)
                            <p class="text-danger">No Salary</p>
                            @endif
                        </div>
                    </div>
                    <!-- end card -->


                    <div class="card">
                        <div class="card-header bg-transparent   mt-2">
                            <h5>Add Salary</h5>
                        </div>
                        <div class="card-body">

                            <form action="{{ Route('addemployeesalary') }}" method="post"> {{ csrf_field() }}

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input">Salary*</label>
                                            <input type="text" class="form-control" name="Salary" required>
                                        </div>
                                    </div>




                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input">Allowance<span class="text-danger">*</span></label>
                                            <select name="allowance" class="form-select" required>
                                                <option value="">Select</option>
                                                @foreach ($allownces as $value)
                                                <option value="{{ $value->AllowanceTitle }}" style="@foreach ( $employeesalary as $key )   @if ($key->Allowncetitle == $value->AllowanceTitle) display:none   @endif   @endforeach">{{ $value->AllowanceTitle }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <input type="hidden" class="form-control" value="{{ $employee[0]->EmployeeID }}" name="EmployeeID">
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

                @include('template.hr-rightsidebar')



            </div>
            <!-- end row -->







        </div> <!-- container-fluid -->
    </div>
</div> <!-- end col -->

<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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



<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <script>
                    document.write(new Date().getFullYear())
                </script> © ShahCrm.
            </div>
            <div class="col-sm-6">
                <div class="text-sm-end d-none d-sm-block">
                    Design & Develop by Teqholic
                </div>
            </div>
        </div>
    </div>
</footer>
<script type="text/javascript">
    function delete_confirm2(url, EmployeeSalaryID) {
        console.log(EmployeeSalaryID);
        url = '{{URL::TO('/')}}' + /delete_salary/ + EmployeeSalaryID;
        jQuery('#staticBackdrop').modal('show', {
            backdrop: 'static'
        });
        document.getElementById('delete_link').setAttribute('href', url);
    }


  
</script>
@endsection