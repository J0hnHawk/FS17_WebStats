<div class="page-header">
	<h3>
		##PRICES##<small> (##SAVETIME##: ##DAY## {$currentDay}, {$dayTime})</small><small class="pull-right"><a href="#" data-toggle="modal"
			data-target="#optionsDialog"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> ##SETTINGS##</a></small>
	</h3>
</div>
{$mode = GetParam('umode','G',0)} {if $mode == 1} {$page = GetParam('upage','G',0)} {$perpage = 8} {$max = $prices|@count}
<div class="row">
	<div class="col-sm-12">
		<table class="table table-hover table-bordered table-striped">
			<tr>
				<th class="col-sm-2">##STOCKS##</th> {foreach $prices as $fillType => $fillTypeData} {$pos = $fillTypeData@iteration} {if $pos > ($page *$perpage)
				&& $pos <= ($page*$perpage + $perpage) }
				<th class="col-sm-1 text-center">{$fillType}</th> {/if} {/foreach}
			</tr>
			{foreach $sellingPoints as $location => $i3dName}
			<tr>
				<th nowrap>{$location}</th> {foreach $prices as $fillType => $fillTypeData} {$pos = $fillTypeData@iteration} {if $pos > ($page *$perpage) && $pos
				<= ($page*$perpage + $perpage) }
				<td class="text-right">{if isset($fillTypeData.locations.$location)}{$fillTypeData.locations.$location.price|number_format:0:",":"."} {if
					$fillTypeData.priceTrend == 1} <span class="glyphicon glyphicon-triangle-top text-success" aria-hidden="true"></span>{elseif
					$fillTypeData.priceTrend == -1} <span class="glyphicon glyphicon-triangle-bottom text-danger" aria-hidden="true"></span>{else} <span
					class="glyphicon glyphicon-arrow-down" style="visibility: hidden"><span>{/if}{else}&nbsp;{/if} 
				
				</td> {/if} {/foreach}
			</tr>
			{/foreach}
		</table>
		<p class="text-center text-warning">##PRICE_INFO##</p>
		<nav class="text-center" aria-label="Page navigation">
			<ul class="pagination">
				{if $page == 0}
				<li class="disabled"><a href="#"><span aria-hidden="true">&laquo;</span></a></li> {else}
				<li><a href="index.php?page=prices&upage={$page-1}&umode=1"><span>&laquo;</span></a></li> {/if} {for $i=1 to $max/$perpage|ceil}
				<li {if $i-1== $page} class="active"{/if}><a href="index.php?page=prices&upage={$i-1}&umode=1">{$i}</a></li> {/for} {if $page+1 >=
				$max/$perpage|ceil}
				<li class="disabled"><a href="#"><span aria-hidden="true">&raquo;</span></a></li> {else}
				<li><a href="index.php?page=prices&upage={$page+1}&umode=1"><span>&raquo;</span></a></li> {/if}
			</ul>
		</nav>
	</div>
</div>
{else}
<div class="row">
	<div class="col-sm-12">
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/dt-1.10.16/datatables.min.css"/>
		<table class="table table-hover table-bordered table-striped" id="bestPrices">
			<thead>
				<tr>
					<th class="text-center">##STOCK##</th>
					<th class="text-center">##SELLTRIGGER##</th>
					<th class="text-center">##MIN_PRICE##</th>
					<th class="text-center">##MAX_PRICE##</th>
					<th class="text-center">##BEST_PRICE##</th>
					<th class="text-center">##PERCENT##</th>
					<th class="text-center">##STOCKS##</th>
					<th class="text-center">##PROCEEDS##</th>
				</tr>
			</thead>
			<tbody>
				{foreach $prices as $fillType => $fillTypeData} {math equation="round(100 / max * current)" max=$fillTypeData.maxPrice-$fillTypeData.minPrice
				current=$fillTypeData.bestPrice-$fillTypeData.minPrice assign="percent"}
				<tr>
					<td>{$fillType}</td>
					<td>{$fillTypeData.bestLocation}</td>
					<td class="text-right col-sm-1">{$fillTypeData.minPrice|number_format:0:",":"."}</td>
					<td class="text-right col-sm-1">{$fillTypeData.maxPrice|number_format:0:",":"."}</td>
					<td class="text-right col-sm-1 {if $percent>=60}text-success{elseif $percent<=40}text-danger{/if}">{$fillTypeData.bestPrice|number_format:0:",":"."}
						{if $fillTypeData.priceTrend == 1} <span class="glyphicon glyphicon-triangle-top text-success" aria-hidden="true"></span>{elseif
						$fillTypeData.priceTrend == -1} <span class="glyphicon glyphicon-triangle-bottom text-danger" aria-hidden="true"></span>{else} <span
						class="glyphicon glyphicon-arrow-down" style="visibility: hidden"><span>{/if} 
					
					</td>
					<td class="text-center">{$percent|number_format:0:",":"."} %</td> {if isset($commodities.$fillType) && $commodities.$fillType.overall > 0}
					<td class="text-right col-sm-1">{$commodities.$fillType.overall|number_format:0:",":"."}</td> {$proceeds = $commodities.$fillType.overall *
					$fillTypeData.bestPrice / 1000}
					<td class="text-right col-sm-1">{$proceeds|number_format:0:",":"."}</td> {else}
					<td></td>
					<td></td> {/if}
				</tr>
				{/foreach}
			</tbody>
		</table>
		<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
		<script>
		$(document).ready(function() {
		    $('#bestPrices').DataTable( {
		    	"bFilter": false,
		    	paging: false,
		    	"info": false,
		        "language": {
		            "decimal": ",",
		            "thousands": ".",
		            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/German.json"
		        }
		    } );
		} );
		</script>
	</div>
</div>
{/if}
