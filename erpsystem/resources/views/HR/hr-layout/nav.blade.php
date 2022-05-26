<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 col-md-5 col-lg-6">
                        <div class="d-flex">
                            <div class="flex-shrink-0 me-3">
                                @if ($employee[0]->Picture == null)
                                    <td> No Image </td>
                                @else
                                    <img src="{{ asset('employee_pictures') }}/{{ $employee[0]->Picture }}"
                                        alt="Employee picture" class="avatar-md rounded-circle img-thumbnail">
                                @endif
                            </div>
                            <div class="align-self-center">
                                <div class="text-muted">
                                    <!-- <p class="mb-2">Welcome to Shah ERP System</p> -->
                                    <h5 class="mb-1">{{ $employee[0]->FirstName }} {{ $employee[0]->LastName }}</h5>
                                   
                                    <p class="mb-0">{{ $employee[0]->DepartmentName }}</p>
                                    <p class="mb-0">{{ $employee[0]->JobTitleName }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="dropdown ms-2">
                    <button class="btn btn-info btn-sm dropdown-toggle" type="button" style="float:right;margin-top:-70px;" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="bx bxs-cog align-middle me-1"></i> Manage
                    </button>
                    <div class="dropdown-menu dropdown-menu-end" style="margin: 0px;">
                        <a class="dropdown-item" href=" {{ url ('/editemployee')}}/{{$employee[0]->EmployeeID}}"><i class="mdi mdi-pencil text-secondary font-size-16 me-2"></i>Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
