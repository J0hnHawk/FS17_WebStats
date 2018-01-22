<div class="page-header">
	<h3>
		##ANIMALS##<small> (##SAVETIME##: ##DAY## {$currentDay}, {$dayTime})</small>
	</h3>
</div>
<div class="hidden-xs">
	<div class="row">
		{foreach $animalPlants as $animalPlant}
		<div class="col-sm-4">
			<h4 class="text-center">
				<strong>{$animalPlant}</strong>
			</h4>
			<table class="table table-striped">
				<tr>
					<th class="col-xs-8">##{$plants.$animalPlant.nameAnimals|upper}_COUNT##</th>
					<td colspan="2" class="col-xs-4 text-right">{$plants.$animalPlant.numAnimals}</td>
				</tr>
				<tr>
					<th class="col-xs-8">##PRODUCTIVITY##</th>
					<td class="col-xs-1 text-right">{$plants.$animalPlant.productivity}%</td>
					<td class="col-xs-3"><div class="progress">
							<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"
								style="width: {$plants.$animalPlant.productivity}%"></div>
						</div></td>
				</tr>
				<tr>
					<th class="col-xs-8">##REPRO_RATE##</th>
					<td colspan="2" class="col-xs-4 text-right">{$plants.$animalPlant.reproRate}</td>
				</tr>
				<tr>
					<th class="col-xs-8">##NEXT_ANIMAL##</th>
					<td colspan="2" class="col-xs-4 text-right">{$plants.$animalPlant.nextAnimal}</td>
				</tr>
			</table>
		</div>
		{/foreach} {foreach $animalPlants as $animalPlant}
		<div class="col-sm-4">
			<table class="table table-striped">
				{foreach $plants.$animalPlant.output as $fillType => $fillTypeData}
			<tr>
				<th class="col-xs-8">{$fillType}</th>
				{if in_array($fillTypeData.i3dName,$animalPallets)}
				<td class="col-xs-1 text-right">{$fillTypeData.fillLevel|number_format:0:":":"."}</td>
				<td class="col-xs-3">{if $fillTypeData.fillMax}{math equation="round(100 / fillMax * fillLevel)" fillMax=$fillTypeData.fillMax
					fillLevel=$fillTypeData.fillLevel assign="percent"}{else}{$percent=0}{/if} {$progress_bar = "success"} {if $percent > 90}{$progress_bar = "danger"} {elseif $percent >
					80}{$progress_bar = "warning"} {/if}
					<div class="progress">
						<div class="progress-bar progress-bar-{$progress_bar}" role="progressbar" aria-valuenow="{$percent}" aria-valuemin="0" aria-valuemax="100"
							style="width: {$percent}%"></div>
					</div> {else} 
					<td colspan="2" class="col-xs-1 text-right">{$fillTypeData.fillLevel|number_format:0:":":"."}</td>{/if}
				</td>
			</tr>
			{/foreach}
			</table>
		</div>
		{/foreach} {foreach $animalPlants as $animalPlant}
		<div class="col-sm-4">
			<table class="table table-striped">
				<tr>
					<th class="col-xs-8">##CLEANNESS##</th>
					<td class="col-xs-1 text-right">{$plants.$animalPlant.cleanlinessFactor}%</td>
					<td class="col-xs-3">
						<div class="progress">
							<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="{$plants.$animalPlant.cleanlinessFactor}" aria-valuemin="0"
								aria-valuemax="100" style="width: {$plants.$animalPlant.cleanlinessFactor}%"></div>
						</div>
					</td>
				</tr>
				{foreach $plants.$animalPlant.input as $fillType => $fillTypeData}{if $fillTypeData.fillMax}{math equation="round(100 / fillMax * fillLevel)"
				fillMax=$fillTypeData.fillMax fillLevel=$fillTypeData.fillLevel assign="percent"}{else}{$percent=0}{/if} {$progress_bar = "success"} {if $percent
				<= 25}{$progress_bar = "danger"} {elseif $percent <= 50}{$progress_bar = "warning"} {/if}
				<tr>
					<th class="col-xs-8">{$fillType|truncate:27:"...":true}</th>
					<td class="col-xs-1 text-right">{$fillTypeData.fillLevel|number_format:0:":":"."}</td>
					<td class="col-xs-3">
						<div class="progress">
							<div class="progress-bar progress-bar-{$progress_bar}" role="progressbar" aria-valuenow="{$percent}" aria-valuemin="0" aria-valuemax="100"
								style="width: {$percent}%"></div>
						</div>
					</td>
				</tr>
				{/foreach}
			</table>
		</div>
		{/foreach}
	</div>
