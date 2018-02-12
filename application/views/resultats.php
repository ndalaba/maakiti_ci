<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//FR" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html    xmlns="http://www.w3.org/1999/xhtml" lang="en-US">
	<head profile="http://gmpg.org/xfn/11">
		<meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
		<title>MAAKITI : La Solution pour vos ventes et achats d'occasion</title>
		<link rel="shortcut icon" href="<?php echo base_url().'assets/i/favicon.ico'?>">
		<link rel="stylesheet" id="sexy-bookmarks-css" href="<?php echo base_url().'assets/'?>c/style.css" type="text/css" media="all">
		<link rel="stylesheet" id="at-color-css" href="<?php echo base_url().'assets/'?>c/red.css" type="text/css" media="all">
		<link rel="stylesheet" id="at-color-css" href="<?php echo base_url().'assets/'?>c/pagination.css" type="text/css" media="all">
		<link rel="stylesheet" id="autocomplete-css" href="<?php echo base_url().'assets/'?>c/jquery-ui-1.css" type="text/css" media="all">
		<script type="text/javascript" src="<?php echo base_url().'assets/'?>j/jquery.js"></script>
		<script type="text/javascript" src="<?php echo base_url()?>assets/j/jquery.validate.js"></script>

		<script type="text/javascript" src="<?php echo base_url().'assets/'?>j/jquery.pagination.js"></script>
		<!--<script type="text/javascript" src="<?php echo base_url().'assets/'?>j/cufon-yui.js"></script>-->
		<style type="text/css">
			cufon {
				text-indent: 0 !important;
			}@media screen, projection {
				cufon {
					display: inline !important;
					display: inline-block !important;
					position: relative !important;
					vertical-align: middle !important;
					font-size: 1px !important;
					line-height: 1px !important;
				}
				cufon cufontext {
					display: -moz-inline-box !important;
					display: inline-block !important;
					width: 0 !important;
					height: 0 !important;
					overflow: hidden !important;
					text-indent: -10000in !important;
				}
				cufon canvas {
					position: relative !important;
				}
			}@media print {
				cufon {
					padding: 0 !important;
				}
				cufon canvas {
					display: none !important;
				}
			}
		</style>
		<style type="text/css" media="screen">
			/* Begin Contact Form CSS */
			.contactform {
				position: static;
				overflow: hidden;
				width: 95%;
			}
			.contactleft {
				width: 25%;
				white-space: pre;
				text-align: right;
				clear: both;
				float: left;
				display: inline;
				padding: 4px;
				margin: 5px 0;
			}
			.contactright {
				width: 70%;
				text-align: left;
				float: right;
				display: inline;
				padding: 4px;
				margin: 5px 0;
			}
			.contacterror {
				border: 1px solid #ff0000;
			}
			.contactsubmit {
			}
			/* End Contact Form CSS */
