<?php
include "include/db_connect.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
	$login_name = $_GET['lname'];
	$login_pass = $_GET['lpass'];
	$login_rememberme = $_GET['rememberme'];

	if($login_rememberme == "yes"){
		// записываем логин и пароль в куки, продолжительность жизни которой один месяц
		// и устанавливаем это для всех браузеров
		setcookie("rememberme", $login_name.'+'.$login_pass, time()+3600*24*31, "/");
	}

	$query_login_user = "SELECT * FROM reg_user WHERE (login = '$login_name' OR email = '$login_name') AND pass = '$login_pass'";
	$result_login_user = $mysqli->query($query_login_user);
	if(mysqli_num_rows($result_login_user) > 0){
		$row = mysqli_fetch_assoc($result_login_user);
		session_start();
		$_SESSION['auth'] = 'yes_auth'; 
		$_SESSION['auth_login'] = $row['login']; 
		$_SESSION['auth_path'] = $row['pass']; 
		$_SESSION['auth_email'] = $row['email']; 
		// print_r($_SESSION);
		echo "yes_auth";
	}else{
		echo "no_auth";
	}
}

?>