<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: G7Studio
 * Date: 12/5/2558
 * Time: 1:40
 */


if ( ! function_exists('active_link'))
{
    function active_link($controller)
    {
        $CI =& get_instance();

        $class = $CI->router->fetch_class();
        return ($class == $controller) ? 'active' : '';
    }
}
