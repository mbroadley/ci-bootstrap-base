<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	function  __construct()
	{
		parent::__construct();
		$this->load->model('administrator_model');
	}
	
	function index()
	{
		
		$data = array();
	
		$this->form_validation->set_error_delimiters('<div class="alert alert-error"><button class="close" data-dismiss="alert">×</button>','</div>');
	
		if($this->form_validation->run() == TRUE) {
		
			if($this->administrator_model->count_by(array('username' => set_value('username'),'password' => sha1(set_value('password') . $this->config->item('encryption_key')),'active' => 1)) == 1) {
			
				$user = $this->administrator_model->get_by(array('username' => set_value('username'),'password' => sha1(set_value('password') . $this->config->item('encryption_key')),'active' => 1));
			
				$this->session->set_userdata('admin_logged_in', true);
				$this->session->set_userdata('admin_id', $user->id);
				$this->session->set_userdata('admin_username', $user->username);
				$this->session->set_userdata('admin_password', $user->password);
				
				redirect('admin/dashboard');
			}			
		}
		
		$this->load->view('admin/shared/admin-header',$data);
		$this->load->view('admin/login/index.php',$data);
		$this->load->view('admin/shared/admin-footer',$data);
		
	}
}

/* End of file login.php */
/* Location: ./application/controllers/admin/login.php */