<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Subadmin extends CI_Controller {

	public function __construct() {
		parent::__construct();
		date_default_timezone_set("Asia/Jakarta");
		$this->load->model('m_host');
		$this->load->model('m_device');
		$this->load->model('m_user');
		$this->load->model('m_log');
		$this->load->library('pagination');
		$this->load->library('session');
		if ($this->session->userdata('username')=="") {
			redirect('login');
		}elseif($this->session->userdata('level') == 'admin'){
			redirect('admin/admin');
		}
	}

	public function index() {
		$connected         = $this->m_host->jml_connected();
		$disconnected      = $this->m_host->jml_disconnected();
		$host_unreachable  = $this->m_host->jml_host_unreachable();
		$net_unreachable   = $this->m_host->jml_net_unreachable();
		$timeout   		   = $this->m_host->jml_timeout();
		$invalid           = $this->m_host->jml_invalid();
		$dl                = $this->m_device->list_device($this->session->userdata('id'));

		$data = array(
					'error'            => '',
					'username'         => $this->session->userdata('username'),
					'connected'        => $connected, 
					'disconnected'     => $disconnected,
					'invalid'          => $invalid,
					'host_unreachable' => $host_unreachable,
					'net_unreachable'  => $net_unreachable,
					'timeout'          => $timeout,
					'dl'               => $dl,
				);

		$total_row = $this->m_device->device_num_rows();

		$config['base_url'] = base_url().'subadmin/subadmin/index/';
		$config['total_rows'] = $total_row;
		$config['per_page'] = 10;

		$config['full_tag_open'] = '<div class="text-center"><ul class="pagination">';
		$config['full_tag_close'] = '</ul></div>';
		$config['first_link'] = '&laquo; Start';
		$config['first_tag_open'] = '<li class="prev page">';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'End &raquo;';
		$config['last_tag_open'] = '<li class="next page">';
		$config['last_tag_close'] = '</li>';
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li class="next page">';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = 'Prev';
		$config['prev_tag_open'] = '<li class="prev page">';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li class="page">';
		$config['num_tag_close'] = '</li>';

		$from = $this->uri->segment('4');

		$data['data_device'] = $this->m_device->device_list($config['per_page'],$from);
		$data['username']    = $this->session->userdata('username');

		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		
		$this->load->view('subadmin/index', $data);

	}

	
// method untuk kirim email
	public function kirim_email($device){
		$this->load->library('email');
		$ip = $device->device_ip;
		$name = $device->device_name;
		$ip = $device->device_ip;
		$status = $device->device_status;
		switch ($status) {
	        case 'Disconnected':
	            $color = "#D9534F";
	            break;
	        case 'Destination host unreachable':
	            $color = "#5CB85C";
	            break;
	        case 'Destination net unreachable':
	            $color = "#5CB85C";
	            break;
	        case 'Request timed out':
	            $color = "#5CB85C";
	            break;
	        default:
	            $color = "#D9534F";
	            break;
	    }
		$subject = 'Monitoring : ' . $device->device_name;
		$message = "<table>
						<tr><td>IP</td><td>:</td><td><strong>$ip</strong></td></tr>
		                <tr><td>DEVICE NAME</td><td>:</td><td><strong>$name</strong></td></tr>
		                <tr><td>STATUS</td><td>:</td><td><strong><font color='$color'>$status</font></strong></td></tr>
					</table>";

		// Get full html:
		$body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
		    <meta http-equiv="Content-Type" content="text/html; charset=' . strtolower(config_item('charset')) . '" />
		    <title>' . html_escape($subject) . '</title>
		    <style type="text/css">
		        body {
		            font-family: Arial, Verdana, Helvetica, sans-serif;
		            font-size: 16px;
		        }
		    </style>
		</head>
		<body>
		' . $message . '
		</body>
		</html>';

		$user_email = $this->session->userdata('email');
		$result = $this->email
		        ->from('handrihermawan@gmail.com')
		        ->reply_to('sundapoke4@gmail.com')
		        ->to($user_email)
		        ->subject($subject)
		        ->message($body)
		        ->send();
		return $result;
	}
	public function check_log(){
		
		$devices = $this->m_device->device_list();
		foreach ($devices as $device) {
			if ($device->device_status !== "Connected" && $device->device_status !== "") {
	            $this_day = date("d M Y");
	            $hour = date("H");
	            $log = $this->m_log->get_log_by_id_date($device->device_id, $this_day);
	   
	            if ($log) { 
	                $h = $log[0]->hour_log;
	                $id_log = $log[0]->id_log;
	                if ($hour - $h > 2) {
	                    $update_log = $this->m_log->update_log($hour, $id_log, $this_day);
	                    if ($update_log) {
	                    	$this->kirim_email($device);
	                    }
	                }
	            } else {
	                if ($this->m_log->input_log($device->device_id, $this_day, $hour)) {
	                    $this->kirim_email($device);
	                }
	            }

	        }

		}
		header('Content-Type: application/json');
		echo json_encode(array('msg' => 'Email telah dikirim'));
		
	}

	public function device_utama()
	{
		$total_row = $this->m_device->device_num_rows();

		$config['base_url'] = base_url().'subadmin/subadmin/index/';
		$config['total_rows'] = $total_row;
		$config['per_page'] = 10;

		$config['full_tag_open'] = '<div class="text-center"><ul class="pagination">';
		$config['full_tag_close'] = '</ul></div>';
		$config['first_link'] = '&laquo; Start';
		$config['first_tag_open'] = '<li class="prev page">';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'End &raquo;';
		$config['last_tag_open'] = '<li class="next page">';
		$config['last_tag_close'] = '</li>';
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li class="next page">';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = 'Prev';
		$config['prev_tag_open'] = '<li class="prev page">';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li class="page">';
		$config['num_tag_close'] = '</li>';

		$from = $this->uri->segment('4');

		$data['data_device'] = $this->m_device->device_list($config['per_page'],$from);
		$data['username']    = $this->session->userdata('username');

		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();

		$this->load->view('subadmin/device', $data);
	}

	public function view_detail_host($id)
	{
		$data['title'] = 'Detail Host';
		$data['warning'] = '';

		$this->load->model('m_device');
		$data['host'] = $this->m_device->get_detail_device($id);
		$data['username']  = $this->session->userdata('username');


		$this->load->view('subadmin/detail_host', $data);
	}

	public function profil($id)
	{
		$data['title'] = 'Detail User';
		$data['warning'] = '';

		$this->load->model('m_user');
		$data['user'] = $this->m_user->get_detail_user($id);
		$data['username']  = $this->session->userdata('username');


		$this->load->view('subadmin/profil', $data);
	}


	public function device()
	{
		$total_row = $this->m_device->device_num_rows();

		$config['base_url'] = base_url().'subadmin/subadmin/device/';
		$config['total_rows'] = $total_row;
		$config['per_page'] = 10;

		$config['full_tag_open'] = '<div class="text-center"><ul class="pagination">';
		$config['full_tag_close'] = '</ul></div>';
		$config['first_link'] = '&laquo; Start';
		$config['first_tag_open'] = '<li class="prev page">';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'End &raquo;';
		$config['last_tag_open'] = '<li class="next page">';
		$config['last_tag_close'] = '</li>';
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li class="next page">';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = 'Prev';
		$config['prev_tag_open'] = '<li class="prev page">';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li class="page">';
		$config['num_tag_close'] = '</li>';

		$from = $this->uri->segment('4');

		$data['data_device'] = $this->m_device->device_list($config['per_page'],$from);
		$data['username']    = $this->session->userdata('username');

		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		$data['title'] = 'Master Device';
		$data['device'] = $this->m_device->list_device($this->session->userdata('id'));

		$this->load->view('subadmin/device', $data);
	}

	public function add_device()
	{
		$data['title'] = 'Tambah Data Device';
		$data['warning'] = '';

		$this->load->model('m_device');
		$data['device'] = $this->m_device->get_device_all();
		$data['username']  = $this->session->userdata('username');
		$data['kodedevice'] = $this->m_device->kode_device();


		$this->load->view('subadmin/add_device', $data);
	}

	public function edit_device($id)
	{
		$data['title'] = 'Edit Data Device';
		$data['warning'] = '';

		$this->load->model('m_device');
		$data['device'] = $this->m_device->get_detail_device($id);
		$data['username']  = $this->session->userdata('username');

		$this->load->view('subadmin/edit_device', $data);
	}

	public function save_device()
	{
		$data = array(
				'device_id'       => $this->input->post('id_device'),
				'user_id'         => $this->input->post('id_user'),
				'device_name'     => $this->input->post('name_device'),
				'device_os'       => $this->input->post('os_device'),
				'device_ip'       => $this->input->post('ip_device'),
				'device_subnet'   => $this->input->post('subnet_device'),
				'device_mac'   	  => $this->input->post('mac_device'),
				'device_location' => $this->input->post('location_device')
			);

		$this->m_device->save_device($data);
		$this->session->set_flashdata('save','information');
		$data['username']  = $this->session->userdata('username');
		redirect('subadmin/subadmin/device','refresh');
	}


	public function update_device($id)
	{
		$data = array(
				'device_id'       => $this->input->post('id_device'),
				'user_id'         => $this->input->post('id_user'),
				'device_name'     => $this->input->post('name_device'),
				'device_os'       => $this->input->post('os_device'),
				'device_ip'       => $this->input->post('ip_device'),
				'device_subnet'   => $this->input->post('subnet_device'),
				'device_mac'   	  => $this->input->post('mac_device'),
				'device_location' => $this->input->post('location_device')
			);

		$this->m_device->update_device($id, $data);
		$this->session->set_flashdata('update','information');
		$data['username']  = $this->session->userdata('username');
		redirect('subadmin/subadmin/device','refresh');
	}

	public function delete_device($id)
	{
		$this->m_device->delete_device($id);
		$this->session->set_flashdata('delete','information');
		redirect('subadmin/subadmin/device','refresh');
	}


	
	public function ping(){
		$host_ip = $this->input->post('host_ip');
		$this->load->helper('pinger');
		$status = ping($host_ip);
		header('Content-Type: application/json');
		echo json_encode($status);
	}


	public function log()
	{

		$total_row = $this->m_log->log_num_rows();

		$config['base_url']   = base_url().'subadmin/subadmin/log/';
		$config['total_rows'] = $total_row;
		$config['per_page']   = 10;

		$config['full_tag_open']   = '<div class="text-center"><ul class="pagination">';
		$config['full_tag_close']  = '</ul></div>';
		$config['first_link']      = '&laquo; Start';
		$config['first_tag_open']  = '<li class="prev page">';
		$config['first_tag_close'] = '</li>';
		$config['last_link']       = 'End &raquo;';
		$config['last_tag_open']   = '<li class="next page">';
		$config['last_tag_close']  = '</li>';
		$config['next_link']       = 'Next';
		$config['next_tag_open']   = '<li class="next page">';
		$config['next_tag_close']  = '</li>';
		$config['prev_link']       = 'Prev';
		$config['prev_tag_open']   = '<li class="prev page">';
		$config['prev_tag_close']  = '</li>';
		$config['cur_tag_open']    = '<li class="active"><a href="">';
		$config['cur_tag_close']   = '</a></li>';
		$config['num_tag_open']    = '<li class="page">';
		$config['num_tag_close']   = '</li>';

		$from = $this->uri->segment('4');

		$data['logs']     = $this->m_log->log_list($config['per_page'],$from, $this->session->userdata('user_id'));
		$data['username'] = $this->session->userdata('username');

		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();

		$this->load->view('subadmin/log', $data);
	}

	public function delete_log($id)
	{
		$this->m_log->delete_log($id);
		$this->session->set_flashdata('delete','information');
		redirect('subadmin/subadmin/log','refresh');
	}


	public function host()
	{

		$total_row = $this->m_host->host_num_rows();

		$config['base_url']   = base_url().'subadmin/subadmin/host/';
		$config['total_rows'] = $total_row;
		$config['per_page']   = 10;

		$config['full_tag_open']   = '<div class="text-center"><ul class="pagination">';
		$config['full_tag_close']  = '</ul></div>';
		$config['first_link']      = '&laquo; Start';
		$config['first_tag_open']  = '<li class="prev page">';
		$config['first_tag_close'] = '</li>';
		$config['last_link']       = 'End &raquo;';
		$config['last_tag_open']   = '<li class="next page">';
		$config['last_tag_close']  = '</li>';
		$config['next_link']       = 'Next';
		$config['next_tag_open']   = '<li class="next page">';
		$config['next_tag_close']  = '</li>';
		$config['prev_link']       = 'Prev';
		$config['prev_tag_open']   = '<li class="prev page">';
		$config['prev_tag_close']  = '</li>';
		$config['cur_tag_open']    = '<li class="active"><a href="">';
		$config['cur_tag_close']   = '</a></li>';
		$config['num_tag_open']    = '<li class="page">';
		$config['num_tag_close']   = '</li>';

		$from = $this->uri->segment('4');
		$data['error']     = '';
		$data['data_host'] = $this->m_host->host_list($config['per_page'],$from, $this->session->userdata('id'));
		$data['username']  = $this->session->userdata('username');

		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();

		$this->load->view('subadmin/host', $data);
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

	function get_connected(){
		$data = $this->m_host->jml_connected();
		echo json_encode($data);
	}

	function get_disconnected(){
		$data = $this->m_host->jml_disconnected();
		echo json_encode($data);
	}

	function get_hostreach(){
		$data = $this->m_host->jml_host_unreachable();
		echo json_encode($data);
	}

	function get_netreach(){
		$data = $this->m_host->jml_net_unreachable();
		echo json_encode($data);
	}

	function get_timeout(){
		$data = $this->m_host->jml_timeout();
		echo json_encode($data);
	}

	function get_invalid(){
		$data = $this->m_host->jml_invalid();
		echo json_encode($data);
	}


	public function logout() {
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('level');
		session_destroy();
		redirect('login');
	}


	public function connected()
	{
		$data = array(
					'error' => '',
					'username' => $this->session->userdata('username'),
					'data_connected'=>$this->m_device->getSelectedData('tb_device','device_status="Connected"')->result(),
        );

		$this->load->view('subadmin/connected', $data);
	}

	public function disconnected()
	{
		$data = array(
					'error' => '',
					'username' => $this->session->userdata('username'),
					'data_disconnected'=>$this->m_device->getSelectedData('tb_device','device_status="Disconnected"')->result(),
				);
		$this->load->view('subadmin/disconnected', $data);
	}

	public function unreachable()
	{
		$data = array(
					'error' => '',
					'username' => $this->session->userdata('username'),
					'data_host_un'=>$this->m_device->getSelectedData('tb_device','device_status="Destination Host Unreachable"')->result(),
				);
		$this->load->view('subadmin/unreachable', $data);
	}

	public function rto()
	{
		$data = array(
					'error' => '',
					'username' => $this->session->userdata('username'),
					'data_rto'=>$this->m_device->getSelectedData('tb_device','device_status="Request timed out"')->result(),
				);
		$this->load->view('subadmin/rto', $data);
	}

}