<div class="row">
	<div class="col-sm-12 col-md-7">
		<div class="row">
			<div class="col-sm-12">
				<div class="page-header">
					<h3>##WEATHER##<small> (##SAVETIME##: ##DAY## {$currentDay}, {$dayTime})</small></h3>
				</div>
				<table class="table">
					<thead>
						<tr>
							<th>##TODAY##</th>
							{for $day = 1 to 6}
							<th>##{$weekdays[($currentDay+$day)%7]}##</th>
							{/for}
						</tr>
					</thead>
					<tbody>
					<tr>
						{for $day = $currentDay to $currentDay + 6}
						<td>
						{if isset($forecast.$day)}
						<img src="./styles/{$style}/images/{$forecast.$day}.png" width="48px" height="48px" class="img-responsive">
						{else}
						<img src="./styles/{$style}/images/sun.png" width="48px" height="48px" class="img-responsive">
						{/if}
						</td>
						{/for}
					</tr>
					</tbody>
				</table>
			</div>
			<div class="col-sm-12">
				<div class="page-header">
					<h3>##NEWS##</h3>
				</div>
				<dl class="dl-horizontal">
					{if $demandIsRunning}
					<dt>##GREAT_DEMAND##</dt>
					<dd>
						{foreach $greatDemands as $filltype => $locationData}
						{foreach $locationData.locations as $location => $demandData}
						{if $demandData.isRunning}
						<p>{$location} ##PAYS_ACTUAL## {$prices.$filltype.locations.$location.price|number_format:0:",":"."} ##FOR## <a href="index.php?page=commodity&object={$locationData.i3dName}">{$filltype}</a></p>
						{/if}{/foreach}{/foreach}
					</dd>
					{/if}
					<dt>##SALES##</dt>
					<dd>
						{$end=$currentDay*3}
						{foreach $sales as $day => $sale}
							{if $day < $end}
							<p>
							{if $sale.isRunning}
							<strong class="text-warning">##ACTUAL##:</strong> 
							{else}
							##STARTING## ##{$weekdays[$sale.saleStartDay%7]}##,
							{/if}
							{$sale.discount} % ##DISCOUNT## {$sale.filename} 
							{if $sale.isBrandSale}##WHOLE_BRAND##{/if}
							</p>
							{/if}
						{/foreach}
					</dd>
				</dl>
			</div>
		</div>
	</div>
	<div class="col-sm-12 col-md-5">
		<div class="page-header">
			<h3>##FINANCES5DAYS##</h3>
		</div>
		<table class="table">
			<thead>
				<tr>
					<th>##OPERATING_RESULT##</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				{foreach $financeSummary as $text => $value}
				{if $value > 0}
				<tr>
					<td>##{$text}##</td>
					<td class="text-right">{$value|number_format:0:",":"."}</td>
				</tr>
				{/if}
				{/foreach}		
				{foreach $financeSummary as $text => $value}
				{if $value < 0}
				<tr>
					<td>##{$text}##</td>
					<td class="text-right">{$value|number_format:0:",":"."}</td>				
				</tr>
				{/if}
				{/foreach}
			</tbody>
			<tfoot>
				<tr>
					<th>##TOTAL##</th>
					<th class="text-right">{$operatingResult|number_format:0:",":"."}</th>
				</tr>
				<tr>
					<td><strong>##BALANCE##</strong></td>
					<td class="text-right"><strong>{$money|number_format:0:",":"."}</strong></td>
				</tr>
			</tfoot>
		</table>
	</div>	
</div>
{if $isDediServer}
<div class="page-header">
	<h3>{$game.game} &bull; ##VERSION## {$game.version} &bull; {$game.mapName}</h3>
</div>
<div class="row">
	<div class="col-sm-6">
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
	</div>
	<div class="col-sm-6">
		<div id="mapContainer" style="position: relative; width: 512px; height: 512px; overflow: auto">
			<img src="{$linkToImage}" onerror="this.onerror=null;this.src='./config/{$map.Path}/pda_map_H.jpg';" height="1024" width="1024"/>
			<div id="mapElementsContainer">
				{foreach $mapEntries as $key => $mapEntry}
				<div id="vehicle{$key}Container" style="position: absolute; left: {$mapEntry.xpos}px; top: {$mapEntry.zpos}px;" onmouseout="document.getElementById('vehicle{$key}').style.display='none'; document.getElementById('vehicle{$key}Image').src='./styles/{$style}/images/{$mapEntry.icon}'; document.getElementById('vehicle{$key}Container').style.zIndex=1;"
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
{/if}