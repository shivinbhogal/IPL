<?php

class Venue_model extends CI_Model {

	public function search($where = NULL)
	{
		$table_name = "venues";

		if($where == NULL)
		{
			$result = $this->db->get($table_name);
			return $result;
		}

		$result = $this->db->get_where($table_name, $where);

		return $result;
	}
}

?>