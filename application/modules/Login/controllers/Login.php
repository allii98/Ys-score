<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Login_m');
		$this->load->library('bcrypt');
	}

	public function index()
	{
		check_already_login();
		$data = [
			'title' => 'Login Page',
		];
		$this->load->view('v_login', $data);
	}

	public function proses()
	{
		# code...
		if (isset($_POST['username']) && isset($_POST['pass'])) {

			$username = $this->input->post('username');
			$pass = $this->input->post('pass');
			$hash = $this->bcrypt->hash_password($pass);	//encrypt password

			if (isset($_POST["remember"])) {
				$hour = time() + 3600 * 24 * 30;
				setcookie('username', $username, $hour);
				setcookie('user_pass', $pass, $hour);
			}

			//ambil data dari database
			$check = $this->Login_m->prosesLogin($username);
			$hasil = 0;
			if (isset($check)) {
				$hasil++;
			}

			//echo $pass;
			//echo "<br>";
			if ($hasil > 0) {
				$data = $this->Login_m->viewDataByID($username);
				foreach ($data as $dkey) {
					$passDB = $dkey->user_pass;
					$nama = $dkey->user_nama;
					// $avatar = $dkey->foto;
					//$idusr = $dkey->id;
				}
				if ($this->bcrypt->check_password($pass, $passDB)) {
					// Password match
					$this->session->set_userdata('userlogin', $username);
					$this->session->set_userdata('user', $nama);

					redirect('Home');
				} else {
					// Password does not match
					$this->session->set_flashdata("pesan", "<div class=\"alert alert-danger alert-dismissible\" id=\"alert\"><strong>Gagal Login, password salah!</strong> </div>");
					redirect(base_url() . 'Login');
				}
			} else {
				$this->session->set_flashdata("pesan", "<div class=\"alert alert-danger alert-dismissible\" id=\"alert\"><strong>Gagal Login, username tidak ditemukan!</strong> </div>");
				redirect(base_url() . 'Login');
			}
		}
	}

	public function logout()
	{
		$params = array('userlogin', 'user_id');
		$this->session->unset_userdata($params);
		redirect('Login');
		# code...
	}
}