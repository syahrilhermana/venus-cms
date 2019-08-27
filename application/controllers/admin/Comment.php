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
        $model = new Model_comment();
	    $data = array(
	        'comment' => $model->findOne(1)
        );
        $this->load->view('admin/news/comment/index', $data);
	}

	public function save()
    {
        $error = '';
        $success = '';

        if(isset($_POST))
        {
            $model = new Model_comment();
            $valid = 1;

            $this->form_validation->set_rules('code_body', 'Comment Body Code', 'trim|required');

            if($this->form_validation->run() == FALSE) {
                $valid = 0;
                $error = validation_errors();
            }

            if($valid == 1)
            {
                $form_data = array(
                    'code_body'  => $_POST['code_body']
                );
                $this->Model_comment->update($form_data);

                $output = array(
                    'status'    => true,
                    'message'   => 'Comment Body Code is updated successfully'
                );

                echo json_encode($output);
            }
            else
            {
                $output = array(
                    'status'    => false,
                    'message'   => $error
                );

                echo json_encode($output);
            }

        } else {
            $output = array(
                'status'    => false,
                'message'   => 'no data'
            );

            echo json_encode($output);
        }
    }

}