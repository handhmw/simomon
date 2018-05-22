<?php
class Device extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_device');
	}
	function index(){
		$this->load->view('subadmin/device');
	}

	function data_device(){
		$data          =$this->m_device->device_list();
		echo json_encode($data);
	}

	function get_device(){
		$dev_id        =$this->input->get('id');
		$data          =$this->m_device->get_device_by_kode($dev_id);
		echo json_encode($data);
	}

	function data_connected(){
		$data          =$this->m_device->connected_list();
		echo json_encode($data);
	}

	function get_connected(){
		$dev_id        =$this->input->get('id');
		$data          =$this->m_device->get_connected_by_kode($dev_id);
		echo json_encode($data);
	}


	function simpan_device(){
		$dev_id 	   =$this->input->post('dev_id');
		$dev_name      =$this->input->post('dev_name');
		$dev_os        =$this->input->post('dev_os');
		$dev_ip        =$this->input->post('dev_ip');
		$dev_subnet    =$this->input->post('dev_subnet');
		$dev_mac       =$this->input->post('dev_mac');
		$dev_location  =$this->input->post('dev_location');
		$data          =$this->m_device->simpan_device($dev_id,$dev_name,$dev_os,$dev_ip,$dev_subnet,$dev_mac,$dev_location);
		echo json_encode($data);
	}

	function update_device(){
		$dev_id        =$this->input->post('dev_id');
		$dev_name      =$this->input->post('dev_name');
		$dev_os        =$this->input->post('dev_os');
		$dev_ip        =$this->input->post('dev_ip');
		$dev_subnet    =$this->input->post('dev_subnet');
		$dev_mac       =$this->input->post('dev_mac');
		$dev_location  =$this->input->post('dev_location');
		$data          =$this->m_device->update_device($dev_id,$dev_name,$dev_os,$dev_ip,$dev_subnet,$dev_mac,$dev_location);
		echo json_encode($data);
	}

	function hapus_device(){
		$dev_id	       =$this->input->post('kode');
		$data          =$this->m_device->hapus_device($dev_id);
		echo json_encode($data);
	}

}