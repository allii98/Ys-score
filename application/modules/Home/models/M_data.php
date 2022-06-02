<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_data extends CI_Model
{

    var $table = 'tbkaryawan'; //nama tabel dari database
    var $column_order = array(null, 'id', 'nik', 'nama', 'dept', 'qr_code'); //field yang ada di table supplier  
    var $column_search = array('nik', 'nama', 'dept'); //field yang diizin untuk pencarian 
    var $order = array('id' => 'DESC'); // default order 

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    private function _get_datatables_query()
    {
        // $Value = ;
        $this->db->from($this->table);


        $i = 0;

        foreach ($this->column_search as $item) // looping awal
        {
            if ($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {

                if ($i === 0) // looping awal
                {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if (count($this->column_search) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    function simpan($nik, $nama, $dept, $image_name)
    {
        $options = array(
            'cluster' => 'ap1',
            'useTLS' => true
        );
        $pusher = new Pusher\Pusher(
            '4b5f48325321d8418421',
            'b7e3539121a6248352df',
            '1179084',
            $options
        );

        $data['message'] = 'hello world';
        $pusher->trigger('my-channel', 'my-event', $data);

        $d = array(
            'nik'       => $nik,
            'nama'      => $nama,
            'dept'     => $dept,
            'qr_code'   => $image_name
        );
        $this->db->insert('tbkaryawan', $d);
    }

    function update($id, $nik, $nama, $dept, $image_name)
    {
        $options = array(
            'cluster' => 'ap1',
            'useTLS' => true
        );
        $pusher = new Pusher\Pusher(
            '4b5f48325321d8418421',
            'b7e3539121a6248352df',
            '1179084',
            $options
        );

        $data['message'] = 'hello world';
        $pusher->trigger('my-channel', 'my-event', $data);

        $d = array(
            'nik'       => $nik,
            'nama'      => $nama,
            'dept'     => $dept,
            'qr_code'   => $image_name
        );

        $this->db->where('id', $id);
        $this->db->update('tbkaryawan',  $d);
        // $this->db->insert('tbkaryawan', $d);
    }

    public function delete($data)
    {
        $options = array(
            'cluster' => 'ap1',
            'useTLS' => true
        );
        $pusher = new Pusher\Pusher(
            '4b5f48325321d8418421',
            'b7e3539121a6248352df',
            '1179084',
            $options
        );

        $d['message'] = 'hello world';
        $pusher->trigger('my-channel', 'my-event', $d);
        $this->db->where($data);
        $this->db->delete('tbkaryawan');

        return TRUE;
    }

    public function check_data($check)
    {
        // $query = "SELECT nik FROM tbkaryawan WHERE nik = '$check'";
        // $data = $this->db->query($query)->result_array;
        // return $data;

        $this->db->select('nik');
        $this->db->where('nik', $check);
        $this->db->from('tbkaryawan');
        return $this->db->get()->row();
    }

    public function countData()
    {

        $data = $this->db->query("SELECT * FROM tbpertandingan WHERE status='1'")->row_array();
        return $data;
    }
}