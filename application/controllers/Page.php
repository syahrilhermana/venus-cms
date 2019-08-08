<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('Model_common');
        $this->load->model('Model_custom_page');

        if(!$this->session->userdata('_member')) {
            $error = 'Please login first';
            $this->session->set_flashdata('error',$error);
            redirect(base_url().'member/login');
        }
    }

    public function index()
    {
        $data['setting'] = $this->Model_common->all_setting();
        $data['page_about'] = $this->Model_common->all_page_about();
        $data['comment'] = $this->Model_common->all_comment();
        $data['social'] = $this->Model_common->all_social();
        $data['all_news'] = $this->Model_common->all_news();

        $data['portfolio_footer'] = $this->Model_portfolio->get_portfolio_data();

        $this->load->view('view_header',$data);
        $this->load->view('view_about',$data);
        $this->load->view('view_footer',$data);
    }
}