<?php
include "include/db_connect.php";
if($_SERVER["REQUEST_METHOD"] == "POST"){
	if (isset ($_POST['rname'])) { $login = $_POST['rname']; }
	if (isset ($_POST['remail'])) { $email = $_POST['remail']; }
	if (isset ($_POST['rpass'])) { $pass = $_POST['rpass']; }
	$query_check_login = "SELECT login FROM reg_user WHERE login = '$login'";
	$result_login = $mysqli->query($query_check_login);
	if(mysqli_num_rows($result_login) > 0){
		echo "false";
	}else{
		$query_reg = "INSERT INTO reg_user (login, email, pass) VALUES ('".$login."','".$email."','".$pass."')";
		$result_reg = $mysqli->query($query_reg);
		echo "true";
	}
}
?>