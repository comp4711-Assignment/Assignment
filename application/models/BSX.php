<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * movements model that gets movements based on date time
 */
class BSX extends Base_Model {
    
    /***
     * Base constructor
     */
    function __construct() {
        parent::__construct('movements', 'datetime');
    }
    
    function getStatus()
    {
        return file_get_contents(STATUSDATA_URL);
    }
}