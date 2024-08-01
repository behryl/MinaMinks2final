<!DOCTYPE html>
<html lang="en">

<head>
  <title>MINA MINKS Admin Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/admin_style.css">
  <link rel="icon" href="PNG image.JPEG" type="image/x-icon">
  <link rel="shortcut icon" href="PNG image.JPEG" type="image/x-icon">
  <script src="../js/jquery.js"></script>
  <script src="../js/jquery-migrate-1.1.1.js"></script>
  <script src="../js/bgstretcher.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- Include SweetAlert -->
  <script src="https://kit.fontawesome.com/b0f1b96203.js" crossorigin="anonymous"></script>
  <script>
$(document).ready(function() {
    $('body').bgStretcher({
        images: ['../images/slide-1.jpg', '../images/slide-2.jpg', '../images/slide-3.jpg'],
        imageWidth: 1600,
        imageHeight: 964,
        resizeProportionally: true,
        slideDirection: 'N',
        slideShowSpeed: 1000,
        transitionEffect: 'fade',
        sequenceMode: 'normal',
        pagination: '#nav'
    });

    $('#bookAppointmentBtn').click(function() {
        $('#appointmentModal').show();
    });

    $('.close').click(function() {
        $('#appointmentModal').hide();
        $('#editBookingModal').hide();
    });

    fetchBookings_admin();

    function fetchBookings_admin() {
        $.ajax({
            url: '../actions/fetchbookings_admin.php',
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                let tableContent = '';
                data.forEach(function(booking) {
                    let confirmbooking = '';
                    let denybooking = '';
                    if (booking.status_id === 3) {
                        confirmbooking = `<button class="confirmBtn" data-id="${booking.bookingid}"><i class="fa-solid fa-check" style="color: #ffffff;"></i></button>`;
                        denybooking = `<button class="denyBtn" data-id="${booking.bookingid}"><i class="fa-solid fa-x" style="color: #ffffff;"></i></button>`;
                    }

                    tableContent += `
                        <tr>
                            <td>${booking.firstname} ${booking.lastname}</td>
                            <td>${booking.servicename}</td>
                            <td>${booking.bookingtime}</td>
                            <td>${booking.bookingdate}</td>
                            <td>${booking.message}</td>
                            <td>${confirmbooking} ${denybooking}</td>
                            <td>${booking.status_name}</td>
                        </tr>
                    `;
                });
                $('#bookingTable tbody').html(tableContent);
                $('#bookingCount').text(data.count); // Display booking count
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }

    fetch_all_bookings();

    function fetch_all_bookings() {
        $.ajax({
            url: '../actions/fetch_all_bookings.php',
            method: 'GET',
            dataType: 'json',
            success: function(data) {                
                $('#bookingCount').text(data.count); // Display booking count
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }

    fetch_confirmed_bookings();

    function fetch_confirmed_bookings() {
        $.ajax({
            url: '../actions/fetch_confirmed_bookings.php',
            method: 'GET',
            dataType: 'json',
            success: function(data) {                
                $('#bookingconfirmedCount').text(data.count); // Display booking count
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }

    fetch_unconfirmed_bookings();

    function fetch_unconfirmed_bookings() {
        $.ajax({
            url: '../actions/fetch_unconfirmed_bookings.php',
            method: 'GET',
            dataType: 'json',
            success: function(data) {                
                $('#bookingunconfirmedCount').text(data.count); // Display booking count
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }

    // Add event listener to confirm buttons
    $('#bookingTable').on('click', '.confirmBtn', function() {
        let bookingId = $(this).data('id');

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, confirm booking!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '../actions/confirm_booking.php',
                    method: 'GET',
                    data: {
                        id: bookingId
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.status === 'success') {
                            Swal.fire('Confirmed!', response.message, 'success');
                            fetchBookings_admin();
                        } else {
                            Swal.fire('Error!', response.message, 'error');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        Swal.fire('Error!', 'An error occurred while confirming the booking.', 'error');
                    }
                });
            }
        });
    });

    // Add event listener to deny buttons
    $('#bookingTable').on('click', '.denyBtn', function() {
        let bookingId = $(this).data('id');

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, deny booking!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '../actions/deny_booking.php',
                    method: 'GET',
                    data: {
                        id: bookingId
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.status === 'success') {
                            Swal.fire('Denied!', response.message, 'success');
                            fetchBookings_admin();
                        } else {
                            Swal.fire('Error!', response.message, 'error');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        Swal.fire('Error!', 'An error occurred while denying the booking.', 'error');
                    }
                });
            }
        });
    });
});
</script>

  <script>
    document.addEventListener("DOMContentLoaded", function() {
      // Function to get URL parameters
      function getQueryParam(param) {
        const urlParams = new URLSearchParams(window.location.search);
        return urlParams.get(param);
      }

      // Get the 'msg' parameter from the URL
      const message = getQueryParam('msg');

      if (message) {
        // Decode the URL-encoded message
        const decodedMessage = decodeURIComponent(message);

        // Show the SweetAlert message
        Swal.fire({
          title: 'Notification',
          text: decodedMessage,
          icon: 'info',
          confirmButtonText: 'OK'
        });
      }
    });
  </script>

  <style>
    #bookingTable {
      width: 100%;
      border-collapse: collapse;
      margin: 20px 0;
      font-size: 1.2em;
      font-family: 'Open Sans', sans-serif;
      text-align: left;
    }

    #bookingTable thead tr {
      background-color: #cd96c9;
      color: #ffffff;
      text-align: left;
    }

    #bookingTable th,
    #bookingTable td {
      padding: 15px 20px;
    }

    #bookingTable tbody tr {
      border-bottom: 1px solid #dddddd;
    }

    #bookingTable tbody tr:nth-of-type(even) {
      background-color: #f3f3f3;
    }

    #bookingTable tbody tr:last-of-type {
      border-bottom: 2px solid #cd96c9;
    }

    #bookingTable tbody tr:hover {
      background-color: #ef97cc;
      cursor: pointer;
    }

    #bookingTable th {
      background-color: #7c7c7c;
      color: white;
      font-weight: bold;
    }

    /* Button Styling */
    button {
      background-color: #cd96c9;
      color: white;
      border: none;
      padding: 12px 25px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 6px 3px;
      cursor: pointer;
      border-radius: 4px;
    }

    button:hover {
      background-color: #7c7c7c;
    }
  </style>
  <!--[if lt IE 9]>   
