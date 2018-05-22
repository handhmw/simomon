<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('ping'))
{
    function ping($ip = '0.0.0.0')
    {
    	 // load model dulu
        $CI = get_instance();
        // You may need to load the model if it hasn't been pre-loaded
        $CI->load->model('m_host');
		if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
	        exec("ping -l 5 -n 1 $ip", $output,$status);
	        if ($status == 1) { // status 1 itu selain respon Reply from blabla
	            $ping = str_replace(".", "", $output[2]);
	        } else {
	            $ping = explode(":", $output[2])[0];
	        }
	        $respon = $output[2];
	        if ($status == 0) {
	            // responsenya
	            // Request timed out.
	            switch (trim($ping)) {
	                case 'Request timed out':
	                    $ping_status = "Request timed out";
	                    $type = "info";
	                    $msg = $respon;
	                    break;
	                
	                default:
	                // ketika selain RTO maka outputnya beda lagi
	                // Reply from 192.168.56.1: Destination host unreachable.
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
	    } else {
	       exec("/bin/ping -c 1 -s 1 $ip", $output, $status);

	        if ($status !== 2) {
	            $ping_response = $output[1];
	        }

	        switch ($status) {
	            case '0':
	                $ping_status = "Connected";
	                $type = "success";
	                $msg = $output[1];
	                break;
	            case '1':
	                if (!empty($ping_response)) {
	                    $ping_status = "Destination Host Unreachable";
	                    $type = "warning";
	                    $msg = $ping_response;
	                } else {
	                    $ping_status = "Request timed out";
	                    $msg = "Request Timed Out";
	                }
	                break;
	            case '2':
	                $ping_status = "Invalid";
	                $msg = "Unknown host " . $ip;
	                $type = "danger";
	                break;
	            default:
	                $ping_status = "Disconnected";
	                $msg = "Make sure youre connected to network";
	                $type = "danger";
	                break;
	        }
	    }


	    $CI->m_host->update_status($ping_status, $ip);
		$result = array(compact('ping_status', 'msg', 'type', 'status'));
		return $result;
    }   
}