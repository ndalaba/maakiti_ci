<div class="wrap nosubsub" style="float: left;">
	<div class="icon32" id="icon-edit"><br/></div>
    <h2>Section</h2>
    <div id="col-container">
        <div id="col-right">
            <div class="col-wrap">
            <form method="get" action="" id="posts-filter">
                <h3>Listes Section</h3>                
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
                        <?php if(isset($sections)){ foreach($sections as $section): ?>
                            <tr class="iedit alternate" id="cat-3" style="">
                                <th class="check-column" title="supprimer la section" scope="row" onclick="supprimerSection(<?php echo $section->id_section ?>)"></th>
                                <td class="name column-name"><a id="titre<?php echo $section->id_section ?>" title="<?php echo utf8_decode($section->section) ?>" href="javascript:" class="row-title" onclick="chargerSection(<?php echo $section->id_section ?>,'')"><?php echo utf8_decode($section->section) ?></a><br/></td>
                                <td class="name column-name" colspan="2"><a id="desc<?php echo $section->id_section ?>" title="<?php echo utf8_decode($section->description) ?>" href="javascript:" class="row-title" onclick="chargerSection(<?php echo $section->id_section ?>)"><?php echo utf8_decode($section->description) ?></a><br></td>
                                <td class="name column-name"><?php echo utf8_decode($section->titre) ?><br/></td>
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
                    <h3>Ajouter une section</h3>
                    <div id="ajax-response"></div>
                    <?php echo form_open('admin/home/section',array('class'=>'add:the-list: validate','id'=>'addcat','name'=>'addcat')) ?>
                        <input type="hidden" name="catID" id="catID" />    
                        <div class="form-field form-required">
                        	<label for="cat_name">Nom de la section</label>
                        	<input type="text" aria-required="true" size="40" value="" id="cat_name" name="cat" tabindex="1"/>                            
                        </div>
                        <div class="form-field form-required">
                        	<label for="cat_name">Description de la section</label>
                        	<textarea name="content" id="content"  class="mceEditor" rows="3" cols="15" tabindex="2" tabindex="2"></textarea>                           
                        </div>
                        <p class="submit">
                            <input type="button" value="Ajouter une section" name="add" class="button" onclick="addSection()" tabindex="3"/>
                            <input type="button" value="Modifier la section" name="edit" class="button" onclick="editSection()" tabindex="4"/>
                        </p>
                    </form>
                </div>
            </div>
        </div><!-- /col-left -->
    </div><!-- /col-container -->
</div>