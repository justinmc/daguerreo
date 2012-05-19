<a href="/photos"><h3>Photos</h3></a>
<br />
<h4><?php echo $title; ?></h4>
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
		<td style="text-align: center;">
			<a href="#" rel="lightbox">
				<img height="200" src="<?php echo ($cdn_uri . '/' . $photo); ?>" />
			</a>
		</td>
	<?php if ($key % 2): ?>
	</tr>
	<?php endif; ?>
	<?php endforeach; ?>
</tbody>
</table>
