<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){

	include "include/db_connect.php";

	if (isset ($_POST['lname'])) { $login_name = $_POST['lname']; }
	if(isset($_POST['lpass'])){ $login_pass = $_POST['lpass']; }
	if(isset($_POST['rememberme'])){ $login_rememberme = $_POST['rememberme']; }

	if($_POST['rememberme'] == "yes"){
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
		echo "yes_auth";
	}else{
		echo "no_auth";
	}
}

?>