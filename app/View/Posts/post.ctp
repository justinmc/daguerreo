<?php if ($post): ?>
<a href="/blog/<?php echo $post['Post']['title_py']; ?>"><h3><?php echo $post['Post']['title_cn']; ?></h3></a>
<a href="/blog/<?php echo $post['Post']['title_py']; ?>"><img src="<?= $this->Html->url('/' . $post['Post']['titlepic']) ?>" width="800" /></a>
<br />
<i>Posted: <?php echo $this->Time->nice($post['Post']['date']); ?></i>
<br /><br />
<p>
	<?php echo $post['Post']['post']; ?>
</p>
<br />
<?php else: ?>
<h2>没有找到该页面 Post Not Found</h2>
<p>
	对不起，没有找到您填写的地址。
<br/>
	Sorry!  The url you entered doesn't seem to be a valid post.
</p>
<p>
	<?php echo $this->Html->link('主页 Home', '/'); ?>
</p>
<?php endif; ?>
