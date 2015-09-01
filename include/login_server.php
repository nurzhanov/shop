<?php
include "include/db_connect.php";

$login_name = $_GET['lname'];
$login_pass = $_GET['lpass'];
$login_rememverme = $_GET['rememberme'];
// $query_login_user = "SELECT * FROM reg_user WHERE login = '$login_name' AND pass = '$login_pass'";
// $result_login_user = $mysqli->query($query_login_user);
// if(mysqli_num_rows($result_login_user) > 0){
// 	echo "true";
// }else{
// 	echo "Login or password is incorrect!";
// }
echo $login_name;
echo $login_pass;
echo $login_rememverme;
?>