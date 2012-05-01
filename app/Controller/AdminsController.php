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
			if ($_FILES["titlepic"]["error"] > 0) {
				$this->Session->setFlash("New post failed: title photo upload returned an error");
				$this->redirect('/admin');
			}
			else {
				if (file_exists("upload/" . $_FILES["titlepic"]["name"])) {
			    	$this->Session->setFlash("New post failed: title photo filename already exists on the server");
					$this->redirect('/admin');
			    }
			    else {
			    	move_uploaded_file($_FILES["titlepic"]["tmp_name"], "files/" . $_FILES["titlepic"]["name"]);
					$formdata['titlepic'] = "files/" . $_FILES["titlepic"]["name"];
			    }
			}

			// Format the title, for url matching purposes
			$formdata['title_py'] = str_replace(' ', '_', preg_replace("/[^a-z0-9 ]/", '', strtolower($formdata['title_py'])));
			
	        if ($this->Post->save($formdata)) {
	            $this->Session->setFlash("New post added");
	        }
    	}
		$this->redirect('/admin');	
	}
	
}