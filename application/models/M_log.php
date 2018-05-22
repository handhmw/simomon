<?php 

class M_log extends CI_Model{
    function input_log($client_id, $date_log, $hour_log){
        $create = $this->db->query("INSERT INTO log (device_id, date_log, hour_log) VALUES ('$client_id', '$date_log', '$hour_log')");
        return $create;
    }

    function get_log_by_id_date($client_id, $date){
        $hasil=$this->db->query("SELECT*FROM log WHERE device_id='$client_id' AND date_log='$date'");
        return $hasil->result();
    }

    function update_log($hour, $id_log, $date){
        $query =  $this->db->query("UPDATE log SET hour_log='$hour' WHERE id_log='$id_log' AND date_log='$date'");
        return true;
    }
    
    function delete_log($id)
    {
        return $this->db->delete('log', array('id_log' => $id));
    }

    public function log_list($limit, $start){
        return $this->db
                    ->order_by('id_log','asc')
                    ->limit($limit, $start)
                    ->join('tb_device','tb_device.device_id = log.device_id','left')
                    ->get('log')->result();
    }

    // public function log_list($limit, $start, $id){
    //     return $this->db
    //                 ->order_by('id_log','asc')
    //                 ->limit($limit, $start)
    //                 ->select('id_log, user_id, device_id, date_log, hour_log, status_log')
                    
    //                 ->join('tb_device','tb_device.device_id = log.device_id','left')
    //                 ->get_where('log', array('user_id' => $id))
    //                 ->result();

    // }


    public function log_num_rows(){
        return $this->db
                    ->get('log')
                    ->num_rows();
    }

    public function get_log_all()
    {
        return $this->db->get('log')->result();
    }

    function input_data($data,$table){
        $this->db->insert($table,$data);
    }
}