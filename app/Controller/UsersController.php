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
	var $validate = array(
      'id' => array('rule' => 'blank',
                      'on' => 'create'),
      'username' => array('rule' => 'alphanumeric',
                          'required' => true,
                            'message' => 'Please enter a username'),
        'password' => array('rule' => array('confirmPassword', 'password'),
                            'message' => 'Passwords do not match'),
      'password_confirm' => array('rule' => 'alphanumeric',
                                    'required' => true)
  	);

	public $helpers = array('Form');

    function login() {
    		
    	$this->layout = 'home';
		
		// if posted data, login
		if ($this->request->is('post')) {
    		
			$formdata = $this->request->data;
			
			$dbdata = array(
				'username' => $formdata['User']['username'],
				'password' => $formdata['User']['password']
			);
			
			if ($this->Auth->login($formdata)) { // $this->Auth->isAuthorized
				$this->Session->setFlash("成功登入 Login successful");
				$this->redirect('/admin/');
			}
			else {
				$this->Session->setFlash("登入失败：无此用户／密码 Login failed: no such user/password pair");
			}
		}
    }
 
    function logout() {
    	
		$this->Session->setFlash("您已成功退出 You have successfully logged out");
    	$this->redirect($this->Auth->logout());
    }
	
	function register() {
		
		$this->loadModel('Users');
		$this->layout = 'home';
		
		// if posted data, register the user
		if ($this->request->is('post')) {
    		
			$formdata = $this->request->data;
			
			$dbdata = array(
				'id' => $this->Users->getNextId(),
				'username' => $formdata['User']['username'],
				'password' => $this->Auth->password($formdata['User']['password'])
			);
			
			$this->Users->save($dbdata);
			
			$this->Session->setFlash("用户注册成功 User registration successful");
			$this->redirect('/admin/');
		}
		
	}
}
