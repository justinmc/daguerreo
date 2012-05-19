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
		<div id="header_bg"></div>
		<div id="container_center">
			<div id="header">
				<br />
				<h1><?php echo $this->Html->link('光影小镇 Shadow Town', '/'); ?></h1>
				<ul id="navbar">
					<li><?php echo $this->Html->link('博客Blog', '/blog/'); ?></li>
					<li><?php echo $this->Html->link('文档Archive', '/archive/'); ?></li>
					<li><?php echo $this->Html->link('相册Album', '/photos/'); ?></li>
					<li><?php echo $this->Html->link('关于About', '/about/'); ?></li>
					<li><?php echo $this->Html->link('管理员Admin', '/admin/'); ?></li>
				</ul>
			</div>
			
			<div id="content">
				<?php echo $this->Session->flash(); ?>
	
				<?php echo $this->fetch('content'); ?>
			</div>
			<div id="footer">
				Copyright <?php echo date('Y'); ?> Bella's Mom
			</div>	
		</div>
		<div id="footer_bg"></div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
