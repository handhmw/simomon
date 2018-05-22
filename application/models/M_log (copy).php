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

    public function log_list($limit, $start, $id){
        return $this->db
                    ->order_by('id_log','asc')
                    ->limit($limit, $start)
                    ->join('tb_device','tb_device.device_id = log.device_id','left')
                    ->where('log.user_id', $id)
                    ->get('log')->result();
    }

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

     function search_log($device_name){
        $this->db->select('*');
        $this->db->from('log');
        $this->db->like('device_name',$device_name);
        $query = $this->db->get();
        if ($query->num_rows() > 0){
            return $query->result();
        }
        else{
            return $query->result();
        }
    }
}