<?php

Class Auth extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->Model('Model_login');
    }

    function index() {
        $this->load->view('auth/login');
    }

    function chek_login() {
        if (isset($_POST['submit'])) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $result = $this->Model_login->chek_login($username, $password);
            if (!empty($result)) {
                $this->session->set_userdata($result);
                $this->session->set_userdata(array('status_login'=>'ok'));
                redirect('Dashboard');
            }else {
                $this->session->set_flashdata('gagal','username dan password yang anda masukan salah !!!');
                redirect('Auth');
            }
        } else {
            $this->load->view('auth/login');
        }
    }

    function logout() {
        $this->session->sess_destroy();

        redirect('Auth');
    }

}

?>