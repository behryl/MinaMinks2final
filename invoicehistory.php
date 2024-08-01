<!DOCTYPE html>
<html lang="en">
<head>
<title>MINA MINKS</title>
<meta charset="utf-8">
<link rel="stylesheet" href="css/style.css">
<link rel="icon" href="PNG image.JPEG" type="image/x-icon">
<link rel="shortcut icon" href="PNG image.JPEG" type="image/x-icon">
<script src="js/jquery.js"></script>
<script src="js/jquery-migrate-1.1.1.js"></script>
<script src="js/bgstretcher.js"></script>
<script>
  $(document).ready(function () {
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
        <h1 class="logo"><a href="index.html"><img alt="MINA MINKS" "></a></h1>
        <nav>
          <ul class="menu">
            <li><a href="bookappointment.php">Home</a></li>
            <li><a href="about-us-login.php">About Us</a></li>
            <li><a href="services-login.php">Services</a></li>
            <li><a href="gallery-login.php">Gallery</a></li>
            <li><a href="contact-login.php">Contacts</a></li>
            <li><a href="bookinghistory.php">Booking history</a></li>
            <li class="current"><a href="invoicehistory.php">Invoice history</a></li>
            <li><a href="profile.php">Profile</a></li>
            <li><a href="setting.php">Setting</a></li>
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
            <h3>Invoice History</h3>
            
            
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