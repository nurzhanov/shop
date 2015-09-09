<?php
include "include/db_connect.php";
session_start();
include("include/auth_cookie.php");

$action = $_GET["action"];	
$action = strip_tags($action);
$action = mysqli_real_escape_string($mysqli, $action);
$action = trim($action);



if(isset($_GET["id"])){
	$id = $_GET["id"];		
	// Удаляем HTML и PHP-теги из строки	
	$id = strip_tags($id);
	// Экранируем специальные символы в строке для использования в SQL выражении, используя текущий набор символов соединения
	$id = mysqli_real_escape_string($mysqli, $id);
	// Удаляем пробелы (или другие символы) из начала и конца строки
	$id = trim($id);
}

if(!isset($_SESSION['order_surname'])){ $_SESSION['order_surname'] = ""; }
if(!isset($_SESSION['order_email'])){ $_SESSION['order_email'] = ""; }
if(!isset($_SESSION['order_phone'])){ $_SESSION['order_phone'] = ""; }
if(!isset($_SESSION['order_address'])){ $_SESSION['order_address'] = ""; }
if(!isset($_SESSION['order_comment'])){ $_SESSION['order_comment'] = ""; }
if(!isset($_SESSION['order_note'])){ $_SESSION['order_note'] = ""; }

switch($action){
	case 'clear':
		$clear = $mysqli->query("DELETE FROM cart WHERE cart_ip = '{$_SERVER['REMOTE_ADDR']}'");
		break;
	case 'delete':
		$delete = $mysqli->query("DELETE FROM cart WHERE cart_id ='$id' AND cart_ip='{$_SERVER['REMOTE_ADDR']}'");
		break;
}

