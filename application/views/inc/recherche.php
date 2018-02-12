<div id="search-bar">
	<div class="searchblock_out">
		<div class="searchblock">
			<form class="form_search" id="searchform" method="post" action="<?php echo base_url().'annonces/go' ?>">
				<div class="searchfield">
					<input onblur="if (this.value == '') {this.value = 'Rechercher des annonces sur Maakiti';}" onfocus="if (this.value == 'Rechercher des annonces sur Maakiti') {this.value = '';}" value="Rechercher des annonces sur Maakiti" style="width: 500px;" class="editbox_search ui-autocomplete-input" tabindex="1" id="s" name="motcle"  type="text"/>
				</div>
				<div class="searchbutcat">
					<button onclick="RechSubmit()" name="sa" value="search" id="go" title="" tabindex="3" type="button" class="btn-topsearch">
						Search Ads
					</button>
					<select tabindex="2" class="searchbar selectBox" id="cat" name="cat" >
						<option selected="selected" value="">Toutes les categories</option>
						<?php
							foreach ($sections as $section) :
								$this -> load -> model(array('admin/categorie_model', 'annonce_model'));
								$categories = $this -> categorie_model -> getListbySec($section -> id_section);
								echo '
						<optgroup label="' . utf8_decode($section -> section) . '">
							';
								foreach ($categories as $categorie) :
									//$nbre = count($this -> annonce_model -> getListBycat($categorie -> id_cat));
									echo '<option value="' . $categorie -> id_cat . '" class="level-1">&nbsp;&nbsp;&nbsp;' .utf8_decode( $categorie -> categorie) . '&nbsp;&nbsp;</option>';
								endforeach;
								echo '</optgroup>';
							endforeach;	?>
					</select>
					<div style="width: 100%; float: left;">
						<a href="<?php echo base_url().'annonces/rech_avancee' ?>">Recherche avanc&eacute;e</a>
					</div>
				</div>
			</form>
		</div>
		<!-- /searchblock -->
	</div>
	<!-- /searchblock_out -->
</div>
