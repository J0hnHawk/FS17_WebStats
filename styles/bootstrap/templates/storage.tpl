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
			<tbody>
				{foreach from=$commodities key=$fillType item=$fillLevel} {if $fillLevel@iteration <= 15}
				<tr data-toggle="collapse" href="#collapse{$fillType|replace:" ":""}">
					<td>{$fillType}</td>
					<td class="text-right">{$fillLevel.overall|number_format:0:",":"."}</td>
				</tr>
				{if $fillLevel.overall>0}
				<tr class="collapse info" id="collapse{$fillType|replace:" ":""}">
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
								{/if} {if isset($fillLevel.FillablePallet)}	{if isset($fillLevel.FillablePallet.onMap)}
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
					<th class="text-right">Lagerbestand</th>
				</tr>
			</thead>
			<tbody>
				{foreach from=$commodities key=$fillType item=$fillLevel} {if $fillLevel@iteration > 15 && $fillLevel@iteration <= 30}
				<tr data-toggle="collapse" href="#collapse{$fillType|replace:" ":""}">
					<td>{$fillType}</td>
					<td class="text-right">{$fillLevel.overall|number_format:0:",":"."}</td>
				</tr>
				{if $fillLevel.overall>0}
				<tr class="collapse info" id="collapse{$fillType|replace:" ":""}">
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
								{/if} {if isset($fillLevel.FillablePallet)}	{if isset($fillLevel.FillablePallet.onMap)}
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
				{foreach from=$commodities key=$fillType item=$fillLevel} {if $fillLevel@iteration > 30}
				<tr data-toggle="collapse" href="#collapse{$fillType|replace:" ":""}">
					<td>{$fillType}</td>
					<td class="text-right">{$fillLevel.overall|number_format:0:",":"."}</td>
				</tr>
				{if $fillLevel.overall>0}
				<tr class="collapse info" id="collapse{$fillType|replace:" ":""}">
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
								{/if} {if isset($fillLevel.FillablePallet)}	{if isset($fillLevel.FillablePallet.onMap)}
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
