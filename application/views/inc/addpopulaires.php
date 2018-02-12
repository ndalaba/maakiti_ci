<div class="shadowblock_out" id="widget_top_ads_overall">
<div class="shadowblock"><h2 class="dotted">Les plus populaires</h2>
    <ul class="pop">
    <?php if($views!=NULL){
        foreach($views as $annonce):{} ?>     
            <li><a href="<?php echo base_url() . 'annonces/detail/' . format_url($annonce -> titre) . '_' . $annonce -> id_annonce ?>"><?php echo $annonce->titre;?></a> (<?php echo $annonce->views;?>&nbsp;vues)</li>
      <?php endforeach; }?>   
    </ul>
</div><!-- /shadowblock --></div>