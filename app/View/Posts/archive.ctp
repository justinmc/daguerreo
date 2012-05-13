<table>
<tbody>
	<tr>
		<th>id</th>
		<th>title</th>
		<th>date</th>
	</tr>
	<?php foreach ($posts as $post): ?>
	<tr>
		<td><?= $post['Post']['id']; ?></td>
		<td><?= $this->Html->link($post['Post']['title_cn'], '/blog/post/' . $post['Post']['title_py']); ?></td>
		<td><?= $this->Time->nice($post['Post']['date']); ?></td>
	</tr>
	<?php endforeach; ?>
</tbody>
</table>
