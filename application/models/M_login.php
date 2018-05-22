<?php 
class M_login extends CI_Model{

	public function __construct(){
		parent::__construct();	
	}

	public function check_user($username, $password) {
		$query = $this->db->query("select * from tb_user where username='$username' AND password='$password' limit 1");
		return $query;
	}

	public function security_admin()
	{
		$level = $this->session->userdata('level');
		if ($level != 'admin')
		{
			$this->session->sess_destroy();
			redirect('login');
		}
	}

	public function security_subadmin()
	{
		$level = $this->session->userdata('level');
		if ($level != 'subadmin')
		{
			$this->session->sess_destroy();
			redirect('login');
		}
	}
}