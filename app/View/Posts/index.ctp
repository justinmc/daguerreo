<?php foreach($posts as $post): ?>
<a href="/blog/<?php echo $post['Post']['title_py']; ?>"><h3><?php echo $post['Post']['title_cn']; ?></h3></a>
<a href="/blog/<?php echo $post['Post']['title_py']; ?>"><img src="/<?php echo $post['Post']['titlepic']; ?>" height="100" width="800"/></a>
<br />
<i>Posted: <?php echo $this->Time->nice($post['Post']['date']); ?></i>
<br /><br />
<p>
	<?php echo $post['Post']['post']; ?>
</p>
<br /><br />
<?php endforeach; ?>

<br />
<ul id="pagination">
<a href="#"><li class="inactive">1</li></a>
<a href="#"><li class="active">2</li></a>
<a href="#"><li class="inactive">3</li></a>
</ul>
<br /><br />
<?php
echo $this->Paginator->numbers(array('first' => 'First page'));
?>
