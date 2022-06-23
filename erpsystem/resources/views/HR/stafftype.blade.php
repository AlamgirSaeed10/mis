@extends('template.main_tmp')

@section('title', 'Staff Type')


@section('content')

    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Staff Type</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item">Add Staff Type</li>

                                </ol>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">

                                <form action="{{ route('addstafftype') }}" method="post">
                                    @csrf
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="formrow-firstname-input" class="form-label">Staff Type</label>
                                            <input type="text" class="form-control" name="stafftype" id="formrow-firstname-input"
                                                placeholder="Enter Staff Type">
                                        <span style="color: red">@error('stafftype'){{ $message }} @enderror </span>     
                                        </div>
                                    </div>
                                    <div class="mb-4">

                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-success w-md">Submit</button>
                                    </div>
                                </form>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->


                    <!-- end col -->
                </div>


                <div class="row">
                    <div class="col-12">
                    <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">List of Staff Type</h4>
                        <div class="table-responsive">
                            <table class="table dt-responsive table-sm table-striped nowrap w-100">
                                <tbody>
                                    <tr>
                                        <th scope="col">S.No</th>
                                        <th scope="col">Title </th>

                                        <th scope="col">Action</th>
                                    </tr>
                                </tbody>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach($stafftype as $staff => $value)
                                    <tr>
                                        <td class="col-md-1">{{$i}}.</td>

                                        <td class="col-md-10">
                                            {{ $value->StaffType }}
                                        </td>
                                        <td class="col-md-1">
                                            <a href="{{ url('/editstafftype') }}/{{ $value->StaffTypeID }}"><i class="bx bx-pencil text-secondary align-middle me-1"></i></a>
                                            <i class="bx bx-trash  align-middle me-1 text-secondary cursor-pointer" onclick="delete_confirm2('deletestafftype','{{$value->StaffTypeID}}')"></i>
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
                    </div> <!-- end col -->
                </div> <!-- end row -->
            </div>


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


    <script type="text/javascript">
    function delete_confirm2(url, StaffTypeID) {
        console.log(StaffTypeID);
        url = '{{URL::TO('/')}}' + /deletestafftype/ + StaffTypeID;
        jQuery('#staticBackdrop').modal('show', {
            backdrop: 'static'
        });
        document.getElementById('delete_link').setAttribute('href', url);
    }
</script>
    @endsection
