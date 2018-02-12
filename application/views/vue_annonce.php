<script type="text/javascript" src="<?php echo base_url().'assets/'?>j/jquery.lightbox-0.5.js"></script>
<link rel="stylesheet" id="sexy-bookmarks-css" href="<?php echo base_url().'assets/'?>c/jquery.lightbox-0.5.css" type="text/css" media="all">
<script type="text/javascript">
	$(function() {
		$('#thumbs-pic a').lightBox();
	});

</script>
<script type="text/javascript">	
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
if ($annonce -> type_annonce == 1)
	$type = 'Vente';
else
	$type = 'Location';
switch($annonce->monaie) {
	case 'DOLLAR' :$monnaie = '$';break;
	case 'EURO' :$monnaie = '&euro;';break;
	case 'GNF' :$monnaie = 'GNF';break;
	case 'FCFA' :$monnaie = 'FCFA';	break;
}
?>
<div class="content_botbg">
	<div class="content_res">
		<div class="content_left">
			<div class="shadowblock_out">
				
				<div class="shadowblock" >
					<div class="price-wrap">
						<span class="tag-head">&nbsp;</span>
						<p class="post-price">
							<?php echo $monnaie . ' ' . number_format($annonce -> prix, 0, 0, ' ');?>
						</p>
					</div>
					<h1 class="single-ad"><a href="" title="Brand New Ducati"><?php echo $annonce -> titre;?></a></h1>
					<div class="clr"></div>
					<div class="pad5 dotted"></div>
					<div class="bigright">
						<ul>
							<li id="cp_state">
								<span>Ville:</span><?php echo $annonce -> ville;?>
							</li>
							<li id="cp_country">
								<span>Pays:</span><?php echo $annonce -> pays;?>
							</li>
							<li id="cp_listed">
								<span>Date Ajout:</span><?php echo $annonce -> ajout;?>
							</li>
							<li id="cp_expires">
								<span>Vues:</span><?php echo $annonce -> views;?>
								fois
							</li>
							<li id="cp_state">
								<span>Type annonce:</span><?php echo $type;?>
						</ul>
					</div><!-- /bigright -->
					<div class="bigleft">
						<div id="main-pic">
							<a style="opacity: 1;" href=""  class="img-main cboxElement" rel="colorbox"><img src="<?php echo base_url().'assets/uploads/'.(($image1=="")?"noimage.jpg":$image1) ?>" title="<?php echo $annonce->titre ?>" alt="<?php echo $annonce->titre ?>" width="120" height="100"/></a>
							<div class="clr"></div>
						</div>
						<div id="thumbs-pic">
							<?php
							if ($images != NULL) {
								foreach ($images as $image) :
									echo '<a href="' . base_url() . 'assets/uploads/' . $image -> image . '"  id="thumb1" class="post-gallery cboxElement" rel="colorbox" title="' . $annonce -> titre . '">
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
							<?php echo nl2br($annonce -> detail);?>.
						</p>
					</div>
					<div style="margin-left:8px !important" class="shr-bookmarks shr-bookmarks-expand shr-bookmarks-center">
						<div style="clear:both;"></div>
					</div>
				</div><!-- /shadowblock -->				
				<div class="shadowblock" style="text-align: center; ">					
					<a style="font: 24px arial;" href="<?php echo site_url('annonces/add')?>">Ajoutez plus d'annonces</a>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;				
					<a href="<?php echo site_url('user/profil') ?>" style="font-size: 17px;">Voir mon profil</a>
				</div>
			</div>
		</div>
		<div class="content_right">
			<?php $this -> load -> view('inc/featured');?><!-- /shadowblock_out --><!-- /shadowblock_out --><!-- /shadowblock_out -->
		</div>
	</div><!-- /content_right -->
	<div class="clr"></div>
</div><!-- /content_res -->
</div>