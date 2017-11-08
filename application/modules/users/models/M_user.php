<?php
/**
* 
*/
class M_User extends CI_Model
{
	
	function __construct()
	{
		# code...
		parent::__construct();
	}


	


	public function get_by($id)
	{
		$this->db->from('users');
		$this->db->where('id', $id);
		$query = $this->db->get();

		return $query->result_array();
	}



	public function get_zone_by($col, $val)
	{
		$this->db->from('zones');
		$this->db->where($col, $val);
		$query = $this->db->get();

		return $query->row();
	}

	public function get_zone_like($col, $val)
	{
		$this->db->from('zones');
		$this->db->like($col, $val);
		$query = $this->db->get();

		return $query->row();
	}


	public function record_count($col, $val) {

			if($col != "" || $val != ""){
			
				if($col == "zone"){

					$zone = $this->get_zone_like($col, $val);
					$zone_id = $zone->zone_id;
			       		
					$this->db->like('zone_id', $zone_id);
				}
				else{

					$this->db->like($col, $val);
				}
		
			}

	        $query = $this->db->get("users");
			return count($query->result());

	}

	public function fetch_data($limit, $start, $col, $val) {

		if($col != "" || $val != ""){
			
				if($col == "zone"){

					$zone = $this->get_zone_like($col, $val);
					$zone_id = $zone->zone_id;
			       		
					$this->db->like('zone_id', $zone_id);
				}
				else{

					$this->db->like($col, $val);
				}
		
			}

		
		/*if($col != "" || $val != ""){
	       		
				$this->db->like($col, $val);
		}*/

		$this->db->limit($limit, $start);
        $query = $this->db->get('users');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return FALSE;
	}




	// public function record_count($zone) {

	// 	 if($zone != ""){
	//        		$zones = $this->get_zone_by($zone);
	//        		$zone_id = $zones->zone_id;
	// 			$this->db->where('users.zone_id', $zone_id);
	// 		}

	//         $query = $this->db->get("users");
	// 		return count($query->result());

	// }


	// // Fetch data according to per_page limit.
	// public function fetch_data($limit, $start, $zone) {

	// 	//$this->db->from();
		

	// 	if($zone != ""){
 //       		$zones = $this->get_zone_by($zone);
 //       		$zone_id = $zones->zone_id;
	// 		$this->db->where('users.zone_id', $zone_id);
	// 	}
	// 	$this->db->limit($limit, $start);
 //        $query = $this->db->get('users');

 //        if ($query->num_rows() > 0) {
 //            foreach ($query->result() as $row) {
 //                $data[] = $row;
 //            }
 //            return $data;
 //        }
 //        return FALSE;
	// }


	public function post($data)
	{
		if($this->db->insert('users', $data))
		{
			return TRUE;
		}

		return FALSE;
	}



	public function update($data, $id)
	{
		$this->db->set($data);
		$this->db->where('id', $id);

		if($this->db->update('users'))
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}



	public function check($email) {
			$this->db->where('email', $email);
	        $query = $this->db->get("users");
			return count($query->result());

	}



	public function delete($id)
	{	
		$this->db->set('deleted', '1');
		$this->db->where('deleted', '0');
		$this->db->where('id', $id);
		if($this->db->update('users'))
		{

			return TRUE;

		}

		return FALSE;
	}

}