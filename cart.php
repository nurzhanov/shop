<?php
include "include/db_connect.php";
session_start();
include("include/auth_cookie.php");


$action = $_GET["action"];	
$action = strip_tags($action);
$action = mysqli_real_escape_string($mysqli, $action);
$action = trim($action);

// if(isset($_GET["id"])){ $id = $_GET["id"]; } 

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
						<?php
							$action = $_GET["action"];	
							$action = strip_tags($action);
							$action = mysqli_real_escape_string($mysqli, $action);
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

									$query = "SELECT * FROM cart, products WHERE cart.cart_ip = '{$_SERVER['REMOTE_ADDR']}' AND products.products_id = cart.cart_id_products"; 
									$result = $mysqli->query($query);
									if(mysqli_num_rows($result) > 0){
										echo '
										<div id="header-list-cart">
											<div id="head1">Item</div>
											<div id="head2">Product Info</div>
											<div id="head3">Quantity</div>
											<div id="head4">Total</div>
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
											<div class="block-list-cart">
												<div class="img-cart">
													<p align="center"><img src="'.$img_path.'" width="'.$width.'" height="'.$height.'" /></p>
												</div>
												<div class="title-cart">
													<p><a href="">'.$row['title'].'</a></p>
												</div>
												<div class="count-cart">
													<ul class="input-count-style">
														<li>
															<p align="center" class="count-minus">-</p>
														</li>
														<li>
															<p align="center"><input class="count-input" maxlength="3" type="text" value="'.$row['cart_count'].'" /></p>
														</li>
														<li>
															<p align="center" class="count-minus">+</p>
														</li>
													</ul>
												</div>
												<div class="price-product"><h5><span class="span-count">'.$row['cart_count'].'</span>x<span>'.$row['cart_price'].'$</span></h5><p>'.$float_price.'$</p></div>
												<div class="delete-cart"><a href="cart.php?id='.$row['cart_id'].'&action=delete"><img src="images/delete.png"/></a></div>
												<div id="bottom-cart-line"></div>
											</div>
											';
										}
										echo '
												<h2 class="itog-price" align="right">Total:<strong>'.$all_price.'</strong>$</h2>
												<p align="right" class="button-next"><a href="cart.php?action=confirm">Next</a></p>
											';
									}else{
										echo '<h3 id="clear-cart" align="center">Cart is empty</h3>';
									}
									break;

								case "confirm":
									echo '
									<div id="block-step">
										<div id="name-step">
											<ul>
												<li><a href="cart.php?action=oneclick">1.Cart</a></li>
												<li><span>&rarr;</span></li>
												<li><a class="active">2.Contacts</a></li>
												<li><span>&rarr;</span></li>
												<li><a>3.Completion</a></li>
											</ul>
										</div>
										<p>Step 2 of 3</p>
									</div>
									';

									echo '
									<h3>Information Delivery:</h3>
									<form id="order_form" action="#" method="post">
									';
									if(isset($_SESSION['auth'])){
										echo '
												<span class="order-text">Comment</span><br/>
											    <textarea class="order-input" name="order_comment" id="order_comment">'.$_SESSION['order_note'].'</textarea>
											';
										
									}else{
										echo '
										    <span class="order-text">Surname</span><br/>
										    <input class="order-input" type="text" name="order_surname" id="order_surname" value="'.$_SESSION["order_surname"].'" /><br/>
										    <span class="order-text">Email</span><br/>
										    <input class="order-input" type="text" name="order_email" id="order_email" value="'.$_SESSION["order_email"].'" /><br/>
										    <span class="order-text">Phone number</span><br/>
										    <input class="order-input" type="text" name="order_phone" id="order_phone" maxlength="10" value="'.$_SESSION["order_phone"].'"  /><br/>
										    <span class="order-text">Delivery address</span><br/>
										    <input class="order-input" type="text" name="order_address" id="order_address" value="'.$_SESSION["order_address"].'" /><br/>
											<span class="order-text">Comment</span><br/>
											<textarea class="order-input" name="order_comment" id="order_comment">'.$_SESSION['order_comment'].'</textarea>
										';
									}
									echo '
												<a class="button-next" id="order_next" href="cart.php?action=completion">Next</a>
										</form>
										';

									break;
								case "completion":
									echo '
									<div id="block-step">
										<div id="name-step">
											<ul>
												<li><a href="cart.php?action=oneclick">1.Cart</a></li>
												<li><span>&rarr;</span></li>
												<li><a href="cart.php?action=confirm">2.Contacts</a></li>
												<li><span>&rarr;</span></li>
												<li><a class="active">3.Completion</a></li>
											</ul>
										</div>
										<p>Step 3 of 3</p>
									</div>
									';

									if(isset($_SESSION['auth'])){
										echo '
										<ul>
											<li>Surname:<strong>'.$_SESSION['auth_surname'].'</strong></li>
											<li>Email:<strong>'.$_SESSION['auth_email'].'</strong></li>
											<li>Phone number:<strong>'.$_SESSION['auth_phone'].'</strong></li>
											<li>Delivery address:<strong>'.$_SESSION['auth_address'].'</strong></li>
											<li>Comment<strong></strong>'.$_SESSION['order_note'].'</li>
										</ul>
										';
									}else{
										echo '
										<ul>
											<li>Surname:<strong>'.$_SESSION['order_surname'].'</strong></li>
											<li>Email:<strong>'.$_SESSION['order_email'].'</strong></li>
											<li>Phone number:<strong>'.$_SESSION['order_phone'].'</strong></li>
											<li>Delivery address:<strong>'.$_SESSION['order_address'].'</strong></li>
											<li>Comment<strong>'.$_SESSION['order_comment'].'</strong></li>
										</ul>
										';
									}
									echo '
									<h2>Total price:<strong>'.$total_price.'</strong>$</h2>
									<a class="button-next" href="#">Pay</a>				
									';
									
									break;

								default:
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

									$query = "SELECT * FROM cart, products WHERE cart.cart_ip = '{$_SERVER['REMOTE_ADDR']}' AND products.products_id = cart.cart_id_products"; 
									$result = $mysqli->query($query);
									if(mysqli_num_rows($result) > 0){
										echo '
										<div id="header-list-cart">
											<div id="head1">Item</div>
											<div id="head2">Product Info</div>
											<div id="head3">Quantity</div>
											<div id="head4">Total</div>
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
											<div class="block-list-cart">
												<div class="img-cart">
													<p align="center"><img src="'.$img_path.'" width="'.$width.'" height="'.$height.'" /></p>
												</div>
												<div class="title-cart">
													<p><a href="">'.$row['title'].'</a></p>
												</div>
												<div class="count-cart">
													<ul class="input-count-style">
														<li>
															<p align="center" class="count-minus">-</p>
														</li>
														<li>
															<p align="center"><input class="count-input" maxlength="3" type="text" value="'.$row['cart_count'].'" /></p>
														</li>
														<li>
															<p align="center" class="count-minus">+</p>
														</li>
													</ul>
												</div>
												<div class="price-product"><h5><span class="span-count">'.$row['cart_count'].'</span>x<span>'.$row['cart_price'].'$</span></h5><p>'.$float_price.'$</p></div>
												<div class="delete-cart"><a href="cart.php?id='.$row['cart_id'].'&action=delete"><img src="images/delete.png"/></a></div>
												<div id="bottom-cart-line"></div>
											</div>
											';
										}
										echo '
												<h2 class="itog-price" align="right">Total:<strong>'.$all_price.'</strong>$</h2>
												<p align="right" class="button-next"><a href="cart.php?action=confirm">Next</a></p>
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