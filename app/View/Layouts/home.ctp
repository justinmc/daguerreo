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
		echo $this->Html->script('/ckeditor/ckeditor');
		echo $this->Html->script('http://code.jquery.com/jquery-1.7.2.min.js');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">
		<div id="header_bg">
			<div id="header">
				<br />
				<h1><?php echo $this->Html->link('光影小镇 Shadow Town', '/'); ?></h1>
				<div id="navbar">
					<a href="<?= $this->Html->url('/blog/'); ?>"><span>博客<br />Blog</span></a>
					<a href="<?= $this->Html->url('/archive/'); ?>"><span>文档<br />Archive</span></a>
					<a href="<?= $this->Html->url('/photos/'); ?>"><span>相册<br />Album</span></a>
					<a href="<?= $this->Html->url('/about/'); ?>"><span>关于<br />About</span></a>
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
					<script type="text/javascript"><!--
					google_ad_client = "ca-pub-2475745093547689";
					/* 180&#42;150 small retangle */
					google_ad_slot = "8421616956";
					google_ad_width = 180;
					google_ad_height = 150;
					//-->
					</script>
					<script type="text/javascript"
					src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
					</script>
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
