<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';


class Authentication extends REST_Controller
{

    public function __construct()
    {
        parent::__construct();

        // Load the user model
        $this->load->model('user');
        $this->load->library('bcrypt');
    }

    public function login_post()
    {
        // Get the post data
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        // Validate the post data


        $hasil = $this->user->prosesLogin($username)->num_rows();

        if ($hasil > 0) {
            $user = $this->user->viewDataByID($username);
            $pw = $this->user->getPW($username);

            $passDB = $pw['user_pass'];

            if ($this->bcrypt->check_password($password, $passDB)) {
                // Password match
                $this->response([
                    'status' => TRUE,
                    'message' => 'Login Berhasil.',
                    'data' => $user
                ], REST_Controller::HTTP_OK);
            } else {
                // Password does not match
                $this->response([
                    'status' => false,
                    'message' => 'Password salah.',
                    'data' => 0
                ], REST_Controller::HTTP_OK);
            }
        } else {
            $this->response([
                'status' => false,
                'message' => 'Username tidak ditemukan.',
                'data' => 0
            ], REST_Controller::HTTP_OK);
        }
    }
}
