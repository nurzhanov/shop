<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){

	include "db_connect.php";

	if (isset ($_POST['login'])) { $login = $_POST['login']; }
	if(isset($_POST['pass'])){ $pass = $_POST['pass']; }
	if(isset($_POST['rememberme'])){ $rememberme = $_POST['rememberme']; }

	if($_POST['rememberme'] == "yes"){
		setcookie("rememberme", $login.'+'.$pass, time()+3600*24*31, "/");
	}

	$query = "SELECT * FROM users WHERE (login = '$login' OR email = '$login') AND password = '$pass'";
	$result = $mysqli->query($query);
	if(mysqli_num_rows($result) > 0){
		$row = mysqli_fetch_assoc($result);
		session_start();
		$_SESSION['auth'] = 'yes_auth'; 
		$_SESSION['auth_login'] = $row['login']; 
		$_SESSION['auth_password'] = $row['password']; 
		$_SESSION['auth_email'] = $row['email'];
		$_SESSION['auth_name'] = $row['name'];
		$_SESSION['auth_surname'] = $row['surname'];
		$_SESSION['auth_phone'] = $row['phone'];
		$_SESSION['auth_address'] = $row['address'];
		echo "yes_auth";
	}else{
		echo "no_auth";
	}
}

?>