<?php
include "include/db_connect.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
	$login = $_GET['rname'];
	$email = $_GET['remail'];
	$pass = $_GET['rpass'];
	$query_check_login = "SELECT login FROM reg_user WHERE login = '$login'";
	$result_login = $mysqli->query($query_check_login);
	if(mysqli_num_rows($result_login) > 0){
		// echo "Login is used";
		echo "false";
	}else{
		$query_reg = "INSERT INTO reg_user (login, email, pass) VALUES (
																		'".$login."',
																		'".$email."',
																		'".$pass."'
																		        )";
		$result_reg = $mysqli->query($query_reg);
		// echo "New user was created";
		echo "true";
	}
}

?>