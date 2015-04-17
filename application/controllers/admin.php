<?php

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->model('person_model');
		$this->load->model('player_model');
		$this->load->model('coach_model');
		$this->load->model('umpire_model');
		$this->load->model('owner_model');
		$this->load->model('team_model');
		$this->load->model('auction_model');
		$this->load->model('venue_model');
		$this->load->model('fixture_model');
		$this->load->model('sponsor_model');
		$this->load->model('player_role_model');
		$this->load->model('match_model');
		$this->load->model('team_stat_model');
		$this->load->model('six_model');
		$this->load->model('batting_stat_model');
		$this->load->model('bowling_stat_model');
		$this->load->model('player_50_model');
		$this->load->model('player_100_model');
		$this->load->model('flush_model');
	}

	public function index()
	{
		if(!$this->session->userdata('user_id'))	//If user is not logged in
			redirect('/login', 'refresh');

		redirect('/dashboard', 'refresh');
	}

	public function persons()
	{
		$this->load->view('persons');
	}

	public function players()
	{
		$where = array('state' => 0);
		$result = $this->person_model->search($where);
		$result = $result->result_array();

		$data['result'] = $result;
		$this->load->view('players', $data);
	}

	public function coaches()
	{
		$where = array('state' => 0);
		$result = $this->person_model->search($where);
		$result = $result->result_array();

		$data['result'] = $result;
		$this->load->view('coaches', $data);
	}


	public function umpires()
	{
		$where = array('state' => 0);
		$result = $this->person_model->search($where);
		$result = $result->result_array();

		$data['result'] = $result;
		$this->load->view('umpires', $data);
	}

	public function owners()
	{
		$where = array('state' => 0);
		$result = $this->person_model->search($where);
		$result = $result->result_array();

		$data['result'] = $result;
		$this->load->view('owners', $data);
	}


	public function venues()
	{
		$this->load->view('venues');
	}

	public function teams()
	{
		$resultPlayers = $this->player_model->joinPlayerPerson();
		$resultPlayers = $resultPlayers->result_array();

		$resultCoaches = $this->coach_model->joinCoachPerson();
		$resultCoaches = $resultCoaches->result_array();

		$resultOwners = $this->owner_model->joinOwnerPerson();
		$resultOwners = $resultOwners->result_array();

		$data['resultOwners'] = $resultOwners;
		$data['resultCoaches'] = $resultCoaches;
		$data['resultPlayers'] = $resultPlayers;

		$this->load->view('teams', $data);
	}

	public function auctions()
	{
		$resultPlayers = $this->player_model->joinPlayerPerson();
		$resultPlayers = $resultPlayers->result_array();

		$resultTeams = $this->team_model->search();
		$resultTeams = $resultTeams->result_array();

		$data['resultPlayers'] = $resultPlayers;
		$data['resultTeams'] = $resultTeams;

		$this->load->view('auctions', $data);
	}


	function _createFixtures()
	{
		$resultTeams = $this->team_model->search();
		$numOfTeams = $resultTeams->num_rows;
		$resultTeams = $resultTeams->result_array();

		$resultVenues = $this->venue_model->search();
		$numOfVenues = $resultVenues->num_rows;
		$resultVenues = $resultVenues->result_array();

		$resultUmpires = $this->umpire_model->search();
		$numOfUmpires = $resultUmpires->num_rows;
		$resultUmpires = $resultUmpires->result_array();


		for($i = 0; $i < $numOfTeams; $i++)
		{
			for($j = $i+1; $j < $numOfTeams; $j++)
			{
				$randomVenueIndex = rand(0, $numOfVenues-1);
				$randomUmpireIndex = rand(0, $numOfUmpires-1);

				$venueId = $resultVenues[$randomVenueIndex]['id'];
				$umpireId = $resultUmpires[$randomUmpireIndex]['id'];

				$time = (time() + ($j*60000 + $i*60000) );

				$data = array('date_time' => $time, 'team1_id' => $resultTeams[$i]['id'],
							  'team2_id' => $resultTeams[$j]['id'], 'venue_id' => $venueId, 'umpire_id' => $umpireId);

				$this->fixture_model->add($data);
			}
		}

	}

	public function fixtures()
	{

		$result = $this->fixture_model->search();
		if(!$result->num_rows)	//If no fixtures are present
			$this->_createFixtures();

		$resultFixtures = $this->fixture_model->fixtureJoin();
		$resultFixtures = $resultFixtures->result_array();

		$data['fixtureResults'] = $resultFixtures;

		$this->load->view('fixtures', $data);
	}


	public function sponsors()
	{
		$this->load->view("sponsors");
	}

	public function player_roles()
	{
		$resultPlayers = $this->player_model->joinPlayerPerson();
		$resultPlayers = $resultPlayers->result_array();

		$data['result'] = $resultPlayers;
		$this->load->view('playerroles', $data);
	}

	public function matches()
	{
		$fixtures = $this->fixture_model->fixtureJoin();
		$fixtures = $fixtures->result_array();
		$i=0;

		foreach ($fixtures as $fixture) {

			$i++;
			if(!$fixture['completed'])
			{

				$teamOnePlayers = $this->team_model->getPlayers($fixture['team1_id']);
				$teamOnePlayers = $teamOnePlayers->result_array();

				$teamTwoPlayers = $this->team_model->getPlayers($fixture['team2_id']);
				$teamTwoPlayers = $teamTwoPlayers->result_array();

				$data['resultFixture'] = $fixture;
				$data['teamOne'] = $teamOnePlayers;
				$data['teamTwo'] = $teamTwoPlayers;
				$data['matchCount'] = $i;

				$this->load->view('match_summary', $data);
				return;
			}
		}

		//All matches completed
		$this->load->view('finished');
	}


	public function matchdetail($matchId = NULL)
	{
		if($matchId == NULL)
		{
			redirect('admin/matches', 'refresh');
			return;
		}

		$match = $this->match_model->matchDetails($matchId);
		$match = $match->result_array();
		$match = $match[0];

		$where = array('team_id' => $match['team1_id']);
		$team1Stat = $this->team_stat_model->search($where);
		$team1Stat = $team1Stat->result_array();

		$team1Stat = $team1Stat[0];

		$where = array('team_id' => $match['team2_id']);
		$team2Stat = $this->team_stat_model->search($where);
		$team2Stat = $team2Stat->result_array();
		$team2Stat = $team2Stat[0];

		$netRunRate1 = rand(0,100) / 100;
		$netRunRate2 = rand(0,100) / 100;

		if($match['winning_team_id'] == $team1Stat['team_id'])
		{
			$team1Stat['matches_won'] = $team1Stat['matches_won'] +1;
			$team2Stat['matches_lost'] = $team1Stat['matches_lost'] +1;
		}

		else
		{
			$team2Stat['matches_won'] = $team1Stat['matches_won'] +1;
			$team1Stat['matches_lost'] = $team1Stat['matches_lost'] +1;

		}
		$team1Stat['net_run_rate'] = $netRunRate1;
		$team2Stat['net_run_rate'] = $netRunRate2;

		$team1Stat['total_matches'] = $team1Stat['total_matches'] + 1;
		$team2Stat['total_matches'] = $team2Stat['total_matches'] + 1;

		$team1Stat['points'] = 2 * $team1Stat['matches_won'];
		$team2Stat['points'] = 2 * $team2Stat['matches_won'];

		$where = array('team_id' => $match['team1_id']);
		$this->team_stat_model->update($where, $team1Stat);

		$where = array('team_id' => $match['team2_id']);
		$this->team_stat_model->update($where, $team2Stat);

		$data = array('completed' => 1);
		$where = array('id' => $match['fixture_id']);
		$this->fixture_model->update($where, $data);

		$teamOnePlayers = $this->team_model->getPlayers($match['team1_id']);
		$teamOnePlayers = $teamOnePlayers->result_array();

		$teamTwoPlayers = $this->team_model->getPlayers($match['team2_id']);
		$teamTwoPlayers = $teamTwoPlayers->result_array();

		$data['resultMatch'] = $match;
		$data['teamOne'] = $teamOnePlayers;
		$data['teamTwo'] = $teamTwoPlayers;
		$data['matchId'] = $matchId;

		$this->load->view('match_details', $data);
	}


	public function testview()
	{
		$this->load->view('match_details');
	}

	public function add_player()
	{
		if (!$this->input->is_ajax_request()) {
 			exit('No direct script access allowed');
		}

		$personId = $this->input->post('id');
		$data = array('person_id' => $personId);
		$this->player_model->add($data);

		$where = array('id' => $personId);
		$data = array('state' => 1);		//1 : player
		$this->person_model->update($where, $data);
	}

	public function add_coach()
	{
		if (!$this->input->is_ajax_request()) {
 			exit('No direct script access allowed');
		}

		$personId = $this->input->post('id');
		$experience = $this->input->post('exp');
		$data = array('person_id' => $personId, 'experience' => $experience);
		$this->coach_model->add($data);

		$where = array('id' => $personId);
		$data = array('state' => 2);		//2 : coach
		$this->person_model->update($where, $data);
	}

	public function add_umpire()
	{
		if (!$this->input->is_ajax_request()) {
 			exit('No direct script access allowed');
		}

		$personId = $this->input->post('id');
		$experience = $this->input->post('exp');
		$data = array('person_id' => $personId, 'experience' => $experience);
		$this->umpire_model->add($data);

		$where = array('id' => $personId);
		$data = array('state' => 3);		//3 : Umpire
		$this->person_model->update($where, $data);
	}

	public function add_owner()
	{
		if (!$this->input->is_ajax_request()) {
 			exit('No direct script access allowed');
		}

		$personId = $this->input->post('id');
		$experience = $this->input->post('exp');
		$data = array('person_id' => $personId, 'profession' => $experience);
		$this->owner_model->add($data);

		$where = array('id' => $personId);
		$data = array('state' => 4);		//4 : Owner
		$this->person_model->update($where, $data);
	}

	public function add_team()
	{
		if (!$this->input->is_ajax_request()) {
 			exit('No direct script access allowed');
		}

		$teamName = $this->input->post('teamName');
		$captainId = $this->input->post('captainId');
		$coachId = $this->input->post('coachId');
		$ownerId = $this->input->post('ownerId');
		$homeGround = $this->input->post('homeGround');

		$where = array('name' => $teamName);
		$result = $this->team_model->search($where);
		if($result->num_rows)
		{
			echo "0";
			return;
		}

		$where = array('captain_id' => $captainId);
		$result = $this->team_model->search($where);
		if($result->num_rows)
		{
			echo "1";
			return;
		}

		$data = array('name' => $teamName, 'home_ground' => $homeGround,
					  'owner_id' => $ownerId, 'coach_id' => $coachId, 'captain_id' => $captainId);

		$this->team_model->add($data);

		$teamId = $this->db->insert_id();
		$teamStatData = array('team_id' => $teamId);
		$this->team_stat_model->add($teamStatData);
		echo "2";

	}


	public function add_auction()
	{
		if (!$this->input->is_ajax_request()) {
 			exit('No direct script access allowed');
		}

		$playerId = $this->input->post('playerId');
		$teamId = $this->input->post('teamId');
		$bidAmt = $this->input->post('bidAmt');

		$data = array('player_id' => $playerId, 'team_id' => $teamId, 'bid_amt' => $bidAmt);
		$this->auction_model->add($data);

	}

	public function add_sponsor()
	{
		if (!$this->input->is_ajax_request()) {
 			exit('No direct script access allowed');
		}

		$name = $this->input->post('name');

		$data = array('name' => $name);
		$this->sponsor_model->add($data);
	}


	public function add_role()
	{
		if (!$this->input->is_ajax_request()) {
 			exit('No direct script access allowed');
		}

		$playerId = $this->input->post('id');
		$role = $this->input->post('role');
		$bats = $this->input->post('bats');
		$bowls = $this->input->post('bowls');

		$data = array('player_id' => $playerId, 'role' => $role, 'bats' => $bats, 'bowls' => $bowls);
		$this->player_role_model->add($data);
	}

	public function add_match()
	{
		if (!$this->input->is_ajax_request()) {
 			exit('No direct script access allowed');
		}

		$team = $this->input->post('team');
		$person = $this->input->post('person');
		$fix_id = $this->input->post('fix_id');

		$data = array('fixture_id' => $fix_id, 'winning_team_id' => $team, 'man_of_match_id' => $person);
		$this->match_model->add($data);

		$matchId = $this->db->insert_id();

		echo $matchId;
	}

	public function add_six()
	{
		if (!$this->input->is_ajax_request()) {
 			exit('No direct script access allowed');
		}

		$matchId = $this->input->post('match_id');
		$playerId = $this->input->post('player_id');
		$distance = $this->input->post('distance');

		$data = array('match_id' => $matchId, 'player_id' => $playerId, 'distance_in_mtr' => $distance);
		$this->six_model->add($data);
	}

	public function add_batting_stat()
	{
		if (!$this->input->is_ajax_request()) {
 			exit('No direct script access allowed');
		}

		$matchId = $this->input->post('match_id');
		$playerId = $this->input->post('player_id');
		$runs = $this->input->post('runs');
		$balls = $this->input->post('balls');
		$runs = floatval($runs);
		$strikeRate = ($runs/$balls) * 100;

		$data = array('player_id' => $playerId, 'match_id' => $matchId,'runs' => $runs, 'balls_played' => $balls, 'strike_rate' => $strikeRate);
		$this->batting_stat_model->add($data);

		//Update aggregated stats
		$where = array('');
		$this->player_model->search();
	}


	public function add_bowling_stat()
	{
		if (!$this->input->is_ajax_request()) {
 			exit('No direct script access allowed');
		}

		$matchId = $this->input->post('match_id');
		$playerId = $this->input->post('player_id');
		$wickets = $this->input->post('wickets');
		$balls = $this->input->post('balls');

		$data = array('player_id' => $playerId, 'match_id' => $matchId, 'wickets' => $wickets, 'balls_delivered' => $balls);
		$this->bowling_stat_model->add($data);
	}

	public function add_50()
	{
		if (!$this->input->is_ajax_request()) {
 			exit('No direct script access allowed');
		}

		$matchId = $this->input->post('match_id');
		$playerId = $this->input->post('player_id');
		$balls = $this->input->post('balls');

		$data = array('player_id' => $playerId, 'match_id' => $matchId, 'balls' => $balls);
		$this->player_50_model->add($data);
	}

	public function add_100()
	{
		if (!$this->input->is_ajax_request()) {
 			exit('No direct script access allowed');
		}

		$matchId = $this->input->post('match_id');
		$playerId = $this->input->post('player_id');
		$balls = $this->input->post('balls');

		$data = array('player_id' => $playerId, 'match_id' => $matchId, 'balls' => $balls);
		$this->player_100_model->add($data);
	}


	public function do_upload()
	{
		$config['upload_path'] = "./uploads/";
		$config['allowed_types'] = '*';
		$config['overwrite'] = true;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());

			echo $this->upload->display_errors();
			// $this->load->view('upload_form', $error);
		}
		else
		{
			$upload_data = $this->upload->data();
			$file_name = $upload_data['file_name'];

			$this->admin_model->upload_file($file_name);

			if($file_name == 'persons.csv')
				redirect('/admin/players', 'refresh');
			else
				redirect('/admin/teams', 'refresh');


		}
	}

	public function flushall()
	{
		if (!$this->input->is_ajax_request()) {
 			exit('No direct script access allowed');
		}
		$this->flush_model->flush();
	}
}

?>