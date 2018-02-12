<script src="<?php echo base_url();?>assets/j/jquery.MultiFile.min.js" type="text/javascript" language="javascript"></script>
<div class="content_botbg">
	<div class="content_res">
		<!-- full block -->
		<div class="shadowblock_out">
			<div class="shadowblock" style="float: left;">
				<style>
					/* hack on new ad submission page until we fix multi-level dropdown issue with .js */
					div#parentCategory select#cat.dropdownlist, div#childCategory select#cat.dropdownlist, form#mainform.form_step select {
						padding: 6px;
						height: 3em;
						color: #666;
						font-size: 12px;
						display: block;
					}
				</style>
				<div id="step1"></div>
				<h2 class="dotted">Publier votre annonce</h2>
				<!--<img src="<?php echo base_url() ?>assets/i/step1.gif" alt="" class="stepimg"/>-->
				<p>
					S'il vous pla&icirc;t remplissez les champs ci-dessous pour envoyer votre annonce. Les champs obligatoires sont signal&eacute;s par une *. Vous aurez la possibilit&eacute; de faire des modifications apr&egrave;s la publication.
				</p>
				<p class="dotted">
					&nbsp;
				</p>
				<div style="color: red;">
					<?php //echo validation_errors();?>
				</div>
				<form name="mainform" id="mainform" class="form_step" action="<?php echo site_url('annonces/add');?>" method="post" enctype="multipart/form-data">
					<ol>
						<li>
							<div class="labelwrapper">
								<label>Categorie:<span class="colour">*</span></label>
							</div>
							<select tabindex="2" class="dropdownlist required valid" id="cat" name="cat" >
								<option selected="selected" value="">Toutes les categories</option>
								<?php
									foreach ($sections as $section) :
										$this -> load -> model(array('admin/categorie_model', 'annonce_model'));
										$categories = $this -> categorie_model -> getListbySec($section -> id_section);
										echo '
								<optgroup label="' . utf8_decode($section -> section) . '">
									';

										foreach ($categories as $categorie) :
											$nbre = count($this -> annonce_model -> getListBycat($categorie -> id_cat));
											echo '<option value="' . $categorie -> id_cat . '" class="level-1">&nbsp;&nbsp;&nbsp;' . utf8_decode($categorie -> categorie) . '&nbsp;&nbsp;(' . $nbre . ')</option>';

										endforeach;
										echo '
								</optgroup>
								';

									endforeach;
 ?>
							</select><span style="color: red; padding: 20px"><?php echo form_error('cat') ?></span>
							<div class="clr"></div>
						</li>
						<li>
							<div class="labelwrapper">
								<label><a title="" href="#"  ><div class="helpico"></div></a>Prix: <span class="colour">*</span></label>
							</div>
                                                    <input name="prix" id="cp_price"  value="<?php echo set_value('prix') ?>" class="text " type="text" style="width: 180px; margin-right: 18px;"/>
							<select name="monnaie"  class="dropdownlist" style="width: 100px;">
								<option value="GNF" selected="">Monnaie</option>
								<option value="GNF">GNF</option>
								<option value="DOLLAR">DOLLAR</option>
								<option value="EURO">EURO</option>
								<option value="FCFA">FCFA</option>
							</select><span style="color: red; padding: 20px"><?php echo form_error('prix') ?><?php echo form_error('monnaie') ?></span>
							<div class="clr"></div>
						</li>
						<li>
							<div class="labelwrapper">
								<label><a href="#"  ><div class="helpico"></div></a>Titre: <span class="colour">*</span></label>
							</div>
							<input name="titre" id="post_title" value="<?php echo set_value('titre') ?>" class="text " type="text"><span style="color: red; padding: 20px"><?php echo form_error('titre') ?></span>
							<div class="clr"></div>
						</li>
						<li>
							<div class="labelwrapper">
								<label>Type Annonce: <span class="colour">*</span></label>
							</div>
							<select name="type_annonce"  class="dropdownlist">
								<option value="" selected="">Selectionner</option>
								<option value="0">Location</option>
								<option value="1">Vente</option>
								<option value="2">Recherche</option>
							</select><span style="color: red; padding: 20px"><?php echo form_error('type_annonce') ?></span>
							<div class="clr"></div>
						</li>
						<li>
							<div class="labelwrapper">
								<label>Ville: <span class="colour">*</span></label>
							</div>
							<input name="ville" id="cp_city"  value="<?php echo set_value('ville') ?>" class="text" type="text"><span style="color: red; padding: 20px"><?php echo form_error('ville') ?></span>
							<div class="clr"></div>
						</li>
						<li>
							<div class="labelwrapper">
								<label><a href="#" ><div class="helpico"></div></a>Pays: <span class="colour">*</span></label>
							</div>
							<select class="dropdownlist" name="pays" id="pays" style="display: block;">
										<option value="">-- Select --</option>
									<option value="Guinee" selected="selected">Guinee </option>

                                                                    <option value="Afghanistan">Afghanistan </option>
                                                                    <option value="Afrique_Centrale">Afrique_Centrale </option>
                                                                    <option value="Afrique_du_sud">Afrique_du_Sud </option>
                                                                    <option value="Albanie">Albanie </option>
                                                                    <option value="Algerie">Algerie </option>
                                                                    <option value="Allemagne">Allemagne </option>
                                                                    <option value="Andorre">Andorre </option>
                                                                    <option value="Angola">Angola </option>
                                                                    <option value="Anguilla">Anguilla </option>
                                                                    <option value="Arabie_Saoudite">Arabie_Saoudite </option>
                                                                    <option value="Argentine">Argentine </option>
                                                                    <option value="Armenie">Armenie </option>
                                                                    <option value="Australie">Australie </option>
                                                                    <option value="Autriche">Autriche </option>
                                                                    <option value="Azerbaidjan">Azerbaidjan </option>

                                                                    <option value="Bahamas">Bahamas </option>
                                                                    <option value="Bangladesh">Bangladesh </option>
                                                                    <option value="Barbade">Barbade </option>
                                                                    <option value="Bahrein">Bahrein </option>
                                                                    <option value="Belgique">Belgique </option>
                                                                    <option value="Belize">Belize </option>
                                                                    <option value="Benin">Benin </option>
                                                                    <option value="Bermudes">Bermudes </option>
                                                                    <option value="Bielorussie">Bielorussie </option>
                                                                    <option value="Bolivie">Bolivie </option>
                                                                    <option value="Botswana">Botswana </option>
                                                                    <option value="Bhoutan">Bhoutan </option>
                                                                    <option value="Boznie_Herzegovine">Boznie_Herzegovine </option>
                                                                    <option value="Bresil">Bresil </option>
                                                                    <option value="Brunei">Brunei </option>
                                                                    <option value="Bulgarie">Bulgarie </option>
                                                                    <option value="Burkina_Faso">Burkina_Faso </option>
                                                                    <option value="Burundi">Burundi </option>

                                                                    <option value="Caiman">Caiman </option>
                                                                    <option value="Cambodge">Cambodge </option>
                                                                    <option value="Cameroun">Cameroun </option>
                                                                    <option value="Canada">Canada </option>
                                                                    <option value="Canaries">Canaries </option>
                                                                    <option value="Cap_vert">Cap_Vert </option>
                                                                    <option value="Chili">Chili </option>
                                                                    <option value="Chine">Chine </option>
                                                                    <option value="Chypre">Chypre </option>
                                                                    <option value="Colombie">Colombie </option>
                                                                    <option value="Comores">Colombie </option>
                                                                    <option value="Congo">Congo </option>
                                                                    <option value="Congo_democratique">Congo_democratique </option>
                                                                    <option value="Cook">Cook </option>
                                                                    <option value="Coree_du_Nord">Coree_du_Nord </option>
                                                                    <option value="Coree_du_Sud">Coree_du_Sud </option>
                                                                    <option value="Costa_Rica">Costa_Rica </option>
                                                                    <option value="Cote_d_Ivoire">C�te_d_Ivoire </option>
                                                                    <option value="Croatie">Croatie </option>
                                                                    <option value="Cuba">Cuba </option>

                                                                    <option value="Danemark">Danemark </option>
                                                                    <option value="Djibouti">Djibouti </option>
                                                                    <option value="Dominique">Dominique </option>

                                                                    <option value="Egypte">Egypte </option>
                                                                    <option value="Emirats_Arabes_Unis">Emirats_Arabes_Unis </option>
                                                                    <option value="Equateur">Equateur </option>
                                                                    <option value="Erythree">Erythree </option>
                                                                    <option value="Espagne">Espagne </option>
                                                                    <option value="Estonie">Estonie </option>
                                                                    <option value="Etats_Unis">Etats_Unis </option>
                                                                    <option value="Ethiopie">Ethiopie </option>

                                                                    <option value="Falkland">Falkland </option>
                                                                    <option value="Feroe">Feroe </option>
                                                                    <option value="Fidji">Fidji </option>
                                                                    <option value="Finlande">Finlande </option>
                                                                    <option value="France">France </option>

                                                                    <option value="Gabon">Gabon </option>
                                                                    <option value="Gambie">Gambie </option>
                                                                    <option value="Georgie">Georgie </option>
                                                                    <option value="Ghana">Ghana </option>
                                                                    <option value="Gibraltar">Gibraltar </option>
                                                                    <option value="Grece">Grece </option>
                                                                    <option value="Grenade">Grenade </option>
                                                                    <option value="Groenland">Groenland </option>
                                                                    <option value="Guadeloupe">Guadeloupe </option>
                                                                    <option value="Guam">Guam </option>
                                                                    <option value="Guatemala">Guatemala</option>
                                                                    <option value="Guernesey">Guernesey </option>
                                                                    <option value="Guinee">Guinee </option>
                                                                    <option value="Guinee_Bissau">Guinee_Bissau </option>
                                                                    <option value="Guinee equatoriale">Guinee_Equatoriale </option>
                                                                    <option value="Guyana">Guyana </option>
                                                                    <option value="Guyane_Francaise ">Guyane_Francaise </option>

                                                                    <option value="Haiti">Haiti </option>
                                                                    <option value="Hawaii">Hawaii </option>
                                                                    <option value="Honduras">Honduras </option>
                                                                    <option value="Hong_Kong">Hong_Kong </option>
                                                                    <option value="Hongrie">Hongrie </option>

                                                                    <option value="Inde">Inde </option>
                                                                    <option value="Indonesie">Indonesie </option>
                                                                    <option value="Iran">Iran </option>
                                                                    <option value="Iraq">Iraq </option>
                                                                    <option value="Irlande">Irlande </option>
                                                                    <option value="Islande">Islande </option>
                                                                    <option value="Israel">Israel </option>
                                                                    <option value="Italie">italie </option>

                                                                    <option value="Jamaique">Jamaique </option>
                                                                    <option value="Jan Mayen">Jan Mayen </option>
                                                                    <option value="Japon">Japon </option>
                                                                    <option value="Jersey">Jersey </option>
                                                                    <option value="Jordanie">Jordanie </option>

                                                                    <option value="Kazakhstan">Kazakhstan </option>
                                                                    <option value="Kenya">Kenya </option>
                                                                    <option value="Kirghizstan">Kirghizistan </option>
                                                                    <option value="Kiribati">Kiribati </option>
                                                                    <option value="Koweit">Koweit </option>

                                                                    <option value="Laos">Laos </option>
                                                                    <option value="Lesotho">Lesotho </option>
                                                                    <option value="Lettonie">Lettonie </option>
                                                                    <option value="Liban">Liban </option>
                                                                    <option value="Liberia">Liberia </option>
                                                                    <option value="Liechtenstein">Liechtenstein </option>
                                                                    <option value="Lituanie">Lituanie </option>
                                                                    <option value="Luxembourg">Luxembourg </option>
                                                                    <option value="Lybie">Lybie </option>

                                                                    <option value="Macao">Macao </option>
                                                                    <option value="Macedoine">Macedoine </option>
                                                                    <option value="Madagascar">Madagascar </option>
                                                                    <option value="Mad�re">Mad�re </option>
                                                                    <option value="Malaisie">Malaisie </option>
                                                                    <option value="Malawi">Malawi </option>
                                                                    <option value="Maldives">Maldives </option>
                                                                    <option value="Mali">Mali </option>
                                                                    <option value="Malte">Malte </option>
                                                                    <option value="Man">Man </option>
                                                                    <option value="Mariannes du Nord">Mariannes du Nord </option>
                                                                    <option value="Maroc">Maroc </option>
                                                                    <option value="Marshall">Marshall </option>
                                                                    <option value="Martinique">Martinique </option>
                                                                    <option value="Maurice">Maurice </option>
                                                                    <option value="Mauritanie">Mauritanie </option>
                                                                    <option value="Mayotte">Mayotte </option>
                                                                    <option value="Mexique">Mexique </option>
                                                                    <option value="Micronesie">Micronesie </option>
                                                                    <option value="Midway">Midway </option>
                                                                    <option value="Moldavie">Moldavie </option>
                                                                    <option value="Monaco">Monaco </option>
                                                                    <option value="Mongolie">Mongolie </option>
                                                                    <option value="Montserrat">Montserrat </option>
                                                                    <option value="Mozambique">Mozambique </option>

                                                                    <option value="Namibie">Namibie </option>
                                                                    <option value="Nauru">Nauru </option>
                                                                    <option value="Nepal">Nepal </option>
                                                                    <option value="Nicaragua">Nicaragua </option>
                                                                    <option value="Niger">Niger </option>
                                                                    <option value="Nigeria">Nigeria </option>
                                                                    <option value="Niue">Niue </option>
                                                                    <option value="Norfolk">Norfolk </option>
                                                                    <option value="Norvege">Norvege </option>
                                                                    <option value="Nouvelle_Caledonie">Nouvelle_Caledonie </option>
                                                                    <option value="Nouvelle_Zelande">Nouvelle_Zelande </option>

                                                                    <option value="Oman">Oman </option>
                                                                    <option value="Ouganda">Ouganda </option>
                                                                    <option value="Ouzbekistan">Ouzbekistan </option>

                                                                    <option value="Pakistan">Pakistan </option>
                                                                    <option value="Palau">Palau </option>
                                                                    <option value="Palestine">Palestine </option>
                                                                    <option value="Panama">Panama </option>
                                                                    <option value="Papouasie_Nouvelle_Guinee">Papouasie_Nouvelle_Guinee </option>
                                                                    <option value="Paraguay">Paraguay </option>
                                                                    <option value="Pays_Bas">Pays_Bas </option>
                                                                    <option value="Perou">Perou </option>
                                                                    <option value="Philippines">Philippines </option>
                                                                    <option value="Pologne">Pologne </option>
                                                                    <option value="Polynesie">Polynesie </option>
                                                                    <option value="Porto_Rico">Porto_Rico </option>
                                                                    <option value="Portugal">Portugal </option>

                                                                    <option value="Qatar">Qatar </option>

                                                                    <option value="Republique_Dominicaine">Republique_Dominicaine </option>
                                                                    <option value="Republique_Tcheque">Republique_Tcheque </option>
                                                                    <option value="Reunion">Reunion </option>
                                                                    <option value="Roumanie">Roumanie </option>
                                                                    <option value="Royaume_Uni">Royaume_Uni </option>
                                                                    <option value="Russie">Russie </option>
                                                                    <option value="Rwanda">Rwanda </option>

                                                                    <option value="Sahara Occidental">Sahara Occidental </option>
                                                                    <option value="Sainte_Lucie">Sainte_Lucie </option>
                                                                    <option value="Saint_Marin">Saint_Marin </option>
                                                                    <option value="Salomon">Salomon </option>
                                                                    <option value="Salvador">Salvador </option>
                                                                    <option value="Samoa_Occidentales">Samoa_Occidentales</option>
                                                                    <option value="Samoa_Americaine">Samoa_Americaine </option>
                                                                    <option value="Sao_Tome_et_Principe">Sao_Tome_et_Principe </option>
                                                                    <option value="Senegal">Senegal </option>
                                                                    <option value="Seychelles">Seychelles </option>
                                                                    <option value="Sierra Leone">Sierra Leone </option>
                                                                    <option value="Singapour">Singapour </option>
                                                                    <option value="Slovaquie">Slovaquie </option>
                                                                    <option value="Slovenie">Slovenie</option>
                                                                    <option value="Somalie">Somalie </option>
                                                                    <option value="Soudan">Soudan </option>
                                                                    <option value="Sri_Lanka">Sri_Lanka </option>
                                                                    <option value="Suede">Suede </option>
                                                                    <option value="Suisse">Suisse </option>
                                                                    <option value="Surinam">Surinam </option>
                                                                    <option value="Swaziland">Swaziland </option>
                                                                    <option value="Syrie">Syrie </option>

                                                                    <option value="Tadjikistan">Tadjikistan </option>
                                                                    <option value="Taiwan">Taiwan </option>
                                                                    <option value="Tonga">Tonga </option>
                                                                    <option value="Tanzanie">Tanzanie </option>
                                                                    <option value="Tchad">Tchad </option>
                                                                    <option value="Thailande">Thailande </option>
                                                                    <option value="Tibet">Tibet </option>
                                                                    <option value="Timor_Oriental">Timor_Oriental </option>
                                                                    <option value="Togo">Togo </option>
                                                                    <option value="Trinite_et_Tobago">Trinite_et_Tobago </option>
                                                                    <option value="Tristan da cunha">Tristan de cuncha </option>
                                                                    <option value="Tunisie">Tunisie </option>
                                                                    <option value="Turkmenistan">Turmenistan </option>
                                                                    <option value="Turquie">Turquie </option>

                                                                    <option value="Ukraine">Ukraine </option>
                                                                    <option value="Uruguay">Uruguay </option>

                                                                    <option value="Vanuatu">Vanuatu </option>
                                                                    <option value="Vatican">Vatican </option>
                                                                    <option value="Venezuela">Venezuela </option>
                                                                    <option value="Vierges_Americaines">Vierges_Americaines </option>
                                                                    <option value="Vierges_Britanniques">Vierges_Britanniques </option>
                                                                    <option value="Vietnam">Vietnam </option>

                                                                    <option value="Wake">Wake </option>
                                                                    <option value="Wallis et Futuma">Wallis et Futuma </option>

                                                                    <option value="Yemen">Yemen </option>
                                                                    <option value="Yougoslavie">Yougoslavie </option>

                                                                    <option value="Zambie">Zambie </option>
                                                                    <option value="Zimbabwe">Zimbabwe </option>
									</select>
							<div class="clr"></div>
						</li>
						<li>
							<div class="labelwrapper">
								<label>Description: </label>
								<br>
							</div>
							<textarea rows="8" cols="40" name="description" id="post_content" class=""><?php echo set_value('description') ?></textarea>
							<div class="clr"></div>
						</li>
						<li>
							<div class="labelwrapper">
								<label>Image(s)  :</label>
							</div>
							<input id="upload1" name="userfile[]" value="" class="multi" accept="gif|jpg|png" maxlength="4" type="file"/>
							<p class="light">
								Ajouter jusqu'&aacute; 3 photos
							</p>
							<p class="light">
							   1000KB max file size per image
							</p>
							<div class="clr"></div>
						</li>
						<li>
							<div class="labelwrapper">
								<label>Publier Maintenant: <span class="colour">*</span></label>
								<br/>
							</div>
							<input type="radio"  name="publier" value="1"/>
							<div class="clr"></div>
						</li>
						<li>
							<div class="labelwrapper">
								<label>Enregistrer et publier plutard: <span class="colour">*</span></label>
								<br/>
							</div>
							<input type="radio" name="publier" value="0" checked="checked" />
							<div class="clr"></div>
						</li>
						<div class="clr"></div>
						<p class="btn1">
							<input name="save" id="step1" class="btn_orange" value="Continuer >>" type="submit">
						</p>
					</ol>
				</form>
			</div><!-- /shadowblock -->
		</div><!-- /shadowblock_out -->
		<div class="clr"></div>
	</div><!-- /content_res -->
</div><!-- /content_botbg -->
