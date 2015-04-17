<?php

class User_model extends CI_Model {

	public function search($where = NULL)
	{
		//Format of $where
		//array('user_name' => 'abc', 'password' => 1234)

		$table_name = "users";

		if($where == NULL)
		{
			return array('status' => false, 'error' => 'Required parameters missing');
		}

		$result = $this->db->get_where($table_name, $where);

		return $result;
	}
}

?>