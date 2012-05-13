<h2>Post Edits</h2>
<p>
	You can see all of your past edits here.  The "post id" given corresponds to the id on the post Administration page.  Deletes are not accessible and are therefore not included in this table.
</p>
<br />
<table>
<tbody>
	<tr>
		<th>post id</th>
		<th>date</th>
		<th>field edited</th>
		<th>value new</th>
		<th>value old</th>
	</tr>
	<?php foreach ($edits as $edit): ?>
	<tr>
		<td><?= $edit['Edits']['posts_id']; ?></td>
		<td><?= $this->Time->nice($edit['Edits']['date']); ?></td>
		<td><?= $edit['Edits']['field']; ?></td>
		<td><?= $edit['Edits']['value_old']; ?></td>
		<td><?= $edit['Edits']['value_new']; ?></td>
	</tr>
	<?php endforeach; ?>
</tbody>
</table>
