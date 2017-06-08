{config_load file='../style.conf'}
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<meta name="description" content="WebStats für die Mod Map Nordfriesische Marsch">
<meta name="author" content="John Hawk">
<link rel="icon" href="{#PfadIMG#}favicon.ico">
<title>NF Marsch WebStats</title>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<link href="{#PfadCSS#}customstyle.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.php">NF Marsch WebStats</a>
			</div>
		</div>
	</nav>
	{if $success}
	<div class="container theme-showcase" role="main">
		<div class="jumbotron">
			<h1>Nordfriesische Marsch WebStats</h1>
			<p>Konfiguration erfolgreich gespeichert.</p>
			<p>
				<a class="btn btn-primary btn-lg" href="index.php" role="button">zur Übersicht wechseln &raquo;</a>
			</p>
		</div>
	</div>
	{else}
	<div class="container theme-showcase" role="main">
		<div class="jumbotron">
			<h1>Nordfriesische Marsch WebStats</h1>
			<p>
				Statuswebseite für die Farming Simulator 17 Mod Map "Nordfriesische Marsch". <br>Anzeige der Spieler, Mods, Fahrzeuge, Lagerbestände und
				Produktionsanlagen.
			</p>
		</div>
		<div class="page-header">
			<h1>Installation</h1>
		</div>
		<form class="form-horizontal" action="index.php?page=install" method="post">
			{if $error}{$error}{/if}
			<div class="form-group">
				<label for="Server-IP" class="col-sm-3 control-label">Server IP-Adresse</label>
				<div class="col-sm-7">
					<input type="ip" name="serverip" class="form-control" id="Server-IP" placeholder="IP-Adresse" {if $postdata|@count>
					0}value="{$postdata[0]}"{/if}> <span id="helpBlock" class="help-block">IP-Adresse des Farming Simulator 17 Dedicated Servers.</span>
				</div>
			</div>
			<div class="form-group">
				<label for="Server-Port" class="col-sm-3 control-label">Server-Port</label>
				<div class="col-sm-7">
					<input type="text" name="serverport" class="form-control" id="Server-Port" placeholder="Port" {if $postdata|@count>
					0}value="{$postdata[1]}"{/if}> <span id="helpBlock" class="help-block">Port der Web-API, nicht der Port für den Spiel-Client.</span>
				</div>
			</div>
			<div class="form-group">
				<label for="Server-Code" class="col-sm-3 control-label">Server-Code</label>
				<div class="col-sm-7">
					<input type="text" name="servercode" class="form-control" id="Server-Code" placeholder="Code" {if $postdata|@count>
					0}value="{$postdata[2]}"{/if}> <span id="helpBlock" class="help-block">Web-API Zugriffscode.</span>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-7 col-sm-3">
					<button type="submit" name="submit" value="server" class="pull-right btn btn-primary btn-block">Konfiguration speichern</button>
				</div>
			</div>
		</form>
	</div>
	{/if}
</body>
</html>
