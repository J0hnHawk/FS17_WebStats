<div class="page-header">
	<h3>
		{if $objectFound}{$l_object} - {/if}##DETAILVIEW##<small>
			(##SAVETIME##: ##DAY## {$currentDay}: {$dayTime})</small><small
			class="pull-right"><button type="button" class="btn btn-primary"
				data-toggle="modal" data-target="#modalMenu">##CHOOSE_COMMODITY##</button>
		</small>
	</h3>
</div>
<div class="row">
	{if !$objectFound}
	<div class="col-sm-6">
		<div class="alert alert-danger" role="alert">
			<strong>##ERROR##</strong> ##NOT_FOUND##
		</div>
	</div>
	{else}
	<div class="col-sm-6">
		<h4>##STOCKS##</h4>
		<table class="table table-striped" style="margin-bottom: 0px;">
			<thead>
				<tr>
					<th>{if !$combineCommodities}##PLACE##{else}##COMMODITY##{/if}</th>
					<th class="text-right">##AMOUNT##</th>
				</tr>
			</thead>
			{if !$combineCommodities} {foreach $commodities.$l_object.locations
			as $locationName => $location} {$addInfo=false} {if
			isset($location.FillablePallet)} {if $location.FillablePallet==1}
			{$addInfo="1 ##PALLET##"} {else}
			{$addInfo="{$location.FillablePallet} ##PALETTES##"} {/if} {/if} {if
			isset($location.Bale)} {if $location.Bale==1} {$addInfo="1 ##BALE##"}
			{else} {$addInfo="{$location.Bale} ##BALES##"} {/if} {/if}
			<tr>
				<td>{if isset($plants.$locationName)}<a
					href="index.php?page=factories&object={$plants.$locationName.i3dName}">{/if}{$locationName}{if
						isset($plants.$locationName)}</a>{/if}{if $addInfo}
					({$addInfo}){/if}
				</td>
				<td class="text-right">{$location.fillLevel|number_format:0:":":"."}</td>
			</tr>
			{/foreach} {else} {foreach $combineCommodities as $fillType}
			<tr>
				<td><a
					href="index.php?page=commodity&object={$commodities.$fillType.i3dName}">{$fillType}</a></td>
				<td class="text-right">{$commodities.$fillType.overall|number_format:0:":":"."}</td>
			</tr>
			{/foreach} {/if}
			</tbody>
			<tfoot>
				<tr>
					<th>##WHOLE_AMOUNT##</th>
					<th class="text-right">{$commodities.$l_object.overall|number_format:0:":":"."}</th>
				</tr>
			</tfoot>
		</table>
		{if !$combineCommodities && isset($prices.$l_object)}
		<hr>
		<h4>##SELLTRIGGERS##</h4>
		<table class="table table-striped" style="margin-bottom: 0px;">
			<thead>
				<tr>
					<th>##SELLTRIGGER##</th>
					<th class="text-right">##CURRENT_PRICE##</th>
				</tr>
			</thead>
			<tbody>
				{foreach $prices.$l_object.locations as $tipTrigger=>$tipTriggerData}
				<tr>
					<td>{$tipTrigger}</td>
					<td class="text-right">{$tipTriggerData.price|number_format:0:":":"."}</td>
				</tr>
				{/foreach}
			</tbody>
		</table>
		<p class="text-center text-warning" style="padding-top: 5px">##PRICE_INFO##</p>
		{/if}{if $demandSum > 0}
		<hr>
		<h4>##DEMAND##</h4>
		<table class="table table-striped" style="margin-bottom: 0px;">
			<thead>
				<tr>
					<th>##PLANTS##</th>
					<th class="text-right">##AMOUNT##</th>
				</tr>
			</thead>
			<tbody>
				{foreach $demand as $plant=>$demandValue}
				<tr>
					<td><a
						href="index.php?page=factories&object={$plants.$plant.i3dName}">{$plant}</a></td>
					<td class="text-right">{if
						is_numeric($demandValue)}{$demandValue|number_format:0:":":"."}{else}{$demandValue}{/if}</td>
				</tr>
				{/foreach}
			</tbody>
			<tfoot>
				<tr>
					<th>##WHOLE_DEMAND##</th>
					<th class="text-right">{$demandSum|number_format:0:":":"."}</th>
				</tr>
			</tfoot>
		</table>
		{/if}
	</div>
	<div class="col-sm-6">
		<h4>##ITEM_POSITIONS##</h4>
		<div id="mapContainer" class="img-responsive"
			style="position: relative;">
			<img src="{$linkToImage}" height="512" width="512"> {$image = '<img
			style="position: absolute; left: %dpx; top: %dpx;"
			src="./styles/%s/images/%s" width="%d" height="%d"
			data-toggle="tooltip" data-placement="top" title="%s">'} {foreach
			$mapEntries as $key => $mapEntry}
			{$image|printf:$mapEntry.xpos:$mapEntry.zpos:$style:$mapEntry.icon:$machineIconSize:$machineIconSize:$mapEntry.name}
			{/foreach}
		</div>
	</div>
	{/if}
</div>

<div class="modal fade" id="modalMenu" tabindex="-1" role="dialog"
	aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"
					aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">##CHOOSE_COMMODITY##</h4>
			</div>
			<div class="modal-body">
				<div class="row fivecolumns">
					{$colmax[0] = -1} {$colmax[1] = ($commodities|@count/5)|ceil}
					{$colmax[2] = $colmax[1] *2} {$colmax[3] = $colmax[1] *3}
					{$colmax[4] = $colmax[1] *4} {$colmax[5] = $commodities|@count}
					{for $i=0 to 4}
					<div class="col-sm-2">
						<ul class="nav nav-pills nav-stacked">
							{foreach $commodities as $commodity => $commodityData} {if
							$commodityData@iteration > $colmax[$i] &&
							$commodityData@iteration <= $colmax[$i+1] }
							<li role="menu" {if $selectedCommodity==
								$commodityData.i3dName} class="active"{/if}><a
								href="index.php?page=commodity&object={$commodityData.i3dName}">{$commodity}</a></li>
							{/if}{/foreach}
						</ul>
					</div>
					{/for}
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">##CLOSE##</button>
			</div>
		</div>
		</form>
	</div>
</div>