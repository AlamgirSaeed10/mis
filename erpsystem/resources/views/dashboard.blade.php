@extends('HR.hr-layout.main')
@section('title', 'Dashboard')
@section('content')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Dashboard</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="d-xl-flex">
                <div class="w-100">
                   
                </div>

                <div class="card filemanager-sidebar ms-lg-2">
                   
                </div>
            </div>
            <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->


    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <script>
                        document.write(new Date().getFullYear())
                    </script> © ShahCorporation.
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-end d-none d-sm-block">
                        Design & Develop by Teqholic
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>

<script>
    fetch_notifications();

function fetch_notifications() {
        $.ajax({
            type: 'GET',
            url: 'fetch_notifications   ',
            dataType: 'json',
            contentType: false,
            processData:false, //this is a must
            success: function(response){

                var IDd = response.data[0].NoticeID; 

                var  Title = response.data[0].Title;
                var Body = response.data[0].Description;
                var url= new URL(window.location.href);
                var Notice_URL = url.origin+"/getAllNotice/"+IDd;
                
                (async () => {
                    // create and show the notification
                    const showNotification = () => {
                        // create a new notification
                        const notification = new Notification(Title, 

                        {
                            body: Body,
                            icon: 'https://www.shahcorporationltd.com/img/logo/Shah-Corps.png'
                        });

                        // close the notification after 10 seconds
                        setTimeout(() => {
                            notification.close();
                        }, 10 * 1000);

                        // navigate to a URL when clicked
                        notification.addEventListener('click', () => {
                        
                           var c = window.open(Notice_URL);
                            console.log(c);
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

                    if (Notification.permission === 'granted') {
                        granted = true;
                    } else if (Notification.permission !== 'denied') {
                        let permission = await Notification.requestPermission();
                        granted = permission === 'granted' ? true : false;
                    }

                    // show notification or error
                    granted ? showNotification() : showError();

                })();
                                   
            }
        });
    }

</script>
@endsection