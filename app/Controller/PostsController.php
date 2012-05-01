<?php
class PostsController extends AppController {
    	
    public $helpers = array('Html', 'Time');
	
	public function index() {
	    $this->layout = 'home';
		$this->set('posts', $this->Post->find('all'));
	}
	
	
}