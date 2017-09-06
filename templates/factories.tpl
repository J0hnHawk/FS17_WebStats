<div class="page-header">
	<h3>
		Produktionsanlagen<small> (Speicherstand: Tag {$currentDay}, {$dayTime})</small><small class="pull-right"><a href="#" data-toggle="modal"
			data-target="#myModal"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Einstellungen</a></small>
	</h3>
</div>
<div class="row">
	<div class="col-sm-3">
		<ul class="nav nav-pills nav-stacked" role="tablist">
			{foreach $plants as $plantName => $plantData}
			<li role="presentation"><a href="#{$plantData.i3dName}" aria-controls="{$plantData.i3dName}" role="tab" data-toggle="tab">{$plantName}</a></li>
			{/foreach}
		</ul>
	</div>
	<div class="col-sm-9">
		<div class="tab-content">
			{foreach $plants as $plantName => $plantData}
			<div role="tabpanel" class="tab-pane" id="{$plantData.i3dName}">
			<div class="page-header">
				<h3>{$plantName}</h3></div>
				<h4>Aktuelle Lagerbestände</h4>
				<table class="table" style="margin-bottom: 0px;">
					<thead>
						<tr>
							<th colspan="2" width="50%">Rohstoff</th>
							<th colspan="2" width="50%">Produkt</th>
						</tr>
					</thead>
					{$inputRow=array()}{$outputRow=array()} {$max = max($plantData.input|@count,$plantData.output|@count)} {foreach from=$plantData.input
					key=$fillType item=$fillLevel} {$inputRow[$fillLevel@index] = array($fillType,$fillLevel.fillLevel,$fillLevel.fillMax,$fillLevel.i3dName)}
					{/foreach} {foreach from=$plantData.output key=$fillType item=$fillLevel} {$outputRow[$fillLevel@index] =
					array($fillType,$fillLevel.fillLevel,$fillLevel.fillMax,$fillLevel.i3dName)} {/foreach}
					<tbody>
						{for $i=0 to $max-1}
						<tr>
							{if isset($inputRow[$i][0])}
							<td><a href="index.php?page=commodity&object={$inputRow[$i][3]}">{$inputRow[$i][0]}</a></td>
							<td class="text-right">{$inputRow[$i][1]|number_format:0:",":"."} / {$inputRow[$i][2]|number_format:0:",":"."}</td> {else}
							<td colspan="2">&nbsp;</td> {/if} {if isset($outputRow[$i][0])}
							<td><a href="index.php?page=commodity&object={$outputRow[$i][3]}">{$outputRow[$i][0]}</a></td>
							<td class="text-right">{$outputRow[$i][1]|number_format:0:",":"."} / {$outputRow[$i][2]|number_format:0:",":"."}</td>{else}
							<td colspan="2">&nbsp;</td> {/if}
						</tr>
						{/for}
					</tbody>
				</table>
				<hr>
				<h4>Produktivität</h4>
				<table class="table" style="margin-bottom: 0px;">
					<thead>
						<tr>
							<th width="20%">Rohstoff</th>
							<th width="15%">Bedarf/Stunde</th>
							<th width="15%">Bedarf/Tag</th>
							<th width="20%">Produkt</th>
							<th width="15%">Herstellung/Stunde</th>
							<th width="15%">Herstellung/Tag</th>
						</tr>
					</thead>
					{$ProdPerHour = $mapconfig[$plantData.i3dName].ProdPerHour}
					<tbody>
						{for $i=0 to $max-1}
						<tr>
							{if isset($inputRow[$i][0])} {$factor = $mapconfig[$plantData.i3dName].rawMaterial[$inputRow[$i][3]].factor} {$hour = $ProdPerHour*$factor}
							{$day = $hour * 24}
							<td><a href="index.php?page=commodity&object={$inputRow[$i][3]}">{$inputRow[$i][0]}</a></td>
							<td class="text-right">{$hour|number_format:0:",":"."}</td>
							<td class="text-right">{$day|number_format:0:",":"."}</td> {else}
							<td colspan="3">&nbsp;</td> {/if} {if isset($outputRow[$i][0])}{$factor =
							$mapconfig[$plantData.i3dName].product[$outputRow[$i][3]].factor}{$hour = $ProdPerHour*$factor} {$day = $hour * 24}
							<td><a href="index.php?page=commodity&object={$outputRow[$i][3]}">{$outputRow[$i][0]}</a></td>
							<td class="text-right">{$hour|number_format:0:",":"."}</td>
							<td class="text-right">{$day|number_format:0:",":"."}</td> {else}
							<td colspan="3">&nbsp;</td> {/if}
						</tr>
						{/for}
					</tbody>
				</table>
			</div>
			{/foreach}
		</div>
	</div>
</div>

