<?php

/************
 * The agent controller that holds the functions to create the agent
 * view class.
 ******/
class AgentController extends Application {
    
    /****
     * Constructs the playercontroller.
     */

        var $equity = 0;

        function __construct()
        {
                parent::__construct();
        }

        function registerToServer() 
        {
            //$this
        }



       function registerAgent($teamId, $teamName, $password) {
        $params = array(
            'team' => $teamId,
            'name' => $teamName,
            'password' => $password,
        );
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, REGISTERAGENT_URL);     
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_POSTFIELDS, $params);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        $xml_resp = new SimpleXMLElement($response);
        curl_close($curl);
        //$this->session->set_userdata('token', $xml_resp->token->__toString());
        //$this->session->set_userdata('lastRegistered', time());
    }
}

