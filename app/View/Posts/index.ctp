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
<?php

echo $this->Paginator->numbers(array( 
	'separator' => '',
	'tag' => 'li'
));

?>
</ul>
