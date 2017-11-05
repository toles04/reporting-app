<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Offences extends Admin_Controller
{
	
	function __construct()
	{
		# code...
		parent::__construct();
		$this->load->module(['admin']);
		$this->load->model('m_offence');
	}

	function display_table($data = NULL){

		$config = array();
        $config["base_url"] = base_url() . "admin/offences";
        $config["total_rows"] = $this->m_offence->record_count();
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;
        $config['cur_tag_open'] = '&nbsp;<a class="current">';
		$config['cur_tag_close'] = '</a>';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Previous';

		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		if($this->m_offence->record_count() > 0)
		{
			$data['offences_table'] = $this->get($config["per_page"], $page);
		}
		else
		{
			$data['offences_table'] = 0;
		}

		$str_links = $this->pagination->create_links();
		$data["links"] = explode('&nbsp;',$str_links );
		$data['subview'] = 'offences/offences_v';
		$data['rowz'] = $config["total_rows"];

		$this->template->admin_template($data);


	}



	// get from db
	function get($limit, $page)
	{
		$offences = $this->m_offence->fetch_data($limit, $page);
		$offences_table = "";
		if (count($offences) > 0)
		{
			$counter = 1;
			foreach ($offences as $key => $value) {
				# code...
				$offences_table .= "<tr>";
				$offences_table .= "<td>{$counter}</td>";
				$offences_table .= "<td>{$value->offence}</td>";
				$offences_table .= "<td>{$value->fine}</td>";
                $offences_table .= "<td>"
                        . "<a href='".base_url('admin/offences_edit/')."{$value->offence_id}'><i class='fa fa-edit'></i></a></td>"
                        . "<td><a href='#' onclick='deleteConfirm(\"".base_url()."admin/offences_delete/{$value->offence_id}\");'><i class='fa fa-trash'></i></a></td>";
				$offences_table .= "</tr>";
				$counter +=1;
			}
		}

		return $offences_table;
	}



	// Create Page
	function display_create()
	{
        $data['form_title'] = 'Add offence';
        $data['action'] = 'admin/offences_save';
        $data['offences'] = FALSE;
        $data['subview'] = 'offences/offences_form_v';
		$this->template->admin_template($data);			
	}


	// Edit Page
	function display_edit($id)
	{
        $data['form_title'] = 'Edit offence';
        $data['action'] = 'admin/offences_update/'.$id;
        $data['offences'] = $this->m_offence->get_by($id);
        $data['subview'] = 'offences/offences_form_v';
		$this->template->admin_template($data);			
	}

	// Validate and Insert/Update DB
	function save($id = NULL)
	{

		$this->form_validation->set_rules('offence_name', 'offence', 'required');
		$this->form_validation->set_rules('fine', 'fine', 'required');


		$offence_name = $this->input->post('offence_name');
	    $offence_fine = $this->input->post('fine');
	   

		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
		if ($this->form_validation->run() == FALSE)
		{
			
			$this->session->set_flashdata('msg', validation_errors());

			if($id != NULL){

				redirect(base_url().'admin/offences_edit/'.$id, 'refresh');
			}
			else{

				redirect(base_url().'admin/offences_create', 'refresh');
			}
			
			
		}
		elseif($this->m_offence->check($offence_name, $id) > 0)
		{
			$this->session->set_flashdata('msg', '<div class="bg-danger text-center">offence already exists.</div>');

			if($id != NULL){
				
				redirect(base_url().'admin/offences_edit/'.$id, 'refresh');
			}
			else{

				redirect(base_url().'admin/offences_create', 'refresh');
			}
		}
		else
		{
			$data = array(
	                'offence' => $offence_name,
	                'fine' => $this->input->post('fine'),  
            	);

			if($id != NULL){

				//edit
				if ($this->m_offence->update($data, $id))
				{
					$this->session->set_flashdata('msg', '<div class="bg-success text-center">Successfully Added. </div>');
		            redirect(base_url().'admin/offences_edit/'.$id, 'refresh');
				}

			}
			else{

				//insert
				$data['date_created'] = date('Y-m-d H:i:s');

				if ($this->m_offence->post($data))
				{
					$this->session->set_flashdata('msg', '<div class="bg-success text-center">Successfully Added. </div>');
		            redirect(base_url().'admin/offences_create', 'refresh');
				}

			}
			
		}

	}




	// delete from db
	function delete($id)
	{
		if ($this->m_offence->delete($id))
		{
			$this->session->set_flashdata('msgdelete', '<div class="bg-success text-center">Successfully DELETED Record. </div>');
	        redirect(base_url().'admin/offences', 'refresh');
		}
		else
		{
			$this->session->set_flashdata('msgdelete', '<div class="bg-danger text-center">Error Deleting Record. </div>');
	        redirect(base_url().'admin/offences', 'refresh');
		}

	}


}