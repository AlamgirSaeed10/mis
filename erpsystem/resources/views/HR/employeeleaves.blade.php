@extends('template.main_tmp')

@section('title', 'Employee Leaves')


@section('content')

<div class="main-content">

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

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Leaves</h4>
                                      @if (count($leaves) > 0)
                                    <div class="table-responsive">
                                        <table class="table align-middle table-nowrap mb-0">
                                            <tbody>
                                                <tr>
                                                    <th scope="col">S.No</th>

                                                    <th scope="col">From Date</th>
                                                    <th scope="col">To Date</th>

                                                    <th scope="col">Days</th>
                                                    <th scope="col">Reason</th>
                                                    <th scope="col">HR Status</th>
                                                    <th scope="col">Date</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </tbody>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                @foreach ( $leaves as $leave)
                                                <tr>
                                                    <td class="col-md-1">{{ $i }}.</td>
                                                    <td class="col">
                                                        <?php
                                                        $e_date_formaated = $leave->FromDate;
                                                        $e_date_formaated1 = date("d/m/Y", strtotime($e_date_formaated));
                                                        ?>
                                                        {{ $e_date_formaated1 }}
                                                    </td>
                                                    <td class="col">
                                                        <?php
                                                        $e_date_formaated =  $leave->ToDate;
                                                        $e_date_formaated1 = date("d/m/Y", strtotime($e_date_formaated));
                                                        ?>
                                                        {{ $e_date_formaated1 }}
                                                    </td>


                                                    <?php
                                                    $date1 =  $leave->FromDate;

                                                    // End date
                                                    $date2 =  $leave->ToDate;
                                                    $diff = strtotime($date2) - strtotime($date1);
                                                    $differ = abs(round($diff / 86400));
                                                    // Function call to find date difference

                                                    ?>
                                                    <td scope="col">{{ $differ }}</td>
                                                    <td scope="col">{{ $leave->Reason }}</td>
                                                    <td scope="col">{{ $leave->HRStatus }}</td>
                                                    <?php

                                                    $hrstatusdate = $leave->HRStatusDate;
                                                    $statusdate= ( $hrstatusdate==null) ? null :  date("d/m/Y", strtotime($hrstatusdate) );
                                                    ?>
                                                    <td scope="col">{{ $statusdate }}</td>


                                                    <td>

                                                        <a href="#" class="dropdown-toggle card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item openmodal" data-id="{{ $leave->LeaveID }}"><i class="fa fa-check text-secondary"></i>&nbsp; Manage Leave</a>
                                                            <!-- <a class="dropdown-item openmodal" data-id="{{ $leave->LeaveID }}">View</a> -->
                                                            <a class="dropdown-item"  onclick="delete_leave('deleteletter','{{ $leave->LeaveID }}')"><i class="fa fa-trash text-secondary"></i>&nbsp; Delete</a>
                                                        </div>

                                                    </td>


                                                </tr>
                                                <?php $i++; ?>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    @endif

                                      @if (count($leaves) == 0)
                            <p class="text-danger">No Leaves</p>
                            @endif
                                </div>
                                <!-- end card body -->
                            </div>
                        </div> <!-- end col -->
                    </div>
                    <!-- end card -->



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

<div class="modal fade" id="leavemodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update leave status</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="{{ route('aprove_leave') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="LeaveId" name="LeaveID" value="">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Status</label>
                        <div class="col-md-12">
                            <select class="form-select" name="status" required>
                                <option value="">Select Status</option>
                                @foreach ( $leaveStatus as $leavestd)
                                <option value="{{ $leavestd->LeaveStatus }}">{{ $leavestd->LeaveStatus }}</option>

                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Message</label>
                            <textarea class="form-control" name="reason" id="message-text"></textarea>
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>



<script type="text/javascript">
    function delete_leave(url, LeaveID) {

        url = '{{URL::TO('/')}}'+/delete_leave/+LeaveID;
        jQuery('#staticBackdrop').modal('show', {
            backdrop: 'static'
        });
        document.getElementById('delete_link').setAttribute('href', url);
    }


    $(document).on("click", ".openmodal", function() {
        var leaveid = $(this).data('id');
        //  alert(leaveid);
        $("#LeaveId").val(leaveid);
        // As pointed out in comments, 
        // it is unnecessary to have to manually call the modal.
        $('#leavemodal').modal('show');
    });
</script>
@endsection




