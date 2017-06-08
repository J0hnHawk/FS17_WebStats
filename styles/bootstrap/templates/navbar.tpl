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
				<li class="{if $page == 'status'}active{/if}">
					<a href="index.php?page=overview"> <span class="glyphicon glyphicon-home"></span> Übersicht
					</a>
				</li>
				<li class="{if $page == 'storage'}active{/if}">
					<a href="index.php?page=storage"> <span class="glyphicon glyphicon-stats"></span> Lagerbestände
					</a>
				</li>
				<li class="{if $page == 'production'}active{/if}">
					<a href="index.php?page=production"> <span class="glyphicon glyphicon-list"></span> Produktionsanlagen
					</a>
				</li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li class="{if $page == 'options'}active{/if}">
					<a href="index.php?page=options"> <span class="glyphicon glyphicon-cog"></span> Einstellungen
					</a>
				</li>
				<li>
					<a href="#" data-toggle="modal" data-target="#infoModal"> <span class="glyphicon glyphicon-info-sign"></span> Info
					</a>
				</li>
			</ul>
		</div>
	</div>
</nav>
<!-- 
Vorlage Menüeinträge 
	<li class="{if $page == ''}active{/if}"><a href="#"> <span class="glyphicon glyphicon-list"></span> </a></li>

Rechtsbündig
	<ul class="nav navbar-nav navbar-right">
		<li><a href="#"> <span class="glyphicon glyphicon-log-out"></span> Abmelden</a></li>
	</ul>

Dropdownmeü		
	<li class="dropdown {if $page == 'status'}active{/if}"><a class="dropdown-toggle" data-toggle="dropdown" href="index.php?page=users&mode=list"> <span class="glyphicon glyphicon-user"></span> bServerstatus <span class="caret"></span></a>
		<ul class="dropdown-menu">
			<li><a href="index.php?page=game">Spiel</a></li>
			<li><a href="index.php?page=player">Spieler</a></li>
			<li><a href="index.php?page=mods">Mods</a></li>
			<li><a href="index.php?page=vehicles">Fahrzeuge</a></li>
			<li><a href="index.php?page=map">Karte</a></li>
		</ul>
	</li>

 -->
