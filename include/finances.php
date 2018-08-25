<?php
$financeElements = array (
		'newVehiclesCost' => array (
				- 1,
				1 
		),
		'soldVehicles' => array (
				1,
				9 
		),
		'newAnimalsCost' => array (
				- 1,
				2 
		),
		'soldAnimals' => array (
				1,
				9 
		),
		'constructionCost' => array (
				- 1,
				3 
		),
		'soldBuildings' => array (
				1,
				9 
		),
		'fieldPurchase' => array (
				- 1,
				3 
		),
		'vehicleRunningCost' => array (
				- 1,
				4 
		),
		'vehicleLeasingCost' => array (
				- 1,
				4 
		),
		'animalUpkeep' => array (
				- 1,
				2 
		),
		'propertyMaintenance' => array (
				- 1,
				5 
		),
		'propertyIncome' => array (
				1,
				9 
		),
		'soldWood' => array (
				1,
				9 
		),
		'soldBales' => array (
				1,
				9 
		),
		'soldWool' => array (
				1,
				9 
		),
		'soldMilk' => array (
				1,
				9 
		),
		'purchaseFuel' => array (
				- 1,
				4 
		),
		'purchaseSeeds' => array (
				- 1,
				9 
		),
		'purchaseFertilizer' => array (
				- 1,
				9 
		),
		'purchaseSaplings' => array (
				- 1,
				9 
		),
		'purchaseWater' => array (
				- 1,
				9 
		),
		'harvestIncome' => array (
				1,
				7 
		),
		'incomeBga' => array (
				1,
				7 
		),
		'missionIncome' => array (
				1,
				8 
		),
		'wagePayment' => array (
				- 1,
				6 
		),
		'other' => array (
				- 1,
				9 
		),
		'loanInterest' => array (
				- 1,
				10 
		) 
);
$financeHistory = array ();
$weekdays = array (
		'',
		'MONDAY',
		'TUESDAY',
		'WEDNESDAY',
		'THURSDAY',
		'FRIDAY',
		'SATURDAY',
		'SUNDAY' 
);
$smarty->assign ( 'weekdays', $weekdays );
$mapping = array (
		0,
		4,
		3,
		2,
		1 
);
foreach ( $careerEconomy->financeStatsHistory->financeStats as $financeStats ) {
	$day = intval ( $financeStats ['day'] );
	$financeHistory [$mapping [$day]] = array ();
	foreach ( $financeElements as $element => $category ) {
		$value = floatval ( $financeStats->$element );
		$financeHistory [$mapping [$day]] [$element] = round ( $value, 1, PHP_ROUND_HALF_UP );
	}
	$financeHistory [$mapping [$day]] ['total'] = array_sum ( $financeHistory [$mapping [$day]] );
}
$money = floatval ( $careerSavegame->statistics->money );
$loan = floatval ( $careerSavegame->statistics->loan );
$smarty->assign ( 'money', $money );
$smarty->assign ( 'loan', $loan );
$smarty->assign ( 'financeHistory', $financeHistory );
$smarty->assign ( 'financeElements', $financeElements );
