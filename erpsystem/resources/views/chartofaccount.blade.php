@extends('template.main_tmp')
 @section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- display error -->
            @if (session('error'))
            <div class="alert alert-danger p-3" id="success-alert">
                {{ Session::get('error') }}
            </div>
            @endif
            @if (session('success'))
            <div class="alert alert-success p-3" id="success-alert">
                {{ Session::get('success') }}
            </div>
            @endif
            @if (count($errors) > 0)
            <div class="card-body ">
                <div class="alert alert-warning pt-3 pl-0">
                    There were some problems with your input.
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endif
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Chart Of Account</h4>
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs col-lg-6 col-sm-12 col-md-6" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#level1" role="tab">
                                        <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                        <span class="d-none d-sm-block">Chart Of Account Level 1</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#level2" role="tab">
                                        <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                        <span class="d-none d-sm-block">Chart Of Account Level 2</span>
                                    </a>
                                </li>
                            </ul>
                            
                            <!-- Tab panes -->
                            <div class="tab-content p-3 text-muted">
                                
                                <div class="tab-pane active" id="level1" role="tabpanel">
                                    {{-- {{    dd($ChartOfAccountID_L1) }} --}}
                                    <form action="{{URL('/SaveChartOfAccount')}}" method="post">
                                        {{csrf_field()}}
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="formrow-inputState" class="form-label">Chart Of Account</label>
                                                <select id="formrow-inputState" name="ChartOfAccountID" class="form-select">
                                                    @foreach($ChartOfAccountID_L1 as $value)
                                                    <option value="{{$value->ChartOfAccountID}}">{{$value->ChartOfAccountID}}-{{$value->ChartOfAccountName}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="horizontal-firstname-input" class="col-mb-3 col-form-label">Description</label>
                                            <div class="mb-3">
                                                <input name="ChartOfAccountName" class="form-control" id="ChartOfAccountName">
                                            </div>
                                        </div>
                                        <div>
                                            <button type="submit" class="btn btn-primary w-md">Submit</button>
                                        </div>
                                    </form>
                                    
                                </div>
                                <div class="tab-pane" id="level2" role="tabpanel">
                                    
                                    <form action="{{URL('/SaveChartOfAccount_l2')}}" method="post">
                                    {{csrf_field()}}
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="formrow-inputState" name="ChartOfAccountID" class="form-label">Chart Of Account</label>
                                                <select id="formrow-inputState" name="ChartOfAccountID" class="form-select">
                                                    @foreach($ChartOfAccountID_L2 as $value)
                                                    <option value="{{$value->ChartOfAccountID}}">{{$value->ChartOfAccountID}}-{{$value->ChartOfAccountName}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="horizontal-firstname-input" class="col-mb-3 col-form-label">Description</label>
                                            <div class="mb-3">
                                                <input name="ChartOfAccountName" class="form-control" id="ChartOfAccountName">
                                            </div>
                                        </div>
                                        <div>
                                            <button type="submit" class="btn btn-primary w-md">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                        <thead> 
                            <tr>
                                <th class="th-sm">S.No</th>
                                <th class="th-sm">ChartOfAccountID</th>
                                <th class="th-sm">ChartOfAccountName</th>
                                <th class="th-sm">Level 1</th>
                                <th class="th-sm">Level 2</th>
                                <th class="th-sm">Level 3</th>
                                <th class="th-sm">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($allData)>0)
                            @foreach ($allData as $key =>$value)
                            <tr>
                                <td class="col-md-1">{{$key+1}}</td>
                                <td class="col-md-2">{{$value->ChartOfAccountID}}</td>
                                <td class="col-md-5">{{$value->ChartOfAccountName}}</td>
                                <td class="col-md-1">{{$value->L1}}</td>
                                <td class="col-md-1">{{$value->L2}}</td>
                                <td class="col-md-1">{{$value->L3}}</td>
                                <td class="col-md-1">
                                
                                    <a href="{{ URL('EditChartOfAccountID_L1/'.$value->ChartOfAccountID)}}">
                                        <i style="cursor:pointer" class="bx bx-pencil align-middle  text-secondary"></i>
                                    </a>

                                    <a  onclick="delete_confirm2('DeleteChartOfAccountID',  '{{$value->ChartOfAccountID}}' )"><i class="bx bx-trash  align-middle text-secondary"  style="cursor:pointer"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
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
    <script>
    
    $(document).ready(function () {
    $('#dtBasicExample').DataTable();
    $('.dataTables_length').addClass('bs-select');
    });
    function delete_confirm2(url, ChartOfAccountID) {
           
            url = '{{URL::TO('/')}}' +/DeleteChartOfAccountID/ + ChartOfAccountID;
            jQuery('#staticBackdrop').modal('show', {
                backdrop: 'static'
            });
            document.getElementById('delete_link').setAttribute('href', url);
        }
    </script>

    @endsection