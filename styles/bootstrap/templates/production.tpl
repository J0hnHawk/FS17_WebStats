<div class="page-header">
	<h3>Produktionsanlagen</h3>
</div>
<div class="row">
<!-- 
	<div class="col-sm-12">
		<table class="table">
			<thead>
				<tr>
					<th>Produktionsstätte</th>
					<th>Rohstoffe</th>
					<th>Produkte</th>
				</tr>
			</thead>
			<tbody>
				{foreach from=$plants key=$plant item=$inout}
				<tr class="{$inout.class}">
					<th>{$plant}</th>
					<td>{foreach from=$inout.input key=$fillType item=$fillLevel} {$fillType}: <span class="pull-right">{$fillLevel|number_format:0:",":"."}</span><br> {/foreach}
					</td>
					<td>{foreach from=$inout.output key=$fillType item=$fillLevel} {$fillType}: <span class="pull-right">{$fillLevel|number_format:0:",":"."}</span><br> {/foreach}
					</td>
				</tr>
				{/foreach}
			</tbody>
		</table>
	</div>
 -->
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
							<div class="col-sm-6">{$fillType}</div>
							<div class="col-sm-6 text-right">{$fillLevel|number_format:0:",":"."}</div>
						</div>
						{/foreach}
					</div>
					<div class="col-sm-6">
						{foreach from=$inout.output key=$fillType item=$fillLevel}
						<div class="row">
							<div class="col-sm-6">{$fillType}</div>
							<div class="col-sm-6 text-right">{$fillLevel|number_format:0:",":"."}</div>
						</div>
						{/foreach}
					</div>
				</div>
			</div>
		</div>
	</div>
	{/foreach}
</div>