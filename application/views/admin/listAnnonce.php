<div class="wrap">
    <div class="icon32" id="icon-edit"><br/></div>
    <h2>Modifier les annonces <?php echo anchor('admin/Accueil/article','Ajouter',array('class'=>'button add-new-h2')) ?></h2>
    <style type="text/css">#posts-filter{float: left;}</style>
    <?php echo form_open('admin/home/filtreAnnonce', array('id'=>'posts-filter')) ?>   
        <ul class="subsubsub">
            <li><a class="current" href="<?php echo site_url('admin/home/dolist') ?>">Tous <span class="count">(<?php echo $count; ?>)</span></a> |</li>
            <li><a href="<?php echo site_url('admin/home/doNormal') ?>">Normales <span class="count">(<?php echo $normales; ?>)</span></a></li>
            <li><a href="<?php echo site_url('admin/home/doFeatured') ?>">Featured <span class="count">(<?php echo $featured; ?>)</span></a></li>
        </ul>
        <!--<p class="search-box">
            <label for="post-search-input" class="screen-reader-text">Chercher dans les articles:</label>
            <input type="text" value="" name="s" id="post-search-input"/>
            <input type="submit" class="button" value="Chercher dans les articles"/>
        </p> -->       
        <div class="tablenav">
            <div class="alignleft actions">                
                <select class="postform" id="cat" name="cat">
                    <option value="0">Voir toutes les cat&eacute;gories</option>
                    <?php foreach ($sections as $section):
                                    $this->load->model(array('admin/categorie_model','annonce_model'));
                                    $categories=$this->categorie_model->getListbySec($section->id_section);
                                    echo '<optgroup label="'.$section->section.'">';
                                    
                                    foreach($categories as $categorie):
                                        $nbre=count($this->annonce_model->getListBycat($categorie->id_cat));
                                        echo '<option value="'.$categorie->id_cat.'" class="level-1">&nbsp;&nbsp;&nbsp;'.utf8_decode($categorie->categorie).'&nbsp;&nbsp;('.$nbre.')</option>';
                                    
                                    endforeach;
                                    echo'</optgroup>';
                            
                            
                            endforeach; ?>                  
                </select>
                <input type="submit" class="button-secondary" value="Filtrer" id="post-query-submit"/>
            </div>            
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
        <table cellspacing="0" class="widefat post fixed">
            <thead>
                <tr>
                    <th style="width: 20px;" class="manage-column column-cb" id="cb" scope="col"></th>
                    <th style="" class="manage-column column-title" id="title" scope="col">Article</th>
                    <th style="" class="manage-column column-author" id="author" scope="col">Auteur</th>
                    <th style="" class="manage-column column-categories" id="categories" scope="col">Cat&eacute;gories</th>
                    <th style="" class="manage-column column-tags" id="tags" scope="col">Publi&eacute;</th>                    
                    <th style="" class="manage-column column-date" id="date" scope="col">Date</th>
                </tr>
            </thead>            
            <tbody>
                <?php if(isset($news)){ foreach($news as $new): ?>
                    <tr valign="top" class="alternate author-self status-publish iedit" id="post-1">
                        <th class="check-column" scope="row" title="supprimer l'annonce" onclick="supprimerAnnonce(<?php echo $new->id_annonce ?>)"></th>
                    	<td class="post-title column-title">
                            <strong><?php echo anchor('admin/home/vue_annonce/'.$new->id_annonce,utf8_decode($new->titre),array('title'=>utf8_decode($new->titre),'class'=>'row-title')) ?></strong>                        		
                        </td>
                    	<td class="author column-author"><a href="#"><?php //echo $new->login ?></a></td>
                    	<td class="categories column-categories"><a href="#"><?php echo utf8_encode($new->categorie) ?></a></td>
                    	<td class="tags column-tags"><?php echo $new->publie ?></td>                	
                        <td class="date column-date"><abbr title="<?php //echo $new->publication ?>"><?php //echo $new->publication ?></abbr></td>	
                    </tr>
                <?php endforeach; } ?> 
            </tbody>
        </table>       
    </form>   
</div>
<p style="float: left; padding-left: 10px;"> <?php echo $pagination ?></p>
