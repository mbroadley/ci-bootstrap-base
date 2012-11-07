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
	
		print_r($_POST);	

		if($this->form_validation->run('login/index') == TRUE) {
		
			if($this->administrator_model->count_by(array('username' => set_value('username'),'password' => sha1(set_value('password') . $this->config->item('encryption_key')),'active' => 1)) == 1) {
			
				echo "HERER";
			
				$user = $this->administrator_model->get_by(array('username' => set_value('username'),'password' => sha1(set_value('password') . $this->config->item('encryption_key')),'active' => 1));
				$this->administrator_model->setAdminSession($user);
				
				redirect('admin/dashboard');
				
			} else {
			
				echo "HERER2";
			
				$data['login_error'] = true;				
			}
		} else {
			echo "HERER4";
		}
	
		$this->load->view('admin/shared/admin-header',$data);
		$this->load->view('admin/login/index.php',$data);
		$this->load->view('admin/shared/admin-footer',$data);
		
	}
}

/* End of file login.php */
/* Location: ./application/controllers/admin/login.php */