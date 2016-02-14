<?php

class StocksController extends Application {
    
    function __construct()
    {
	parent::__construct();
    }
    
    function display($name = null) {
        $this->data['pagebody'] = 'stock';
        
        if($name != null) {
        
            $row = $this->stocks->get($name);

            $this->data['stockname'] = $row->Name;

            $list = $this->stocks->all();

            $dropdown = '';

            foreach($list as $item) {
                $dropdown .= '<li><a href="'.$item->Code.'">'.$item->Name.'</a></li>';
            }

            $this->data['stocklist'] = $dropdown;

            $this->data['stockdata'] = $row->Value;

        }
        
        $this->render();
    }
}