<?php

App::uses('AuthComponent', 'Controller/Component');

class User extends AppModel {
	
	var $validate = array(
		'username' => array(
			'alphaNumeric' => array(
				'rule' => 'alphaNumeric',
				'required' => true,
				'message' => 'Please enter a valid alphanumeric username'
			),
			'between' => array(
				'rule' => array('between', 5, 15),
				'message' => 'Username must be between 5 and 15 characters'
			)
		),
		'password' => array(
			'minLength' => array(
				'rule' => array('minLength', 6),
				'required' => true,
				'message' => 'Password must be at least 6 characters'
			)
		),
		'password_confirm' => array(
			'identicalFieldValues' => array(
        		'rule' => array('identicalFieldValues', 'password'),
        		'required' => true,
        		'message' => 'Passwords must match' 
			)
		)
  	);

	public function beforeSave() {
	    if (isset($this->data[$this->alias]['password'])) {
	        $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
	    }
    	return true;
	}
	
}
