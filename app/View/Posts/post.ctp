<?php if ($post): ?>
<a href="/blog/<?php echo $post['Post']['title_py']; ?>"><h3><?php echo $post['Post']['title_cn']; ?></h3></a>
<i>Posted: <?php echo $this->Time->nice($post['Post']['date']); ?></i>
<br /><br />
<p>
	<?php echo $post['Post']['post']; ?>
</p>
<br />
<?php else: ?>
<h2>Post Not Found</h2>
<p>
	Sorry!  The url you entered doesn't seem to be a valid post.
</p>
<p>
	<?php echo $this->Html->link('Home', '/'); ?>
</p>
<?php endif; ?>
