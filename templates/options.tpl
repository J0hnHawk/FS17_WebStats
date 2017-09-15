<div class="page-header">
	<h3>##SETTINGS##</h3>
</div>
<div class="row">
	<div class="col-sm-12">
		<form class="form-horizontal" action="index.php?page=options" method="post">
			<fieldset>
				<legend>##GENERAL##</legend>
				<div class="form-group">
					<label class="col-sm-2 control-label">##AUTO_RELOAD##</label>
					<div class="col-sm-10">
						<label class="radio-inline"> <input type="radio" name="g_reload" value="1"{if $options.general.reload}checked{/if}> ##YES##
						</label> <label class="radio-inline"> <input type="radio" name="g_reload" value="0"{if !$options.general.reload}checked{/if}> ##NO##
						</label>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">##MOD_MAP##</label>
					<div class="col-sm-8">
						<select class="form-control" id="g_map" name="g_map"> {foreach $maps as $mapDir => $mapData}
							<option value="{$mapDir}" {if $mapDir==$map.Path}selected{/if}>{$mapData.Name} {$mapData.Version}</option> {/foreach}
						</select>
					</div>
				</div>
			</fieldset>
			<fieldset>
				<legend>##STOCKS##</legend>
				<div class="form-group">
					<label class="col-sm-2 control-label">##SORT_ORDER##</label>
					<div class="col-sm-10">
						<label class="radio-inline"> <input type="radio" name="s_sortByName" value="1"{if $options.storage.sortByName}checked{/if}> ##ALPHABETICALLY##
						</label> <label class="radio-inline"> <input type="radio" name="s_sortByName" value="0"{if !$options.storage.sortByName}checked{/if}>
							##FILL_LEVEL##
						</label>
					</div>
				</div>
				<div class="form-group">
					<label for="sortType" class="col-sm-2 control-label">##VEHICLE_LOAD##</label>
					<div class="col-sm-10">
						<label class="radio-inline"> <input type="radio" name="s_showVehicles" value="1"{if $options.storage.showVehicles}checked{/if}> ##SHOW##
						</label> <label class="radio-inline"> <input type="radio" name="s_showVehicles" value="0"{if !$options.storage.showVehicles}checked{/if}>
							##HIDE##
						</label>
					</div>
				</div>
				<div class="form-group">
					<label for="sortType" class="col-sm-2 control-label">##ONLY_PALETTS##</label>
					<div class="col-sm-10">
						<label class="radio-inline"> <input type="radio" name="s_onlyPallets" value="1"{if $options.storage.onlyPallets}checked{/if}> ##YES##
						</label> <label class="radio-inline"> <input type="radio" name="s_onlyPallets" value="0"{if !$options.storage.onlyPallets}checked{/if}> ##NO##
						</label>
					</div>
				</div>
				<div class="form-group">
					<label for="sortType" class="col-sm-2 control-label">##SHOW_ZERO_STOCK##</label>
					<div class="col-sm-10">
						<label class="radio-inline"> <input type="radio" name="s_hideZero" value="0"{if !$options.storage.hideZero}checked{/if}> ##YES##
						</label> <label class="radio-inline"> <input type="radio" name="s_hideZero" value="1"{if $options.storage.hideZero}checked{/if}> ##NO##
						</label>
					</div>
				</div>
			</fieldset>
			<fieldset>
				<legend>##PLANTS##</legend>
				<div class="form-group">
					<label for="sortType" class="col-sm-2 control-label">##SORT_ORDER##</label>
					<div class="col-sm-10">
						<label class="radio-inline"> <input type="radio" name="p_sortByName" value="1"{if $options.production.sortByName}checked{/if}>
							##ALPHABETICALLY##
						</label> <label class="radio-inline"> <input type="radio" name="p_sortByName" value="0"{if !$options.production.sortByName}checked{/if}>
							##FILL_LEVEL##
						</label>
					</div>
				</div>
				<div class="form-group">
					<label for="sortType" class="col-sm-2 control-label">##FULL_PRODUCT_STORAGE##</label>
					<div class="col-sm-10">
						<label class="radio-inline"> <input type="radio" name="p_sortFullProducts" value="1"{if $options.production.sortFullProducts}checked{/if}>
							##SORT_FULL_PRODUCTS##
						</label> <label class="radio-inline"> <input type="radio" name="p_sortFullProducts" value="0"{if !$options.production.sortFullProducts}checked{/if}>
							##IGNORE_FULL_PRODUCTS##
						</label>
					</div>
				</div>
			</fieldset>
			<fieldset>
				<legend></legend>
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