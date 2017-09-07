<div class="page-header">
	<h3>
		{$plantName}<small> (Speicherstand: Tag {$currentDay}, {$dayTime})</small><small class="pull-right"><button type="button"
				class="btn btn-primary" data-toggle="modal" data-target="#modalMenu">Produktionsanlage auswählen</button> </small>
	</h3>
</div>
<div class="row">
	<div class="col-sm-8 col-sm-offset-1">
		{$plantData = $plants.$plantName}
		{$ProdPerHour = $mapconfig[$plantData.i3dName].ProdPerHour}
		<h4>Benötigte Rohstoffe</h4>
		<table class="table">
			<thead>
				<tr>
					<th width="28%">Rohstoff</th>
					<th width="18%" class="text-right">Lager</th>
					<th width="18%" class="text-right">Kapazität</th>
					<th width="18%" class="text-right">Bedarf/Stunde</th>
					<th width="18%" class="text-right">Bedarf/Tag</th>
				</tr>
			</thead>
			<tbody>
			{foreach $plantData.input as $fillTypeName => $fillTypeData}
				{$factor = $mapconfig[$plantData.i3dName].rawMaterial[$fillTypeData.i3dName].factor}
				{$hour = $ProdPerHour*$factor}
				{$day = $hour * 24}
				<tr>
					<td><a href="index.php?page=commodity&object={$fillTypeData.i3dName}">{$fillTypeName}</a></td>
					<td class="text-right">{$fillTypeData.fillLevel|number_format:0:",":"."}</td>
					<td class="text-right">{$fillTypeData.fillMax|number_format:0:",":"."}</td>
					<td class="text-right">{$hour|number_format:0:",":"."}</td>
					<td class="text-right">{$day|number_format:0:",":"."}</td>
				</tr>
			{/foreach}
			</tbody>
		</table>
		<hr>
		<h4>Produzierte Waren</h4>
		<table class="table">
			<thead>
				<tr>
					<th width="28%">Produkt</th>
					<th width="18%" class="text-right">Lager</th>
					<th width="18%" class="text-right">Kapazität</th>
					<th width="18%" class="text-right">Produktion/Stunde</th>
					<th width="18%" class="text-right">Produktion/Tag</th>
				</tr>
			</thead>
			<tbody>
			{foreach $plantData.output as $fillTypeName => $fillTypeData}
				{$factor = $mapconfig[$plantData.i3dName].product[$fillTypeData.i3dName].factor}
				{$hour = $ProdPerHour*$factor}
				{$day = $hour * 24}
				<tr>
					<td><a href="index.php?page=commodity&object={$fillTypeData.i3dName}">{$fillTypeName}</a></td>
					<td class="text-right">{$fillTypeData.fillLevel|number_format:0:",":"."}</td>
					<td class="text-right">{$fillTypeData.fillMax|number_format:0:",":"."}</td>
					<td class="text-right">{$hour|number_format:0:",":"."}</td>
					<td class="text-right">{$day|number_format:0:",":"."}</td>
				</tr>
			{/foreach}
			</tbody>
		</table>
	</div>
</div>
<div class="modal fade" id="modalMenu" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">Produktionsstätte auswählen</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					{$colmax[0] = -1} {$colmax[1] = ($plants|@count/3)|ceil} {$colmax[2] = $colmax[1] *2} {$colmax[3] = $plants|@count} {for $i=0 to 2}
					<div class="col-sm-4">
						<ul class="nav nav-pills nav-stacked">
							{foreach $plants as $plantName => $plantData} {if $plantData@iteration > $colmax[$i] && $plantData@iteration <= $colmax[$i+1] }							
							<li role="menu" {if $selectedPlant == $plantData.i3dName} class="active"{/if}><a href="index.php?page=factories&object={$plantData.i3dName}">{$plantName}</a></li> {/if}{/foreach}
						</ul>
					</div>
					{/for}
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Schließen</button>
			</div>
		</div>
		</form>
	</div>
</div>
