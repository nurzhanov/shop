<?php
include "include/db_connect.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
	$login = $_POST['rname'];
	$result = mysqli_query("SELECT login FROM reg_user WHERE login = '$login'", $mysqli);
	if(mysqli_num_rows($result) > 0){
		echo "false";
	}else{
		echo "true";
	}
}


?>