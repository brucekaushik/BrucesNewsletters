<?php

// TODO: any person can get to this page directly, change this later..

// start a session
session_start();

/*
echo "<pre>";
print_r($_SESSION);
echo "</pre>";
//*/

// connect to the database
require '../BrucesAdminArea/includes/dbConnect.inc.php';

// include the customer details array
require 'includes/customer-info.inc.php';

// include server side validation functions
require 'includes/serverSideValidation.inc.php';

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<title>Manage Subscription</title>
		<link rel="stylesheet" type="text/css" href="styles.css">
	</head>
<body>

	<div class="topnav">
		<a href="../BrucesAdminArea">Home</a> | 
		<a href="../BrucesAdminArea/home.php?action=logout">Logout</a>
	</div>
	
	<div class="wrapper manage-subscription-page">
		
		<div class="content">
		
			<?php 
			
			// check if the user has submitted the subscription-form
			if(isset($_POST["subscription-req"])){
				
				// store customer email id, validate
				$cust_email = $_POST['email_id'];
				$cust_email = validate_email($cust_email);
				
				// echo count($custDet);
				// if count=1 the customer does not exists and can be added as new customer
				// verify the same
				if(count($custDet) == 1){
					
					// check if email id passed validation
					if($cust_email != "bad input"){
						
						$insertQuery = "INSERT INTO NlCustomers SET cust_id='$ses_user_id',cust_email='$cust_email',sub_status='yes'";
						$insertRes = mysql_query($insertQuery, $c);
						
						if($insertRes){
							echo "<div class='heading green'>Your request has been submitted! Go back to <a href='../BrucesAdminArea'>Home Page</a></div>";
							// echo "first time";
						}else {
							echo "<div class='heading red'>There has been some error in your submission, please try again later!";
						}
							
					}
					// show the bad input form
					else{
						echo "<div class='heading red'>Bad Input</div>";
						echo "<div class='heading'>Subscribe to our Newsletter</div>";
						echo "<form name='subscription-form' action='manage-subscription.php' method='post'>";
						echo "<input type='hidden' name='subscription-req' value='subscribe'>";
						echo "<div>Enter Your Email <input name='email_id' type='text' value=''></div>";
						echo "<div><input type='submit' value='subscribe'></div>";
						echo "</form>";
					}
					
				}
				// the customer is already existing, and attempting to change the subscription details  
				else{
					
					// check if the user wants to subscribe
					if ($_POST["subscription-req"] == "subscribe") {
						
						// if email id passed validation
						if($cust_email != "bad input"){
							
							$insertQuery = "UPDATE NlCustomers SET cust_email='$cust_email',sub_status='yes' where cust_id='$ses_user_id'";
							$insertRes = mysql_query($insertQuery, $c);
								
							if($insertRes){
								echo "<div class='heading green'>Your request has been submitted! Go back to <a href='../BrucesAdminArea'>Home Page</a></div>";
								// echo "for re-sub";
							}else {
								echo "<div class='heading red'>There has been some error in your submission, please try again later!";
							}
							
						}
						// show bad input form
						else{
							echo "<div class='heading red'>Bad Input</div>";
							echo "<div class='heading'>Subscribe Again To Our Newsletter</div>";
							echo "<form name='re-subscription-form' action='manage-subscription.php' method='post'>";
							echo "<input type='hidden' name='subscription-req' value='subscribe'>";
							echo "<div>Enter Your Email <input name='email_id' type='text' value=''></div>";
							echo "<div><input type='submit' value='save changes'></div>";
							echo "</form>";
						}
						
					}
					// check if user wants to edit subscribed email
					else if ($_POST["subscription-req"] == "edit-email") {
						
						// if email id passed validation
						if($cust_email != "bad input"){
							
							$updateQuery = "UPDATE NlCustomers SET cust_email='$cust_email' WHERE cust_id='$ses_user_id'";
							$updateRes = mysql_query($updateQuery, $c);
								
							if($updateRes){
								echo "<div class='heading green'>Your request has been submitted! Go back to <a href='../BrucesAdminArea'>Home Page</a></div>";
								// echo "for edit";
							}else {
								echo "<div class='heading red'>There has been some error in your submission, please try again later!";
							}
							
						}
						// show bad input form
						else{
							echo "<div class='heading red'>Bad Input</div>";
							echo "<div class='heading'>Edit Your Email Id</div>";
							echo "<form name='edit-subscription-form' action='manage-subscription.php' method='post'>";
							echo "<input type='hidden' name='subscription-req' value='edit-email'>";
							echo "<div>Enter Your Email <input name='email_id' type='text' value='" . $custDet["cust_email"] . "'></div>";
							echo "<div><input type='submit' value='save changes'></div>";
							echo "</form>";
						}
						
					}
					// check if user wants to unsubscribe
					else if($_POST["subscription-req"] == "unsubscribe"){
						
						// if email id passed validation
						if($cust_email != "bad input"){
			
							$updateQuery = "UPDATE NlCustomers SET sub_status='no' WHERE cust_id='$ses_user_id'";
							$updateRes = mysql_query($updateQuery, $c);
							
							if($updateRes){
								echo "<div class='heading green'>Your request has been submitted! Go back to <a href='../BrucesAdminArea'>Home Page</a></div>";
								// echo "for unsub";
							}else {
								echo "<div class='heading red'>There has been some error in your submission, please try again later!";
							}	
							
						}
						// show bad input form
						else{
							echo "<div class='red'>Bad Input</div>";
							echo "<div class='heading'>Unsubscribe from our Newsletter</div>";
							echo "<form name='unsubscription-form' action='manage-subscription.php' method='post'>";
							echo "<input type='hidden' name='subscription-req' value='unsubscribe'>";
							echo "<div>Enter Your Email <input name='email_id' type='hidden' value='" . $custDet["cust_email"] . "'></div>";
							echo "<div><input type='submit' value='unsubscribe'></div>";
							echo "</form>";
						}
						
					}
					
				}	
				
			}else{
				
				// echo count($custDet);
				// if count=1 then user is not subscribed and also is not a previously unsubscribed customer 
				// verify the same
				if(count($custDet) == 1){
					echo "<form name='subscription-form' action='manage-subscription.php' method='post'>";
					echo "<div class='heading'>Subscribe to our Newsletter</div>";
					echo "<input type='hidden' name='subscription-req' value='subscribe'>";
					echo "<div>Enter Your Email <input name='email_id' type='text' value=''></div>";
					echo "<div><input type='submit' value='subscribe'></div>";
					echo "</form>";
				}else{
					
					// if the customer is curretly unsubscribed
					if($custDet["sub_status"] == "no"){
						echo "<form name='re-subscription-form' action='manage-subscription.php' method='post'>";
						echo "<div class='heading'>Subscribe Again To Our Newsletter</div>";
						echo "<input type='hidden' name='subscription-req' value='subscribe'>";
						echo "<div>Enter Your Email <input name='email_id' type='text' value=''></div>";
						echo "<div><input type='submit' value='save changes'></div>";
						echo "</form>";
					}
					// if the customer is currently subscribed
					else{
						echo "<form name='edit-subscription-form' action='manage-subscription.php' method='post'>";
						echo "<div class='heading'>Edit Your Email Id</div>";
						echo "<input type='hidden' name='subscription-req' value='edit-email'>";
						echo "<div>Enter Your Email <input name='email_id' type='text' value='" . $custDet["cust_email"] . "'></div>";
						echo "<div><input type='submit' value='save changes'></div>";
						echo "</form>";
						
						echo "<div><br>or<br><br></div>";
				
						echo "<form name='unsubscription-form' action='manage-subscription.php' method='post'>";
						echo "<div class='heading'>Unsubscribe from our Newsletter</div>";
						echo "<input type='hidden' name='subscription-req' value='unsubscribe'>";
						echo "<div>Enter Your Email <input name='email_id' type='hidden' value='" . $custDet["cust_email"] . "'></div>";
						echo "<div><input type='submit' value='unsubscribe'></div>";
						echo "</form>";
					}
					
				}
				
			}
			
			?>
		
		</div>
	
	</div>
	
</body>
</html>