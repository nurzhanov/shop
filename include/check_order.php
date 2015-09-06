<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){

	session_start();
	if (isset ($_POST['surname'])) { $_SESSION['order_surname'] = $_POST['surname']; }
	if (isset ($_POST['email'])) { $_SESSION['order_email'] = $_POST['email']; }
	if (isset ($_POST['phone'])) { $_SESSION['order_phone'] = $_POST['phone']; }
	if (isset ($_POST['address'])) { $_SESSION['order_address'] = $_POST['address']; }
	if (isset ($_POST['comment'])) { $_SESSION['order_comment'] = $_POST['comment']; }

	if (isset ($_POST['note'])) { 
		$_SESSION['order_note'] = $_POST['note']; 
		echo "comment_true";
	}else{
		echo "order_true";
	}
}

?>