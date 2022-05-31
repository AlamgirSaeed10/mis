@extends('template.main_tmp')
@section('title', 'Home')
@section('content')

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Edit Letter</h4>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4"></h4>
                        <form action="{{ url('/updateletter')}}/{{ $letters[0]->LetterID }}" method="POST">
                            {{csrf_field()}}
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="basicpill-firstname-input">Title *</label>
                                        <div class="input-group" id="datepicker2">
                                            <input type="text" name="Title" autocomplete="off" value ='<?php echo$letters[0]->Title; ?>' class="form-control" data-date-autoclose="true">
                                        </div>
                                        <span style="color: red">@error('Title'){{ $message }} @enderror </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                <label for="basicpill-firstname-input">Add Content *</label>
                                    <div class="col-md-12">
                                        <textarea name="Content"><?php echo$letters[0]->Content; ?></textarea>
                                    </div>
                                </div>
                            </div><br>
                            <div>
                                <button type="submit" class="btn btn-success w-lg float-right">Update</button>
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