<div class="page-header">
	<h3>
		Lagerbestände<small> (Stand: Tag {$currentDay}, {$dayTime})</small><small class="pull-right">{if $outOfMap|@count>0}</span><a href="#" data-toggle="modal" data-target="#outOfMapAlert"><span class="glyphicon glyphicon-warning-sign"
				aria-hidden="true"></span> Achtung</a>&nbsp;&nbsp;{/if}<a href="#" data-toggle="modal" data-target="#optionsDialog"><span class="glyphicon glyphicon-cog"
				aria-hidden="true"></span> Einstellungen</a></small>
	</h3>
</div>
<div class="row">
	{$col1max = ($commodities|@count/3)|ceil} {$col2max = $col1max + $col1max}
	<div class="col-sm-4">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Ware</th>
					<th class="text-right">Lagerbestand</th>
				</tr>
			</thead>
			<tbody>
				{foreach from=$commodities key=$fillType item=$fillLevels} {if $fillLevels@iteration <= $col1max} {$stripFillType = $fillType|strip:""|replace:"{ldelim}":""|replace:"{rdelim}":""}
				<tr data-toggle="collapse" href="#collapse{$stripFillType}" {if isset($fillLevels.outOfMap)}class="danger"{/if}>
					<td>{$fillType}</td>
					<td class="text-right">{$fillLevels.overall|number_format:0:",":"."}</td>
				</tr>
				{if $fillLevels.overall>0}
				<tr class="collapse info" id="collapse{$stripFillType}">
					<td colspan="3">
						<table class="table" style="margin-bottom: 0px;">
							<thead>
								<tr>
									<th>Ort</th>
									<th class="text-right">Menge</th>
								</tr>
							</thead>
							<tbody>
								{foreach from=$fillLevels key=$location item=$fillLevel} {if $location=="overall"||$location=="outOfMap"}{continue}{/if} {$addInfo=false} {if
								isset($fillLevel.FillablePallet)}{if $fillLevel.FillablePallet==1}{$addInfo="1 Palette"}{else}{$addInfo="{$fillLevel.FillablePallet}
								Paletten"}{/if}{/if} {if isset($fillLevel.Bale)}{$addInfo="{$fillLevel.Bale} Ballen"}{/if}
								<tr>
									<td>{$location}{if $addInfo} ({$addInfo}){/if}</td>
									<td class="text-right">{$fillLevel.fillLevel|number_format:0:",":"."}</td>
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
	<div class="col-sm-4">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Ware</th>
					<th class="text-right">Lagerbestand</th>
				</tr>
			</thead>
			<tbody>
				{foreach from=$commodities key=$fillType item=$fillLevels} {if $fillLevels@iteration > $col1max && $fillLevels@iteration <= $col2max }
				{$stripFillType = $fillType|strip:""|replace:"{ldelim}":""|replace:"{rdelim}":""}
				<tr data-toggle="collapse" href="#collapse{$stripFillType}" {if isset($fillLevels.outOfMap)}class="danger"{/if}>
					<td>{$fillType}</td>
					<td class="text-right">{$fillLevels.overall|number_format:0:",":"."}</td>
				</tr>
				{if $fillLevels.overall>0}
				<tr class="collapse info" id="collapse{$stripFillType}">
					<td colspan="3">
						<table class="table" style="margin-bottom: 0px;">
							<thead>
								<tr>
									<th>Ort</th>
									<th class="text-right">Menge</th>
								</tr>
							</thead>
							<tbody>
								{foreach from=$fillLevels key=$location item=$fillLevel} {if $location=="overall"||$location=="outOfMap"}{continue}{/if} {$addInfo=false} {if
								isset($fillLevel.FillablePallet)}{if $fillLevel.FillablePallet==1}{$addInfo="1 Palette"}{else}{$addInfo="{$fillLevel.FillablePallet}
								Paletten"}{/if}{/if} {if isset($fillLevel.Bale)}{$addInfo="{$fillLevel.Bale} Ballen"}{/if}
								<tr>
									<td>{$location}{if $addInfo} ({$addInfo}){/if}</td>
									<td class="text-right">{$fillLevel.fillLevel|number_format:0:",":"."}</td>
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
	<div class="col-sm-4">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Ware</th>
					<th colspan="2" class="text-right">Lagerbestand</th>
				</tr>
			</thead>
			<tbody>
				{foreach from=$commodities key=$fillType item=$fillLevels} {if $fillLevels@iteration > (($fillLevels@total/3)|ceil)*2} {$stripFillType =
				$fillType|strip:""|replace:"{ldelim}":""|replace:"{rdelim}":""}
				<tr data-toggle="collapse" href="#collapse{$stripFillType}" {if isset($fillLevels.outOfMap)}class="danger"{/if}>
					<td>{$fillType}</td>
					<td class="text-right">{$fillLevels.overall|number_format:0:",":"."}</td>
				</tr>
				{if $fillLevels.overall>0}
				<tr class="collapse info" id="collapse{$stripFillType}">
					<td colspan="3">
						<table class="table" style="margin-bottom: 0px;">
							<thead>
								<tr>
									<th>Ort</th>
									<th class="text-right">Menge</th>
								</tr>
							</thead>
							<tbody>
								{foreach from=$fillLevels key=$location item=$fillLevel} {if $location=="overall"||$location=="outOfMap"}{continue}{/if} {$addInfo=false} {if
								isset($fillLevel.FillablePallet)}{if $fillLevel.FillablePallet==1}{$addInfo="1 Palette"}{else}{$addInfo="{$fillLevel.FillablePallet}
								Paletten"}{/if}{/if} {if isset($fillLevel.Bale)}{$addInfo="{$fillLevel.Bale} Ballen"}{/if}
								<tr>
									<td>{$location}{if $addInfo} ({$addInfo}){/if}</td>
									<td class="text-right">{$fillLevel.fillLevel|number_format:0:",":"."}</td>
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
							<label class="radio-inline">
								<input type="radio" name="sortByName" value="1"{if $options.sortByName}checked{/if}> alphabetisch
							</label>
							<label class="radio-inline">
								<input type="radio" name="sortByName" value="0"{if !$options.sortByName}checked{/if}> nach Füllstand
							</label>
						</div>
					</div>
					<div class="form-group">
						<label for="sortType" class="col-sm-5 control-label">Ladung von Fahrzeugen</label>
						<div class="col-sm-7">
							<label class="radio-inline">
								<input type="radio" name="showVehicles" value="1"{if $options.showVehicles}checked{/if}> anzeigen
							</label>
							<label class="radio-inline">
								<input type="radio" name="showVehicles" value="0"{if !$options.showVehicles}checked{/if}> nicht anzeigen
							</label>
						</div>
					</div>
					<div class="form-group">
						<label for="sortType" class="col-sm-5 control-label">Nur Paletten anzeigen</label>
						<div class="col-sm-7">
							<label class="radio-inline">
								<input type="radio" name="onlyPallets" value="1"{if $options.onlyPallets}checked{/if}> ja
							</label>
							<label class="radio-inline">
								<input type="radio" name="onlyPallets" value="0"{if !$options.onlyPallets}checked{/if}> nein
							</label>
						</div>
					</div>
					<div class="form-group">
						<label for="sortType" class="col-sm-5 control-label">Null-Bestände anzeigen</label>
						<div class="col-sm-7">
							<label class="radio-inline">
								<input type="radio" name="hideZero" value="0"{if !$options.hideZero}checked{/if}> ja
							</label>
							<label class="radio-inline">
								<input type="radio" name="hideZero" value="1"{if $options.hideZero}checked{/if}> nein
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
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>