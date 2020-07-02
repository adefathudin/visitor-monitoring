<?php

//defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->model(['users_login_m']);
    }

    public function index() {
        $user_id = $this->session->userdata('user_id');
        $this->data['curdate'] = date('d-m-Y h:i:sa');
        $this->data['saldo'] = $this->rekening_m->get_saldo($user_id);
        $this->data['laporan_mutasi'] = $this->mutasi_rekening_m->get_mutasi_rekening($user_id);
        $this->data['title'] = 'Posisi Mutasi Saldo';
        $this->data['subview'] = 'users/index';
        $this->load->view('_layout_main', $this->data);
    }
    
    
    public function tambah_petugas_post() {
        
        $nik = $this->post('nik');
        $nama_lengkap = $this->post('nama_lengkap');
        $jabatan = $this->post('jabatan');
        $password = $this->post('password');
        $rfid = $this->post('rfid');
        
        $data = ([
            'nik' => $nik,
            'nama_lengkap' => $nama_lengkap,
            'jabatan'   => $jabatan,
            'password'  => md5($password),
            'rfid_id_card'  => $rfid
        ]);
        
        if ($this->users_login_m->get_count(['nik' => $nik])){
            $output['status'] = false;
            $output['message'] = 'NIK sudah terdaftar';            
            $this->response($output);
        }
        
        if ($this->users_login_m->get_count(['rfid_id_card' => $rfid])){
            $output['status'] = false;
            $output['message'] = 'RFID sudah terdaftar';            
            $this->response($output);
        }
        
        $insert = $this->users_login_m->save($data);
        
        if ($insert){
            $output['status'] = true;
            $output['message'] = 'Petugas berhasil ditambahkan';  
        } else {
            $output['status'] = false;
            $output['message'] = 'Gagal menambahkan petugas';  
        }
        $this->response($output);
    }
    
    public function list_petugas_get() {

        $draw = $this->get('draw');
        $length = $this->get('length');
        $start = $this->get('start');
        $order = $this->get('order');
        $columns = $this->get('columns');
        $search = $this->get('search') ? $this->get('search') : NULL;

        $order_by = $columns[$order[0]['column']]['data'];
        $order_dir = $order[0]['dir'];

        $totalRecords = $this->users_login_m->get_count();
        
        if ($search && $search['value']) {
            $this->db->like('users_login.nama_lengkap', $search['value']);
        }
        
        $totalFiltered = $this->users_login_m->get_count(['active' => '1']);
                
        $output = array(
            "draw" => $draw,
            "recordsTotal" => $totalRecords,
            "recordsFiltered" => $totalFiltered,
            "data" => []
        );

        if ($search && $search['value']) {
            $this->db->like('users_login.nama_lengkap', $search['value']);
        }

        $this->db->order_by($order_by, $order_dir);
        $this->db->offset($start)->limit($length);

        $query_result = $this->users_login_m->get_by(['active' => '1']);
        
        if ($query_result) {
            foreach ($query_result as $item) {
                $output['data'][] = $item;
            }
        }

        $this->response($output);
    }
    
    public function block_user_get() {

        $id = $this->get('id');

        if ($this->users_login_m->save(['active' => 0], $id)) {
            
            $output['status'] = true;
            $output['message'] = "Petugas berhasil dinonaktifkan";
            
        } else {
            
            $output['status'] = false;
            $output['message'] = "Something is wrong";
        }

        $this->response($output);
    }

}
