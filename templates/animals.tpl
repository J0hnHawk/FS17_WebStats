<div class="page-header">
	<h3>
		##ANIMALS##<small> (##SAVETIME##: ##DAY## {$currentDay}, {$dayTime})</small>
	</h3>
</div>
<div class="row">
	{foreach $animalPlants as $animalPlant}
	<div class="col-sm-4">
		<h4>
			<strong>{$animalPlant}</strong>
		</h4>
		<table class="table table-striped">

			<tr>
				<th class="col-sm-8">##{$plants.$animalPlant.nameAnimals|upper}_COUNT##</th>
				<td class="col-sm-4 text-right">{$plants.$animalPlant.numAnimals}</td>
			</tr>
			<tr>
				<th class="col-sm-8">##PRODUCTIVITY##</th>
				<td class="col-sm-4"><div class="progress" style="margin-bottom:0px;">
						<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"
							style="min-width: 2em; width: 0%">0%</div>
					</div></td>
			</tr>
			<tr>
				<th class="col-sm-8">##REPRO_RATE##</th>
				<td class="col-sm-4 text-right">{$plants.$animalPlant.newAnimalPercentage}</td>
			</tr>
			<tr>
				<th class="col-sm-8">##NEXT_ANIMAL##</th>
				<td class="col-sm-4 text-right">0</td>
			</tr>
		</table>
	</div>
	{/foreach}
</div>
<div class="row">
	{foreach $animalPlants as $animalPlant}
	<div class="col-sm-4">
		<table class="table table-striped">
			{foreach $plants.$animalPlant.output as $fillType => $fillTypeData}
			<tr>
				<th class="col-sm-8">{$fillType}</th>
				<td class="col-sm-4 text-right">{if $fillTypeData.i3dName == 'woolPallet'}{math equation="100 / fillMax * fillLevel" fillMax=$fillTypeData.fillMax
					fillLevel=$fillTypeData.fillLevel assign="percent"} {$progress_bar = "success"} {if $percent > 99}{$progress_bar = "danger"} {elseif $percent >
					90}{$progress_bar = "warning"} {/if}
					<div class="progress" style="margin-bottom:0px;">
						<div class="progress-bar progress-bar-{$progress_bar}" role="progressbar" aria-valuenow="{$percent}" aria-valuemin="0" aria-valuemax="100"
							style="min-width: 2em; width: {$percent}%">{$fillTypeData.fillLevel|number_format:0:":":"."}</div>
					</div> {else} {$fillTypeData.fillLevel|number_format:0:":":"."} {/if}
				</td>
			</tr>
			{/foreach}
		</table>
	</div>
	{/foreach}
</div>
<div class="row">
	{foreach $animalPlants as $animalPlant}
	<div class="col-sm-4">
		<table class="table table-striped">
			<tr>
				<th class="col-sm-8">##CLEANNESS##</th>
				<td class="col-sm-4">
					<div class="progress" style="margin-bottom:0px;">
						<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="{$plants.$animalPlant.cleanlinessFactor}" aria-valuemin="0"
							aria-valuemax="100" style="min-width: 2em; width: {$plants.$animalPlant.cleanlinessFactor}%">{$plants.$animalPlant.cleanlinessFactor}%</div>
					</div>
				</td>
			</tr>
			{foreach $plants.$animalPlant.input as $fillType => $fillTypeData}{math equation="100 / fillMax * fillLevel" fillMax=$fillTypeData.fillMax
			fillLevel=$fillTypeData.fillLevel assign="percent"} {$progress_bar = "success"} {if $percent <= 25}{$progress_bar = "danger"} {elseif $percent <=
			50}{$progress_bar = "warning"} {/if}
			<tr>
				<th class="col-sm-8">{$fillType|truncate:30}</th>
				<td class="col-sm-4">
					<div class="progress" style="margin-bottom:0px;">
						<div class="progress-bar progress-bar-{$progress_bar}" role="progressbar" aria-valuenow="{$percent}" aria-valuemin="0" aria-valuemax="100" style="width: {$percent}%">
							{$fillTypeData.fillLevel|number_format:0:":":"."}
						</div>
					</div>
				</td>
			</tr>
			{/foreach}
		</table>
	</div>
	{/foreach}
</div>
