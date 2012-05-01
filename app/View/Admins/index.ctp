<h2>Administrator Page</h2>
<p>
	Only the owner of the site can use this page!  Login page coming soon to fight off all you haxorz.
</p>
<br />
<form name="addPost" action="/admin/addPost" method="post">
	<table>
	<tbody>
		<tr>
			<td>
				ID:
			</td>
			<td>				
				<input type="text" name="id" readonly="readonly" value="<?php echo $id; ?>" />
			</td>
		</tr>
		<tr>
			<td>
				Date:
			</td>
			<td>
				<input type="datetime" name="displayonly" disabled="disabled" value="<? echo $this->Time->nice(time()); ?>" />
				<input type="datetime" name="date" readonly="readonly" hidden="hidden" value="<? echo time(); ?>" />
			</td>
		</tr>
		<tr>
			<td>
				Chinese Title:
			</td>
			<td>
				<input type="text" name="title_cn" />
			</td>
		</tr>
		<tr>
			<td>
				Pinyin Title:
			</td>
			<td>
				<input type="text" name="title_py" />
			</td>
		</tr>
	</tbody>
	</table>
	<textarea class="ckeditor" name="post">Write a new post here!</textarea>
	<br />
	<input type="submit" value="Submit" />
</form>
