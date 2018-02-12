<script>
 $(window).load(function() {
     $('.nav li').removeClass('current_page_item');
     $('#annonces .nav .annonces ').addClass('current_page_item');
  
  });
</script>
<div class="content">
	<div class="content_botbg">
		<div class="content_res">
			<div id="breadcrumb">
				<div id="crumbs">
					<a href=" <?php echo base_url();?>">Accueil</a> &raquo; <a href=" <?php echo base_url() . 'section/' . format_url($categorie -> section) . '_' . $categorie -> id_section;?>"><?php echo utf8_decode($categorie -> section);?></a> &raquo; <?php echo utf8_decode($categorie -> categorie);?><span class="current"></span>
				</div>
			</div>
			<!-- left block -->
			<div class="content_left">
				<div class="shadowblock_out">
					<div class="shadowblock">
						<h1 class="single dotted">Listing des <?php echo utf8_decode($categorie -> categorie) . ' (' . $nombre;?>)</h1>
						<p>
							<?php echo utf8_decode($categorie -> CATD)?>.
						</p>
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
								<?php echo character_limiter($annonce ->detail, 80);?><br />
								<span class="folder"><span class="clock"><span><?php echo $annonce -> ajout;?></span></span>
							</p>
							<div class="clr"></div>
							<div class="clr"></div>
						</div>
						<div class="clr"></div>
					</div><!-- /post-block -->
				</div><!-- /post-block-out -->
				<?php endforeach; }else echo '	<div class="shadowblock" id="aucun"><p>Aucune annonce pour le moment </p></div>';?>
				<div class="paging" id="pages">
					<div class="pages" id="page"><?php echo $pagination;?></div>
				</div>
			</div><!-- /content_left -->
			<div class="content_right">
				<?php $this -> load -> view('inc/featured');?><!-- /shadowblock_out --><!-- /shadowblock_out --><!-- /shadowblock_out -->
			</div><!-- /content_right -->
			<div class="clr"></div>
		</div><!-- /content_res -->
	</div><!-- /content_botbg -->
</div>
<script>
	var page = document.getElementById('page');
	var pages = document.getElementById('pages');
	if(page.innerHTML == '')
		pages.style.display = 'none';

</script>