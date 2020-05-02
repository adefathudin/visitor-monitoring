<?php

class Migration_add_sessions extends MY_Migration {

    protected $_table_name = 'ci_sessions';
    protected $_primary_key = 'id';
    protected $_index_keys = array();
    protected $_fields = array(
        'id'    => array (
            'type'  => 'VARCHAR',
            'constraint' => 40,
            'NULL' => FALSE
        ),
        'ip_address'    => array(
            'type' => 'VARCHAR',
            'constraint' => 45,
            'NULL' => FALSE
        ),
        'timestamp' => array(
            'type'  => 'INT',
            'constraint' => 10,
            'unsigned' => TRUE,
            'default' => 0,
            'NULL' => FALSE
        ),
        'data' => array(
            'type' => 'TEXT',
            'NULL' => FALSE
        )
    );

}
