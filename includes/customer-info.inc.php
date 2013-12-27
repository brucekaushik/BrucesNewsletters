<?php

require '../BrucesAdminArea/includes/dbConnect.inc.php';

$userDetailsQuery = "SELECT * FROM NlCustomers";
$userDetailsRes = mysql_query($userDetailsQuery, $c);

while($userDetailsRow = mysql_fetch_array($userDetailsRes, MYSQL_ASSOC)){
	$customer_info[] = $userDetailsRow;
}

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