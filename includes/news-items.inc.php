<?php

$getNewsQuery = "SELECT * FROM Newsletters";
$getNewsRes = mysql_query($getNewsQuery, $c);

$news_items = array();

while($getNewsItem = mysql_fetch_array($getNewsRes, MYSQL_ASSOC)){
	$news_items[] = $getNewsItem; 
}

/*
echo "<pre>";
print_r($news_items);
echo "</pre>";
//*/

?>