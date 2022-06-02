<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_url extends CI_Model
{

    function getKey()
    {
        $query = $this->db->where('id', 1);
        $q = $this->db->get('keys');
        $data = $q->row();

        return $data;
    }
}

/* End of file M_url.php */