<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * movements model that gets movements based on date time
 */
class BSX extends Base_Model {
    
    /***
     * Base constructor
     */
 
    function __construct() {
        parent::__construct('bsx', 'code');
    }
    
    function getStatus()
    {
        $source = file_get_contents(STATUSDATA_URL);
        file_put_contents(DATAPATH.'status.xml', $source);
    }
    
    function getTransactions()
    {
        $source = file_get_contents(TRANSACTIONSDATA_URL);
        file_put_contents(DATAPATH.'transac.csv', $source);
    }
    
    function getStocks()
    {
        $source = file_get_contents(STOCKDATA_URL);
        file_put_contents(DATAPATH.'stock.csv', $source);
    }
    
    function getMovements()
    {
        $source = file_get_contents(MOVEMENTDATA_URL);
        file_put_contents(DATAPATH.'moves.csv', $source);
    }
    
    function registerServer($items) 
    {
        $contents = file_put_contents(REGISTERDATA_URL,$items);
        print_r($contents);
        return $contents;
    }
    
    function ImportCSV2Array($filename)
        {
            $row = 0;
            $col = 0;
            $results = array();
            
            $handle = @fopen($filename, "r");
            if ($handle) 
            {
                while (($row = fgetcsv($handle, 4096)) !== false) 
                {
                    if (empty($fields)) 
                    {
                        $fields = $row;
                        continue;
                    }

                    foreach ($row as $k=>$value) 
                    {
                        $results[$col][$fields[$k]] = $value;
                    }
                    $col++;
                    unset($row);
                }
                if (!feof($handle)) 
                {
                    echo "Error: unexpected fgets() failn";
                }
                fclose($handle);
            } else {
                echo "NOTHING";
            }

            return $results;
        }

}
