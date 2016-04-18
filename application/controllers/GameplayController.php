<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class GameplayController extends Application {
    
    function __construct()
    {
        parent::__construct();
    }
        
    function display() 
    {
        $this->data['pagebody'] = 'gameplay';
        $this->bsx->getStocks();
        $this->bsx->getTransactions();
        $this->bsx->getMovements();
        $name = $this->session->userdata('username');
        $this->PlayerInfo($name);
        $this->show_holdings($name);
        $this->render();
    }
    
    function PlayerInfo($name) 
    {
        $players = $this->players->all();
        if ($name == null) {
            redirect('welcome');
        }
        foreach($players as $player) {
            if ($player->Player == $name) {
                $info = $player;
            }
        }
        $string = '<h1 style="text-align:center;">' . $info->Player . '</h1><h2 style="text-align:center;">Current Cash: ' . $info->Cash . '</h2>';
        $this->data['playerInfo'] = $string;
    }
    
    function show_holdings($name) {

        $filename = DATAPATH."transac.csv";
        $list = $this->bsx->ImportCSV2Array($filename);
        $filename = DATAPATH."stock.csv";
        $stocks = $this->bsx->ImportCSV2Array($filename);
        $playerItem = array();
        foreach ($list as $item) {
            if ($item['player'] == $name) {
                array_push($playerItem, $item);
            }
        }
        
        $holdings = '';
        $array = array();
        $itemsArray = array();
        
        foreach($playerItem as $item) {
            if(!in_array($item['stock'], $array, true)) {
                array_push($array, $item['stock']);
                $items = array(
                    'name' => $item['stock'],
                    'quant' => 0,
                    'value' => 0,
                );
                $quant = 0;
                $value = 0;
                foreach ($stocks as $stock) {
                    if ($stock['code'] == $item['stock']) {
                        $value = $stock['value'];
                        if($item['trans'] == 'BUY') {
                            $quant += $item['quantity'];
                        } else {
                            $quant -= $item['quantity'];
                        }
                    }
                }
                array_push($itemsArray, $items);
                $items['quant'] += $quant;
                $items['value'] = $value;
            } else {
                
            }
        }
        foreach ($itemsArray as $item) {
            $holdings .= '<tr><td>'.$item['stock'].'</td><td>'.$item['quant'].'</td><td>'.$item['value'].'</td><td>'.$item['quant'] * $item['value'].'</td></tr>';
        }

        foreach($stocks as $stock) {
            if (!in_array($stock['code'], $array, true)) {
                $holdings .= '<tr><td>'.$stock['code'].'</td><td>0</td><td>'. $stock['value'] .'</td><td>0</td>';
                $holdings .= '<td><button type="button" onclick=location.href="/gameplay/sell" class="btn btn-default">Sell</button>'
                        . '<button type="button" onclick=location.href="/gameplay/buy" class="btn btn-default">Buy</button></td></tr>';
            }
            
        }
        $this->data['stocks'] = $holdings;
    }
    
    function sell() {
        
        
    }
}
