<?php foreach(array_reverse($posts) as $post): ?>

<h3><?php echo $post['Post']['title']; ?></h3>
<i>Posted: <?php echo $this->Time->nice($post['Post']['date']); ?></i>
<br /><br />
<p>
	<?php echo $post['Post']['post']; ?>
</p>
<br />

<?php endforeach; ?>