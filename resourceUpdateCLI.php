<?php
require_once('classes/dotaResources.php');

$dotaResources = new dotaResources();

switch($argv[1]){
    case 'update-items':
        $dotaResources->updateItemData();
        break;
    case 'update-abilities':
        $dotaResources->updateAbilityData();
        break;
}

