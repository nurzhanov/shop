<?php
// if(isset($_COOKIE['rememberme']) && $_SESSION['auth'] != 'yes_auth'){
if(isset($_COOKIE['rememberme'])){
	
	include "db_connect.php";

	$str = $_COOKIE['rememberme'];
	// Длина всей строки
	$all_len = strlen($str);
	// Возвращает позицию первого вхождения подстроки
	$login_len = strpos($str, "+");
	// Возвращает подстроку строки $str, начинающейся с первого символа и длиной $login_len символов.
	$login = substr($str,0, $login_len);
	// Возвращает подстроку строки $str, начинающейся с символа после "+" и длиной $all_len символов.
	$pass = substr($str, $login_len+1, $all_len);

	$query_cookie = "SELECT * FROM users WHERE (login = '$login' OR email = '$login') AND password = '$pass'";
	$result_cookie = $mysqli->query($query_cookie);
	if(mysqli_num_rows($result_cookie) > 0){
		$row = mysqli_fetch_assoc($result_cookie);
		// session_start();
		$_SESSION['auth'] = 'yes_auth'; 
		$_SESSION['auth_login'] = $row['login']; 
		$_SESSION['auth_password'] = $row['password']; 
		$_SESSION['auth_email'] = $row['email'];
		$_SESSION['auth_name'] = $row['name'];
		$_SESSION['auth_surname'] = $row['surname'];
		$_SESSION['auth_phone'] = $row['phone'];
		$_SESSION['auth_address'] = $row['address'];
	}
}
?>