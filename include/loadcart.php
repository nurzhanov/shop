<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){

	include "db_connect.php";

	$result = $mysqli->query("SELECT * FROM cart, products WHERE cart.cart_ip = '{$_SERVER['REMOTE_ADDR']}' AND products.products_id = cart.cart_id_products");
	if(mysqli_num_rows($result) > 0){
		$count = 0;
		while(($row=mysqli_fetch_assoc($result))!=false){
			$count = $count + intval($row["cart_count"]);
			// echo '<span>'.$count.'</span>';
			echo $count;
		}
	}else{
		echo '0';
	}
}
?>