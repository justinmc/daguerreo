<?php
echo $this->Session->flash('auth');
echo $this->Form->create('User');
echo $this->Form->input('username', array('label' => '用户名 / Username'));
echo $this->Form->input('password', array('label' => '密码 / Password'));
echo $this->Form->input('再次输入密码 password_confirm', array('type' => 'password'));
echo $this->Form->end('注册 Create');
?>
