<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){

	include "db_connect.php";

	$result = $mysqli->query("SELECT * FROM cart WHERE cart_ip = '{$_SERVER['REMOTE_ADDR']}'");
	if(mysqli_num_rows($result) > 0){
		$float = 0;
		$row = mysqli_fetch_assoc($result);
		do{
			$float = $float + ($row["cart_price"] * $row["cart_count"]);
		}while(($row=mysqli_fetch_assoc($result))!=false);
		echo $float;
	}
}
?>