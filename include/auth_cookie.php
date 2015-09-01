<?php
include "include/db_connect.php";

if($_SESSION['auth'] != 'yes_auth' && $_COOKIE['rememberme']){
	$str = $_COOKIE['rememberme'];

	echo $str;

	// вся строка
	$all_len = strlen($str);

	$login_len = strpos($str, "+");
	$login = substr($str,0, $login_len);

	$pass = substr($str, $login_len+1, $all_len);

	$query_cookie = "SELECT * FROM reg_user WHERE (login = '$login' OR email = '$login') AND pass = '$pass'";
	$result_cookie = $mysqli->query($query_cookie);
	if(mysqli_num_rows($result_cookie) > 0){
		$row = mysqli_fetch_assoc($result_cookie);
		session_start();
		$_SESSION['auth'] = 'yes_auth'; 
		$_SESSION['auth_login'] = $row['login']; 
		$_SESSION['auth_path'] = $row['pass']; 
		$_SESSION['auth_email'] = $row['email']; 
	}
}
?>