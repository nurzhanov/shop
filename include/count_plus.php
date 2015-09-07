<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){

	include "db_connect.php";

	if(isset($_POST["id"])){
		$id = $_POST["id"];			
		$id = strip_tags($id);
		$id = mysqli_real_escape_string($mysqli, $id);
		$id = trim($id);
	}

	$result = $mysqli->query("SELECT * FROM cart WHERE cart_id = '$id' AND cart_ip = '{$_SERVER['REMOTE_ADDR']}'");
	if(mysqli_num_rows($result) > 0){
		$row = mysqli_fetch_assoc($result);
		$new_count = $row["cart_count"] + 1;
		$update = $mysqli->query("UPDATE cart SET cart_count='$new_count' WHERE cart_id='$id' AND cart_ip = '{$_SERVER['REMOTE_ADDR']}'");
		echo $new_count;
	}
}

?>