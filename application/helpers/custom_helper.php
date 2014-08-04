// Inside helpers, you cannnot use the $this keyword i.e
// $this->load->model('My_model');
// To override this, you'll need to use this code i.e
// $CI =& get_instance();
// $CI->load->model('My_model');

<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('custom_function'))
{

    function custom_function()
    {
        // do something here
    }

}

?>