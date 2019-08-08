<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Comment extends BC_Admin
{
	function __construct() 
	{
        parent::__construct();
        $this->load->model('admin/Model_common');
        $this->load->model('admin/Model_comment');
    }

	public function index()
	{
        $this->load->view('admin/news/comment/index', array());
	}

    public function index_old()
    {

        $data['setting'] = $this->Model_common->get_setting_data();
        $error = '';
        $success = '';

        if(isset($_POST['form1']))
        {
            $valid = 1;

            $this->form_validation->set_rules('code_body', 'Comment Body Code', 'trim|required');

            if($this->form_validation->run() == FALSE) {
                $valid = 0;
                $error = validation_errors();
            }

            if($valid == 1)
            {
                $data['comment'] = $this->Model_comment->show();

                $form_data = array(
                    'code_body'  => $_POST['code_body']
                );
                $this->Model_comment->update($form_data);

                $success = 'Comment Body Code is updated successfully';
                $this->session->set_flashdata('success',$success);
                redirect(base_url().'admin/comment');
            }
            else
            {
                $this->session->set_flashdata('error',$error);
                redirect(base_url().'admin/comment');
            }

        } else {
            $data['comment'] = $this->Model_comment->show();
            $this->load->view('admin/view_header',$data);
            $this->load->view('admin/view_comment',$data);
            $this->load->view('admin/view_footer');
        }

    }

    public function ajax_list()
    {
        $length = (!empty($_GET['length'])) ? $_GET['length'] : 10;
        $start = (!empty($_GET['start'])) ? $_GET['start'] : 0;
        $draw = (!empty($_GET['draw'])) ? $_GET['draw'] : 10;

        $model = new Model_category();
        $list = $model->findFiltered($length, $start);
        $data = array();
        $no = $start;

        foreach ($list as $row) {
            $no++;
            $set = array();
            $set[] = $no;
            $set[] = $row->category_name;
            $set[] = '<img src="'.base_url().'public/uploads/'.$row->category_banner.'" alt="'.$row->category_name.'" style="width:250px;">';
            $set[] = '<div class="btn-group">
                        <button class="btn btn-primary btn-xs" onclick="App.loadIntoBox(\''.base_url('admin/category/edit/'.$row->category_id).'\')"><i class="fa fa-edit"></i>&nbsp; Edit</button>
                        <button data-id="'.$row->category_id.'" class="btn btn-danger btn-xs" onClick="App.confirmPopUp(this, handleDelete, \'Confirmation\', \'Are you sure you want to delete this data?\', \'Yes\', \'No\', \''.base_url().'admin/category/delete/\')"><i class="fa fa-trash"></i>&nbsp; Delete</button>
                      </div>';

            $data[] = $set;
        }

        $output = array(
            'draw' => $draw,
            'recordsTotal' => $model->count(),
            'recordsFiltered' => $model->countFiltered(),
            'data' => $data
        );

        echo json_encode($output);
    }


}