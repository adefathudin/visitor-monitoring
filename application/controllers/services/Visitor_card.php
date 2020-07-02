<?php

//defined('BASEPATH') OR exit('No direct script access allowed');

class Visitor_card extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->model(['visitor_card_m']);
    }

    public function index() {
        $user_id = $this->session->userdata('user_id');
        $this->data['curdate'] = date('d-m-Y h:i:sa');
        $this->data['saldo'] = $this->rekening_m->get_saldo($user_id);
        $this->data['laporan_mutasi'] = $this->mutasi_rekening_m->get_mutasi_rekening($user_id);
        $this->data['title'] = 'Posisi Mutasi Saldo';
        $this->data['subview'] = 'visitor_card/index';
        $this->load->view('_layout_main', $this->data);
    }
    
    public function delete_kartu_get(){
        
        $rfid_visitor_card = $this->get('rfid_visitor_card');
        
        if ($this->visitor_card_m->delete($rfid_visitor_card)){
                $output['status'] = true;
                $output['message'] = 'Kartu Visitor Berhasil Dihapus';  
            } else {
                $output['status'] = false;
                $output['message'] = 'Gagal Menghapus Kartu Visitor';  
            }
        $this->response($output);
        
    }
    
    public function tambah_kartu_post() {
        
        $nomor = $this->post('nomor');
        $rfid = $this->post('rfid');
        
        $data = ([
            'nomor_visitor_card' => $nomor,
            'rfid_visitor_card'  => $rfid
        ]);
        
        if ($this->visitor_card_m->get_count(['rfid_visitor_card' => $rfid])){
            $output['status'] = false;
            $output['message'] = 'Kartu visitor sudah terdaftar';            
            $this->response($output);
        }
        
        if ($this->visitor_card_m->get_count(['nomor_visitor_card' => $nomor])){
            $output['status'] = false;
            $output['message'] = 'Nomor kartu sudah terdaftar';            
            $this->response($output);
        }
        
        $insert = $this->visitor_card_m->save($data);
        
        if ($insert){
            $output['status'] = true;
            $output['message'] = 'Kartu visitor berhasil ditambahkan';  
        } else {
            $output['status'] = false;
            $output['message'] = 'Gagal menambahkan kartu visitor';  
        }
        $this->response($output);
    }
    
    public function list_visitor_card_get() {

        $draw = $this->get('draw');
        $length = $this->get('length');
        $start = $this->get('start');
        $order = $this->get('order');
        $columns = $this->get('columns');
        $search = $this->get('search') ? $this->get('search') : NULL;

        $order_by = $columns[$order[0]['column']]['data'];
        $order_dir = $order[0]['dir'];

        $totalRecords = $this->visitor_card_m->get_count();
        
        if ($search && $search['value']) {
            $this->db->like('visitor_card.rfid_visitor_card', $search['value']);
        }
        
        $totalFiltered = $this->visitor_card_m->get_count();
                
        $output = array(
            "draw" => $draw,
            "recordsTotal" => $totalRecords,
            "recordsFiltered" => $totalFiltered,
            "data" => []
        );

        if ($search && $search['value']) {
            $this->db->like('visitor_card.rfid_visitor_card', $search['value']);
        }

        $this->db->order_by($order_by, $order_dir);
        $this->db->offset($start)->limit($length);

        $query_result = $this->visitor_card_m->get();
        
        if ($query_result) {
            foreach ($query_result as $item) {
                $output['data'][] = $item;
            }
        }

        $this->response($output);
    }
    
}
