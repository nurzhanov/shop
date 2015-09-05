<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){

	include "db_connect.php";

	if (isset($_POST['info_name'])) { $info_name = $_POST['info_name']; }
	if (isset($_POST['info_email'])) { $info_email = $_POST['info_email']; }
	if (isset($_POST['info_subject'])) { $info_subject = $_POST['info_subject']; }
	if (isset($_POST['info_message'])) { $info_message = $_POST['info_message']; }

	$query_contact = "INSERT INTO contacts (name, email, subject, message) VALUES ('".$info_name."','".$info_email."','".$info_subject."','".$info_message."')";
	$result_contact = $mysqli->query($query_contact);
	echo "true";
}
?>