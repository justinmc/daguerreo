<a href="/photos"><h3>Photos</h3></a>
<br />
<h4><? $title ?></h4>
<table class="nolines">
<tbody>
	<tr>
		<th></th>
		<th></th>
	</tr>
	<?php foreach ($photos as $key => $photo): ?>
	<?php if (!($key % 2)): ?>
	<tr>
	<?php endif; ?>
		<td>
			<a href="#" rel="lightbox">
				<img height="200" width="300" src="<?php echo ($cdn_uri . '/' . $photo); ?>" />
			</a>
		</td>
	<?php if ($key % 2): ?>
	</tr>
	<?php endif; ?>
	<?php endforeach; ?>
</tbody>
</table>
