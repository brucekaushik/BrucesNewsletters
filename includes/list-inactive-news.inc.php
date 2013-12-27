<?php 

$inactive_news_items = array();

$i = 0;
foreach ($news_items as $x){
	$x["array_id"] = $i;
	if($x["active"] == "no"){
		$inactive_news_items[] = $x;
	}
	$i++;
}

// print_r($active_news_items);

?>

<table class="listofnews">
	<tr>
		<th>ID</th>
		<th>News Title</th>
		<th>News Text</th>
		<th>Active</th>
		<th>HTML</th>
		<th>Edit Link</th>
		<th>Delete Link</th>
	</tr>
	<?php foreach ($inactive_news_items as $x): ?>
	<tr>
		<td><?php echo $x["news_id"] ?></td>
		<td><?php echo $x["title"] ?></td>
		<td class="text"><?php echo $x["news_text"] ?></td>
		<td><?php echo $x["active"] ?></td>
		<td><?php echo $x["html"] ?></td>
		<td><a href='admin-interface.php?action=EditNews&&ArrayID=<?php echo $x["array_id"] ?>'>Edit</a></td>
		<td><a href='admin-interface.php?action=DeleteNews&&ArrayID=<?php echo $x["array_id"] ?>'>Delete</a></td>
	</tr>
	<?php endforeach; ?>
</table>