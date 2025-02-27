<!DOCTYPE html>
<html lang="en">
<head>
<title>Mina Minks Lash Salon| Contacts</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/style.css">
<link rel="icon" href="images/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
<script src="js/jquery.js"></script>
<script src="js/jquery-migrate-1.1.1.js"></script>
<script src="js/bgstretcher.js"></script>
<script src="js/forms.js"></script>
<script>
$(document).ready(function () {
    $('body').bgStretcher({
        images: ['images/slide-1.jpg'],
        imageWidth: 1600,
        imageHeight: 964,
        resizeProportionally: true
    });
});
</script>
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
<div class="extra-block">
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
        <h1 class="logo"><a href="index.php"><img alt="" src="images/logo2.png"style="height:80px;padding-left:200px"></a></h1>
        <nav>
          <ul class="menu">
            <li><a href="bookappointment.php">Home</a></li>
            <li><a href="about-us-login.php">About Us</a></li>
            <li><a href="services-login.php">Services</a></li>
            <li><a href="gallery-login.php">Gallery</a></li>
            <li class="current"><a href="contacts.php">Contacts</a></li>
            <li><a href="bookinghistory.php">Booking history</a></li>
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
            <h3>Postal Address</h3>
            <div class="map">
              <iframe src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Brooklyn,+New+York,+NY,+United+States&amp;aq=0&amp;sll=37.0625,-95.677068&amp;sspn=61.282355,146.513672&amp;ie=UTF8&amp;hq=&amp;hnear=Brooklyn,+Kings,+New+York&amp;ll=40.649974,-73.950005&amp;spn=0.01628,0.025663&amp;z=14&amp;iwloc=A&amp;output=embed"> </iframe>
            </div>
            <dl class="address">
              <dt>The Company Name Inc.<br>
                8901 Marmora Road,<br>
                Glasgow, D04 89GR.</dt>
              <dd> <span>Freephone:</span> +1 800 559 6580 </dd>
              <dd> <span>Telephone:</span> +1 800 603 6035 </dd>
              <dd> <span>FAX:</span> +1 800 889 9898 </dd>
            </dl>
          </article>
          <article class="grid_5 prefix_2">
            <h3>Contact Form</h3>
            <form id="contact-form" action="#">
              <div class="success"> Contact form submitted! <strong>We will be in touch soon.</strong> </div>
              <fieldset>
                <div>
                  <label class="name">
                    <input type="text" value="Name:">
                    <br>
                    <span class="error">*This is not a valid name.</span> <span class="empty">*This field is required.</span> </label>
                </div>
                <div>
                  <label class="email">
                    <input type="email" value="E-mail:">
                    <br>
                    <span class="error">*This is not a valid email address.</span> <span class="empty">*This field is required.</span> </label>
                </div>
                <div>
                  <label class="phone">
                    <input type="tel" value="Phone:">
                    <br>
                    <span class="error">*This is not a valid phone number.</span> <span class="empty">*This field is required.</span> </label>
                </div>
                <div>
                  <label class="message">
                    <textarea>Message:</textarea>
                    <br>
                    <span class="error">*The message is too short.</span> <span class="empty">*This field is required.</span> </label>
                </div>
                <div class="buttons-wrapper"><a class="button" data-type="reset">Clear</a><a class="button" data-type="submit">Send</a></div>
              </fieldset>
            </form>
          </article>
        </div>
      </div>
    </div>
  </section>
</div>
<div class="block">
  <footer>
  </footer>
</div>
</body>
</html>