<div class="page-header">
	<h3>{$game.game} &bull; ##VERSION## {$game.version} &bull; {$game.mapName}</h3>
</div>
<div class="row">
	<div class="col-sm-12">
		<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>##PLAYER##</th>
					<th>##UPTIME##</th>
					<th>##ISADMIN##</th>
					<th>##POSITION##</th>
				</tr>
			</thead>
			<tbody>
				{if isset($players[0].name)} {foreach $players as $player}
				<tr>
					<td>{$player.name}</td>
					<td>{$player.online}</td>
					<td>{if $player.isAdmin}##YES##{else}##NO##{/if}</td>
					<td>{$player.position}</td>
				</tr>
				{/foreach} {else}
				<tr>
					<td colspan="4">##NOPLAYER##</td>
				</tr>
				{/if}
			</tbody>
		</table>
		<div id="mapContainer" style="position: relative; width: 1024px; height: 1024px; overflow: auto">
			<img src="{$linkToImage}" onerror="this.onerror=null;this.src='./config/{$map.Path}/pda_map_H.jpg';" height="1024" width="1024"/>
			<div id="mapElementsContainer">
				{foreach $mapEntries as $key => $mapEntry}
				<div id="vehicle{$key}Container" style="position: absolute; left: {$mapEntry.xpos}px; top: {$mapEntry.zpos}px;" onmouseout="document.getElementById('vehicle{$key}').style.display='none'; document.getElementById('vehicle{$key}Image').src='./images/{$mapEntry.icon}'; document.getElementById('vehicle{$key}Container').style.zIndex=1;"
					onmouseover="document.getElementById('vehicle{$key}').style.display='block'; document.getElementById('vehicle{$key}Image').src='./styles/{$style}/images/{$mapEntry.iconHover}'; document.getElementById('vehicle{$key}Container').style.zIndex=10; ">
					<img id="vehicle{$key}Image" src="./styles/{$style}/images/{$mapEntry.icon}" width="{$machineIconSize}" height="{$machineIconSize}">
					<div id="vehicle{$key}" style="display: none; position: absolute; bottom: 0px; left: 11px; background: {$backgroundColor}; padding-left: 8px; padding-right: 8px; color: #ffffff;">
						<nobr>{$mapEntry.name}</nobr>
					</div>
				</div>
				{/foreach}
			</div>
		</div>
	</div>
</div>
