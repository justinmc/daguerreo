<?php

class Post extends AppModel {
	
	// updates a post in the database
	// returns 1 on success, 0 on failure
	public function edit ($formdata, $_FILES) {	
			
		$formdata['title_cn'] = addslashes($formdata['title_cn']);
		$formdata['title_py'] = $this->titleFormat($formdata['title_py']);
		$formdata['post'] = addslashes($formdata['post']);
		
		$dbdata = array('title_cn' => "'{$formdata['title_cn']}'", 
						'title_py' => "'{$formdata['title_py']}'",
						'date' => $formdata['date'], 
						'titlepic' => "'{$formdata['titlepic']}'", 
						'post' => ("'{$formdata['post']}'"));
		
        if ($this->updateAll($dbdata, array('id' => $formdata['id']))) {	
            return 1;
        }
		else {
			return 0;
		}
	}


	// uploads a file to /files/
	// returns 1 on success, failure message on failure
	public function uploadFile ($_FILES) {
		
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

	// Format the pinyin title, for url matching purposes
	private function titleFormat ($unformatted) {
	
		return str_replace(' ', '_', preg_replace("/[^a-z0-9 ]/", '', strtolower($unformatted)));
	}
}