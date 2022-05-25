@extends('HR.hr-layout.main') @section('content')
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
                            <ul class="nav nav-tabs col-lg-4" role="tablist">
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
                            {{-- {{$ChartOfAccountID_data}} --}}
                                
                                <div class="tab-pane active" id="level1" role="tabpanel">
                                    {{-- {{    dd($ChartOfAccountID_L1) }} --}}
                                <form action="{{URL('UpdateChartOfAccountID_L1/'.$ChartOfAccountID_data[0]->ChartOfAccountID)}}" method="post">
                                @method('get')
                                        {{csrf_field()}}
                                        <div class="col-lg-4">
                                            <label for="horizontal-firstname-input" class="col-mb-3 col-form-label">Description</label>
                                            <div class="mb-3">
                                                <input name="ChartOfAccountName" class="form-control" id="ChartOfAccountName" value="{{$ChartOfAccountID_data[0]->ChartOfAccountName}}">
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
        </div>
    </div>

    @endsection