@extends('template.staff_tmp')
@section('title', 'Report')


@section('content')


<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
      

            <!-- start page title -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Reportss</h4>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4"></h4>
                        <form action="{{ route('Report') }}" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="basicpill-firstname-input">Title *</label>
                                        <div class="input-group" id="datepicker2">
                                            <input type="text" name="Title" autocomplete="off" class="form-control" data-date-autoclose="true">
                                        </div>
                                        <span style="color: red">@error('Title'){{ $message }} @enderror </span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="basicpill-firstname-input">Upload File</label>
                                        <div class="input-group" id="datepicker2">
                                            <input style="margin-right: 29px !important;" type="file" name="ReportFile" autocomplete="off" class="form-control" data-date-autoclose="true">
                                        </div>
                                        <span style="color: red">@error('ReportFile'){{ $message }} @enderror </span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3">
                                        <div class="col-md-12">

                                            <textarea name="TextArea"></textarea>

                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-success w-lg float-right">Save</button>
                                </div>
                        </form>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">List of Reports</h4>
                        <div class="table-responsive">
                            <table class="table align-middle table-nowrap mb-0">
                                <tbody>
                                    <tr>
                                        <th scope="col">S.No</th>
                                        <th scope="col">Title </th>
                                        <th scope="col">Report File </th>
                                        <th scope="col">Date </th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </tbody>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach($reports as $report)
                                    <tr>
                                        <td class="col-md-1">{{$i}}.</td>

                                        <td class="col-md-2">
                                            {{ $report->Title }}
                                        </td>
                                        <!-- <td class="col-md-1">

                                            <a href="https://docs.google.com/a/inu.edu.pk/viewer?{{asset('employee_report')}}/{{ $report->ReportFile }}"> {{ $report->ReportFile }}</a>
                                        </td> -->


                                        <td class="col-md-2">
                                            @if($report->ReportFile != Null)
                                            <!-- <a href="{{ URL('/employee_report/' . $report->ReportFile) }}" class="text-dark fw-medium">open file
                                            </a> -->
                                            <?php
                                            $path = $report->ReportFile;
                                            $extension = pathinfo($path, PATHINFO_EXTENSION);

                                            if ($extension == 'pdf') {
                                            ?>
                                                <button type="button" class="btn btn-success  waves-effect waves-light document-modal" data-value="{{ URL('/employee_report/' . $report->ReportFile) }}">
                                                    <a style="color: white;" target="_blank" href="{{ URL('/employee_report/' . $report->ReportFile) }}">open
                                                    </a>
                                                </button>


                                            <?php
                                            } else {
                                            ?>
                                                <button type="button" class="btn btn-success  waves-effect waves-light document-modal" data-value="{{ URL('/employee_report/' . $report->ReportFile) }}" data-bs-toggle="modal" data-bs-target=".bs-example-modal-center">Open</button>
                                            <?php
                                            }
                                            ?>
                                            @else
                                            No File
                                            @endif
                                        </td>


                                        <td class="col-md-6">

                                            <?php

                                            $install_date = $report->eDate;
                                            $install_date = date("d/m/Y", strtotime($install_date));

                                            ?>
                                            {{ $install_date }}
                                        </td>
                                        <td class="col-md-1">
                                            <a href="edit_report/{{$report->ReportID  }}"><i class="bx bx-pencil align-middle me-1"></i></a>
                                            <i class="bx bx-trash  align-middle me-1 text-primary cursor-pointer" onclick="delete_confirm2('delete_report','{{$report->ReportID }}')"></i>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
     
        </div>
    </div>
    <!-- End Page-content -->

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

    <!-- show report model -->

    <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Document</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="" id="imageee" style="width:70%; height:70%; margin-left: 15%;">
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>

<script type="text/javascript">
    $(document).on("click", ".document-modal", function() {
        var value = $(this).data('value');
        document.getElementById('imageee').src = value;

    });


    function delete_confirm2(url, ReportID) {
        console.log(ReportID);
        url = '{{URL::TO('/')}}' +/delete_report/+ReportID;
        jQuery('#staticBackdrop').modal('show', {
            backdrop: 'static'
        });
        document.getElementById('delete_link').setAttribute('href', url);
    }
</script>
<script>
    CKEDITOR.replace('TextArea', {
        height: 350,
    });
</script>
@endsection