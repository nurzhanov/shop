<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){

	include "db_connect.php";

	$result = $mysqli->query("SELECT * FROM cart, products WHERE cart.cart_ip = '{$_SERVER['REMOTE_ADDR']}' AND products.products_id = cart.cart_id_products");
	$count = 0;
	if(mysqli_num_rows($result) > 0){
		$row = mysqli_fetch_assoc($result);
		do{
			$count += $row["cart_count"];
		}while(($row=mysqli_fetch_assoc($result))!=false);
		echo $count;
	}else{
		echo '0';
	}
}
?>