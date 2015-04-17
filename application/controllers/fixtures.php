<?php

class Fixtures extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('fixture_model');
		$this->load->model('player_role_model');
		$this->load->model('team_model');
	}

	public function index()
	{
		$result = $this->fixture_model->search();
		if(!$result->num_rows)	//If no fixtures are present
			$this->_createFixtures();

		$resultFixtures = $this->fixture_model->fixtureJoin();
		$resultFixtures = $resultFixtures->result_array();

		$data['fixtureResults'] = $resultFixtures;

		$this->load->view('user_fixtures', $data);
	}

	public function getRoles()
	{
		if (!$this->input->is_ajax_request()) {
 			exit('No direct script access allowed');
		}

		$result = $this->team_model->search();
		$result = $result->result_array();

		$finalResult = array();

		foreach ($result as $key => $row) {
			$teamRole = $this->player_role_model->getRoleByTeam($row['id']);
			$teamRole = $teamRole->result_array();

			array_push($finalResult, $teamRole);
		}

		echo json_encode($finalResult);
	}
}
?>
