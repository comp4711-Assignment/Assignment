<?php

class StocksController extends Application {
    
    function __construct()
    {
	parent::__construct();
    }
    
    function display($name = null) {
        $this->data['pagebody'] = 'stock';
        
        $this->display_list();
        
        if($name != null) {
        
            $row = $this->stocks->get($name);

            $this->data['stockname'] = $row->Name;

            $this->data['stockvalue'] = $row->Value;
            
            $this->show_transactions($name);

            $this->show_movements($name);
        } else {
            
            $array = $this->transactions->find_recent();
            
            redirect('stocks/'.$array->Stock);
        }
        
        $this->render();
    }
    
    function display_list(){
        $list = $this->stocks->all();

        $dropdown = '';

        foreach($list as $item) {
            $dropdown .= '<li><a href="'.$item->Code.'">'.$item->Name.'</a></li>';
        }

        $this->data['stocklist'] = $dropdown;
    }
    
    function show_transactions($name) {
        
        $list = $this->transactions->some('stock', $name);
        
        $history = '';
        
        foreach($list as $item) {
            $history .= '<tr><td>'.$item->Player.'</td><td>'.$item->Stock.'</td><td>'.$item->Trans.'</td><td>'.$item->Quantity.'</td></tr>';
        }
        
        $this->data['stockdata'] = $history;
        
    }
    
    function show_movements($name){
        
        $list = $this->movements->some('code', $name);
        
        $movement = '';
        
        foreach($list as $item) {
            $movement .= '<tr><td>'.$item->Action.'</td><td>'.$item->Amount.'</td></tr>';
        }
        
        $this->data['movements'] = $movement;
        
    }
}