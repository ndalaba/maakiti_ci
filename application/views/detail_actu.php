<script>
 $(window).load(function() {
     $('.nav li').removeClass('current_page_item');
     $('#actualites .nav .actualites ').addClass('current_page_item');
  
  });
</script>
    <div class="content_botbg">
        <div class="content_res">
            <div id="breadcrumb">
            <div id="crumbs"><a href="<?php echo base_url() ?>">Accueil </a>&nbsp; &raquo; <a href="<?php echo base_url().'control/actualites' ?>">Actualites</a>  &raquo;&nbsp;<span class="current"><?php echo $new->titre ?></span></div>
        </div>
            <div class="content_left">
                <?php echo $this->load->view('inc/likebutton') ?>
                        <div class="shadowblock_out">
                            <div class="shadowblock" >
                                <div class="post">
                                    <h1 class="single dotted"><?php echo $new->titre ?></h1>
                                    <div id="lipsum">
<p><img class="alignleft size-medium wp-image-44" title="classified_products" src="<?php echo $new->image ?>" alt="classified_products" height="207" width="300">
 <?php echo $new->contenu ?>.</p></div>
                                    <div class="prdetails">
									</div>

                                </div><!--/post-->
                            </div><!-- /shadowblock -->
                        </div><!-- /shadowblock_out -->
                        <?php $this->load->view('inc/fbcomment')?>
					<div class="clr"></div>
    
     <!-- /respond -->
                </div><!-- /content_left -->
                <!-- right block -->
<div class="content_right">
    <div class="shadowblock_out" id="widget_categories">
            <div class="shadowblock">
                <h2 class="dotted">Actu Catégories</h2>
        		<ul>
                    <?php foreach($cats as $cat):?>
                       <li class="cat-item cat-item-1472"><a href="<?php echo base_url().'control/cat_actualites/'.$cat->CID ?>" title="Voir toutes les actualit&eacute;s de <?php echo $cat->categorie_article ?>"><?php echo $cat->categorie_article ?></a> ( <?php echo $cat->titre ?> )</li>
                    <?php endforeach ;?>
                </ul>
            </div><!-- /shadowblock -->
        </div>
     <?php $this->load->view('inc/news'); ?> <?php $this -> load -> view('inc/facebook');?>       
        
        </div><!-- /shadowblock_out -->    
</div><!-- /content_right -->
            <div class="clr"></div>
        </div><!-- /content_res -->
    </div><!-- /content_botbg -->