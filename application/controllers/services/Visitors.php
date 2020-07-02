<?php

//defined('BASEPATH') OR exit('No direct script access allowed');

class Visitors extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->model(['visitor_history_m', 'visitor_detail_m', 'visitor_card_m']);
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
    
    public function check_visitor_get() {
        
        $card = $this->get('card');
        
        if ($card == "") {
           $output['ada'] = 'null';
           $this->response($output);
        }
        
        $cek_id_card = $this->visitor_history_m->get_count(['rfid_id_card' => $card, 'checkout' => 0]);
        $cek_visitor_card = $this->visitor_history_m->get_count(['rfid_visitor_card' => $card, 'checkout' => 0]);
        $cek_eksist_visitor = $this->visitor_detail_m->get_count(['id_card' => $card]);
        
        if ($cek_id_card) {
            $output['ada'] = 'id_card';
        } else {
            if ($cek_visitor_card) {
                $output['ada'] = 'visitor_card';
            } else {
                if ($cek_eksist_visitor) {
                    $output['ada'] = 'eksist_visitor';
                } else {
                    $output['ada'] = false;
                }
            }
        }

        $this->response($output);
    }    
    
    public function daftar_visitor_post() {
        
        $card = $this->post('card');
        $status_profesi = $this->post('status_profesi');
        $nik = $this->post('nik');
        $nama_lengkap = $this->post('nama_lengkap');
        $nama_perusahaan = $this->post('nama_perusahaan');
        $nomor_telepon = $this->post('nomor_telepon');
        $keperluan = $this->post('keperluan');
        $visitor_card = $this->post('visitor_card');

        if ($card == "" || $status_profesi == "" || $nik == "" || $nama_lengkap == "" || $nama_perusahaan == "" || $nomor_telepon == "" || $keperluan == "" || $visitor_card == "") {
            $output['status'] = false;
            $output['message'] = "Harap Lengkapi Semua Form";
            $this->response($output);
        }
        
        if ($this->visitor_card_m->get_count(['rfid_visitor_card' => $visitor_card, 'status' => 1])){
            $output['status'] = false;
            $output['message'] = "Kartu visitor sudah digunakan! Harap pakai kartu visitor lain";
            $this->response($output);
        }
        
        if (!$this->visitor_card_m->get_count(['rfid_visitor_card' => $visitor_card])){
            $output['status'] = false;
            $output['message'] = "Kartu visitor tidak terdaftar";
            $this->response($output);
        }

        $data_visitor_detail = [
            'id_card' => $card,
            'nik' => $nik,
            'nama_lengkap' => $nama_lengkap,
            'status_profesi' => $status_profesi,
            'nama_perusahaan' => $nama_perusahaan,
            'nomor_telepon' => $nomor_telepon
        ];
        
        $data_visitor_history = [
            'rfid_id_card' => $card,
            'rfid_visitor_card' => $visitor_card,
            'tujuan' => $keperluan,
            'checkout' => 0,
            'tanggal_in' => date('Y-m-d'),
            'jam_in' => date('h:i:s'),
            'status_profesi' => $status_profesi,
            'nama_perusahaan' => $nama_perusahaan
        ];
        
        $insert_data_visitor_detail = $this->visitor_detail_m->save($data_visitor_detail);

        if ($insert_data_visitor_detail) {
            $this->visitor_history_m->save($data_visitor_history);
            $this->visitor_card_m->save(['status' => 1], $visitor_card);
            $output['status'] = true;
            $output['message'] = "Data Berhasil Disimpan";
        } else {
            $output['status'] = false;
            $output['message'] = "Something wrong";
        }

        $this->response($output);
    }
    
    public function detail_visitor_checkout_get() {
        
        $card = $this->get('card');
        
        $cek_visitor = $this->visitor_history_m->get_visitor_by_card($card);

        if ($cek_visitor) {
            $output['status'] = true;
            $output['item'] = $cek_visitor;            
        } else {
            $output['status'] = false;
            $output['message'] = "something is wrong";
        }

        $this->response($output);
    }

    public function checkout_visitor_get(){
        $id_visitor = $this->get('id_visitor');
        $visitor_card = $this->get('visitor_card');
        $id_card = $this->get('id_card');
        
        if ($this->visitor_history_m->get_count(['rfid_id_card' => $id_card, 'rfid_visitor_card' => $visitor_card]) == 0){   
            $output['status'] = false;
            $output['message'] = "ID card dan Visitor card tidak sama";
            $this->response($output);
        }
        
        $data_checkout = [
            'checkout' => 1,
            'tanggal_out' => date('Y-m-d'),
            'jam_out'   => date('h:i:s')
        ];
        
        $update = $this->visitor_history_m->save($data_checkout, $id_visitor);

        if ($update) {             
            $this->visitor_card_m->save(['status' => 0], $visitor_card);
            $output['status'] = true;
            $output['message'] = "Visitor berhasil checkout";            
        } else {
            $output['status'] = false;
            $output['message'] = "Something is wrong";
        }

        $this->response($output);
    }
    
    public function detail_visitor_checkin_get() {
        
        $id_card = $this->get('id_card');
        
        $cek_visitor = $this->visitor_detail_m->get_by(['id_card' => $id_card]);

        if ($cek_visitor) {
            $output['status'] = true;
            $output['item'] = $cek_visitor;            
        } else {
            $output['status'] = false;
            $output['message'] = "Something is wrong";
        }

        $this->response($output);
    }
    
    public function checkin_visitor_get(){
        
        $visitor_card = $this->get('visitor_card');
        $id_card = $this->get('id_card');
        $status_profesi = $this->get('status_profesi');
        $nama_perusahaan = $this->get('nama_perusahaan');
        $keperluan = $this->get('keperluan');
        
        if ($this->visitor_card_m->get_count(['rfid_visitor_card' => $visitor_card, 'status' => 1])){
            $output['status'] = false;
            $output['message'] = "Kartu visitor sudah digunakan! Harap pakai kartu visitor lain";
            $this->response($output);
        }
        
        if (!$this->visitor_card_m->get_count(['rfid_visitor_card' => $visitor_card])){
            $output['status'] = false;
            $output['message'] = "Kartu visitor tidak terdaftar";
            $this->response($output);
        }
            
        $data_checkin = [
            'rfid_id_card' => $id_card,
            'rfid_visitor_card' => $visitor_card,
            'status_profesi'    => $status_profesi,
            'nama_perusahaan'   => $nama_perusahaan,
            'tujuan'   => $keperluan,
            'checkout'  => 0,
            'tanggal_in'    => date('Y-m-d'),
            'jam_in'    => date('h:i:s')
        ];
        
        $insert = $this->visitor_history_m->save($data_checkin);

        if ($insert) {
            $this->visitor_card_m->save(['status' => 1], $visitor_card);
            $output['status'] = true;
            $output['message'] = "Visitor berhasil checkin";            
        } else {
            $output['status'] = false;
            $output['message'] = "Something is wrong";
        }

        $this->response($output);
    }
    
    public function list_users_get() {

        $draw = $this->get('draw');
        $length = $this->get('length');
        $start = $this->get('start');
        $order = $this->get('order');
        $columns = $this->get('columns');
        $search = $this->get('search') ? $this->get('search') : NULL;

        $order_by = $columns[$order[0]['column']]['data'];
        $order_dir = $order[0]['dir'];

        $totalRecords = $this->visitor_detail_m->get_count();
        
        if ($search && $search['value']) {
            $this->db->like('visitor_detail.nama_lengkap', $search['value']);
        }
        
        $totalFiltered = $this->visitor_detail_m->get_count(['blokir' => '0']);
                
        $output = array(
            "draw" => $draw,
            "recordsTotal" => $totalRecords,
            "recordsFiltered" => $totalFiltered,
            "data" => []
        );

        if ($search && $search['value']) {
            $this->db->like('visitor_detail.nama_lengkap', $search['value']);
        }

        $this->db->order_by($order_by, $order_dir);
        $this->db->offset($start)->limit($length);

        $query_result = $this->visitor_detail_m->get_by(['blokir' => '0']);
        
        if ($query_result) {
            foreach ($query_result as $item) {
                $output['data'][] = $item;
            }
        }

        $this->response($output);
    }
    
    public function block_user_get() {

        $id_visitor = $this->get('id_visitor');
        $id_card = $this->get('id_card');

        if ($this->visitor_detail_m->get_by(['id' => $id_visitor, 'blokir' => 0])) {

            if ($this->visitor_history_m->get_by(['rfid_id_card' => $id_card, 'checkout' => 0])) {

                $output['status'] = false;
                $output['message'] = "User ini tidak dapat dinonaktifkan. User belum melakukan checkout. Harap checkout telebih dahulu";
                $this->response($output);
            }
            
            $this->visitor_detail_m->save(['blokir' => 1], $id_visitor);
            
            $output['status'] = true;
            $output['message'] = "User berhasil dinonaktifkan";
            
        } else {
            
            $output['status'] = false;
            $output['message'] = "Something is wrong";
        }

        $this->response($output);
    }

}
