<?php

class Post extends AppModel {
	
	// finds all posts that haven't been deleted
	public function findNotDeleted ($fields) {
		
		return $this->find('all', array(
			'fields' => $fields, 
			'order' => 'date DESC',
			'conditions' => array('deletions.posts_id is null'), 
			'joins' => array(
				array(
					'table' => 'deletions',
					'type' => 'LEFT',
					'conditions' => array(
						'Post.id = deletions.posts_id')
					)
			)
		));
	}
	
	// updates a post in the database
	// returns 1 on success, 0 on failure
	public function edit ($formdata) {		
		$dbdata = $this->formatPost($formdata);
		
        if ($this->updateAll($dbdata, array('id' => $formdata['id']))) {	
            return 1;
        }
		else {
			return 0;
		}
	}
	
	// adds a post to the database
	// returns 1 on success, 0 on failure
	public function add ($formdata) {		
		$dbdata = $this->formatPost($formdata);
		
		if ($this->save($dbdata)) {	
            return 1;
        }
		else {
			return 0;
		}
	}


	// uploads a file to /files/
	// returns 1 on success, failure message on failure
	public function uploadFile ($_FILES, $webroot) {
		
		$result = 1;
		if(isset($_FILES['titlepic']) && !empty($_FILES['titlepic']['name'])) {
			if ($_FILES["titlepic"]["error"] > 0) {
				$result = "Upload failed: " . $_FILES["titlepic"]["error"][0];
			}
			else {
				if (file_exists($webroot . "files/" . $_FILES["titlepic"]["name"])) {
			    	$result = "Upload failed: filename already exists on the server";
			    }
			    else {
			    	move_uploaded_file($_FILES["titlepic"]["tmp_name"], $webroot . "files/" . $_FILES["titlepic"]["name"]);
			    }
			}
		}
		return $result;
	}

	// Takes an array of form data, formats it for db entry
	private function formatPost ($unformatted) {
		$unformatted['title_cn'] = $unformatted['title_cn'];
		$unformatted['title_py'] = $this->formatTitle($unformatted['title_py']);
		$unformatted['post'] = $unformatted['post'];
		$unformatted['post_intro'] = $unformatted['post_intro'];
		
		// Must have apostrophes on strings if we're editing, otherwise leave it alone
		$formatted;
		if ($unformatted['id'] == $this->getNextId()) {
			$formatted = array('id' => $unformatted['id'],
						'title_cn' => $unformatted['title_cn'],
						'title_py' => $unformatted['title_py'],
						'date' => $unformatted['date'], 
						'titlepic' => $unformatted['titlepic'], 
						'post' => $unformatted['post'],
						'post_intro' => $unformatted['post_intro']);
		}
		else {
			$formatted = array('id' => $unformatted['id'],
						'title_cn' => "'{$unformatted['title_cn']}'", 
						'title_py' => "'{$unformatted['title_py']}'",
						'titlepic' => "'{$unformatted['titlepic']}'", 
						'post' => ("'{$unformatted['post']}'"),
						'post_intro' => ("'{$unformatted['post_intro']}'"));
		}
						
		return $formatted;
	}
}