@extends('HR.hr-layout.main')

@section('title', 'Add Employee')


@section('content')

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">

                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Employee Section</h4>

                        <div class="page-title-right">
                            <div class="page-title-right">
                                <!-- button will appear here <-->
                                <a href="{{ URL('/Employee') }}" class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2 w-md"><i class="mdi mdi-arrow-left pr-3"></i> Go Back</a>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            <form action="{{ route('addemployee') }}" method="post" enctype="multipart/form-data">
                <div class="row">

                    @csrf



                </div>

        </div>
    </div>
</div>


<!-- end card -->




</div>
<!-- end col -->


</div>
<!-- end row -->

</form>






</div> <!-- container-fluid -->
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