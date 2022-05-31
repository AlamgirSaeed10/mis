<div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li>
                                <a href="{{URL('/dashboard')}}" class="waves-effect">
                                    <i class="bx bx-home-circle"></i>
                                    <span key="t-dashboards">Dashboards</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{URL('chartofaccount')}}" class="waves-effect">
                                    <i class="mdi mdi-cash-register"></i>
                                    <span key="t-calendar">Chart Of Account</span>
                                </a>
                            </li>

                             <li>
                                <a href="{{URL('test')}}" class="waves-effect">
                                    <i class="bx bxs-user-plus"></i>
                                    <span key="t-calendar">Test</span>
                                </a>
                            </li> 

                            <li>
                               <a href="{{URL('/uploadedNotices')}}" key="t-products">
                                    <i class='bx bxs-note'></i>
                                    <span key="t-ecommerce">Notice Board</span>
                                </a>
                                <!-- <ul class="sub-menu" aria-expanded="false">
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
                            <li>
                                <a href="{{URL('/logout')}}" class="waves-effect">
                                    <i class="bx bx-power-off"></i>
                                    <span key="t-calendar">Logout</span>
                                </a>
                            </li>



                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>