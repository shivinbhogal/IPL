<?php

class Venues extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('venue_model');
	}

	public function index()
	{
		$result = $this->venue_model->search();
		$result = $result->result_array();

		$data['venues'] = $result;
		$this->load->view('user_venues', $data);
	}

	public function getVenues()
	{
		if (!$this->input->is_ajax_request()) {
 			exit('No direct script access allowed');
		}

		$result = $this->venue_model->search();
		$result = $result->result_array();

		echo json_encode($result);
	}
}

?>