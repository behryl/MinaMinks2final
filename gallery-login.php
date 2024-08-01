<!DOCTYPE html>
<html lang="en">
<head>
<title>Mina Minks | Gallery</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/style.css">
<link rel="icon" href="PNG image.JPEG" type="image/x-icon">
<link rel="shortcut icon" href="PNG image.JPEG" type="image/x-icon">
<link rel="stylesheet" href="css/jquery.fancybox.css" >
<script src="js/jquery.js"></script>
<script src="js/jquery-migrate-1.1.1.js"></script>
<script src="js/bgstretcher.js"></script>
<script src="js/jquery.elastislide.js"></script>
<script src="js/jquery.fancybox.pack.js"></script>
<script>
$(document).ready(function () {
    $('body').bgStretcher({
        images: ['images/slide-1.jpg'],
        imageWidth: 1600,
        imageHeight: 964,
        resizeProportionally: true
    });
    $('#carousel').elastislide({
        imageW: 300,
        margin: 20,
        minItems: 3
    });
    $('.magnifier').fancybox();
    $(".view").hover(
        function () {
            $(this).find("img").stop().animate({
                opacity: 0.5
            }, "normal")
        },
        function () {
            $(this).find("img").stop().animate({
                opacity: 1
            }, "normal")
        })
})
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
            <li class="current"><a href="gallery.php">Gallery</a></li>
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
      <div class="main">
        <h3>Our Gallery</h3>
        <div id="carousel" class="es-carousel-wrapper ">
          <div class="es-carousel">
            <ul>
              <li>
                <figure class="img-rounded"><a class="view magnifier" data-fancybox-group="gallery" href="images/image-blank.png" title="Image Caption"><img src="images/page4-img1.jpg" alt=""><span></span></a> </figure>
                <figure class="img-rounded"><a class="view magnifier" data-fancybox-group="gallery" href="images/image-blank.png" title="Image Caption"><img src="images/page4-img4.jpg" alt=""><span></span></a></figure>
              </li>
              <li>
                <figure class="img-rounded"><a class="view magnifier" data-fancybox-group="gallery" href="images/image-blank.png" title="Image Caption"><img src="images/page4-img2.jpg" alt=""><span></span></a> </figure>
                <figure class="img-rounded"><a class="view magnifier" data-fancybox-group="gallery" href="images/image-blank.png" title="Image Caption"><img src="images/page4-img5.jpg" alt=""><span></span></a> </figure>
              </li>
              <li>
                <figure class="img-rounded"><a class="view magnifier" data-fancybox-group="gallery" href="images/image-blank.png" title="Image Caption"><img src="images/page4-img3.jpg" alt=""><span></span></a> </figure>
                <figure class="img-rounded"><a class="view magnifier" data-fancybox-group="gallery" href="images/image-blank.png" title="Image Caption"><img src="images/page4-img6.jpg" alt=""><span></span></a> </figure>
              </li>
              <li>
                <figure class="img-rounded"><a class="view magnifier" data-fancybox-group="gallery" href="images/image-blank.png" title="Image Caption"><img src="images/page4-img1.jpg" alt=""><span></span></a> </figure>
                <figure class="img-rounded"><a class="view magnifier" data-fancybox-group="gallery" href="images/image-blank.png" title="Image Caption"><img src="images/page4-img4.jpg" alt=""><span></span> </a></figure>
              </li>
              <li>
                <figure class="img-rounded"><a class="view magnifier" data-fancybox-group="gallery" href="images/image-blank.png" title="Image Caption"><img src="images/page4-img2.jpg" alt=""><span></span></a> </figure>
                <figure class="img-rounded"><a class="view magnifier" data-fancybox-group="gallery" href="images/image-blank.png" title="Image Caption"><img src="images/page4-img5.jpg" alt=""><span></span></a> </figure>
              </li>
            </ul>
          </div>
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