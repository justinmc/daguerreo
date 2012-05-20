<h2>管理员页面 Administrator Page</h2>
<p>
	在这里，你可以：
<br/>
	From this page, you can:
</p>
<ul>
	<li><?php echo $this->Html->link('编辑博客 Manage posts', '/admin/posts/'); ?></li>
	<li><?php echo $this->Html->link('管理照片 Manage photos', '/admin/photos/'); ?></li>
	<li><?php echo $this->Html->link('注册管理员 Manage accounts', '/users/register/'); ?></li>
</ul>
<br /><br />
<?= $this->Html->link('退出 Logout', '/users/logout/'); ?>