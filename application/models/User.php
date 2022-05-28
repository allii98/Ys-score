<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Model
{


    public function cekUserLogin()
    {
        $this->db->where('username', $this->input->post('username'));
        $this->db->where('password', md5($this->input->post('password')));
        $this->db->get('tb_user');
        return $this->db->affected_rows();
    }

    function prosesLogin($username)
    {
        $this->db->where('username', $username);

        return $this->db->get('tbuser');
    }

    function viewDataByID($username)
    {

        $query = $this->db->query("SELECT user_id, username, nik, nama, dept, qr_code FROM tbuser LEFT JOIN tbkaryawan ON user_id=id WHERE username='$username'")->row_array();
        return $query;
    }
    function getPW($username)
    {

        $query = $this->db->query("SELECT user_pass FROM tbuser WHERE username='$username'")->row_array();
        return $query;
    }
}

/* End of file User.php */