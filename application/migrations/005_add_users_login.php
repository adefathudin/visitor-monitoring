<?php

class Migration_add_users_login extends MY_Migration {

    protected $_table_name = 'users_login';
    protected $_primary_key = 'id';
    protected $_index_keys = array();
    protected $_fields = array(
        
        'id'    => array (
            'type'  => 'INT',
            'constraint' => 12,
            'NULL' => FALSE,
            'auto_increment' => TRUE
        ),
        'nik'    => array(
            'type' => 'VARCHAR',
            'constraint' => 16
        ),
        'rfid_id_card'    => array(
            'type' => 'VARCHAR',
            'constraint' => 16
        ),
        'nama_lengkap'    => array(
            'type' => 'VARCHAR',
            'constraint' => 50
        ),
        'jabatan'    => array(
            'type' => 'VARCHAR',
            'constraint' => 30
        ),
        'password'    => array(
            'type' => 'VARCHAR',
            'constraint' => 32
        ),
        'active'    => array(
            'type' => 'INT',
            'constraint' => 1
        )
    );
    
    
    function up(){
        parent::up();
        
        $insert = array(
            array(
                'nik' => '112233',
                'rfid_id_card'     => '123456',
                'nama_lengkap' => 'Web Admin',
                'jabatan' => 'Administrator',
                'password'    => md5('123'),
                'active' => 1
            )
        );
        
        $this->_seed($insert);
    }

}
