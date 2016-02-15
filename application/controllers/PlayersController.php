<?php

class PlayersController extends Application {
    
    
        function __construct()
	{
		parent::__construct();
        }
        
        function display($name = null) {
            $this->data['pagebody'] = 'portfolio';
            
            if($name != null) {
                $row = $this->players->get($name);

                $this->data['playername'] = $row->Player;

                $list = $this->players->all();

                $this->data['playerlist'] = $this->list_dropdown($list);

                $this->data['playercash'] = $row->Cash;
                
                $this->show_activity($name);
            }
            
            $this->render();
        }
        
        function list_dropdown($list) {
            $dropdown = '';
            foreach($list as $item) {
                $dropdown .= '<li><a href="'.$item->Player.'">'.$item->Player.'</a></li>';
            }
            return $dropdown;
        }
        
        function show_activity($name) {

            $list = $this->transactions->some('player', $name);

            $holdings = '';
            
            $array = array();

            foreach($list as $item) {
                if(!in_array($item->Stock, $array, true)) {
                    array_push($array, $item->Stock);
                    $list3 = $this->stocks->some('code', $item->Stock);
                    $value = 0;
                    $quant = 0;
                    foreach($list3 as $item3) {
                        $value = $item3->Value;

                        $list2 = $this->transactions->some('stock', $item->Stock);

                        foreach($list2 as $item2) {
                            if($item2->Player == $name) {
                                if($item2->Trans == 'buy') {
                                    $quant += $item->Quantity;
                                } else {
                                    $quant -= $item->Quantity;
                                }
                            }
                        }
                    }

                    $total = $quant * $value;
                    $holdings .= '<tr><td>'.$item->Stock.'</td><td>'.$quant.'</td><td>'.$value.'</td><td>'.$total.'</td></tr>';
                }
            }

            $this->data['playerdata'] = $holdings;

        }
}