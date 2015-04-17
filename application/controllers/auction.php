<?php

class Auction extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('team_model');
	}

	public function index()
	{
		$result = $this->team_model->getTeamPlayerAmtJoin();
		$result = $result->result_array();

		$data['auctions'] = $result;
		$this->load->view('user_auctions', $data);
	}

	public function getTeamResults()
	{
		if (!$this->input->is_ajax_request()) {
 			exit('No direct script access allowed');
		}

		$result = $this->team_model->getTeamPlayerAmtGroupJoin();
		$result = $result->result_array();

		echo json_encode($result);
	}
}

?>
