<?php

// connect with database
require '../BrucesAdminArea/includes/dbConnect.inc.php';

// handle variables
$ses_user_id = $_SESSION['user_id'];

// query the database for details of subcribers
$userDetailsQuery = "SELECT * FROM NlCustomers";
$userDetailsRes = mysql_query($userDetailsQuery, $c);

// populate above details into an array (for convenience)
while($userDetailsRow = mysql_fetch_array($userDetailsRes, MYSQL_ASSOC)){
	$customer_info[] = $userDetailsRow;
}

// query the database for the current user details (who has logged in)
$custQuery = "SELECT * FROM NlCustomers WHERE cust_id='$ses_user_id'";
$custRes = mysql_query($custQuery, $c);
$custDet = mysql_fetch_array($custRes, MYSQL_ASSOC);

/*
echo "<pre>";
print_r ($customer_info);
echo "</pre>";
//*/

/*
echo "<pre>";
print_r ($custDet);
echo "</pre>";
//*/


?>