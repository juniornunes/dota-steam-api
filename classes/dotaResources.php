<?php

class dotaResources {
    public function updateItemData(){
        set_time_limit(0);
        
        echo 'Checking for updates...\r\n';
        // Get Online Item Data
        $json_data = file_get_contents('http://www.dota2.com/jsfeed/itemdata');
        // Get Local Item data
        $current_data = file_get_contents('data/itemdata.json');
        
        // Check id there are any changes changes
        if($json_data != $current_data){
            echo 'Changes Detected. Updating Local Data...\r\n';
            
            // Create Updated Local Item Data file
            $fp = fopen('data/itemdata.json', 'w');
            fwrite($fp, $json_data);
            fclose($fp);

            // Extract Item Data
            $itemData = json_decode($json_data, true)['itemdata'];

            // Save Item Images
            foreach($itemData as $item){
                $itemImg = file_get_contents('http://media.steampowered.com/apps/dota2/images/items/' . $item['img']);
                $saveImg = '/images/items/' . $item['img'];
                file_put_contents($saveImg, $itemImg);
            }
            
            echo 'Local Data successfully updated!\r\n';
        }
        else{
            echo 'Item Data is already up to date!\r\n';
        }
    }
}
