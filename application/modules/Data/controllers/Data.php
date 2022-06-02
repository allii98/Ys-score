<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Data extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_data_api');
        date_default_timezone_set("asia/jakarta");
    }

    public function index()
    {
        echo "REST API for Device";
    }

    public function masuk_keluar()
    {
        if (isset($_GET['key']) && isset($_GET['data']) && isset($_GET['type'])) {
            # code...
            $key = $this->input->get('key');
            $cek_key = $this->M_data_api->cek_key($_GET['key']);
            if ($cek_key[0]->key == $key) {
                $get_pertandingan = $this->M_data_api->get_pertandingan($cek_key[0]->id);
                if ($get_pertandingan) {
                    $data = $this->input->get('data');
                    $type = $this->input->get('type');
                    if ($type == 'masuk') {
                        $data_masuk = $get_pertandingan->masuk;
                        $data_masuk = $data_masuk + $data;
                        $data_masuk = array(
                            'masuk' => $data_masuk
                        );

                        if ($this->M_data_api->update($get_pertandingan->id, $data_masuk)) {
                            $notif = array('status' => 'success', 'ket' => 'data berhasil di simpan');
                            echo json_encode($notif);
                        } else {
                            $notif = array('status' => 'failed', 'ket' => 'gagal simpan data');
                            echo json_encode($notif);
                        }
                    } else if ($type == 'keluar') {
                        $data_keluar = $get_pertandingan->keluar;
                        $data_keluar = $data_keluar + $data;
                        $data_keluar = array(
                            'keluar' => $data_keluar
                        );

                        $this->db->where('id', $get_pertandingan->id);

                        if ($this->db->update('tbpertandingan', $data_keluar)) {
                            $notif = array('status' => 'success', 'ket' => 'data berhasil di simpan');
                            echo json_encode($notif);
                        } else {
                            $notif = array('status' => 'failed', 'ket' => 'gagal simpan data');
                            echo json_encode($notif);
                        }
                    }
                } else {

                    $notif = array('status' => 'failed', 'ket' => 'pertandingan belum dimulai');
                    echo json_encode($notif);
                }
            } else {
                $notif = array('status' => 'failed', 'ket' => 'key tidak sesuai');
                echo json_encode($notif);
            }
        } else {
            $notif = array('status' => 'failed', 'ket' => 'salah parameter');
            echo json_encode($notif);
        }
    }
}

/* End of file Data.php */