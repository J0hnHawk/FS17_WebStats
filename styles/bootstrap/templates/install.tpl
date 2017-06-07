{config_load file='../style.cfg'} {config_load file="../../../language/$languagePath/lang.conf" section='install'}
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
				<a class="navbar-brand" href="#">NF Marsch WebStats</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<form class="navbar-form navbar-right" action="index.php?page=install" method="post">
					<div class="form-group">
						<select class="form-control" name="language"> {foreach $languages as $language}
							<option value="{$language.path}">{$language.localName}</option> {/foreach}
						</select>
					</div>
					<button type="submit" name="submit" value="language" class="btn btn-success">{#l_change#}</button>
				</form>
				<span class="navbar-right navbar-text">{#l_select_lang#}:</span>
			</div>
			<!--/.navbar-collapse -->
		</div>
	</nav>
	<div class="container theme-showcase" role="main">
		<div class="jumbotron">
			<h1>{#l_jumbotron#}</h1>
			<p>{#l_jumbotron_text#}</p>
		</div>
		<div class="page-header">
			<h1>{#l_page_header#}</h1>
		</div>
		<form class="form-horizontal">
			{if $error}{$error}{elseif $success}{$success}{/if}
			<div class="form-group">
				<label for="Server-IP" class="col-sm-3 control-label">{#l_label_ip#}</label>
				<div class="col-sm-7">
					<input type="email" name="serverip" class="form-control" id="Server-IP" placeholder="{#l_placeholder_ip#}">
					<span id="helpBlock" class="help-block">{#l_help_ip#}</span>
				</div>
			</div>
			<div class="form-group">
				<label for="Server-Port" class="col-sm-3 control-label">{#l_label_port#}</label>
				<div class="col-sm-7">
					<input type="text" name="serverport" class="form-control" id="Server-Port" placeholder="{#l_placeholder_port#}">
					<span id="helpBlock" class="help-block">{#l_help_port#}</span>
				</div>
			</div>
			<div class="form-group">
				<label for="Server-Code" class="col-sm-3 control-label">{#l_label_code#}</label>
				<div class="col-sm-7">
					<input type="text" name="servercode" class="form-control" id="Server-Code" placeholder="{#l_placeholder_code#}">
					<span id="helpBlock" class="help-block">{#l_help_code#}</span>
				</div>
			</div>
			<div class="form-group">
				<label for="Language" class="col-sm-3 control-label">{#l_select_lang#}</label>
				<div class="col-sm-7">
					<select class="form-control" name="language"> {foreach $languages as $language}
							<option value="{$language.path}">{$language.localName}</option> {/foreach}
						</select>
					<span id="helpBlock" class="help-block">{#l_help_language#}</span>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-7 col-sm-3">
					<button type="submit" name="submit" value="server" class="pull-right btn btn-primary btn-block">{#l_save_config#}</button>
				</div>
			</div>
		</form>
	</div>
	</div>
</body>
</html>
