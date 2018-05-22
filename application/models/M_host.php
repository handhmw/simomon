<?php
class M_host extends CI_Model{
	public function record_count() {
        return $this->db->count_all("tb_device");
    }
    public function fetch_devices($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get("tb_device");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }

	public function host_list($limit, $start, $id){
    	return $this->db
    				->order_by('device_id','asc')
                    ->limit($limit, $start)
                    ->select('device_id, user_id, device_name, device_ip, device_subnet')
  				    ->get_where('tb_device', array('user_id' => $id))
                    ->result();

    }


    public function host_num_rows(){
    	return $this->db
    				->get('tb_device')
    				->num_rows();
    }


	function update_status($status, $ip){
		$this->db->query('UPDATE tb_device SET device_status = "' . $status . '" WHERE device_ip = "' . $ip . '"');
		return true;
	}
	function get_host_by_kode($host_id){
		$hsl=$this->db->query("SELECT device_name, device_ip, device_subnet FROM tb_device WHERE device_id='$host_id'");
		if($hsl->num_rows()>0){
			foreach ($hsl->result() as $data) {
				$hasil=array(
					'device_id' 		=> $data->device_id,
					'device_name' 		=> $data->device_name,
					'device_ip' 		=> $data->device_ip,
					'device_subnet' 	=> $data->device_subnet,
					);
			}
		}
		return $hasil;
	}
	
	function jml_connected(){
		$query = $this->db->query("SELECT * FROM tb_device WHERE device_status = 'Connected'");
		return $query->num_rows();
	}

	function jml_disconnected(){
		$query = $this->db->query("SELECT * FROM tb_device WHERE device_status = 'Disonnected'");
		return $query->num_rows();
	}

	function jml_host_unreachable(){
		$query = $this->db->query("SELECT * FROM tb_device WHERE device_status = 'Destination host unreachable'");
		return $query->num_rows();
	}

	function jml_net_unreachable(){
		$query = $this->db->query("SELECT * FROM tb_device WHERE device_status = 'Destination net unreachable'");
		return $query->num_rows();
	}

	function jml_timeout(){
		$query = $this->db->query("SELECT * FROM tb_device WHERE device_status = 'Request timed out'");
		return $query->num_rows();
	}

	function jml_invalid(){
		$query = $this->db->query("SELECT * FROM tb_device WHERE device_status = 'Invalid'");
		return $query->num_rows();
	}



	function ping($ip = '0.0.0.0')
    {
		exec("ping -l 5 -n 1 $ip", $output,$status);
		if ($status == 1) { 
			$ping = str_replace(".", "", $output[2]);
		} else {
			$ping = explode(":", $output[2])[0];
		}
		$respon = $output[2];
		if ($status == 0) {
			switch (trim($ping)) {
				case 'Request timed out':
					$ping_status = "Request timed out";
					$type = "info";
					$msg = $respon;
					break;
				
				default:
					$ping = explode(":", $output[2])[1];
					$hasil = trim($ping, " .");
					switch ($hasil) {
						case 'Destination net unreachable':
							$ping_status = "Destination net unreachable";
							$type = "warning";
							$msg = $respon;
							break;
						case 'Destination host unreachable':
							$ping_status = "Destination host unreachable";
							$type = "warning";
							$msg = $respon;
							break;
						default:
							$ping_status = "Connected";
							$type = "success";
							$msg = $respon;
							break;
					}
					break;
			}
		} else {
			$ping_status = "Disonnected";
			$type = "danger";
			$msg = $respon;
		}
		$result = array(compact('ping_status', 'msg', 'type', 'status'));
		return $result;
    }   
	
}