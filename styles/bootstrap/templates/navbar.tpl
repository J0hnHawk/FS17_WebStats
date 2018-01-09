<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">##TOGGLE##</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="index.php">{$map.Short} {$map.Version} WebStats</a>
		</div>
		<div id="navbar" class="collapse navbar-collapse">
			<ul class="nav navbar-nav">
				<li class="{if $page == 'storage'}active{/if}"><a href="index.php?page=storage"> <span class="glyphicon glyphicon-stats"></span> ##STORAGE##
				</a></li>
				<li class="{if $page == 'production'}active{/if}"><a href="index.php?page=production"> <span class="glyphicon glyphicon-list"></span> ##PRODUCTION##
				</a></li>
				<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <span class="glyphicon glyphicon-search"></span> ##DETAILS## <span class="caret"></span>
				</a>
					<ul class="dropdown-menu">
						{if $isDediServer}
						<li class="{if $page == 'status'}active{/if}"><a href="index.php?page=overview"> <span class="glyphicon glyphicon-home"></span> ##SERVER##
						</a></li> {/if}
						<li class="{if $page == 'husbandry'}active{/if}"><a href="index.php?page=husbandry"> <span class="glyphicon glyphicon-piggy-bank"></span> ##ANIMALS##
						</a></li>
						<li class="{if $page == 'factories'}active{/if}"><a href="index.php?page=factories"> <span class="glyphicon glyphicon-home"></span> ##FACTORY##
						</a></li>
						<li class="{if $page == 'commodity'}active{/if}"><a href="index.php?page=commodity"> <span class="glyphicon glyphicon-object-align-bottom"></span> ##COMMODITIES##
						</a></li>
						<li class="{if $page == 'prices'}active{/if}"><a href="index.php?page=prices"> <span class="glyphicon glyphicon glyphicon-euro"></span> ##PRICES##
						</a></li>
					</ul></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li class="{if $page == 'options'}active{/if}"><a href="index.php?page=options"> <span class="glyphicon glyphicon-cog"></span> ##SETTINGS##
				</a></li>
				<li><a href="#" data-toggle="modal" data-target="#infoModal"> <span class="glyphicon glyphicon-info-sign"></span> ##INFO##
				</a></li>
			</ul>
		</div>
	</div>
</nav>
