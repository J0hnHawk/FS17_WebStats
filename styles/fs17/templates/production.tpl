<div class="page-header">
	<h3>
		##PRODUCTION_OVERVIEW##<small> (##SAVETIME##: ##DAY## {$currentDay}, {$dayTime})</small><small class="pull-right"><a href="#" data-toggle="modal"
			data-target="#myModal"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> ##SETTINGS##</a></small>
	</h3>
</div>
{$glyphicons =array("glyphicon glyphicon-ok-sign text-success", "glyphicon glyphicon-exclamation-sign text-warning", "glyphicon glyphicon-remove-sign
text-danger")} {$textcolors = array("","text-warning","text-danger")}
<div class="row">
	<div class="col-sm-12">
		<table class="table table-hover table-striped">
			<thead>
				<tr>
					<th width="20%">##PLANT##</th>
					<th width="40%">##RAW_MATERIALS##</th>
					<th width="40%">##PRODUCTS##</th>
				</tr>
			</thead>
			<tbody>
				{if $options.showTooltip}
					{$tooltip = '<span class="%s text-nowrap" data-toggle="tooltip" data-placement="top" title="##STOCK##:<br><strong>%s</strong>">'}
				{else}
					{$tooltip = '<span class="%s text-nowrap"> <!--%s-->'}
				{/if}	
				{foreach $plants as	$plantName => $plantData}
				<tr data-toggle="collapse" href="#collapse{$plantData.i3dName}">
					<td><span class="{$glyphicons[$plantData.state]}" aria-hidden="true"></span> {$plantName}</td>
					<td>{foreach from=$plantData.input key=$fillType item=$fillLevel} {if isset($commodities.$fillType)}{$overall =
						$commodities.$fillType.overall}{else}{$overall = 0} {/if} {$tooltip|printf:$textcolors[$fillLevel.state]:($overall|number_format:0:",":".")} <span
						class="{$glyphicons[$fillLevel.state]}" aria-hidden="true"></span> {$fillType} </span>{/foreach}
					</td>
					<td>{foreach from=$plantData.output key=$fillType item=$fillLevel}{if isset($commodities.$fillType)}{$overall =
						$commodities.$fillType.overall}{else}{$overall = 0} {/if} {$tooltip|printf:$textcolors[$fillLevel.state]:($overall|number_format:0:",":".")} <span
						class="{$glyphicons[$fillLevel.state]}" aria-hidden="true"></span> {$fillType} </span>{/foreach}
					</td>
				</tr>
				<tr class="collapse" id="collapse{$plantData.i3dName}" style="background-color:#262626">
					<td colspan="4">
						<div class="col-sm-8 col-sm-offset-1">
							<table class="table" style="margin-bottom: 0px;">
								<thead>
									<tr>
										<th colspan="2" width="50%">##RAW_MATERIALS##</th>
										<th colspan="2" width="50%">##PRODUCTS##</th>
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
										<td><a href="index.php?page=commodity&object={$inputRow[$i][3]}">{$inputRow[$i][0]|truncate:27:"...":true}</a></td>
										<td class="text-right">{$inputRow[$i][1]|number_format:0:",":"."} / {if is_numeric($inputRow[$i][2])}{$inputRow[$i][2]|number_format:0:",":"."}{else}{$inputRow[$i][2]}{/if}</td> {else}
										<td colspan="2">&nbsp;</td> {/if} {if isset($outputRow[$i][0])}
										<td><a href="index.php?page=commodity&object={$outputRow[$i][3]}">{$outputRow[$i][0]|truncate:27:"...":true}</a></td>
										<td class="text-right">{$outputRow[$i][1]|number_format:0:",":"."} / {if is_numeric($outputRow[$i][2])}{$outputRow[$i][2]|number_format:0:",":"."}{else}{$outputRow[$i][2]}{/if}</td>{else}
										<td colspan="2">&nbsp;</td> {/if}
									</tr>
									{/for}
								</tbody>
							</table>
						</div>
						<div class="col-sm-3">
							<p class="pull-right">
								<a href="index.php?page=production&hide={$plantName|base64_encode}"><span class="glyphicon glyphicon-eye-close"></span> ##HIDE##</a><br>
								<a href="index.php?page=factories&object={$plantData.i3dName}"><span class="glyphicon glyphicon-eye-open"></span> ##MORE_DETAILS##</a>
							</p>
						</div>
					</td>
				</tr>
				<tr></tr>
				{/foreach}
			</tbody>
		</table>
	</div>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">##SETTINGS##</h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" action="index.php?page=production" method="post">
					<div class="form-group">
						<label class="col-sm-5 control-label">##SORT_ORDER##</label>
						<div class="col-sm-7">
							<label class="radio-inline"> <input type="radio" name="sortByName" value="1"{if $options.sortByName}checked{/if}> ##ALPHABETICALLY##
							</label> <label class="radio-inline"> <input type="radio" name="sortByName" value="0"{if !$options.sortByName}checked{/if}> ##FILL_LEVEL##
							</label>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-5 control-label">##FULL_PRODUCT_STORAGE##</label>
						<div class="col-sm-7">
							<label class="radio-inline"> <input type="radio" name="sortFullProducts" value="1"{if $options.sortFullProducts}checked{/if}> ##SORT_FULL_PRODUCTS##
							</label><br> <label class="radio-inline"> <input type="radio" name="sortFullProducts" value="0"{if !$options.sortFullProducts}checked{/if}> ##IGNORE_FULL_PRODUCTS##
							</label>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-5 control-label">##TOOLTIP##</label>
						<div class="col-sm-7">
							<label class="radio-inline"> <input type="radio" name="showTooltip" value="1"{if $options.showTooltip}checked{/if}> ##YES##
							</label><br> <label class="radio-inline"> <input type="radio" name="showTooltip" value="0"{if !$options.showTooltip}checked{/if}> ##NO##
							</label><span id="helpBlock" class="help-block">##TOOLTIP_HELP##</span>
						</div>
					</div>
					{if $options.hidePlant|@count>0}
					<div class="form-group">
						<label class="col-sm-5 control-label">##SHOW_HIDDEN_PLANTS##</label>
						<div class="col-sm-7">
							{foreach from=$options.hidePlant key=$plant item=$bolean}
							<div class="checkbox">
								<label> <input type="checkbox" name="showPlant[]" value="{$plant|base64_encode}"> {$plant}
								</label>
							</div>
							{/foreach}
						</div>
					</div>
					{/if}
			
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">##CLOSE##</button>
				<button type="submit" class="btn btn-success">##SAVE##</button>
			</div>
		</div>
		</form>
	</div>
</div>
<script>{literal}
$(function () {
  $('[data-toggle="tooltip"]').tooltip({html: true})
})
{/literal}</script>