<?php $this -> load -> view('inc/url');?>
		</style>
        <script type="text/javascript">
			var ref="<?php echo base_url() ?>"; // variable utilis� dans les fichiers javascript
		</script>
		<script type="text/javascript" src="<?php echo base_url().'assets/'?>j/script.js"></script>	
		<!--[if gte IE 9]> <script type="text/javascript"> Cufon.set('engine', 'canvas'); </script> <![endif]-->
		<!-- cufon fonts 
		<script src="<?php echo base_url().'assets/'?>j/Vegur_400-Vegur_700.js" type="text/javascript"></script>
		<script src="<?php echo base_url().'assets/'?>j/Liberation_Serif_400.js" type="text/javascript"></script> -->
		<!-- end cufon fonts  -->
		<!-- cufon font replacements -->
		<script type="text/javascript">
			// <![CDATA[
			Cufon.replace('.content_right h2.dotted', {
				fontFamily : 'Liberation Serif',
				textShadow : '0 1px 0 #FFFFFF'
			});
			// ]]>
		</script>
		<!-- end cufon font replacements -->
        <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-32676487-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
	</head>
	<body class="home blog">
		<div class="container">
			<!-- HEADER -->
			<div class="header">
				<div class="header_top">
					<div class="header_top_res">
						<?php $data = $this -> user_model -> getUser($this -> session -> userdata('email'));
						if ($this -> session -> userdata('email')) {
							$string = "Bienvenu(e), <strong><a href=" . base_url() . 'user/profil' . " class='pseudo'>" . $data -> pseudo . "</a></strong> | <a href=" . base_url() . 'user/logout' . ">D&eacute;connectez-vous</a> ]";
						} else {
							$string = "Bienvenu(e), <strong>visitor!</strong> [ <a href=" . base_url() . 'user/inscription' . ">Inscription</a> | <a href=" . base_url() . 'user/login' . ">Connectez-vous</a> ]&nbsp;";
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
								<a href="file:///"><div class="cp_logo"></div></a>
							</div><!-- /logo -->
							<div class="adblock">
								<a target="_blank" href="http://www.appthemes.com/"><img alt="Publicite" src="<?php echo base_url() ?>assets/i/468x60-banner.jpg" class="" width="468" border="0" height="60"></a>
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
									<a title="" href="' . base_url() . 'section/' . format_url($section -> section) . '_' . $section -> id_section . '">' . utf8_decode($section -> section) . '  (' . $nbresection . ')</a>
								</li>
								';
								foreach ($categories as $categorie) :
									$nbrecat = $this -> annonce_model -> countBycat($categorie -> id_cat);
									//$nbre=count($this->annonce_model->getListBycat($categorie->id_cat));
									echo '
								<li class="cat-item">
									<a title="" href="' . base_url() . 'categorie/' . format_url($categorie -> categorie) . '_' . $categorie -> id_cat . '">' . utf8_decode($categorie -> categorie) . '  (' . $nbrecat . ')</a>
								</li>
								';
								endforeach;
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
			<div id="search-bar">
				<div class="searchblock_out">
					<div class="searchblock">
						<form class="form_search" id="searchform" method="post" action="<?php echo base_url().'annonces/go' ?>">
							<div class="searchfield">
								<input onblur="if (this.value == '') {this.value = 'Rechercher des annonces sur Maakiti';}" onfocus="if (this.value == 'Rechercher des annonces sur Maakiti') {this.value = '';}" value="Rechercher des annonces sur Maakiti" style="width: 493px; margin-right: 14px;"  class="" tabindex="1" id="s" name="motcle"  type="text"/>
							</div>
							<div class="searchbutcat" style="position: relative;">
								<button onclick="RechSubmit()"name="sa" value="search" id="go" title="" tabindex="3" type="button" class="btn-topsearch" style="position: absolute;right: 10px;top: 70px;">
									Search Ads
								</button>
								<select tabindex="2" class="searchbar selectBox" id="cat" name="cat" style="float: left;min-width: 247px;" >
									<option selected="selected" value="">Toutes les categories</option>
									<?php
									foreach ($sections as $section) :
										$this -> load -> model(array('admin/categorie_model', 'annonce_model'));
										$categories = $this -> categorie_model -> getListbySec($section -> id_section);
										echo '
									<optgroup label="' . $section -> section . '">
										';
										foreach ($categories as $categorie) :
											//$nbre = count($this -> annonce_model -> getListBycat($categorie -> id_cat));
											echo '<option value="' . $categorie -> id_cat . '" class="level-1">&nbsp;&nbsp;&nbsp;' . $categorie -> categorie . '&nbsp;&nbsp;</option>';
										endforeach;
										echo '
									</optgroup>
									';
									endforeach;
									?>
								</select>
								<div class="blocprix">
								    <input style="width: 223px" class="dropdownlist" name="pmin" value="Prix Min" onblur="if (this.value == '') {this.value = 'Prix Min';}" onfocus="if (this.value == 'Prix Min') {this.value = '';}" />
                                    <input style="width: 223px" class="dropdownlist" name="pmax" value="Prix Max" onblur="if (this.value == '') {this.value = 'Prix Max';}" onfocus="if (this.value == 'Prix Max') {this.value = '';}" />                                    									
									<select class="dropdownlist" name="monnaie">
										<option value="" selected="">Monaie</option>
										<option value="GNF">GNF</option>
										<option value="DOLLAR">DOLLAR</option>
										<option value="EURO">EURO</option>
										<option value="FCFA">FCFA</option>
									</select>
								</div>
								<div class="bloc2" style="float: left;">
									<select class="dropdownlist" name="type">
										<option value="" selected="">Type d'annonce</option>
										<option value="0">Location</option>
										<option value="1">Vente</option>
										<option value="2">Recherche de service</option>
									</select>
									<input  id="ville" onblur="if (this.value == '') {this.value = 'Ville';}" onfocus="if (this.value == 'Ville') {this.value = '';}" value="Ville" type="text" name="ville" class="text" style="margin-right: 16px; padding: 12px 5px; width: 235px;"/>
									<?php $this->load->view('inc/states') ?>
								</div>
								<div style="float: right; color: red; position: absolute; top: 88px; font-size: 13px; width: 98px; right: -1px;">
									<?php echo validation_errors();?>
								</div>
							</div>
						</form>
					</div>
					<!-- /searchblock -->
				</div>
				<!-- /searchblock_out -->
			</div>
			<div class="content">
				<div class="content_botbg">
					<div class="content_res">
					<!--	<div id="breadcrumb">
							<div id="crumbs">
								<a href=" <?php echo base_url();?>">Accueil</a><?php
								if (isset($category)) { echo '|   <a href="' . base_url() . 'section/' . format_url($category -> section) . '_' . $categorie -> id_section . '">' . $category -> section . '</a>  |' . $category -> categorie . '<span class="current"></span>';
								}
								?>
							</div>
						</div>-->
						<!-- left block -->
						<div class="content_left">
							<div class="shadowblock_out">
								<div class="shadowblock">
									<h1 class="single dotted">Résultats  de la recherche (<?php echo $counts ?>)</h1>
								</div><!-- /shadowblock -->
							</div><!-- /shadowblock_out -->
							<?php
                                if($annonces!=NULL){
                                    foreach($annonces as $annonce):
                                    $image=$this->image_model->getFirst($annonce->id_annonce);
                                    switch($annonce->monaie){
                                        case 'DOLLAR' :
                                        $monnaie='$';
                                        break;
                                        case 'EURO' :
                                        $monnaie ='&euro;';
                                        break;
                                        case 'GNF' :
                                        $monnaie ='GNF';
                                        break;
                                        case 'FCFA' :
                                        $monnaie ='FCFA';
                                        break;
                                    }
                                    switch($annonce->type_annonce){
                            case 0 :$typeA='Location';break;
                            case 1 :$typeA ='Vente';break;
                            case 2 :$typeA ='Recherche';break;
                            
                    }
							?>
							<div class="post-block-out">
								<div class="post-block">
									<div class="post-left">
										<a href="<?php echo base_url() . 'annonces/detail/' . format_url($annonce -> titre) . '_' . $annonce -> id_annonce ?>" title="<?php echo $annonce -> titre;?>" class="preview"><img width="75" height="50" src="<?php echo base_url().'assets/uploads/'.(($image=="")?"noimage.jpg":$image) ?>" class="attachment-ad-thumb" alt="<?php echo $annonce -> titre;?>" title="<?php echo $annonce -> titre;?>"/></a>
									</div>
									<div class="post-right full">
										<div class="price-wrap">
											<span class="tag-head type_annonce"><?php echo $typeA ?></span>
											<p class="post-price">
												<?php echo $monnaie . ' ' . number_format($annonce -> prix, 0, 0, ' ');?>
											</p>
										</div>
										<h3><a href="<?php echo base_url() . 'annonces/detail/' . format_url($annonce -> titre) . '_' . $annonce -> id_annonce ?>"><?php echo $annonce -> titre;?></a></h3>
										<div class="clr"></div>
										<p class="post-meta">
											<?php echo character_limiter($annonce -> detail, 80);?><br />
											<span class="folder"><span class="clock"><span><?php echo $annonce -> ajout;?></span></span>
										</p>
										<div class="clr"></div>
										<div class="clr"></div>
									</div>
									<div class="clr"></div>
								</div><!-- /post-block -->
							</div><!-- /post-block-out -->
							<?php endforeach; }else echo '	<div class="shadowblock" id="aucun"><p>Aucune annonce ne correspond &agrave; cette recherche </p></div>';?>
							<div class="paging" id="pages">
								<div class="pages" id="page"><?php echo $pagination;?></div>
							</div>
						</div><!-- /content_left -->
						<div class="content_right">
							<?php $this -> load -> view('inc/news');?><!-- /shadowblock_out --><!-- /shadowblock_out --><!-- /shadowblock_out -->
						</div><!-- /content_right -->
						<div class="clr"></div>
					</div><!-- /content_res -->
				</div><!-- /content_botbg -->
			</div>
				<?php $this->load->view('inc/footer') ?><!-- /footer -->
			<script>
				var page = document.getElementById('page');
				var pages = document.getElementById('pages');
				if(page.innerHTML == '')
					pages.style.display = 'none';

			</script>
		</div><!-- /container -->
	</body>
</html>