<?php
class M_device extends CI_Model{


	public function getSelectedData($table,$data)
    {
        return $this->db->get_where($table, $data);
    }

  function list_device($id)
    {
        return $this->db->get_where('tb_device', array('user_id' => $id))->result();
    }

  public function device_list($limit, $start){
    
      return $this->db
    				->order_by('device_id','asc')
                    ->limit($limit, $start)
                    ->get('tb_device')->result();

    }

    public function device_num_rows(){
    	return $this->db
    				->get('tb_device')
    				->num_rows();
    }

	function save_device($data)
    {
        $this->db->insert('tb_device', $data);
    }

    function update_device($id, $data)
    {
         return $this->db->update('tb_device', $data, array('device_id' => $id));
    }

    function delete_device($id)
    {
        return $this->db->delete('tb_device', array('device_id' => $id));
    }

    public function get_device_all()
    {
        return $this->db->get('tb_device')->result();
    }

    function get_detail_device($id)
    {
        return $this->db->get_where('tb_device', array('device_id' => $id))->result();
    }


    function kode_device()   {    
      $this->db->select('RIGHT(tb_device.device_id,2) as kode', FALSE);
      $this->db->order_by('device_id','DESC');    
      $this->db->limit(1);     
      $query = $this->db->get('tb_device'); 
      if($query->num_rows() <> 0){          
       $data = $query->row();      
       $kode = intval($data->kode) + 1;     
      }
      else{          
       $kode = 1;     
      }
      $kodemax = str_pad($kode, 2, "0", STR_PAD_LEFT);    
      $kodejadi = "DVC".$kodemax;     
      return $kodejadi;  
     }

     function search($keyword)
    {
        $this->db->like('device_name',$keyword);
        $query  =   $this->db->get('tb_device');
        return $query->result();
    }
}