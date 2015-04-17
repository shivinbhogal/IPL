<?php

class Owner_model extends CI_Model {

	public function add($data = NULL)
	{
		$table_name = "owners";

		if($data == NULL)
		{
			return array('status' => false, 'error' => 'Data missing');
		}

		$result = $this->db->insert($table_name, $data);

		return $result;
	}

	public function search($where = NULL)
	{
		$table_name = "owners";

		if($where == NULL)
		{
			$result = $this->db->get($table_name);
			return $result;
		}

		$result = $this->db->get_where($table_name, $where);

		return $result;
	}

	public function joinOwnerPerson()
	{
		$table_name = "owners";

		$query = "select owners.id, persons.f_name, persons.l_name from owners join persons on owners.person_id = persons.id";

		$result = $this->db->query($query);

		return $result;
	}
}

?>

