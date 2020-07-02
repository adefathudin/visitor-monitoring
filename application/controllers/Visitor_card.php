<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Visitor_card extends MY_Controller {

    function __construct(){
        parent::__construct();
    }

    public function index()
    {
        
        $this->data['title'] = 'Management Visitors';
        $this->data['subview'] = 'visitor_card/index';
        $this->load->view('_layout_main', $this->data);
    }

}
