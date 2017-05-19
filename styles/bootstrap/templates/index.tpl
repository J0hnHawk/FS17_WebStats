{config_load file='../style.cfg'}
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<meta name="description"
	content="WebStats für die Mod Map Nordfriesische Marsch 2.4">
<meta name="author" content="John Hawk">
<link rel="icon" href="{#PfadIMG#}favicon.ico">
<title>NF Marsch 2.4 WebStats</title>
<link
	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
	rel="stylesheet">
<link href="{#PfadCSS#}customstyle.css" rel="stylesheet">
</head>
<body>
	<div class="container">
		{include file='navbar.tpl'} {assign var="fullPathToTemplate"
		value="./styles/$style/templates/$page.tpl"} {if
		file_exists($fullPathToTemplate)} {include file="$page.tpl"} {else}
		<div class="starter-template">
			<h1>Fehler beim Seitenaufruf</h1>
			<p class="lead">Die Datei {$file} existiert nicht.</p>
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
					<h4 class="modal-title">Nordfriesische Marsch 2.4 WebStats</h4>
				</div>
				<div class="modal-body">
					<p>Version 0.1.0</p>
					<p>Copyright (c) 2017, John Hawk</p>
					<p>Webseite zur Anzeige des Serverstatus sowie Überwachung der
						Produktionsanlagen und Lagerbestände.</p>
					<p>
						Author: John Hawk &lt; <a href="mailto:John hawk <john.hawk@
							gmx.net>">john.hawk@gmx.net</a> &gt;
					</p>
				</div>
				<div class="modal-footer">
					<small class="pull-left"><a href="index.php?page=lizenz">Informationen
							zur Lizenzierung</a></small>
					<button type="button" class="btn btn-default" data-dismiss="modal">Schließen</button>
				</div>
			</div>
		</div>
	</div>
	<footer class="footer">
		<div class="container">
			<p class="text-muted">
				Powered By <a href="http://www.giants-software.com/">GIANTS Software</a>
			</p>
		</div>
	</footer>
	<!-- Bootstrap core JavaScript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script
		src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script
		src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