$query_total_price = "SELECT * FROM cart, products WHERE cart.cart_ip = '{$_SERVER['REMOTE_ADDR']}' AND products.products_id = cart.cart_id_products"; 
$result_total_price = $mysqli->query($query_total_price);
if(mysqli_num_rows($result_total_price) > 0){
	$fprice = 0;
	while(($row=mysqli_fetch_assoc($result_total_price))!=false){
		$fprice = $fprice + ($row["price"] * $row["cart_count"]);		
		$total_price = $fprice;	
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cart</title>
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
		<div class="cart_wrapper">
			<div class="container">
						<?php
						$action = $_GET["action"];	
						$action = strip_tags($action);
						$action = mysqli_real_escape_string($mysqli, $action);
						$action = trim($action);
						switch($action){
							case "oneclick":
								echo '
								<div class="row">
									<div class="cols col-12">
										<div id="block-step">
											<div id="name-step">
												<ul>
													<li><a class="active">1.Cart</a></li>
													<li><a>2.Contacts</a></li>
													<li><a>3.Completion</a></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="cols col-6">
										<p class="nmb_step">Step 1 of 3</p>
									</div>
									<div class="cols col-6">
										<a id="clear_cart" href="cart.php?action=clear">Clear</a>
									</div>
								</div>
								';
								$query = "SELECT * FROM cart, products WHERE cart.cart_ip = '{$_SERVER['REMOTE_ADDR']}' AND products.products_id = cart.cart_id_products"; 
								$result = $mysqli->query($query);
								if(mysqli_num_rows($result) > 0){
									echo '
									<div class="row">
										<div class="cols col-2">
											<div class="head-list" id="head1">Item</div>
										</div>
										<div class="cols col-3">
											<div class="head-list" id="head2">Product Info</div>
										</div>
										<div class="cols col-3">
											<div class="head-list" id="head3">Quantity</div>
										</div>
										<div class="cols col-2">
											<div class="head-list" id="head4">Total</div>
										</div>
										<div class="cols col-2">
											<div class="head-list" id="head5"></div>
										</div>
									</div>
									';
									$all_price = 0;
									while(($row=mysqli_fetch_assoc($result))!=false){
										$float_price = $row["cart_price"] * $row["cart_count"];		
										$all_price += $float_price;	
										if(strlen($row["image"]) > 0 && file_exists("./products_images/".$row["image"])){
											$img_path = "./products_images/".$row["image"];
											$max_width = 100;
											$max_height = 100;
											list($width, $height) = getimagesize($img_path);
											$ratioh = $max_height/$height;
											$ratiow = $max_width/$width;
											$ratio = min($ratioh, $ratiow);
											$width = intval($ratio*$width);
                                    		$height = intval($ratio*$height);
										}else{
											$img_path = "images/no-image.png";
                                    		$width = 100;
                                    		$height = 100;
										}
										echo '
										<div class="row">
											<div class="block-list-cart">
												<div class="cols col-2">
													<div class="img-cart">
														<p align="center"><img src="'.$img_path.'" width="'.$width.'" height="'.$height.'" /></p>
													</div>
												</div>
												<div class="cols col-3">
													<div class="title-cart">
														<p><a href="">'.$row['title'].'</a></p>
													</div>
												</div>
												<div class="cols col-3">
													<div class="count-cart">
														<ul class="input-count-style">
															<li>
																<p align="center" curid="'.$row['cart_id'].'" class="count-minus">-</p>
															</li>
															<li>
																<p align="center"><input curid="'.$row['cart_id'].'" id="input_id'.$row['cart_id'].'" class="count-input" maxlength="3" type="text" value="'.$row['cart_count'].'" readonly /></p>
															</li>
															<li>
																<p align="center" curid="'.$row['cart_id'].'" class="count-plus">+</p>
															</li>
														</ul>				
													</div>
												</div>
												<div class="cols col-2">
													<div id="tovar'.$row['cart_id'].'" class="price-product"><h5><span class="span-count">'.$row['cart_count'].'</span>x<span>'.$row['cart_price'].'$</span></h5><p price="'.$row['cart_price'].'">'.$float_price.'$</p></div>
												</div>
												<div class="cols col-2">
													<div class="delete-cart"><a href="cart.php?id='.$row['cart_id'].'&action=delete"><img src="images/delete.png"/></a></div>
												</div>
											</div>
										</div>
										';
									}
									echo '
										<div class="row">
											<div class="cols col-12">
												<h2 class="itog-price" align="right">Total:<strong>'.$all_price.'</strong>$</h2>
												<p align="right"><a class="primary-button" href="cart.php?action=confirm">Next</a></p>
											</div>
										</div>
									';
								}else{
									echo '<h3 id="clear-cart" align="center">Cart is empty</h3>';
								}
								break;
							case "confirm":
								echo '
								<div class="row">
									<div class="cols col-12">
										<div id="block-step">
											<div id="name-step">
												<ul>
													<li><a href="cart.php?action=oneclick">1.Cart</a></li>
													<li><a class="active">2.Contacts</a></li>
													<li><a>3.Completion</a></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="cols col-12">
										<p class="nmb_step">Step 2 of 3</p>
									</div>
								</div>
								';
								echo '
								<div class="row">
									<div class="cols col-12">
										<h3>Information Delivery:</h3>
									</div>
								</div>
								';
								if(isset($_SESSION['auth'])){
									echo '
										<div class="row">
											<div class="cols col-6">
												<span class="primary-text" id="error_order_text"></span><br/>
												<input class="primary-input" type="text" placeholder="Surname" id="order_surname" value="'.$_SESSION["auth_surname"].'" /><br/>
												<span class="primary-text" id="error_order_email"></span><br/>
												<input class="primary-input" type="text" placeholder="Email" id="order_email" value="'.$_SESSION["auth_email"].'" /><br/>
												<span class="primary-text" id="error_order_phone"></span><br/>
												<input class="primary-input" type="text" placeholder="Phone number" id="order_phone" maxlength="10" value="'.$_SESSION["auth_phone"].'"  /><br/>
												<span class="primary-text" id="error_order_address"></span><br/>
												<input class="primary-input" type="text" placeholder="Delivery address" id="order_address" value="'.$_SESSION["auth_address"].'" /><br/>
												<span class="account-text">Comment</span><br/>
												<textarea class="primary-comment last" id="order_comment">'.$_SESSION['order_note'].'</textarea>
											</div>
										</div>
									';
									}else{
										echo '
										<div class="row">
											<div class="cols col-6">
												<span class="primary-text" id="error_order_text"></span><br/>
												<input class="primary-input" type="text" placeholder="Surname" name="order_surname" id="order_surname" value="'.$_SESSION["order_surname"].'" /><br/>
												<span class="primary-text" id="error_order_email"></span><br/>
												<input class="primary-input" type="text" placeholder="Email" name="order_email" id="order_email" value="'.$_SESSION["order_email"].'" /><br/>
												<span class="primary-text" id="error_order_phone"></span><br/>
												<input class="primary-input" type="text" placeholder="Phone number" name="order_phone" id="order_phone" maxlength="10" value="'.$_SESSION["order_phone"].'"  /><br/>
												<span class="primary-text" id="error_order_address"></span><br/>
												<input class="primary-input" type="text" placeholder="Delivery address" name="order_address" id="order_address" value="'.$_SESSION["order_address"].'" /><br/>
												<span class="primary-text" id="error_order_comment"></span><br/>
												<textarea class="primary-comment last" placeholder="Your comment here" id="order_comment">'.$_SESSION['order_comment'].'</textarea><br/>  
											</div>
										</div> 
										';
									}
									echo '
									<div class="row">
										<div class="cols col-6">
											<a class="primary-button" id="order_next" href="cart.php?action=completion">Next</a>
										</div>
									</div>
									';

								break;
							case "completion":
								echo '
								<div class="row">
									<div class="cols col-12">
										<div id="block-step">
											<div id="name-step">
												<ul>
													<li><a href="cart.php?action=oneclick">1.Cart</a></li>
													<li><a href="cart.php?action=confirm">2.Contacts</a></li>
													<li><a class="active">3.Completion</a></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="cols col-12">
										<p class="nmb_step">Step 3 of 3</p>
									</div>
								</div>
								';
								if(isset($_SESSION['auth'])){
										echo '
										<div class="row">
											<div class="cols col-6">
												<div class="pay-info">
													<ul>
														<li>Surname:<strong>'.$_SESSION['auth_surname'].'</strong></li>
														<li>Email:<strong>'.$_SESSION['auth_email'].'</strong></li>
														<li>Phone number:<strong>'.$_SESSION['auth_phone'].'</strong></li>
														<li>Delivery address:<strong>'.$_SESSION['auth_address'].'</strong></li>
														<li>Comment<strong></strong>'.$_SESSION['order_note'].'</li>
													</ul>
												</div>
											</div>
										</div>
										';
									}else{
										echo '
										<div class="row">
											<div class="cols col-6">
												<div class="pay-info">
													<ul>
														<li>Surname:<strong>'.$_SESSION['order_surname'].'</strong></li>
														<li>Email:<strong>'.$_SESSION['order_email'].'</strong></li>
														<li>Phone number:<strong>'.$_SESSION['order_phone'].'</strong></li>
														<li>Delivery address:<strong>'.$_SESSION['order_address'].'</strong></li>
														<li>Comment<strong>'.$_SESSION['order_comment'].'</strong></li>
													</ul>
												</div>
											</div>
										</div>
										';
									}
									echo '
									<div class="row">
										<div class="cols col-6">
											<h2 class="tprice">Total price:<strong>'.$total_price.'</strong>$</h2>
											<a class="primary-button" id="pay" href="#">Pay</a>
										</div>
									</div>				
									';
								break;
							default:
								echo '
								<div class="row">
									<div class="cols col-12">
										<div id="block-step">
											<div id="name-step">
												<ul>
													<li><a class="active">1.Cart</a></li>
													<li><a>2.Contacts</a></li>
													<li><a>3.Completion</a></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="cols col-6">
										<p class="nmb_step">Step 1 of 3</p>
									</div>
									<div class="cols col-6">
										<a id="clear_cart" href="cart.php?action=clear">Clear</a>
									</div>
								</div>
								';
								$query = "SELECT * FROM cart, products WHERE cart.cart_ip = '{$_SERVER['REMOTE_ADDR']}' AND products.products_id = cart.cart_id_products"; 
								$result = $mysqli->query($query);
								if(mysqli_num_rows($result) > 0){
									echo '
									<div class="row">
										<div class="cols col-2">
											<div class="head-list" id="head1">Item</div>
										</div>
										<div class="cols col-3">
											<div class="head-list" id="head2">Product Info</div>
										</div>
										<div class="cols col-3">
											<div class="head-list" id="head3">Quantity</div>
										</div>
										<div class="cols col-2">
											<div class="head-list" id="head4">Total</div>
										</div>
										<div class="cols col-2">
											<div class="head-list" id="head5"></div>
										</div>
									</div>
									';
									$all_price = 0;
									while(($row=mysqli_fetch_assoc($result))!=false){
										$float_price = $row["cart_price"] * $row["cart_count"];		
										$all_price += $float_price;	
										if(strlen($row["image"]) > 0 && file_exists("./products_images/".$row["image"])){
											$img_path = "./products_images/".$row["image"];
											$max_width = 100;
											$max_height = 100;
											list($width, $height) = getimagesize($img_path);
											$ratioh = $max_height/$height;
											$ratiow = $max_width/$width;
											$ratio = min($ratioh, $ratiow);
											$width = intval($ratio*$width);
                                    		$height = intval($ratio*$height);
										}else{
											$img_path = "images/no-image.png";
                                    		$width = 100;
                                    		$height = 100;
										}
										echo '
										<div class="row">
											<div class="block-list-cart">
												<div class="cols col-2">
													<div class="img-cart">
														<p align="center"><img src="'.$img_path.'" width="'.$width.'" height="'.$height.'" /></p>
													</div>
												</div>
												<div class="cols col-3">
													<div class="title-cart">
														<p><a href="">'.$row['title'].'</a></p>
													</div>
												</div>
												<div class="cols col-3">
													<div class="count-cart">
														<ul class="input-count-style">
															<li>
																<p align="center" curid="'.$row['cart_id'].'" class="count-minus">-</p>
															</li>
															<li>
																<p align="center"><input curid="'.$row['cart_id'].'" id="input_id'.$row['cart_id'].'" class="count-input" maxlength="3" type="text" value="'.$row['cart_count'].'" readonly /></p>
															</li>
															<li>
																<p align="center" curid="'.$row['cart_id'].'" class="count-plus">+</p>
															</li>
														</ul>				
													</div>
												</div>
												<div class="cols col-2">
													<div id="tovar'.$row['cart_id'].'" class="price-product"><h5><span class="span-count">'.$row['cart_count'].'</span>x<span>'.$row['cart_price'].'$</span></h5><p price="'.$row['cart_price'].'">'.$float_price.'$</p></div>
												</div>
												<div class="cols col-2">
													<div class="delete-cart"><a href="cart.php?id='.$row['cart_id'].'&action=delete"><img src="images/delete.png"/></a></div>
												</div>
											</div>
										</div>
										';
									}
									echo '
										<div class="row">
											<div class="cols col-12">
												<h2 class="itog-price" align="right">Total:<strong>'.$all_price.'</strong>$</h2>
												<p align="right" class="button-next"><a href="cart.php?action=confirm">Next</a></p>
											</div>
										</div>
									';
								}else{
									echo '<h3 id="clear-cart" align="center">Cart is empty</h3>';
								}
								break;
						}
						?>
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

