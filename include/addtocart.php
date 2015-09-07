<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){

	include "db_connect.php";

	if (isset ($_POST['id'])) { $id = $_POST['id']; }

	$result = $mysqli->query("SELECT * FROM cart WHERE cart_ip = '{$_SERVER['REMOTE_ADDR']}' AND cart_id_products = '$id'");
	if(mysqli_num_rows($result) > 0){
		$row = mysqli_fetch_assoc($result);
		$new_count = (int)$row["cart_count"] + 1;
		$update = $mysqli->query("UPDATE cart SET cart_count = '$new_count' WHERE cart_ip = '{$_SERVER['REMOTE_ADDR']}' AND cart_id_products = '$id'");
	}else{
		$result = $mysqli->query("SELECT * FROM products WHERE products_id = '$id'");
		$row = mysqli_fetch_assoc($result);
		$mysqli->query("INSERT INTO cart(cart_id_products, cart_price, cart_datetime, cart_ip) VALUES(
	 																				'".$row['products_id']."',
	 																				'".$row['price']."',
	 																				NOW(),
	 																				'".$_SERVER['REMOTE_ADDR']."'
																					)");
	}
}
?>