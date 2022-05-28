<div class="col-xl-3 col-md-3">
    <div class="card">
        <div class="card-body p-4">

            <ul class="list-unstyled categories-list">
                <li>
                    <a href="{{ url('/employeeprofile')}}" class="text-body d-flex align-items-center">
                        <i class="mdi mdi-speedometer-slow font-size-16 text-muted me-2"></i> <span
                            class="me-auto">Dashboard</span>
                    </a>
                </li>



                <li>
                    <a href="{{ route('employeedocuments') }}" class="text-body d-flex align-items-center">
                        <i class="mdi mdi-folder font-size-16 text-warning me-2"></i> <span
                            class="me-auto">Documents</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/employeesalary')}}" class="text-body d-flex align-items-center">
                        <i class="mdi mdi-bank font-size-16 text-muted me-2"></i> <span
                            class="me-auto">Salary</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('Employeeloan') }}" class="text-body d-flex align-items-center">
                        <i class="mdi mdi-account-cash font-size-20 text-muted me-2"></i> <span
                            class="me-auto">Advance / Loan</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('issuedletter') }}" class="text-body d-flex align-items-center">
                        <i class="mdi mdi-file-document font-size-18 me-2 text-muted "></i> <span
                            class="me-auto">Letter</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('employeeleave')}}" class="text-body d-flex align-items-center">
                        <i
                            class="mdi mdi-calendar-cursor
                                  font-size-16 me-2"></i>
                        <span class="me-auto">Leave</span> 
                    </a>
                </li>
               
                {{-- <li>
                    <a href="{{ url('/EmployeeWarningLetter')}}" class="text-body d-flex align-items-center">
                        <i
                            class="bx bxs-error-circle

                                      text-muted font-size-18 me-2"></i>
                        <span class="me-auto">Warnings</span>
                    </a>
                </li> --}}
                {{-- <li>
                    <a href="" class="text-body d-flex align-items-center">
                        <i
                            class="fas fa-money-bill-alt
                                      font-size-16 text-muted me-2"></i>
                        <span class="me-auto">Deposit</span>
                    </a>
                </li> --}}

                {{-- <li>
                    <a href="/email" class="text-body d-flex align-items-center">
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