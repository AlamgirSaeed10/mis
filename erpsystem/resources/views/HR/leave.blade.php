@extends('template.hr_tmp')
@section('title', 'Leave')
@section('content')

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Leave</h4>
                    </div>
                </div>
          
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">List of leaves</h4>
                <div class="table-responsive">
                    <table class="table align-middle table-nowrap mb-0">
                        <tbody>
                            <tr>
                                <th scope="col">S.No</th>
                                <th scope="col">Employee Name</th>
                                <th scope="col">From Date</th>
                                <th scope="col">To Date</th>
                                <th scope="col">Reason</th>
                                <th scope="col">Action</th>
                            </tr>
                        </tbody>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach($leaves as $leave)
                            <tr>
                                <td class="col-md-1">{{$i}}.</td>
                                <td class="col-md-1">{{$leave->FirstName}} {{ $leave->LastName }}</td>

                                <td class="col-md-2">
                                    {{ $leave->FromDate}}
                                </td>
                                <td class="col-md-2">
                                    {{$leave->ToDate}}
                                </td>
                                <td class="col-md-10">
                                    {{$leave->Reason}}
                                </td>
                                <td class="col-md-1">
                                    <a href="edit_leave/{{ $leave->LeaveID }}"><i class="bx bx-pencil align-middle me-1"></i></a>
                                    <i onclick="delete_confirm2('delete_leave','{{ $leave->LeaveID  }}')" class="bx bx-trash  align-middle me-1 text-primary"></i>
                                </td>
                                <td>

                                </td>
                            </tr>
                            <?php $i++; ?>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- end card body -->
        </div>

    </div>
</div>
<!-- container-fluid -->
</div>
<!-- End Page-content -->

<!-- Transaction Modal -->
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
<!-- end modal -->
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
<script type="text/javascript">
       function delete_confirm2(url,LeaveID) {
           console.log(LeaveID);
            url = '{{URL::TO('/')}}'+/delete_leave/+LeaveID;
            jQuery('#staticBackdrop').modal('show', {backdrop: 'static'});
            document.getElementById('delete_link').setAttribute('href' , url);
        }
</script>

@endsection