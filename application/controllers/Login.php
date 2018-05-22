<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('m_login');
		$this->load->model('m_user');
		$this->load->library('form_validation');
		$this->load->library('session');
		if ($this->session->userdata('username')) {
			if($this->session->userdata('level') == 'admin'){
				redirect('admin/admin');
			}elseif($this->session->userdata('level') == 'subadmin'){
				redirect('subadmin/subadmin');
			}
		}
	}

	public function index(){
		$data = array('error' => ''
					);
		$this->load->view('login', $data);
	}

	public function login_process(){
		$username = $this->input->post('username');
		$password = md5(md5($this->input->post('password')));
		$result = $this->m_login->check_user($username, $password); 

		if($result->num_rows() > 0){
			foreach ($result->result() as $row) {
				$id       = $row->user_id;
				$username = $row->username;
				$level    = $row->user_level;
			}

			$newdata = array(
			        'id'  => $id,
			        'username' => $username,
			        'email' => $this->m_user->get_by_username($username)[0]->user_email,
			        'level' => $level,
			        'logged_in' => TRUE
			);
			
			$this->session->set_userdata($newdata);
			if($this->session->userdata('level')=='admin') {
				redirect('admin/admin');
			}elseif ($this->session->userdata('level')=='subadmin') {
				redirect('subadmin/subadmin');
			}
		}
	}
}