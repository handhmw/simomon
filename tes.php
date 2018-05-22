<?php
$ip = $_GET['ip'];
function ping($ip = '0.0.0.0'){
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
                    $ping_status = "Disconected";
                    $msg = "Request Timed Out";
                }
                break;
            case '2':
                $ping_status = "Invalid";
                $msg = "Unknown host " . $ip;
                $type = "danger";
                break;
            default:
                $ping_status = "Failed";
                $msg = "Make sure youre connected to network";
                $type = "danger";
                break;
        }
    }


    $result = array(compact('ping_status', 'msg', 'type', 'status'));
    return $result;
}
echo json_encode(ping($ip));
//$port = 80;
//$timeout = 6;
//$socket = fsockopen($ip, $port, $errno, $errstr, $timeout);
//print_r($socket);
/*print_r($output);
print_r($status);*/

// 0 for success [1] => 9 bytes from 192.168.43.1: icmp_seq=1 ttl=64
// 1 for host unreachable [1] => From 192.168.43.121 icmp_seq=1 Destination Host Unreachable
// 1 for request timed out  [1] => 
// 2 for invalid ping: unknown host 1292.12.1.2.3.12
