<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_sejarah extends CI_Model
{

    public function get_data()
    {
        $data = $this->db->get('tb_sejarah')->row();
        return $data;
    }

    public function update_sejarah($id, $data)
    {
        $this->db->update('tb_sejarah', $data, $id);
        return true;
    }
}

/* End of file M_sejarah.php */