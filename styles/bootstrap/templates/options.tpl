<div class="page-header">
	<h3>Einstellungen</h3>
</div>
<div class="row"><div class="col-sm-12">
<form class="form-horizontal" action="index.php?page=options" method="post">
	<div class="form-group">
		<label for="sortType" class="col-sm-2 control-label">Sortierung</label>
		<div class="col-sm-10 radio">
			<label> <input type="radio" name="sortType"
				value="alpha" {if $sortType=='alpha'}checked{/if}> alphabetische Sortierung
			</label>
		</div>
		<div class="col-sm-offset-2 col-sm-10 radio">
			<label> <input type="radio" name="sortType"
				value="fill" {if $sortType=='fill'}checked{/if}> Sortierung nach Füllstand
			</label>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">Speichern</button>
		</div>
	</div>
</form>
</div></div>