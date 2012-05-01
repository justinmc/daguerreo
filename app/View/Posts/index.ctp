<?php foreach(array_reverse($posts) as $post): ?>

<h3><?php echo $post['Post']['title']; ?></h3>
<i>Posted: <?php echo $this->Time->nice($post['Post']['date']); ?></i>
<br /><br />
<p>
	<?php echo $post['Post']['post']; ?>
</p>
<br />
<?php endforeach; ?>

<ul id="pagination">
<a href="#"><li class="inactive">1</li></a>
<a href="#"><li class="active">2</li></a>
<a href="#"><li class="inactive">3</li></a>
</ul>
