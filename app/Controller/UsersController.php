<?php

/*
 * todo:
 * form verification
 * move crap into its own controller action (like login and register are now)
 * figure out what you want to do with the registration page and admin urls
 * logout button
 * make login actually check if you're in the database!
 */

class UsersController extends AppController {

    var $name = 'Users';
    var $components = array('Auth');

	public $helpers = array('Form');

    function login() {
    		
    	$this->layout = 'home';

		// if posted data, login
		if ($this->request->is('post')) {
		
			$this->User->set($this->data);
			if ($this->User->validates(array('fieldList' => array('username', 'password')))) {
	
				if ($this->Auth->login()) {
					$this->Session->setFlash("成功登入 Login successful");
					$this->redirect('/admin/');
		            $this->redirect($this->Auth->redirect());
		        } 
		        else {
		            $this->Session->setFlash("登入失败：无此用户／密码 Login failed: no such user/password pair");
		        }
			}
			else {
				$this->Session->setFlash("登入失败： Login failed");
			}
    	}
    }
 
    function logout() {
    	
		$this->Session->setFlash("您已成功退出 You have successfully logged out");
    	$this->redirect($this->Auth->logout());
    }
	
	function register() {
		
		$this->layout = 'home';
		
		// if posted data, register the user
		if ($this->request->is('post')) {
    		
			$formdata = $this->request->data;
			
			$dbdata = array(
				'id' => $this->User->getNextId(),
				'username' => $formdata['User']['username'],
				'password' => $formdata['User']['password'],
				'password_confirm' => $formdata['User']['password_confirm']
			);
			
			$this->User->set($dbdata);
			if ($this->User->validates(array('fieldList' => array('username', 'password', 'password_confirm')))) {
	
				$this->User->save($dbdata);
				$this->Session->setFlash("用户注册成功 User registration successful");
				$this->redirect('/admin/');
			}
			else {
				$this->Session->setFlash("User registration failed");
			}
		}
		
	}
}
