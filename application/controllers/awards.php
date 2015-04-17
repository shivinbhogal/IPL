<?php

class Awards extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('team_model');
		$this->load->model('team_stat_model');
		$this->load->model('award_model');
	}

	public function index()
	{
		$purpleCap = $this->award_model->purpleCap();
		$purpleCap = $purpleCap->result_array();

		$orangeCap = $this->award_model->orangeCap();
		$orangeCap = $orangeCap->result_array();

		$mostSixes = $this->award_model->mostSixes();
		$mostSixes = $mostSixes->result_array();

		$longestSix = $this->award_model->longestSix();
		$longestSix = $longestSix->result_array();

		$fastest100 = $this->award_model->fastest100();
		$fastest100 = $fastest100->result_array();

		$fastest50 = $this->award_model->fastest50();
		$fastest50 = $fastest50->result_array();

		$data['purpleCap'] = $purpleCap[0];
		$data['orangeCap'] = $orangeCap[0];
		$data['mostSixes'] = $mostSixes[0];
		$data['longestSix'] = $longestSix[0];
		$data['fastest100'] = $fastest100[0];
		$data['fastest50'] = $fastest50[0];

		$this->load->view('user_awards', $data);

	}
}

?>