<!DOCTYPE html>
<html lang="en">

<?php
include("connection/connect.php");  
error_reporting(0); 
session_start(); 

?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">
    <title>EAT@TIME</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet"> </head>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com"> 
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
    <link href="https://fonts.googleapis.com/css2?family=Coiny&family=Handlee&family=Nunito&family=Sniglet:wght@800&family=Taviraj&family=Ultra&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Coiny&family=Handlee&family=Nunito&family=Playpen+Sans:wght@500&family=Sniglet:wght@800&family=Taviraj&family=Ultra&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@600&family=Frank+Ruhl+Libre&family=Inter:wght@100&display=swap" rel="stylesheet">
   <style>

    .custom-button {
    background-color: #B06932 !important;
    color: white !important; 
    border:  2px solid #B06932 !important;
    border-radius: 5px !important;
    padding: 10px 20px !important;
    text-align: center !important;            
    cursor: pointer !important;
    margin: 30px !important;
    transition: background-color 0.5s !important;
  }
  .custom-button:hover {
    background-color: #E7B36C !important;
    border: 1px solid #E7B36C !important;
  }

  .step .icon:before {
    background-color: #B06932 !important;
  }
  .food-item-wrap .distance {
    background: #B06932 !important;
  }
  .food-item-wrap {
    border: 1px solid #eaebeb;
    border-radius: 20px;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.5); 
    overflow: hidden;
    margin-bottom: 30px;
    background: #fafaf8;
}

.popular {
    background-color: #F7E5DB !important;
    padding: 70px 0 90px;
    background-size: 100%;
}

/* 
footer {
    background-color: #F7E5DB !important;

} */


</style>




<body class="home">
        <!--header starts-->
        <header id="header" class="header-scroll top-header headrom">
            <!-- .navbar -->
            <nav class="navbar navbar-dark" data-aos="fade-down" data-aos-duration = "1300">
                <div class="container">
                    <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#mainNavbarCollapse">&#9776;</button>
                    <a class="navbar-brand" href="index.php" style="color : #66a695; font-weight: bold;">Ɛąէ Ͳìʍҽ</a>
                    <div class="collapse navbar-toggleable-md  float-lg-right" id="mainNavbarCollapse">
                        <ul class="nav navbar-nav">
                            <li class="nav-item"> <a class="nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a> </li>
                            <li class="nav-item"> <a class="nav-link active" href="restaurants.php">Category<span class="sr-only"></span></a> </li>
                            
                           
							<?php
						if(empty($_SESSION["user_id"])) // if user is not login
							{
								echo '<li class="nav-item"><a href="login.php" class="nav-link active">Login</a> </li>
							  <li class="nav-item"><a href="registration.php" class="nav-link active">SignUp</a> </li>';
							}
						else
							{
									//if user is login
									
									echo  '<li class="nav-item"><a href="your_orders.php" class="nav-link active">Your Orders</a> </li>';
									echo  '<li class="nav-item"><a href="logout.php" class="nav-link active">Logout</a> </li>';
							}

						?>
							 
                        </ul>
						 
                    </div>
                </div>
            </nav>
            <!-- /.navbar -->
        </header>
        <!-- banner part starts -->
        <section class="hero bg-image" data-image-src="images/img/main.jpg">
            <div class="hero-inner">
                <div class="container text-center hero-text font-white">
                    <h1 data-aos="zoom-in" data-aos-duration="2000">the best food in town</h1>
                    <div class="banner-form"  data-aos="fade-up" data-aos-duration="1500">
                       <a href="restaurants.php" class="btn theme-btn btn-lg custom-button">Category Food</a>

                    </div>
                </div>
            </div>
</section>


        <!-- banner part ends -->
      
	  
	
        <section class="popular">
        <div class="container">
            <div class="title text-xs-center m-b-30">
                <h2 data-aos="zoom-in-down" data-aos-duration="800">Favorite Foods</h2>
                <p class="lead" data-aos="zoom-in-up" data-aos-duration="900">of the month</p>
            </div>
            <div class="row">
    <?php
    $query_res = mysqli_query($db, "select * from dishes LIMIT 3");
    while ($r = mysqli_fetch_array($query_res)) {
        echo '<div class="col-xs-12 col-sm-6 col-md-4 food-item" data-aos="flip-left" data-aos-duration="2000">
                <div class="food-item-wrap">
                    <div class="figure-wrap bg-image" data-image-src="admin/Res_img/dishes/' . $r['img'] . '">
                    </div>
                    <div class="content">
                        <h5><a href="dishes.php?res_id=' . $r['rs_id'] . '">' . $r['title'] . '</a></h5>
                        <div class="product-name">' . $r['slogan'] . '</div>
                        <div class="price-btn-block"> <span class="price">Rp' . $r['price'] . '</span> <a href="dishes.php?res_id=' . $r['rs_id'] . '" class="btn theme-btn-dash pull-right">Order Now</a> </div>
                    </div>
                </div>
            </div>';
    }
    ?>
