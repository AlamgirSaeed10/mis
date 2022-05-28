<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="d-flex">
                            <div class="flex-shrink-0 me-3">
                                @if ($employee[0]->Picture == null)
                                    <td> No Image </td>
                                @else
                                    <img src="{{ asset('employee_pictures') }}/{{ $employee[0]->Picture }}"
                                        alt="" class="avatar-md rounded-circle img-thumbnail">
                                @endif
                            </div>
                            <div class="flex-grow-1 align-self-center">
                                <div class="text-muted">
                                    <!-- <p class="mb-2">Welcome to Shah ERP System</p> -->
                                    <h5 class="mb-1">{{ $employee[0]->FirstName }}
                                        {{ $employee[0]->LastName }}</h5>
                                   
                                    <p class="mb-0">{{ $employee[0]->DepartmentName }}</p>
                                    <p class="mb-0">{{ $employee[0]->JobTitleName }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
