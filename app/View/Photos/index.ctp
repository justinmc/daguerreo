<a href="/photos"><h3>Photos</h3></a>
<table class="nolines">
<tbody>
	<tr>
		<th></th>
		<th></th>
	</tr>
	<?php foreach ($conts as $key => $cont): ?>
	<?php if (!($key % 2)): ?>
	<tr>
	<?php endif; ?>
		<td>
			<?php
			$firstPic = $cont->list_objects(1); 
			$firstPicLink = $cont->cdn_uri . '/' . $firstPic[0];
			?>
			<div class="album">
				<a href="<?php echo '/photos/' . $cont->name; ?>">
					<img height="100" width="150" src="<?php echo $firstPicLink; ?>" />
				</a>
				<a href="<?php echo '/photos/' . $cont->name; ?>">
					<span class="name"><?php echo $cont->name; ?></span>
				</a>
				<br />
				<span class="photocount">
					Photos: <?= $cont->object_count; ?>
				</span>
			</div>
		</td>
	<?php if ($key % 2): ?>
	</tr>
	<?php endif; ?>
	<?php endforeach; ?>
</tbody>
</table>
