<?php 

$active_news_items = array();

// store active news items in separate array
$i = 0;
foreach ($news_items as $news){
	$news["array_id"] = $i;
	if($news["active"] == "yes"){
		$active_news_items[] = $news;
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
		<th>Send</th>
		<th>Edit Link</th>
		<th>Delete Link</th>
	</tr>
	<?php foreach ($active_news_items as $active_news): ?>
	<tr>
		<td><?php echo $active_news["news_id"] ?></td>
		<td><?php echo $active_news["title"] ?></td>
		<td class="text"><?php echo $active_news["news_text"] ?></td>
		<td><?php echo $active_news["active"] ?></td>
		<td><?php echo $active_news["html"] ?></td>
		<td><a href='admin-interface.php?action=SendNews&ArrayID=<?php echo $active_news["array_id"] ?>'>Send</a></td>
		<td><a href='admin-interface.php?action=EditNews&ArrayID=<?php echo $active_news["array_id"] ?>'>Edit</a></td>
		<td><a href='admin-interface.php?action=DeleteNews&ArrayID=<?php echo $active_news["array_id"] ?>'>Delete</a></td>
	</tr>
	<?php endforeach; ?>
</table>