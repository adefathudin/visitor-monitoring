<?php

class Visitor_card_m extends MY_Model {

    protected $_table_name = 'visitor_card';
    protected $_primary_key = 'rfid_visitor_card';
    protected $_primary_filter = 'strval';
    protected $_order_by = 'rfid_visitor_card';
    protected $_timestamps = FALSE;
    protected $_timestamps_field = [];
   
}
