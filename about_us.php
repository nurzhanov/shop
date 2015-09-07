<?php
include "include/db_connect.php";
session_start();
include("include/auth_cookie.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>About us</title>
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
                    <h2>About us</h2>
                </div>
            </div>
            <div class="row">
                <div class="cols col-6">
                    <img src="images/001.jpg" alt="shop1" class="shop1" />
                </div>
                <div class="cols col-6">
                    <img src="images/002.jpg" alt="shop2" class="shop2"/>
                </div>
            </div>
            <div class="row">
                <div class="cols col-12">
                    <p class="about-us-text">Music Shop, LLC, was  founded in October 2009.  Paul "Wilbur" Price worked for  years at  Smith-Holden Music store - a  downtown  Bloomington landmark.  During the closing of the SHM, there was an outpouring of support  from the community and it was decided to continue serving music lovers by opening a new store just a few  blocks away!
                                After years of continued growth and success, the store had  overwhelmingly out-grown it's space!   In Sept of 2013, Melody  Music Shop LLC made the exciting move to it's present location -  1355 W Bloomfield Rd Ste 1 Bloomington, IN 47403.  Meticulously  planned and designed for the Bloomington music community, the  store itself stands out with it's awe-inspiring visual displays,  quality selection of product, organization, clean, and family-  friendly environment.  With ample FREE PARKING in front and  back of the store, it's always easy to drop in and grab just what you need in a prompt and easy manner. 
                                Music Shop strives to stand out with friendly, personal, caring, and knowledgeable customer service! If you ever have any questions, please ask! We love to help people of all ages and backgrounds find happiness and satisfaction in playing music.  We also take great pride in our "Guaranteed Best Price" policy.  If you don't see what you're looking for, please ask and we'll be happy to help you!</p>
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