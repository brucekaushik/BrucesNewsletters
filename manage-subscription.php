<?php

// start a session
session_start();

/*
echo "<pre>";
print_r($_SESSION);
echo "</pre>";
//*/

require '../BrucesAdminArea/includes/dbConnect.inc.php';
require 'includes/customer-info.inc.php';
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
			
			if(isset($_POST["subscription-req"])){
				
				$cust_email = $_POST['email_id'];
				$cust_email = validate_email($cust_email);
				
				if(count($custDet) == 1){
					
					if($cust_email != "bad input"){
						
						$insertQuery = "INSERT INTO NlCustomers SET cust_id='$ses_user_id',cust_email='$cust_email',sub_status='yes'";
						$insertRes = mysql_query($insertQuery, $c);
						
						if($insertRes){
							echo "<div class='heading green'>Your request has been submitted! Go back to <a href='../BrucesAdminArea'>Home Page</a></div>";
							// echo "first time";
						}else {
							echo "<div class='heading red'>There has been some error in your submission, please try again later!";
						}
							
					}else{
						echo "<div class='heading red'>Bad Input</div>";
						echo "<div class='heading'>Subscribe to our Newsletter</div>";
						echo "<form name='subscription-form' action='manage-subscription.php' method='post'>";
						echo "<input type='hidden' name='subscription-req' value='subscribe'>";
						echo "<div>Enter Your Email <input name='email_id' type='text' value=''></div>";
						echo "<div><input type='submit' value='subscribe'></div>";
						echo "</form>";
					}
					
					
				}else{
					
					if ($_POST["subscription-req"] == "subscribe") {
						
						if($cust_email != "bad input"){
							
							$insertQuery = "UPDATE NlCustomers SET cust_email='$cust_email',sub_status='yes' where cust_id='$ses_user_id'";
							$insertRes = mysql_query($insertQuery, $c);
								
							if($insertRes){
								echo "<div class='heading green'>Your request has been submitted! Go back to <a href='../BrucesAdminArea'>Home Page</a></div>";
								// echo "for re-sub";
							}else {
								echo "<div class='heading red'>There has been some error in your submission, please try again later!";
							}
							
						}else{
							echo "<div class='heading red'>Bad Input</div>";
							echo "<div class='heading'>Subscribe Again To Our Newsletter</div>";
							echo "<form name='re-subscription-form' action='manage-subscription.php' method='post'>";
							echo "<input type='hidden' name='subscription-req' value='subscribe'>";
							echo "<div>Enter Your Email <input name='email_id' type='text' value=''></div>";
							echo "<div><input type='submit' value='save changes'></div>";
							echo "</form>";
						}
						
					}else if ($_POST["subscription-req"] == "edit-email") {
						
						if($cust_email != "bad input"){
							
							$updateQuery = "UPDATE NlCustomers SET cust_email='$cust_email' WHERE cust_id='$ses_user_id'";
							$updateRes = mysql_query($updateQuery, $c);
								
							if($updateRes){
								echo "<div class='heading green'>Your request has been submitted! Go back to <a href='../BrucesAdminArea'>Home Page</a></div>";
								// echo "for edit";
							}else {
								echo "<div class='heading red'>There has been some error in your submission, please try again later!";
							}
							
						}else{
							echo "<div class='heading red'>Bad Input</div>";
							echo "<div class='heading'>Edit Your Email Id</div>";
							echo "<form name='edit-subscription-form' action='manage-subscription.php' method='post'>";
							echo "<input type='hidden' name='subscription-req' value='edit-email'>";
							echo "<div>Enter Your Email <input name='email_id' type='text' value='" . $custDet["cust_email"] . "'></div>";
							echo "<div><input type='submit' value='save changes'></div>";
							echo "</form>";
						}
						
					}else if($_POST["subscription-req"] == "unsubscribe"){
						
						if($cust_email != "bad input"){
			
							$updateQuery = "UPDATE NlCustomers SET sub_status='no' WHERE cust_id='$ses_user_id'";
							$updateRes = mysql_query($updateQuery, $c);
							
							if($updateRes){
								echo "<div class='heading green'>Your request has been submitted! Go back to <a href='../BrucesAdminArea'>Home Page</a></div>";
								// echo "for unsub";
							}else {
								echo "<div class='heading red'>There has been some error in your submission, please try again later!";
							}	
							
						}else{
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
				
				if(count($custDet) == 1){
					echo "<form name='subscription-form' action='manage-subscription.php' method='post'>";
					echo "<div class='heading'>Subscribe to our Newsletter</div>";
					echo "<input type='hidden' name='subscription-req' value='subscribe'>";
					echo "<div>Enter Your Email <input name='email_id' type='text' value=''></div>";
					echo "<div><input type='submit' value='subscribe'></div>";
					echo "</form>";
				}else{
					if($custDet["sub_status"] == "no"){
						echo "<form name='re-subscription-form' action='manage-subscription.php' method='post'>";
						echo "<div class='heading'>Subscribe Again To Our Newsletter</div>";
						echo "<input type='hidden' name='subscription-req' value='subscribe'>";
						echo "<div>Enter Your Email <input name='email_id' type='text' value=''></div>";
						echo "<div><input type='submit' value='save changes'></div>";
						echo "</form>";
					}else{
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