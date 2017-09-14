<div class="page-header">
	<h3>Einstellungen</h3>
</div>
<div class="row">
	<div class="col-sm-12">
		<form class="form-horizontal" action="index.php?page=options" method="post">
			<fieldset>
				<legend>Allgemein</legend>
				<div class="form-group">
					<label class="col-sm-2 control-label">automatischer Reload</label>
					<div class="col-sm-10">
						<label class="radio-inline"> <input type="radio" name="g_reload" value="1"{if $options.general.reload}checked{/if}> ja
						</label> <label class="radio-inline"> <input type="radio" name="g_reload" value="0"{if !$options.general.reload}checked{/if}> nein
						</label>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Mod Map</label>
					<div class="col-sm-8">
						<select class="form-control" id="g_map" name="g_map"> {foreach $maps as $mapDir => $mapData}
							<option value="{$mapDir}" {if $mapDir==$map.Path}selected{/if}>{$mapData.Name} {$mapData.Version}</option> {/foreach}
						</select>
					</div>
				</div>
			</fieldset>
			<fieldset>
				<legend>Lagerbestände</legend>
				<div class="form-group">
					<label class="col-sm-2 control-label">Sortierung</label>
					<div class="col-sm-10">
						<label class="radio-inline"> <input type="radio" name="s_sortByName" value="1"{if $options.storage.sortByName}checked{/if}> alphabetisch
						</label> <label class="radio-inline"> <input type="radio" name="s_sortByName" value="0"{if !$options.storage.sortByName}checked{/if}> nach
							Füllstand
						</label>
					</div>
				</div>
				<div class="form-group">
					<label for="sortType" class="col-sm-2 control-label">Ladung von Fahrzeugen</label>
					<div class="col-sm-10">
						<label class="radio-inline"> <input type="radio" name="s_showVehicles" value="1"{if $options.storage.showVehicles}checked{/if}> anzeigen
						</label> <label class="radio-inline"> <input type="radio" name="s_showVehicles" value="0"{if !$options.storage.showVehicles}checked{/if}> nicht
							anzeigen
						</label>
					</div>
				</div>
				<div class="form-group">
					<label for="sortType" class="col-sm-2 control-label">Nur Paletten anzeigen</label>
					<div class="col-sm-10">
						<label class="radio-inline"> <input type="radio" name="s_onlyPallets" value="1"{if $options.storage.onlyPallets}checked{/if}> ja
						</label> <label class="radio-inline"> <input type="radio" name="s_onlyPallets" value="0"{if !$options.storage.onlyPallets}checked{/if}> nein
						</label>
					</div>
				</div>
				<div class="form-group">
					<label for="sortType" class="col-sm-2 control-label">Null-Bestände anzeigen</label>
					<div class="col-sm-10">
						<label class="radio-inline"> <input type="radio" name="s_hideZero" value="0"{if !$options.storage.hideZero}checked{/if}> ja
						</label> <label class="radio-inline"> <input type="radio" name="s_hideZero" value="1"{if $options.storage.hideZero}checked{/if}> nein
						</label>
					</div>
				</div>
			</fieldset>
			<fieldset>
				<legend>Produktionsanlagen</legend>
				<div class="form-group">
					<label for="sortType" class="col-sm-2 control-label">Sortierung</label>
					<div class="col-sm-10">
						<label class="radio-inline"> <input type="radio" name="p_sortByName" value="1"{if $options.production.sortByName}checked{/if}> alphabetisch
						</label> <label class="radio-inline"> <input type="radio" name="p_sortByName" value="0"{if !$options.production.sortByName}checked{/if}> nach
							Füllstand
						</label>
					</div>
				</div>
				<div class="form-group">
					<label for="sortType" class="col-sm-2 control-label">Volle Produktlager</label>
					<div class="col-sm-10">
						<label class="radio-inline"> <input type="radio" name="p_sortFullProducts" value="1"{if $options.production.sortFullProducts}checked{/if}> bei
							Sortierung berücksichtigen
						</label> <label class="radio-inline"> <input type="radio" name="p_sortFullProducts" value="0"{if !$options.production.sortFullProducts}checked{/if}>
							bei Sortierung ignorieren
						</label>
					</div>
				</div>
			</fieldset>
			<fieldset><legend></legend>
				<div class="form-group">
					<div class="col-sm-offset-6 col-sm-6">
						<button type="reset" class="btn btn-default">Zurücksetzen</button>
						<button type="submit" class="btn btn-primary">Konfiguration speichern</button>
					</div>
				</div>
			</fieldset>
		</form>
	</div>
</div>