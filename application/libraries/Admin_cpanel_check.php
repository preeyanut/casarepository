<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: G7Studio
 * Date: 9/5/2558
 * Time: 1:54
 */



class Admin_cpanel_check
{

    var $CI;

    public function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->load->helper('url');
        $this->CI->load->library('session');


        if ($this->CI->session->userdata('admin_level')==null or $this->CI->session->userdata('username')==null) {
            redirect('admin');
           //echo var_dump($this->CI->session->userdata('level'));
        }
        /*if($this->CI->session->userdata('mod_level')=='administrator'){
            $profile=$this->CI->profiles_model->administrator();
            return $profile;

        }

        if($this->CI->session->userdata('mod_level')!='administrator'){
            $profile=$this->CI->profiles_model->employee();
            return $profile;
        }    */


    }
}

