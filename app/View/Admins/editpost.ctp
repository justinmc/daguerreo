<h2>Edit Post</h2>
<br />
<form name="addPost" action="/admin/postsedit" method="post" enctype="multipart/form-data">
	<table>
	<tbody>
		<tr>
			<td>
				ID:
			</td>
			<td>				
				<input type="text" name="id" readonly="readonly" value="<? echo $post['Post']['id']; ?>" />
			</td>
		</tr>
		<tr>
			<td>
				Date:
			</td>
			<td>
				<input type="datetime" name="displayonly" disabled="disabled" value="<? echo $this->Time->nice($post['Post']['date']); ?>" />
				<input type="datetime" name="edited" readonly="readonly" hidden="hidden" value="<? echo time(); ?>" />
			</td>
		</tr>
		<tr>
			<td>
				Chinese Title:
			</td>
			<td>
				<input type="text" name="title_cn" value="<? echo $post['Post']['title_cn']; ?>" />
			</td>
		</tr>
		<tr>
			<td>
				Pinyin Title:
			</td>
			<td>
				<input type="text" name="title_py" value="<? echo $post['Post']['title_py']; ?>"/>
				<input type="text" name="original_title_py" readonly="readonly" hidden="hidden" value="<? echo $post['Post']['title_py']; ?>" />
			</td>
		</tr>
		<tr>
			<td>
				Upload a Title Photo:
			</td>
			<td>
				<img src="/<? echo $post['Post']['titlepic']; ?>" width="800" height="100" />
				<br /><br />
				<input type="file" name="titlepic" />
				<input type="text" name="original_titlepic" readonly="readonly" hidden="hidden" value="<? echo $post['Post']['titlepic']; ?>" />
			</td>
		</tr>
	</tbody>
	</table>
	<textarea class="ckeditor" name="post"><? echo $post['Post']['post']; ?></textarea>
	<br />
	<input type="submit" value="Submit" />
	<br /><br />
</form>
