<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="d-flex">
                            <div class="flex-shrink-0 me-3">
                                @if ($student[0]->StudentPicture == null)
                                    <td> No Image </td>
                                @else
                                    <img src="{{ asset('studentpictures') }}/{{ $student[0]->StudentPicture }}"
                                        alt="" class="avatar-md rounded-circle img-thumbnail">
                                @endif
                            </div>
                            <div class="flex-grow-1 align-self-center">
                                <div class="text-muted">
                                    <!-- <p class="mb-2">Welcome to Shah ERP System</p> -->
                                    <h5 class="mb-1">{{ $student[0]->StudentFullName }}</h5>
                                   
                                    <p class="mb-0">{{ $student[0]->CourseName }} <br> ( {{ $student[0]->CourseDuration }} )</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="dropdown">
                    <button class="btn btn-light btn-sm dropdown-toggle" type="button" style="float:right;margin-top:-70px;" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="bx bxs-cog align-middle me-1"></i> Manage
                    </button>
                    <div class="dropdown-menu dropdown-menu-end" style="margin: 0px;">
                        <a class="dropdown-item" href="/studentfee/{{$student[0]->StudentID}}"><i class="mdi mdi-pencil text-secondary font-size-16 me-2"></i>Add Fee</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
