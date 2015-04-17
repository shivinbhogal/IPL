<?php

class Team_model extends CI_Model {

	public function add($data = NULL)
	{
		$table_name = "teams";

		if($data == NULL)
		{
			return array('status' => false, 'error' => 'Data missing');
		}

		$result = $this->db->insert($table_name, $data);

		return $result;
	}

	public function search($where = NULL)
	{
		$table_name = "teams";

		if($where == NULL)
		{
			$result = $this->db->get($table_name);
			return $result;
		}

		$result = $this->db->get_where($table_name, $where);

		return $result;
	}

	public function getPlayers($whereTeam = NULL)	//Find all players of a team
	{

		if($whereTeam == NULL)
		{
			$query = "select teams.id, teams.name , auctions.player_id, persons.f_name, persons.l_name from teams inner join auctions on auctions.team_id = teams.id inner join players on players.id = auctions.player_id inner join persons on persons.id = players.person_id";
		}
		else
			$query = "select teams.id, teams.name , auctions.player_id, persons.f_name, persons.l_name from teams inner join auctions on auctions.team_id = teams.id inner join players on players.id = auctions.player_id inner join persons on persons.id = players.person_id where teams.id=".$whereTeam;

		$result = $this->db->query($query);
		return $result;
	}

	public function getTeamPlayerAmtGroupJoin()	//Bid amounts of teams
	{
		$query = "select teams.id, teams.name, sum(auctions.bid_amt) as amt from teams inner join auctions on auctions.team_id = teams.id inner join players on players.id = auctions.player_id inner join persons on persons.id = players.person_id group by name";
		return $this->db->query($query);
	}

	public function getTeamPlayerAmtJoin()	//For individuals
	{
		$query = "select teams.id, teams.name , auctions.player_id, persons.f_name, persons.l_name, auctions.bid_amt from teams inner join auctions on auctions.team_id = teams.id inner join players on players.id = auctions.player_id inner join persons on persons.id = players.person_id order by bid_amt desc";
		return $this->db->query($query);
	}
	public function teamJoin()
	{
		$query = "select name, home_ground, persons.f_name as owner_fname, persons.l_name as owner_lname, p2.f_name as captain_fname, p2.l_name as captain_lname, p3.f_name as coach_fname, p3.l_name as coach_lname from teams inner join owners on owners.id = teams.owner_id inner join persons on owners.person_id = persons.id inner join players on players.id = teams.captain_id inner join persons as p2 on p2.id = players.person_id inner join coaches on coaches.id = teams.coach_id inner join persons as p3 on p3.id = coaches.person_id";
		$result = $this->db->query($query);
		return $result;
	}
}

?>