<?php
$animalPlants = array (
		"Animals_sheep",
		"Animals_pig",
		"Animals_cow" 
);
foreach ( $animalPlants as $key => $plant ) {
	$animalPlants [$key] = translate ( $plant );
}
$smarty->assign ( 'animalPlants', $animalPlants );
$smarty->assign ( 'plants', $plants );
