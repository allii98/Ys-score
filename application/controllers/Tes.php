<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Tes extends CI_Controller
{

    public function index()
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
    }
}

/* End of file Tes.php */
