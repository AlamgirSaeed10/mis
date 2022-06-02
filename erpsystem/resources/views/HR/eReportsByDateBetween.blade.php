@extends('HR.hr-layout.main')

@section('title', 'Employee Reports By Date')

@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Report</h4>
                        <div class="table-responsive">
                            <table class="table align-middle table-nowrap mb-0">
                                <thead>
                                    <tr>
                                        <th style="border-width: 2px;" scope="col">Employee Code</th>
                                        <th style="border-width: 2px;" scope="col"> Employee Name </th>
                                        <?php
                                        date_default_timezone_set('UTC');

                                        $start_date = request()->Fromdate;
                                        // echo $start_date;
                                        $end_date = request()->Todate;

                                        while (strtotime($start_date) <= strtotime($end_date)) {
                                        ?>
                                            <th  style="border-width: 2px;" scope="col">{{ $start_date }}</th>
                                        <?php
                                            $start_date = date("Y-m-d", strtotime("+1 days", strtotime($start_date)));
                                        }

                                        ?>


                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($reports as $report)
                                    <tr style="border-width: 2px;">
                                        <td style="border-width: 2px; white-space: nowrap;">{{ $report->FirstName }} {{ $report->LastName }}</td>
                                        <td style="border-width: 2px; white-space: nowrap;">{{ $report->FirstName }} {{ $report->LastName }}</td>
                                        <?php
                                        date_default_timezone_set('UTC');

                                        $start_date = request()->Fromdate;
                                        // echo $start_date;
                                        $end_date = request()->Todate;

                                        while (strtotime($start_date) <= strtotime($end_date)) {
                                        ?>
                                            <?php
                                            // start of nested loop for checking balance

                                            $opening_bal = DB::table('v_employees_report')->where('EmployeeID', '=', $report->EmployeeID)->whereDate('eDate', '=', $start_date)->get();
                                            // echo  $opening_bal;
                                            if (count($opening_bal) > 0) {
                                                $monthly = $opening_bal[0]->ReportFile;
                                            } else {
                                                $monthly = "";
                                                
                                            }
                                            if (count($opening_bal) > 0) {
                                                $report_text = strip_tags($opening_bal[0]->TextArea);
                                            } else {
                                                $report_text = "";
                                            }
                                            ?>
                                            <td scope="col" style="border-width: 2px; white-space: nowrap;">
                                                <div class="box" style="color: #000000; width: 180px !important; white-space: pre-wrap;">
                                                    @if($monthly == null)    
                                                    {{$report_text}}
                                                    @else
                                                    <a style="color: #1208ff !important;" href="{{ URL('/employee_report/' . $monthly) }}" class="text-dark fw-medium">
                                                        {{ $monthly }}</a>
                                                    {{$report_text}}



                                                    @endif
                                                </div>

                                            </td>

                                        <?php
                                            $start_date = date("Y-m-d", strtotime("+1 days", strtotime($start_date)));
                                        }

                                        ?>
                                    </tr>

                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- end card body -->
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div>
</div>
@endsection