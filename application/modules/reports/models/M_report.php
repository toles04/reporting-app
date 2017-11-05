<?php
/**
* 
*/
class M_Report extends CI_Model
{
	
	function __construct()
	{
		# code...
		parent::__construct();
	}


	public function record_count() {
	        $query = $this->db->get("reports");
			return count($query->result());

	}


	public function get_by($id)
	{
		$this->db->from('reports');
		$this->db->where('report_id', $id);
		$query = $this->db->get();

		return $query->result_array();
	}


	// Fetch data according to per_page limit.
	public function fetch_data($limit, $start) {

		$this->db->from('reports');
		$this->db->limit($limit, $start);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return FALSE;
	}



	public function post($data)
	{
		if($this->db->insert('reports', $data))
		{
			return TRUE;
		}

		return FALSE;
	}



	public function update($data, $id)
	{
		$this->db->set($data);
		$this->db->where('report_id', $id);

		if($this->db->update('reports'))
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}



	public function check($report, $id) {
			$this->db->where('report_id !=', $id);
			$this->db->where('report', $report);
	        $query = $this->db->get("reports");
			return count($query->result());

	}



	public function delete($id)
	{	
		$this->db->set('deleted', '1');
		$this->db->where('deleted', '0');
		$this->db->where('report_id', $id);
		if($this->db->update('reports'))
		{

			return TRUE;

		}

		return FALSE;
	}

}