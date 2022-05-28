<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();

        $this->load->model('M_user');
    }


    public function index()
    {
        $data =
            [
                'title' => 'YS-score|User',
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
            $row[] = '<button type="button" class="btn btn-warning"><i class="fa fa-edit"></i></button>';
            $row[] =  $no . ".";
            $row[] = $hasil->user_nama;
            $row[] = $hasil->username;
            $row[] = $hasil->email;
            $row[] = $hasil->user_foto;
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
}

/* End of file User.php */