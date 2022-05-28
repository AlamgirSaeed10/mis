@extends('template.hr_tmp')
@section('title', 'Employee')
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
                        <h4 class="mb-sm-0 font-size-18">Employees</h4>
                        
                        <h4 class="card-title"><a href="{{ route('employeeform') }}"><button
                        class="btn btn-success" style="float:right;border-radius:25px;"><i class="fa fa-plus"></i> Add Employees</button></a> </h4>
                        
                    </div>
                    @if (session('error'))
                    <div class="alert alert-{{ Session::get('class') }} p-3 ">
                        {{ Session::get('error') }}
                    </div>
                    @endif
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            
                            <br><br>
                            <table id="datatable"
                                class="table dt-responsive table-sm table-striped nowrap w-100 employeetable">
                                <thead>
                                    <tr>
                                        <th class="col-sm-2">Full Name</th>
                                        <th class="col-sm-2">Job Tittle</th>
                                        <th>Department</th>
                                        <th>Staff Type</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    </div> <!-- end col -->
                    </div> <!-- end row -->
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
            
            function delete_employee(id) {
            
            url = '{{ URL::TO('/') }}/' + 'deletemployeedata' + '/' + id;
            jQuery('#staticBackdrop').modal('show', {
            backdrop: 'static'
            });
            document.getElementById('delete_link').setAttribute('href', url);
            }
            $(function() {
            var i=1;
            var table = $('.employeetable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('showemployee') }}",
            columns: [
            
            {
            width:'20%' ,
            data: 'FirstName',
            name: 'FirstName'
            },
            {
            width:'20%' ,
            data: 'JobTitleName',
            name: 'JobTitleName'
            },
            {
            width:'20%' ,
            data: 'DepartmentName',
            name: 'DepartmentName'
            },
            {
            width:'20%' ,
            data: 'StaffType',
            name: 'StaffType'
            },
            {
            width:'10%' ,
            data: 'action',
            name: 'action',
            orderable: false,
            searchable: false
            },
            ]
            });
            });
            
            </script>
            @endsection