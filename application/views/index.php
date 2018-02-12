<script type="text/javascript" src="<?php echo base_url().'assets/'?>j/jcarousellite_1.0.1.pack.js"></script>
<div class="content_botbg">
	<div class="content_res">
		<script type="text/javascript">
			// &lt;![CDATA[
			/* featured listings slider */
			jQuery(document).ready(function($) {
				$('.slider').jCarouselLite({
					btnNext : '.next',
					btnPrev : '.prev',
					visible : 5,
					hoverPause : true,
					auto : 2800,
					speed : 1100
					
				});
			});
			// ]]&gt;
		</script>
		<!-- featured listings -->
		<div class="shadowblock_out">
			<div class="shadowblockdir">
				<h2 class="dotted">Annonces &agrave; la Une</h2>
				<div class="sliderblockdir">
					<div id="list">
						<div class="prev"><img alt="" src="<?php echo base_url() ?>assets/i/prev.jpg">
						</div>
						<div class="slider" style="visibility: visible; overflow: hidden; position: relative; z-index: 2; left: 0px; width: 850px;">
							<ul style="">
								<?php foreach($unes as $une):
										$image=$this->image_model->getFirst($une->id_annonce);
										switch($une->monaie){
											case 'DOLLAR' :	$monnaie='$';break;
											case 'EURO' : $monnaie ='&euro;';break;
											case 'GNF' : $monnaie ='GNF'; break;
											case 'FCFA' : $monnaie ='FCFA';	break;
									}
								?>
								<li style="">
									<span class="feat_left"> <a  class="preview" title="<?php echo $une -> titre;?>" href="<?php echo base_url() . 'annonces/detail/' . format_url($une -> titre) . '_' . $une -> id_annonce ?>"><img title="<?php echo $une -> titre;?>" alt="<?php echo $une -> titre;?>" class="attachment-sidebar-thumbnail" src="<?php echo base_url().'assets/uploads/'.(($image=="")?"noimage.jpg":$image) ?>" width="50" height="42"></a> <div class="clr"></div> </span>
									<p>
										<a href="<?php echo base_url() . 'annonces/detail/' . format_url($une -> titre) . '_' . $une -> id_annonce ?>"><?php echo character_limiter(strtoupper($une -> titre),20);?></a>
									</p>
									<span class="price_sm" style="width: 135px;float: left;"><?php echo $monnaie . ' ' . number_format($une -> prix, 0, 0, ' ');?></span>									
								</li>
								<?php endforeach;?>
							</ul>
						</div>
						<div class="next"><img alt="" src="<?php echo base_url() ?>assets/i/next.jpg">
						</div>
					</div><!-- /slider -->
					<div class="clr"></div>
				</div><!-- /sliderblock -->
			</div><!-- /shadowblock -->
		</div><!-- /shadowblock_out -->
		<!-- left block -->
		<div class="content_left">
			<div class="shadowblock_out">
				<div class="shadowblock"> <!-- style="min-height: 1028px;" pour ce div -->				   
					<h2 class="dotted" >
					 	<a href="#" title="Cliquer pour afficher" onclick="$('#directory').slideToggle(); return false;" >Catégories d'annonces</a>	
					</h2><!-- Ajout click pour afficher le contenu de la catégorie d'annonce le div de id directory -->
					<div class="directory" id="directory" style=""> <!-- Ajout du style display none pour le slide -->
						<div class="catcol">
							<?php
							$sections = $this -> section_model -> getSections();
							foreach ($sections as $section) :
								$nbresection = $this -> annonce_model -> countBysec($section -> id_section);
								$categories = $this -> categorie_model -> getListbySec($section -> id_section);
								echo '
							<ul>
								<li class="maincat">
									<a title="" href="' . base_url() . 'section/' . format_url($section -> section) . '_' . $section -> id_section . '">' . $section -> section . ' (' . $nbresection . ')</a>
								</li>
								'; if(isset($categories)):
								foreach ($categories as $categorie) :
									$nbrecat = $this -> annonce_model -> countBycat($categorie -> id_cat);
									//$nbre=count($this->annonce_model->getListBycat($categorie->id_cat));
									echo '
								<li class="cat-item">
									<a title="" href="' . base_url() . 'categorie/' . format_url($categorie -> categorie) . '_' . $categorie -> id_cat . '">' . utf8_decode($categorie -> categorie) . ' (' . $nbrecat . ')</a>
								</li>
								';
								endforeach;endif;
								echo '
							</ul>
							';

							endforeach;
							?>
						</div><!-- /catcol -->
						<div class="clr"></div>
					</div><!--/directory-->
				</div><!-- /shadowblock -->
			</div><!-- /shadowblock_out -->			
			
			<?php
					if($annonces!=NULL){
					foreach($annonces as $annonce):
						$image=$this->image_model->getFirst($annonce->id_annonce);
						switch($annonce->monaie){
							case 'DOLLAR' :$monnaie='$';break;
							case 'EURO' :$monnaie ='&euro;';break;
							case 'GNF' :$monnaie ='GNF';break;
							case 'FCFA' :$monnaie ='FCFA';break;
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
							<a href="<?php echo base_url() . 'annonces/detail/' . format_url($annonce -> titre) . '_' . $annonce -> id_annonce ?>" title="<?php echo $annonce -> titre;?>" class="preview">
                                                            <img width="75" height="50" src="<?php echo base_url().'assets/uploads/'.(($image=="")?"noimage.jpg":$image) ?>" class="attachment-ad-thumb" alt="<?php echo $annonce -> titre;?>" title="<?php echo $annonce -> titre;?>"/>
                                                        </a>
						</div>
						<div class="post-right full">
							<div class="price-wrap">
								<span class="tag-head type_annonce" style=""><?php echo $typeA ?></span>
								<p class="post-price">
									<?php echo $monnaie . ' ' . number_format($annonce -> prix, 0, 0, ' ');?>
								</p>
							</div>
							<h3><a href="<?php echo base_url() . 'annonces/detail/' . format_url($annonce -> titre) . '_' . $annonce -> id_annonce ?>"><?php echo $annonce -> titre;?></a></h3>
							<div class="clr"></div>
							<p class="post-meta">
								<?php echo character_limiter($annonce -> C_ANNONCE, 80);?><br />
								<span class="folder"><span class="clock"><span><?php echo $annonce -> ajout;?></span></span>
							</p>
							<div class="clr"></div>
							<div class="clr"></div>
						</div>
						<div class="clr"></div>
					</div><!-- /post-block -->
				</div><!-- /post-block-out -->
				<?php endforeach; }else echo '	<div class="shadowblock" id="aucun"><p>Aucune annonce pour le moment </p></div>';?>		
			<!-- /tabcontrol -->
		</div><!-- /content_left -->
		<div class="content_right">
			<div class="shadowblock_out">
				<div class="shadowblock">
					<h2 class="colour_top">Bienvenue sur votre site!</h2>
					<h1><span class="colour">Publier vos annonces</span></h1>
					<p>
						Devenez membre gratuitement et commencer &agrave; poster vos annonces en quelques minutes.
					</p>
					<a class="mbtn btn_orange" href="<?php echo base_url().'user/inscription'?>">Inscrivez-vous maintenant!</a>
				</div><!-- /shadowblock -->
			</div><!-- /shadowblock_out -->
			<?php $this->load->view('inc/addpopulaires')?><!-- /shadowblock_out -->
			<?php $this -> load -> view('inc/news');?>
		    <?php $this -> load -> view('inc/facebook');?><!-- /shadowblock_out -->
		</div><!-- /content_right -->
		<div class="clr"></div>
	</div><!-- /content_res -->
</div><!-- /content_botbg -->
