<?php

// start a session
session_start();

/*
echo "<pre>";
print_r($_SESSION);
echo "</pre>";
//*/

// handle variables
$ses_user_level = $_SESSION['user_level'];

// show relavant page depending on level of user
if($ses_user_level == "reg"){
	header ("Location: manage-subscription.php");
}elseif ($ses_user_level == "admin" || $ses_user_level == "root"){
	header ("Location: admin-interface.php");
}

?>