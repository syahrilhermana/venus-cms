<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('Model_common');
        $this->load->model('admin/Model_login');
        $this->load->model('Model_portfolio');
        $this->load->model('Model_member');
    }

    public function index()
    {
        if(!$this->session->userdata('_member')) {
            $error = 'Please login first';
            $this->session->set_flashdata('error',$error);
            redirect(base_url().'member/login');
        }
    }

    public function login()
    {
        if($this->session->userdata('_member')) {
            redirect(base_url().'member/area');
        }

        $error = '';

        $data['setting'] = $this->Model_common->all_setting();
        $data['page_service'] = $this->Model_common->all_page_service();
        $data['comment'] = $this->Model_common->all_comment();
        $data['social'] = $this->Model_common->all_social();
        $data['all_news'] = $this->Model_common->all_news();

        $data['portfolio_footer'] = $this->Model_portfolio->get_portfolio_data();

        if(isset($_POST['form1'])) {

            // Getting the form data
            $email = $this->input->post('email',true);
            $password = $this->input->post('password',true);

            // Checking the email address
            $un = $this->Model_member->check_email($email);

            if(!$un) {
                $error = 'Email address is wrong!';
                $this->session->set_flashdata('error',$error);
                redirect(base_url().'member/login');

            } else {

                // When email found, checking the password
                $pw = $this->Model_member->check_password($email,$password);

                if(!$pw) {

                    $error = 'Password is wrong!';
                    $this->session->set_flashdata('error',$error);
                    redirect(base_url().'member/login');

                } else {

                    // When email and password both are correct
                    $array = array(
                        'id' => $pw['member_id'],
                        'name' => $pw['member_name'],
                        'email' => $pw['member_email'],
                        'password' => $pw['member_password'],
                        'photo' => $pw['member_photo'],
                        'status' => $pw['member_status']
                    );
                    $this->session->set_userdata('_member', $array);
                    redirect(base_url().'member/area');
                }
            }
        } else {
            $this->load->view('view_header',$data);
            $this->load->view('view_member_login',$data);
            $this->load->view('view_footer',$data);
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect(base_url());
    }

    public function register()
    {
        if($this->session->userdata('_member')) {
            redirect(base_url().'member/area');
        }

        $error = '';

        $data['setting'] = $this->Model_common->all_setting();
        $data['page_service'] = $this->Model_common->all_page_service();
        $data['comment'] = $this->Model_common->all_comment();
        $data['social'] = $this->Model_common->all_social();
        $data['all_news'] = $this->Model_common->all_news();

        $data['portfolio_footer'] = $this->Model_portfolio->get_portfolio_data();

        if(isset($_POST['form1'])) {

            // Getting the form data
            $name = $this->input->post('name',true);
            $email = $this->input->post('email',true);
            $password = $this->input->post('password',true);

            // Checking the email address
            $un = $this->Model_member->check_email($email);

            if($un) {
                $error = 'Email address already exist!';
                $this->session->set_flashdata('error',$error);
                redirect(base_url().'member/login');

            } else {
                $form_data = array(
                    'member_name'       => $_POST['name'],
                    'member_email'      => $_POST['email'],
                    'member_password'   => md5($_POST['password']),
                    'member_status'     => 'A'
                );

                $this->Model_member->register($form_data);

                $this->session->set_flashdata('success',"Congratulations, your account has been successfully registered.");
                redirect(base_url().'member/login');
            }
        } else {
            $this->load->view('view_header',$data);
            $this->load->view('view_member_register',$data);
            $this->load->view('view_footer',$data);
        }
    }

    public function area()
    {
        if(!$this->session->userdata('_member')) {
            $error = 'Please login first';
            $this->session->set_flashdata('error',$error);
            redirect(base_url().'member/login');
        }

        $data['setting'] = $this->Model_common->all_setting();
        $data['page_service'] = $this->Model_common->all_page_service();
        $data['comment'] = $this->Model_common->all_comment();
        $data['social'] = $this->Model_common->all_social();
        $data['all_news'] = $this->Model_common->all_news();

        $data['portfolio_footer'] = $this->Model_portfolio->get_portfolio_data();

        $this->load->view('view_header',$data);
        $this->load->view('view_member_dashboard',$data);
        $this->load->view('view_footer',$data);
    }

    public function profile()
    {
        if(!$this->session->userdata('_member')) {
            $error = 'Please login first';
            $this->session->set_flashdata('error',$error);
            redirect(base_url().'member/login');
        }

        $error = '';

        $data['setting'] = $this->Model_common->all_setting();
        $data['page_service'] = $this->Model_common->all_page_service();
        $data['comment'] = $this->Model_common->all_comment();
        $data['social'] = $this->Model_common->all_social();
        $data['all_news'] = $this->Model_common->all_news();

        $data['profile'] = $this->Model_member->getData($this->session->userdata('_member')['id']);
        $data['portfolio_footer'] = $this->Model_portfolio->get_portfolio_data();

        if(isset($_POST['form1'])) {
            $form_data = array(
                'member_name'       => $_POST['name'],
                'member_phone'      => $_POST['phone'],
                'member_address'    => $_POST['address']
            );

            $this->Model_member->update($this->session->userdata('_member')['id'], $form_data);

            $this->session->set_flashdata('success',"Profile changed successfully");
            redirect(base_url().'member/profile');
        } else {
            $this->load->view('view_header',$data);
            $this->load->view('view_member_profil',$data);
            $this->load->view('view_footer',$data);
        }
    }
}