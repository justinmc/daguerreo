<?php

class Photo extends AppModel {
	
	public function connect() {
		
		App::import('Vendor', 'rackspace-php-cloudfiles-5b45176/cloudfiles');
		
 		$auth = new CF_Authentication('justinjmc80','e269d069e6ddda3539dc21bc869311dc');
		$auth->authenticate(); 
 		$conn = new CF_Connection($auth);
		
		return $conn;
	}
	
}