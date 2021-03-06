<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <!-- <li class="menu-title" key="t-menu">Menu</li> -->
                <li>
                    <a href="{{route('dashboard')}}" class="waves-effect">
                        <i class="bx bx-home-circle"></i><span class="badge rounded-pill bg-info float-end"></span>
                        <span key="t-dashboards">Dashboards</span>
                    </a>
                </li>
                <li>
                                <a href="{{URL('/PosTerminal')}}" class="waves-effect">
                                    <i class="mdi mdi-cash-register"></i>
                                    <span key="t-dashboards">Sales POS</span>
                                </a>
                            </li>
                <li>
                    <a href="{{ route('showemployee') }}" class="waves-effect">
                        <i class="bx bxs-user-detail"></i><span class="badge rounded-pill bg-info float-end"></span>
                        <span key="t-dashboards">Employee</span>
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
                            <li><a href="{{ url('/letter')}}" key="t-blog">Letter</a></li>
                            <!-- <li><a href="{{ url('/Item') }}" key="t-blog">Item</a></li> -->
                            <!-- <li><a href="{{ url('/Voucher') }}" key="t-blog">Voucher</a></li>
                            <li><a href="{{ url('/JournalVoucher') }}" key="t-blog">Journal Voucher</a></li> -->
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-layout"></i>
                        <span key="t-layouts">Shah It Institute</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li>
                            <li><a href="{{ route('students') }}" key="t-light-sidebar">Students</a></li>
                            <li><a href="{{ route('courses')}}" key="t-blog">Courses</a></li>
                        </li>
                    </ul>
                </li>
                <li>
                        <a href="{{ route('departreports')}}" class=" waves-effect">
                            <i class="bx bx-layout"></i>
                            <span key="t-layouts">Reports</span>
                        </a>
                     
                    </li>
                
                <li>
                    <a href="{{URL('chartofaccount')}}" class="waves-effect">
                        <i class="mdi mdi-chart-box-outline"></i>
                        <span key="t-calendar">Chart Of Account</span>
                    </a>
                </li>
                <li>
                    <a href="{{URL('/uploadedNotices')}}" key="t-products">
                        <i class='bx bxs-note'></i>
                        <span key="t-ecommerce">Notice Board</span>
                    </a>
                    <!--  <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{URL('/addNewNotice')}}" key="t-products">Add New Notice</a></li>
                        <li><a href="{{URL('datatable')}}" key="t-products">View All Notices</a></li>
                    </ul> -->
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
                <hr>
                <li>
                        <a href="{{URL('/ViewAllFiles')}}" class="waves-effect">
                            <i class="bx bx-home-circle"></i><span class="badge rounded-pill bg-info float-end"></span>
                            <span key="t-dashboard">View Files</span>
                        </a>
                       
                    </li>


                    <li>
                        <a href="{{URL('/kanbanTaskBoard')}}" class="waves-effect">
                            <i class="bx bx-home-circle"></i><span class="badge rounded-pill bg-info float-end"></span>
                            <span key="t-dashboard">Kanban Board</span>
                        </a>
                       
                    </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>