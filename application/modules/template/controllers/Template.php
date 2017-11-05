<?php
/**
* 
*/
class Template extends MX_Controller
{
	
	function __construct()
	{
		# code...
		parent::__construct();
	}

	
	
    //$user_id = $user->id;

	public function  admin_template($data = NULL)
	{
		$user = $this->ion_auth->user()->row();
		$data['user_id'] = $user->first_name;
		$data['user'] = $user;
		$this->load->view('admin/header_v', $data);
		$this->load->view('admin/sidebar_v', $data);
		$this->load->view('admin/main_v', $data);
		$this->load->view('admin/footer_v', $data);
	}

	public function  public_template($data = NULL)
	{
		$this->load->view('public/header_v', $data);
		$this->load->view('public/main_v', $data);
		$this->load->view('public/footer_v', $data);
	}
}