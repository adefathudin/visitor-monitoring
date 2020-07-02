<?php   

class MY_Controller extends CI_Controller {
    public $data = array();
    protected $userlib = NULL;
    
    function __construct() {
        parent::__construct();
        
        if (!isset($this->session)){
            $this->load->library('session') or die('Can not load library Session');
        }
        
//        if (empty($this->session->userdata('nik'))) {
//            redirect('auth');
//            exit();
//        }
        
        $this->load->model('users_login_m');
        
        $nik = $this->session->userdata('nik');        
        $rfid = $this->session->userdata('rfid');
        
        if ($nik != ''){
            $data_users = $this->users_login_m->get_by(['nik' => $nik]);
        } else {
            $data_users = $this->users_login_m->get_by(['rfid_id_card' => $rfid]);
        }
        
        foreach ($data_users as $data_user){
            $this->data['data_user'] = $data_user;
        }
        
}}
 