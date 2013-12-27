<?php 

$inactive_news_items = array();

// store inactive news items in separate array
$i = 0;
foreach ($news_items as $news){
	$news["array_id"] = $i;
	if($news["active"] == "no"){
		$inactive_news_items[] = $news;
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
	<?php foreach ($inactive_news_items as $inactive_news): ?>
	<tr>
		<td><?php echo $inactive_news["news_id"] ?></td>
		<td><?php echo $inactive_news["title"] ?></td>
		<td class="text"><?php echo $inactive_news["news_text"] ?></td>
		<td><?php echo $inactive_news["active"] ?></td>
		<td><?php echo $inactive_news["html"] ?></td>
		<td><a href='admin-interface.php?action=EditNews&ArrayID=<?php echo $inactive_news["array_id"] ?>'>Edit</a></td>
		<td><a href='admin-interface.php?action=DeleteNews&ArrayID=<?php echo $inactive_news["array_id"] ?>'>Delete</a></td>
	</tr>
	<?php endforeach; ?>
</table>