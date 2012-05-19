<table>
<tbody>
	<tr>
		<th>编号 Id</th>
		<th>题目 Title</th>
		<th>日期 Date</th>
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
