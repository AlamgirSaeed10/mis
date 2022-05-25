@extends('employe_section.layout.employeemain')

@section('title', 'Manage Letters')


@section('content')

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
            @if (session('error'))

            <div class="alert alert-{{ Session::get('class') }} p-3 ">

                {{ Session::get('error') }}
            </div>

            @endif

            @if (count($errors) > 0)

            <div>
                <div class="alert alert-danger pt-3 pl-0   border-3 bg-danger text-white">
                    <p class="font-weight-bold"> There were some problems with your input.</p>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endif

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Issue Letter</h4>

                        <div class="page-title-right">
                            <div class="page-title-right">

                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <!-- end page title -->
                    @if (session('error'))
                    <div class="alert alert-{{ Session::get('class') }} p-3">
                        {{ Session::get('error') }}
                    </div>
                    @endif
                    <div class="row">
                        <div class="col-12">
                            <form action="{{ url('/updateletterissue')}}/{{ $issue_letter[0]->IssueLetterID }}" method="post">
                                {{csrf_field()}}
                                <div class="card">
                                    <div class="card-body">


                                        <input class="form-control" type="hidden" name="IssueLetterID" id="example-email-input" required value="{{$issue_letter[0]->IssueLetterID}}">
                                        <input class="form-control" type="hidden" name="EmployeeID" id="example-email-input" required value="{{$issue_letter[0]->EmployeeID}}">

                                        <h4 class="card-title">Letter Templates</h4>
                                        <p class="card-title-desc"> </p>
                                        <div class="mb-3 row">
                                            <label for="example-email-input" class="col-md-2 col-form-label">Title</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text" name="Title" id="example-email-input" required value="{{$issue_letter[0]->Title}}">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-email-input" class="col-md-2 col-form-label">Content</label>
                                            <div class="col-md-10">
                                                <textarea id="basic-example" name="Content">


  <?php
    $letter = str_replace("^NAME^", $employee[0]->FirstName, $issue_letter[0]->Content);

    $letter = str_replace("^DATE^", date('d-m-Y'), $letter);
    echo $letter;


    ?>
</textarea>

                                                <script src="{{URL('/assets/js/tinymce.min.js')}}"></script>
                                                <script id="rendered-js">
                                                    tinymce.init({
                                                        selector: 'textarea',
                                                        height: 500,
                                                        menubar: false,
                                                        plugins: [
                                                            'advlist autolink lists link image charmap print preview anchor textcolor',
                                                            'searchreplace visualblocks code fullscreen',
                                                            'insertdatetime media table contextmenu paste code help wordcount'
                                                        ],
                                                        mobile: {
                                                            theme: 'mobile'
                                                        },
                                                        toolbar: 'insert | undo redo |  formatselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
                                                        content_css: [
                                                            '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
                                                            '//www.tiny.cloud/css/codepen.min.css'
                                                        ],
                                                    });
                                                    //# sourceURL=pen.js
                                                </script>
                                            </div>
                                        </div>
                                        <input type="submit" class="btn btn-primary w-md">
                                    </div>
                                </div>

                            </form>
                        </div> <!-- end col -->
                    </div>
                </div> <!-- container-fluid -->
            </div>
        </div>
        <script>
            CKEDITOR.replace('Content', {
                height: 350,
            });
        </script>
        @endsection