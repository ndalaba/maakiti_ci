<script>
 $(window).load(function() {
     $('.nav li').removeClass('current_page_item');
     $('#annonces .nav .annonces ').addClass('current_page_item');
  
  });
</script>
<script type="text/javascript" src="<?php echo base_url().'assets/'?>j/jquery.lightbox-0.5.js"></script>
<link rel="stylesheet" id="sexy-bookmarks-css" href="<?php echo base_url().'assets/'?>c/jquery.lightbox-0.5.css" type="text/css" media="all">
<script type="text/javascript">
	$(function() {
		$('#thumbs-pic a').lightBox({
		    txtOf:'sur'
		});                                          
	});

</script>
<script type="text/javascript">
	function validation() {
		var ok = false;
		var erreur = '';
		nom = $('#nom').val();
		msg = $('#msg').val();
		sujet = $('#sujet').val();
		email = $('#email').val();
		if($.trim(nom) == '')
			erreur += 'Le champ Nom est vide \n';
		if($.trim(msg) == '')
			erreur += 'Le champ Message est vide\n';
		if($.trim(sujet) == '')
			erreur += 'Le champ Sujet est vide \n';
		var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
		if(!regex.test(email))
			erreur += 'L\'adresse Email est invalide \n';
		if(erreur == '') {
			ok = true;
			$('#frmMessage').submit();
			alert('ok');
		} else {
			alert(erreur);
			return ok;
		}

	}

	function loadImage(src) {
		$("#over").click(function() {
			$("#over").css("display", "none");
		});
		var img = new Image();

		img.onload = function() {
			$("#over").html("");
			document.getElementById('over').appendChild(img);
		}
		img.src = src;
		$("#over").css("display", "block");
		$("#over").html("Charement de l'image");
	}
</script>
<?php 
if ($annonce1 -> type_annonce == 1)
	$type = 'Vente';
else
	$type = 'Location';
