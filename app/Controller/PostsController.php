<?php
class PostsController extends AppController {
    	
    public $helpers = array('Html', 'Time');
	
	public function index() {
	    $this->layout = 'home';
		
		$this->set('posts', $this->Post->find('all', array('order' => 'date DESC')));
	}
	
	public function post($titlePY) {
		$this->layout = 'home';
		
		$conditions = array('title_py' => strtolower($titlePY));
		$post = $this->Post->find('first', array('conditions' => $conditions));
		
		$this->set('post', $post);
	}
}