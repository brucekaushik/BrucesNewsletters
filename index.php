<?php

session_start();

$_SESSION['verify_back_to'] = "../BrucesNewsletters/home.php";
$_SESSION['app_name'] = "Bruce's Newsletters";

// redirect to home page
header ("Location: ../BrucesAdminArea/index.php?action=VerifyLogin");

?>