</div>

        </div>
    </section>
        <!-- How it works block starts -->
        <section class="how-it-works" >
            <div class="container" >
                <div class="text-xs-center">
                    <h2 data-aos="flip-up" data-aos-duration="800">Step to Order</h2>
                    <!-- 3 block sections starts -->
                    <div class="row how-it-works-solution">
                        <div class="col-xs-12 col-sm-12 col-md-4 how-it-works-steps white-txt col1">
                        <div class="how-it-works-wrap">
                            <div class="step step-1" data-aos="fade-down-right" data-aos-duration="900">
                                <div class="icon" data-step="1" >
                                    <img src="images/food.png" alt="Logo" width="100" height="100">
                                </div>
                                <h3 data-aos="fade-down-right" data-aos-duration="950">Choose Category</h3>
                            </div>
                        </div>

                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-4 how-it-works-steps white-txt col2">
                            <div class="step step-2" data-aos="fade-up" data-aos-duration="1100">
                                <div class="icon" data-step="2">
                                <img src="images/bell.png" alt="Logo" width="100" height="100">
                                </div>
                                <h3 data-aos="fade-up" data-aos-duration="1150">View Menu</h3>
                                <!-- <p>We"ve got your covered with menus from over 345 delivery restaurants online.</p> -->
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-4 how-it-works-steps white-txt col3">
                            <div class="step step-3" data-aos="fade-down-left" data-aos-duration="1300">
                                <div class="icon" data-step="3">
                                <img src="images/waiter.png" alt="Logo" width="100" height="100">
                                </div>
                                <h3 data-aos="fade-down-left" data-aos-duration="1350">Order and Wait for Food</h3>
                                <!-- <p>Get your food delivered! And enjoy your meal! Pay online on pickup or delivery</p> -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- 3 block sections ends -->
              
        </section>
        <!-- How it works block ends -->
    
        
        <!-- start: FOOTER -->
        <footer class="footer">
            <div class="container">
                <!-- top footer statrs -->
                <div class="row top-footer">
                    <div class="col-xs-12 col-sm-3 footer-logo-block color-gray">
                    <a class= "footer-logo" href="#"> Ɛąէ Ͳìʍҽ </a> <span>The best family restaurant with Indonesian cuisine and a combination of Asian-European prices, economical prices and professional service</span> </div>
                    <div class="col-xs-12 col-sm-2 pages color-gray">
                    </div>
                </div>
                <!-- top footer ends -->
                <!-- bottom footer statrs -->
                <div class="bottom-footer">
                    <div class="row">
                        <div class="col-xs-12 col-sm-3 payment-options color-gray" style = "padding : 20px;">
                            <h5>Contact Us</h5>
                            <ul>
                                <li>
                                    <a href="#"> <img src="images/phone.png" alt="phone"> </a>
                                </li>
                                <li>
                                    <a href="#"> <img src="images/facebook.png" alt="Facebook"> </a>
                                </li>
                                <li>
                                    <a href="#"> <img src="images/instagram.png" alt="Instagram"> </a>
                                </li>
                                <li>
                                    <a href="#"> <img src="images/email.png" alt="Email"> </a>
                                </li>
            
                            </ul>
                        </div>
                        <div class="col-xs-12 col-sm-4 address color-gray">
                            <h5>Location</h5>
                            <p>The Energy Building 2nd Floor,Lot 11A,SCBD, Jl. Jenderal Sudirman No.Kav. 52-53, RT.5/RW.3, Senayan, Kec. Kby. Baru, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12190</p>
                            <h5>Open Hours</h5> 
                            <p><strong>Everyday  : at 10AM - 10PM </strong></p>

                            </div>
                        <div class="col-xs-12 col-sm-5 additional-info color-gray">
                            <h5>Reservation</h5>
                            <p>(62) 8956784537 or eatime@gmail.com</p>
                        </div>
                    </div>
                </div>
                <!-- bottom footer ends -->
            </div>
        </footer>
        <!-- end:Footer -->
    
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/animsition.min.js"></script>
    <script src="js/bootstrap-slider.min.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/headroom.js"></script>
    <script src="js/foodpicky.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            once: true
        });
    </script>
</body>

</html>