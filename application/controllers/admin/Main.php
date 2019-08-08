<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends BC_Controller
{
	function __construct() 
	{
        parent::__construct();
        $this->load->model('admin/Model_common');
        $this->load->model('admin/Model_dashboard');
    }
	public function index()
	{
		$data['setting'] = $this->Model_common->get_setting_data();

        $this->load->view('admin/main',$data);
	}
}
