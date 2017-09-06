<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="index.php">NF Marsch {$mapVersion} WebStats</a>
		</div>
		<div id="navbar" class="collapse navbar-collapse">
			<ul class="nav navbar-nav">
				{if $isDediServer}
				<li class="{if $page == 'status'}active{/if}"><a href="index.php?page=overview"> <span class="glyphicon glyphicon-home"></span> Server
				</a></li> {/if}
				<li class="{if $page == 'storage'}active{/if}"><a href="index.php?page=storage"> <span class="glyphicon glyphicon-stats"></span> Lager
				</a></li>
				<li class="{if $page == 'production'}active{/if}"><a href="index.php?page=production"> <span class="glyphicon glyphicon-list"></span> Produktion
				</a></li>
				<li class="{if $page == 'factories'}active{/if}"><a href="index.php?page=factories"> <span class="glyphicon glyphicon-home"></span> Fabriken
				</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li class="{if $page == 'options'}active{/if}"><a href="index.php?page=options"> <span class="glyphicon glyphicon-cog"></span> Einstellungen
				</a></li>
				<li><a href="#" data-toggle="modal" data-target="#infoModal"> <span class="glyphicon glyphicon-info-sign"></span> Info
				</a></li>
			</ul>
		</div>
	</div>
</nav>
