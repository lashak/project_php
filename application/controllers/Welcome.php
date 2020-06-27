<?php
defined('BASEPATH') OR exit('No direct script access allowed');


require_once("application/libraries/REST_Controller.php");

class Welcome extends REST_Controller  {

	public function __construct()
	{
	parent::__construct();
	$this->load->model('InserModel');
	//$this->load->library('encryption');
	}
	
	public function index()
	{
		$this->load->view('welcome_message');
	}
	public function user_post()
	{
		//echo json_encode($this->input->post('name'));
		$data = array(
			'username' => trim($this->input->post('name')),
			'pwd'  => trim($this->input->post('pwd'))
		   );
		$data=$this->InserModel->insert_api($data);
		$this->response($data, REST_Controller::HTTP_OK);
	}
	public function getUsers()
	{
		$data= $this->InserModel->getUsers();
		$this->response($data, REST_Controller::HTTP_OK);
	}
}
