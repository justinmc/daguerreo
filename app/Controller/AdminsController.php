<?php
class AdminsController extends AppController {
	
	public $helpers = array('Html', 'Time');
	
	public function index() {
		
	    $this->layout = 'home';
		$this->loadModel('Post');
		
		$id = $this->Post->find('count');
		
		$this->set('id', $id);
	}
	
	public function addPost () {
		
		$this->loadModel('Post');

		// Has any form data been POSTed?
    	if ($this->request->is('post')) {
	        // If the form data can be validated and saved...
	        if ($this->Post->save($this->request->data)) {
	            $this->Session->setFlash("New post added");
	        }
    	}
		$this->redirect('/admin');	
	}
	
}