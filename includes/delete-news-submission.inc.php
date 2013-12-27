<?php

// handle variables
$id = $news_items[$_GET["ArrayID"]]["news_id"];

// TODO sanitize the get variable

// insert data into table
$dataInsert = "DELETE FROM Newsletters WHERE news_id='$id'";
mysql_query($dataInsert, $c) or die (mysql_error());
print "<div style='color: green; font-weight:bold;' class='centeralign'><br>News Deleted.</div>";

?>