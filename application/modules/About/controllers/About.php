<?php

defined('BASEPATH') or exit('No direct script access allowed');

class About extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_about');

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
                'title' => 'YS-score | Sejarah',
                'js' => 'core'
            ];

        $this->template->load('template', 'page/v_about', $data);
    }

    public function get_data()
    {
        $data = $this->M_about->get_data();
        echo json_encode($data);
    }

    public function update_sejarah()
    {
        $id = $this->input->post('id');
        $isi = $this->input->post('isi');

        $data = array(

            'isi' => $isi
        );

        $done = $this->M_about->update_about(array('id' => $id), $data);
        echo json_encode($done);
    }
}

/* End of file About.php */