<div class="page-header">
	<h3>Lagerbestände</h3>
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
				{foreach from=$commodities key=$fillType item=$fillLevels} {if $fillLevels@iteration <= $col1max} {$stripFillType = $fillType|strip:""}
				<tr data-toggle="collapse" href="#collapse{$stripFillType}" {if isset($fillLevels.outOfMap)}class="danger"{/if}>
					<td>{$fillType}</td>
					<td class="text-right">{$fillLevels.overall|number_format:0:",":"."}</td>
				</tr>
				{if $fillLevels.overall>0}
				<tr class="collapse info" id="collapse{$stripFillType}">
					<td colspan="3">
						<table class="table">
							<thead>
								<tr>
									<th>Ort</th>
									<th class="text-right">Menge</th>
								</tr>
							</thead>
							<tbody>
								{foreach from=$fillLevels key=$location item=$fillLevel} {if $location=="overall"||$location=="outOfMap"}{continue}{/if} {$addInfo=false} {if
								isset($fillLevel.FillablePallet)}{if $fillLevel.FillablePallet==1}{$addInfo="1 Palette"}{else}{$addInfo="{$fillLevel.FillablePallet} Paletten"}{/if}{/if} {if
								isset($fillLevel.Bale)}{$addInfo="{$fillLevel.Bale} Ballen"}{/if}
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
				{$stripFillType = $fillType|strip:""}
				<tr data-toggle="collapse" href="#collapse{$stripFillType}">
					<td>{$fillType}</td>
					<td class="text-right">{$fillLevels.overall|number_format:0:",":"."}</td>
				</tr>
				{if $fillLevels.overall>0}
				<tr class="collapse info" id="collapse{$stripFillType}">
					<td colspan="3">
						<table class="table">
							<thead>
								<tr>
									<th>Ort</th>
									<th class="text-right">Menge</th>
								</tr>
							</thead>
							<tbody>
								{foreach from=$fillLevels key=$location item=$fillLevel} {if $location=="overall"||$location=="outOfMap"}{continue}{/if} {$addInfo=false} {if
								isset($fillLevel.FillablePallet)}{if $fillLevel.FillablePallet==1}{$addInfo="1 Palette"}{else}{$addInfo="{$fillLevel.FillablePallet} Paletten"}{/if}{/if} {if
								isset($fillLevel.Bale)}{$addInfo="{$fillLevel.Bale} Ballen"}{/if}
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
				$fillType|strip:""}
				<tr data-toggle="collapse" href="#collapse{$stripFillType}">
					<td>{$fillType}</td>
					<td class="text-right">{$fillLevels.overall|number_format:0:",":"."}</td>
				</tr>
				{if $fillLevels.overall>0}
				<tr class="collapse info" id="collapse{$stripFillType}">
					<td colspan="3">
						<table class="table">
							<thead>
								<tr>
									<th>Ort</th>
									<th class="text-right">Menge</th>
								</tr>
							</thead>
							<tbody>
								{foreach from=$fillLevels key=$location item=$fillLevel} {if $location=="overall"||$location=="outOfMap"}{continue}{/if} {$addInfo=false} {if
								isset($fillLevel.FillablePallet)}{if $fillLevel.FillablePallet==1}{$addInfo="1 Palette"}{else}{$addInfo="{$fillLevel.FillablePallet} Paletten"}{/if}{/if} {if
								isset($fillLevel.Bale)}{$addInfo="{$fillLevel.Bale} Ballen"}{/if}
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