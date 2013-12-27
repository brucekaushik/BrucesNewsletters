<?php

// for convinience
$id = $news_items[$_GET["ArrayID"]]["news_id"];
$news_title = $news_items[$_GET["ArrayID"]]["title"];
$news_text = $news_items[$_GET["ArrayID"]]["news_text"];

$send_to = "";
foreach($customer_info as $x){
	if($x["sub_status"] == "yes"){
		$send_to .= $x["cust_email"] . ",";
	}
}

$send_to = rtrim($send_to, ",");
$subject = $news_title;
$body = $news_text;
$headers = "MIME-Version: 1.0\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\n";

$result = mail($send_to, $subject, $body, $headers);

if($result){
	echo "Successfully delivered the mail to the mailing list";
}else{
	echo "Unable to deliver the mail to the mailing list";
}


?>