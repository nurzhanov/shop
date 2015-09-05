<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){

	include "db_connect.php";

	if (isset ($_POST['login'])) { $login = $_POST['login']; }
	if(isset($_POST['pass'])){ $pass = $_POST['pass']; }
	if(isset($_POST['rememberme'])){ $rememberme = $_POST['rememberme']; }

	echo "";
}
?>