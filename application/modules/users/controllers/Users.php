<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Users extends Admin_Controller
{
	
	function __construct()
	{
		# code...
		parent::__construct();
		$this->load->module(['admin']);
		$this->load->model('m_user');
	}

	function display_table($col, $val){

		if($col == "" || $val == ""){

			$config = array();
	        $config["base_url"] = base_url() . "admin/users";
	        $config["total_rows"] = $this->m_user->record_count($col, $val);
	        $config["per_page"] = 1;
	        $config["uri_segment"] = 3;
	        $config['cur_tag_open'] = '&nbsp;<a class="current">';
			$config['cur_tag_close'] = '</a>';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Previous';

			$this->pagination->initialize($config);
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

			if($this->m_user->record_count($col, $val) > 0)
			{
				$data['users_table'] = $this->get($config["per_page"], $page, $col, $val);
			}
			else
			{
				$data['users_table'] = 0;
			}

			$str_links = $this->pagination->create_links();
			$data["links"] = explode('&nbsp;',$str_links );
			$data['subview'] = 'users/users_v';
			$data['rowz'] = $config["total_rows"];

			$this->template->admin_template($data);

		}
		else{

				$config = array();
		        $config["base_url"] = base_url() . "admin/users/".$col.'/'.$val;
		        $config["total_rows"] = $this->m_user->record_count($col, $val);
		        $config["per_page"] = 1;
		        $config["uri_segment"] = 5;
		        $config['cur_tag_open'] = '&nbsp;<a class="current">';
				$config['cur_tag_close'] = '</a>';
				$config['next_link'] = 'Next';
				$config['prev_link'] = 'Previous';

				$this->pagination->initialize($config);
				$page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;

				if($this->m_user->record_count($col, $val) > 0)
				{
					$data['users_table'] = $this->get($config["per_page"], $page, $col, $val);
				}
				else
				{
					$data['users_table'] = 0;
				}

				$str_links = $this->pagination->create_links();
				$data["links"] = explode('&nbsp;',$str_links );
				$data['subview'] = 'users/users_v';
				$data['rowz'] = $config["total_rows"];

				$this->template->admin_template($data);
		}


	}




	// get from db
	function get($limit, $page, $col, $val)
	{
		$users = $this->m_user->fetch_data($limit, $page, $col, $val);
		$user = $this->ion_auth->user()->row();
		//$zone_id = $user->zone_id;
		if($this->ion_auth->in_group(3) || $this->ion_auth->in_group(4))
		{
			$users = $this->m_user->fetch_data($limit, $page, $col, $val);
		}



		
		$users_table = "";
		if (count($users) > 0)
		{

			$counter = 1;

			foreach ($users as $key => $value) {

				$zone_id = $value->zone_id;
				$zones = $this->m_user->get_zone_by('zone_id', $zone_id);
				$zone_name = $zones->zone;
				$zone_location = $zones->location;

				$action = "";
				# code...
				$status = $value->active;
				if($status == 1){

					$status = 'Activated';

				}else{

					$status = 'Deactivated';
				}
				$groups = $this->ion_auth->get_users_groups($value->id)->result();
				$group_name = "";
				foreach($groups as $group){

					$group_name = $group->name;
				}


				if($this->ion_auth->in_group(1))
				{
					$action = "<td><a href='".base_url('admin/users_edit/')."{$value->id}'><i class='fa fa-edit'></i></a></td><td><a href='#' onclick='deleteConfirm(\"".base_url()."admin/users_delete/{$value->id}\");'><i class='fa fa-trash'></i></a></td>";
				}
				elseif($this->ion_auth->in_group(2) || $this->ion_auth->in_group(3))
				{
					if($group_name == 'SuperAdmin' || $group_name == 'CentralAdmin'){

						$action="<td colspan='2'></td>";
					}
					elseif($this->ion_auth->in_group(3) && $group_name == 'ZoneAdmin'){

						$action="<td colspan='2'></td>";

					}
					else{
					$action = "<td colspan='2'><a href='".base_url('admin/users_edit/')."{$value->id}'><i class='fa fa-edit'></i></a></td>";
					}
				}	
				else
				{
					$action = "<td colspan='2'></td>";
				}


				$users_table .= "<tr>";
				$users_table .= "<td>{$counter}</td>";
				$users_table .= "<td>{$value->first_name}</td>";
				$users_table .= "<td>{$value->last_name}</td>";
				$users_table .= "<td>{$value->email}</td>";
				$users_table .= "<td>{$value->phone}</td>";
				$users_table .= "<td>{$zone_name}</td>";
				$users_table .= "<td>{$zone_location}</td>";
				$users_table .= "<td>{$status}</td>";
				$users_table .= "<td>{$group_name}</td>";
                $users_table .= $action;
				$users_table .= "</tr>";
				$counter +=1;
			}
		}

		return $users_table;
	}



	// Create Page
	function display_create()
	{
        $data['form_title'] = 'Add user';
        $data['action'] = 'admin/users_save';
        $data['users'] = FALSE;
        $data['subview'] = 'users/users_form_v';
		$this->template->admin_template($data);			
	}


	// Edit Page
	function display_edit($id)
	{
        $data['form_title'] = 'Edit user';
        $data['action'] = 'admin/users_update/'.$id;
        $data['users'] = $this->m_user->get_by($id);
        $data['subview'] = 'users/users_form_v';
		$this->template->admin_template($data);			
	}

	// Validate and Insert/Update DB
	function save($id = NULL)
	{

		$this->form_validation->set_rules('user_name', 'user', 'required');
		$this->form_validation->set_rules('location', 'Location', 'required');
		$this->form_validation->set_rules('oca', 'Operation/Coverage Area', 'required');
		$this->form_validation->set_rules('agm', 'AGM', 'required');
		$this->form_validation->set_rules('rank', 'Rank', 'required');
		$this->form_validation->set_rules('tel', 'Telephone NO', 'required');


		$user_name = $this->input->post('user_name');
		$user_name = str_replace(' ', '', $user_name);
	    $user_location = $this->input->post('location');
	    $user_oca = $this->input->post('oca');
	    $user_agm = $this->input->post('agm');
	    $user_rank = $this->input->post('rank');
	    $user_telephone = $this->input->post('tel');

		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
		if ($this->form_validation->run() == FALSE)
		{
			
			$this->session->set_flashdata('msg', validation_errors());

			if($id != NULL){

				redirect(base_url().'admin/users_edit/'.$id, 'refresh');
			}
			else{

				redirect(base_url().'admin/users_create', 'refresh');
			}
			
			
		}
		elseif($this->m_user->check($user_name, $id) > 0)
		{
			$this->session->set_flashdata('msg', '<div class="bg-danger text-center">user Name already exists.</div>');

			if($id != NULL){
				
				redirect(base_url().'admin/users_edit/'.$id, 'refresh');
			}
			else{

				redirect(base_url().'admin/users_create', 'refresh');
			}
		}
		else
		{
			$data = array(
	                'user' => $user_name,
	                'location' => $this->input->post('location'),
	                'operation_coverage_area' => $this->input->post('oca'),
	                'agm_designate' => $this->input->post('agm'),
	                'rank' => $this->input->post('rank'),
	                'phone_no' => $this->input->post('tel'),
	                
            	);

			if($id != NULL){

				//edit
				if ($this->m_user->update($data, $id))
				{
					$this->session->set_flashdata('msg', '<div class="bg-success text-center">Successfully Added. </div>');
		            redirect(base_url().'admin/users_edit/'.$id, 'refresh');
				}

			}
			else{

				//insert
				$data['date_created'] = date('Y-m-d H:i:s');

				if ($this->m_user->post($data))
				{
					$this->session->set_flashdata('msg', '<div class="bg-success text-center">Successfully Added. </div>');
		            redirect(base_url().'admin/users_create', 'refresh');
				}

			}
			
		}

	}




	// delete from db
	function delete($id)
	{
		if ($this->m_user->delete($id))
		{
			$this->session->set_flashdata('msgdelete', '<div class="bg-success text-center">Successfully DELETED Record. </div>');
	        redirect(base_url().'admin/users', 'refresh');
		}
		else
		{
			$this->session->set_flashdata('msgdelete', '<div class="bg-danger text-center">Error Deleting Record. </div>');
	        redirect(base_url().'admin/users', 'refresh');
		}

	}


}