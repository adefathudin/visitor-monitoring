<?php

class Migration_add_visitor_detail extends MY_Migration {

    protected $_table_name = 'visitor_detail';
    protected $_primary_key = 'id';
    protected $_index_keys = array();
    protected $_fields = array(
        'id'    => array (
            'type'  => 'INT',
            'constraint' => 12,
            'NULL' => FALSE,
            'auto_increment' => TRUE
        ),
        'id_card'    => array(
            'type' => 'VARCHAR',
            'constraint' => 16
        ),
        'nik'    => array(
            'type' => 'VARCHAR',
            'constraint' => 16
        ),
        'nama_lengkap'    => array(
            'type' => 'VARCHAR',
            'constraint' => 50
        ),
        'status_profesi'    => array(
            'type' => 'VARCHAR',
            'constraint' => 50
        ),
        'nama_perusahaan'    => array(
            'type' => 'VARCHAR',
            'constraint' => 50
        ),
        'nomor_telepon'    => array(
            'type' => 'VARCHAR',
            'constraint' => 12
        ),
        'blokir'    => array(
            'type' => 'BOOLEAN',
            'default'   => 0
        )
    );

}
