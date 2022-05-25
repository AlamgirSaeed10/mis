@extends('HR.hr-layout.main')

@section('title', 'Home')


@section('content')

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Letter</h4>
                    </div>
                    
                </div>
                <div class="card">
    <div class="card-body">
        <h4 class="card-title mb-4">Letter Form</h4>

        <form action="{{ route('letter') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-lg-4">
                    <div class="mb-3">
                        <label for="formrow-inputCity" class="form-label">Title</label>
                        <input type="text" class="form-control" name="Title" id="formrow-inputCity" placeholder="Enter Your Title">
                        <span style="color: red">@error('Title'){{ $message }} @enderror </span>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="mb-3">
                        <label for="formrow-inputState" class="form-label">UserID</label>
                        <input type="number" class="form-control" name="UserID" id="formrow-inputCity" placeholder="Enter Your UserID">
                        <span style="color: red">@error('UserID'){{ $message }} @enderror </span>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="mb-3">
                        <label for="formrow-inputZip" class="form-label">eDate</label>
                        <input type="date" class="form-control" name="eDate" id="formrow-inputZip" placeholder="Enter Your eDate">
                        <span style="color: red">@error('eDate'){{ $message }} @enderror </span>
                    </div>
                </div>
                <div class="col-md-12">
                    <textarea class="form-control" name="Content"></textarea>
                    <span style="color: red">@error('Content'){{ $message }} @enderror </span>
                </div>
            </div>
            <div class="mb-3">
                <div><br>
                    <button type="submit" class="btn btn-primary w-md" style="float: right;">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
            </div>
        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

    <!-- Transaction Modal -->
  
    

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

<script>
    CKEDITOR.replace('Content', {
        height: 350,
    });
</script>

@endsection