<?php
class AdminsController extends AppController {
	
	public $helpers = array('Html', 'Time');
	
	public function index() {
		
	    $this->layout = 'home';
	}
	
	public function posts() {
		
	    $this->layout = 'home';
		$this->loadModel('Post');
		
		$nextId = $this->Post->find('all', array('fields' => 'MAX(id)'));
		$nextId = $nextId[0][0]['MAX(id)'] + 1;
		
		$posts = $this->Post->find('all', array('fields' => array('id', 'title_cn', 'title_py', 'date'), 'order' => 'date DESC'));
		
		$this->set(array('nextId' => $nextId, 'posts' => $posts));
	}
	
	public function newpost() {
		
	    $this->layout = 'home';
		$this->loadModel('Post');
		
		$nextId = $this->Post->find('all', array('fields' => 'MAX(id)'));
		$nextId = $nextId[0][0]['MAX(id)'] + 1;
		
		$this->set(array('nextId' => $nextId));
	}
	
	public function editpost($postTitlePy) {
		
	    $this->layout = 'home';
		$this->loadModel('Post');

		$post = $this->Post->find('first', array('conditions' => array('title_py' => $postTitlePy)));
		
		$this->set(array('post' => $post));
	}
	
	// Adds a post to the database and redirects
	public function postadd () {
		
		$this->loadModel('Post');

		// Has any form data been POSTed?
    	if ($this->request->is('post')) {
    		
			$formdata = $this->request->data;
			if ($_FILES["titlepic"]["error"] > 0) {
				$this->Session->setFlash("New post failed: title photo upload returned an error");
				$this->redirect('/admin/newpost');
			}
			else {
				if (file_exists("files/" . $_FILES["titlepic"]["name"])) {
			    	$this->Session->setFlash("New post failed: title photo filename already exists on the server");
					$this->redirect('/admin/newpost');
			    }
			    else {
			    	move_uploaded_file($_FILES["titlepic"]["tmp_name"], "files/" . $_FILES["titlepic"]["name"]);
					$formdata['titlepic'] = "files/" . $_FILES["titlepic"]["name"];
			    }
			}

			$formdata['title_py'] = $this->titleFormat($formdata['title_py']);
			
	        if ($this->Post->save($formdata)) {
	            $this->Session->setFlash("New post added successfully");
	        }
			else {
				$this->Session->setFlash("New post failed");
			}
    	}
		$this->redirect('/admin');	
	}

	// Adds a post to the database and redirects
	public function postedit () {
		
		$this->loadModel('Post');

		// Has any form data been POSTed?
    	if ($this->request->is('post')) {
    		
			$formdata = $this->request->data;
			
			if(isset($_FILES['titlepic']) && !empty($_FILES['titlepic']['name'])) {
				if ($_FILES["titlepic"]["error"] > 0) {
					$this->Session->setFlash("Post edit failed: title photo upload returned an error");
					$this->redirect('/admin/editpost/' . $formdata['original_title_py']);
				}
				else {
					if (file_exists("files/" . $_FILES["titlepic"]["name"])) {
				    	$this->Session->setFlash("Post edit failed: title photo filename already exists on the server");
						$this->redirect('/admin/editpost/' . $formdata['original_title_py']);
				    }
				    else {
				    	move_uploaded_file($_FILES["titlepic"]["tmp_name"], "files/" . $_FILES["titlepic"]["name"]);
						$formdata['titlepic'] = "files/" . $_FILES["titlepic"]["name"];
				    }
				}
			}
			else {
				$formdata['titlepic'] = $formdata['original_titlepic'];
			}
			
			$formdata['title_cn'] = addslashes($formdata['title_cn']);
			$formdata['title_py'] = $this->titleFormat($formdata['title_py']);
			$formdata['post'] = addslashes($formdata['post']);
			
			$dbdata = array('title_cn' => "'{$formdata['title_cn']}'", 
							'title_py' => "'{$formdata['title_py']}'",
							'date' => $formdata['date'], 
							'titlepic' => "'{$formdata['titlepic']}'", 
							'post' => ("'{$formdata['post']}'"));
			
	        if ($this->Post->updateAll($dbdata, array('id' => $formdata['id']))) {	
	            $this->Session->setFlash("Post successfully edited");
	        }
			else {
				$this->Session->setFlash("Post edit failed");
			}
    	}
		$this->redirect('/admin');	
	}

	// Deletes a post (to deleted table) and redirects
	public function postdelete () {
		
	}

	// Format the title, for url matching purposes
	private function titleFormat ($unformatted) {
	
		return str_replace(' ', '_', preg_replace("/[^a-z0-9 ]/", '', strtolower($unformatted)));
	}
	
	// This should go in the model!
	private function uploadFile ($_FILES) {
		
		$result = 1;
		if(isset($_FILES['titlepic']) && !empty($_FILES['titlepic']['name'])) {
			if ($_FILES["titlepic"]["error"] > 0) {
				$result = "Upload failed: " . $_FILES["titlepic"]["error"][0];
			}
			else {
				if (file_exists("files/" . $_FILES["titlepic"]["name"])) {
			    	$result = "Upload failed: filename already exists on the server";
			    }
			    else {
			    	move_uploaded_file($_FILES["titlepic"]["tmp_name"], "files/" . $_FILES["titlepic"]["name"]);
			    }
			}
		}
		return $result;
	}
	
}