<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Dashboard extends MY_Controller {

    function __construct(){
        parent::__construct();
    }

    public function index()
    {
        
        $this->data['title'] = 'Dashoard';
        $this->data['subview'] = 'dashboard/index';
        $this->load->view('_layout_main', $this->data);
    }

}
