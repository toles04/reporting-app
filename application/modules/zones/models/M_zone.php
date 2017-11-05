<?php
/**
* 
*/
class M_Zone extends CI_Model
{
	
	function __construct()
	{
		# code...
		parent::__construct();
	}


	public function record_count() {
	        $query = $this->db->get("zones");
			return count($query->result());

	}


	public function get_by($id)
	{
		$this->db->from('zones');
		$this->db->where('zone_id', $id);
		$query = $this->db->get();

		return $query->result_array();
	}


	public function get_zone_by_id($id)
	{
		$this->db->from('zones');
		$this->db->where('zone_id', $id);
		$query = $this->db->get();

		return $query->row();
	}


	// Fetch data according to per_page limit.
	public function fetch_data($limit, $start) {

		$this->db->from('zones');
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
		if($this->db->insert('zones', $data))
		{
			return TRUE;
		}

		return FALSE;
	}



	public function update($data, $id)
	{
		$this->db->set($data);
		$this->db->where('zone_id', $id);

		if($this->db->update('zones'))
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}



	public function check($zone, $id) {
			$this->db->where('zone_id !=', $id);
			$this->db->where('zone', $zone);
	        $query = $this->db->get("zones");
			return count($query->result());

	}



	public function delete($id)
	{	
		$this->db->set('deleted', '1');
		$this->db->where('deleted', '0');
		$this->db->where('zone_id', $id);
		if($this->db->update('zones'))
		{

			return TRUE;

		}

		return FALSE;
	}

}