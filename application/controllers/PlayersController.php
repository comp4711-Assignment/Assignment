<?php

/************
 * The player controller that holds the functions to create the player
 * view class.
 ******/
class PlayersController extends Application {
    
    /****
     * Constructs the playercontroller.
     */
        var $equity = 0;
        
        function __construct()
	{
		parent::__construct();
        }

    /***
     * Displays the data for the appropriate player when selected upon.
     */
    function display($name = null) {
        $this->data['pagebody'] = 'portfolio'; // portfolio view

        if($name != null) {
            $row = $this->players->get($name); // gets the player data

            $this->data['playername'] = $row->Player; // gets player name

            $list = $this->players->all(); // gets all players

            $this->data['playerlist'] = $this->list_dropdown($list); // generates dropdown box

            $this->data['playercash'] = $row->Cash; // displays current cash for player

            $this->show_activity($name); // calls show activity function for player
                
            $this->show_transactions($name);
                
            $this->show_holdings($name);
                
            $this->data['playerequity'] = $this->equity + $row->Cash;
        }

        $this->render(); // render
    }

    /****
     * creates dropdown list for players.
     */
    function list_dropdown($list) {
        $dropdown = '';
        foreach($list as $item) {
            $dropdown .= '<li><a href="'.$item->Player.'">'.$item->Player.'</a></li>';
        }
        return $dropdown;
    }

    /****
     * Shows the activity the player has been having
     * and there current holdings for the data.
     */
    function show_activity($name) {

        $list = $this->transactions->some('player', $name);

        $holdings = '';

        $array = array();

        foreach($list as $item) {
            if(!in_array($item->Stock, $array, true)) { // if item already accounted skip
                array_push($array, $item->Stock); // push to new array
                $list3 = $this->stocks->some('code', $item->Stock); // gets stock info
                $value = 0; //sets value of item to 0
                $quant = 0; // quantity of item
                foreach($list3 as $item3) {
                    $value = $item3->Value; // sets value of item

                    $list2 = $this->transactions->some('stock', $item->Stock); // gets transaction of item

                    foreach($list2 as $item2) {
                        if($item2->Player == $name) {  // checks for player name
                            if($item2->Trans == 'buy') {
                                $quant += $item->Quantity; // increases quantity
                            } else {
                                $quant -= $item->Quantity; // decreases quantity
                            }
                        }
                    }
                }
                    
                $total = $quant * $value; // gets total
                $holdings .= '<tr><td>'.$item->Stock.'</td><td>'.$quant.'</td><td>'.$value.'</td><td>'.$total.'</td></tr>'; // prints holding
            }
        }
        
        $this->data['playerdata'] = $holdings; // sets all data for holding
        
    }
        
    /***
     * Shows transaction history
     */
    function show_transactions($name) {

        $list = $this->transactions->some('player', $name);

        $history = '';

        foreach($list as $item) {
            $history .= '<tr><td>'.$item->DateTime.'</td><td>'.$item->Stock.'</td><td>'.$item->Trans.'</td><td>'.$item->Quantity.'</td></tr>';
        }

        $this->data['playeract'] = $history;

    }
        
    /***
     * Shows current holding of the player.
     */
    function show_holdings($name) {

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
                $this->equity += $total; // adds to equity total
                $holdings .= '<tr><td>'.$item->Stock.'</td><td>'.$quant.'</td><td>'.$value.'</td><td>'.$total.'</td></tr>';
            }
        }
    }
}
