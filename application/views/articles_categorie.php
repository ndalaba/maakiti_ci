<script>
 $(window).load(function() {
     $('.nav li').removeClass('current_page_item');
     $('#actualites .nav .actualites ').addClass('current_page_item');
  
  });
</script>
<div class="content_botbg">
    <div class="content_res">
        <div id="breadcrumb">
            <div id="crumbs"><a href="<?php echo base_url() ?>">home </a>&nbsp;&nbsp; &raquo;  <span class="current"><?php echo $categ->categorie_article ?></span></div>
        </div>
        <div class="content_left">
            <?php if($newscat!=NULL) {
                    foreach($newscat as $new):
            ?>                                     
            <div class=" post  shadowblock_out">
                <div class="shadowblock" style="min-height: 195px;">
                    <h1 class="single blog"><a href="<?php echo base_url().'control/actu_detail/'.$new->AID ?>" rel="bookmark" title="<?php echo $new->titre ?>"><?php echo $new->titre ?></a></h1>
                    <p class="meta dotted"><span class="folderb"><a href="<?php echo base_url().'control/cat_actualites/'.$new->CID ?>" title="Voir toutes les actualiés de <?php echo $new->categorie_article ?>" rel="category tag"><?php echo $new->categorie_article ?></a></span> | <span class="clock"><span><?php echo $new->publication ?></span></span></p>
                    <div class="entry-content">
                        <a href="<?php echo base_url().'control/actu_detail/'.$new->AID ?>" ><img src="<?php echo $new->image ?>" class="attachment-blog-thumbnail wp-post-image" alt="<?php echo $new->titre ?>]" title="<?php echo $new->titre ?>" height="102" width="150"/></a>
                        <p class="texte"><a href="<?php echo base_url().'control/actu_detail/'.$new->AID ?>" ><?php echo character_limiter($new->contenu,300) ?> </a> </p>
                        <p><a href="<?php echo base_url().'control/actu_detail/'.$new->AID ?>" class="more-link">Lire suite</a></p>
                    </div>    
                </div><!-- #shadowblock -->
            </div><!-- #shadowblock_out -->
                   
            <?php endforeach; } else echo '	<div class="shadowblock" id="aucun"><p>Aucune actualite correspondant a cette categorie pour le moment </p></div>';?>                  
        </div> <div class="content_right">
        <div class="shadowblock_out" id="widget_categories">
            <div class="shadowblock">
                <h2 class="dotted">Actu Categories</h2>
        		<ul>
                    <?php foreach($cats as $cat):?>
                       <li class="cat-item cat-item-1472"><a href="<?php echo base_url().'control/cat_actualites/'.$cat->CID ?>" title="Voir toutes les actualiés de <?php echo $cat->categorie_article ?>"><?php echo $cat->categorie_article ?></a> ( <?php echo $cat->titre ?> )</li>
                    <?php endforeach ;?>
                </ul>
            </div><!-- /shadowblock -->
        </div>
    </div><div class="clr"></div>
    <!-- /content_right -->
           
    </div><!-- /content_res -->
</div><!-- /content_botbg -->
