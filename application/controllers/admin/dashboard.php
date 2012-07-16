<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    function  __construct()
    {
		parent::__construct();
		$this->load->model('administrator_model');
		if(!$this->administrator_model->checkAccess()) {
            redirect('admin/login');
		} else {
			
        }
    }

    function index()
    {
    	$data = array();
    
		$this->load->view('admin/shared/admin-header',$data);
		$this->load->view('admin/dashboard/index.php',$data);
		$this->load->view('admin/shared/admin-footer',$data);
    }
}

/* End of file dashboard.php */
/* Location: ./application/controllers/admin/dashboard.php */