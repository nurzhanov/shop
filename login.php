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
    <?php include "header.php";?>
    <section>
    	<div class="container">
    		<div class="row">
				<div class="cols col-6">
					<div class="login_wrapper">
						<h2>Login to your account</h2>
						<form name="login_form" action="#" method="get">
							<input type="text" placeholder="Login" name="login_name"/><br/>
							<input type="password" placeholder="Password" name="login_pass" /><br/>
							<input type="submit" value="Login">
						</form>
					</div>
				</div>
				<div class="cols col-6">
					<div class="signup_wrapper">
						<h2>New User Signup!</h2>
						<form name="signup_form" action="/shop/server.php" method="get">
							<input type="text" placeholder="Login" name="login_signup" /><br/>
							<input type="email" placeholder="Email" name="email_signup" /><br/>
							<input type="password" placeholder="Password" name="pass_signup" /><br/>
							<input type="submit" value="Signup" >
						</form>
					</div>
				</div>
    		</div>
    	</div>
    </section>
     <?php include "footer.php";?>
    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script src="js/script.js"></script>
</body>
</html>