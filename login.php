<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>login</title>
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

      <link rel="stylesheet" href="css/login.css">

	  <style type="text/css">
	  #buttn{
		  color: #fff;
		  background-color: #B06932;
		  border:  1px solid #B06932;
    	  border-radius: 5px;
		  cursor: pointer;
	  }

	  #buttn:hover{
		background-color: #E7B36C ;
   		border: 1px solid #E7B36C ;
	  }
	  .form h2{
		  color: #B06932;
	  }
	  
	  .form-module {
		border-top: 5px solid #B06932 !important;
	  }
	  </style>
  
</head>

<body>
	
<?php
include("connection/connect.php"); //INCLUDE CONNECTION
error_reporting(0); // hide undefine index errors
session_start(); // temp sessions
if(isset($_POST['submit']))   // if button is submit
{
	$username = $_POST['username'];
$password = $_POST['password'];

if(!empty($_POST["submit"])) {
    $loginquery = "SELECT * FROM users WHERE username=? && password=?";
    $stmt = mysqli_prepare($db, $loginquery);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ss", $username, md5($password));
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_array($result);

        if(is_array($row)) {
            $_SESSION["user_id"] = $row['u_id'];
            header("refresh:1;url=index.php");
        } else {
            $message = "Invalid Username or Password!";
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Error: " . mysqli_error($db);
    }
}
}
?>
<!-- Form Mixin-->
<!-- Input Mixin-->
<!-- Button Mixin-->
<!-- Pen Title-->

<div class="pen-title">
  <h1>Login Form</h1>
</div>
<!-- Form Module-->
<div class="module form-module">
  <div class="toggle">
   
  </div>
  <div class="form">
    <h2>Login to your account</h2>
	  <span style="color:red;"><?php echo $message; ?></span> 
   <span style="color:green;"><?php echo $success; ?></span>
    <form action="" method="post">
      <input type="text" placeholder="Username"  name="username"/>
      <input type="password" placeholder="Password" name="password"/>
	  <div class="form-group">
                            <img src="generate.php" alt="gambar" />
        </div>
		<div class="form-group">
                            <input class="form-control" name="kode" value="" placeholder="kode captcha" maxlength="5"/>
        </div>
      <input type="submit" id="buttn" name="submit" value="login" />
	  <div class="cta"><a href="admin/index.php" style="color:black;"> Login as Admin</a></div>
    </form>
  </div>
  
  <div class="cta">Not registered?<a href="registration.php" style="color:#B06932;"> Create an account</a></div>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  


  

  

   



</body>

</html>
