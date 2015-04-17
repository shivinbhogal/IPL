<?php

class Match_model extends CI_Model {

	public function add($data = NULL)
	{
		$table_name = "matches";

		if($data == NULL)
		{
			return array('status' => false, 'error' => 'Data missing');
		}

		$result = $this->db->insert($table_name, $data);

		return $result;
	}

	public function search($where = NULL)
	{
		$table_name = "matches";

		if($where == NULL)
		{
			$result = $this->db->get($table_name);
			return $result;
		}

		$result = $this->db->get_where($table_name, $where);

		return $result;
	}

	public function matchDetails($matchId = NULL)
	{
		$table_name = "matches";

		if($matchId == NULL)
		{
			$query = "select winning_team_id, fixture_id, fixtures.team1_id, fixtures.team2_id, teams.name as team1_name, secondteam.name as team2_name from matches inner join fixtures on matches.fixture_id = fixtures.id inner join teams on fixtures.team1_id = teams.id inner join teams as secondteam on secondteam.id = fixtures.team2_id";
		}
		else
		{
			$query = "select winning_team_id, fixture_id, fixtures.team1_id, fixtures.team2_id, teams.name as team1_name, secondteam.name as team2_name from matches inner join fixtures on matches.fixture_id = fixtures.id inner join teams on fixtures.team1_id = teams.id inner join teams as secondteam on secondteam.id = fixtures.team2_id where matches.id = ".$matchId;
		}

		$result = $this->db->query($query);

		return $result;
	}

}

?>