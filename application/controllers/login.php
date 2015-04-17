<?php

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->helper('form');
	}

	public function index()
	{
		if($this->session->userdata('user_id'))
			redirect('/dashboard', 'refresh');

		else if(!$this->input->post('username') || !$this->input->post('password'))
			$this->load->view('loginview');

		else
		{
			$username = $this->input->post('username');
			$password = md5($this->input->post('password'));

			$where = array('user_name' => $username, 'password' => $password);
			$result = $this->user_model->search($where);

			if(!$result->num_rows)	//Invalid Login
			{
				$data['error'] = 'Invalid user name or password';
				$this->load->view('loginview', $data);
			}
			else  //Successful login
			{
				$result = $result->result_array();
				$userId = $result[0]['id'];

				$data = array('user_id' => $userId);
				$this->session->set_userdata($data);
				redirect('/dashboard', 'refresh');
			}
		}
	}
}

?>
