@extends('template.main_tmp')

@section('title', 'Employee Reports By Date')


@section('content')
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex justify-content-between">

                        <div class="col-4">

                        </div>
                        <div class="col-4">
                          
                                <h4 class="mb-sm-0 font-size-22" style="font-size: 18px !important;">{{ $department[0]->DepartmentName }} Department Reports</h4><br>
                                <h4 class="mb-sm-0" style="margin-left: 23%;">{{ dateformatman(request()->date) }}</h4>
                           
                        </div>
                        <div class="col-4">
                        <div style="display: flex; justify-content: flex-end">
                            <a href="{{ URL('/reports') }}" class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i class="mdi mdi-arrow-left  me-1 pt-5"></i> Go Back</a>
                        </div>
                        </div>
                       
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->



        <!-- start page title -->

        <div class="row">
            <div class="col-12">
                @foreach ($reports as $report)
                <div class="card">
                    <div class="card-body">
                        <div class="row">


                            <div class="d-flex justify-content-center">



                            </div>
                            <div class="d-flex justify-content">

                                <h5>
                                    <p>{{ $report->FirstName }} {{ $report->LastName }}</p>
                                </h5>
                                <!-- <h5><p>{{ $report->FirstName }} {{ $report->LastName }}</p></h5> -->
                            </div>
                            <table>
                                <tbody class="table">

                                    <td style="font-size:15px" class="col-sm-2"><b>Tittle</b></td>

                                    <td style="font-size:15px" class="col-sm-10">{{ $report->Title }}</td>
                                </tbody>
                                <tbody class="table">
                                    <td style="font-size:15px" class="col-sm-2"><b>Description</b></td>

                                    <td style="font-size:15px" class="col-sm-10">
                                        <?php echo strip_tags($report->TextArea); ?>
                                    </td>
                                </tbody>
                                <tbody class="table">
                                    <td style="font-size:15px" class="col-sm-2"><b>File</b></td>

                                    <td style="font-size:15px" class="col-sm-10">
                                        <a href="{{ URL('/employee_report/' . $report->ReportFile) }}" class="text-dark fw-medium"><i class="mdi mdi-file-document font-size-16 align-middle text-primary me-2"></i>
                                            {{ $report->ReportFile }}</a>
                                    </td>
                                </tbody>

                            </table>

                        </div>
                    </div>
                    <p style="page-break-after: always;">&nbsp;</p>
                </div>
                @endforeach
            </div>

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->


    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <script>
                        document.write(new Date().getFullYear())
                    </script> Â© ShahCorporation.
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
<!-- end main content-->
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

<div class="modal fade" id="ReportModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Daily Report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <input type="hidden" name="id" value="216">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Date</label>
                                    <input type="text" id="date" name="date" class="form-control" value="" readonly="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group align-center">
                                    <label>Title</label>
                                    <input type="text" id="title" name="title" value="" class="form-control" readonly="">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea id="verticalnav-address-input content" class="content form-control" rows="6">herkoo</textarea>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="row">
                                  <div class="col-md-12">
                                      <div class="form-group">
                                          <label>Image</label>
                                          <!-- <img src='images/' width="50px"> -->
                                          <!-- <img src='' width="50px"> -->
                                                                  </div>
                                  </div>
                              </div> --}}
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>
<script>
    $(document).on("click", "#report", function() {
        var reportid = $(this).data('id');
        $.ajax({
            type: "GET",
            url: "/employeereport/" + reportid,
            success: function(response) {
                console.log(response.report[0].Title);
                $("#date").val(response.report[0].eDate);
                $("#title").val(response.report[0].Title);
                $(".content").val(response.report[0].TextArea);



            }
        });



        $('#ReportModal').modal('show');
    });

    function delete_employee(id) {



        url = '{{ URL::TO(' / ') }}/' + 'deleteemployee' + '/' + id;



        jQuery('#staticBackdrop').modal('show', {
            backdrop: 'static'
        });
        document.getElementById('delete_link').setAttribute('href', url);

    }


    // $(function() {

    //     var table = $('.employeetable').DataTable({
    //         processing: true,
    //         serverSide: true,
    //         ajax: "{{ route('showemployee') }}",
    //         columns: [

    //             {
    //                 data: 'FirstName',
    //                 name: 'FirstName '
    //             },
    //             {
    //                 data: 'JobTitleName',
    //                 name: 'JobTitleName'
    //             },
    //             {
    //                 data: 'DepartmentName',
    //                 name: 'DepartmentName'
    //             },

    //             {
    //                 data: 'action',
    //                 name: 'action',
    //                 orderable: false,
    //                 searchable: false
    //             },
    //         ]
    //     });

    // });
</script>

@endsection