<?php
session_start();
include("include/auth_cookie.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact us</title>
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
				<div class="cols col-8">
					<div class="contact-form">
                        <h2>How can we help you?</h2>
                        <p>Do you have questions, wishes or comments about Music Shop?
                        We would be happy if you send us a message.
                        Your Music Shop Support Team</p>
                        <h2>Get In Touch</h2>
                        <form id="info_form" action="#" method="post">
                            <span class="primary-text" id="error_inf_name"></span><br/>
                            <input class="primary-input" id="info_name" type="text" placeholder="Name" /><br/>
                            <span class="primary-text" id="error_inf_email"></span><br/>
                            <input class="primary-input" id="info_email" type="text" placeholder="Email" /><br/>
                            <span class="primary-text" id="error_inf_subject"></span><br/>
                            <input class="primary-input" id="info_subject" type="text" placeholder="Subject" /><br/>
                            <span class="primary-text" id="error_inf_message"></span><br/>
                            <!-- <input class="loginput" id="info_message" placeholder="Your Message Here" /><br/> -->
                            <textarea class="primary-comment last" id="info_message" placeholder="Message"></textarea><br/>
                            <a class="primary-button" id="info_send" href="#">Send</a>
                        </form>
					</div>
				</div>
				<div class="cols col-4">
					<div class="contact-info">
						<h2 class="make-center">Contact Info</h2>
                        <address>
                            <p>Music Shop Inc.</p>
                            <p>135 W. Webster Ave New Streets Chicago, IL 60614, NY</p>
                            <p>NY USA</p>
                            <p>Phone: 0-800 10 20 30</p>
                            <p>Fax: 514-152-0126</p>
                            <p>Email: info@music-shop.com</p>
                        </address>
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