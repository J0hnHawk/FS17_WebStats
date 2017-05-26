<div class="page-header">
	<h3>Lagerbestände</h3>
</div>
<div class="row">
	<div class="col-sm-4">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Ware</th>
					<th class="text-right">Lagerbestand</th>
				</tr>
			</thead>
			{$col1max = ($commodities|@count/3)|ceil} {$col2max = $col1max + $col1max}
			<tbody>
				{foreach from=$commodities key=$fillType item=$fillLevels} {if $fillLevels@iteration <= $col1max}
				{$stripFillType = $fillType|strip:""}
				<tr data-toggle="collapse" href="#collapse{$stripFillType}">
					<td>{$fillType}</td>
					<td class="text-right">{$fillLevels.overall|number_format:0:",":"."}
					</td>
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
								{foreach from=$fillLevels key=$location item=$fillLevel}
								{if $location=="overall"}{continue}{/if}
								<tr>
									<td>{$location}</td>
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
				{foreach from=$commodities key=$fillType item=$fillLevel} {if $fillLevel@iteration > $col1max && $fillLevel@iteration <= $col2max }
				<tr data-toggle="collapse" href="#collapse{$fillType|strip:""}">
					<td>{$fillType}</td>
					<td class="text-right">{$fillLevel.overall|number_format:0:",":"."}</td>
				</tr>
				{if $fillLevel.overall>0}
				<tr class="collapse info" id="collapse{$fillType|strip:""}">
					<td colspan="3">
						<table class="table">
							<thead>
								<tr>
									<th>Ort</th>
									<th class="text-right">Menge</th>
								</tr>
							</thead>
							<tbody>
								{if isset($fillLevel.farmStorage)}
								<tr>
									<td>Hofsilo</td>
									<td class="text-right">{$fillLevel.farmStorage|number_format:0:",":"."}</td>
								</tr>
								{/if} {if isset($fillLevel.palletStorage) && $fillLevel.palletStorage >0}
								<tr>
									<td>Palettenlager</td>
									<td class="text-right">{$fillLevel.palletStorage|number_format:0:",":"."}</td>
								</tr>
								{/if} {if isset($fillLevel.Bale)}
								<tr>
									<td>{$fillLevel.Bale.onMap.count|number_format:0:",":"."} Ballen</td>
									<td class="text-right">{$fillLevel.Bale.onMap.fillLevel|number_format:0:",":"."}</td>
								</tr>
								{/if} {if isset($fillLevel.FillablePallet)} {if isset($fillLevel.FillablePallet.onMap)}
								<tr>
									<td>Landschaft ({$fillLevel.FillablePallet.onMap.count|number_format:0:",":"."} Paletten)</td>
									<td class="text-right">{$fillLevel.FillablePallet.onMap.fillLevel|number_format:0:",":"."}</td>
								</tr>
								{/if} {/if}
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
				{foreach from=$commodities key=$fillType item=$fillLevel} {if $fillLevel@iteration > (($fillLevel@total/3)|ceil)*2}
				<tr data-toggle="collapse" href="#collapse{$fillType|strip:""}">
					<td>{$fillType}</td>
					<td class="text-right">{$fillLevel.overall|number_format:0:",":"."}</td>
				</tr>
				{if $fillLevel.overall>0}
				<tr class="collapse info" id="collapse{$fillType|strip:""}">
					<td colspan="3">
						<table class="table">
							<thead>
								<tr>
									<th>Ort</th>
									<th class="text-right">Menge</th>
								</tr>
							</thead>
							<tbody>
								{if isset($fillLevel.farmStorage)}
								<tr>
									<td>Hofsilo</td>
									<td class="text-right">{$fillLevel.farmStorage|number_format:0:",":"."}</td>
								</tr>
								{/if} {if isset($fillLevel.palletStorage) && $fillLevel.palletStorage >0}
								<tr>
									<td>Palettenlager</td>
									<td class="text-right">{$fillLevel.palletStorage|number_format:0:",":"."}</td>
								</tr>
								{/if} {if isset($fillLevel.Bale)}
								<tr>
									<td>{$fillLevel.Bale.onMap.count|number_format:0:",":"."} Ballen</td>
									<td class="text-right">{$fillLevel.Bale.onMap.fillLevel|number_format:0:",":"."}</td>
								</tr>
								{/if} {if isset($fillLevel.FillablePallet)} {if isset($fillLevel.FillablePallet.onMap)}
								<tr>
									<td>Landschaft ({$fillLevel.FillablePallet.onMap.count|number_format:0:",":"."} Paletten)</td>
									<td class="text-right">{$fillLevel.FillablePallet.onMap.fillLevel|number_format:0:",":"."}</td>
								</tr>
								{/if} {/if}
							</tbody>
						</table>
					</td>
				</tr>
				{/if} {/if} {/foreach}
			</tbody>
		</table>
	</div>
</div>