<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_about extends CI_Model
{

    public function get_data()
    {
        $data = $this->db->get('tb_about')->row();
        return $data;
    }

    public function update_about($id, $data)
    {
        $this->db->update('tb_about', $data, $id);
        return true;
    }
}

/* End of file M_about.php */