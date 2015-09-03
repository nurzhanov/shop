<?php
include "include/db_connect.php";
session_start();
include("include/auth_cookie.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cart</title>
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
					<div class="cart_wrapper">
						<h2>Cart</h2>
						<?php

							$action = $_GET["action"];
							// Удаляем HTML и PHP-теги из строки	
							$action = strip_tags($action);
							// Экранируем специальные символы в строке для использования в SQL выражении, используя текущий набор символов соединения
							$action = mysqli_real_escape_string($mysqli, $action);
							// Удаляем пробелы (или другие символы) из начала и конца строки
							$action = trim($action);

							switch($action){
								case "oneclick":
									echo '
									<div id="block-step">
										<div id="name-step">
											<ul>
												<li><a class="active">1.Cart</a></li>
												<li><span>&rarr;</span></li>
												<li><a>2.Contacts</a></li>
												<li><span>&rarr;</span></li>
												<li><a>3.Completion</a></li>
											</ul>
										</div>
										<p>Step 1 of 3</p>
										<a href="cart.php?action=clear">Clear</a>
									</div>
									';
									echo '
									<div id="header-list-cart">
										<div id="head1">Item</div>
										<div id="head2">Product Info</div>
										<div id="head3">Quantity</div>
										<div id="head4">Total</div>
									</div>
									';
									echo '
									<div class="block-list-cart">
										<div class="img-cart">
											<p align="center"><img src="" width="" height="" /></p>
										</div>
										<div class="title-cart">
											<p><a href=""></a></p>
										</div>
										<div class="count-cart">
											<ul class="input-count-style">
												<li>
													<p align="center" class="count-minus"></p>
												</li>
												<li>
													<p align="center"><input class="count-input" maxlength="3" type="text" /></p>
												</li>
												<li>
													<p align="center" class="count-minus"></p>
												</li>
											</ul>
										</div>
										<div class="price-product"><h5><span class="span-count"></span>X<span></span></h5></div>
										<div class="delete-cart"><a href=""><img src="images/delete.png"/></a></div>
										<div id="bottom-cart-line"></div>
									</div>
									';
									break;
								case "confirm":
									echo '
									<div id="block-step">
										<div id="name-step">
											<ul>
												<li><a>1.Cart</a></li>
												<li><span>&rarr;</span></li>
												<li><a class="active">2.Contacts</a></li>
												<li><span>&rarr;</span></li>
												<li><a>3.Completion</a></li>
											</ul>
										</div>
										<p>Step 1 of 3</p>
										<a href="cart.php?action=clear">Clear</a>
									</div>
									';
									break;
								case "completion":
									echo '
									<div id="block-step">
										<div id="name-step">
											<ul>
												<li><a>1.Cart</a></li>
												<li><span>&rarr;</span></li>
												<li><a>2.Contacts</a></li>
												<li><span>&rarr;</span></li>
												<li><a class="active">3.Completion</a></li>
											</ul>
										</div>
										<p>Step 1 of 3</p>
										<a href="cart.php?action=clear">Clear</a>
									</div>
									';
									break;

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
    <script src="js/login.js"></script>
    <script src="js/script.js"></script>
</body>
</html>
?>