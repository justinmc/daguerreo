<h3>修改相册 Edit Album <?= $cont->name ?></h3>

<table>
<tbody>
	<tr>
		<th>&nbsp;</th>
		<th>文件 File</th>
		<th>日期 Date</th>
		<th>大小 Size</th>
		<th>&nbsp;</th>
	</tr>
	<tr>
		<td><?= $this->Html->link('上传新照片 Upload New Photo', '/admin/photos/'); ?></td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<?php foreach ($pics as $pic): ?>
	<tr>
		<td>&nbsp;</td>
		<td><?= $pics->name; ?></td>
		<td><?= $pics->last_modified; ?></td>
		<td><?= round($pics->content_length / 1048576); ?> Mb</td>
		<td><?= $this->Html->link('删除照片 Delete Photo', '/admin/photos'); ?></td>
	</tr>
	<?php endforeach; ?>
</tbody>
</table>

