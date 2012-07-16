<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends CI_Controller {

	function Logout()
	{
		parent::__construct();
	}
	
	function index()
	{
		$this->session->sess_destroy();
		session_start();
		$_SESSION = array();
		session_destroy();
		redirect('admin/login');
	}
}

/* End of file logout.php */
/* Location: ./application/controllers/admin/logout.php */