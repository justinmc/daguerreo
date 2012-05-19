<h2>照片管理 Photo Administration</h2>
<p>
	在这里你可以上传或管理照片
<br/>
	From here you can add and manage photos!
</p>
<br />
<h3>相册 Albums</h3>
<p>
	在这页，你可以
<br/>
	From this page, you can:
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
		<td><?= $this->Html->link('创建 Create New', '/admin/photos/'); ?></td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<?php foreach ($conts as $cont): ?>
	<tr>
		<td><?= $this->Html->link('修改相册 Edit Album', ('/admin/photos/' . $cont->name)); ?></td>
		<td><?= $cont->name; ?></td>
		<td><?= $cont->object_count; ?></td>
		<td><?= round($cont->bytes_used / 1048576); ?> Mb</td>
		<td><?= $this->Html->link('删除相册 Delete Album', '/admin/photos'); ?></td>
	</tr>
	<?php endforeach; ?>
</tbody>
</table>

