<?php

class Team_stat_model extends CI_Model {

	public function add($data = NULL)
	{
		$table_name = "team_stats";

		if($data == NULL)
		{
			return array('status' => false, 'error' => 'Data missing');
		}

		$result = $this->db->insert($table_name, $data);

		return $result;
	}

	public function search($where = NULL)
	{
		$table_name = "team_stats";

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
		$table_name = "team_stats";

		if($where == NULL || $data == NULL)
		{
			return array('status' => false, 'error' => 'Required parameters missing');
		}

		$this->db->update($table_name, $data, $where);
	}

	public function standings()
	{
		$table_name = "team_stats";
		$query = "select teams.name, total_matches, matches_won, matches_lost, points, net_run_rate from team_stats inner join teams on teams.id = team_id order by team_stats.points desc";
		$result = $this->db->query($query);

		return $result;
	}
}

?>