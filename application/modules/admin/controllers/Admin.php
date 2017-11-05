<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Admin extends Admin_Controller
{
	
	function __construct()
	{
		# code...
		parent::__construct();
		$this->load->module(['template',
							'auth',
							'users',
							'dashboard',
							'zones',
							'offences',
							'reports']);
		
	}

	function index(){

		$this->dashboard();	
	}


	function dashboard(){

		$data['subview'] = 'dashboard/dashboard_v';

		$this->template->admin_template($data);	
	}



	// Users start
	function users($col = NULL, $val = NULL){

		if($col == NULL || $val == NULL && $this->input->post('filter') != "" || $this->input->post('search') != "")
		{
			$col = $this->input->post('filter');
			$val = $this->input->post('search');
		}

		$this->users->display_table($col, $val);	
	}
	


	function users_create(){

		$this->users->display_create();
	}
	function users_save(){

		$this->users->save();
	}


	function users_edit($id){

		$this->users->display_edit($id);
	}
	function users_update($id){

		$this->users->save($id);
	}


	function users_delete($id){

		$this->users->delete($id);
	}
	// Users end







	// Zones start
	function zones(){

		$this->zones->display_table();
	}


	function zones_create(){

		$this->zones->display_create();
	}
	function zones_save(){

		$this->zones->save();
	}


	function zones_edit($id){

		$this->zones->display_edit($id);
	}
	function zones_update($id){

		$this->zones->save($id);
	}


	function zones_delete($id){

		$this->zones->delete($id);
	}
	// Zones end






	// Offences start
	function offences(){

		$this->offences->display_table();	
	}



	function offences_create(){

		$this->offences->display_create();
	}
	function offences_save(){

		$this->offences->save();
	}


	function offences_edit($id){

		$this->offences->display_edit($id);
	}
	function offences_update($id){

		$this->offences->save($id);
	}


	function offences_delete($id){

		$this->offences->delete($id);
	}


	// Offences end


	function reports(){

		$this->reports->display_table();	
	}

	function arrests(){

		$this->template->admin_template();	
	}


	function tickets(){

		$this->template->admin_template();	
	}

}
