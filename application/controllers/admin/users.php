<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

    function  __construct()
    {
		parent::__construct();
		$this->load->model('administrator_model');
		if(!$this->administrator_model->checkAccess()) {
            redirect('admin/login');
		} else {
			$this->load->model('user_model');
			$this->load->model('application_model');
			$this->load->model('version_model');
			$this->load->model('user_version_xref_model');
        }
    }

    function view($msg='')
    {
    	$data['users'] = $this->user_model->get_all();

    	if($msg==1) {
	    	$data['added'] = true;
    	}
    	
		$this->load->view('admin/shared/admin-header',$data);
		$this->load->view('admin/users/view.php',$data);
		$this->load->view('admin/shared/admin-footer',$data);
    }
    
    function add()
    {
    	$data = array();
    
		$this->form_validation->set_error_delimiters('<span class="help-inline">','</span>');
		
		if($this->form_validation->run() == TRUE) {
			
			$user = $this->user_model->insert(
				array(
					'forename' => set_value('forename'),
					'surname' => set_value('surname'),
					'email' => set_value('email'),
					'username' => set_value('username'),
					'password' => sha1(set_value('password') . $this->config->item('encryption_key'))
				)
			);
			
			if(!$user) {
				echo "Error";
			} else {
				redirect('admin/users/view/1');
			}
		}
		
		$this->load->view('admin/shared/admin-header',$data);
		$this->load->view('admin/users/add.php',$data);
		$this->load->view('admin/shared/admin-footer',$data);
    }
    
    function edit($id,$msg='')
    {
		$this->form_validation->set_error_delimiters('<span class="help-inline">','</span>');
		
		// Get information about apps and their versions.  Need this in the display and update parts of this function
		$apps = $this->application_model->get_all();
		$app_info = array();
		$i=0;
		foreach($apps as $app) {
			$app_info[$i]['info'] = $app;
			$app_info[$i]['versions'] = $this->version_model->get_many_by('application_id',$app->id);
			$i++;
		}
		
		if($this->form_validation->run('users/edit') == TRUE) {
			
			$item_info = array(
				'forename' => set_value('forename'),
				'surname' => set_value('surname'),
				'email' => set_value('email'),
				'username' => set_value('username')
			);
			
			if(set_value('password') != '') {
				$item_info['password'] = sha1(set_value('password') . $this->config->item('encryption_key'));
			}
			
			$user = $this->user_model->update($id,$item_info);
			
			// Loop through app info and work out which checkboxes were ticked
			$user_versions = array();
			foreach($app_info as $app) {
				foreach($app['versions'] as $version) {
					if($this->input->post('version' . $version->id) == 1) {
						$user_versions[] = $version->id;
					}
				}
			}
			
			$this->user_version_xref_model->delete_by('user_id',$id);
			foreach($user_versions as $version_id) {
				$info = array(
					'user_id' => $id,
					'version_id' => $version_id
				);
				
				$this->user_version_xref_model->insert($info);
			}
			
			if(!$user) {
				echo "Error";
			} else {
				redirect('admin/users/edit/' . $id . '/2');
			}
		}
		
		if($msg==2) {
			$data['updated'] = true;
		}
		
		$data['info'] = $this->user_model->get($id);
		$data['full_app_info'] = $app_info;
		$data['user_app_info'] = $this->user_version_xref_model->getVersionIdsForUser($id);
		
		$this->load->view('admin/shared/admin-header',$data);
		$this->load->view('admin/users/edit.php',$data);
		$this->load->view('admin/shared/admin-footer',$data);
    }
    
    function delete($id)
    {
	    
    }
    
    function confirmdelete($id)
    {
	    
    }
}

/* End of file users.php */
/* Location: ./application/controllers/admin/users.php */