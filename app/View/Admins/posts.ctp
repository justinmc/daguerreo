<h2>Administrate Posts</h2>
<p>
	Manage your posts below.
</p>
<table>
<tbody>
	<tr>
		<th>&nbsp;</th>
		<th>id</th>
		<th>title</th>
		<th>date</th>
		<th>&nbsp;</th>
	</tr>
	<tr>
		<td><?= $this->Html->link('Create New', '/admin/newpost'); ?></td>
		<td><?= $nextId; ?></td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<?php foreach ($posts as $post): ?>
	<tr>
		<td><?= $this->Html->link('Edit', '/admin/editpost/' . $post['Post']['title_py']); ?></td>
		<td><?= $post['Post']['id']; ?></td>
		<td><?= $post['Post']['title_cn']; ?></td>
		<td><?= $this->Time->nice($post['Post']['date']); ?></td>
		<td><?= $this->Html->link('Delete Post', '/admin/deletepost/' . $post['Post']['id']); ?></td>
	</tr>
	<?php endforeach; ?>
</tbody>
</table>
