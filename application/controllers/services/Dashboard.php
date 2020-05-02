<?php

//defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->model(['visitor_history_m', 'visitor_detail_m']);
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
    
    public function total_visitors_get() {

        $output['total_visitor'] = $this->visitor_history_m->get_count();
        $output['total_karyawan'] = $this->visitor_history_m->get_count(['status_profesi' => 'Karyawan']);
        $output['total_kontraktor'] = $this->visitor_history_m->get_count(['status_profesi' => 'Kontraktor']);

        $this->response($output);
    }

    public function list_visitor_by_date_get() {
        
        $draw = $this->get('draw');
        $length = $this->get('length');
        $start = $this->get('start');
        $order = $this->get('order');
        $columns = $this->get('columns');
        $search = $this->get('search') ? $this->get('search') : NULL;

        $order_by = $columns[$order[0]['column']]['data'];
        $order_dir = $order[0]['dir'];

        $totalRecords = $this->visitor_history_m->get_count();
        
        if ($search && $search['value']) {
            $this->db->like('visitor_history.nama_perusahaan', $search['value']);
        }
        
        $totalFiltered = $this->visitor_history_m->get_count();
                
        $output = array(
            "draw" => $draw,
            "recordsTotal" => $totalRecords,
            "recordsFiltered" => $totalFiltered,
            "data" => []
        );

        if ($search && $search['value']) {
            $this->db->like('visitor_history.nama_perusahaan', $search['value']);
        }

        $this->db->order_by($order_by, $order_dir);
        $this->db->offset($start)->limit($length);

        $query_result = $this->visitor_history_m->get_visitor_by_date();
        
        if ($query_result) {
            foreach ($query_result as $item) {
                $output['data'][] = $item;
            }
        }

        $this->response($output);
        
    }
}
