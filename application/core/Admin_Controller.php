<?php (defined('BASEPATH')) OR exit('No direct script access allowed');



class Admin_Controller extends MY_Controller {


	function __construct()
	{
		parent::__construct();

		$this->load->library(array('auth/ion_auth','form_validation', 'pagination'));
		$this->load->helper(array('url','language'));

		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'auth/ion_auth'), $this->config->item('error_end_delimiter', 'auth/ion_auth'));

		$this->lang->load('auth');

		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect(base_url().'auth/login', 'refresh');
		}
	}

}