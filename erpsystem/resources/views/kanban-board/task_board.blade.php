@extends('template.main_tmp')
@section('title', 'Dashboard')
@section('content')
<div class="main-content">
	<div class="page-content">
			<!-- display error -->
			@if (session('error'))
			<div class="alert alert-danger p-3" id="error-alert">
				{{ Session::get('error') }}
			</div>
			@endif
			@if (session('success'))
			<div class="alert alert-success p-3" id="success-alert">
				{{ Session::get('success') }}
			</div>
			@endif
			@if (count($errors) > 0)
			<div class="card-body ">
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
		<div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Kanban Board</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Tasks</a></li>
                                            <li class="breadcrumb-item active">Kanban Board</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="dropdown float-end">
                                            <a href="#" class="dropdown-toggle arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical m-0 text-muted h5"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="#">Edit</a>
                                                <a class="dropdown-item" href="#">Delete</a>
                                            </div>
                                        </div> <!-- end dropdown -->
        
                                        <h4 class="card-title mb-4">Upcoming</h4>
                                        <div id="task-1">
                                            <div id="upcoming-task" class="pb-1 task-list">

                                                
                                                <!-- end task card -->

                                                
                                                <!-- end task card -->

                                                
                                                <!-- end task card -->

                                            <div class="card task-box" id="uptask-3">
                                                    <div class="card-body">
                                                        <div class="dropdown float-end">
                                                            <a href="#" class="dropdown-toggle arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="mdi mdi-dots-vertical m-0 text-muted h5"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <a class="dropdown-item edittask-details" href="#" id="taskedit" data-id="#uptask-3" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg">Edit</a>
                                                                <a class="dropdown-item deletetask" href="#" data-id="#uptask-3">Delete</a>
                                                            </div>
                                                        </div> <!-- end dropdown -->
                                                        <div class="float-end ms-2">
                                                            <span class="badge rounded-pill badge-soft-secondary font-size-12" id="task-status">Waiting</span>
                                                        </div>
                                                        <div>
                                                            <h5 class="font-size-15"><a href="javascript: void(0);" class="text-dark" id="task-name">Create a Skote Logo</a></h5>
                                                            <p class="text-muted mb-4">15 Oct, 2019</p>
                                                        </div>

                                                        <div class="avatar-group float-start task-assigne">
                                                            <div class="avatar-group-item">
                                                                <a href="javascript: void(0);" class="d-inline-block" value="member-4">
                                                                    <img src="assets/images/users/avatar-4.jpg" alt="" class="rounded-circle avatar-xs">
                                                                </a>
                                                            </div>
                                                            <div class="avatar-group-item">
                                                                <a href="javascript: void(0);" class="d-inline-block" value="member-5">
                                                                    <img src="assets/images/users/avatar-5.jpg" alt="" class="rounded-circle avatar-xs">
                                                                </a>
                                                            </div>
                                                            <div class="avatar-group-item">
                                                                <a href="javascript: void(0);" class="d-inline-block">
                                                                    <div class="avatar-xs">
                                                                        <span class="avatar-title rounded-circle bg-danger text-white font-size-16">
                                                                            9+
                                                                        </span>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>

                                                        <div class="text-end">
                                                            <h5 class="font-size-15 mb-1" id="task-budget">$ 86</h5>
                                                            <p class="mb-0 text-muted">Budget</p>
                                                        </div>
                                                    </div>
                                                    
                                                </div><div class="card task-box" id="aHKhH"><div class="card-body"><div class="dropdown float-end"><a href="#" class="dropdown-toggle arrow-none" data-bs-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical m-0 text-muted h5"></i></a><div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item edittask-details" href="#" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg" data-id="#aHKhH">Edit</a><a class="dropdown-item deletetask" href="#" data-id="#aHKhH">Delete</a></div></div><div class="float-end ms-2"><span class="badge rounded-pill font-size-12 badge-soft-primary" id="task-status">Approved</span></div><div><h5 class="font-size-15"><a href="javascript: void(0);" class="text-dark" id="task-name">ggggg</a></h5><p class="text-muted mb-4" id="task-date">1 Jul, 2022</p></div><ul class="ps-3 mb-4 text-muted" id="task-desc"><li class="py-1">gg</li></ul><div class="avatar-group float-start task-assigne"><div class="avatar-group-item"><a href="#" class="d-inline-block" value="member-1"><img src="assets/images/users/avatar-1.jpg" class="rounded-circle avatar-xs" alt=""></a></div><div class="avatar-group-item"><a href="#" class="d-inline-block" value="member-2"><img src="assets/images/users/avatar-2.jpg" class="rounded-circle avatar-xs" alt=""></a></div><div class="avatar-group-item"><a href="#" class="d-inline-block" value="member-3"><img src="assets/images/users/avatar-3.jpg" class="rounded-circle avatar-xs" alt=""></a></div><div class="avatar-group-item"><a href="#" class="d-inline-block" value="member-4"><img src="assets/images/users/avatar-4.jpg" class="rounded-circle avatar-xs" alt=""></a></div><div class="avatar-group-item"><a href="#" class="d-inline-block" value="member-5"><img src="assets/images/users/avatar-5.jpg" class="rounded-circle avatar-xs" alt=""></a></div><div class="avatar-group-item"><a href="#" class="d-inline-block" value="member-6"><img src="assets/images/users/avatar-6.jpg" class="rounded-circle avatar-xs" alt=""></a></div><div class="avatar-group-item"><a href="#" class="d-inline-block" value="member-7"><img src="assets/images/users/avatar-7.jpg" class="rounded-circle avatar-xs" alt=""></a></div><div class="avatar-group-item"><a href="#" class="d-inline-block" value="member-8"><img src="assets/images/users/avatar-8.jpg" class="rounded-circle avatar-xs" alt=""></a></div></div><div class="text-end"><h5 class="font-size-15 mb-1" id="task-budget">$ 15000</h5><p class="mb-0 text-muted">Budget</p></div></div></div></div>

                                            <div class="text-center d-grid">
                                                <a href="javascript: void(0);" class="btn btn-primary waves-effect waves-light addtask-btn" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg" data-id="#upcoming-task"><i class="mdi mdi-plus me-1"></i> Add New</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->

                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="dropdown float-end">
                                            <a href="#" class="dropdown-toggle arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical m-0 text-muted h5"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="#">Edit</a>
                                                <a class="dropdown-item" href="#">Delete</a>
                                            </div>
                                        </div> <!-- end dropdown -->
        
                                        <h4 class="card-title mb-4">In Progress</h4>
                                        <div id="task-2">
                                            <div id="inprogress-task" class="pb-1 task-list">
                                                <div class="card task-box" id="uptask-1">
                                                    <div class="card-body">
                                                        <div class="dropdown float-end">
                                                            <a href="#" class="dropdown-toggle arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="mdi mdi-dots-vertical m-0 text-muted h5"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <a class="dropdown-item edittask-details" href="#" id="taskedit" data-id="#uptask-1" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg">Edit</a>
                                                                <a class="dropdown-item deletetask" href="#" data-id="#uptask-1">Delete</a>
                                                            </div>
                                                        </div> <!-- end dropdown -->
                                                        <div class="float-end ms-2">
                                                            <span class="badge rounded-pill badge-soft-secondary font-size-12" id="task-status">Waiting</span>
                                                        </div>
                                                        <div>
                                                            <h5 class="font-size-15"><a href="javascript: void(0);" class="text-dark" id="task-name">Topnav layout design</a></h5>
                                                            <p class="text-muted mb-4">14 Oct, 2019</p>
                                                        </div>
                                                        <div class="avatar-group float-start task-assigne">
                                                            <div class="avatar-group-item">
                                                                <a href="javascript: void(0);" class="d-inline-block" value="member-4">
                                                                    <img src="assets/images/users/avatar-4.jpg" alt="" class="rounded-circle avatar-xs">
                                                                </a>
                                                            </div>
                                                            <div class="avatar-group-item">
                                                                <a href="javascript: void(0);" class="d-inline-block" value="member-5">
                                                                    <img src="assets/images/users/avatar-5.jpg" alt="" class="rounded-circle avatar-xs">
                                                                </a>
                                                            </div>
                                                            <div class="avatar-group-item">
                                                                <a href="javascript: void(0);" class="d-inline-block" value="member-6">
                                                                    <img src="assets/images/users/avatar-2.jpg" alt="" class="rounded-circle avatar-xs">
                                                                </a>
                                                            </div>
                                                            <div class="avatar-group-item">
                                                                <a href="javascript: void(0);" class="d-inline-block">
                                                                    <div class="avatar-xs">
                                                                        <span class="avatar-title rounded-circle bg-info text-white font-size-16">
                                                                            3+
                                                                        </span>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>

                                                        <div class="text-end">
                                                            <h5 class="font-size-15 mb-1" id="task-budget">$ 145</h5>
                                                            <p class="mb-0 text-muted">Budget</p>
                                                        </div>
                                                    </div>
                                                    
                                                </div><div class="card task-box" id="uptask-2">
                                                    <div class="card-body">
                                                        <div class="dropdown float-end">
                                                            <a href="#" class="dropdown-toggle arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="mdi mdi-dots-vertical m-0 text-muted h5"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <a class="dropdown-item edittask-details" href="#" id="taskedit" data-id="#uptask-2" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg">Edit</a>
                                                                <a class="dropdown-item deletetask" href="#" data-id="#uptask-2">Delete</a>
                                                            </div>
                                                        </div> <!-- end dropdown -->
                                                        <div class="float-end ms-2">
                                                            <span class="badge rounded-pill badge-soft-primary font-size-12" id="task-status">Approved</span>
                                                        </div>
                                                        <div>
                                                            <h5 class="font-size-15"><a href="javascript: void(0);" class="text-dark" id="task-name">Create a New Landing UI</a></h5>
                                                            <p class="text-muted">15 Oct, 2019</p>
                                                        </div>
                                                        
                                                        <ul class="ps-3 mb-4 text-muted" id="task-desc">
                                                            <li class="py-1">Separate existence is a myth.</li>
                                                            <li class="py-1">For music, sport, etc</li>
                                                        </ul>
                                                        
                                                        <div class="avatar-group float-start task-assigne">
                                                            <div class="avatar-group-item">
                                                                <a href="javascript: void(0);" class="d-inline-block" value="member-1">
                                                                    <img src="assets/images/users/avatar-1.jpg" alt="" class="rounded-circle avatar-xs">
                                                                </a>
                                                            </div>
                                                            <div class="avatar-group-item">
                                                                <a href="javascript: void(0);" class="d-inline-block" value="member-2">
                                                                    <img src="assets/images/users/avatar-2.jpg" alt="" class="rounded-circle avatar-xs">
                                                                </a>
                                                            </div>
                                                            <div class="avatar-group-item">
                                                                <a href="javascript: void(0);" class="d-inline-block" value="member-5">
                                                                    <img src="assets/images/users/avatar-5.jpg" alt="" class="rounded-circle avatar-xs">
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="text-end">
                                                            <h5 class="font-size-15 mb-1" id="task-budget">$ 112</h5>
                                                            <p class="mb-0 text-muted">Budget</p>
                                                        </div>
                                                    </div>
                                                    
                                                </div><div class="card task-box" id="intask-1">
                                                    <div class="card-body">
                                                        <div class="dropdown float-end">
                                                            <a href="#" class="dropdown-toggle arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="mdi mdi-dots-vertical m-0 text-muted h5"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <a class="dropdown-item edittask-details" href="#" id="taskedit" data-id="#intask-1" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg">Edit</a>
                                                                <a class="dropdown-item deletetask" href="#" data-id="#intask-1">Delete</a>
                                                            </div>
                                                        </div> <!-- end dropdown -->
                                                        <div class="float-end ms-2">
                                                            <span class="badge rounded-pill badge-soft-success font-size-12" id="task-status">Complete</span>
                                                        </div>
                                                        <div>
                                                            <h5 class="font-size-15"><a href="javascript: void(0);" class="text-dark" id="task-name">Brand logo design</a></h5>
                                                            <p class="text-muted">12 Oct, 2019</p>
                                                        </div>
            
                                                        <ul class="list-inine ps-0 mb-4">
                                                            <li class="list-inline-item">
                                                                <a href="javascript: void(0);">
                                                                    <div class="border rounded avatar-sm">
                                                                        <span class="avatar-title bg-transparent">
                                                                            <img src="assets/images/companies/img-1.png" alt="" class="avatar-xs">
                                                                        </span>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <a href="javascript: void(0);">
                                                                    <div class="border rounded avatar-sm">
                                                                        <span class="avatar-title bg-transparent">
                                                                            <img src="assets/images/companies/img-2.png" alt="" class="avatar-xs">
                                                                        </span>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <a href="javascript: void(0);">
                                                                    <div class="border rounded avatar-sm">
                                                                        <span class="avatar-title bg-transparent">
                                                                            <img src="assets/images/companies/img-3.png" alt="" class="avatar-xs">
                                                                        </span>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                        </ul>

                                                        <div class="avatar-group float-start task-assigne">
                                                            <div class="avatar-group-item">
                                                                <a href="javascript: void(0);" class="d-inline-block" value="member-7">
                                                                    <img src="assets/images/users/avatar-7.jpg" alt="" class="rounded-circle avatar-xs">
                                                                </a>
                                                            </div>
                                                            <div class="avatar-group-item">
                                                                <a href="javascript: void(0);" class="d-inline-block" value="member-8">
                                                                    <img src="assets/images/users/avatar-8.jpg" alt="" class="rounded-circle avatar-xs">
                                                                </a>
                                                            </div>
                                                        </div>

                                                        <div class="text-end">
                                                            <h5 class="font-size-15 mb-1" id="task-budget">$ 132</h5>
                                                            <p class="mb-0 text-muted">Budget</p>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                <!-- end task card -->

                                                <div class="card task-box" id="intask-2">
                                                    <div class="card-body">
                                                        <div class="dropdown float-end">
                                                            <a href="#" class="dropdown-toggle arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="mdi mdi-dots-vertical m-0 text-muted h5"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <a class="dropdown-item edittask-details" href="#" id="taskedit" data-id="#intask-2" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg">Edit</a>
                                                                <a class="dropdown-item deletetask" href="#" data-id="#intask-2">Delete</a>
                                                            </div>
                                                        </div> <!-- end dropdown -->
                                                        <div class="float-end ms-2">
                                                            <span class="badge rounded-pill badge-soft-warning font-size-12" id="task-status">Pending</span>
                                                        </div>
                                                        <div>
                                                            <h5 class="font-size-15"><a href="javascript: void(0);" class="text-dark" id="task-name">Create a Blog Template UI</a></h5>
                                                            <p class="text-muted mb-4">13 Oct, 2019</p>
                                                        </div>
            
                                                        <div class="avatar-group float-start task-assigne">
                                                            <div class="avatar-group-item">
                                                                <a href="javascript: void(0);" class="d-inline-block" value="member-6">
                                                                    <img src="assets/images/users/avatar-6.jpg" alt="" class="rounded-circle avatar-xs">
                                                                </a>
                                                            </div>
                                                            <div class="avatar-group-item">
                                                                <a href="javascript: void(0);" class="d-inline-block" value="member-4">
                                                                    <img src="assets/images/users/avatar-4.jpg" alt="" class="rounded-circle avatar-xs">
                                                                </a>
                                                            </div>
                                                            <div class="avatar-group-item">
                                                                <a href="javascript: void(0);" class="d-inline-block" value="member-7">
                                                                    <img src="assets/images/users/avatar-7.jpg" alt="" class="rounded-circle avatar-xs">
                                                                </a>
                                                            </div>
                                                            <div class="avatar-group-item">
                                                                <a href="javascript: void(0);" class="d-inline-block">
                                                                    <div class="avatar-xs">
                                                                        <span class="avatar-title rounded-circle bg-info text-white font-size-16">
                                                                            3+
                                                                        </span>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>

                                                        <div class="text-end">
                                                            <h5 class="font-size-15 mb-1" id="task-budget">$ 103</h5>
                                                            <p class="mb-0 text-muted">Budget</p>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                <!-- end task card -->

                                                <div class="card task-box" id="intask-3">
                                                    <div class="card-body">
                                                        <div class="dropdown float-end">
                                                            <a href="#" class="dropdown-toggle arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="mdi mdi-dots-vertical m-0 text-muted h5"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <a class="dropdown-item edittask-details" href="#" id="taskedit" data-id="#intask-3" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg">Edit</a>
                                                                <a class="dropdown-item deletetask" href="#" data-id="#intask-3">Delete</a>
                                                            </div>
                                                        </div> <!-- end dropdown -->
                                                        <div class="float-end ms-2">
                                                            <span class="badge rounded-pill badge-soft-success font-size-12" id="task-status">Complete</span>
                                                        </div>
                                                        <div>
                                                            <h5 class="font-size-15"><a href="javascript: void(0);" class="text-dark" id="task-name">Skote Dashboard UI</a></h5>
                                                            <p class="text-muted mb-4">13 Oct, 2019</p>
                                                        </div>
            
                                                        <div class="avatar-group float-start task-assigne">
                                                            <div class="avatar-group-item">
                                                                <a href="javascript: void(0);" class="d-inline-block" value="member-4">
                                                                    <img src="assets/images/users/avatar-4.jpg" alt="" class="rounded-circle avatar-xs">
                                                                </a>
                                                            </div>
                                                            <div class="avatar-group-item">
                                                                <a href="javascript: void(0);" class="d-inline-block" value="member-5">
                                                                    <img src="assets/images/users/avatar-5.jpg" alt="" class="rounded-circle avatar-xs">
                                                                </a>
                                                            </div>
                                                            <div class="avatar-group-item">
                                                                <a href="javascript: void(0);" class="d-inline-block">
                                                                    <div class="avatar-xs">
                                                                        <span class="avatar-title rounded-circle bg-primary text-white font-size-16">
                                                                            7+
                                                                        </span>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>

                                                        <div class="text-end">
                                                            <h5 class="font-size-15 mb-1" id="task-budget">$ 94</h5>
                                                            <p class="mb-0 text-muted">Budget</p>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                <!-- end task card -->

                                            </div>

                                            <div class="text-center d-grid">
                                                <a href="javascript: void(0);" class="btn btn-primary waves-effect waves-light addtask-btn" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg" data-id="#inprogress-task"><i class="mdi mdi-plus me-1"></i> Add New</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->

                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="dropdown float-end">
                                            <a href="#" class="dropdown-toggle arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical m-0 text-muted h5"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="#">Edit</a>
                                                <a class="dropdown-item" href="#">Delete</a>
                                            </div>
                                        </div> <!-- end dropdown -->
        
                                        <h4 class="card-title mb-4">Completed</h4>
                                        <div id="task-3">
                                            <div id="complete-task" class="pb-1 task-list">
                                                <div class="card task-box" id="cmptask-1">
                                                    <div class="card-body">
                                                        <div class="dropdown float-end">
                                                            <a href="#" class="dropdown-toggle arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="mdi mdi-dots-vertical m-0 text-muted h5"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <a class="dropdown-item edittask-details" href="#" id="taskedit" data-id="#cmptask-1" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg">Edit</a>
                                                                <a class="dropdown-item deletetask" href="#" data-id="#cmptask-1">Delete</a>
                                                            </div>
                                                        </div> <!-- end dropdown -->
                                                        <div class="float-end ms-2">
                                                            <span class="badge rounded-pill badge-soft-success font-size-12" id="task-status">Complete</span>
                                                        </div>
                                                        <div>
                                                            <h5 class="font-size-15"><a href="javascript: void(0);" class="text-dark" id="task-name">Redesign - Landing page</a></h5>
                                                            <p class="text-muted mb-4">10 Oct, 2019</p>
                                                        </div>
            
                                                        <div class="avatar-group float-start task-assigne">
                                                            <div class="avatar-group-item">
                                                                <a href="javascript: void(0);" class="d-inline-block" value="member-1">
                                                                    <img src="assets/images/users/avatar-1.jpg" alt="" class="rounded-circle avatar-xs">
                                                                </a>
                                                            </div>
                                                            <div class="avatar-group-item">
                                                                <a href="javascript: void(0);" class="d-inline-block" value="member-2">
                                                                    <img src="assets/images/users/avatar-2.jpg" alt="" class="rounded-circle avatar-xs">
                                                                </a>
                                                            </div>
                                                            <div class="avatar-group-item">
                                                                <a href="javascript: void(0);" class="d-inline-block" value="member-3">
                                                                    <img src="assets/images/users/avatar-3.jpg" alt="" class="rounded-circle avatar-xs">
                                                                </a>
                                                            </div>
                                                        </div>

                                                        <div class="text-end">
                                                            <h5 class="font-size-15 mb-1" id="task-budget">$ 145</h5>
                                                            <p class="mb-0 text-muted">Budget</p>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                <!-- end task card -->

                                                <div class="card task-box" id="cmptask-2">
                                                    <div class="card-body">
                                                        <div class="dropdown float-end">
                                                            <a href="#" class="dropdown-toggle arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="mdi mdi-dots-vertical m-0 text-muted h5"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <a class="dropdown-item edittask-details" href="#" id="taskedit" data-id="#cmptask-2" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg">Edit</a>
                                                                <a class="dropdown-item deletetask" href="#" data-id="#cmptask-2">Delete</a>
                                                            </div>
                                                        </div> <!-- end dropdown -->
                                                        <div class="float-end ms-2">
                                                            <span class="badge rounded-pill badge-soft-success font-size-12" id="task-status">Complete</span>
                                                        </div>
                                                        <div>
                                                            <h5 class="font-size-15"><a href="javascript: void(0);" class="text-dark" id="task-name">Multipurpose Landing</a></h5>
                                                            <p class="text-muted">09 Oct, 2019</p>
                                                        </div>
                                                        
                                                        <ul class="list-inline mb-4">
                                                            <li class="list-inline-item">
                                                                <a href="javascript: void(0);">
                                                                    <div>
                                                                        <img src="assets/images/small/img-4.jpg" class="rounded" alt="" height="48">
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <a href="javascript: void(0);">
                                                                    <div>
                                                                        <img src="assets/images/small/img-5.jpg" class="rounded" alt="" height="48">
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <a href="javascript: void(0);">
                                                                    <div>
                                                                        <img src="assets/images/small/img-6.jpg" class="rounded" alt="" height="48">
                                                                    </div>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                        
                                                        <div class="avatar-group float-start task-assigne">
                                                            <div class="avatar-group-item">
                                                                <a href="javascript: void(0);" class="d-inline-block" value="member-4">
                                                                    <img src="assets/images/users/avatar-4.jpg" alt="" class="rounded-circle avatar-xs">
                                                                </a>
                                                            </div>
                                                            <div class="avatar-group-item">
                                                                <a href="javascript: void(0);" class="d-inline-block" value="member-5">
                                                                    <img src="assets/images/users/avatar-5.jpg" alt="" class="rounded-circle avatar-xs">
                                                                </a>
                                                            </div>
                                                            <div class="avatar-group-item">
                                                                <a href="javascript: void(0);" class="d-inline-block" value="member-6">
                                                                    <img src="assets/images/users/avatar-6.jpg" alt="" class="rounded-circle avatar-xs">
                                                                </a>
                                                            </div>
                                                            <div class="avatar-group-item">
                                                                <a href="javascript: void(0);" class="d-inline-block">
                                                                    <div class="avatar-xs">
                                                                        <span class="avatar-title rounded-circle bg-pink text-white font-size-16">
                                                                            5+
                                                                        </span>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="text-end">
                                                            <h5 class="font-size-15 mb-1" id="task-budget">$ 92</h5>
                                                            <p class="mb-0 text-muted">Budget</p>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                <!-- end task card -->

                                                <div class="card task-box" id="cmptask-3">
                                                    <div class="card-body">
                                                        <div class="dropdown float-end">
                                                            <a href="#" class="dropdown-toggle arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="mdi mdi-dots-vertical m-0 text-muted h5"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <a class="dropdown-item edittask-details" href="#" id="taskedit" data-id="#cmptask-3" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg">Edit</a>
                                                                <a class="dropdown-item deletetask" href="#" data-id="#cmptask-3">Delete</a>
                                                            </div>
                                                        </div> <!-- end dropdown -->
                                                        <div class="float-end ms-2">
                                                            <span class="badge rounded-pill badge-soft-secondary font-size-12" id="task-status">Waiting</span>
                                                        </div>
                                                        <div>
                                                            <h5 class="font-size-15"><a href="javascript: void(0);" class="text-dark" id="task-name">Skote landing Psd</a></h5>
                                                            <p class="text-muted mb-4">15 Oct, 2019</p>
                                                        </div>

                                                        <div class="avatar-group float-start task-assigne">
                                                            <div class="avatar-group-item">
                                                                <a href="javascript: void(0);" class="d-inline-block" value="member-7">
                                                                    <img src="assets/images/users/avatar-7.jpg" alt="" class="rounded-circle avatar-xs">
                                                                </a>
                                                            </div>
                                                            <div class="avatar-group-item">
                                                                <a href="javascript: void(0);" class="d-inline-block" value="member-8">
                                                                    <img src="assets/images/users/avatar-8.jpg" alt="" class="rounded-circle avatar-xs">
                                                                </a>
                                                            </div>
                                                            <div class="avatar-group-item">
                                                                <a href="javascript: void(0);" class="d-inline-block">
                                                                    <div class="avatar-xs">
                                                                        <span class="avatar-title rounded-circle bg-info text-white font-size-16">
                                                                            2+
                                                                        </span>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>

                                                        <div class="text-end">
                                                            <h5 class="font-size-15 mb-1" id="task-budget">$ 86</h5>
                                                            <p class="mb-0 text-muted">Budget</p>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                <!-- end task card -->

                                            </div>

                                            <div class="text-center d-grid">
                                                <a href="javascript: void(0);" class="btn btn-primary waves-effect waves-light addtask-btn" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg" data-id="#complete-task"><i class="mdi mdi-plus me-1"></i> Add New</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->

                    </div>
	</div>
</div>
<script>
	
$("#success-alert").fadeTo(4000, 500).slideUp(100, function(){
$("#success-alert").slideUp("slow");
$("#success-alert").alert('close');
});
$("#alert-danger").fadeTo(4000, 500).slideUp(100, function(){
$("#alert-danger").slideUp("slow");
$("#alert-danger").alert('close');
});
</script>
@endsection