<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/***
 * transactions model that gets the database data
 */
class Transactions extends Base_Model {
    
    /***
     * Base contructor
     */
    function __construct() {
        parent::__construct('transactions', 'datetime');
    }
    
    /****
     * finds most recent transaction then gets that row
     */
    function find_recent() {
        $this->db->order_by("datetime", "desc");  
        return $this->db->get("transactions")->row();
    }
}