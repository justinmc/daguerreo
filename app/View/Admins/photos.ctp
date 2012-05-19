<h2>照片管理 Photo Administration</h2>
<p>
	在这里你可以上传或管理照片
<br />
	From here you can add and manage photos.
</p>
<table>
<tbody>
	<tr>
		<th>&nbsp;</th>
		<th>名字 Name</th>
		<th>照片 Photos</th>
		<th>大小 Size</th>
		<th>&nbsp;</th>
	</tr>
	<tr>
		<td><?= $this->Html->link('创建 Create New', '/admin/newalbum/'); ?></td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<?php foreach ($conts as $cont): ?>
	<tr>
		<td><?= $this->Html->link('修改相册 Edit Album', ('/admin/photos/' . str_replace('daguerreo_', '', $cont->name))); ?></td>
		<td><?= str_replace('daguerreo_', '', $cont->name); ?></td>
		<td><?= $cont->object_count; ?></td>
		<td><?= round($cont->bytes_used / 1048576); ?> Mb</td>
		<td><a href="#" class="click_delete" data-link="<?= ('/admin/deletealbum/' . str_replace('daguerreo_', '', $cont->name)) ?>">删除相册 Delete Album</a></td>
	</tr>
	<?php endforeach; ?>
</tbody>
</table>

<script type="text/javascript">
	
$(document).ready(function () {
	
	$(".click_delete").click(function () {
		var deletepost = confirm('这将永久删除你的相册。你确定吗? This will permanently delete your album.  Are you sure?');
				
		if (deletepost)
			window.location = $(this).data('link');
		else
			return false;
	});
});
	
</script>