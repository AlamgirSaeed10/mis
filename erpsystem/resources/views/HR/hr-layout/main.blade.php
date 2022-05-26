<!doctype html>
<html lang="en">


<!-- Mirrored from themesbrand.com/skote/layouts/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 16 Nov 2021 10:16:20 GMT -->

<head>

    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/Shah-Corps_Logo.png') }}">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

    <link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }} " rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/libs/spectrum-colorpicker2/spectrum.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/libs/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet" type="text/css" />
    {{-- <link rel="stylesheet" href="{{ asset('assets/libs/%40chenfengyuan/datepicker/datepicker.min.css') }}"> --}}



    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

    <!-- DataTables -->
    <link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="{{ asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{URL('/')}}/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="{{URL('/')}}/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

</head>

<body data-sidebar="dark">
    <!-- <body data-layout="horizontal" data-topbar="dark"> -->
    <!-- Begin page -->
    <div id="layout-wrapper">
        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box">


                        <a href="index.html" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="{{ asset('assets/images/Shah-Corps_Logo.png') }}" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="{{ asset('assets/images/Shah-Corps_Logo.png') }}" alt="" height="70">
                            </span>
                        </a>
                    </div>

                    <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>

                    <!-- App Search-->
                    <form class="app-search d-none d-lg-block">
                        <div class="position-relative">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="bx bx-search-alt"></span>
                        </div>
                    </form>

                </div>

                <div class="d-flex">

                    <div class="dropdown d-inline-block d-lg-none ms-2">
                        <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="mdi mdi-magnify"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-search-dropdown">

                            <form class="p-3">
                                <div class="form-group m-0">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>



                    <div class="dropdown d-none d-lg-inline-block ms-1">
                        <button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="fullscreen">
                            <i class="bx bx-fullscreen"></i>
                        </button>
                    </div>

                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item noti-icon waves-effect"
                    id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <i class="bx bx-bell bx-tada"></i>
                    <span class="badge bg-danger rounded-pill" id="badge-id">
                        @php
                        $id = Session::get('EmployeeID');
                        $data = DB::table('v_notice')
                            ->select(DB::raw("count(*) as Total"))
                            ->where('EmployeeID',$id)
                            ->where('Status',0)
                            ->get();
                        @endphp
                        {{$data[0]->Total}}

                    </span>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                    aria-labelledby="page-header-notifications-dropdown">
                    <div class="p-3">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="m-0" key="t-notifications"> Notifications </h6>
                            </div>
                            <div class="col-auto">
                                <a href="#!" class="small" key="t-view-all"> View All</a>
                            </div>
                        </div>
                    </div>
                    <div data-simplebar style="max-height: 430px;">
                        <table class="notification-table">
                            <tbody class="notification-table-body"></tbody>
                        </table>
                    </div>
                </div>
            </div>

                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="rounded-circle header-profile-user" src="{{asset('employee_pictures')}}/{{Session::get('Picture')}}" alt="Header Avatar">
                            <span class="d-none d-xl-inline-block ms-1" key="t-henry">{{Session::get('FullName')}}</span>
                            <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <a class="dropdown-item" href=""><i class="bx bx-user font-size-16 align-middle me-1"></i> <span key="t-profile">Profile</span></a>
                            <!-- <a class="dropdown-item" href="#"><i class="bx bx-wallet font-size-16 align-middle me-1"></i> <span key="t-my-wallet">My Wallet</span></a> -->
                            <!-- <a class="dropdown-item d-block" href="#"><span class="badge bg-success float-end">11</span><i class="bx bx-wrench font-size-16 align-middle me-1"></i> <span key="t-settings">Settings</span></a> -->
                            <a class="dropdown-item" href="#"><i class="bx bx-lock-open font-size-16 align-middle me-1"></i> <span key="t-lock-screen">Lock screen</span></a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-danger" href="{{route('auth.logout')}}"><i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span key="t-logout">Logout</span></a>
                        </div>
                    </div>



                </div>
            </div>
        </header>




        <!-- Static Backdrop Modal -->
