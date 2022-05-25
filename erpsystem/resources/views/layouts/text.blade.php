<script>
    fetch_notifications();

function fetch_notifications() {
        $.ajax({
            type: 'GET',
            url: 'getNotification',
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