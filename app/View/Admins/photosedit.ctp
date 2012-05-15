<h3>Edit Album <?= $cont->name ?></h3>

<table>
<tbody>
	<tr>
		<th>&nbsp;</th>
		<th>file</th>
		<th>date</th>
		<th>size</th>
		<th>&nbsp;</th>
	</tr>
	<tr>
		<td><?= $this->Html->link('Upload New Photo', '/admin/photos/'); ?></td>
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
		<td><?= $this->Html->link('Delete Photo', '/admin/photos'); ?></td>
	</tr>
	<?php endforeach; ?>
</tbody>
</table>

