<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Transactions extends Base_Model {
    
    function __construct() {
        parent::__construct('transactions', 'datetime');
    }
    
    function find_recent() {
        $this->db->order_by("datetime", "desc");  
        return $this->db->get("transactions")->row();
    }
}