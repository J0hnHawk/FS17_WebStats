{config_load file='../style.cfg'}<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<meta name="description" content="Farming Simulator 17 WebStats">
<meta name="author" content="John Hawk">
<link rel="icon" href="./images/favicon.ico">
<title>FS17 WebStats</title>
<link href="{#CSS#}/bootstrap.min.css" rel="stylesheet">
<link href="{#CSS#}/theme.min.css" rel="stylesheet">
<link href="{#CSS#}/customstyle.css" rel="stylesheet">
<script src="{#SCRIPTS#}/jquery.min.js"></script>
<script src="{#SCRIPTS#}/bootstrap.min.js"></script>
</head>
<body>
	<nav class="navbar navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">##TOGGLE##</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.php">FS17 WebStats</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<form class="navbar-form navbar-right" action="index.php?page=install" method="post">
					<div class="form-group">
						<select class="form-control" name="language"> {foreach $languages as $language}
							<option value="{$language.path}" {if $language.path==$smarty.session.language}selected{/if}>{$language.localName}</option> {/foreach}
						</select>
					</div>
					<button type="submit" name="submit" value="language" class="btn btn-success">##CHOOSE_LANGUAGE##</button>
				</form>
				<span class="navbar-right navbar-text">##CHOOSE_LANGUAGE_LABEL##:</span>
			</div>
		</div>
	</nav>
	{if $success}
	<div class="container" role="main">
		<div class="jumbotron">
			<h1>Farming Simulator 17 WebStats</h1>
			<p>##CONFIG_SAVED##</p>
			<p>
				<a class="btn btn-primary btn-lg" href="index.php" role="button">##CONTINUE## &raquo;</a>
			</p>
		</div>
	</div>
	{else}
	<div class="container" role="main">
		<div class="page-header">
			<h1>Farming Simulator 17 WebStats</h1>
			<p>##DESCRIPTON##</p>
		</div>
		<div class="page-header">
			<h2>##INSTALL_TITLE##</h2>
		</div>
		<div>
			<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
				<li role="presentation" class="active"><a href="#server" aria-controls="server" role="tab" data-toggle="tab">##DEDICATED##</a></li>
				<li role="presentation"><a href="#local" aria-controls="local" role="tab" data-toggle="tab">##LOCAL##</a></li>
			</ul>

			<!-- Tab panes -->
			<div class="tab-content">
				<div role="tabpanel" class="tab-pane active" id="server">
					<form class="form-horizontal" action="index.php?page=install" method="post">
						<h3>##DEDICATED##</h3>
						{if $fsockopen} {if $error}{$error}{/if}
						<div class="form-group">
							<label for="Server-IP" class="col-sm-3 control-label">##DS_LABEL1##</label>
							<div class="col-sm-7">
								<input type="ip" name="serverip" class="form-control" id="Server-IP" placeholder="##DS_PLACEHOLDE1##" {if $postdata|@count>
								0}value="{$postdata[0]}"{/if}> <span id="helpBlock" class="help-block">##DS_HELP_BLOCK1##</span>
							</div>
						</div>
						<div class="form-group">
							<label for="Server-Port" class="col-sm-3 control-label">##DS_LABEL2##</label>
							<div class="col-sm-7">
								<input type="text" name="serverport" class="form-control" id="Server-Port" placeholder="##DS_PLACEHOLDE2##" {if $postdata|@count>
								0}value="{$postdata[1]}"{/if}> <span id="helpBlock" class="help-block">##DS_HELP_BLOCK2##</span>
							</div>
						</div>
						<div class="form-group">
							<label for="Server-Code" class="col-sm-3 control-label">##DS_LABEL3##</label>
							<div class="col-sm-7">
								<input type="text" name="servercode" class="form-control" id="Server-Code" placeholder="##DS_PLACEHOLDE3##" {if $postdata|@count>
								0}value="{$postdata[2]}"{/if}> <span id="helpBlock" class="help-block">##DS_HELP_BLOCK3##</span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">##DS_LABEL4##</label>
							<div class="col-sm-7">
								<select class="form-control" id="modmap" name="modmap"> {foreach $maps as $mapDir => $mapData}
									<option value="{$mapDir}">{$mapData.Name} {$mapData.Version}</option> {/foreach}
								</select><span id="helpBlock" class="help-block">##DS_HELP_BLOCK4##</span>
							</div>
						</div>
						<div class="form-group">
							<label for="password" class="col-sm-3 control-label">##DS_LABEL5##</label>
							<div class="col-sm-7 form-inline">
								<input type="password" name="adminpass1" class="form-control" id="password" placeholder="##DS_PLACEHOLDE5##">&nbsp;<input type="password"
									name="adminpass2" class="form-control" id="password" placeholder="##DS_PLACEHOLDE6##"> <span id="helpBlock" class="help-block">##DS_HELP_BLOCK5##</span>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-7 col-sm-3">
								<button type="submit" name="submit" value="server" class="pull-right btn btn-primary btn-block">##SAVE_CONFIG##</button>
							</div>
						</div>
						{else}
						<p class="lead">##NO_INSTALL_1##</p>
						<p class="lead">##NO_INSTALL_2##</p>
						{/if}
					</form>
				</div>
				<div role="tabpanel" class="tab-pane" id="local">
					<form class="form-horizontal" action="index.php?page=install" method="post">
						<h3>##LOCAL##</h3>
						{if $error}{$error}{/if}
						<p>
							##INTRO1## <a href="https://www.farming-simulator.com/mod.php?lang=de&country=de&mod_id=50533&title=fs2017">##LINK_TEXT##</a>##INTRO2##
						</p>
						<input type="file" name="file" style="visibility: hidden;" id="path2savegame" />
						<div class="form-group">
							<label for="savepath" class="col-sm-3 control-label">##LS_LABEL1##</label>
							<div class="col-sm-7">
								<input type="text" name="savepath" class="form-control" id="savepath" placeholder="##LS_PLACEHOLDE1##" {if $postdata|@count>
								0}value="{$postdata[3]}"{/if}> <span id="helpBlock" class="help-block">##LS_HELP_BLOCK1##</span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">##LS_LABEL2##</label>
							<div class="col-sm-7">
								<select class="form-control" id="modmap" name="modmap"> {foreach $maps as $mapDir => $mapData}
									<option value="{$mapDir}">{$mapData.Name} {$mapData.Version}</option> {/foreach}
								</select><span id="helpBlock" class="help-block">##LS_HELP_BLOCK2##</span>
							</div>
						</div>
						<div class="form-group">
							<label for="password" class="col-sm-3 control-label">##DS_LABEL5##</label>
							<div class="col-sm-7 form-inline">
								<input type="password" name="adminpass1" class="form-control" id="password" placeholder="##DS_PLACEHOLDE5##">&nbsp;<input type="password"
									name="adminpass2" class="form-control" id="password" placeholder="##DS_PLACEHOLDE6##"> <span id="helpBlock" class="help-block">##DS_HELP_BLOCK5##</span>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-7 col-sm-3">
								<button type="submit" name="submit" value="local" class="pull-right btn btn-primary btn-block">##SAVE_CONFIG##</button>
							</div>
						</div>
					</form>
				</div>
			</div>

			<script>
				{if $postdata|@count>0 && $postdata[4] && $fsockopen}
					$('.nav-tabs a[href="#server"]').tab('show');
				{else}
					$('.nav-tabs a[href="#local"]').tab('show');
				{/if}
 			</script>
		</div>
	</div>
	{/if}
</body>
</html>
