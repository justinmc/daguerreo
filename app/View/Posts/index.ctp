<?php foreach($posts as $post): ?>
<a href="<?= $this->Html->url('/blog/' . $post['Post']['title_py']) ?>"><h3><?php echo $post['Post']['title_cn']; ?></h3></a>
<a href="<?= $this->Html->url('/blog/' . $post['Post']['title_py']) ?>"><img src="<?= $this->Html->url('/' . $post['Post']['titlepic']) ?>" width="800" /></a>
<br />
<div class="post">
<span>Posted: <?php echo $this->Time->nice($post['Post']['date']); ?></span>
</div>
<br /><br />
<p>
	<?php echo $post['Post']['post']; ?>
</p>

<br /><br />
<?php endforeach; ?>
<br />
<div class="centerme">
	<ul id="pagination">
	<?php
	
	$params = $this->Paginator->params->params;
	for ($i = 1; $i <= $params['paging']['Post']['pageCount']; $i++):
	
	?>
	<a href="<?= $this->Paginator->url(array('page' => $i)) ?>" >
		<li <?php if ($i == $params['paging']['Post']['page']) echo 'class="current"'; ?>>
			<?= $i ?>
		</li>
	</a>
	<?php endfor; ?>
	</ul>
</div>
