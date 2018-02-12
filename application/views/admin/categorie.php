<div class="wrap nosubsub" style="float: left;">
	<div class="icon32" id="icon-edit"><br/></div>
    <h2>Cat&eacute;gories</h2>
    <div id="col-container">
        <div id="col-right">
            <div class="col-wrap">
            <form method="get" action="" id="posts-filter">
                <h3>Listes cat&eacute;gories</h3>                
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
                                <th class="check-column" title="supprimer la sous categorie" scope="row" onclick="supprimerCategorie(<?php echo $categorie->id_cat ?>)"></th>
                                <td class="name column-name"><a id="titre<?php echo $categorie->id_cat ?>" title="<?php echo utf8_decode($categorie->categorie) ?>" href="javascript:" class="row-title" onclick="chargerCategorie(<?php echo $categorie->id_cat ?>,'')"><?php echo utf8_decode($categorie->categorie) ?></a><br/></td>
                                <td class="name column-name" colspan="2"><a id="desc<?php echo $categorie->id_cat ?>" title="<?php echo utf8_decode($categorie->description) ?>" href="javascript:" class="row-title" onclick="chargerCategorie(<?php echo $categorie->id_cat ?>)"><?php echo utf8_decode($categorie->description) ?></a><br></td>
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
                    <h3>Ajouter une  cat&eacute;gorie</h3>
                    <div id="ajax-response"></div>
                    <?php echo form_open('admin/home/categorie',array('class'=>'add:the-list: validate','id'=>'addcat','name'=>'addcat')) ?>
                        <input type="hidden" name="catID" id="catID" />    
                        <div class="form-field form-required">
                        	<label for="cat_name">Nom de la  cat&eacute;gorie</label>
                        	<input type="text" aria-required="true" size="40" value="" id="cat_name" name="cat" tabindex="1"/>                            
                        </div>
                        <div class="form-field form-required">
                        	<label for="cat_name">Nom de la Section</label>
                        	<select style="width: 370px;" id="sec" name="sec">                                    
                              
                                   <?php foreach($sections as $section): ?>
                                        <option value="<?php echo $section->id_section ?>"><?php echo $section->section ?></option>
                                    <?php endforeach;?>  
                                                                       
                            </select>                            
                        </div>
                        <div class="form-field form-required">
                        	<label for="cat_name">Description de la cat&eacute;gorie</label>
                        	<textarea name="content" id="content"  class="mceEditor" rows="3" cols="15" tabindex="2" tabindex="2"></textarea>                           
                        </div>
                        <p class="submit">
                            <input type="button" value="Ajouter une cat&eacute;gorie" name="add" class="button" onclick="addCategorie()" tabindex="3"/>
                            <input type="button" value="Modifier la  cat&eacute;gorie" name="edit" class="button" onclick="editCategorie()" tabindex="4"/>
                        </p>
                    </form>
                </div>
            </div>
        </div><!-- /col-left -->
    </div><!-- /col-container -->
</div>