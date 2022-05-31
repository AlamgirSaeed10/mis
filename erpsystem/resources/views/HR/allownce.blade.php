@extends('template.main_tmp')

@section('title', 'Allowance')


@section('content')

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-12">

                    @if (session('error'))
                    <div class="alert alert-{{ Session::get('class') }} p-3 ">

                        {{ Session::get('error') }}
                    </div>
                @endif

       
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Allowance</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item">Add Allowance</li>

                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">

                            <form action="{{ route('allowance') }}" method="post">
                                @csrf
                                @if(session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session()->get('message') }}
                                </div>
                                @endif
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="formrow-firstname-input" class="form-label">Allowance Title</label>
                                            <input type="text" class="form-control" name="AllowanceTitle" id="formrow-firstname-input" placeholder="Enter Allowance Title">
                                            <span style="color: red">
                                                @error('AllowanceTitle')
                                                <span class="text-danger"> {{ $message }} </span>
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input">Category <span class="text-danger">*</span></label>
                                            <select name="AllowanceCategory"  class="form-select">
                                                <option value="">Select Category</option>
                                                <option value="Dr">Dr</option>
                                                <option value="Cr">Cr</option>
    
                                            </select>
                                        </div>
                                    </div>
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
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">List of Allowance</h4>
                    <div class="table-responsive">
                        <table class="table dt-responsive table-sm table-striped align-middle table-nowrap mb-0">
                            <tbody>
                                <tr>
                                    <th scope="col">S.No</th>
                                    <th scope="col">Allowance Title </th>
                                    <th scope="col">Allowance Category </th>
                                    <th scope="col">Action</th>
                                </tr>
                            </tbody>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach($allowance as $value)
                                <tr>
                                    <td class="col-md-1">{{$i}}.</td>

                                    <td class="col-md-4">
                                        {{ $value->AllowanceTitle }}
                                    </td>
                                    <td class="col-md-4">
                                        {{ $value->AllowanceCategory }}
                                    </td>
                                    <td class="col-md-1">
                                        <a href="editallowance/{{$value->AllowanceListID }}"><i class="bx bx-pencil align-middle me-1"></i></a>
                                        <i class="bx bx-trash  align-middle me-1 text-primary cursor-pointer" onclick="delete_confirm2('allowance_delete','{{$value->AllowanceListID}}')"></i>
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

    <!-- my own model -->
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
    <!-- end of my own model -->
    <script type="text/javascript">
        function delete_confirm2(url, AllowanceListID) {
            console.log(AllowanceListID);
            url = '{{URL::TO('/')}}' +/allowance_delete/ + AllowanceListID;
            jQuery('#staticBackdrop').modal('show', {
                backdrop: 'static'
            });
            document.getElementById('delete_link').setAttribute('href', url);
        }
    </script>
    @endsection
