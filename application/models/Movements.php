<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Movements extends Base_Model {
    
    function __construct() {
        parent::__construct('movements', 'datetime');
    }
    
}

