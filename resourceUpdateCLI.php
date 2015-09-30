<?php
require_once('classes/dotaResources.php');

$dotaResources = new dotaResources();

if(!isset($argv[1])){
    echo "Options:\r\n-update-items\t\t : Update Local Dota 2 Items Data\r\n-update-abilities\t : Update Local Dota 2 Abilities Data\r\n-update-heroes\t\t : Update Local Dota 2 Heroes Data\r\n-update-all\t\t : Update All Local Dota 2 Data\r\n";
    die();
}

switch($argv[1]){
    case '-update-items':
        $dotaResources->updateItemData();
        break;
    case '-update-abilities':
        $dotaResources->updateAbilityData();
        break;
    case '-update-heroes':
        $dotaResources->updateHeroesData();
        break;
    case '-update-all':
        $dotaResources->updateItemData();
        $dotaResources->updateAbilityData();
        $dotaResources->updateHeroesData();
        break;
}

