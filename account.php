<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Account</title>
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
				<div class="cols col-12">
					<div class="account_wrapper">
						<h2>This is your account page</h2>
                        <?php
                            if($_SESSION['auth'] == 'yes_auth'){
                                echo 'Hello '.$_SESSION['auth_login'];
                            }else{
                                echo '';
                            }
                        ?>
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
    <script src="js/script.js"></script>
</body>
</html>