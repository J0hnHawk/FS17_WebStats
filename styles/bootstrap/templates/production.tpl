<div class="page-header">
	<h3>
		Produktionsanlagen<small class="pull-right"><a href="#" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-cog"
				aria-hidden="true"
			></span> Einstellungen</a></small>
	</h3>
</div>
{$glyphicons =array("glyphicon glyphicon-ok-sign text-success", "glyphicon glyphicon-exclamation-sign text-warning", "glyphicon glyphicon-remove-sign text-danger")}
{$textcolors = array("","text-warning","text-danger")}
<div class="row">
	<div class="col-sm-12">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Produktionsanlage</th>
					<th>Rohstoff(e)</th>
					<th>Produkt(e)</th>
				</tr>
			</thead>
			<tbody>
				<!-- class="{$inout.class}" -->
				{foreach from=$plants key=$plant item=$inout}{$stripPlant = $plant|strip:""|replace:"(":""|replace:")":""}
				<tr data-toggle="collapse" href="#collapse{$stripPlant}">
					<td><span class="{$glyphicons[$inout.state]}" aria-hidden="true"></span> {$plant}</td>
					<td>{foreach from=$inout.input key=$fillType item=$fillLevel}<span class="{$textcolors[$fillLevel.state]}"><span class="{$glyphicons[$fillLevel.state]}" aria-hidden="true"></span>
						{$fillType}{if !$fillLevel@last}, {/if}</span>{/foreach}
					</td>
					<td>{foreach from=$inout.output key=$fillType item=$fillLevel}<span class="{$textcolors[$fillLevel.state]}"><span class="{$glyphicons[$fillLevel.state]}" aria-hidden="true"></span>
						{$fillType}{if !$fillLevel@last}, {/if}</span>{/foreach}
					</td>
				</tr>
				<tr class="collapse info" id="collapse{$stripPlant}">
					<td colspan="3">
						<table class="table" style="margin-bottom: 0px;">
							<thead>
								<tr>
									<th colspan="4">Rohstoff(e)</th>
									<th colspan="4">Produkt(e)</th>
								</tr>
							</thead>
							{$inputRow=array()}{$outputRow=array()} {$max = max($inout.input|@count,$inout.output|@count)} {foreach from=$inout.input key=$fillType
							item=$fillLevel} {$inputRow[$fillLevel@index] = array($fillType,$fillLevel.fillLevel,$fillLevel.fillMax)} {/foreach} {foreach
							from=$inout.output key=$fillType item=$fillLevel} {$outputRow[$fillLevel@index] = array($fillType,$fillLevel.fillLevel,$fillLevel.fillMax)}
							{/foreach}
							<tbody>
								{for $i=0 to $max-1}
								<tr>
									{if isset($inputRow[$i][0])} {$pecent=$inputRow[$i][1]/$inputRow[$i][2]*100} <td>{$inputRow[$i][0]}</td>
									<td>{$inputRow[$i][1]|number_format:0:",":"."}</td> <td>{$inputRow[$i][2]|number_format:0:",":"."}</td>
									<td>{$pecent|number_format:0:",":"."}</td>{else} <td colspan="4">&nbsp;</td> {/if}{if isset($outputRow[$i][0])}
									{$pecent=$outputRow[$i][1]/$outputRow[$i][2]*100}
									<td>{$outputRow[$i][0]}</td>
									<td>{$outputRow[$i][1]|number_format:0:",":"."}</td>
									<td>{$outputRow[$i][2]|number_format:0:",":"."}</td>
									<td>{$pecent|number_format:0:",":"."}</td>{else}
									<td colspan="4">&nbsp;</td> {/if}
								</tr>
								{/for}
							</tbody>
						</table>
					</td>
				</tr>
				{/foreach}
			</tbody>
		</table>
	</div>
</div>
<!-- 
<div class="row">
	{foreach from=$plants key=$plant item=$inout}
	<div class="col-sm-6">
		<div class="panel panel-{$inout.class}">
			<div class="panel-heading">
				<h4 class="panel-title">{$plant}</h4>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-6">
						{foreach from=$inout.input key=$fillType item=$fillLevel}
						<div class="row">
							<div class="col-sm-6 text-nowrap">{$fillType}</div>
							<div class="col-sm-6 text-right">{$fillLevel.fillLevel|number_format:0:",":"."}/{$fillLevel.fillMax|number_format:0:",":"."}</div>
						</div>
						{/foreach}
					</div>
					<div class="col-sm-6">
						{foreach from=$inout.output key=$fillType item=$fillLevel}
						<div class="row">
							<div class="col-sm-6 text-nowrap">{$fillType}</div>
							<div class="col-sm-6 text-right">{$fillLevel.fillLevel|number_format:0:",":"."}/{$fillLevel.fillMax|number_format:0:",":"."}</div>
						</div>
						{/foreach}
					</div>
				</div>
			</div>
		</div>
	</div>
	{/foreach}
</div>
 -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">Einstellungen</h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" action="index.php?page=production" method="post">
					<div class="form-group">
						<label class="col-sm-5 control-label">Sortierung</label>
						<div class="col-sm-7">
							<label class="radio-inline"> <input type="radio" name="sortByName" value="1"{if $options.sortByName}checked{/if}> alphabetisch
							</label> <label class="radio-inline"> <input type="radio" name="sortByName" value="0"{if !$options.sortByName}checked{/if}> nach Füllstand
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