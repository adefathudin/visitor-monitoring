<?php

class Migration_add_visitor_card extends MY_Migration {

    protected $_table_name = 'visitor_card';
    protected $_primary_key = 'rfid_card_card';
    protected $_index_keys = array();
    protected $_fields = array(
        
        'rfid_card_card'    => array(
            'type' => 'VARCHAR',
            'constraint' => 16
        ),
        'nomor_visitor_card'    => array(
            'type' => 'INT',
            'constraint' => 7
        ),
        'status'    => array(
            'type' => 'INT',
            'constraint' => 1
        )
    );

}
