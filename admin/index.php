<!DOCTYPE html>
<html lang="en">
<?php
include("../connection/connect.php");
error_reporting(0);
session_start();

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!empty($_POST["submit"])) {
        $stmt = $db->prepare("SELECT * FROM admin WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                // Password is correct
                $_SESSION["adm_id"] = $row['adm_id'];
                header("refresh:1;url=dashboard.php");
            } else {
                // Password is incorrect
                $message = "Invalid Password!";
            }
        } else {
            // Username not found
            $message = "Invalid Username!";
        }
    }
}

if (isset($_POST['submit1'])) {
    // Proses simpan data ke dalam database
    $username = $_POST['cr_user'];
    $email = $_POST['cr_email'];
    $password = $_POST['cr_pass'];
    $code = $_POST['code'];

    // Lakukan validasi data lainnya jika diperlukan

    $stmt = $db->prepare("INSERT INTO admin (username, password, email, code) VALUES (?, ?, ?, ?)");
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $stmt->bind_param("ssss", $username, $hashedPassword, $email, $code);
    if ($stmt->execute()) {
        $success = "Admin Added successfully!";
    } else {
        $message = "Error: " . $stmt->error;
    }
}
?>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900'>
    <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Montserrat:400,700'>
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
<div class="container">
    <div class="info">
        <h1>Administration </h1><span> login Account</span>
    </div>
</div>
<div class="form">
    <div class="thumbnail"><img src="images/manager.png"/></div>
    <form class="register-form" action="index.php" method="post">
        <input type="text" placeholder="username" name="cr_user"/>
        <input type="text" placeholder="email address" name="cr_email"/>
        <input type="password" placeholder="password" name="cr_pass"/>
        <input type="password" placeholder="Confirm password" name="cr_cpass"/>
        <input type="password" placeholder="Unique-Code" name="code"/>
        <input type="submit" name="submit1" value="Create"/>
        <p class="message">Already registered? <a href="#">Sign In</a></p>
    </form>

    <!-- <span>Username: admin</span>&nbsp;<br><span>Password: 1234</span><br><br> -->
    <span style="color:red;"><?php echo $message; ?></span>
    <span style="color:green;"><?php echo $success; ?></span>
    <form class="login-form" action="index.php" method="post">
        <input type="text" placeholder="username" name="username"/>
        <input type="password" placeholder="password" name="password"/>
        <div class="form-group">
                            <img src="generate.php" alt="gambar" />
        </div>
		<div class="form-group">
                            <input class="form-control" name="kode" value="" placeholder="kode captcha" maxlength="5"/>
        </div>
        <input type="submit" name="submit" value="login"/>
        <p class="message">Not registered? <a href="#">Create an account</a></p>
    </form>
</div>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='js/index.js'></script>
</body>
</html>
