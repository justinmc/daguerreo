<?php
class AboutsController extends AppController {
	
	public $helpers = array('Html');
	
	public function index() {
	    $this->layout = 'home';
	}
	
}