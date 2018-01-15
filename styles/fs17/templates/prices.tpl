<div class="page-header">
	<h3>
		##PRICES##<small> (##SAVETIME##: ##DAY## {$currentDay}, {$dayTime})</small><small
			class="pull-right"><a href="#" data-toggle="modal"
			data-target="#optionsDialog"><span class="glyphicon glyphicon-cog"
				aria-hidden="true"></span> ##SETTINGS##</a></small>
	</h3>
</div>
{$page = GetParam('upage','G',0)}
{$perpage = 8}
{$max = $prices|@count}
<div class="row">
	<div class="col-sm-12">
		<table class="table table-hover table-bordered table-striped">
			<tr>
				<th class="col-sm-2">##STOCKS##</th>
				{foreach $prices as $fillType => $fillTypeData}
				{$pos = $fillTypeData@iteration}
				{if $pos > ($page *$perpage) && $pos <= ($page*$perpage + $perpage) }
				<th class="col-sm-1 text-center">{$fillType}</th>
				{/if}
				{/foreach}
			</tr>
			{foreach $sellingPoints as $location => $i3dName}
			<tr>
				<th nowrap>{$location}</th>
				{foreach $prices as $fillType => $fillTypeData}
				{$pos = $fillTypeData@iteration}
				{if $pos > ($page *$perpage) && $pos <= ($page*$perpage + $perpage) }
				<td class="text-right">{if
					isset($fillTypeData.locations.$location)}{$fillTypeData.locations.$location.price|number_format:0:",":"."}{else}&nbsp;{/if}</td>
				{/if}
				{/foreach}
			</tr>
			{/foreach}
		</table>
		<p class="text-center text-warning">##PRICE_INFO##</p>
		<nav class="text-center" aria-label="Page navigation">
  			<ul class="pagination">
    			{if $page == 0}
    				<li class="disabled"><a href="#"><span aria-hidden="true">&laquo;</span></a></li>
				{else}
					<li><a href="index.php?page=prices&upage={$page-1}"><span>&laquo;</span></a></li>
				{/if}
				{for $i=1 to $max/$perpage|ceil}
				<li{if $i-1 == $page} class="active"{/if}><a href="index.php?page=prices&upage={$i-1}">{$i}</a></li>
    			{/for}
    			{if $page+1 >= $max/$perpage|ceil}
    				<li class="disabled"><a href="#"><span aria-hidden="true">&raquo;</span></a></li>
				{else}
					<li><a href="index.php?page=prices&upage={$page+1}"><span>&raquo;</span></a></li>
				{/if}
  			</ul>
		</nav>
	</div>
</div>
