<div class="page-header">
	<h3>
		Lagerbestände<small> (Speicherstand: Tag {$currentDay}, {$dayTime})</small><small class="pull-right">{if $outOfMap|@count>0}</span><a href="#"
			data-toggle="modal" data-target="#outOfMapAlert"><span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span> Achtung</a>&nbsp;&nbsp;{/if}<a
			href="#" data-toggle="modal" data-target="#optionsDialog"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Einstellungen</a></small>
	</h3>
</div>
<div class="row">
	{$colmax[0] = -1} {$colmax[1] = ($commodities|@count/3)|ceil} {$colmax[2] = $colmax[1] *2} {$colmax[3] = $commodities|@count} {for $i=0 to 2}
	<div class="col-sm-4">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Ware</th>
					<th class="text-right">Lagerbestand</th>
				</tr>
			</thead>
			<tbody>
				{foreach $commodities as $fillType => $commodity} {if $commodity@iteration > $colmax[$i] && $commodity@iteration <= $colmax[$i+1] }
				<tr data-toggle="collapse" href="#collapse{$commodity.i3dName}" {if isset($commodity.outOfMap)}class="danger"{/if}>
					<td>{$fillType}</td>
					<td class="text-right">{$commodity.overall|number_format:0:",":"."}</td>
				</tr>
				{if $commodity.overall>0}
				<tr class="collapse info" id="collapse{$commodity.i3dName}">
					<td colspan="3">
						<table class="table" style="margin-bottom: 0px;">
							<thead>
								<tr>
									<th>Ort<a class="pull-right" href="index.php?page=details&object={$commodity.i3dName}">Details</a></th>
									<th class="text-right">Menge</th>
								</tr>
							</thead>
							<tbody>
								{foreach $commodity.locations as $locationName => $location} {$addInfo=false} {if isset($location.FillablePallet)}{if
								$location.FillablePallet==1}{$addInfo="1 Palette"}{else}{$addInfo="{$location.FillablePallet} Paletten"}{/if}{/if} {if
								isset($location.Bale)}{$addInfo="{$location.Bale} Ballen"}{/if}
								<tr>
									<td>{$locationName}{if $addInfo} ({$addInfo}){/if}</td>
									<td class="text-right">{$location.fillLevel|number_format:0:",":"."}</td>
								</tr>
								{/foreach}
							</tbody>
						</table>
					</td>
				</tr>
				{/if} {/if} {/foreach}
			</tbody>
		</table>
	</div>
	{/for}
</div>
<div class="modal fade" id="optionsDialog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">Einstellungen</h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" action="index.php?page=storage" method="post">
					<div class="form-group">
						<label class="col-sm-5 control-label">Sortierung</label>
						<div class="col-sm-7">
							<label class="radio-inline"> <input type="radio" name="sortByName" value="1"{if $options.sortByName}checked{/if}> alphabetisch
							</label> <label class="radio-inline"> <input type="radio" name="sortByName" value="0"{if !$options.sortByName}checked{/if}> nach Füllstand
							</label>
						</div>
					</div>
					<div class="form-group">
						<label for="sortType" class="col-sm-5 control-label">Ladung von Fahrzeugen</label>
						<div class="col-sm-7">
							<label class="radio-inline"> <input type="radio" name="showVehicles" value="1"{if $options.showVehicles}checked{/if}> anzeigen
							</label> <label class="radio-inline"> <input type="radio" name="showVehicles" value="0"{if !$options.showVehicles}checked{/if}> nicht anzeigen
							</label>
						</div>
					</div>
					<div class="form-group">
						<label for="sortType" class="col-sm-5 control-label">Nur Paletten anzeigen</label>
						<div class="col-sm-7">
							<label class="radio-inline"> <input type="radio" name="onlyPallets" value="1"{if $options.onlyPallets}checked{/if}> ja
							</label> <label class="radio-inline"> <input type="radio" name="onlyPallets" value="0"{if !$options.onlyPallets}checked{/if}> nein
							</label>
						</div>
					</div>
					<div class="form-group">
						<label for="sortType" class="col-sm-5 control-label">Null-Bestände anzeigen</label>
						<div class="col-sm-7">
							<label class="radio-inline"> <input type="radio" name="hideZero" value="0"{if !$options.hideZero}checked{/if}> ja
							</label> <label class="radio-inline"> <input type="radio" name="hideZero" value="1"{if $options.hideZero}checked{/if}> nein
							</label>
						</div>
					</div>
			
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Schließen</button>
				<button type="submit" class="btn btn-primary">Speichern</button>
			</div>
		</div>
		</form>
	</div>
</div>
<div class="modal fade" id="outOfMapAlert" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">Fehlerhafte Paletten und Ballen</h4>
			</div>
			<div class="modal-body">
				<p>
					Die Positionen der folgenden Ballen oder Paletten in der
					<code>vehicle.xml</code>
					sind ungültig.
				</p>
				<table class="table text-nowrap">
					<thead>
						<tr>
							<th>Palette/Ballen</th>
							<th>ungültige Position</th>
							<th>Vorschlag Position</th>
						</tr>
					</thead>
					<tbody>
						{foreach $outOfMap as $item}
						<tr>
							<td>{$item[1]}</td>
							<td class="nowrap">{$item[2]}</td>
							<td class="nowrap">{$item[3]}</td>
						</tr>
						{/foreach}
					</tbody>
				</table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Schließen</button>
			</div>
		</div>
	</div>
</div>