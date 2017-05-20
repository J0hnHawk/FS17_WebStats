<div class="page-header">
	<h3>Serverübersicht</h3>
</div>
<div class="row">
	<div class="col-sm-2">
		<h4>&nbsp;</h4>
		<ul class="nav nav-pills nav-stacked">
			<li class="active"><a data-toggle="tab" href="#game">Spieldaten</a></li>
			<li><a data-toggle="tab" href="#player">Spieler</a></li>
			<li><a data-toggle="tab" href="#mods">Modifikationen</a></li>
			<li><a data-toggle="tab" href="#vehicles">Fahrzeuge</a></li>
			<li><a data-toggle="tab" href="#map">Karte</a></li>
		</ul>
	</div>
	<div class="col-sm-10 tab-content">
		<div id="game" class="tab-pane fade in active">
			<h4>Spieldaten</h4>
			<dl class="dl-horizontal">
				{foreach from=$game key=$var item=$value}
				<dt>{$var}</dt>
				<dd>{$value}</dd>
				{/foreach}
			</dl>
		</div>
		<div id="player" class="tab-pane fade">
			<h4>Spieler Online</h4>
			<div class="table-responsive">
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>Name</th>
							<th>Spielzeit</th>
							<th>Admin</th>
							<th>Position</th>
						</tr>
					</thead>
					<tbody>
						{if isset($players[0].name)} {foreach $players as $player}
						<tr>
							<td>{$player.name}</td>
							<td>{$player.online}</td>
							<td>{if $player.isAdmin}ja{else}nein{/if}</td>
							<td>{$player.position}</td>
						</tr>
						{/foreach}{else}
						<tr><td colspan="4">Zur Zeit sind keine Spieler online.</td></tr>{/if}
					</tbody>
				</table>
			</div>
		</div>
		<div id="mods" class="tab-pane fade">
			<h4>Aktive Mods</h4>
			<div class="table-responsive">
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>Name</th>
							<th>Version</th>
							<th>Author</th>
							<!-- <th>Hash</th> -->
							<th>Download</th>
						</tr>
					</thead>
					<tbody>
						{if isset($mods[0].name)} {foreach $mods as $mod}
						<tr>
							<td>{$mod.name}</td>
							<td>{$mod.version}</td>
							<td>{$mod.author}</td>
							<!-- <td>{$mod.hash}</td> -->
							<td><span class="glyphicon glyphicon-download" aria-hidden="true"></span></td>
						</tr>
						{/foreach}{else}
						<tr><td colspan="4">Es wurden keine Mods aktiviert.</td></tr>{/if}
					</tbody>
				</table>
			</div>
		</div>
		<div id="vehicles" class="tab-pane fade">
			<h4>Fahrzeuge</h4>
			<div class="table-responsive">
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>Name</th>
							<th>Gruppe</th>
							<th>Ladung</th>
							<th>Menge</th>
							<th>Position</th>
							<th>gesteuert von</th>
						</tr>
					</thead>
					<tbody>
						{if isset($vehicles[0].name)} {foreach $vehicles as $vehicle}
						<tr>
							<td>{$vehicle.name}</td>
							<td>{$vehicle.group}</td>
							<td>{$vehicle.fillTypes}</td>
							<td>{$vehicle.fillLevels}</td>
							<td>{$vehicle.position}</td>
							<td>{$vehicle.controller}</td>
						</tr>
						{/foreach}{else}
						<tr><td colspan="6">Es gibt keine Fahrzeuge.</td></tr>{/if}
					</tbody>
				</table>
			</div>
		</div>
		<div id="map" class="tab-pane fade">
			<h4>Karte</h4>
			<div id="mapContainer" style="position: relative; width: 1024px; height: 1024px; overflow: auto">
				<img src="{$linkToImage}">
				<div id="mapElementsContainer">
					{foreach $mapEntries as $key => $mapEntry}
					<div id="vehicle{$key}Container" style="position: absolute; left: {$mapEntry.xpos}px; top: {$mapEntry.zpos}px;" onmouseout="document.getElementById('vehicle{$key}').style.display='none'; document.getElementById('vehicle{$key}Image').src='{#PfadIMG#}{$mapEntry.icon}'; document.getElementById('vehicle{$key}Container').style.zIndex=1;"
						onmouseover="document.getElementById('vehicle{$key}').style.display='block'; document.getElementById('vehicle{$key}Image').src='{#PfadIMG#}{$mapEntry.iconHover}'; document.getElementById('vehicle{$key}Container').style.zIndex=10; ">
						<img id="vehicle{$key}Image" src="{#PfadIMG#}{$mapEntry.icon}" width="{$machineIconSize}" height="{$machineIconSize}">
						<div id="vehicle{$key}" style="display: none; position: absolute; bottom: 0px; left: 11px; background: {$backgroundColor}; padding-left: 8px; padding-right: 8px; color: #ffffff;">
							<nobr>{$mapEntry.name}</nobr>
						</div>
					</div>
					{/foreach}
				</div>
			</div>
		</div>
	</div>
</div>