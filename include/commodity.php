<?php
class commodity {
	var $overall;
	var $farmStorage;
	var $pallets;
	var $bales;
	var $production;
	function farmStorage($value) {
		$this->farmStorage = $value;
		$this->overall += $value;
	}
	function pallets() {
	}
}