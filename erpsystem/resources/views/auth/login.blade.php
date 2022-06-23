<!doctype html>
<html>



<head>

    <meta charset="utf-8" />
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="HR Extensive Software" name="HR Software" />
    <meta content="Software" name="Kashif Mushtaq" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/Shah-Corps_Logo.png') }}">

    <!-- Bootstrap Css -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{asset('assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />

</head>



<body>
    <div class="account-pages my-5 pt-sm-5">
        <div class="container ">
            <div class="row justify-content-center ">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden ">
                        <div class="bg-primary bg-soft border-primary border-top border-3 rounded-top">
                            <div class="row">
                                <div class="col-7">
                                    <div class="text-primary p-4">
                                        <h5 class="text-primary">Welcome to Shah Crm</h5>
                                        <!-- <p>Sign in to continue to HR.</p> -->
                                    </div>
                                </div>
                                <div class="col-5 align-self-end">
                                    <img src="{{asset('assets/images/profile-img.png')}}" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>


                        <div class="card-body pt-0">
                            <div class="auth-logo">
                                <a href="{{ url('/')}}" class="auth-logo-light">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <span class="avatar-title rounded-circle bg-light">
                                            <img src="{{asset('assets/images/logo-light.svg')}}" alt="" class="rounded-circle" height="34">
                                        </span>
                                    </div>
                                </a>

                                <a href="{{ url('/')}}" class="auth-logo-dark">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <span class="avatar-title rounded-circle bg-light">
                                            <img src="{{ asset('assets/images/Shah-Corps_Logo.png') }}" alt="" class="rounded-circle" height="45">
                                        </span>
                                    </div>
                                </a>
                            </div>





                            <!-- display error -->
                            <!-- display error -->
                            @if (session('error'))

                            <div class="alert alert-danger p-3">

                                {{ Session::get('error') }}

                            </div>

                            @endif

                            @if (count($errors) > 0)

                            <div class="card-body">
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
                            <!-- enctype="multipart/form-data" -->
                            <form action="{{URL('/SendForgotEmail')}}" method="post"> {{csrf_field()}} </form>
                            <!-- end of display error -->

                            <div class="p-2 ">
                                <form method="POST" action="{{ route('auth.check') }}">

                                    @csrf
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Email</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    </div>
                                    <sapn class="text danger">@error('email'){{$message}} @enderror</sapn>
                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <div class="input-group auth-pass-inputgroup">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                            <button class="btn btn-light " type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                        </div>
                                        <sapn class="text danger">@error('password'){{$message}} @enderror</sapn>

                                    </div>

                                    <div class="mb-3">
                                        <label class="d-block mb-2">Choose Login Type</label>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="StaffType" id="inlineRadio1" value="Management" checked="">
                                            <label class="form-check-label" for="inlineRadio1">Management (HR,GM,OM)</label>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="StaffType" id="inlineRadio2" value="Employee" {{ old('StaffType') == 'Employee' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="inlineRadio2">Employee</label>
                                        </div>
                                    </div>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                    <div class="mt-4 d-grid">
                                        <button class="btn btn-primary waves-effect waves-light" type="submit">Log In</button>
                                    </div>



                                    <div class="mt-4 text-center d-none">
                                        <a href="{{URL('/ForgotPassword')}}" class=" text-muted "><i class="mdi mdi-lock  me-1 text-muted"></i> Forgot your password?</a>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                    <div class="mt-5 text-center">

                        <div>

                            <p>Copyright &copy <script>
                                    document.write(new Date().getFullYear())
                                </script> Shah Corporation. All rights reserved</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>






    <!-- JAVASCRIPT -->
    <script src="{{asset('assets/libs/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/libs/metismenu/metisMenu.min.js')}}"></script>
    <script src="{{asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{asset('assets/libs/node-waves/waves.min.js')}}"></script>

    <!-- App js -->
    <script src="{{asset('assets/js/app.js')}}"></script>

    <script>
        $("#success-alert").fadeTo(4000, 500).slideUp(100, function() {
            $("#success-alert").slideUp("slow");
            $("#success-alert").alert('close');
        });
    </script>


</body>

</html>