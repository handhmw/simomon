<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}


	public function get_account_all()
	{
		return $this->db->get('tb_user')->result();
	}

	function get_detail_account($id)
	{
		return $this->db->get_where('tb_user', array('user_id' => $id))->result();
	}

	function save_account($data)
	{
		$this->db->insert('tb_user', $data);
	}

	function update_account($id, $data)
	{
		 return $this->db->update('tb_user', $data, array('user_id' => $id));
	}

	function delete_account($id)
	{
		return $this->db->delete('tb_user', array('user_id' => $id));
	}

	public function search_account($search)
	{
		$this->db->like('user_id',$search,'none');

		return $this->db->get('tb_user');
	}


	function get_user_id($id)
	{
		return $this->db->get_where('tb_user', array('user_id' => $id));
	}


	public function get_detail_user($user)
	{
		return $this->db->get_where('tb_user', array('user_id' => $user))->result();
	}

	public function getKodeUser()
    {
        $q = $this->db->query("select MAX(RIGHT(user_id,3)) as kd_max from tb_user");
        $kd = "";
        if($q->num_rows()>0)
        {
            foreach($q->result() as $k)
            {
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%03s", $tmp);
            }
        }
        else
        {
            $kd = "001";
        }
        return "USR-".$kd;
    }

    public function getKodeDevice()
    {
        $q = $this->db->query("select MAX(RIGHT(device_id,3)) as kd_max from tb_device");
        $kd = "";
        if($q->num_rows()>0)
        {
            foreach($q->result() as $k)
            {
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%03s", $tmp);
            }
        }
        else
        {
            $kd = "001";
        }
        return "DVC-".$kd;
    }

}