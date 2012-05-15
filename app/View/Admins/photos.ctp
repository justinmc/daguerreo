<h2>Photo Administration</h2>
<p>
	From here you can add and manage photos!
</p>
<br />
<h3>Albums</h3>
<p>
	From this page, you can:
</p>

<table>
<tbody>
	<tr>
		<th>&nbsp;</th>
		<th>name</th>
		<th># photos</th>
		<th>size</th>
		<th>&nbsp;</th>
	</tr>
	<tr>
		<td><?= $this->Html->link('Create New', '/admin/photos/'); ?></td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<?php foreach ($conts as $cont): ?>
	<tr>
		<td><?= $this->Html->link('Edit Album', ('/admin/photos/' . $cont->name)); ?></td>
		<td><?= $cont->name; ?></td>
		<td><?= $cont->object_count; ?></td>
		<td><?= round($cont->bytes_used / 1048576); ?> Mb</td>
		<td><?= $this->Html->link('Delete Album', '/admin/photos'); ?></td>
	</tr>
	<?php endforeach; ?>
</tbody>
</table>

