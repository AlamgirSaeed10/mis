@extends('template.main_tmp')

@section('title', 'Allowance')


@section('content')

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
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
                            <form action="{{route('update_allowance')}}" method="post">
                                @csrf
                                <div class="row">
                                <div class="col-md-4">
                                    <input type="hidden" class="form-control" name="AllowanceID" value='{{ $AllowanceList[0]->AllowanceListID;}}' id="formrow-firstname-input" placeholder="Enter Allowance Title">

                                    <div class="mb-3">
                                        <label for="formrow-firstname-input" class="form-label">Allowance Title</label>
                                        <input type="text" class="form-control" name="AllowanceTitle" value='<?php echo $AllowanceList[0]->AllowanceTitle; ?>' id="formrow-firstname-input" placeholder="Enter Allowance Title">
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
                                               
                                                <option value="Dr"  @if($AllowanceList[0]->AllowanceCategory == 'Dr') selected
                                                    @endif>Dr</option>
                                                <option value="Cr" @if($AllowanceList[0]->AllowanceCategory == 'Cr') selected
                                                    @endif>Cr</option>
    
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div>
                                    <button type="submit" class="btn btn-success w-md">Submit</button>
                                </div>
                            </form>
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
        @endsection