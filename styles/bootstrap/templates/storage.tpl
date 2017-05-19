<div class="page-header">
	<h3>Lagerbestände</h3>
</div>
<div class="panel panel-primary">
	<div class="panel-heading">
		<h4 class="panel-title">Hofsilo</h4>
	</div>
	<div class="panel-body">
		{foreach from=$farmStorage key=$fillType item=$fillLevel}
		<div class="col-sm-3 col-md-2">
			<div class="panel panel-default">
				<div class="panel-heading">{$fillType}</div>
				<div class="panel-body text-right">{$fillLevel|number_format:0:",":"."}</div>
			</div>
		</div>
		{/foreach}
	</div>
</div>
<div class="panel panel-primary">
	<div class="panel-heading">
		<h4 class="panel-title">Paletten und Ballen</h4>
	</div>
	<div class="panel-body">
		{foreach from=$items key=$fillType item=$value}
		<div class="col-sm-4 col-md-3">
			<div class="panel panel-{if $value.outOfMap}danger{else}default{/if}">
				<div class="panel-heading">{$fillType} <span class="badge pull-right">{$value.count}</span></div>
				<div class="panel-body text-right">{$value.fillLevel|number_format:0:",":"."}</div>
			</div>
		</div>
		{/foreach}
	</div>
</div>
<div class="panel panel-primary">
	<div class="panel-heading">
		<h4 class="panel-title">Palettenlager</h4>
	</div>
	<div class="panel-body">
		{foreach from=$paletStorage key=$fillType item=$fillLevel}
		<div class="col-sm-3 col-md-2">
			<div class="panel panel-default">
				<div class="panel-heading">{$fillType}</div>
				<div class="panel-body text-right">{$fillLevel|number_format:0:",":"."}</div>
			</div>
		</div>
		{/foreach}
	</div>
</div>