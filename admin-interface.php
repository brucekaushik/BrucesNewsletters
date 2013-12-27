<?php

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

// include the news items array
require 'includes/news-items.inc.php';

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
		<a href="admin-interface.php?action=AddNews">Add</a> |
		<a href="admin-interface.php?action=ListActiveNews">List Active News</a> |
		<a href="admin-interface.php?action=ListInactiveNews">List Inactive News</a> |
		<a href="../BrucesAdminArea/home.php?action=logout">Logout</a>
	</div>
	
	<div class="wrapper manage-subscription-page">
		
		<div class="content">
		
			<?php 
			
			// take action depending on the link clicked
			// no need to sanitize further as there is no default action
			switch (@$_GET["action"])
			{
				case "AddNews":
					
					require 'includes/add-news.inc.php';
					
				break;
				
				case "AddNewsSubmission":
						
					require 'includes/add-news-submission.inc.php';
						
				break;
				
				case "ListActiveNews":
					
					require 'includes/list-active-news.inc.php';
					
				break;
				
				case "ListInactiveNews":
						
					require 'includes/list-inactive-news.inc.php';
						
				break;
				
				case "EditNews":
					
					require 'includes/edit-news.inc.php';
					
				break;
				
				case "EditNewsSubmission":
						
					require 'includes/edit-news-submission.inc.php';
						
				break;
				
				case "DeleteNews":
					
					require 'includes/delete-news-submission.inc.php';
					
				break;
				
				case "SendNews":
						
					require 'includes/send-news-submission.inc.php';
						
				break;
				
			}
			
			?>
		
		</div>
	
	</div>
	
</body>
</html>