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
                        <!-- <a href="#" id="boo">SOMETEXT</a> -->
                        <h2 class="make-center">How can we help you?</h2>
                        <p>Do you have questions, wishes or comments about Music Shop?
                        We would be happy if you send us a message.
                        Your Music Shop Support Team</p>
                        <h2>Get In Touch</h2>
                        <form id="info_form" action="#" method="post">
                            <input id="info_name" type="text" placeholder="Name" />
                            <input id="info_email" type="text" placeholder="Email" /><br/>
                            <input id="info_subject" type="text" placeholder="Subject" /><br/>
                            <textarea id="info_message" placeholder="Your Message Here"></textarea><br/>
                            <input type="button" id="info_send" value="Send"/>
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
                            <p>Mobile: +49 221 888 44</p>
                            <p>Fax: 514-152-0126</p>
                            <p>Email: info@music-shopp.com</p>
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
    <script src="js/events.js"></script>
    <script src="js/contacts.js"></script>
    <script src="js/script.js"></script>
</body>
</html>