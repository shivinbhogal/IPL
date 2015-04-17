<?php

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->helper('form');
	}

	public function index()
	{
		if(!$this->session->userdata('user_id'))	//If user is not logged in
			redirect('/login', 'refresh');

		else
		{
			$this->load->view('admin_home');
		}
	}
}

?>
