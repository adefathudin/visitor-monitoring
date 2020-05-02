<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Visitors extends MY_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('notifikasi_m');
    }

    public function index()
    {
        
        $this->data['title'] = 'Management Visitors';
        $this->data['subview'] = 'visitor/index';
        $this->load->view('_layout_main', $this->data);
    }

}
