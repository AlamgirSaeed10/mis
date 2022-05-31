@extends('template.main_tmp')

@section('title', 'Leave Type Title')


@section('content')

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Leave Type Title</h4>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">

                            <form action="{{ route('LeaveTypeUpdate') }}" method="post">
                                @csrf
                                <div class="col-md-4">
                                <div class="mb-3">
                                    <input type="hidden" name="LeaveTypeID" value="{{ $LeaveTypeedit[0]->LeaveTypeID }}">
                                    <label for="formrow-firstname-input" class="form-label">Leave Type Title</label>
                                    <input type="text" class="form-control" name="LeaveTypeTitle" value="{{ $LeaveTypeedit[0]->LeaveTypeTitle }}" id="formrow-firstname-input" placeholder="Enter Leave Type Title">
                                    <span style="color: red">
                                        @error('LeaveTypeTitle')
                                        {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-success w-md">Update</button>
                                </div>
                            </form>
                        </div>
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
    @endsection