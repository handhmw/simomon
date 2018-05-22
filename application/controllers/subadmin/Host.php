<?php
class Host extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_host');
	}
	function index(){
		$this->load->view('subadmin/host');
	}

	function data_host(){
		$data          =$this->m_host->host_list();
		echo json_encode($data);

	}

	function get_host(){
		$host_id       =$this->input->get('id');
		$data          =$this->m_host->get_host_by_kode($host_id);
		echo json_encode($data);
	}

	

}