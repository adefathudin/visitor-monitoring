<?php

class MY_Controller extends CI_Controller {

    public $data = array();
    protected $userlib = NULL;

    function __construct() {
        parent::__construct();

        if (!isset($this->session)) {
            $this->load->library('session') or die('Can not load library Session');
        }
        
        $user_id = $this->session->userdata('user_id');

        if (empty($user_id)) {

            if ($this->uri->segment(1) != 'auth') {
                echo "<script>window.location='auth';</script>";
            }
        } else {

            $this->load->model('users_login_m');
            $data_users = $this->users_login_m->get_by(['id' => $user_id]);
            foreach ($data_users as $data_user) {
                $this->data['data_user'] = $data_user;
            }
        }
    }

}
