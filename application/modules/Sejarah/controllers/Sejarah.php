<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Sejarah extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_sejarah');
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

        $this->template->load('template', 'page/v_sejarah', $data);
    }

    public function get_data()
    {
        $data = $this->M_sejarah->get_data();
        echo json_encode($data);
    }

    public function update_sejarah()
    {
        $id = $this->input->post('id');
        $judul = $this->input->post('judul');
        $isi = $this->input->post('isi');

        $data = array(

            'judul' => $judul,
            'isi' => $isi
        );

        $cek = $this->M_sejarah->get_data();

        if (!empty($_FILES['foto']['name'])) {
            if ($_FILES['foto']['name'] != '') {
                unlink('assets/uploads/sejarah/' . $cek->foto);
            }
            if ($_FILES['foto']['name'] != '') {
                # code...   
                $upload = $this->_do_upload();
                $data['foto'] = $upload;
            } else {
                $data['foto'] = $cek->foto;
                # code...
            }
        }

        $done = $this->M_sejarah->update_sejarah(array('id' => $id), $data);
        echo json_encode($done);
    }

    private function _do_upload()
    {
        $config['upload_path']          = './assets/uploads/sejarah/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 500; //set max size allowed in Kilobyte
        $config['max_width']            = 5000; // set max width image allowed
        $config['max_height']           = 5000; // set max height allowed
        $config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('foto')) //upload and validate
        {
            $data['inputerror'][] = 'foto';
            $data['error_string'][] = 'Upload error: ' . $this->upload->display_errors('', ''); //show ajax error
            $data['status'] = FALSE;
            echo json_encode($data);
            exit();
        }

        return $this->upload->data('file_name');
    }
}

/* End of file Sejarah.php */