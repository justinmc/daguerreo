<?php

/*
 * 
 * todo:
 * move api connection info to Config folder
 * split adminsphotos adminsposts
 * edit album weird error?
 * 
 */

class AdminsController extends AppController {
	
	var $components = array('Auth');
	public $helpers = array('Html', 'Time');
	
	public function index() {
		
	    $this->layout = 'home';
	}
	
	public function photos() {
		
	    $this->layout = 'home';
		$this->loadModel('Photo');
		
		$conn = $this->Photo->connect(); 

		$cont = $conn->get_containers("daguerreo");
		$conts = $this->Photo->getPrefixContainers($conn, 'daguerreo_');

		$this->set(array('conts' => $conts));
	}
	
	public function photosedit ($albumName) {

		$this->layout = 'home';
		$this->loadModel('Photo');
		
		$conn = $this->Photo->connect();
		$cont = $conn->get_container('daguerreo_' . $albumName);
		
		$photos = $cont->list_objects();
		$title = str_replace('daguerreo_', '', $cont->name);
		$cdn_uri = $cont->cdn_uri;

		$this->set(array('photos' => $photos, 'cdn_uri' => $cdn_uri, 'title' => $title));
	}
	
	public function newphoto () {
			
		$this->loadModel('Photo');
		
		// Has any form data been POSTed?
    	if ($this->request->is('post')) {
    		
			$formdata = $this->request->data;
			
			// Check the file and write it to cloud files
			if(isset($_FILES['photo']) && !empty($_FILES['photo']['name'])) {
				if ($_FILES["photo"]["error"] > 0) {
					$this->Session->setFlash("Photo add failed: " . $_FILES["photo"]["error"][0]);
					$this->redirect('/admin/photos/' . $formdata['albumName']);
				}
				else {
					if (file_exists("files/tmp/" . $_FILES["photo"]["name"])) {
				    	$this->Session->setFlash("Photo add failed: filename already exists on the web server");
						$this->redirect('/admin/photos/' . $formdata['albumName']);
				    }
				    else {
				    	
						move_uploaded_file($_FILES["photo"]["tmp_name"], "files/tmp/" . $_FILES["photo"]["name"]);
						$bytes = filesize("files/tmp/" . $_FILES["photo"]["name"]);
						$file = fopen("files/tmp/" . $_FILES["photo"]["name"], "r");
						
						// create the cloud files object
						$conn = $this->Photo->connect();
				    	$cont = $conn->get_container('daguerreo_' . $formdata['albumName']);
				    	$obj = $cont->create_object($_FILES["photo"]["name"]);
						
						// write to cloud files!
						$result = $obj->write($file, $bytes);
						
						// delete the uploaded file from our server to save space
						unlink("files/tmp/" . $_FILES["titlepic"]["name"]);
						
				    	if ($result != TRUE) {
				    		$this->Session->setFlash("Photo add failed: could not write to Cloud Files");
							$this->redirect('/admin/photos/' . $formdata['albumName']);
						}
						else {
							$this->Session->setFlash("Photo added successfully");
						}
				    }
				}
			}
			else {
				$this->Session->setFlash("Photo add failed: file not received");
				$this->redirect('/admin/photos/' . $formdata['albumName']);
			}
		}
		else {
			$this->Session->setFlash("Photo add failed: no data received");
			$this->redirect('/admin/photos/' . $formdata['albumName']);
		}
		
		$this->redirect('/admin/photos/' . $formdata['albumName']);
	}
	
	public function deletephoto ($albumName, $photoName) {
		
		$this->loadModel('Photo');
		
		$conn = $this->Photo->connect();
		$cont = $conn->get_container('daguerreo_' . $albumName);
		
		if ($cont->delete_object($photoName))
			$this->Session->setFlash("Successfully deleted photo " . $photoName);
		else
			$this->Session->setFlash("Failed to delete photo " . $photoName);
		
		$this->redirect('/admin/photos/' . $albumName);
	}
	
