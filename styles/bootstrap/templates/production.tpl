<div class="page-header">
	<h3>
		Produktionsanlagen<small class="pull-right"><a href="#" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-cog"
				aria-hidden="true"></span> Einstellungen</a></small>
	</h3>
</div>
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
				{foreach from=$plants key=$plant item=$inout}
				<tr>
					<td>{$plant}</td>
					<td>{foreach from=$inout.input key=$fillType item=$fillLevel}{$fillType}, {/foreach}</td>
					<td>{foreach from=$inout.output key=$fillType item=$fillLevel}{$fillType}, {/foreach}</td>
				</tr>
				{/foreach}
			</tbody>
		</table>
	</div>
</div>
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
							<div class="col-sm-6 text-right">{$fillLevel|number_format:0:",":"."}</div>
						</div>
						{/foreach}
					</div>
					<div class="col-sm-6">
						{foreach from=$inout.output key=$fillType item=$fillLevel}
						<div class="row">
							<div class="col-sm-6 text-nowrap">{$fillType}</div>
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
							<label class="radio-inline">
								<input type="radio" name="sortByName" value="1"{if $options.sortByName}checked{/if}> alphabetisch
							</label>
							<label class="radio-inline">
								<input type="radio" name="sortByName" value="0"{if !$options.sortByName}checked{/if}> nach Füllstand
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