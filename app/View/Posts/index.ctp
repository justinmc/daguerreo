<?php foreach(array_reverse($posts) as $post): ?>

<a href="/blog/<?php echo $post['Post']['title_py']; ?>"><h3><?php echo $post['Post']['title_cn']; ?></h3></a>
<i>Posted: <?php echo $this->Time->nice($post['Post']['date']); ?></i>
<br /><br />
<p>
	<?php echo $post['Post']['post']; ?>
</p>
<br />

<?php endforeach; ?>
