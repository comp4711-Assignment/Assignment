<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/***
 * Base players model to get players data based on players names
 */
class Players extends Base_Model {
    
    /***
     * base constructor
     */
    function __construct() {
        parent::__construct('players', 'player');
    }
    
}

