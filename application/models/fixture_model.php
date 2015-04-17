<?php

class Fixture_model extends CI_Model {

	public function add($data = NULL)
	{
		$table_name = "fixtures";

		if($data == NULL)
		{
			return array('status' => false, 'error' => 'Data missing');
		}

		$result = $this->db->insert($table_name, $data);

		return $result;
	}

	public function search($where = NULL)
	{
		$table_name = "fixtures";

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
		$table_name = "fixtures";

		if($where == NULL || $data == NULL)
		{
			return array('status' => false, 'error' => 'Required parameters missing');
		}

		$this->db->update($table_name, $data, $where);
	}

	public function fixtureJoin()
	{
		$query = "select fixtures.id, completed, date_time, team1_id , teams.name as team1_name, team2_id, teamtwo.name as team2_name, venue_id, venues.name as venue_name, umpire_id, f_name as umpire_name from fixtures  inner join teams on (fixtures.team1_id = teams.id) inner join teams as teamtwo on (fixtures.team2_id = teamtwo.id)  inner join venues on venues.id = fixtures.venue_id inner join umpires on fixtures.umpire_id = umpires.id inner join persons on umpires.person_id = persons.id order by date_time";

		$result = $this->db->query($query);

		return $result;
	}
}

?>



