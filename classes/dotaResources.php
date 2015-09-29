<?php

class dotaResources {
    public function __construct(){
        // Create Item Data JSON File
        if(!file_exists('data/itemdata.json')){
            $fp = fopen('data/itemdata.json', 'w');
            fwrite($fp, '[]');
            fclose($fp);
        }
        
        // Create Avility Data JSON File
        if(!file_exists('data/abilitydata.json')){
            $fp = fopen('data/abilitydata.json', 'w');
            fwrite($fp, '[]');
            fclose($fp);
        }
    }
    
    public function updateItemData(){
        set_time_limit(0);
        
        echo ".:: ITEMS ::.\r\n";
        echo "Checking for updates...\r\n";
        // Get Online Item Data
        $json_data = file_get_contents('http://www.dota2.com/jsfeed/itemdata');
        // Get Local Item data
        $current_data = file_get_contents('data/itemdata.json');
        
        // Check id there are any changes changes
        if($json_data != $current_data){
            echo "Changes Detected. Updating Local Data...\r\n";
            
            // Create Updated Local Item Data file
            $fp = fopen('data/itemdata.json', 'w');
            fwrite($fp, $json_data);
            fclose($fp);

            // Extract Item Data
            $data = json_decode($json_data, true)['itemdata'];

            // Save Item Images
            foreach($data as $record){
                $itemImg = 'http://media.steampowered.com/apps/dota2/images/items/' . $record['img'];
                $saveImg = 'images/items/' . $record['img'];
                copy($itemImg, $saveImg);
            }
            
            echo "Local Data successfully updated!\r\n";
        }
        else{
            echo "Item Data is already up to date!\r\n";
        }
    }
    
    public function updateAbilityData(){
        set_time_limit(0);
        
        echo ".:: ABILITIES ::.\r\n";
        echo "Checking for updates...\r\n";
        // Get Online Item Data
        $json_data = file_get_contents('http://www.dota2.com/jsfeed/abilitydata');
        // Get Local Item data
        $current_data = file_get_contents('data/abilitydata.json');
        
        // Check id there are any changes changes
        if($json_data != $current_data){
            echo "Changes Detected. Updating Local Data...\r\n";
            
            // Create Updated Local Item Data file
            $fp = fopen('data/abilitydata.json', 'w');
            fwrite($fp, $json_data);
            fclose($fp);

            // Extract Item Data
            $data = json_decode($json_data, true)['abilitydata'];
            echo "<pre>" . print_r($data, 1) . "</pre>";
            die();

            // Save Images
            foreach($data as $skillname => $record){
                $itemImg = 'http://media.steampowered.com/apps/dota2/images/abilities/' . $skillname . '_hp1.png?v=' . time();
                $saveImg = 'images/items/' . $skillname;
                copy($itemImg, $saveImg);
            }
            
            echo "Local Data successfully updated!\r\n";
        }
        else{
            echo "Item Data is already up to date!\r\n";
        }
    }
}
