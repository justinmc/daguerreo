<h2>Administrator Page</h2>
<p>
	Only the owner of the site can use this page!  Login page coming soon to fight off all you haxorz.
</p>
<br />
<h2>Control Panel</h2>
<p>
	From this page, you can:
</p>
<ul>
	<li><?php echo $this->Html->link('Create a new post', '/admin/newpost/'); ?></li>
	<li><?php echo $this->Html->link('Manage existing posts', '/admin/posts/'); ?></li>
	<li><?php echo $this->Html->link("View edits you've made", '/admin/postedits/'); ?></li>
	<li><?php echo $this->Html->link('Manage photos', '/admin/photos/'); ?></li>
</ul>
