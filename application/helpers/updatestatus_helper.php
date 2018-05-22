<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('updatestatus'))
{
    function updatestatus($ip = '0.0.0.0')
    {
        // load model dulu
        $CI = get_instance();
        // You may need to load the model if it hasn't been pre-loaded
        $CI->load->model('m_host');
        // update table
       /* $data = array('device_status' => 'Disconnected');*/
        $str = $CI->m_host->update_status('Connected', '127.0.0.1');
    }
}