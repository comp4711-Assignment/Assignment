<?php

class StocksController extends Application {
    
    function __construct()
    {
	parent::__construct();
    }
    
    function display($name = null) {
        $this->data['pagebody'] = 'stock';
        $this->data['stockname'] = $name;
        $row = $this->stocks->get($name);
        
        $list = $this->stocks->all();
        
        $dropdown = '';
               
        foreach($list as $item) {
            $dropdown .= '<li><a href="'.$item->Code.'">'.$item->Name.'</a></li>';
        }
        
        $this->data['stocklist'] = $dropdown;
        
        $this->data['stockdata'] = $row->Name;
        
        $this->render();
    }
}