<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Karyawan extends REST_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_karyawan');
    }


    public function index_get()
    {
        $id = $this->get('id');
        if ($id == null) {

            $karyawan = $this->M_karyawan->getData();
        } else {
            $karyawan = $this->M_karyawan->getData($id);
        }

        if ($karyawan) {
            $this->response([
                'status' => true,
                'data' => $karyawan
            ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code
        } else {
            $this->response([
                'status' => FALSE,
                'message' => 'Id not found'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
    }
}

/* End of file Karyawan.php */
