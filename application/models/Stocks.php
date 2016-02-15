<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/***
 * base stocks model to get stocks database data
 */
class Stocks extends Base_Model {
    
    /***
     * Base constructor
     */
    function __construct() {
        parent::__construct('stocks', 'code');
    }
    
}

