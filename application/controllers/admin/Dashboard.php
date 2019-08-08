<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller 
{
	function __construct() 
	{
        parent::__construct();
        $this->load->model('admin/Model_common');
        $this->load->model('admin/Model_dashboard');
    }
	public function index()
	{
	    $data = array(
	        'total_visitor'     => '',
            'subscriber'        => '',
            'unique_visitor'    => '',
            'avg_time'          => '',
            'latest_post'       => $this->Model_dashboard->latest_post(),
            'latest_event'      => $this->Model_dashboard->latest_event()
        );
		$this->load->view('admin/dashboard/index', $data);
	}
}
