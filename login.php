<?php
session_start();
include("include/auth_cookie.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Shop</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
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
						<h2>Login to your account</h2>
						<form name="log_form" action="#" method="post">
							<span>Login or Email</span><br/>
							<input type="text" placeholder="e.g., han_solo" id="login_name"/><br/>
							<span>Password</span><br/>
							<input type="password" placeholder="e.g., ******" id="login_pass"/><br/>
							<label class="checksigned"><input type="checkbox" id="rememberme"/>Keep me signed in</label><br/> 
							<!-- <input type="button" value="Login" /> -->
							<a id="login">Login</a>
						</form>
					</div>
				</div>
				<div class="cols col-6">
					<div class="signup_wrapper">
						<h2>Create a Your Account</h2>
						<form id="reg_form" action="#" method="post">
							<span>Login</span><br/>
							<input type="text" placeholder="e.g., han_solo" id="reg_name" /><br/>
							<span>Email</span><br/>
							<input type="text" placeholder="e.g., hs@gmail.com" id="reg_email" /><br/>
							<span>Password</span><br/>
							<input type="password" placeholder="e.g., ******" id="reg_pass" /><br/>
							<input type="button" value="Signup" id="signup">
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
    <script src="js/events.js"></script>
    <script src="js/login.js"></script>
    <script src="js/script.js"></script>
</body>
</html>