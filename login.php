<?php
session_start();
include("include/auth_cookie.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="lib/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="lib/dist/sweetalert.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include "include/header.php";?>
    <section>
    	<div class="container">
    		<div class="row">
				<div class="cols col-6">
					<div class="login_wrapper">
						<h2>Log in to Your account</h2>
						<form name="log_form" action="#" method="post">
							<span class="logtext" id="error_username"></span><br/>
							<input class="loginput" type="text" placeholder="Login or Email" id="login_name"/><br/>
							<span class="logtext" id="error_password"></span><br/>
							<input class="loginput" type="password" placeholder="Password" id="login_pass"/><br/>
							<label class="checksigned checkboxtext"><input class="logcheckbox last" type="checkbox" id="rememberme"/>Keep me signed in</label><br/> 
							<!-- <input type="button" value="Login" /> -->
							<a class="logbutton" id="login" href="#">Log in</a>
						</form>
					</div>
				</div>
				<div class="cols col-6">
					<div class="signup_wrapper">
						<h2>Create Your Account</h2>
						<form id="reg_form" action="#" method="post">
							<span class="logtext" id="error_login"></span><br/>
							<input class="loginput" type="text" placeholder="Login" id="reg_login" /><br/>
							<span class="logtext" id="error_pass"></span><br/>
							<input class="loginput" type="password" placeholder="Password" id="reg_pass" /><br/>
							<span class="logtext" id="error_email"></span><br/>
							<input class="loginput" type="text" placeholder="Email" id="reg_email" /><br/>
							<span class="logtext" id="error_name"></span><br/>
							<input class="loginput" type="text" placeholder="Name" id="reg_name" /><br/>
							<span class="logtext" id="error_surname"></span><br/>
							<input class="loginput" type="text" placeholder="Surname" id="reg_surname" /><br/>
							<span class="logtext" id="error_phone"></span><br/>
							<input class="loginput" type="text" placeholder="Phone number" id="reg_phone" maxlength="10" /><br/>
							<span class="logtext" id="error_address"></span><br/>
							<input class="loginput last" type="text" placeholder="Delivery address" id="reg_address" /><br/>
							<!-- <input type="button" value="Signup" id="signup"> -->
							<a class="logbutton" id="signup" href="#">Sign up</a>
						</form>
					</div>
				</div>
    		</div>
    	</div>
    </section>
    <?php include "include/footer.php";?>
    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script src="js/myjquery.js"></script>
    <script src="js/script.js"></script>
</body>
</html>