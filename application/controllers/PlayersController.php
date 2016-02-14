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

                $dropdown = '';

                foreach($list as $item) {
                    $dropdown .= '<li><a href="'.$item->Player.'">'.$item->Player.'</a></li>';
                }

                $this->data['playerlist'] = $dropdown;

                $this->data['playerdata'] = $row->Cash;
            }
            
            $this->render();
        }
}