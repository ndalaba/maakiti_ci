<div class="wrap nosubsub" style="float: left;">
	<div class="icon32" id="icon-edit"><br/></div>
    <h2>Categorie</h2>
    <div id="col-container">
        <div id="col-right">
            <div class="col-wrap">
            <form method="get" action="" id="posts-filter">
                <h3>Liste Categories</h3>                
                <table cellspacing="0" class="widefat fixed">
                	<thead>
                    	<tr>
                        	<th style="width: 20px;" class="manage-column column-cb " id="cb" scope="col"></th>
                        	<th style="" class="manage-column column-name" id="name" scope="col">Nom</th>
                        	<th style="" class="manage-column column-description" id="description" scope="col" colspan="2">Description</th>                        	
                        	<th style="" class="manage-column column-posts num" id="posts" scope="col">Articles</th>
                    	</tr>
                	</thead>                	
                	<tbody class="list:cat" id="the-list">
                       <?php if(isset($categories)){ foreach($categories as $categorie): ?>
                            <tr class="iedit alternate" id="cat-3" style="">
                                <th class="check-column" title="supprimer la sous categorie" scope="row" onclick="supprimerCatArticle(<?php echo $categorie->CID ?>)"></th>
                                <td class="name column-name"><a id="titre<?php echo $categorie->CID ?>" title="<?php echo utf8_decode($categorie->categorie_article) ?>" href="javascript:" class="row-title" onclick="chargerCategorie(<?php echo $categorie->CID ?>,'')"><?php echo utf8_decode($categorie->categorie_article) ?></a><br/></td>
                                <td class="name column-name" colspan="2"><a id="desc<?php echo $categorie->CID ?>" title="<?php echo utf8_decode($categorie->description) ?>" href="javascript:" class="row-title" onclick="chargerCategorie(<?php echo $categorie->CID ?>)"><?php echo utf8_decode($categorie->description) ?></a><br></td>
                                <td class="name column-name"><?php echo utf8_decode($categorie->titre) ?><br/></td>
                            </tr>
                        <?php endforeach; } ?>                       
                	</tbody>
                </table>                
            </form>            
            </div>
        </div><!-- /col-right -->
        <div id="col-left">
            <div class="col-wrap">
                <div class="form-wrap">
                    <h3>Ajouter une Categorie</h3>
                    <div id="ajax-response"></div>
                   <?php echo form_open('#',array('class'=>'add:the-list: validate','id'=>'addcat','name'=>'addcat')) ?>
                         <input type="hidden" name="catID" id="catID" />    
                        <div class="form-field form-required">
                        	<label for="cat_name">Nom de la Categorie</label>
                        	<input type="text" aria-required="true" size="40" value="" id="cat_name" name="cat" tabindex="1"/>                            
                        </div>
                        <div class="form-field form-required">
                        	<label for="cat_name">Description de la Categorie</label>
                        	<textarea name="content" id="content"  class="mceEditor" rows="3" cols="15" tabindex="2" tabindex="2"></textarea>                           
                        </div>
                        <p class="submit">
                            <input type="button" value="Ajouter une Categorie" name="add" class="button" onclick="addCatArticle()" tabindex="3"/>
                            <input type="button" value="Modifier la Categorie" name="edit" class="button" onclick="editCatArticle()" tabindex="4"/>
                        </p>
                    </form>
                </div>
            </div>
        </div><!-- /col-left -->
    </div><!-- /col-container -->
</div>