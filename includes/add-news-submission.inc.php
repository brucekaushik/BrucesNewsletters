<?php

// handle variables
$title = $_POST["title"];
$text = $_POST["text"];
if(isset($_POST["active"])){
	$active = "yes";	
}else{
	$active = "no";
}
if(isset($_POST["html"])){
	$html = "yes";
}else{
	$html = "no";
}
$date_posted = $_POST["date_posted"];

// validate
$title = validate_string($title);
$title = "<h3>$title</h3>";
$text = validate_textarea($text);

// insert data into table
$dataInsert = "INSERT INTO Newsletters SET title='$title', active='$active', html='$html', date_posted='$date_posted', news_text='$text'";
mysql_query($dataInsert, $c) or die (mysql_error());
print "<div style='color: green; font-weight:bold;' class='centeralign'><br>News Added.</div>";

?>