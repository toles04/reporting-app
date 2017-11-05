<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Zones extends Admin_Controller
{
	
	function __construct()
	{
		# code...
		parent::__construct();
		$this->load->module(['admin']);
		$this->load->model('m_zone');
	}

	function display_table($data = NULL){

		$config = array();
        $config["base_url"] = base_url() . "admin/zones";
        $config["total_rows"] = $this->m_zone->record_count();
        $config["per_page"] = 9;
        $config["uri_segment"] = 3;
        $config['cur_tag_open'] = '&nbsp;<a class="current">';
		$config['cur_tag_close'] = '</a>';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Previous';

		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		if($this->m_zone->record_count() > 0)
		{
			$data['zones_table'] = $this->get($config["per_page"], $page);
		}
		else
		{
			$data['zones_table'] = 0;
		}

		$str_links = $this->pagination->create_links();
		$data["links"] = explode('&nbsp;',$str_links );
		$data['subview'] = 'zones/zones_v';
		$data['rowz'] = $config["total_rows"];

		$this->template->admin_template($data);


	}



	// get from db
	function get($limit, $page)
	{
		$zones = $this->m_zone->fetch_data($limit, $page);
		$zones_table = "";
		if (count($zones) > 0)
		{
			$counter = 1;
			foreach ($zones as $key => $value) {
				# code...
				$zones_table .= "<tr>";
				
				$zones_table .= "<td>{$value->zone}</td>";
				$zones_table .= "<td>{$value->location}</td>";
				$zones_table .= "<td>{$value->operation_coverage_area}</td>";
				$zones_table .= "<td>{$value->agm_designate}</td>";
				$zones_table .= "<td>{$value->rank}</td>";
				$zones_table .= "<td>{$value->phone_no}</td>";
                $zones_table .= "<td>"
                        . "<a href='".base_url('admin/zones_edit/')."{$value->zone_id}'><i class='fa fa-edit'></i></a></td>"
                        . "<td><a href='#' onclick='deleteConfirm(\"".base_url()."admin/zones_delete/{$value->zone_id}\");'><i class='fa fa-trash'></i></a></td>";
				$zones_table .= "</tr>";
				$counter +=1;
			}
		}

		return $zones_table;
	}



	// Create Page
	function display_create()
	{
        $data['form_title'] = 'Add Zone';
        $data['action'] = 'admin/zones_save';
        $data['zones'] = FALSE;
        $data['subview'] = 'zones/zones_form_v';
		$this->template->admin_template($data);			
	}


	// Edit Page
	function display_edit($id)
	{
        $data['form_title'] = 'Edit Zone';
        $data['action'] = 'admin/zones_update/'.$id;
        $data['zones'] = $this->m_zone->get_by($id);
        $data['subview'] = 'zones/zones_form_v';
		$this->template->admin_template($data);			
	}

	// Validate and Insert/Update DB
	function save($id = NULL)
	{

		$this->form_validation->set_rules('zone_name', 'Zone', 'required');
		$this->form_validation->set_rules('location', 'Location', 'required');
		$this->form_validation->set_rules('oca', 'Operation/Coverage Area', 'required');
		$this->form_validation->set_rules('agm', 'AGM', 'required');
		$this->form_validation->set_rules('rank', 'Rank', 'required');
		$this->form_validation->set_rules('tel', 'Telephone NO', 'required');


		$zone_name = $this->input->post('zone_name');
		$zone_name = str_replace(' ', '', $zone_name);
	    $zone_location = $this->input->post('location');
	    $zone_oca = $this->input->post('oca');
	    $zone_agm = $this->input->post('agm');
	    $zone_rank = $this->input->post('rank');
	    $zone_telephone = $this->input->post('tel');

		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
		if ($this->form_validation->run() == FALSE)
		{
			
			$this->session->set_flashdata('msg', validation_errors());

			if($id != NULL){

				redirect(base_url().'admin/zones_edit/'.$id, 'refresh');
			}
			else{

				redirect(base_url().'admin/zones_create', 'refresh');
			}
			
			
		}
		elseif($this->m_zone->check($zone_name, $id) > 0)
		{
			$this->session->set_flashdata('msg', '<div class="bg-danger text-center">Zone Name already exists.</div>');

			if($id != NULL){
				
				redirect(base_url().'admin/zones_edit/'.$id, 'refresh');
			}
			else{

				redirect(base_url().'admin/zones_create', 'refresh');
			}
		}
		else
		{
			$data = array(
	                'zone' => $zone_name,
	                'location' => $this->input->post('location'),
	                'operation_coverage_area' => $this->input->post('oca'),
	                'agm_designate' => $this->input->post('agm'),
	                'rank' => $this->input->post('rank'),
	                'phone_no' => $this->input->post('tel'),
	                
            	);

			if($id != NULL){

				//edit
				if ($this->m_zone->update($data, $id))
				{
					$this->session->set_flashdata('msg', '<div class="bg-success text-center">Successfully Added. </div>');
		            redirect(base_url().'admin/zones_edit/'.$id, 'refresh');
				}

			}
			else{

				//insert
				$data['date_created'] = date('Y-m-d H:i:s');

				if ($this->m_zone->post($data))
				{
					$this->session->set_flashdata('msg', '<div class="bg-success text-center">Successfully Added. </div>');
		            redirect(base_url().'admin/zones_create', 'refresh');
				}

			}
			
		}

	}




	// delete from db
	function delete($id)
	{
		if ($this->m_zone->delete($id))
		{
			$this->session->set_flashdata('msgdelete', '<div class="bg-success text-center">Successfully DELETED Record. </div>');
	        redirect(base_url().'admin/zones', 'refresh');
		}
		else
		{
			$this->session->set_flashdata('msgdelete', '<div class="bg-danger text-center">Error Deleting Record. </div>');
	        redirect(base_url().'admin/zones', 'refresh');
		}

	}


}