@extends('HR.HR-layout.main')

@section('title', 'Documents')


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

                                <a href="{{ URL('/Employee') }}" class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i class="mdi mdi-arrow-left  me-1 pt-5"></i> Go Back</a>

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
                                            <h5>Uploaded Documents</h5>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div>

                                <!-- end row -->
                            </div>



                            @if (count($documents) > 0)
                            <div>
                                <table class="table align-middle table-nowrap table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Date modified</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php foreach ($documents as $key => $value) : ?>



                                            <tr>
                                                <td><a href="{{ URL('/documents/' . $value->File) }}" class="text-dark fw-medium"><i class="mdi mdi-file-document font-size-16 align-middle text-primary me-2"></i>
                                                        {{ $value->FileName }}</a></td>

                                                <?php

                                                $install_date = $value->eDate;
                                                $install_date = date("d/m/Y", strtotime($install_date));
                                                ?>
                                                <td>{{ $install_date }}</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <a class="font-size-16 text-muted dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="mdi mdi-dots-horizontal"></i>
                                                        </a>

                                                        <div class="dropdown-menu dropdown-menu-end" style="margin: 0px;">
                                                            <a class="dropdown-item" href="{{ URL('/documents/' . $value->File) }}" target="_blank"><i class="fa fa-eye text-secondary"></i>&nbsp; Open</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item" style="cursor: pointer;" onclick="delete_document('delete_documment','{{ $value->DocumentID }}')"><i class="fa fa-trash text-secondary"></i>&nbsp; Remove</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>

                                        <?php endforeach ?>


                                    </tbody>
                                </table>
                            </div>
                            @endif


                            @if (count($documents) == 0)
                            <p class="text-danger">No document uploaded</p>
                            @endif
                        </div>
                    </div>
                    <!-- end card -->


                    <div class="card">
                        <div class="card-header bg-transparent   mt-2">
                            <h5>Upload Document</h5>
                        </div>
                        <div class="card-body">

                            <form action="{{ Route('EmployeeDocumentUpload') }}" method="post" enctype="multipart/form-data"> {{ csrf_field() }}
                                <input type="hidden" value="{{ $employee[0]->EmployeeID }}" name="EmployeeID">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input">File Name*</label>
                                            <input type="text" class="form-control  form-control-sm" name="FileName" value="{{ old('FileName') }}" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3"><label for="basicpill-firstname-input">Select
                                                File<br></label><br><input type="file" id="UploadFile" name="UploadFile" required="">
                                        </div>
                                    </div>

                                    <div class="clearfix"></div>
                                    <div class="col-md-4">
                                        <button type="submit" class="btn  btn-rounded btn-success w-md float-right">Upload</button>


                                    </div>


                                </div>


                            </form>


                        </div>
                    </div>

                </div>
                <!-- end col -->

                @include('HR.hr-layout.hr-sidebar')



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





<script type="text/javascript">
    function delete_document(url, DocumentID) {

        url = '{{URL::TO('/')}}' +/delete_emp_documents/+DocumentID;
        jQuery('#staticBackdrop').modal('show', {
            backdrop: 'static'
        });
        document.getElementById('delete_link').setAttribute('href', url);
    }
</script>
@endsection