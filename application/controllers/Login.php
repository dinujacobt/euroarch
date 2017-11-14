<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Login extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper('security');
        $this->load->library('form_validation');
        $this->load->helper('form');        
        $this->load->model('admin_model');
        
    }
    function index() {
        if (isset($this->session->userdata['user_id'])) {
            redirect('admin');
            exit;
        }
        $this->load->view('login');
    }

    function login_fn() {
        $this->form_validation->set_rules('username', 'Username', 'xss_clean|trim|required');
        $this->form_validation->set_rules('password', 'Password', 'xss_clean|trim|required');
        if ($this->form_validation->run() == FALSE) {
            $data['error'] = 'username and password required';
            $this->load->view('login', $data);
        } else {
            $username = $this->input->post("username");
            $password = $this->input->post("password");

            $result = $this->admin_model->login($username, $password);
            if ($result == 1) {
                $this->session->set_userdata(array(
                    'user_id' => $username
                ));
                redirect('admin');
            } else {
                $this->session->set_flashdata('error', 'incorrect username or password');
                redirect('login');
            }
        }
    }

    function logout() {
        $this->session->unset_userdata('user_id');
        $this->session->set_flashdata('success', 'Logged out Successfully');
        redirect('login');
    }

}
