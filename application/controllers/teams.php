<?php

class Teams extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('team_model');
		$this->load->model('team_stat_model');
	}

	public function index()
	{
		$teams = $this->team_model->teamJoin();
		$teams = $teams->result_array();

		$standings = $this->team_stat_model->standings();
		$standings = $standings->result_array();

		$data['teams'] = $teams;
		$data['standings'] = $standings;

		$this->load->view('user_teams', $data);

	}
}

?>