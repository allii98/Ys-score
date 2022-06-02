<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_data_api extends CI_Model
{

    function cek_key($key)
    {
        $query = $this->db->where('id', 1);
        $q = $this->db->get('keys');
        $data = $q->result();

        return $data;
    }

    function get_pertandingan($key)
    {
        $data = $this->db->query("SELECT id,masuk, keluar FROM tbpertandingan WHERE id_key = '$key' AND status = '1'")->row();
        return $data;
    }

    function update($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('tbpertandingan', $data);




        return TRUE;
    }
}

/* End of file M_data_api.php */