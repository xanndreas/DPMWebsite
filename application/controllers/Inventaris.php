<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Inventaris extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model('user_model', 'user');
    }

    public function index()
    {
        $data['ud'] = $this->session->userdata('user_login');
        $data['plot'] = $this->user->getData('plot')->result();
        $this->load->view('user/template/header',$data);
        $this->load->view('user/inventaris/index');
        $this->load->view('user/template/footer');
    }
}

/* End of file Anggota.php */
