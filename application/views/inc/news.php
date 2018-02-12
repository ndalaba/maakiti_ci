<div id="widget_appthemes_blog_posts" class="shadowblock_out">
	<div class="shadowblock">
		<h2 class="dotted">Actualit&eacute;s </h2>
		<ul class="from-blog">
			<?php if($news!=NULL) {
					foreach($news as $new):
			?>
			<li>
				<div class="post-thumb">
					<img title="<?php echo $new->titre?>" alt="<?php echo $new->titre?>" class="attachment-sidebar-thumbnail wp-post-image" src="<?php echo $new->image?>" width="50" height="34">
				</div>
				<h3><a href="<?php echo base_url().'control/actu_detail/'.$new->AID ?>"><?php echo $new->titre
				?></a></h3>
				<p class="side-meta">
					Publi&eacute; le <?php echo $new->publication
					?>
				</p>
				<p>
					<?php echo character_limiter($new->contenu,100)
					?>
				</p>
			</li>
			<?php endforeach; }?>
		</ul>
	</div>
</div>