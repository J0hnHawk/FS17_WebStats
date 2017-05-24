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
				{foreach from=$commodities key=$fillType item=$fillLevel} {if
				$fillLevel@iteration <= 15}
				<tr data-toggle="collapse" href="#collapse{$fillType}">
					<td>{$fillType}</td>
					<td class="text-right">{$fillLevel.overall|number_format:0:",":"."}</td>
				</tr>
				<tr class="collapse" id="collapse{$fillType}">
					<td colspan="3">
						<table class="table">
							<thead>
								<tr>
									<th>Ort</th>
									<th>Menge</th>
									<th>Anzahl</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Farmsilo</td>
									<td>1.000.000</td>
									<td>&nbsp;</td>
								</tr>
							</tbody>
						</table>
					</td>
				</tr>
				{/if} {/foreach}
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
				{foreach from=$commodities key=$fillType item=$fillLevel} {if
				$fillLevel@iteration > 15 && $fillLevel@iteration <= 30}
				<tr data-toggle="collapse" href="#collapse{$fillType}">
					<td>{$fillType}</td>
					<td class="text-right">{$fillLevel.overall|number_format:0:",":"."}</td>
				</tr>
				<tr class="collapse" id="collapse{$fillType}">
					<td colspan="3">
						<dl class="dl-horizontal">
							<dt>Hofsilo</dt>
							<dd>1.000.000</dd>
						</dl>
						<dl class="dl-horizontal">
							<dt>Brauerei (2 Paletten)</dt>
							<dd>1.000.000</dd>
						</dl>
					</td>
				</tr>
				{/if} {/foreach}
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
				{foreach from=$commodities key=$fillType item=$fillLevel} {if
				$fillLevel@iteration > 30}
				<tr data-toggle="modal" data-target="#storageDetails">
					<td>{$fillType}</td>
					<td class="text-right">{$fillLevel.overall|number_format:0:",":"."}</td>
				</tr>
				{/if} {/foreach}
			</tbody>
		</table>
	</div>
</div>
<div class="modal fade" id="storageDetails" tabindex="-1" role="dialog"
	aria-labelledby="exampleModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"
					aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="exampleModalLabel">New message</h4>
			</div>
			<div class="modal-body">
				<form>
					<div class="form-group">
						<label for="recipient-name" class="control-label">Recipient:</label>
						<input type="text" class="form-control" id="recipient-name">
					</div>
					<div class="form-group">
						<label for="message-text" class="control-label">Message:</label>
						<textarea class="form-control" id="message-text"></textarea>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Send message</button>
			</div>
		</div>
	</div>
</div>
<!-- 
<div class="panel panel-primary">
	<div class="panel-heading">
		<h4 class="panel-title">Hofsilo</h4>
	</div>
	<div class="panel-body">
		{foreach from=$farmStorage key=$fillType item=$fillLevel}
<div class="col-sm-4 col-md-3">
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
		<div class="col-sm-4 col-md-3">
			<div class="panel panel-default">
				<div class="panel-heading">{$fillType}</div>
				<div class="panel-body text-right">{$fillLevel|number_format:0:",":"."}</div>
			</div>
		</div>
		{/foreach}
	</div>
</div>
 -->