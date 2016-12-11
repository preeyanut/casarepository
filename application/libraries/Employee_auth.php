<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: G7Studio
 * Date: 9/5/2558
 * Time: 1:54
 */



class employee_auth
{

    var $CI;

    public function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->load->helper('url');
        $this->CI->load->library('session');

        if ($this->CI->session->userdata('employee_id')==null and $this->CI->session->userdata('employee_type')==null) {
            redirect('login');
        }

    }
}

