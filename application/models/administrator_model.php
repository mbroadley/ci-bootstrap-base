<?php

class Administrator_model extends MY_Model {

	function checkAccess() {
		if(($this->session->userdata('admin_id') != false) && ($this->session->userdata('admin_password') != false)) {
		
			if($this->count_by(array('id' => $this->session->userdata('admin_id'), 'password' => $this->session->userdata('admin_password'), 'active' => 1)) == 1) {
				return true;
			} else {	
				return false;
			}
			
		} else {
			return false;
		}
	}
	
	function setAdminSession($user) {
	
		$this->session->set_userdata('admin_logged_in', true);
		$this->session->set_userdata('admin_id', $user->id);
		$this->session->set_userdata('admin_username', $user->username);
		$this->session->set_userdata('admin_password', $user->password);
		
	}
}

?>