<?php

/****
 * The main page where the player data is shown and current stock values
 * are shown. They are updated based on values within the database.
 */
class Welcome extends Application {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
    
        /**
         * Base contructor for welcome controller
         */
        function __construct() {
		parent::__construct();
        }
        
        /***
         * Base function that is called when welcome page is generated
         */
	public function index() {
            $this->data['title'] = 'Stock Ticker';
            $this->data['pagebody'] = 'dashboard';
            
            $this->stockPanel();
            $this->playerPanel();
            
            $this->render();
	}
             
        function get_value() {
            if ($this->input->post('username') != '') {
                $username = $this->input->post('username');
                $password = $this->input->post('pass');
                
                $users = $this->players->all();
                foreach($users as $user) {
                    if(($user->Player == $username) && ($user->Password == $password)) {
                        $newdata = array(
                            'username' => $user->Player,
                            'type' => $user->Type
                        );
                        $this->session->set_userdata($newdata);
                        redirect('welcome');   
                    }
                }
            } 
            redirect('stocks');
        }
        
        function login() {
            
            $username = $this->session->flashdata('name');
            $password = $this->session->flashdata('pass');
            
            $users = $this->players->all();
            
            foreach($users as $user) {
                if(($user->Player == $username) && ($user->Password == $password)) {
                    $sess = array(
                        'username' => $user->Player,
                        'type' => $user->Type
                    );
                    $this->session->set_userdata($sess);
                    redirect('welcome');
                }
            }
            redirect('welcome');
        }
        
        function logout() {
            $this->session->unset_userdata('username');
            
            redirect('welcome');
        }
        
        /****
         * generates the player panel an data along with it
         */
        public function playerPanel() {
            $players = $this->players->all(); // all players
            $playerData = ''; // empty string
            

            foreach($players as $player) {
                $equity = $this->calc_equity($player->Player);
                $playerData .= '<tr><td><a href="player/'.$player->Player.'">'.$player->Player.'</td><td>'.$player->Cash.'</td><td>'.$equity.'</td></tr>';
            }
            
            $this->data['playerpanel'] = $playerData;
            
        }
        
        /***
         * calculates the equity of the player
         */
        function calc_equity($player) {
            
            $list = $this->transactions->some('player', $player);

            $array = array();
            $equity = 0;

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
                            if($item2->Player == $player) {
                                if($item2->Trans == 'buy') {
                                    $quant += $item->Quantity;
                                } else {
                                    $quant -= $item->Quantity;
                                }
                            }
                        }
                    }
                    $total = $quant * $value;
                    $equity += $total;
                }
            }
            return $equity; // returns the total equity
        }
        
        /***
         * generates the stock panel with data from database
         */
        public function stockPanel() {
            $stocks = $this->stocks->all();           
            $stockData = '';
            foreach($stocks as $stock) {
                    $stockData .= '<tr><td><a href="stocks/'.$stock->Code.'">'.$stock->Name.'</td><td>'.$stock->Value.'</td></tr>';
            }
           
            $this->data['stockpanel'] = $stockData;    
        }
}
