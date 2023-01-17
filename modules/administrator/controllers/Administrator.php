<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator extends Admin {
	public function __construct(){
		parent::__construct();
	}
	
	public function index(){
		if ($this->aauth->is_loggedin()) {
			redirect('administrator/user/profile', 'refresh');
		}

		redirect('administrator/login', 'refresh');
	}
}

/* End of file Admin.php */

?>