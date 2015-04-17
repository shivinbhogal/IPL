<?php

class Player_role_model extends CI_Model {

	public function add($data = NULL)
	{
		$table_name = "player_roles";

		if($data == NULL)
		{
			return array('status' => false, 'error' => 'Data missing');
		}

		$result = $this->db->insert($table_name, $data);

		return $result;
	}

	public function search($where = NULL)
	{
		$table_name = "player_roles";

		if($where == NULL)
		{
			$result = $this->db->get($table_name);
			return $result;
		}

		$result = $this->db->get_where($table_name, $where);

		return $result;
	}

	public function getRoleByTeam($teamId = NULL)
	{
		if($teamId == NULL)
			return array('status' => false, 'error' => 'Required parameters missing');
		$query = "select role, teams.name, count(role) as role_count from player_roles inner join auctions on auctions.player_id = player_roles.player_id inner join teams on auctions.team_id = teams.id where teams.id = ".$teamId." group by role";

		return $this->db->query($query);
	}
}

?>