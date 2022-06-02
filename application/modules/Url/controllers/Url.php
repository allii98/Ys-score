<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Url extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_url');

        if (!$this->session->userdata('userlogin')) {
            $pemberitahuan = "<div class='alert alert-warning'>Anda harus login dulu </div>";
            $this->session->set_flashdata('pesan', $pemberitahuan);
            redirect('Login');
        }
    }


    public function index()
    {
        $data =
            [
                'title' => 'YS-score | Url',
                'js' => 'core',
                'key' => $this->M_url->getKey()
            ];

        $this->template->load('template', 'page/v_url', $data);
    }
}

/* End of file Url.php */