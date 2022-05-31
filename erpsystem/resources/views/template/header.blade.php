<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">


                <a href="{{ url('/dashboard')}}" class="logo logo-light">
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
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="mdi mdi-magnify"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                    aria-labelledby="page-header-search-dropdown">
                    <form class="p-3">
                        <div class="form-group m-0">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search ..."
                                    aria-label="Recipient's username">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit"><i
                                            class="mdi mdi-magnify"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
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
                                <a href="{{URL('/datatable')}}" class="small" key="t-view-all"> View All</a>
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
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="rounded-circle header-profile-user"
                                src="{{asset('employee_pictures')}}/{{Session::get('Picture')}}" alt="Header Avatar">
                            <span class="d-none d-xl-inline-block ms-1"
                                key="t-henry">{{Session::get('FullName')}}</span>
                            <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                        </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a class="dropdown-item" href="{{URL('/userProfile')}}">
                        <i class="bx bx-user font-size-16 align-middle me-1"></i>
                        <span key="t-profile">Profile</span></a>
                    <a class="dropdown-item d-block" href="{{URL('/ChangePassword')}}"><i
                            class="bx bx-wrench font-size-16 align-middle me-1"></i> <span key="t-settings">Change
                            Password</span></a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="{{URL('/logout')}}"><i
                            class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span
                            key="t-logout">Logout</span></a>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Static Backdrop Modal -->
<div class="modal fade" id="notification-update-modal" tabindex="-1" role="dialog" data-bs-backdrop="static"
    data-bs-keyboard="false" aria-labelledby="notification-update-modalLabel" aria-hidden="true">
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
                <button type="button"  class="btn btn-light notification-understood"
                    data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    fetch_notifications();
    newNotifications();
    // ===============Getting Specific Notice===============
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
    // ===============Fetching Notices===============
     // window.setInterval('fetch_notifications()', 10000);     
  
function fetch_notifications() {
    $.ajax({
        type: 'GET',
        url: 'fetch_notifications',
        dataType: 'json',
        contentType: false,
        processData:false, //this is a must
        success: function(response){
            $("#badge-id").html(response.Total);
            <?php
            $data[0]->Total  = ($data[0]->Total >3 ) ? 3 : $data[0]->Total ;
            ?>
            for(var i=0 ; i< {{$data[0]->Total}} ; i++)
            {
                $(".notification-table-body").append('<tr>\
                    <td style="width: 430px; padding-left: 10px; padding-right: 10px;">\
                        <a href="javascript:void(0)" class="text-notification-item get-notice-id"\
                         data-id='+response.data[i].NoticeID+' data-bs-toggle="modal"\
                         data-bs-target="#notification-update-modal">\
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
// ===============New Notifications===============

function newNotifications() {
    
    $.ajax({
        type: 'GET',
        url: 'sendNotification',
        dataType: 'json',
        contentType: false,
        processData: false, //this is a must
        success: function(response) {

            var IDd = response.data[0].NoticeID;
            var Title = response.data[0].Title;
            var Body = response.data[0].Description;
            var url = new URL(window.location.href);
            var Notice_URL = url.origin + "/getNotification/" + IDd;
            showalert(Title,IDd,Body,Notice_URL);
           
        }
    });
}
// ===============Show Notifications===============

function showalert(Title,IDd,Body,Notice_URL){
    (async() => {
                // create and show the notification
                const showNotification = () => {
                        // create a new notification
                        
                        const notification = new Notification(Title, {
                            body: Body,
                            icon: 'https://www.shahcorporationltd.com/img/logo/Shah-Corps.png'
                        });
                        console.log("ID" + IDd);
                        $.ajax({
                                        type: "GET",
                                        url: "updateNotificationStatus/"+IDd,
                                        dataType: "json",
                                        success: function (response) {
                                            console.log(response);
                                        }
                                    });
                        // close the notification after 10 seconds
                        setTimeout(() => {
                            notification.close();
                        }, 10 * 1000);
                        // navigate to a URL when clicked
                        notification.addEventListener('click', () => {
                            window.open(Notice_URL);
                                    $.ajax({
                                        type: "GET",
                                        url: "updateNoticeStatus/"+IDd,
                                        dataType: "json",
                                        success: function (response) {
                                        }
                                    });
                                });
                    }
                    // show an error message
                const showError = () => {
                        const error = document.querySelector('.error');
                        error.style.display = 'block';
                        error.textContent = 'You blocked the notifications';
                    }
                    // check notification permission
                let granted = false;
                if(Notification.permission === 'granted') {
                    granted = true;
                } else if(Notification.permission !== 'denied') {
                    let permission = await Notification.requestPermission();
                    granted = permission === 'granted' ? true : false;
                }
                // show notification or error
                granted ? showNotification() : showError();
            })();
}
// ===============Update Notification Status===============

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
    
    window.setInterval('refresh()', 5000);     
    function refresh() {
        newNotifications();
    }
</script>