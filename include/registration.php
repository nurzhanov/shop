<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){

	include "db_connect.php";

	if (isset ($_POST['login'])) { $login = $_POST['login']; }
	if (isset ($_POST['pass'])) { $pass = $_POST['pass']; }
	if (isset ($_POST['email'])) { $email = $_POST['email']; }
	if (isset ($_POST['name'])) { $name = $_POST['name']; }
	if (isset ($_POST['surname'])) { $surname = $_POST['surname']; }
	if (isset ($_POST['phone'])) { $phone = $_POST['phone']; }
	if (isset ($_POST['address'])) { $address = $_POST['address']; }
	$ip = $_SERVER['REMOTE_ADDR'];

	$query = "SELECT login FROM users WHERE login = '$login'";
	$result = $mysqli->query($query);
	if(mysqli_num_rows($result) > 0){
		echo "false";
	}else{
		$query_reg = "INSERT INTO users (login, password, email, name, surname, phone, address, ip) VALUES (
															'".$login."',
															'".$pass."',
															'".$email."',
															'".$name."',
															'".$surname."',
															'".$phone."',
															'".$address."',
															'".$ip."'
															)";
		$result_reg = $mysqli->query($query_reg);
		echo "true";
	}
}
?>