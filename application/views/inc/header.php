<div class="header">
	<div class="header_top">
		<div class="header_top_res">
			<?php
			$data = $this -> user_model -> getUser($this -> session -> userdata('email'));
			if ($this -> session -> userdata('email')) {
				$string = "Bienvenu(e), <strong><a href=" . base_url() . 'user/profil' . " class='pseudo'>" . $data -> pseudo . "</a></strong> | <a href=" . base_url() . 'user/logout' . ">D&eacute;connectez-vous</a> ]";
			} else {

				$string = "Bienvenu(e), <strong>invit&eacute;(e)!</strong> [ <a href=" . base_url() . 'user/inscription' . ">Inscription</a> | <a href=" . base_url() . 'user/login' . ">Connectez-vous</a> ]&nbsp;";
			}
			?>
			<p>
				<?php echo $string;?> <a target="_blank" href=""><img class="srvicon" alt="rss" src="<?php echo base_url() ?>assets/i/icon_rss.gif" width="16" height="16"></a>
				&nbsp;|&nbsp; <a target="_blank" href="http://www.facebook.com/Maakiti"><img class="srvicon" alt="tw" src="<?php echo base_url() ?>assets/i/facebook.png" width="16" height="16"></a>
			</p>
		</div><!-- /header_top_res -->
	</div><!-- /header_top -->
	<div class="header_main">
		<div class="header_main_bg">
			<div class="header_main_res">
				<div id="logo">
					<a href="<?php echo site_url() ?>"><div class="cp_logo"></div></a>
				</div><!-- /logo -->
				<div class="adblock">
					<a target="_blank" href="<?php echo site_url() ?>"><img alt="Publicite" src="<?php echo base_url() ?>assets/i/468x60-banner.jpg" class="" width="468" border="0" height="60"></a>
				</div><!-- /adblock -->
				<div class="clr"></div>
			</div><!-- /header_main_res -->
		</div><!-- /header_main_bg -->
	</div><!-- /header_main -->
	<div class="header_menu">
		<div class="header_menu_res">
			<a class="obtn btn_orange" href="<?php echo base_url().'annonces/add'?>">Publier une Annonce</a>
			<ul id="nav" class="sf-js-enabled nav">
				<li class="page_item current_page_item accueil">
					<a href="<?php echo base_url()?>" >Accueil</a>
				</li>
				<li class="mega annonces" id="categ">
					<a href="#" class="sf-with-ul">Categories</a>
					<div id="adv_categories" class="adv_categories">
						<div class="catcol">
							<?php
							$sections = $this -> section_model -> getSections();
							foreach ($sections as $section) :
								$nbresection = $this -> annonce_model -> countBysec($section -> id_section);
								$categories = $this -> categorie_model -> getListbySec($section -> id_section);
								echo '
							<ul>
								<li class="maincat">
									<a title="" href="' . base_url() . 'section/' . format_url($section -> section) . '_' . $section -> id_section . '">' . $section -> section . '(' . $nbresection . ')</a>
								</li>
								';
                                if(isset($categories)):
								foreach ($categories as $categorie) :
									$nbrecat = $this -> annonce_model -> countBycat($categorie -> id_cat);
									//$nbre=count($this->annonce_model->getListBycat($categorie->id_cat));
									echo '
								<li class="cat-item">
									<a title="" href="' . base_url() . 'categorie/' . format_url($categorie -> categorie) . '_' . $categorie -> id_cat . '">' . utf8_decode($categorie -> categorie) . '(' . $nbrecat . ')</a>
								</li>
								';
								endforeach;
                                endif;
								echo '</ul>';
							  endforeach;
							?>
						</div>
					</div>
				</li>
                <li class="page_item  profil">
					<a href="<?php echo base_url().'user/profil'?>" >Mon maakiti</a>
				</li>
			</ul>
			<ul class="menu sf-js-enabled nav">
				<li class="page_item actualites">
					<a title="Actualit&eacute;s" href="<?php echo base_url().'control/actualites'?>" >Actualit&eacute;s</a>
				</li>
				<li class="page_item aide">
					<a title="Aide" href="<?php echo base_url().'control/help'?>" class="sf-with-ul " >Aide</a>
				</li>
				<li class="page_item apropos">
					<a title="A Propos" href="<?php echo base_url().'control/apropos/'?>" class="sf-with-ul ">A Propos</a>
				</li>
				<li class="page_item contact">
					<a title="Contact" href="<?php echo base_url().'control/contact/'?>">Contact</a>
				</li>
			</ul>
			<div class="clr"></div>
		</div><!-- /header_menu_res -->
	</div><!-- /header_menu -->
</div><!-- /header -->
