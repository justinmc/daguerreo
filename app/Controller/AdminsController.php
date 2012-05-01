<?php
class AdminsController extends AppController {
	
	public $helpers = array('Html', 'Time');
	
	public function index() {
		
	    $this->layout = 'home';
		$this->loadModel('Post');
		
		$id = $this->Post->find('count');
		
		$this->set('id', $id);
	}
	
	// Adds a post to the database and redirects
	public function addPost () {
		
		$this->loadModel('Post');

		// Has any form data been POSTed?
    	if ($this->request->is('post')) {
    		
			$formdata = $this->request->data;
			// Format the title, for url matching purposes
			$formdata['title_py'] = str_replace(' ', '_', preg_replace("/[^a-z0-9 ]/", '', strtolower($formdata['title_py'])));
			
	        if ($this->Post->save($formdata)) {
	            $this->Session->setFlash("New post added");
	        }
    	}
		$this->redirect('/admin');	
	}
	
}