<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->library('bcrypt');
        $this->load->model('M_user');
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
                'title' => 'YS-score | User',
                'js' => 'core'
            ];

        $this->template->load('template', 'page/v_user', $data);
    }

    function data()
    {
        $list = $this->M_user->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $hasil) {
            $row   = array();
            $no++;
            $row[] = '<a href="javascript:;">
            <button type="button" onclick="updatemodal(' . $hasil->user_id . ');" class="btn btn-warning"><i class="fa fa-edit"></i></button>
            <button type="button" onclick="hapus(' . $hasil->user_id . ');" class="btn btn-danger"><i class="fa fa-trash"></i></button>
            
            </a>';
            $row[] =  $no . ".";
            $row[] = $hasil->user_nama;
            $row[] = $hasil->username;
            $row[] = $hasil->email;
            $row[] = '<img src="' . base_url('assets/uploads/user/' . $hasil->user_foto) . '" width="50" height="50">';
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_user->count_all(),
            "recordsFiltered" => $this->M_user->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    function js()
    {

        $this->load->view('user/js/core');
    }

    function save_user()
    {
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $pass = $this->input->post('password');
        $password = $this->bcrypt->hash_password($pass);

        $data = array(
            'user_nama' => $nama,
            'username' => $username,
            'email' => $email,
            'user_pass' => $password,
        );

        if (!empty($_FILES['photo']['name'])) {
            $upload = $this->_do_upload();
            $data['user_foto'] = $upload;
        } else {
            $data['user_foto'] = 'default.png';
        }


        $done = $this->M_user->saveUser($data);
        echo json_encode($done);
    }

    function update_user()
    {
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $img = $this->input->post('foto');

        $data = array(
            'user_nama' => $nama,
            'username' => $username,
            'email' => $email,
        );

        $cek_foto = $this->M_user->get_data_by_id($id);

        if (!empty($_FILES['photo']['name'])) {
            if ($_FILES['photo']['name'] != '') {
                unlink('assets/uploads/user/' . $cek_foto->user_foto);
            }
            if ($_FILES['photo']['name'] != '') {
                # code...
                $upload = $this->_do_upload();
                $data['user_foto'] = $upload;
            } else {
                $data['user_foto'] = $cek_foto->user_foto;
                # code...
            }
        }

        $done = $this->M_user->updateUser(array('user_id' => $id), $data);
        echo json_encode($done);
    }

    public function delete()
    {
        $id = $this->input->post('id');
        $cek_foto = $this->M_user->get_data_by_id($id);
        if ($cek_foto->user_foto != 'default.png') {
            # code...
            unlink('assets/uploads/user/' . $cek_foto->user_foto);
        }
        $this->M_user->deleteUser($id);
        echo json_encode(array("status" => TRUE));
    }

    private function _do_upload()
    {
        $config['upload_path']          = './assets/uploads/user/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 500; //set max size allowed in Kilobyte
        $config['max_width']            = 5000; // set max width image allowed
        $config['max_height']           = 5000; // set max height allowed
        $config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('photo')) //upload and validate
        {
            $data['inputerror'][] = 'photo';
            $data['error_string'][] = 'Upload error: ' . $this->upload->display_errors('', ''); //show ajax error
            $data['status'] = FALSE;
            echo json_encode($data);
            exit();
        }
        return $this->upload->data('file_name');
    }

    function get_data_by_id()
    {
        $id = $this->input->post('id');
        $data = $this->M_user->get_data_by_id($id);
        echo json_encode($data);
    }
}

/* End of file User.php */