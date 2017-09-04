<div class="page-header">
	<h3>
		{$l_object} - Detailansicht<small> (Speicherstand: Tag {$currentDay}: {$dayTime})</small>
		<!--
 		<div class="dropdown pull-right">
			<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
				Auswahl <span class="caret"></span>
			</button>
			<ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
				{foreach $commodities as $commodity => $commodityData}
				<li><a href="index.php?page=commodity&object={$commodityData.i3dName}">{$commodity}</a></li> {/foreach}
			</ul>
		</div>
 -->
	</h3>
</div>
<div class="row">
	<div class="col-sm-6">
		<h4>Lagerbestände</h4>
		<table class="table" style="margin-bottom: 0px;">
			<thead>
				<tr>
					<th>{if !$combineCommodities}Lagerort{else}Waren/Güter{/if}</th>
					<th class="text-right">Menge</th>
				</tr>
			</thead>
			{if !$combineCommodities} {foreach $commodities.$l_object.locations as $locationName => $location} {$addInfo=false} {if
			isset($location.FillablePallet)} {if $location.FillablePallet==1} {$addInfo="1 Palette"} {else} {$addInfo="{$location.FillablePallet} Paletten"}
			{/if} {/if} {if isset($location.Bale)} {$addInfo="{$location.Bale} Ballen"} {/if}
			<tr>
				<td>{$locationName}{if $addInfo} ({$addInfo}){/if}</td>
				<td class="text-right">{$location.fillLevel|number_format:0:":":"."}</td>
			</tr>
			{/foreach} {else} {foreach $combineCommodities as $fillType}
			<tr>
				<td><a href="index.php?page=commodity&object={$commodities.$fillType.i3dName}">{$fillType}</a></td>
				<td class="text-right">{$commodities.$fillType.overall|number_format:0:":":"."}</td>
			</tr>
			{/foreach} {/if}
			</tbody>
			<tfoot>
				<tr>
					<th>Gesamter Lagerbestand</th>
					<th class="text-right">{$commodities.$l_object.overall|number_format:0:":":"."}</th>
				</tr>
			</tfoot>
		</table>
		{if $demandSum > 0}
		<hr>
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
				<td class="text-right">{$demandValue|number_format:0:":":"."}</td>
			</tr>
			{/foreach}
			</tbody>
			<tfoot>
				<tr>
					<th>Gesamter Bedarf</th>
					<th class="text-right">{$demandSum|number_format:0:":":"."}</th>
				</tr>
			</tfoot>
		</table>
		{/if}
	</div>
	<div class="col-sm-6">
		<h4>Positionen von Paletten/Ballen</h4>
		<div id="mapContainer" class="img-responsive" style="position: relative;">
			<img src="{$linkToImage}" height="512" width="512"> {$image = '<img style="position: absolute; left: %dpx; top: %dpx;" src="./images/%s" width="%d"
			height="%d" data-toggle="tooltip" data-placement="top" title="%s">'} {foreach $mapEntries as $key => $mapEntry}
			{$image|printf:$mapEntry.xpos:$mapEntry.zpos:$mapEntry.icon:$machineIconSize:$machineIconSize:$mapEntry.name} {/foreach}
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-12"></div>
</div>