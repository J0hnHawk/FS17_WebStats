<div class="page-header">
	<h3>
		##PRICES##<small> (##SAVETIME##: ##DAY## {$currentDay}, {$dayTime})</small><small class="pull-right"><a href="#" data-toggle="modal"
			data-target="#optionsDialog"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> ##SETTINGS##</a></small>
	</h3>
</div>
<div class="row">
	<div class="col-sm-12" style="overflow-x: scroll; margin: 0 auto;">
		<table class="table table-hover table-bordered table-striped">
			<tr>
				<th>##STOCKS##</th> {foreach $prices as $fillType => $fillTypeData}
				<th>{$fillType}</th> {/foreach}
			</tr>
			{foreach $tipTrigger as $location => $i3dName}
			<tr>
				<th>{$location}</th>{foreach $prices as $fillType => $fillTypeData}
				<td>{if isset($fillTypeData.locations.$location)}{$fillTypeData.locations.$location.price}{else}&nbsp;{/if}</td> {/foreach}
			</tr>
			{/foreach}
		</table>
	</div>
</div>