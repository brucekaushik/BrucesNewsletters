<form id="add-news" action="admin-interface.php?action=AddNewsSubmission" method="post">
	<table>
		<tr>
			<td>Title</td>
			<td><input name="title" type="text" value=""></td>
		</tr>		
		<tr>
			<td>Content</td>
			<td><textarea name="text"></textarea></td>
		</tr>
		<tr>
			<td>Active</td>
			<td><input name="active" type="checkbox" checked="checked"></td>
		</tr>
		<tr>
			<td>Allow HTML</td>
			<td><input name="html" type="checkbox" checked="checked"></td>
		</tr>
	</table>
	<br><br>
	<input name="date_posted" type="hidden" value="<?php echo date("Y/m/d"); ?>">
	<input type="submit" value="Add News">
</form>