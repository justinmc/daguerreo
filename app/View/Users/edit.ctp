<h2>Change Password</h2>
<h3>User: <?= $username ?></h3>
<?php
echo $this->Session->flash('auth');
echo $this->Form->create('User');
echo $this->Form->input('password_old', array('label' => '密码 / Old Password', 'type' => 'password'));
echo $this->Form->input('password', array('label' => '密码 / New Password'));
echo $this->Form->input('password_confirm', array('label' => '再次输入密码 Confirm Password', 'type' => 'password'));
echo $this->Form->end('注册 Create');
?>
