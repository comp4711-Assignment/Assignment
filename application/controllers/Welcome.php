<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

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
    
        function __construct() {
		parent::__construct();
        }
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
                $newdata = array(
                'username' => $username
                );
                $this->session->set_userdata($newdata);
            redirect('welcome');   
            } 
            redirect('stocks');
        }
        
        function logout() {
            $this->session->unset_userdata('username');
            
            redirect('welcome');
        }
        
        public function playerPanel() {
            $players = $this->players->all();
            $playerData = '';
            

            foreach($players as $player) {
                $equity = $this->calc_equity($player->Player);
                $playerData .= '<tr><td><a href="player/'.$player->Player.'">'.$player->Player.'</td><td>'.$player->Cash.'</td><td>'.$equity.'</td></tr>';
            }
            
            $this->data['playerpanel'] = $playerData;
            
        }
        
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
            return $equity;
        }
        
        public function stockPanel() {
            $stocks = $this->stocks->all();           
            $stockData = '';
            foreach($stocks as $stock) {
                    $stockData .= '<tr><td><a href="stocks/'.$stock->Code.'">'.$stock->Name.'</td><td>'.$stock->Value.'</td></tr>';
            }
           
            $this->data['stockpanel'] = $stockData;    
        }
}
