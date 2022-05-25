
@extends('HR.hr-layout.main')
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

                                <a href="{{ URL('/Employee') }}"
                                    class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i
                                        class="mdi mdi-arrow-left  me-1 pt-5"></i> Go Back</a>

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

                    <div class="card">
                        <div class="card-header bg-transparent   mt-2">
                            <h5>Edit Salary</h5>
                        </div>
                        <div class="card-body">

                            <form action="{{ route('update_salary_employee') }}" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="EmployeeSalaryID" value="{{ $salary_emplo[0]->EmployeeSalaryID }}">
                                <input type="hidden" name="EmployeeID" value="{{ $salary_emplo[0]->EmployeeID }}">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input">Salary*</label>
                                            <input type="text" class="form-control" name="Salary" value="{{ $salary_emplo[0]->Basic }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input">Allowance<span class="text-danger">*</span></label>
                                            <select name="allowance" value="{{ $salary_emplo[0]->Allowncetitle }}"  class="form-select">
                                            
                                                <option value="$salary_emplo[0]->Allowncetitle" selected> {{ $salary_emplo[0]->Allowncetitle }}</option>
                                                @foreach ($allownces as $value)
                                                <option value="{{ $value->AllowanceTitle }}" style="@foreach ( $employeesalary as $key )   @if ($key->Allowncetitle == $value->AllowanceTitle) display:none   @endif   @endforeach">{{ $value->AllowanceTitle }}</option>
                                                @endforeach
                                            </select>
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
                </script> © Skote.
            </div>
            <div class="col-sm-6">
                <div class="text-sm-end d-none d-sm-block">
                    Design & Develop by Themesbrand
                </div>
            </div>
        </div>
    </div>
</footer>
@endsection