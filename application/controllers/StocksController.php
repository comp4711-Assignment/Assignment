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
        $this->bsx->getStocks();
        $this->bsx->getMovements();
        $this->display_list(); // displays dropdown list
        $stock = array();
        
        $filename = DATAPATH."stock.csv";
        $list = $this->bsx->ImportCSV2Array($filename);
        $lastElement = end($list);
        foreach ($list as $item) {
            if ($item['code'] == $name) {
                $name = $item['code'];
                break;
            } else if ($item == $lastElement) {
                $name = null;
            }

        }

        
        if($name != null) {
            
            foreach ($list as $item) {
                if ($item['code'] == $name) {
                    $stock = $item;
                    break;
                }
            }
            $this->data['stockname'] = $stock['name']; // sets stock name
            $this->data['stockvalue'] = $stock['value']; // sets stock value
            
            //$this->show_transactions($name);

            $this->show_movements($name);
            
            
        } else {
            
            $filename = DATAPATH."moves.csv";
            $list = $this->bsx->ImportCSV2Array($filename);
            $array = end($list);
            print_r($array);
            
            redirect('stocks/'.$array['code']); // redirects to last transacted item
        }
        $this->render();
    }
    
    /******
     * Displays the list based on all the stocks available
     */
    function display_list(){
        
        $filename = DATAPATH."stock.csv";
        $list = $this->bsx->ImportCSV2Array($filename);
        $dropdown = '';

        foreach($list as $item) {
            $dropdown .= '<li><a href="'.$item['code'].'">'.$item['name'].'</a></li>';
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
        $filename = DATAPATH."moves.csv";
        $list = $this->bsx->ImportCSV2Array($filename);
        
        $movement = '';
        
        foreach($list as $item) {
            if ($item['code'] == $name) {
                $movement .= '<tr><td>'.$item['seq']. '</td><td>'.$item['action'].'</td><td>'.$item['amount'].'</td></tr>';
            }
        }
        $this->data['movements'] = $movement;
        
    }
}