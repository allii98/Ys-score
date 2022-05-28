<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_karyawan extends CI_Model
{

    public function getData($id = null)
    {
        if ($id === null) {

            return $this->db->get('tbkaryawan')->result_array();
        } else {
            return $this->db->get_where('tbkaryawan', ['id' => $id])->result_array();
        }
    }
}

/* End of file M_karyawan.php */
