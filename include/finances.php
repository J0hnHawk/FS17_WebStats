<?php
$financeElements = array (
		'newVehiclesCost' => 0,
		'soldVehicles' => 0,
		'newAnimalsCost' => 1,
		'soldAnimals' => 1,
		'constructionCost' => 2,
		'soldBuildings' => 2,
		'fieldPurchase' => 2,
		'vehicleRunningCost' => 3,
		'vehicleLeasingCost' => 3,
		'animalUpkeep' => 1,
		'propertyMaintenance' => 4,
		'propertyIncome' => 4,
		'soldWood' => 6,
		'soldBales' => 6,
		'soldWool' => 1,
		'soldMilk' => 1,
		'purchaseFuel' => 0,
		'purchaseSeeds' => 8,
		'purchaseFertilizer' => 8,
		'purchaseSaplings' => 8,
		'purchaseWater' => 8,
		'harvestIncome' => 6,
		'incomeBga' => 6,
		'missionIncome' => 7,
		'wagePayment' => 5,
		'other' => 8,
		'loanInterest' => 9 

);
$summary = array (
		'VEHICLES_NCS', // 0/ newVehiclesCost, soldVehicles, purchaseFuel
		'LIFESTOCK_NSU', // 1/ newAnimalsCost, soldAnimals, animalUpkeep, soldWool, soldMilk
		'PROPERTY_CSP', // 2/ constructionCost, soldBuildings, fieldPurchase
		'VEHICLES_U', // 3/ vehicleRunningCost, vehicleLeasingCost
		'PROPERTY_MI', // 4/ propertyMaintenance, propertyIncome
		'WAGE_PAYMENT', // 5/ wagePayment
		'HARVEST', // 6/ soldWood, soldBales, harvestIncome, incomeBga
		'MISSION', // 7/ missionIncome
		'OTHER', // 8/ purchaseSeeds, purchaseFertilizer, purchaseSaplings, purchaseWater, other
		'LOANINTEREST' // 9/ loanInterest
);
$weekdays = array (
		'SUNDAY',
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
$financeHistory = $financeSummary = array ();
$operatingResult = 0;

foreach ( $careerEconomy->financeStatsHistory->financeStats as $financeStats ) {
	$day = intval ( $financeStats ['day'] );
	$financeHistory [$mapping [$day]] = array ();
	foreach ( $financeElements as $element => $category ) {
		$value = floatval ( $financeStats->$element );
		if (isset ( $financeSummary [$summary [$category]] )) {
			$financeSummary [$summary [$category]] += $value;
		} else {
			$financeSummary [$summary [$category]] = $value;
		}
		$operatingResult += $value;
		$financeHistory [$mapping [$day]] [$element] = round ( $value, 1, PHP_ROUND_HALF_UP );
	}
	$financeHistory [$mapping [$day]] ['total'] = array_sum ( $financeHistory [$mapping [$day]] );
}
$operatingResult = array_sum ( $financeSummary );
$money = floatval ( $careerSavegame->statistics->money );
$loan = floatval ( $careerSavegame->statistics->loan );
$smarty->assign ( 'money', $money );
$smarty->assign ( 'loan', $loan );
$smarty->assign ( 'financeHistory', $financeHistory );
$smarty->assign ( 'financeElements', $financeElements );
