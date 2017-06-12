<div class="page-header">
	<h3>
		Detailansicht: {$object} <small> (Speicherstand: Tag {$currentDay}, {$dayTime})</small>
	</h3>
</div>
<div class="row">
	<div class="col-sm-8">Lagerbestand</div>
	<div class="col-sm-4">		<div id="mapContainer" style="position: relative; width: 1024px; height: 1024px; overflow: auto">
			<img src="{$linkToImage}">
			<div id="mapElementsContainer">
				{foreach $mapEntries as $key => $mapEntry}
				<div id="vehicle{$key}Container" style="position: absolute; left: {$mapEntry.xpos}px; top: {$mapEntry.zpos}px;" onmouseout="document.getElementById('vehicle{$key}').style.display='none'; document.getElementById('vehicle{$key}Image').src='./images/{$mapEntry.icon}'; document.getElementById('vehicle{$key}Container').style.zIndex=1;"
					onmouseover="document.getElementById('vehicle{$key}').style.display='block'; document.getElementById('vehicle{$key}Image').src='./images/{$mapEntry.iconHover}'; document.getElementById('vehicle{$key}Container').style.zIndex=10; ">
					<img id="vehicle{$key}Image" src="./images/{$mapEntry.icon}" width="{$machineIconSize}" height="{$machineIconSize}">
					<div id="vehicle{$key}" style="display: none; position: absolute; bottom: 0px; left: 11px; background: {$backgroundColor}; padding-left: 8px; padding-right: 8px; color: #ffffff;">
						<nobr>{$mapEntry.name}</nobr>
					</div>
				</div>
				{/foreach}
			</div>
		</div>		
</div>
</div>