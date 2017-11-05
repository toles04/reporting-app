<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Reports extends Admin_Controller
{
	
	function __construct()
	{
		# code...
		parent::__construct();
		$this->load->module(['admin']);
		$this->load->model('m_report');
	}

	function display_table($data = NULL){

		$config = array();
        $config["base_url"] = base_url() . "admin/reports";
        $config["total_rows"] = $this->m_report->record_count();
        $config["per_page"] = 9;
        $config["uri_segment"] = 3;
        $config['cur_tag_open'] = '&nbsp;<a class="current">';
		$config['cur_tag_close'] = '</a>';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Previous';

		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		if($this->m_report->record_count() > 0)
		{
			$data['reports_table'] = $this->get($config["per_page"], $page);
		}
		else
		{
			$data['reports_table'] = 0;
		}

		$str_links = $this->pagination->create_links();
		$data["links"] = explode('&nbsp;',$str_links );
		$data['subview'] = 'reports/reports_v';
		$data['rowz'] = $config["total_rows"];

		$this->template->admin_template($data);


	}



	// get from db
	function get($limit, $page)
	{
		$reports = $this->m_report->fetch_data($limit, $page);
		$reports_table = "";
		if (count($reports) > 0)
		{
			$counter = 1;
			foreach ($reports as $key => $value) {
				# code...
				$reports_table .= "<tr>";
				
				$reports_table .= "<td>{$value->report}</td>";
				$reports_table .= "<td>{$value->location}</td>";
				$reports_table .= "<td>{$value->operation_coverage_area}</td>";
				$reports_table .= "<td>{$value->agm_designate}</td>";
				$reports_table .= "<td>{$value->rank}</td>";
				$reports_table .= "<td>{$value->phone_no}</td>";
                $reports_table .= "<td>"
                        . "<a href='".base_url('admin/reports_edit/')."{$value->report_id}'><i class='fa fa-edit'></i></a></td>"
                        . "<td><a href='#' onclick='deleteConfirm(\"".base_url()."admin/reports_delete/{$value->report_id}\");'><i class='fa fa-trash'></i></a></td>";
				$reports_table .= "</tr>";
				$counter +=1;
			}
		}

		return $reports_table;
	}



	// Create Page
	function display_create()
	{
        $data['form_title'] = 'Add report';
        $data['action'] = 'admin/reports_save';
        $data['reports'] = FALSE;
        $data['subview'] = 'reports/reports_form_v';
		$this->template->admin_template($data);			
	}


	// Edit Page
	function display_edit($id)
	{
        $data['form_title'] = 'Edit report';
        $data['action'] = 'admin/reports_update/'.$id;
        $data['reports'] = $this->m_report->get_by($id);
        $data['subview'] = 'reports/reports_form_v';
		$this->template->admin_template($data);			
	}

	// Validate and Insert/Update DB
	function save($id = NULL)
	{

		$this->form_validation->set_rules('report_name', 'report', 'required');
		$this->form_validation->set_rules('location', 'Location', 'required');
		$this->form_validation->set_rules('oca', 'Operation/Coverage Area', 'required');
		$this->form_validation->set_rules('agm', 'AGM', 'required');
		$this->form_validation->set_rules('rank', 'Rank', 'required');
		$this->form_validation->set_rules('tel', 'Telephone NO', 'required');


		$report_name = $this->input->post('report_name');
		$report_name = str_replace(' ', '', $report_name);
	    $report_location = $this->input->post('location');
	    $report_oca = $this->input->post('oca');
	    $report_agm = $this->input->post('agm');
	    $report_rank = $this->input->post('rank');
	    $report_telephone = $this->input->post('tel');

		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
		if ($this->form_validation->run() == FALSE)
		{
			
			$this->session->set_flashdata('msg', validation_errors());

			if($id != NULL){

				redirect(base_url().'admin/reports_edit/'.$id, 'refresh');
			}
			else{

				redirect(base_url().'admin/reports_create', 'refresh');
			}
			
			
		}
		elseif($this->m_report->check($report_name, $id) > 0)
		{
			$this->session->set_flashdata('msg', '<div class="bg-danger text-center">report Name already exists.</div>');

			if($id != NULL){
				
				redirect(base_url().'admin/reports_edit/'.$id, 'refresh');
			}
			else{

				redirect(base_url().'admin/reports_create', 'refresh');
			}
		}
		else
		{
			$data = array(
	                'report' => $report_name,
	                'location' => $this->input->post('location'),
	                'operation_coverage_area' => $this->input->post('oca'),
	                'agm_designate' => $this->input->post('agm'),
	                'rank' => $this->input->post('rank'),
	                'phone_no' => $this->input->post('tel'),
	                
            	);

			if($id != NULL){

				//edit
				if ($this->m_report->update($data, $id))
				{
					$this->session->set_flashdata('msg', '<div class="bg-success text-center">Successfully Added. </div>');
		            redirect(base_url().'admin/reports_edit/'.$id, 'refresh');
				}

			}
			else{

				//insert
				$data['date_created'] = date('Y-m-d H:i:s');

				if ($this->m_report->post($data))
				{
					$this->session->set_flashdata('msg', '<div class="bg-success text-center">Successfully Added. </div>');
		            redirect(base_url().'admin/reports_create', 'refresh');
				}

			}
			
		}

	}




	// delete from db
	function delete($id)
	{
		if ($this->m_report->delete($id))
		{
			$this->session->set_flashdata('msgdelete', '<div class="bg-success text-center">Successfully DELETED Record. </div>');
	        redirect(base_url().'admin/reports', 'refresh');
		}
		else
		{
			$this->session->set_flashdata('msgdelete', '<div class="bg-danger text-center">Error Deleting Record. </div>');
	        redirect(base_url().'admin/reports', 'refresh');
		}

	}


}