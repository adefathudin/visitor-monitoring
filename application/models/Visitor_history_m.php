<?php

class Visitor_history_m extends MY_Model {

    protected $_table_name = 'visitor_history';
    protected $_primary_key = 'id_history';
    protected $_primary_filter = 'strval';
    protected $_order_by = 'id_history';
    protected $_timestamps = FALSE;
    protected $_timestamps_field = [];
    
    public function get_visitor_by_date(){
    
    $this->db->select('visitor_detail.nik,visitor_detail.nama_lengkap,visitor_detail.nomor_telepon,visitor_history.status_profesi,visitor_history.nama_perusahaan,visitor_history.rfid_visitor_card,visitor_history.tujuan,visitor_history.checkout,visitor_history.jam_in,visitor_history.jam_out');
    $this->db->join('visitor_detail', 'visitor_detail.id_card = visitor_history.rfid_id_card');
        
    return $this->get_by();
    }
    
    public function get_visitor_by_card($card){
    
    $this->db->select('visitor_detail.nik,visitor_detail.nama_lengkap,visitor_detail.nomor_telepon,visitor_history.id_history,visitor_history.status_profesi,visitor_history.nama_perusahaan,visitor_history.rfid_visitor_card,visitor_history.tujuan,visitor_history.checkout,visitor_history.tanggal_in,visitor_history.tanggal_out,visitor_history.jam_in,visitor_history.jam_out');
    $this->db->join('visitor_detail', 'visitor_detail.id_card = visitor_history.rfid_id_card', 'right');
    $this->db->where('visitor_history.checkout', 0);
    $this->db->where('visitor_history.rfid_visitor_card' , $card);
    return $this->get_by();
    }
    
    public function get_count_all_visitor_checkout_0(){
    $this->db->select('count(*) as total_visitor_checkin');
    $this->db->from('visitor_history a');
    $this->db->join('visitor_detail b', 'b.id_card = a.rfid_id_card');
    $this->db->where('b.status_profesi' ,'Karyawan');
    $this->db->where('a.checkout', 0);
    $result = $this->db->get()->row();
    
    return $result;
    }
    
    public function get_count_all_visitor_checkout_1(){
    $this->db->select('count(*) as total_visitor_checkin');
    $this->db->from('visitor_history a');
    $this->db->join('visitor_detail b', 'b.id_card = a.rfid_id_card');
    $this->db->where('b.status_profesi' ,'Karyawan');
    $this->db->where('a.checkout', 1);
    $result = $this->db->get()->result();
    
    return $result;
    }
    
    
}
