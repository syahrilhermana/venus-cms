<?php

class BC_Controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->session->set_userdata(array('REF_URL' => current_url()));

        if(!$this->session->userdata('_venus'))
            redirect(base_url().'admin/login');
    }
}