
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Mina Minks Lash Salon | Booking History</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <link rel="icon" href="PNG image.JPEG" type="image/x-icon">
  <link rel="shortcut icon" href="PNG image.JPEG" type="image/x-icon">
  <script src="js/jquery.js"></script>
  <script src="js/jquery-migrate-1.1.1.js"></script>
  <script src="js/bgstretcher.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- Include SweetAlert -->
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

  <script>
    $(document).ready(function() {
      $('body').bgStretcher({
        images: ['images/slide-1.jpg', 'images/slide-2.jpg', 'images/slide-3.jpg'],
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

      fetchBookings();

      function fetchBookings() {
        $.ajax({
          url: 'actions/fetch_bookings.php',
          method: 'GET',
          dataType: 'json',
          success: function(data) {
            let tableContent = '';
            data.forEach(function(booking) {
              let currentDate = new Date();
              let bookingDate = new Date(booking.bookingdate);
              let editable = currentDate < bookingDate ? `<button class="editBtn" data-id="${booking.bookingid}">Edit</button>` : '';
              let deletetable = currentDate < bookingDate ? `<button class="deleteBtn" data-id="${booking.bookingid}">Delete</button>` : '';

              tableContent += `
            <tr>
              <td>${booking.servicename}</td>
              <td>${booking.bookingtime}</td>
              <td>${booking.bookingdate}</td>
              <td>${booking.message}</td>
              <td>${editable} ${deletetable}</td>
              <td>${booking.status_name}</td>
            </tr>
          `;
            });
            $('#bookingTable tbody').html(tableContent);
          },
          error: function(xhr, status, error) {
            console.error(xhr.responseText);
          }
        });
      }

      // Add event listener to Edit buttons
      $('#bookingTable').on('click', '.editBtn', function() {
        let bookingId = $(this).data('id');
        window.location.href = `edit_booking.php?id=${bookingId}`;
      });

      // Add event listener to Delete buttons
      $('#bookingTable').on('click', '.deleteBtn', function() {
        let bookingId = $(this).data('id');

        Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              url: 'actions/delete_booking.php',
              method: 'GET',
              data: {
                id: bookingId
              },
              dataType: 'json',
              success: function(response) {
                if (response.status === 'success') {
                  Swal.fire('Deleted!', response.message, 'success');
                  fetchBookings(); 
                } else {
                  Swal.fire('Error!', response.message, 'error');
                }
              },
              error: function(xhr, status, error) {
                console.error(xhr.responseText);
                Swal.fire('Error!', 'An error occurred while deleting the booking.', 'error');
              }
            });
          }
        });
      });
    });
  </script>
  <style>
    .modal {
      display: none;
      position: fixed;
      z-index: 1;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgb(0, 0, 0);
      background-color: rgba(0, 0, 0, 0.4);
      padding-top: 60px;
    }

    .modal-content {
      background-color: #fefefe;
      margin: 5% auto;
      padding: 20px;
      border: 1px solid #888;
      width: 80%;
    }

    .close {
      color: #aaa;
      float: right;
      font-size: 28px;
      font-weight: bold;
    }

    .close:hover,
    .close:focus {
      color: black;
      text-decoration: none;
      cursor: pointer;
    }

    /* Table Styling */
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
</head>

<body>
  <div class="extra-block1">
    <div class="row-top">
      <div class="main">
        <ul class="list-soc">
          <li><a href="#"><img alt="" src="images/soc-icon1.png"></a></li>
          <li><a href="#"><img alt="" src="images/soc-icon2.png"></a></li>
        </ul>
      </div>
    </div>
    <header>
      <div class="row-nav">
        <div class="main">
          <h1 class="logo"><a href="index.html"><img alt="MINA MINKS"></a></h1>
          <nav>
            <ul class="menu">
              <li><a href="bookappointment.php">Home</a></li>
              <li><a href="about-us-login.php">About Us</a></li>
              <li><a href="services-login.php">Services</a></li>
              <li><a href="gallery-login.php">Gallery</a></li>
              <li><a href="contact-login.php">Contacts</a></li>
              <li class="current"><a href="bookinghistory.php">Booking history</a></li>
              <li><a href="profile.php">Profile</a></li>
              <li><a href="logout.php">Logout</a></li>
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
              <h3>Booking History</h3>
              <table id="bookingTable">
                <thead>
                  <tr>
                    <th>Service</th>
                    <th>Time</th>
                    <th>Date</th>
                    <th>Message</th>
                    <th>Actions</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </article>
            <article class="grid_5 prefix_2"></article>
          </div>
        </div>
      </div>
    </section>
  </div>
</body>

</html>