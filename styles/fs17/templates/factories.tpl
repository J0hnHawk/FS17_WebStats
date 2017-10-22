<div class="page-header">
	<h3>
		{$plantName}<small> (##SAVETIME##: ##DAY## {$currentDay}, {$dayTime})</small><small class="pull-right"><button type="button"
				class="btn btn-primary" data-toggle="modal" data-target="#modalMenu">##CHOOSE_PLANT##</button> </small>
	</h3>
</div>
<div class="row">
	<div class="col-sm-8 col-sm-offset-1">
		{$plantData = $plants.$plantName}
		<h4>##REQUIRED##</h4>
		<table class="table table-striped">
			<thead>
				<tr>
					<th width="28%">##COMMODITIES##</th>
					<th width="18%" class="text-right">##STORAGE##</th>
					<th width="18%" class="text-right">##CAPACITY##</th>
					<th width="18%" class="text-right">##REQUIRE_HOUR##</th>
					<th width="18%" class="text-right">##REQUIRE_DAY##</th>
				</tr>
			</thead>
			<tbody>
			{foreach $plantData.input as $fillTypeName => $fillTypeData}				
				<tr>
					<td><a href="index.php?page=commodity&object={$fillTypeData.i3dName}">{$fillTypeName}</a></td>
					<td class="text-right">{$fillTypeData.fillLevel|number_format:0:",":"."}</td>
					<td class="text-right">{if is_numeric($fillTypeData.fillMax)}{$fillTypeData.fillMax|number_format:0:",":"."}{else}{$fillTypeData.fillMax}{/if}</td>
					<td class="text-right">{$fillTypeData.prodPerHour|number_format:0:",":"."}</td>
					<td class="text-right">{$fillTypeData.prodPerDay|number_format:0:",":"."}</td>
				</tr>
			{/foreach}
			</tbody>
		</table>
		<hr>
		<h4>##PRODUCED_GOODS##</h4>
		<table class="table table-striped">
			<thead>
				<tr>
					<th width="28%">##COMMODITIES##</th>
					<th width="18%" class="text-right">##STORAGE##</th>
					<th width="18%" class="text-right">##CAPACITY##</th>
					<th width="18%" class="text-right">##PRODUCT_HOUR##</th>
					<th width="18%" class="text-right">##PRODUCT_DAY##</th>
				</tr>
			</thead>
			<tbody>
			{foreach $plantData.output as $fillTypeName => $fillTypeData}
				<tr>
					<td><a href="index.php?page=commodity&object={$fillTypeData.i3dName}">{$fillTypeName}</a></td>
					<td class="text-right">{$fillTypeData.fillLevel|number_format:0:",":"."}</td>
					<td class="text-right">{if is_numeric($fillTypeData.fillMax)}{$fillTypeData.fillMax|number_format:0:",":"."}{else}{$fillTypeData.fillMax}{/if}</td>
					<td class="text-right">{$fillTypeData.prodPerHour|number_format:0:",":"."}</td>
					<td class="text-right">{$fillTypeData.prodPerDay|number_format:0:",":"."}</td>
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
				<h4 class="modal-title" id="myModalLabel">##CHOOSE_PLANT##</h4>
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
				<button type="button" class="btn btn-default" data-dismiss="modal">##CLOSE##</button>
			</div>
		</div>
		</form>
	</div>
</div>
