<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Custom extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Model_common');
        $this->load->model('admin/Model_custom_page');
    }

    public function index()
    {
        $data['setting'] = $this->Model_common->get_setting_data();
        $data['pages'] = $this->Model_custom_page->show();

        $this->load->view('admin/view_header',$data);
        $this->load->view('admin/view_custom_page',$data);
        $this->load->view('admin/view_footer');
    }

    public function add()
    {
        $data['setting'] = $this->Model_common->get_setting_data();

        $error = '';
        $success = '';

        if(isset($_POST['form1'])) {

            $valid = 1;

            $this->form_validation->set_rules('custom_page_title', 'Page Title', 'trim|required');
            $this->form_validation->set_rules('custom_page_content', 'Page Content', 'trim|required');

            if($this->form_validation->run() == FALSE) {
                $valid = 0;
                $error .= validation_errors();
            }

            $path = $_FILES['photo']['name'];
            $path_tmp = $_FILES['photo']['tmp_name'];

            if($path!='') {
                $ext = pathinfo( $path, PATHINFO_EXTENSION );
                $file_name = basename( $path, '.' . $ext );
                $ext_check = $this->Model_common->extension_check_photo($ext);
                if($ext_check == FALSE) {
                    $valid = 0;
                    $error .= 'You must have to upload jpg, jpeg, gif or png file for featured photo<br>';
                }
            } else {
                $valid = 0;
                $error .= 'You must have to select a photo for featured photo<br>';
            }

            $path1 = $_FILES['banner']['name'];
            $path_tmp1 = $_FILES['banner']['tmp_name'];

            if($path1!='') {
                $ext1 = pathinfo( $path1, PATHINFO_EXTENSION );
                $file_name = basename( $path1, '.' . $ext1 );
                $ext_check1 = $this->Model_common->extension_check_photo($ext1);
                if($ext_check1 == FALSE) {
                    $valid = 0;
                    $error .= 'You must have to upload jpg, jpeg, gif or png file for banner<br>';
                }
            } else {
                $valid = 0;
                $error .= 'You must have to select a photo for banner<br>';
            }

            if($valid == 1)
            {
                $next_id = $this->Model_custom_page->get_auto_increment_id();
                foreach ($next_id as $row) {
                    $ai_id = $row['Auto_increment'];
                }

                $final_name = 'cp-'.$ai_id.'.'.$ext;
                move_uploaded_file( $path_tmp, './public/uploads/'.$final_name );

                $final_name1 = 'cp-banner-'.$ai_id.'.'.$ext1;
                move_uploaded_file( $path_tmp1, './public/uploads/'.$final_name1 );

                $form_data = array(
                    'custom_page_title'     => $_POST['custom_page_title'],
                    'custom_page_slug'     => $_POST['custom_page_slug'],
                    'custom_page_content'   => $_POST['custom_page_content'],
                    'custom_page_date'      => $_POST['custom_page_date'],
                    'photo'                 => $final_name,
                    'banner'                => $final_name1,
                    'meta_title'            => $_POST['meta_title'],
                    'meta_keyword'          => $_POST['meta_keyword'],
                    'meta_description'      => $_POST['meta_description']
                );
                $this->Model_custom_page->add($form_data);

                $success = 'Custom Page is added successfully!';
                $this->session->set_flashdata('success',$success);
                redirect(base_url().'admin/custom');
            }
            else
            {
                $this->session->set_flashdata('error',$error);
                redirect(base_url().'admin/custom/add');
            }

        } else {
            $this->load->view('admin/view_header',$data);
            $this->load->view('admin/view_custom_page_add',$data);
            $this->load->view('admin/view_footer');
        }

    }


    public function edit($id)
    {

        // If there is no page in this id, then redirect
        $tot = $this->Model_custom_page->page_check($id);
        if(!$tot) {
            redirect(base_url().'admin/custom');
            exit;
        }

        $data['setting'] = $this->Model_common->get_setting_data();
        $error = '';
        $success = '';

        if(isset($_POST['form1']))
        {

            $valid = 1;

            $this->form_validation->set_rules('custom_page_title', 'Page Title', 'trim|required');
            $this->form_validation->set_rules('custom_page_content', 'Page Content', 'trim|required');

            if($this->form_validation->run() == FALSE) {
                $valid = 0;
                $error .= validation_errors();
            }

            $path = $_FILES['photo']['name'];
            $path_tmp = $_FILES['photo']['tmp_name'];

            if($path!='') {
                $ext = pathinfo( $path, PATHINFO_EXTENSION );
                $file_name = basename( $path, '.' . $ext );
                $ext_check = $this->Model_common->extension_check_photo($ext);
                if($ext_check == FALSE) {
                    $valid = 0;
                    $error .= 'You must have to upload jpg, jpeg, gif or png file for featured photo<br>';
                }
            }

            $path1 = $_FILES['banner']['name'];
            $path_tmp1 = $_FILES['banner']['tmp_name'];

            if($path1!='') {
                $ext1 = pathinfo( $path1, PATHINFO_EXTENSION );
                $file_name1 = basename( $path1, '.' . $ext1 );
                $ext_check1 = $this->Model_common->extension_check_photo($ext1);
                if($ext_check1 == FALSE) {
                    $valid = 0;
                    $error .= 'You must have to upload jpg, jpeg, gif or png file for banner<br>';
                }
            }

            if($valid == 1)
            {
                $data['page'] = $this->Model_custom_page->getData($id);

                if($path == '' && $path1 == '') {
                    $form_data = array(
                        'custom_page_title'     => $_POST['custom_page_title'],
                        'custom_page_slug'     => $_POST['custom_page_slug'],
                        'custom_page_content'   => $_POST['custom_page_content'],
                        'custom_page_date'      => $_POST['custom_page_date'],
                        'meta_title'            => $_POST['meta_title'],
                        'meta_keyword'          => $_POST['meta_keyword'],
                        'meta_description'      => $_POST['meta_description']
                    );
                    $this->Model_custom_page->update($id,$form_data);
                }
                if($path != '' && $path1 == '') {
                    unlink('./public/uploads/'.$data['page']['photo']);

                    $final_name = 'cp-'.$id.'.'.$ext;
                    move_uploaded_file( $path_tmp, './public/uploads/'.$final_name );

                    $form_data = array(
                        'custom_page_title'     => $_POST['custom_page_title'],
                        'custom_page_slug'     => $_POST['custom_page_slug'],
                        'custom_page_content'   => $_POST['custom_page_content'],
                        'custom_page_date'      => $_POST['custom_page_date'],
                        'photo'                 => $final_name,
                        'meta_title'            => $_POST['meta_title'],
                        'meta_keyword'          => $_POST['meta_keyword'],
                        'meta_description'      => $_POST['meta_description']
                    );
                    $this->Model_custom_page->update($id,$form_data);
                }
                if($path == '' && $path1 != '') {
                    unlink('./public/uploads/'.$data['page']['banner']);

                    $final_name1 = 'cp-banner-'.$id.'.'.$ext1;
                    move_uploaded_file( $path_tmp1, './public/uploads/'.$final_name1 );

                    $form_data = array(
                        'custom_page_title'     => $_POST['custom_page_title'],
                        'custom_page_slug'     => $_POST['custom_page_slug'],
                        'custom_page_content'   => $_POST['custom_page_content'],
                        'custom_page_date'      => $_POST['custom_page_date'],
                        'banner'                => $final_name1,
                        'meta_title'            => $_POST['meta_title'],
                        'meta_keyword'          => $_POST['meta_keyword'],
                        'meta_description'      => $_POST['meta_description']
                    );
                    $this->Model_custom_page->update($id,$form_data);
                }
                if($path != '' && $path1 != '') {

                    unlink('./public/uploads/'.$data['page']['photo']);
                    unlink('./public/uploads/'.$data['page']['banner']);

                    $final_name = 'cp-'.$id.'.'.$ext;
                    move_uploaded_file( $path_tmp, './public/uploads/'.$final_name );

                    $final_name1 = 'cp-banner-'.$id.'.'.$ext1;
                    move_uploaded_file( $path_tmp1, './public/uploads/'.$final_name1 );

                    $form_data = array(
                        'custom_page_title'     => $_POST['custom_page_title'],
                        'custom_page_slug'     => $_POST['custom_page_slug'],
                        'custom_page_content'   => $_POST['custom_page_content'],
                        'custom_page_date'      => $_POST['custom_page_date'],
                        'photo'                 => $final_name,
                        'banner'                => $final_name1,
                        'meta_title'            => $_POST['meta_title'],
                        'meta_keyword'          => $_POST['meta_keyword'],
                        'meta_description'      => $_POST['meta_description']
                    );
                    $this->Model_custom_page->update($id,$form_data);
                }

                $success = 'Custom Page is updated successfully';
                $this->session->set_flashdata('success',$success);
                redirect(base_url().'admin/custom');
            }
            else
            {
                $this->session->set_flashdata('error',$error);
                redirect(base_url().'admin/custom/add');
            }

        } else {
            $data['page'] = $this->Model_custom_page->getData($id);
            $this->load->view('admin/view_header',$data);
            $this->load->view('admin/view_custom_page_edit',$data);
            $this->load->view('admin/view_footer');
        }

    }


    public function delete($id)
    {
        $tot = $this->Model_custom_page->page_check($id);
        if(!$tot) {
            redirect(base_url().'admin/custom');
            exit;
        }

        $data['page'] = $this->Model_custom_page->getData($id);
        if($data['page']) {
            unlink('./public/uploads/'.$data['page']['photo']);
            unlink('./public/uploads/'.$data['page']['banner']);
        }

        $this->Model_custom_page->delete($id);
        $success = 'Custom Page is deleted successfully';
        $this->session->set_flashdata('success',$success);
        redirect(base_url().'admin/custom');
    }
	
}