switch($annonce1->monaie) {
	case 'DOLLAR' :
		$monnaie = '$';
		break;
	case 'EURO' :
		$monnaie = '&euro;';
		break;
	case 'GNF' :
		$monnaie = 'GNF';
		break;
	case 'FCFA' :
		$monnaie = 'FCFA';
		break;
}
?>
<div class="content_botbg">
	<div class="content_res">
		<div id="breadcrumb">
			<div id="crumbs">
				<a href=" <?php echo base_url();?>">Accueil</a> &raquo; <a href=" <?php echo base_url() . 'annonces/section/' . $annonce1 -> id_section;?>"><?php echo utf8_decode($annonce1 -> section);?></a> &raquo; <a href="<?php echo base_url() . 'annonces/categorie/' . $annonce1 -> id_category;?>"><?php echo utf8_decode($annonce1 -> categorie);?></a> &raquo; <?php echo $annonce1 -> titre;?><span class="current"></span>
			</div>
		</div>
		<div class="clr"></div>
		<div class="content_left">
		    <?php echo $this->load->view('inc/likebutton') ?>
			<div class="shadowblock_out">
			    <?php $annonce_id=$annonce1->id_annonce; ?>
				<div class="shadowblock">
					<div class="price-wrap">
						<span class="tag-head">&nbsp;</span>
						<p class="post-price">
							<?php echo $monnaie . ' ' . number_format($annonce1 -> prix, 0, 0, ' ');?>
						</p>
					</div>
					<h1 class="single-ad"><a href="" title="Brand New Ducati"><?php echo $annonce1 -> titre;?></a></h1>
					<div class="clr"></div>
					<div class="pad5 dotted"></div>
					<div class="bigright">
						<ul>
                       <!-- <li id="cp_state">
								<span>T&eacute;l&eacute;phone:</span><?php echo $user->phone;?>
							</li>-->
							<li id="cp_state">
								<span>Ville:</span><?php echo $annonce1 -> ville;?>
							</li>
							<li id="cp_country">
								<span>Pays:</span><?php echo $annonce1 -> pays;?>
							</li>
							<li id="cp_listed">
								<span>Date Ajout:</span><?php echo $annonce1 -> ajout;?>
							</li>
							<li id="cp_expires">
								<span>Vues:</span><?php echo $annonce1 -> views;?>
								fois
							</li>
							<li id="cp_state">
								<span>Type annonce:</span><?php echo $type;?>
                                                        </li>
                                                        <li id="cp_state">
                                                            <span>ID annonce:</span><?php echo $annonce1 -> id_annonce;?>
                                                        </li>
                                                          <li id="cp_state">
                                                              <span>Téléphone:</span><?php echo $user->phone ?>
                                                          </li>                                                                                                                                    
						</ul>
					</div><!-- /bigright -->
					<div class="bigleft">
						<div id="main-pic">
							<a style="opacity: 1;" href=""  class="img-main cboxElement" rel="colorbox"><img src="<?php echo base_url().'assets/uploads/'.(($image1=="")?"noimage.jpg":$image1) ?>" title="<?php echo $annonce1->titre ?>" alt="<?php echo $annonce1->titre ?>" width="120" height="100"/></a>
							<div class="clr"></div>
						</div>
						<div id="thumbs-pic">
							<?php
							if ($images != NULL) {
								foreach ($images as $image) :
									echo '<a href="' . base_url() . 'assets/uploads/' . $image -> image . '"  id="thumb1" class="post-gallery cboxElement" rel="colorbox" title="' . $annonce1 -> titre . '">
<img  src="' . base_url() . 'assets/uploads/' . $image -> image . '" alt="" title="" height="36" width="50" />
</a>';
								endforeach;
							}
							?>
							<div class="clr"></div>
						</div>
					</div><!-- /bigleft -->
					<div class="clr"></div>
					<div class="single-main">
						<h3 class="description-area">Description</h3>
						<div class="dotted"></div>
						<p>
							<?php echo nl2br($annonce1 -> detail);?>.
						</p>
					</div>
					<div style="margin-left:8px !important" class="shr-bookmarks shr-bookmarks-expand shr-bookmarks-center">
						<div style="clear:both;"></div>
					</div>
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
                ?>
                <div class="post-block-out">
                    <div class="post-block">
                        <div class="post-left">
                            <a href="<?php echo base_url() . 'annonces/detail/' . format_url($annonce -> titre) . '_' . $annonce -> id_annonce ?>" title="<?php echo $annonce -> titre;?>" class="preview" ><img width="75" height="50" src="<?php echo base_url().'assets/uploads/'.(($image=="")?"noimage.jpg":$image) ?>" class="attachment-ad-thumb" alt="<?php echo $annonce -> titre;?>" title="<?php echo $annonce -> titre;?>"/></a>
                        </div>
                        <div class="post-right full">
                            <div class="price-wrap">
                                <span class="tag-head">&nbsp;</span>
                                <p class="post-price">
                                    <?php echo $monnaie . ' ' . number_format($annonce -> prix, 0, 0, ' ');?>
                                </p>
                            </div>
                            <h3><a href="<?php echo base_url() . 'annonces/detail/' . format_url($annonce -> titre) . '_' . $annonce -> id_annonce ?>"><?php echo $annonce -> titre;?></a></h3>
                            <div class="clr"></div>
                            <p class="post-meta">
                                <?php //echo character_limiter($annonce -> C_ANNONCE, 80);?><br />
                                <span class="folder"><span class="clock"><span><?php echo $annonce -> ajout;?></span></span>
                            </p>
                            <div class="clr"></div>
                            <div class="clr"></div>
                        </div>
                        <div class="clr"></div>
                    </div><!-- /post-block -->
                </div><!-- /post-block-out -->
                <?php endforeach; }else echo '  <div class="shadowblock" id="aucun"><p>Aucune annonce pour la même catégorie </p></div>';?> 
			
			<div class="clr"></div>
			<!-- /shadowblock_out -->
			<div class="clr"></div>
			<!-- /shadowblock_out -->
		</div><!-- /content_left -->
		<!-- right sidebar -->
		<div class="content_right">
			<div class="tabprice">
				<ul class="tabnavig">
					<li>
						<a class="selected" href="javascript:;" onclick="contactDisplay()" id="contacttab"><span class="big">Contact</span></a>
					</li>
					<li>
						<a class="" href="javascript:;" onclick="annonceurDisplay()" id="usertab"><span class="big">Annonceur</span></a>
					</li>
				</ul>
				<!-- tab 2 -->
				<div style="display: block;" id="priceblock2">
					<div class="clr"></div>
					<div class="singletab">
						<div id="error"></div>
						<form name="mainform" onsubmit="return validation()" id="frmMessage" class="form_contact" action="<?php echo base_url().'annonces/sendMessage' ?>" method="post" enctype="multipart/form-data">
							<p class="contact_msg">
								Remplir le formulaire ci-dessous pour envoyer un message &agrave; l'annonceur.
							</p>
							 <p style="float: left;text-align: center; color:<?php if(isset($color)) echo $color; ?>; width: 475px; margin: auto;">
                              <?php if(isset($succes)) echo $succes; ?>
                            </p> 
							<ol>
								<li>
									<label>Nom:</label>
									<input name="nom" id="nom" minlength="2" class="text" type="text"/>
									<div class="clr"></div>
								</li>
								<li>
									<label>Email:</label>
									<input name="mail" id="email" minlength="5" class="text" type="text"/>
									<div class="clr"></div>
								</li>
								<li>
									<label>T&eacute;l&eacute;phone:</label>
									<input name="phone" id="phone" minlength="5" class="text" type="text"/>
									<div class="clr"></div>
								</li>
								<li>
									<label>Sujet:</label>
									<input name="sujet" id="sujet" minlength="2" value="Re: <?php echo $annonce1->titre ?>" class="text" type="text"/>
									<div class="clr"></div>
								</li>
								<li>
									<label>Message:</label>
									<textarea name="message" id="msg" rows="" cols="" class="text required "></textarea>
									<div class="clr"></div>
								</li>
								<input name="idannonce" value="<?php echo $annonce_id;?>" type="hidden"/>
								<input name="iduser" value="<?php echo $annonce1 -> id_user;?>" type="hidden"/>
								<li>
									<input name="submit" id="submit_inquiry" class="btn_orange" value="Envoyer" type="submit" />
								</li>
							</ol>
						</form>
					</div><!-- /singletab -->
				</div><!-- /priceblock2 -->
				<!-- tab 3 -->
				<div style="display: none;" id="priceblock3">
					<div class="clr"></div>
					<div class="postertab">
						<div class="priceblocksmall dotted">
							<p class="member-title">
								Information sur l'annonceur
							</p>
							<div id="userphoto">
								<p class="image-thumb"><img alt="" src="<?php echo base_url().'assets/'?>i/Icon-user.png" class="avatar avatar-64 photo" height="64" width="64">
								</p>
							</div>
							<ul class="member">
								<li>
									<span>Publi&eacute;e par : </span><?php echo $user->pseudo
									?>
								</li>
								<li>
									<span>Membre depuis: </span><?php echo date('d M ,Y',$user->dateajout)
									?>
								</li>
								<li>
									<span>Pays : </span><?php echo $user->pays
									?>
								</li>
								<li>
									<span>Ville: </span><?php echo $user->ville
									?>
								</li>
                                <li>
									<span>T&eacute;l&eacute;phone  : </span><?php echo $user->phone?>
								</li>
							</ul>
							<div class="pad5"></div>
							<div class="clr"></div>
						</div>
						<div class="pad5"></div>
						<?php if($annonces_users!=NULL){ ?>
						<h3>Autres annonces publi&eacute;es par <?php echo $user->pseudo?></h3>
						<div class="pad5"></div>
						<ul>
							<?php foreach($annonces_users as $annonce):?>
							<li>
								<a href="javascript:;" onclick="ViewAnnonce(<?php echo $annonce -> id_annonce . ',\'' . format_url($annonce -> titre) . '\'';?>)"><?php echo $annonce -> titre;?></a>
							</li>
							<?php endforeach ;?>
						</ul>
						<?php } ?>
						<div class="pad5"></div>
					</div><!-- /singletab -->
				</div><!-- /priceblock3 -->
			</div><!-- /tabprice -->
			<?php $this->load->view('inc/addpopulaires');
			?>
 <?php $this -> load -> view('inc/facebook');?>
			<!-- /shadowblock_out --><!-- /shadowblock_out -->
		</div><!-- /content_right -->
		<div class="clr"></div>
	</div><!-- /content_res -->
</div>
