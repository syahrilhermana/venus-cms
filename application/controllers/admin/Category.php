<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends BC_Admin
{
	function __construct() 
	{
        parent::__construct();
        $this->load->model('admin/Model_common');
        $this->load->model('admin/Model_category');
    }

	public function index()
	{
        $this->load->view('admin/news/category/index', array());
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

	public function add()
	{
	    $data = array();
        $this->load->view('admin/news/category/add', $data);
	}

    public function edit($id)
    {
        $data = array(
            'category' => $this->Model_category->get_category($id)
        );
        $this->load->view('admin/news/category/edit', $data);
    }

    public function save()
    {
        $error = '';
        $valid = 1;

        $id = $this->input->post('id');
        if(isset($id)) {
            $valid = 1;

            $this->form_validation->set_rules('category_name', 'Category Name', 'trim|required');

            if($this->form_validation->run() == FALSE) {
                $valid = 0;
                $error .= validation_errors();
            }

            $path = $_FILES['banner']['name'];
            $path_tmp = $_FILES['banner']['tmp_name'];

            if($path!='') {
                $ext = pathinfo( $path, PATHINFO_EXTENSION );
                $file_name = basename( $path, '.' . $ext );
                $ext_check = $this->Model_common->extension_check_photo($ext);
                if($ext_check == FALSE) {
                    $valid = 0;
                    $error .= 'You must have to upload jpg, jpeg, gif or png file for banner<br>';
                }
            }

            if($valid == 1)
            {
                $data['category'] = $this->Model_category->get_category($id);

                if($path == '') {
                    $form_data = array(
                        'category_name'    => $_POST['category_name'],
                        'meta_title'       => $_POST['meta_title'],
                        'meta_keyword'     => $_POST['meta_keyword'],
                        'meta_description' => $_POST['meta_description']
                    );
                    $this->Model_category->update($id,$form_data);
                }
                else {
                    unlink('./public/uploads/'.$data['category']['category_banner']);

                    $final_name = 'category-banner-'.$id.'.'.$ext;
                    move_uploaded_file( $path_tmp, './public/uploads/'.$final_name );

                    $form_data = array(
                        'category_name'    => $_POST['category_name'],
                        'category_banner'  => $final_name,
                        'meta_title'       => $_POST['meta_title'],
                        'meta_keyword'     => $_POST['meta_keyword'],
                        'meta_description' => $_POST['meta_description']
                    );
                    $this->Model_category->update($id,$form_data);
                }

                $output = array(
                    'status'    => true,
                    'message'   => 'Category is updated successfully'
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
            $this->form_validation->set_rules('category_name', 'Category Name', 'trim|required');

            if($this->form_validation->run() == FALSE) {
                $valid = 0;
                $error .= validation_errors();
            }

            $path = $_FILES['banner']['name'];
            $path_tmp = $_FILES['banner']['tmp_name'];

            if($path!='') {
                $ext = pathinfo( $path, PATHINFO_EXTENSION );
                $file_name = basename( $path, '.' . $ext );
                $ext_check = $this->Model_common->extension_check_photo($ext);
                if($ext_check == FALSE) {
                    $valid = 0;
                    $error .= 'You must have to upload jpg, jpeg, gif or png file for banner<br>';
                }
            } else {
                $valid = 0;
                $error .= 'You must have to select a photo for banner<br>';
            }

            if($valid == 1) {
                $next_id = $this->Model_category->get_auto_increment_id();
                foreach ($next_id as $row) {
                    $ai_id = $row['Auto_increment'];
                }

                $final_name = 'category-banner-' . $ai_id . '.' . $ext;
                move_uploaded_file($path_tmp, './public/uploads/' . $final_name);

                $form_data = array(
                    'category_name' => $_POST['category_name'],
                    'category_banner' => $final_name,
                    'meta_title' => $_POST['meta_title'],
                    'meta_keyword' => $_POST['meta_keyword'],
                    'meta_description' => $_POST['meta_description']
                );
                $this->Model_category->add($form_data);

                $output = array(
                    'status'    => true,
                    'message'   => 'Category is added successfully!'
                );

                echo json_encode($output);
            } else {
                $output = array(
                    'status'    => true,
                    'message'   => $error
                );

                echo json_encode($output);
            }
        }
    }

	public function delete()
	{
        $id = $this->input->get('id');
    	$tot = $this->Model_category->category_check($id);
    	if(!$tot) {
            $output = array(
                'status'    => false,
                'message'   => 'Data not found.'
            );

            echo json_encode($output);
    	} else {
            // Check if there is any news in this category. If found, category can not be deleted.
            $status = $this->Model_category->check_news($id);
            if($status)
            {
                $error = 'Category can not be deleted because there is news under this';
                $output = array(
                    'status'    => false,
                    'message'   => $error
                );

                echo json_encode($output);
            }
            else
            {
                $category = $this->Model_category->get_category($id);
                unlink('./public/uploads/'.$category['category_banner']);

                $this->Model_category->delete($id);
                $success = 'Category is deleted successfully';

                $output = array(
                    'status'    => true,
                    'message'   => $success
                );

                echo json_encode($output);
            }
        }
    }
}