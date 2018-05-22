<?php
class M_user extends CI_Model{

	public function user_list($limit, $start){
    	return $this->db
    				->order_by('user_id','asc')
                    ->limit($limit, $start)
                    ->get('tb_user')->result();

    }

    public function user_num_rows(){
    	return $this->db
    				->get('tb_user')
    				->num_rows();
    }

    function save_user($data)
    {
        $this->db->insert('tb_user', $data);
    }

    function update_user($id, $data)
    {
         return $this->db->update('tb_user', $data, array('user_id' => $id));
    }

    function delete_user($id)
    {
        return $this->db->delete('tb_user', array('user_id' => $id));
    }

    public function get_user_all()
    {
        return $this->db->get('tb_user')->result();
    }

    function get_detail_user($id)
    {
        return $this->db->get_where('tb_user', array('user_id' => $id))->result();
    }

    function get_by_username($user)
    {
        return $this->db->get_where('tb_user', array('username' => $user))->result();
    }

    function kode_user()   {    
      $this->db->select('RIGHT(tb_user.user_id,2) as kode', FALSE);
      $this->db->order_by('user_id','DESC');    
      $this->db->limit(1);     
      $query = $this->db->get('tb_user'); 
      if($query->num_rows() <> 0){          
       $data = $query->row();      
       $kode = intval($data->kode) + 1;     
      }
      else{          
       $kode = 1;     
      }
      $kodemax = str_pad($kode, 2, "0", STR_PAD_LEFT);    
      $kodejadi = "USR".$kodemax;     
      return $kodejadi;  
     }
}