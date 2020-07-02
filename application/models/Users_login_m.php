<?php

class Users_login_m extends MY_Model {

    protected $_table_name = 'users_login';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'strval';
    protected $_order_by = 'id';
    protected $_timestamps = FALSE;
    protected $_timestamps_field = [];
   
}
