<div id="widget_appthemes_blog_posts" class="shadowblock_out">
	<div class="shadowblock">
		<h2 class="dotted">Annonces à la Une </h2>
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
			
            
            
            <li>
				<div class="post-thumb">
					<a href="<?php echo base_url() . 'annonces/detail/' . format_url($une -> titre) . '_' . $une -> id_annonce ?>"><img title="<?php echo $une->titre?>" alt="<?php echo $une->titre?>" class="attachment-sidebar-thumbnail wp-post-image" src="<?php echo base_url().'assets/uploads/'.(($image=="")?"noimage.jpg":$image) ?>" width="50" height="34"/></a>
				</div>
				<h3><a href="<?php echo base_url() . 'annonces/detail/' . format_url($une -> titre) . '_' . $une -> id_annonce ?>"><?php echo $une->titre
				?></a></h3>
				
				<p>
					<?php echo $monnaie . ' ' . number_format($une -> prix, 0, 0, ' ');?>
				
				</p>
			</li>
			<?php endforeach;?>
		</ul>
	</div>
</div>