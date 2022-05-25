@extends('employe_section.layout.employeemain')
@section('title', 'Attendence')
@section('content')

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                 
                    <h4 class="card-title"> Attendence</h4>
                    <p>Mark your attendence when you will enter the office. </p>
                    <form class="needs-validation" novalidate="" action="{{ route('employe_att') }}" method="POST">
                    {{csrf_field()}}
                   
                         <input type="text" name="Time" value="{{ date("h:i:sa") }}">
                         <input type="hidden" name="DateTime" value="time">
                        <div>
                            <button type="submit" class="btn btn-success waves-effect waves-light">
                                                <i class="bx bx-check-double font-size-16 align-middle me-2"></i> IN
                                            </button>
                        </div>
                    </form>
                    
                    <p>Mark your attendence when you will leave the office. </p>
                    <form class="needs-validation" novalidate="" action="{{ route('employe_att') }}" method="POST">
                    {{csrf_field()}}
                        
                         <input type="hidden" name="Status" value="CheckOut">
                         <input type="hidden" name="DateTime" value="time">
                        <div>
                            <button type="submit" class="btn btn-danger waves-effect waves-light">
                                                <i class="bx bx-check-double font-size-16 align-middle me-2"></i> OUT
                                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
    @endsection