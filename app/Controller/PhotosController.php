<?php
class PhotosController extends AppController {
    	
    public $helpers = array('Html');

	
	public function index() {
	    $this->layout = 'home';
		$this->loadModel('Photo');

		$conn = $this->Photo->connect();
		$conts = $this->Photo->getPrefixContainers($conn, 'daguerreo_');

		$this->set(array('conts' => $conts));
	}
	
	public function album($album) {
		$this->layout = 'home';
		$this->loadModel('Photo');
		
		$conn = $this->Photo->connect();
		$cont = $conn->get_container('daguerreo_' . $album);
		
		$photos = $cont->list_objects();
		$title = str_replace('daguerreo_', '', $cont->name);
		$cdn_uri = $cont->cdn_uri;

		$this->set(array('photos' => $photos, 'cdn_uri' => $cdn_uri, 'title' => $title));
	}
}