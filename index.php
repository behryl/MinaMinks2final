
<!DOCTYPE html>
<html lang="en">
<head>
<title>Mina Minks |HomePage</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/style.css">
<link rel="icon" href="PNG image.JPEG" type="image/x-icon">
<link rel="shortcut icon" href="PNG image.JPEG" type="image/x-icon">
<script src="js/jquery.js"></script>
<script src="js/jquery-migrate-1.1.1.js"></script>
<script src="js/bgstretcher.js"></script>

    <!-- SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!-- SweetAlert JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Your other head contents -->

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
  $(document).ready(function () {
      $('body').bgStretcher({
          images: ['images/IMG_3189.JPG', 'images/IMG_3195.JPG', 'images/IMG_3192.JPG'],
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
      });
  });
  </script>
  <style>
    /* Modal styling */
    .modal {
      display: none; 
      position: fixed; 
      z-index: 1; 
      left: 0;
      top: 0;
      width: 100%; 
      height: 100%; 
      overflow: auto; 
      background-color: rgb(0,0,0); 
      background-color: rgba(0,0,0,0.4); 
      padding-top: 60px;
    }
  
    .modal-content {
      background-color: #cd97c9;
      margin: 5% auto;
      padding: 20px;
      border: 3px solid #888;
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
        <li><a href="#"><img alt="" src="images/soc-icon1.png"></a></li>
        <li><a href="#"><img alt="" src="images/soc-icon2.png"></a></li>
      </ul>
    </div>
  </div>
  <header>
    <div class="row-nav">
      <div class="main">
        <h1 class="logo"><a href="index.php"><img alt="MINA MINKS" "></a></h1>
        <nav>
          <ul class="menu">
            <li class="current"><a href="index.php">Home</a></li>
            <li><a href="about-us.php">About Us</a></li>
            <li><a href="services.php">Services</a></li>
            <li><a href="gallery.php">Gallery</a></li>
            <li><a href="contacts.php">Contacts</a></li>
            <li><a href="signup.php">Sign Up</a></li>
            <li><a href="login.php">Login</a></li>
          </ul>
        </nav>
        <div class="clear"></div>
      </div>
    </div>
  </header>
</div>
<div class="block">
  <div class="nav-buttons">
    <div id="nav">&nbsp;</div>
  </div>
  <div class="row-1">
    <div class="container_12">
      <div class="wrapper aligncenter">
        <button id="bookAppointmentBtn" class="button">Book Appointment</button>
      </div>
    <div class="container_12">
      <div class="wrapper">
        <article class="grid_4">
          <figure class="box-1"><img src="images/IMG2.jpg" alt="">
            <figcaption>Lash Extension </figcaption>
          </figure>
        </article>
        <article class="grid_4">
          <figure class="box-1"><img src="images/IMG3.jpg" alt="">
            <figcaption>Lash Removal </figcaption>
          </figure>
        </article>
        <article class="grid_4">
          <figure class="box-1"><img src="images/IMG7.jpg" alt="">
            <figcaption>Lash Refill </figcaption>
          </figure>
        </article>
      </div>
    </div>
  </div>
  <footer>
   
  </footer>
  <div id="appointmentModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <form action="actions/process_appointment.php" method="post">
        <label for="firstName">First Name:</label>
        <input type="text" id="firstName" name="firstName"><br><br>
        <label for="lastName">Last Name:</label>
        <input type="text" id="lastName" name="lastName"><br><br>
        <label for="service">Service:</label>
            <select id="service" name="service">
                <?php
                include './functions/getallservices.php';
                $services = fetchServices($conn);
                foreach ($services as $service) {
                    echo '<option value="'.$service['serviceid'].'">'.$service['servicename'].'</option>';
                }
                ?>
            </select><br><br>
        <label for="appointmentTime">Time:</label>
        <input type="time" id="appointmentTime" name="appointmentTime"><br><br>
        <label for="appointmentDate">Date:</label>
        <input type="date" id="appointmentDate" name="appointmentDate"><br><br>
        <label for="contact">Contact:</label>
        <input type="tel" id="contact" name="contact"><br><br>
        <label for="message">Message:</label><br>
        <textarea id="message" name="message" rows="4" cols="50"></textarea><br><br>
        <input type="submit" value="Make an appointment">
      </form>
    </div>
</div>
</div>
</body>
</html>
