<?php
include "include/db_connect.php";

$login_name = $_GET['lname'];
$login_pass = $_GET['lpass'];
$login_rememberme = $_GET['rememberme'];
$query_login_user = "SELECT login FROM reg_user WHERE login = '$login_name' AND pass = '$login_pass'";
$result_login_user = $mysqli->query($query_login_user);
if(mysqli_num_rows($result_login_user) > 0){
	echo "true";
}else{
	echo "false";
}
?>