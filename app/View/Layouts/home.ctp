<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		Photography Site and Blog
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('style');
		echo $this->Html->css('lightbox');
		echo $this->Html->script('lightbox');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	<script type="text/javascript" src="/ckeditor/ckeditor.js"></script>
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
</head>
<body>
	<div id="container">
		<div id="header_bg">
			<div id="header">
				<br />
				<h1><?php echo $this->Html->link('光影小镇 Shadow Town', '/'); ?></h1>
				<div id="navbar">
						<div id="blog">
							<?php echo $this->Html->link('博客', '/blog/'); ?><br />
							<?php echo $this->Html->link('Blog', '/blog/'); ?>
						</div>
						<div id="archive">
						<?php echo $this->Html->link('文档', '/archive/'); ?><br/>
						<?php echo $this->Html->link('Archive', '/archive/'); ?>
						</div>
						<div id="photos">
						<?php echo $this->Html->link('相册', '/photos/'); ?><br/>
						<?php echo $this->Html->link('Album', '/photos/'); ?>
						</div>
						<div id="about">
						<?php echo $this->Html->link('关于', '/about/'); ?><br/>
						<?php echo $this->Html->link('About', '/about/'); ?>
						</div>
						<div id="admin">
						<?php echo $this->Html->link('管理员', '/admin/'); ?><br/>
						<?php echo $this->Html->link('Admin', '/admin/'); ?>	
						</div>
				</div>
			</div>
		</div>
		<div id="container_center">
			<div id="content">
				<?php echo $this->Session->flash(); ?>
	
				<?php echo $this->fetch('content'); ?>
			</div>
			<div id="rightbar">
				<div id="fixed">
					<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
					</p>
				</div>
			</div>
		</div>
		<div id="footer_bg">
			<div id="footer">
				Copyright <?php echo date('Y'); ?> Bella's Mom
			</div>
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
