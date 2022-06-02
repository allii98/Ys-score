<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_data');
        if (!$this->session->userdata('userlogin')) {
            $pemberitahuan = "<div class='alert alert-warning'>Anda harus login dulu </div>";
            $this->session->set_flashdata('pesan', $pemberitahuan);
            redirect('Login');
        }
    }

    function get_ajax()
    {
        $list = $this->M_data->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $d) {
            $no++;
            $row = array();
            $row[] = '<button  class="btn btn-xs btn-warning fa fa-edit" id="btn_ubah" name="btn_ubah_" data-id="' . $d->id . '" data-nik="' . $d->nik . '" data-nama="' . $d->nama . '" data-dept="' . $d->dept . '" onClick="return false" type="button" data-toggle="tooltip" data-placement="right" title="Ubah"></button>
            <button class="btn btn-xs btn-danger fa fa-trash" id="btn_hapus" name="btn_hapus_" data-id="' . $d->id . '" onClick="return false" type="button" data-toggle="tooltip" data-placement="right" title="Hapus" ></button>
            ';
            $row[] = $no . ".";
            $row[] = $d->nik;
            $row[] = $d->nama;
            $row[] = $d->dept;
            // $row[] = '<img src=" ' . site_url('assets/qrcode/' . $d->qr_code) . '" width="60px">';
            $row[] = '<div id="lightgallery">
            <a href="' . base_url('assets/qrcode/' . $d->qr_code) . '" class="btn btn-soft-primary waves-effect waves-light" download>
                <img src="' . site_url('assets/qrcode/' . $d->qr_code) . '" width="50px"/>
            </a>
            <i></i>
          </div>';


            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_data->count_all(),
            "recordsFiltered" => $this->M_data->count_filtered(),
            "data" => $data,
        );
        // output to json format
        echo json_encode($output);
    }

    public function index()
    {
        $m = $this->M_data->countData();

        if ($m == null) {
            $masuk = 0;
        } else {
            $masuk = $m['masuk'];
        }
        if ($m == null) {
            $keluar = 0;
        } else {
            $keluar = $m['keluar'];
        }

        $data =
            [
                'title' => 'YS-score|Home',
                'js' => 'core',
                'masuk' => $masuk,
                'keluar' => $keluar
            ];

        // var_dump($data) . die();

        $this->template->load('template', 'page/dashboard', $data);
    }

    public function save()
    {
        $nik = $this->input->post('nik');
        $nama = $this->input->post('nama');
        $dept = $this->input->post('dept');

        $this->load->library('ciqrcode'); //pemanggilan library QR CODE

        $config['cacheable']    = true; //boolean, the default is true
        $config['cachedir']     = './assets/'; //string, the default is application/cache/
        $config['errorlog']     = './assets/'; //string, the default is application/logs/
        $config['imagedir']     = './assets/qrcode/'; //direktori penyimpanan qr code
        $config['quality']      = true; //boolean, the default is true
        $config['size']         = '1024'; //interger, the default is 1024
        $config['black']        = array(224, 255, 255); // array, default is array(255,255,255)
        $config['white']        = array(70, 130, 180); // array, default is array(0,0,0)
        $this->ciqrcode->initialize($config);

        $image_name = $nik . '.png'; //buat name dari qr code sesuai dengan nik

        $params['data'] = $nik; //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 10;
        $params['savename'] = FCPATH . $config['imagedir'] . $image_name; //simpan image QR CODE ke folder assets/images/
        $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

        $data = $this->M_data->simpan($nik, $nama, $dept, $image_name); //simpan ke database
        echo json_encode($data);
    }

    public function update()
    {
        $id = $this->input->post('id');
        $nik = $this->input->post('nik');
        $nama = $this->input->post('nama');
        $dept = $this->input->post('dept');

        $this->load->library('ciqrcode'); //pemanggilan library QR CODE

        $config['cacheable']    = true; //boolean, the default is true
        $config['cachedir']     = './assets/'; //string, the default is application/cache/
        $config['errorlog']     = './assets/'; //string, the default is application/logs/
        $config['imagedir']     = './assets/qrcode/'; //direktori penyimpanan qr code
        $config['quality']      = true; //boolean, the default is true
        $config['size']         = '1024'; //interger, the default is 1024
        $config['black']        = array(224, 255, 255); // array, default is array(255,255,255)
        $config['white']        = array(70, 130, 180); // array, default is array(0,0,0)
        $this->ciqrcode->initialize($config);

        $image_name = $nik . '.png'; //buat name dari qr code sesuai dengan nik

        $params['data'] = $nik; //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 10;
        $params['savename'] = FCPATH . $config['imagedir'] . $image_name; //simpan image QR CODE ke folder assets/images/
        $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

        $data = $this->M_data->update($id, $nik, $nama, $dept, $image_name); //simpan ke database
        echo json_encode($data);
    }

    public function hapus()
    {
        $id = $this->input->post('id');
        $data = array('id' => $id);
        $data = $this->M_data->delete($data);
        echo json_encode($data);
    }

    public function check_data()
    {
        $check = $this->input->get('nik');
        $data = $this->M_data->check_data($check);
        echo json_encode($data);
    }
}

/* End of file Home.php */