<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Model_common');
        $this->load->model('Model_member');
    }

    public function index()
    {
        $data['setting'] = $this->Model_common->get_setting_data();
        $data['members'] = $this->Model_member->show();

        $this->load->view('admin/view_header',$data);
        $this->load->view('admin/view_member',$data);
        $this->load->view('admin/view_footer');
    }

    public function suspend($id)
    {
        $tot = $this->Model_member->getData($id);
        if(!$tot) {
            redirect(base_url().'admin/member');
            exit;
        }

        $data['member'] = $tot;
        if($data['member']) {
            unlink('./public/uploads/'.$data['member']['photo']);
            unlink('./public/uploads/'.$data['member']['banner']);
        }

        $this->Model_member->suspend($id);
        $success = 'Member has been suspend';
        $this->session->set_flashdata('success',$success);
        redirect(base_url().'admin/member');
    }

    public function banned($id)
    {
        $tot = $this->Model_member->getData($id);
        if(!$tot) {
            redirect(base_url().'admin/member');
            exit;
        }

        $data['member'] = $tot;
        if($data['member']) {
            unlink('./public/uploads/'.$data['member']['photo']);
            unlink('./public/uploads/'.$data['member']['banner']);
        }

        $this->Model_member->banned($id);
        $success = 'Member has been suspend';
        $this->session->set_flashdata('success',$success);
        redirect(base_url().'admin/member');
    }
	
}
