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
    		
			$formdata = $this->request->data;
			// Make the title lower case, for url matching purposes
			$formdata['title_py'] = str_replace(' ', '_', strtolower($formdata['title_py']));
			
	        if ($this->Post->save($formdata)) {
	            $this->Session->setFlash("New post added");
	        }
    	}
		$this->redirect('/admin');	
	}
	
}