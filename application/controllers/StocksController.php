<?php

class StocksController extends Application {
    
    function __construct()
    {
	parent::__construct();
    }
    
    function display($name = null) {
        $this->data['pagebody'] = 'stock';
        $this->data['stockname'] = $name;
        $this->data['stockdata'] = $this->stocks->get($name);
        $this->render();
    }
}