</div>
<div class="hidden-sm hidden-md hidden-lg">
	<div class="row">
		{foreach $animalPlants as $animalPlant}
		<div class="col-xs-12">
			<h4 class="text-center">
				<strong>{$animalPlant}</strong>
			</h4>
			<table class="table table-striped">
				<tr>
					<th class="col-xs-8">##{$plants.$animalPlant.nameAnimals|upper}_COUNT##</th>
					<td colspan="2" class="col-xs-4 text-right">{$plants.$animalPlant.numAnimals}</td>
				</tr>
				<tr>
					<th class="col-xs-8">##PRODUCTIVITY##</th>
					<td class="col-xs-1 text-right">{$plants.$animalPlant.productivity}%</td>
					<td class="col-xs-3"><div class="progress">
							<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"
								style="width: {$plants.$animalPlant.productivity}%"></div>
						</div></td>
				</tr>
				<tr>
					<th class="col-xs-8">##REPRO_RATE##</th>
					<td colspan="2" class="col-xs-4 text-right">{$plants.$animalPlant.reproRate}</td>
				</tr>
				<tr>
					<th class="col-xs-8">##NEXT_ANIMAL##</th>
					<td colspan="2" class="col-xs-4 text-right">{$plants.$animalPlant.nextAnimal}</td>
				</tr>
				{foreach $plants.$animalPlant.output as $fillType => $fillTypeData}
			<tr>
				<th class="col-xs-8">{$fillType}</th>
				{if in_array($fillTypeData.i3dName,$animalPallets)}
				<td class="col-xs-1 text-right">{$fillTypeData.fillLevel|number_format:0:":":"."}</td>
				<td class="col-xs-3">{if $fillTypeData.fillMax}{math equation="round(100 / fillMax * fillLevel)" fillMax=$fillTypeData.fillMax
					fillLevel=$fillTypeData.fillLevel assign="percent"}{else}{$percent=0}{/if} {$progress_bar = "success"} {if $percent > 90}{$progress_bar = "danger"} {elseif $percent >
					80}{$progress_bar = "warning"} {/if}
					<div class="progress">
						<div class="progress-bar progress-bar-{$progress_bar}" role="progressbar" aria-valuenow="{$percent}" aria-valuemin="0" aria-valuemax="100"
							style="width: {$percent}%"></div>
					</div> {else} 
					<td colspan="2" class="col-xs-1 text-right">{$fillTypeData.fillLevel|number_format:0:":":"."}</td>{/if}
				</td>
			</tr>
			{/foreach}
				<tr>
					<th class="col-xs-8">##CLEANNESS##</th>
					<td class="col-xs-1 text-right">{$plants.$animalPlant.cleanlinessFactor}%</td>
					<td class="col-xs-3">
						<div class="progress">
							<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="{$plants.$animalPlant.cleanlinessFactor}" aria-valuemin="0"
								aria-valuemax="100" style="width: {$plants.$animalPlant.cleanlinessFactor}%"></div>
						</div>
					</td>
				</tr>
				{foreach $plants.$animalPlant.input as $fillType => $fillTypeData}{if $fillTypeData.fillMax}{math equation="round(100 / fillMax * fillLevel)"
				fillMax=$fillTypeData.fillMax fillLevel=$fillTypeData.fillLevel assign="percent"}{else}{$percent=0}{/if} {$progress_bar = "success"} {if $percent
				<= 25}{$progress_bar = "danger"} {elseif $percent <= 50}{$progress_bar = "warning"} {/if}
				<tr>
					<th class="col-xs-8">{$fillType|truncate:27:"...":true}</th>
					<td class="col-xs-1 text-right">{$fillTypeData.fillLevel|number_format:0:":":"."}</td>
					<td class="col-xs-3">
						<div class="progress">
							<div class="progress-bar progress-bar-{$progress_bar}" role="progressbar" aria-valuenow="{$percent}" aria-valuemin="0" aria-valuemax="100"
								style="width: {$percent}%"></div>
						</div>
					</td>
				</tr>
				{/foreach}
			</table>
		</div>
		{/foreach}
	</div>
</div>