<div class="modal fade" id="notification-update-modal"  tabindex="-1" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="notification-update-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title new-title" id="notification-update-modalLabel"></h5>
                <h5 style="display: none;" class="modal-title new-id" id="new-id"></h5>
               
            </div>
            <div class="modal-body">
                <p class="mb-0 new-description"></p>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-light notification-understood" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


        <!-- ========== Left Sidebar Start ========== -->
        <div class="vertical-menu">

            <div data-simplebar class="h-100">

                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu list-unstyled" id="side-menu">
                        <li class="menu-title" key="t-menu">Menu</li>

                        <li>
                            <a href="{{route('dashboard')}}" class="waves-effect">
                                <i class="bx bx-home-circle"></i><span class="badge rounded-pill bg-info float-end"></span>
                                <span key="t-dashboards">Dashboards</span>
                            </a>

                        </li>


                        <li>
                            <a href="{{ route('showemployee') }}" class="waves-effect">
                                <i class="bx bxs-user-detail"></i><span class="badge rounded-pill bg-info float-end"></span>
                                <span key="t-dashboards">Employee</span>
                            </a>

                        </li>

                        <li>
                            <a href="{{ route('departreports')}}" class=" waves-effect">
                                <i class="bx bx-layout"></i>
                                <span key="t-layouts">Reports</span>
                            </a>

                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="bx bx-task"></i>
                                <span key="t-crypto">Invoice</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{ route('saleinvoice') }}" key="t-wallet">Item</a></li>
                                <li><a href="{{ route('serviceSaleInvoice') }}" key="t-buy">Service</a></li>
                                
                                
                            </ul>
                        </li>
                        <li>
                                <a href="{{ route('showproducts') }}" class="waves-effect">
                                    <i class="bx bx-file"></i>
                                    <span class="badge rounded-pill bg-success float-end" key="t-new"></span>
                                    <span key="t-file-manager">Products</span>
                                </a>
                        </li>
                         <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="bx bx-layout"></i>
                                <span key="t-layouts">Other</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li>
                                <li><a href="{{ route('departments') }}" key="t-light-sidebar">Departments</a></li>
                                <li><a href="{{ route('educationlevels') }}" key="t-compact-sidebar">Education Levels</a></li>
                                <li><a href="{{ route('stafftype') }}" key="t-boxed-width">Staff Type</a></li>
                                <li><a href="{{ route('title') }}" key="t-preloader">Title</a></li>
                                <li><a href="{{ url('/Job_Title')}}" key="t-default">Job Title</a></li>
                                <li><a href="{{ url('/Leave_Status')}}" key="t-saas">Leave Status</a></li>
                                <li><a href="{{ url('/LeaveType')}}" key="t-saas">Leave Type</a></li>
                                <li><a href="{{route('allownces')}}" key="t-saas">Allowance</a></li>
                                <!-- <li><a href="{{route('PettyCash')}}" key="t-saas">Petty Cash</a></li> -->
                                <li><a href="{{ url('/letter')}}" key="t-blog">Letter</a></li>
                                <!-- <li><a href="{{ url('/Item') }}" key="t-blog">Item</a></li> -->
                                <!-- <li><a href="{{ url('/Voucher') }}" key="t-blog">Voucher</a></li>
                                <li><a href="{{ url('/JournalVoucher') }}" key="t-blog">Journal Voucher</a></li> -->
                        </li>

                    </ul>
                    </li>
                   

                            <li>
                                <a href="{{URL('chartofaccount')}}" class="waves-effect">
                                    <i class="mdi mdi-cash-register"></i>
                                    <span key="t-calendar">Chart Of Account</span>
                                </a>
                            </li>

                        <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class='bx bxs-note'></i>
                                    <span key="t-ecommerce">Notice Board</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{URL('/addNewNotice')}}" key="t-products">Add New Notice</a></li>
                                    <li><a href="{{URL('datatable')}}" key="t-products">View All Notices</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="{{URL('supplierCreate')}}" class=" waves-effect">
                                    <i class="mdi mdi-rv-truck"></i>
                                    <span key="t-calendar">Supplier</span>
                                </a>
                            </li> 

                            <li>
                                <a href="{{URL('customerCreate')}}" class="waves-effect">
                                    <i class="mdi mdi-account-cash"></i>
                                    <span key="t-calendar">Customer</span>
                                </a>
                            </li> 

                            <!-- <li>
                                <a href="{{URL('userCreate')}}" class="waves-effect">
                                    <i class="mdi mdi-account-plus"></i>
                                    <span key="t-calendar">User</span>
                                </a>
                            </li> 
                            <li>
                                <a href="{{URL('/logout')}}" class="waves-effect">
                                    <i class="bx bx-power-off"></i>
                                    <span key="t-calendar">Logout</span>
                                </a>
                            </li> -->
                    </ul>
                </div>
                <!-- Sidebar -->
            </div>
        </div>
        <!-- Left Sidebar End -->



        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        @yield('content')
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- JAVASCRIPT -->









    <script src="{{asset('assets/libs/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/libs/metismenu/metisMenu.min.js')}}"></script>
    <script src="{{asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{asset('assets/libs/node-waves/waves.min.js')}}"></script>

    <script src="{{asset('assets/libs/select2/js/select2.min.js')}}"></script>
    <script src="{{asset('assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('assets/libs/spectrum-colorpicker2/spectrum.min.js')}}"></script>
    <script src="{{asset('assets/libs/bootstrap-timepicker/js/bootstrap-timepicker.min.js')}}"></script>
    <script src="{{asset('assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js')}}"></script>
    <script src="{{asset('assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js')}}"></script>
    <script src="{{asset('assets/libs/%40chenfengyuan/datepicker/datepicker.min.js')}}"></script>

    <!-- Sweet Alerts js -->
    <script src="{{asset('assets/libs/sweetalert2/sweetalert2.min.js')}}"></script>

    <!-- Sweet alert init js-->
    <script src="{{asset('assets/js/pages/sweet-alerts.init.js')}}"></script>


    <!-- form advanced init -->
    <script src="{{asset('assets/js/pages/form-advanced.init.js')}}"></script>

    <!-- apexcharts -->
    <script src="{{asset('assets/libs/apexcharts/apexcharts.min.js')}}"></script>

    <!-- dashboard init -->
    <script src="{{asset('assets/js/pages/dashboard.init.js')}}"></script>

    <!-- App js -->


    <script src="{{ asset('assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>

    <script src="{{ asset('assets/libs/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/libs/spectrum-colorpicker2/spectrum.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
    <script src="{{ asset('assets/libs/%40chenfengyuan/datepicker/datepicker.min.js') }}"></script>

    <!-- form advanced init -->
    <script src="{{ asset('assets/js/pages/form-advanced.init.js') }}"></script>

    <!-- Required datatable js -->
    <script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <!-- Buttons examples -->
    <script src="{{ asset('assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>

    <script src="{{ asset('assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/libs/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/libs/pdfmake/build/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>

    <!-- Responsive examples -->
    <script src="{{ asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>

    <!-- Datatable init js -->
    <script src="{{ asset('assets/js/pages/datatables.init.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>

