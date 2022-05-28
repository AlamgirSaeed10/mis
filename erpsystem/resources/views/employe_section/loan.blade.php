

@extends('template.staff_tmp')

@section('title', 'Loan')


@section('content')
<<div class="main-content">
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

                                <a href="{{ URL('/employeeprofile') }}"
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

                    @include('template.employeenav')


                    <div class="card">
                        <div class="card-header bg-transparent border-bottom h5  ">
                            Loan / Installments
                        </div>
                        <div class="card-body">

                            @if (count($loan) > 0)
                                <table class="table dt-responsive table-sm table-striped nowrap w-100">
                                    <tbody>
                                        <tr>
                                            <th scope="col">S.No</th>
                                            <th scope="col">Loan</th>
                                            <th scope="col">Remarks</th>
                                        
                                        </tr>
                                    </tbody>
                                    <tbody>
                                        @foreach ($loan as $key => $value)
                                            <tr class="bg-light">
                                                <td class="col-md-1">{{ $key + 1 }}</td>
                                                <td class="col-md-1">{{ $value->Amount }}</td>
                                                <td class="col-md-1">{{ $value->Remarks }}</td>
                                            


                                            </tr>
                                            <tr>
                                                <td colspan="3"> <?php

                                        $loan_deduction = DB::table('loan_deduction')
                                            ->where('LoanID', $value->LoanID)
                                            ->get();

                                                            ?>


                                                    @if (count($loan_deduction) > 0)
                                                        <table class="table table-sm align-middle table-nowrap mb-0">
                                                            <tbody>
                                                                <tr>
                                                                    <th scope="col">S.No</th>
                                                                    <th scope="col">Amount</th>
                                                                    <th scope="col">Date</th>
                                                                    
                                                                </tr>
                                                            </tbody>
                                                            <tbody>
                                                                @foreach ($loan_deduction as $key => $value)
                                                                    <tr>
                                                                        <td class="col-md-1">{{ $key + 1 }}
                                                                        </td>
                                                                        <td class="col-md-1">{{ $value->Amount }}
                                                                        </td>
                                                                        <td class="col-md-1">
                                                                        <?php
                                               $e_date_formaated =  $value->LoanDeductionDate;
                                               $e_date_formaated1=date("d-M-Y",strtotime($e_date_formaated));
                                               ?>
                                                                            {{ $e_date_formaated1 }}</td>
                                                                      
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    @else
                                                        <p class=" text-danger">No Installments data found</p>
                                                    @endif
                                                </td>




                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <p class=" text-danger">No data found</p>
                            @endif


                        </div>
                    </div>
                    <!-- end card -->

                </div>
                <!-- end col -->

                <!-- employee detail side bar -->
                @include('employe_section.layout.employee_sidebar')



            </div>
            <!-- end row -->








        </div> <!-- container-fluid -->
    </div>
</div>





@endsection