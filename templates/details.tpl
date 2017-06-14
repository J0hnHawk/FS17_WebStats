<div class="page-header">
	<h3>
		{$l_object} - Detailansicht<small> (Speicherstand: Tag {$currentDay}, {$dayTime})</small>
	</h3>
</div>
<div class="row">
	<div class="col-sm-6"><h4>Lagerbestände</h4>
		<table class="table" style="margin-bottom: 0px;">
		
			<thead>
				<tr>
					<th>Lagerort</th>
					<th class="text-right">Menge</th>
				</tr>
			</thead>
			{foreach $commodities.$l_object.locations as $locationName => $location} {$addInfo=false} {if isset($location.FillablePallet)}{if
			$location.FillablePallet==1}{$addInfo="1 Palette"}{else}{$addInfo="{$location.FillablePallet} Paletten"}{/if}{/if} {if
			isset($location.Bale)}{$addInfo="{$location.Bale} Ballen"}{/if}
			<tr>
				<td>{$locationName}{if $addInfo} ({$addInfo}){/if}</td>
				<td class="text-right">{$location.fillLevel|number_format:0:",":"."}</td>
			</tr>
			{/foreach}
			</tbody>
			<tfoot><tr><th>Gesamter Lagerbestand</th><th class="text-right">{$commodities.$l_object.overall|number_format:0:",":"."}</th></tr></tfoot>
		</table>
		{if $demandSum > 0}<hr>
		<h4>{$l_object}bedarf</h4>
		<table class="table" style="margin-bottom: 0px;">		
			<thead>
				<tr>
					<th>Produktionsanlage</th>
					<th class="text-right">Menge</th>
				</tr>
			</thead>
			{foreach $demand as $plant=>$demandValue}
			<tr>
				<td>{$plant}</td>
				<td class="text-right">{$demandValue|number_format:0:",":"."}</td>
			</tr>
			{/foreach}
			</tbody>
			<tfoot><tr><th>Gesamter Bedarf</th><th class="text-right">{$demandSum|number_format:0:",":"."}</th></tr></tfoot>
		</table>
		{/if}
	</div>
	<div class="col-sm-6">
	<h4>Positionen von Paletten/Ballen</h4>
		<div id="mapContainer" class="img-responsive" style="position: relative;">
			<img src="{$linkToImage}">
				{foreach $mapEntries as $key => $mapEntry}
					<img style="position: absolute; left: {$mapEntry.xpos}px; top: {$mapEntry.zpos}px;" src="./images/{$mapEntry.icon}" width="{$machineIconSize}" height="{$machineIconSize}">
				{/foreach}
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
	</div>
</div>