<?php
class PhotosController extends AppController {
    	
    public $helpers = array('Html');

	
	public function index() {
	    $this->layout = 'home';
		$this->loadModel('Photo');
		
		$conn = $this->Photo->connect(); 
		
		//$this->set(array('pics' => $pics));
	}
	
	
}