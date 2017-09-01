<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="WebStats für die Mod Map Nordfriesische Marsch">
<meta name="author" content="John Hawk">
<link rel="icon" href="./images/favicon.ico">
<title>NF Marsch {$mapVersion} WebStats</title>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<link href="./css/customstyle.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		{include file='navbar.tpl'} {if $serverOnline}{assign var="fullPathToTemplate" value="./templates/$page.tpl"} {if file_exists($fullPathToTemplate)} {include file="$page.tpl"} {else}
		<div class="container theme-showcase" role="main">
			<div class="jumbotron">
				<h1>Fehler beim Seitenaufruf</h1>
				<p class="lead">Die Datei {$fullPathToTemplate} existiert nicht.</p>
			</div>
		</div>
		{/if}{else}
		<div class="container theme-showcase" role="main">
			<div class="jumbotron">
				<h1>Verbindungsfehler</h1>
				<p class="lead">Es konnten keine Daten vom Dedicated Server abgerufen werden. Bitte prüfe die Serveradresse oder Internetverbindung.</p>
			</div>
		</div>
		{/if}
	</div>
	<!-- Modal -->
	<div id="infoModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Nordfriesische Marsch {$mapVersion} WebStats</h4>
				</div>
				<div class="modal-body">
					<p>{$webStatsVersion}</p>
					<p>Copyright (c) 2017, John Hawk</p>
					<p>Webseite zur Anzeige des Serverstatus sowie Überwachung der Produktionsanlagen und Lagerbestände.</p>
					<p>
						Author: John Hawk &lt;<a href="mailto:John Hawk <john.hawk@ gmx.net>">john.hawk@gmx.net</a>&gt;
					</p>
				</div>
				<div class="modal-footer">
					<!-- <small class="pull-left"><a href="index.php?page=lizenz">Informationen zur Lizenzierung</a> - <a href="index.php?page=changelog">Changelog</a></small> -->
					<button type="button" class="btn btn-default" data-dismiss="modal">Schließen</button>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
