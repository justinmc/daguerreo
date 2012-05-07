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
		// you really want to get only non deleted posts: select posts.title_cn from posts left join deletions on posts.id = deletions.posts_id where deletions.posts_id is null;
		
		$this->set(array('nextId' => $nextId, 'posts' => $posts));
	}
	
	public function newpost() {
		
	    $this->layout = 'home';
		$this->loadModel('Post');
		
		//$this->Post->add();
		
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
	
	public function deletepost($postsid) {
		
		$this->loadModel('Deletions');
		
	    if ($this->Deletions->deletePost($postsid))
			$this->Session->setFlash("Post successfully deleted");
		else 
			$this->Session->setFlash("Delete failed - record already exists");

		$this->redirect('/admin');
	}

	// Updates a post in the database
	public function postedit () {
		
		$this->loadModel('Post');

		// Has any form data been POSTed?
    	if ($this->request->is('post')) {
    		
			$formdata = $this->request->data;
			
			if(isset($_FILES['titlepic']) && !empty($_FILES['titlepic']['name'])) {
				$uploadResult = $this->Post->uploadFile($_FILES);
				if (!$uploadResult) {
					$this->Session->setFlash("Post edit failed: " . $uploadResult);
					$this->redirect('/admin');
				}
				else {
					$formdata['titlepic'] = "files/" . $_FILES["titlepic"]["name"];
				}
			}
			else {
				$formdata['titlepic'] = $formdata['original_titlepic'];
			}
			
	        if ($this->Post->edit($formdata, $_FILES)) {	
	            $this->Session->setFlash("Post successfully edited");
	        }
			else {
				$this->Session->setFlash("Post edit failed");
			}
    	}
		$this->redirect('/admin');
	}

	// Format the title, for url matching purposes
	private function titleFormat ($unformatted) {
	
		return str_replace(' ', '_', preg_replace("/[^a-z0-9 ]/", '', strtolower($unformatted)));
	}
	
}