	public function newalbum ($albumName) {
		
		 //Lets go ahead and create container. 
		 //$cont = $conn->create_container('peru');
		 //Now lets make a new Object
		 //$obj  = $cont->create_object('CIMG3670.JPG');
		 //Now lets put some stuff into the Object =)
		 //$obj->write('LetsPutSomeDataHere');
		 
		 $this->Session->setFlash("Failed to create album" . $albumName);
		
		$this->redirect('/admin/photos/');
	}
	
	public function posts() {
		
	    $this->layout = 'home';
		$this->loadModel('Post');
		
		$nextId = $this->Post->getNextId();
		
		$posts = $this->Post->findNotDeleted(array('id', 'title_cn', 'title_py', 'date'));
		
		$this->set(array('nextId' => $nextId, 'posts' => $posts));
	}
	
	public function newpost() {
		
	    $this->layout = 'home';
		$this->loadModel('Post');
		
		$nextId = $this->Post->getNextId();
		
		$this->set(array('nextId' => $nextId));
	}
	
	public function editpost($postTitlePy) {
		
	    $this->layout = 'home';
		$this->loadModel('Post');

		$post = $this->Post->find('first', array('conditions' => array('title_py' => $postTitlePy)));
		
		$this->set(array('post' => $post));
	}
	
	public function postedits() {
		
	    $this->layout = 'home';
		$this->loadModel('Edits');
		
		$edits = $this->Edits->find('all', array(
			'fields' => array('posts_id', 'date', 'field', 'value_old', 'value_new'),
			'order' => 'posts_id'));
		
		$this->set(array('edits' => $edits));
	}
	
	public function deletepost($postsid) {
		
		$this->loadModel('Deletions');
		
	    if ($this->Deletions->deletePost($postsid))
			$this->Session->setFlash("Post successfully deleted");
		else 
			$this->Session->setFlash("Delete failed - delete record already exists");

		$this->redirect('/admin');
	}

	// Add or edit a post in the database
	public function postsedit () {
		
		$this->loadModel('Post');
		$this->loadModel('Edits');

		// Has any form data been POSTed?
    	if ($this->request->is('post')) {
    		
			$formdata = $this->request->data;
			
			// Are we adding a new post, or editing an old one?
			$errorTitle;
			$addPost;
			if ($formdata['id'] == $this->Post->getNextId()) {
				$errorTitle = "New post";
				$addPost = 1;
			}
			else {
				$errorTitle = "Post edit";
				$addPost = 0;
			}
			
			// Upload a file if needed
			$uploadResult = $this->uploadIfFile($_FILES);
			if ($uploadResult == 1) {
				$formdata['titlepic'] = "files/" . $_FILES["titlepic"]["name"];
			}
			else if ($uploadResult == 0) {
				$formdata['titlepic'] = $formdata['original_titlepic'];
			}
			else {
				$this->Session->setFlash($errorTitle . " failed: " . $uploadResult);
				$this->redirect('/admin/editpost/' . $formdata['original_title_py']);
			}

			// And send the data to the database
			$success;
			if ($addPost){
				$success = $this->Post->add($formdata);
			}
			else {
				$olddata = $this->Post->find('first', array(
					'conditions' => array(
						'id' => $formdata['id']
						),
					'fields' => array('id', 'title_cn', 'title_py', 'titlepic', 'post')
					)
				);
				$success = $this->Edits->add($formdata, $olddata['Post']);
				if ($success)
					$success = $success && $this->Post->edit($formdata);
			}
			if ($success) {
		        $this->Session->setFlash($errorTitle . " successful");
		    }
			else {
				$this->Session->setFlash($errorTitle . " failed: problem writing to database");
			}
		}
		else {
			$this->Session->setFlash("Submission failed: no information received");
		}
		$this->redirect('/admin/posts/');
    }
	
	// Uploads a file in $_FILES, returns 1 on success, 0 on no file, error on failure
	private function uploadIfFile ($_FILES) {
		if(isset($_FILES['titlepic']) && !empty($_FILES['titlepic']['name'])) {
			$uploadResult = $this->Post->uploadFile($_FILES);
			if (!$uploadResult) {
				return $uploadResult;
			}
			else {
				return 1;
			}
		}
		return 0;
	}
	
}