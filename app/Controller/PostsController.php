<?php
class PostsController extends AppController {
    	
    public $helpers = array('Html', 'Time');
	
	public function index() {
	    $this->layout = 'home';
		
		$posts = $this->Post->findNotDeleted(array('id', 'title_cn', 'title_py', 'date', 'titlepic', 'post'));
		
		$this->set('posts', $posts);
	}
	
	public function post($titlePY) {
		$this->layout = 'home';
		
		$post = $this->Post->find('first', array(
			'conditions' => array(
				'title_py' => strtolower($titlePY)
				)
			));
		
		$this->set('post', $post);
	}
	
	public function archive() {
		$this->layout = 'home';
		
		$posts = $this->Post->findNotDeleted(array('id', 'title_cn', 'title_py', 'date'));
		
		$this->set('posts', $posts);
	}
}