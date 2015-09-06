<?php

session_start();
if(isset($_SESSION['auth']) && $_SESSION['auth'] == 'yes_auth'){
include "include/db_connect.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Account</title>
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
                    <div class="account_wrapper">
                        <h2>This is your account page</h2>
                        <form id="account_form" action="#" method="post">
                            <span class="account-text">Current Password</span><br/>
                            <input class="loginput" type="password" id="cur_pass" /><br/>
                            <span class="account-text">New Password</span><br/>
                            <input class="loginput" type="password" id="new_pass" /><br/>
                            <span class="account-text">Email</span><br/>
                            <input class="loginput" type="text" id="new_email" value="<?php echo $_SESSION['auth_email']?>" /><br/>
                            <span class="account-text">Name</span><br/>
                            <input class="loginput" type="text" id="new_name" value="<?php echo $_SESSION['auth_name']?>" /><br/>
                            <span class="account-text">Surname</span><br/>
                            <input class="loginput" type="text" id="new_surname" value="<?php echo $_SESSION['auth_surname']?>" /><br/>
                            <span class="account-text">Phone number</span><br/>
                            <input class="loginput" type="text" id="new_phone" maxlength="10" value="<?php echo $_SESSION['auth_phone']?>" /><br/>
                            <span class="account-text">Delivery address</span><br/>
                            <input class="loginput last" type="text" id="new_address" value="<?php echo $_SESSION['auth_address']?>" /><br/>
                            <a class="logbutton" id="save" href="#">Save</a>
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
<?php
}
?>