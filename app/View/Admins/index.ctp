<h2>管理员页面 Administrator Page</h2>
<p>
	目前只有我有权使用该页面，你的注册页面即将建成，敬请期待。
<br/>
	Only the owner of the site can use this page!  Login page coming soon to fight off all you haxorz.
</p>
<br />
<h2>控制面板 Control Panel</h2>
<p>
	在这里，你可以：
<br/>
	From this page, you can:
</p>
<ul>
	<li><?php echo $this->Html->link('发表博客 Create a new post', '/admin/newpost/'); ?></li>
	<li><?php echo $this->Html->link('编辑博客 Manage existing posts', '/admin/posts/'); ?></li>
	<li><?php echo $this->Html->link("查看修改纪录 View edits you've made", '/admin/postedits/'); ?></li>
	<li><?php echo $this->Html->link('管理照片 Manage photos', '/admin/photos/'); ?></li>
	<li><?php echo $this->Html->link('注册管理员 Register new admins', '/users/register/'); ?></li>
</ul>
<br /><br />
<?= $this->Html->link('退出 Logout', '/users/logout/'); ?>