# Support of placeable mods in FS17 WebStats

You can create own configuration files for placeable mods. Just store them in the folder placeables as xml file. 

Here are 3 examples for placeable mods:

<?xml version="1.0" encoding="utf-8"?>
<placeable>
	<MOD Name="FS17_HayLoftplaceable" Version="" Author="" Link=""></MOD>
	<item className="HayLoftPlaceable" locationType="storage"/>
	<l10n>
		<text name="HayLoftPlaceable">
			<en>Root fruit storage (placeable)</en>
			<de>Wurzelfruchtlager (platzierbar)</de>
		</text>
	</l10n>
</placeable>

<?xml version="1.0" encoding="utf-8"?>
<placeable>
	<MOD Name="FS17_FabrikScript_Saat_Prod" Version="" Author="" Link=""></MOD>
	<item className="FabrikScript_Saat_Prod" locationType="FabrikScript" ProdPerHour="10000" showInProduction="true">
		<input Name="grain" capacity="100000" factor="1" fillTypes="wheat maize barley rape" showInStorage="false" />
		<input Name="fertilizer" capacity="100000" factor="0.3" fillTypes="fertilizer" showInStorage="false" />
		<output Name="seeds" capacity="100000" factor="1" fillTypes="seeds" showInStorage="true" />
	</item>
	<l10n>
		<text name="FabrikScript_Saat_Prod">
			<en>Seed production</en>
			<de>Saatgutproduktion</de>
		</text>
		<text name="grain">
			<en>Grain</en>
			<de>Getreide</de>
		</text>
	</l10n>
</placeable>

<?xml version="1.0" encoding="utf-8"?>
<placeable>
	<MOD Name="FS17_FabrikScript_Paletten_Fabrik" Version="" Author="" Link=""></MOD>
	<item className="FabrikScript_Paletten_Fabrik" locationType="FabrikScript" ProdPerHour="25000" showInProduction="true">
		<input Name="boardwood" capacity="352000" factor="0.5" fillTypes="boardwood" showInStorage="false" />
		<output Name="woodChips" capacity="150000" factor="0.25" fillType="woodChips" showInStorage="true" />
		<output Name="emptypallet" capacity="5000" factor="1" fillType="emptypallet" palettArea="866.4 618.5 882.6 624.7" palettPlaces="22" showInStorage="false" />
	</item>
	<l10n>
		<text name="FabrikScript_Paletten_Fabrik">
			<en>Pallet factory</en>
			<de>Palettenwerk</de>
		</text>
		<text name="boardwood">
			<en>Boardwood</en>
			<de>Bretterholz</de>
		</text>
		<text name="emptypallet">
			<en>Empty pallet</en>
			<de>Leere Paletten</de>
		</text>
		<text name="palletPallet">
			<en>Empty pallet</en>
			<de>Leere Paletten</de>
		</text>
	</l10n>
</placeable>