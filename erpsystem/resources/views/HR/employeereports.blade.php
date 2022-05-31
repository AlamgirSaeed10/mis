@extends('template.main_tmp')

@section('title', 'Employee Reports')


@section('content')

<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Department Reports</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item active">Department Employee Reports</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            <!-- choose date -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Chose date and department</h4>
                            <form class="repeater" action="{{ route('departmentreports_fetch') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div data-repeater-list="group-a">
                                    <div data-repeater-item class="row">
                                        <div class="mb-3 col-lg-4">
                                            <label>Date</label>
                                            <div class="input-group" id="datepicker2">
                                                <input type="text" name="date" class="form-control" placeholder="Choose date" autocomplete="off" data-date-format="yyyy-mm-dd"  data-provide="datepicker" data-date-autoclose="true">

                                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                            </div><!-- input-group -->
                                        </div>

                                        <div class="mb-3 col-lg-4">
                                            <label class="form-label">Departent</label>
                                            <select name="dep_id" class="form-control select2">
                                                <option>Select</option>
                                                @foreach($department as $departments)
                                                <option value="{{$departments->DepartmentID}}">{{$departments->DepartmentName}}</option>
                                                @endforeach
                                            </select>
                                        </div>



                                        <div class="col-lg-2 align-self-center">
                                            <div class="d-grid">
                                                <input data-repeater-delete type="submit" class="btn btn-primary" value="Check" />
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
          

<div class="row"></div>
<div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Chose between two dates</h4>
                            <form class="repeater" action="{{ route('departmentreports_fetch_between') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div data-repeater-list="group-a">
                                    <div data-repeater-item class="row">
                                        
                                    <div class="mb-3 col-lg-4">
                                            <label>From Date</label>
                                            <div class="input-group" id="datepicker2">
                                                <input type="text" name="Fromdate" class="form-control" placeholder="Choose date" autocomplete="off" data-date-format="yyyy-mm-dd" data-provide="datepicker" data-date-autoclose="true">

                                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                            </div><!-- input-group -->
                                        </div>
                                        
                                        
                                    <div class="mb-3 col-lg-4">
                                            <label>To Date</label>
                                            <div class="input-group" id="datepicker2">
                                                <input type="text" name="Todate" class="form-control" placeholder="Choose date" autocomplete="off" data-date-format="yyyy-mm-dd" data-provide="datepicker" data-date-autoclose="true">

                                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                            </div><!-- input-group -->
                                        </div>

                                    <div class="mb-3 col-lg-4">
                                            <label class="form-label">Departent</label>
                                            <select name="dep_id" class="form-control select2">
                                                <option>Select</option>
                                                @foreach($department as $departments)
                                                <option value="{{$departments->DepartmentID}}">{{$departments->DepartmentName}}</option>
                                                @endforeach
                                            </select>
                                        </div>



                                        <div class="col-lg-2 align-self-center">
                                            <div class="d-grid">
                                                <input data-repeater-delete type="submit" class="btn btn-primary" value="Check" />
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
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


        // alert('hello');
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