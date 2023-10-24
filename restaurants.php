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
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">
    <title>EAT@TIME</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet"> </head>
    <link rel="stylesheet" href="css/index.css">
    <style>
.form-control-lg,
.dropdown-menu,
.btn,
.btn-group-lg>.btn,
.btn-lg,
.img-rounded {
    border-radius: 2px !important;
}

.btn {
    transition: all .4s !important;
}

.btn-secondary {
    color: #373a3c !important;
    background-color: rgba(252, 251, 249, 0.68) !important;
    border-color: #eaebeb !important;
}

.theme-btn {
    background-color: #B06932 !important;
    color: white !important; 
    border: none !important;
    border-radius: 5px !important;
    padding: 10px 20px !important;
    text-align: center !important;            
    cursor: pointer !important;
    margin: 30px !important;
    transition: background-color 0.3s !important;
}

.theme-btn-dash {
    border: 2px dashed #B06932 !important;
    background-color: transparent;
    color: #B06932 !important;
}

.theme-btn-dash:hover,
.theme-btn,
.theme-btn.btn-lg:hover,
.btn-secondary:hover {
    background-color:#E7B36C !important;
    color: #fff !important;
    border: 1px solid#E7B36C !important;
}

.theme-btn-dash:hover {
    border: 2px solid #E7B36C !important;
    color: #fff
}

.bg-white {
    background-color: #fff
}

.primary-color {
    color: #B06932 !important;
}


    </style>

<body>
           <!--header starts-->
        <header id="header" class="header-scroll top-header headrom">
            <!-- .navbar -->
             <nav class="navbar navbar-dark">
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
        <div class="page-wrapper">
            <!-- top Links -->
            <div class="top-links">
                <div class="container">
                    <ul class="row links">
                       
                        <li class="col-xs-12 col-sm-4 link-item active"><span>1</span><a href="restaurants.php">Choose Category</a></li>
                        <li class="col-xs-12 col-sm-4 link-item"><span>2</span><a href="#">Pick Your Favorite food</a></li>
                        <li class="col-xs-12 col-sm-4 link-item"><span>3</span><a href="#">Order and Pay online</a></li>
                    </ul>
                </div>
            </div>
            <!-- end:Top links -->
            <!-- start: Inner page hero -->
            <div class="inner-page-hero bg-image" data-image-src="images/img/main2.jpg">
                <div class="container"> </div>
                <!-- end:Container -->
            </div>
            <div class="result-show">
                <div class="container">
                    <div class="row">
                       
                       
                    </div>
                </div>
            </div>
            <!-- //results show -->
            <section class="restaurants-page">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-3">
                          
                          
                           
                                <!-- /widget heading -->
                             
                                
                         
                            <!-- end:Widget -->
                        </div>
                        <div class="col-xs-12 col-sm-7 col-md-7 col-lg-9">
                            <div class="bg-gray restaurant-entry">
                                <div class="row">
								<?php $ress= mysqli_query($db,"select * from restaurant");
									      while($rows=mysqli_fetch_array($ress))
										  {
													
						
													 echo' <div class="col-sm-12 col-md-12 col-lg-8 text-xs-center text-sm-left">
															<div class="entry-logo">
																<a class="img-fluid" href="dishes.php?res_id='.$rows['rs_id'].'" > <img src="admin/Res_img/'.$rows['image'].'" alt="Food logo"></a>
															</div>
															<!-- end:Logo -->
															<div class="entry-dscr">
                                                            <h5><a href="dishes.php?res_id='.$rows['rs_id'].'" style = "color :#B06932;">'.$rows['category'].'</a></h5> <span>'.$rows['address'].' </span>
																
															</div>
															<!-- end:Entry description -->
														</div>
														
														 <div class="col-sm-12 col-md-12 col-lg-4 text-xs-center">
																<div class="right-content bg-white">
																	<div class="right-review">
																		
																		 <a href="dishes.php?res_id='.$rows['rs_id'].'" class="btn theme-btn-dash">View Menu</a> </div>
																</div>
																<!-- end:right info -->
															</div>';
										  }
						
						
						?>
                                    
                                </div>
                                <!--end:row -->
                            </div>
                         
                            
                                
                            </div>
                          
                          
                           
                        </div>
                    </div>
                </div>
            </section>
           
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
        </div>
  
    
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
</body>

</html>