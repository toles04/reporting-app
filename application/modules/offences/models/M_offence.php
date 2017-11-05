<?php
/**
* 
*/
class M_Offence extends CI_Model
{
	
	function __construct()
	{
		# code...
		parent::__construct();
	}


	public function record_count() {
	        $query = $this->db->get("offences");
			return count($query->result());

	}


	public function get_by($id)
	{
		$this->db->from('offences');
		$this->db->where('offence_id', $id);
		$query = $this->db->get();

		return $query->result_array();
	}


	// Fetch data according to per_page limit.
	public function fetch_data($limit, $start) {

		$this->db->from('offences');
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
		if($this->db->insert('offences', $data))
		{
			return TRUE;
		}

		return FALSE;
	}



	public function update($data, $id)
	{
		$this->db->set($data);
		$this->db->where('offence_id', $id);

		if($this->db->update('offences'))
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}



	public function check($offence, $id) {
			$this->db->where('offence_id !=', $id);
			$this->db->where('offence', $offence);
	        $query = $this->db->get("offences");
			return count($query->result());

	}



	public function delete($id)
	{	
		$this->db->set('deleted', '1');
		$this->db->where('deleted', '0');
		$this->db->where('offence_id', $id);
		if($this->db->update('offences'))
		{

			return TRUE;

		}

		return FALSE;
	}

}