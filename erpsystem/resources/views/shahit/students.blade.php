@extends('HR.hr-layout.main')

@section('title', 'Students')


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
                            <h4 class="mb-sm-0 font-size-18">Students</h4>

                            <h4 class="card-title"><a href="{{ route('studentform') }}"><button
                                            class="btn btn-success" style="float:right;border-radius:25px;"><i class="fa fa-plus"></i> Add Students</button></a> </h4>

                                   

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
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
                                            
                                            <th>#</th>
                                            <th class="col-sm-2">Name</th>
                                            <th class="col-sm-2">Father Name</th>
                                            <th>Mobile No</th>
                                            <th>Email</th>
                                            <th>Action</th>
                                            {{-- <th>Tittle</th>
                                                <th>Action</th> --}}
                                        </tr>
                                    </thead>


                                    <tbody>
                                    @foreach ($students as $student)
                                    <tr>
                                        <td>{{ $loop->index+1 }}</td>
                                        <td>{{ $student->StudentFullName }}</td>
                                        <td>{{ $student->StudentFatherName }}</td>
                                        <td>{{ $student->StudentPhone }}</td>
                                        <td>{{ $student->StudentEmail }}</td>
                                        <td>
                                            <div class="dropdown">
        
                                                <a class="dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-h text-secondary"></i>
                                                  </a>
                                                <div class="dropdown-menu">
                                                <a class="dropdown-item"  href ="{{ url('/student') }}/{{ $student->StudentID }}" class="btn btn-sm edit" title="View"><i class="fa fa-eye text-secondary"></i>&nbsp; View</a>
                                                <a class="dropdown-item"  href ="{{ url('/studentfee') }}/{{ $student->StudentID }}" class="btn btn-sm edit" title="View"><i class="fa-money text-secondary"></i>&nbsp; Course Fee</a>
                                                    <a class="dropdown-item" href="{{ url('/editstudent') }}/{{ $student->StudentID }}" class="btn btn-sm edit" title="Edit"><i class="fa fa-pen text-secondary"></i>&nbsp; Edit</a>
                                                    <a class="dropdown-item" style="cursor: pointer;"
                                                    onclick="delete_confirm('{{ $student->StudentID }}')"><i
                                                        class="fa fa-trash text-secondary"></i>&nbsp;
                                                    Delete</a>
                                                   
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                        
                                    @endforeach
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
    
        
        
    function delete_confirm(id) {


// alert('hello');
url = '{{ URL::TO('/') }}/'+'deletestudent'+'/' +id;



jQuery('#staticBackdrop').modal('show', {
    backdrop: 'static'
});
document.getElementById('delete_link').setAttribute('href', url);

}

     
    
    </script>
@endsection

