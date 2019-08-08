<?php

class BC_Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        if(!$this->input->is_ajax_request())
            return show_404();

        $this->session->set_userdata(array('REF_URL' => current_url()));

        if(!$this->session->userdata('_venus'))
            redirect(base_url().'admin/login');
    }
}