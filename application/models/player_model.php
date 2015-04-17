<?php

class Player_model extends CI_Model {

	public function add($data = NULL)
	{
		$table_name = "players";

		if($data == NULL)
		{
			return array('status' => false, 'error' => 'Data missing');
		}

		$result = $this->db->insert($table_name, $data);

		return $result;
	}

	public function search($where = NULL)
	{
		$table_name = "players";

		if($where == NULL)
		{
			$result = $this->db->get($table_name);
			return $result;
		}

		$result = $this->db->get_where($table_name, $where);

		return $result;
	}

	public function joinPlayerPerson()
	{
		$table_name = "players";

		$query = "select players.id, persons.f_name, persons.l_name from players join persons on players.person_id = persons.id";

		$result = $this->db->query($query);

		return $result;
	}
}

?>
