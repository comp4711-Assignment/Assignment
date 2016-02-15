<?php

/****
 * The player controller that holds the functions to create the player
 * view class.
 */
class StocksController extends Application {
    
    /**
     * Constructor for stock controller
     */
    function __construct()
    {
	parent::__construct();
    }
    
    /***
     * display information of the current stock and if no stock
     * specified then it grabs the stock that was last transacted with
     */
    function display($name = null) {
        $this->data['pagebody'] = 'stock'; // sets page to stock view
        
        $this->display_list(); // displays dropdown list
        
        if($name != null) {
        
            $row = $this->stocks->get($name); // gets stock info

            $this->data['stockname'] = $row->Name; // sets stock name

            $this->data['stockvalue'] = $row->Value; // sets stock value
            
            $this->show_transactions($name);

            $this->show_movements($name);
            
        } else {
            
            $array = $this->transactions->find_recent();
            
            redirect('stocks/'.$array->Stock); // redirects to last transacted item
        }
        
        $this->render();
    }
    
    /******
     * Displays the list based on all the stocks available
     */
    function display_list(){
        $list = $this->stocks->all();

        $dropdown = '';

        foreach($list as $item) {
            $dropdown .= '<li><a href="'.$item->Code.'">'.$item->Name.'</a></li>';
        }

        $this->data['stocklist'] = $dropdown;
    }
    
    /***
     * Shows transactions based on the transaction history in the database
     */
    function show_transactions($name) {
        
        $list = $this->transactions->some('stock', $name);
        
        $history = '';
        
        foreach($list as $item) {
            $history .= '<tr><td>'.$item->Player.'</td><td>'.$item->Stock.'</td><td>'.$item->Trans.'</td><td>'.$item->Quantity.'</td></tr>';
        }
        
        $this->data['stockdata'] = $history;
        
    }
    
    /***
     * Shows the movements based on database data
     */
    function show_movements($name){
        
        $list = $this->movements->some('code', $name);
        
        $movement = '';
        
        foreach($list as $item) {
            $movement .= '<tr><td>'.$item->Action.'</td><td>'.$item->Amount.'</td></tr>';
        }
        
        $this->data['movements'] = $movement;
        
    }
}