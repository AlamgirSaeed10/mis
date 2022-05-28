<div class="col-xl-3  col-lg-3 col-md-3">
    <div class="card">
        <div class="card-body p-4">

            <ul class="list-unstyled categories-list">
                <li>
                    <a href="{{ URL('/dashboard')}}" class="text-body d-flex align-items-center">
                        <i class="mdi mdi-speedometer-slow font-size-16 text-muted me-2"></i> <span
                            class="me-auto">Dashboard</span>
                    </a>
                </li>



                <li>
                    <a href=" {{ url('/documents')}}/{{$employee[0]->EmployeeID}}" class="text-body d-flex align-items-center">
                        <i class="mdi mdi-folder font-size-16 text-warning me-2"></i> <span
                            class="me-auto">Documents</span>
                    </a>
                </li>
                <li>
                    <a href=" {{ url('/salary')}}/{{$employee[0]->EmployeeID}}" class="text-body d-flex align-items-center">
                        <i class="mdi mdi-bank font-size-16 text-muted me-2"></i> <span
                            class="me-auto">Salary</span>
                    </a>
                </li>

                <li>
                    <a href="{{ url('/employeeloan')}}/{{$employee[0]->EmployeeID}}" class="text-body d-flex align-items-center">
                        <i class="mdi mdi-account-cash font-size-20 text-muted me-2"></i> <span
                            class="me-auto">Advance / Loan</span>
                    </a>
                </li>

                <li>
                    <a href="{{ url('/employeeletter')}}/{{$employee[0]->EmployeeID}}" class="text-body d-flex align-items-center">
                        <i class="mdi mdi-file-document font-size-18 me-2 text-muted "></i> <span
                            class="me-auto">Letter</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/employeeleaves')}}/{{$employee[0]->EmployeeID}}" class="text-body d-flex align-items-center">
                        <i
                            class="mdi mdi-calendar-cursor
                                  font-size-16 me-2"></i>
                        <span class="me-auto">Leave</span> 
                        <!-- <i class="mdi mdi-circle-medium text-danger ms-2"></i> -->
                    </a>
                </li>
<!--                
                <li>
                    <a href="" class="text-body d-flex align-items-center">
                        <i
                            class="bx bxs-error-circle

                                      text-muted font-size-18 me-2"></i>
                        <span class="me-auto">Warnings</span>
                    </a>
                </li> -->
                {{-- <li>
                    <a href="" class="text-body d-flex align-items-center">
                        <i
                            class="fas fa-money-bill-alt
                                      font-size-16 text-muted me-2"></i>
                        <span class="me-auto">Deposit</span>
                    </a>
                </li> --}}
{{-- 
                <li>
                    <a href="{{ url('/salary')}}/email" class="text-body d-flex align-items-center">
                        <i
                            class="mdi mdi-account-supervisor-circle
                                      font-size-18 text-muted me-2"></i>
                        <span class="me-auto">Mail Sent</span>
                    </a>
                </li>

                <li>
                    <a href="" class="text-body d-flex align-items-center">
                        <i
                            class="mdi mdi-account-supervisor-circle
                                  font-size-18 text-muted me-2"></i>
                        <span class="me-auto">Salary Slip</span>
                    </a>
                </li> --}}
                <!--   <li>
                                            <a href="javascript: void(0);" class="text-body d-flex align-items-center">
                                                <i class="mdi mdi-cog text-muted font-size-16 me-2"></i> <span class="me-auto">Setting</span><span class="badge bg-success rounded-pill ms-2">01</span>
                                            </a>
                                        </li> -->
            </ul>



        </div>
    </div>
    <!-- end card -->
</div>