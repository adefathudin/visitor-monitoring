<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Dashboard extends MY_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('notifikasi_m');
    }

    public function index()
    {
        
        $this->data['title'] = 'Dashoard';
        $this->data['subview'] = 'dashboard/index';
        $this->load->view('_layout_main', $this->data);
    }

}
