<?php

class Migration_add_visitor_history extends MY_Migration {

    protected $_table_name = 'visitor_history';
    protected $_primary_key = 'id_history';
    protected $_index_keys = array();
    protected $_fields = array(
        'id_history'    => array (
            'type'  => 'INT',
            'constraint' => 12,
            'NULL' => FALSE,
            'auto_increment' => TRUE
        ),
        'rfid_id_card'    => array(
            'type' => 'VARCHAR',
            'constraint' => 16
        ),
        'rfid_visitor_card'    => array(
            'type' => 'VARCHAR',
            'constraint' => 16
        ),
        'status_profesi'    => array(
            'type' => 'VARCHAR',
            'constraint' => 50
        ),
        'nama_perusahaan'    => array(
            'type' => 'VARCHAR',
            'constraint' => 50
        ),
        'tujuan'    => array(
            'type' => 'VARCHAR',
            'constraint' => 150
        ),
        'checkout'    => array(
            'type' => 'BOOLEAN',
            'default' => 0
        ),
        'tanggal_in'    => array(
            'type' => 'DATE'
        ),
        'tanggal_out'    => array(
            'type' => 'DATE'
        ),
        'jam_in'    => array(
            'type' => 'TIME'
        ),
        'jam_out'    => array(
            'type' => 'TIME'
        ),
    );

}
