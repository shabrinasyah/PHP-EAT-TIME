<!DOCTYPE html>
<html lang="en">
<?php

session_start();
error_reporting(0);
include("connection/connect.php");

if (isset($_POST['submit'])) {
    if (
        empty($_POST['firstname']) ||
        empty($_POST['lastname']) ||
        empty($_POST['email']) ||
        empty($_POST['phone']) ||
        empty($_POST['password']) ||
        empty($_POST['cpassword']) ||
        empty($_POST['cpassword'])
    ) {
        $message = "All fields must be required!";
    } else {
        $username = $_POST['username'];
        $email = $_POST['email'];

        // Checking if the username already exists
        $stmt = $conn->prepare("SELECT username FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $message = 'Username Already exists!';
        } else {
            // Checking if the email already exists
            $stmt = $conn->prepare("SELECT email FROM users WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                $message = 'Email Already exists!';
            } else {
                // Password validation
                if ($_POST['password'] != $_POST['cpassword']) {
                    $message = "Password not match";
                } elseif (strlen($_POST['password']) < 6) {
                    $message = "Password Must be at least 6 characters";
                } elseif (strlen($_POST['phone']) < 10) {
                    $message = "Invalid phone number!";
                } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                    $message = "Invalid email address, please enter a valid email!";
                } else {
                    // Inserting values into the database using prepared statements
                    $stmt = $conn->prepare("INSERT INTO users (username, f_name, l_name, email, phone, password, address) VALUES (?, ?, ?, ?, ?, ?, ?)");
                    $stmt->bind_param("sssssss", $_POST['username'], $_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['phone'], md5($_POST['password']), $_POST['address']);
                    if ($stmt->execute()) {
                        $success = "Account Created successfully! You will be redirected in 5 seconds.";
                        header("refresh:5;url=login.php");
                    } else {
                        $message = "Error creating account. Please try again later.";
                    }
                }
            }
        }
    }
}
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
    <link rel="stylesheet" href="css/index.css">
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet"> </head>
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
    border: 2px solid #B06932 !important;
    border-radius: 5px !important;
    text-align: center !important;            
    cursor: pointer !important;
    margin: 30px !important;
    transition: background-color 0.3s !important;
}

.theme-btn:hover,
.theme-btn.btn-lg:hover,
.btn-secondary:hover {
    background-color: #E7B36C !important;
    color: #fff !important;
    border: 1px  !important;
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
            <div class="breadcrumb">
               <div class="container">
                  <ul>
                     <li><a href="#" class="active">
					  <span style="color:red;"><?php echo $message; ?></span>
					   <span style="color:green;">
								<?php echo $success; ?>
										</span>
					   
					</a></li>
                    
                  </ul>
               </div>
            </div>
            <section class="contact-page inner-page">
               <div class="container">
                  <div class="row">
                     <!-- REGISTER -->
                     <div class="col-md-8">
                        <div class="widget">
                           <div class="widget-body">
                              
							  <form action="" method="post">
                                 <div class="row">
								  <div class="form-group col-sm-12">
                                       <label for="exampleInputEmail1">User-Name</label>
                                       <input class="form-control" type="text" name="username" id="example-text-input" placeholder="UserName"> 
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputEmail1">First Name</label>
                                       <input class="form-control" type="text" name="firstname" id="example-text-input" placeholder="First Name"> 
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputEmail1">Last Name</label>
                                       <input class="form-control" type="text" name="lastname" id="example-text-input-2" placeholder="Last Name"> 
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputEmail1">Email address</label>
                                       <input type="text" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email"> <small id="emailHelp" class="form-text text-muted">We"ll never share your email with anyone else.</small> 
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputEmail1">Phone number</label>
                                       <input class="form-control" type="text" name="phone" id="example-tel-input-3" placeholder="Phone"> <small class="form-text text-muted">We"ll never share your email with anyone else.</small> 
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputPassword1">Password</label>
                                       <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password"> 
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputPassword1">Repeat password</label>
                                       <input type="password" class="form-control" name="cpassword" id="exampleInputPassword2" placeholder="Password"> 
                                    </div>
									 <div class="form-group col-sm-12">
                                       <label for="exampleTextarea">Delivery Address</label>
                                       <textarea class="form-control" id="exampleTextarea"  name="address" rows="3"></textarea>
                                    </div>
                                   
                                 </div>
                                
                                 <div class="row">
                                    <div class="col-sm-4">
                                       <p> <input type="submit" value="Register" name="submit" class="btn theme-btn"> </p>
                                    </div>
                                 </div>
                              </form>
                           
						   </div>
                           <!-- end: Widget -->
                        </div>
                        <!-- /REGISTER -->
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
         <!-- end:page wrapper -->
      
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