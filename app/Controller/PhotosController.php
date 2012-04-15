<?php
class PhotosController extends AppController {
    	
    public $helpers = array('Html');

	
	public function index() {
	    $this->layout = 'home';
	}
	
	
}