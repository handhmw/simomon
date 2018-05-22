<?php 

class M_data extends CI_Model{
	

	public function get_account_all()
	{
		return $this->db->get('tb_user')->result();
	}

	function input_data($data,$table){
		$this->db->insert($table,$data);
	}
}