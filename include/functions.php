<?php

function clearString($str){
	$str = strip_tags($str);
	$str = mysqli_real_escape_string($mysqli, $str);
	$str = trim($str);
	return $str;
}

?>