<script src="js/html5shiv.js"></script>
<link href="css/ie.css" rel="stylesheet" type="text/css" media="screen">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400" rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:300" rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:600" rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:700" rel="stylesheet" type="text/css">  
<![endif]-->
</head>

<body>
  <div class="extra-block1">
    <div class="row-top">
      <div class="main">
        <ul class="list-soc">
          <li><a href="#"><img alt="" src="../images/soc-icon1.png"></a></li>
          <li><a href="#"><img alt="" src="../images/soc-icon2.png"></a></li>
        </ul>
      </div>
    </div>
    <header>
      <div class="row-nav">
        <div class="main">
          <h1 class="logo"><a href="index.html"><img alt="MINA MINKS" "></a></h1>
        <nav>
          <ul class=" menu">
              <li class="current"><a href="admindash.php">Dashboard</a></li>
              <li><a href="../logout.php">Logout</a></li>
              </ul>
              </nav>
              <div class="clear"></div>
        </div>
      </div>
    </header>
    <section id="content">
      <div class="main-block">
        <div class="container_12">
          <div class="wrapper border-vert">
            <article class="grid_5">
              <h3>Dashboard</h3>
              <h6>Analytics</h6>
              <h6>All Booking Count: <span id="bookingCount"></span></h6>
              <h6>All Confirmed Booking Count: <span id="bookingconfirmedCount"></span></h6>
              <h6>All UnConfirmed Booking Count: <span id="bookingunconfirmedCount"></span></h6>

              <h6>Bookings List</h6>
              <table id="bookingTable">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Service</th>
                    <th>Time</th>
                    <th>Date</th>
                    <th>Message</th>
                    <th>Actions</th>
                    <th>Decision</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>




            </article>
            <article class="grid_5 prefix_2">

            </article>
          </div>
        </div>
      </div>
    </section>

  </div>
</body>

</html>