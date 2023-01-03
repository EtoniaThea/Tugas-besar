<?php

class Admin Extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('admin/Admin_model');
    }

    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email',
            array(
                'required' => 'TIdak boleh kosong',
                'valid_email' => 'Email tidak valid "@"'
            )
        );

        $this->form_validation->set_rules('password', 'Password', 'required',
            array(
                'required' => 'Tidak boleh kosong'
            )
        );

        if($this->form_validation->run() == FALSE){
            $this->load->view('admin/form_login');
        }else{
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $this->Admin_model->prosesLogin($email,$password);
        }

        
    }

}