<script>
   $(document).ready(function () {
    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).on( 'click', '.get-notice-id', function (e) {
        e.preventDefault();
        var data_id = $(this).attr("data-id");
        $.ajax({
            type: "GET",
            url: "getRelatedNotice/"+data_id,
            dataType: "json",
            contentType:false,
            success: function (response) {
            const Id = document.getElementsByClassName("new-id");
            const Title = document.getElementsByClassName("new-title");
            const Desc = document.getElementsByClassName("new-description");
            Id[0].innerHTML= response.notice[0].NoticeID;
            Title[0].innerHTML= response.notice[0].Title;
            Desc[0].innerHTML= response.notice[0].Description;
        }
    });
});

    fetch_notifications();
   
    function fetch_notifications() {
            $.ajax({
                type: 'GET',
                // url:{{URL('/fetch_notifications')}},
                url:'fetch_notifications',
                dataType: 'json',
                contentType: false,
                processData:false, //this is a must
                success: function(response){ 
                    <?php
                        $data[0]->Total  = ($data[0]->Total >3 ) ? 3 : $data[0]->Total ;
                    ?>
                        for(var i=0; i<{{$data[0]->Total}}; i++){ 

                        $(".notification-table-body").append('<tr>\
                            <td style="width: 430px; padding-left: 10px; padding-right: 10px;">\
                            <a href="javascript:void(0)" class="text-reset notification-item get-notice-id" data-id='+response.data[i].NoticeID+' data-bs-toggle="modal" data-bs-target="#notification-update-modal">\
                                        <div class="d-flex">\
                                            <div class="avatar-xs me-3">\
                                                <span class="avatar-title bg-primary rounded-circle font-size-16">\
                                                    <i class="bx bx-badge-check"></i>\
                                                </span>\
                                            </div>\
                                            <div class="flex-grow-1">\
                                                <h6 class="mb-1" key="t-your-order">'+response.data[i].Title+'</h6>\
                                                <div class="font-size-12 text-muted">\
                                                    <p class="mb-0"><i class="mdi mdi-clock-outline">\
                                                        </i> <span key="t-min-ago">'+response.data[i].eDate+'</span></p>\
                                                </div>\
                                            </div>\
                                        </div>\
                                    </a>\
                                    <hr>\
                                    </td>\
                                    </tr>'
                        ); 
                    }
                }
            });
        }
    });

        $(document).on('click','.notification-understood', function (e) {
            e.preventDefault();
            var new_id = document.getElementById("new-id").innerText;
            $.ajax({
                type: "GET",
                url: "updateNoticeStatus/"+new_id,
                dataType: "json",
                success: function (response) {
                 $("#badge-id").html(response.tot);   
                }
            });
        });

</script>


</body>
<!-- Mirrored from themesbrand.com/skote/layouts/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 16 Nov 2021 10:16:57 GMT -->

</html>