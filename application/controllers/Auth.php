<?php


class Auth extends MY_Controller {
    
    
    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->model(['users_login_m', 'users_login_m']);
    }

    
    public function index() {
//        if (!empty($this->session->userdata('nik'))) {
//            redirect('dashboard');
//            exit();
//        }
        
        $this->data['title'] = 'Halaman Login';
        $this->load->view('_layout_login', $this->data);
        
    }

    public function cek_login() {

        $nik = $this->input->post('nik');
        $password = md5($this->input->post('password'));
        $rfid = $this->input->post('rfid');
        
        if ($rfid != ''){
            
            $input = 'RFID Salah.';
            $cek = $this->users_login_m->get_by(['rfid_id_card' => $rfid, 'active' => 1]);
            
        } else if ($nik != '' and $password != ''){
            
            $input = 'NIK atau Password Salah.';
            $cek = $this->users_login_m->get_by(['nik' => $nik, 'password' => $password, 'active' => 1]);
                    
        }
        
        if ($cek){
            $this->session->set_userdata(['nik' => $nik, 'rfid' => $rfid]);
            redirect(base_url('dashboard'));
        } else {            
            $this->session->set_flashdata('message', 'Login Gagal! '.$input);
            redirect(base_url('auth'));
        }

    }

    //REGISTRASI PAGE
    public function registrasi() {
        $this->load->view('registrasi');
    }

    //LOGOUT
    public function logout() {
        $this->session->sess_destroy();
        redirect('auth');
    }
    
   

}
