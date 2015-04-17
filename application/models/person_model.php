<?php

class Person_model extends CI_Model {

	public function search($where = NULL)
	{
		$table_name = "persons";

		if($where == NULL)
		{
			$result = $this->db->get($table_name);
			return $result;
		}

		$result = $this->db->get_where($table_name, $where);

		return $result;
	}

	public function update($where = NULL, $data = NULL)
	{
		$table_name = "persons";

		//state = 0 -> Person not assigned
		//state = 1 -> Assigned to player
		//state = 2 -> Assigned to coach
		//state = 3 -> Assigned to umpire
		//state = 4 -> Assigned to owner

		if($where == NULL)
		{
			return array('status' => false, 'error' => 'Data missing');
		}

		$this->db->update($table_name, $data, $where);
	}
}

?>
