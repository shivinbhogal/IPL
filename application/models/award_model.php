<?php

class Award_model extends CI_Model {

	public function purpleCap()	//photo
	{
		$query = "select total_wickets, persons.f_name, persons.l_name, persons.photo_url, teams.name as team_name from players inner join persons on persons.id = person_id inner join auctions on auctions.player_id = players.id inner join teams on teams.id = auctions.team_id order by total_wickets desc limit 1";
		$result = $this->db->query($query);

		return $result;
	}

	public function orangeCap() //photo
	{
		$query = "select total_runs, persons.f_name, persons.l_name, persons.photo_url, teams.name as team_name from players inner join persons on persons.id = person_id inner join auctions on auctions.player_id = players.id inner join teams on teams.id = auctions.team_id order by total_runs desc limit 1";
		$result = $this->db->query($query);

		return $result;
	}

	public function mostSixes() //photo
	{
		$query = "select count(*) as six_count, persons.f_name, persons.l_name, persons.photo_url, teams.name as team_name from sixes inner join players on players.id = sixes.player_id inner join persons on persons.id = players.person_id  inner join auctions on players.id = auctions.player_id inner join teams on teams.id = auctions.team_id group by sixes.player_id order by six_count desc limit 1";
		return $this->db->query($query);
	}

	public function longestSix() //photo
	{
		$query = "select distance_in_mtr, persons.f_name, persons.l_name, persons.photo_url, teams.name as team_name from sixes inner join players on players.id = sixes.player_id inner join persons on persons.id = players.person_id  inner join auctions on players.id = auctions.player_id inner join teams on teams.id = auctions.team_id order by distance_in_mtr desc limit 1";
		return $this->db->query($query);
	}

	public function manOfMatches() //table
	{
		$query = "select persons.f_name, persons.l_name, t1.name as team1_name, t2.name as team2_name from matches inner join fixtures on fixtures.id = matches.fixture_id inner join teams as t1 on t1.id = fixtures.team2_id inner join teams as t2 on t2.id = fixtures.team2_id inner join players on players.id = man_of_match_id inner join persons on players.person_id = persons.id";
		return $this->db->query($query);
	}

	public function fastest100() //photo
	{
		$query = "select player_100s.balls, persons.f_name, persons.l_name, persons.photo_url, t1.name as team1_name, t2.name as team2_name from player_100s inner join matches on matches.id = player_100s.match_id inner join fixtures on matches.fixture_id = fixtures.id inner join teams as t1 on t1.id = fixtures.team1_id inner join teams as t2 on t2.id = fixtures.team2_id inner join players on players.id = player_100s.player_id inner join persons on persons.id = players.person_id order by balls asc limit 1";
		return $this->db->query($query);
	}

	public function fastest50() //photo
	{
		$query = "select player_50s.balls, persons.f_name, persons.l_name, persons.photo_url, t1.name as team1_name, t2.name as team2_name from player_50s inner join matches on matches.id = player_50s.match_id inner join fixtures on matches.fixture_id = fixtures.id inner join teams as t1 on t1.id = fixtures.team1_id inner join teams as t2 on t2.id = fixtures.team2_id inner join players on players.id = player_50s.player_id inner join persons on persons.id = players.person_id order by balls asc limit 1";
		return $this->db->query($query);
	}
}


?>
