
<div style="overflow: hidden;" id="wpbody-content">
    <div class="wrap">
        <div id="icon-index" class="icon32"><br/></div>
        <h2>Modification d'une Annonce</h2>
        <div id="dashboard-widgets-wrap">            
            <?php echo form_open('admin/home/editFeatured') ?>                   
            <input type="hidden" name="auteur" value="<?php echo $annonce->id_user ?>" />
          
            <input type="hidden" name="id" value="<?php echo $annonce->id_annonce ?>" />
            <div id="dashboard-widgets" class="metabox-holder">                       
                <div class="postbox-container" style="width:69%;">
                    <div id="side-sortables" class="meta-box-sortables ui-sortable">
                        <div id="dashboard_quick_press" class="postbox ">
                            <div class="handlediv" title="Cliquer pour inverser."><br/></div>
                            <h3 class="hndle"><span>Modifier l'annonce</span></h3>
                            <div class="inside"> 
                                    <div style="color: red;"><?php echo validation_errors(); ?></div>                                
                                    <h4 id="quick-post-title"><label for="title">Titre</label></h4>
                                    <div class="input-text-wrap">
                                        <input name="title" id="title" tabindex="1" style="width: 99%;" type="text" value="<?php echo utf8_decode($annonce->titre) ?>"/>
                                    </div>				
                                    <h4 id="content-label"><label for="content">Contenu</label></h4>
                                    <div class="textarea-wrap">
                                        <textarea  id="content" class="mceEditor" rows="3" cols="15" tabindex="2"><?php echo utf8_decode($annonce->detail) ?></textarea>
                                        <textarea style="visibility: hidden; height: 10px;" name="comment" id="contenu"></textarea>
                                    </div> 
                                     <h4 id="quick-post-title"><label for="title">Featured</label></h4>
                                    <div class="input-text-wrap">
                                        <label>Oui</label><input name="featured" id="featuread1" type="radio" value="1" <?php if($annonce->featured==1) echo "checked" ?>/>
                                        <label>Non</label><input name="featured" id="featuread2" type="radio" value="0" <?php if($annonce->featured==0) echo "checked" ?>/>
                                    </div>                                                               
                                    <p class="submit" style="text-align: right;">                                            	                                       
                                    	<input name="publish" id="publish" accesskey="p" tabindex="5" class="button-primary" value="Enregistrer" type="submit"/>
                                    	<br class="clear"/>
                                    </p>                              
                            </div>
                        </div>
                    </div>	
                </div> 
                <div class="postbox-container" style="width:29%;">
                    <div id="side-sortables" class="meta-box-sortables ui-sortable">
                        <div id="dashboard_quick_press" class="postbox ">
                            <div class="handlediv" title="Cliquer pour inverser."><br/></div>
                            <h3 class="hndle"><span>Publier</span></h3>
                            <div class="inside">
                                <p><span id="timestamp">Publi&eacute; le: <b id="pub"><?php echo $annonce->ajout ?></b>&nbsp;<a href="javascript:" onclick="$('#divpub').slideToggle();">Modifier</a><br /></span></p>
                                <div id="divpub" style="display: none;">
                                    <span id="timestamp">Publier: Date de publication</span>                                    	
                                    	<div class="hide-if-js" id="timestampdiv" style="display: block;">
                                            <div class="timestamp-wrap">
                                                <input type="text" autocomplete="off" tabindex="4" maxlength="2" size="2" value="14" name="jj" id="jj"/> 
                                                <select tabindex="4" name="mm" id="mm">
                                        			<option value="01">jan</option>
                                        			<option value="02">f&eacute;v</option>
                                        			<option value="03">mar</option>
                                        			<option value="04">avr</option>
                                        			<option value="05">mai</option>
                                        			<option value="06">juin</option>
                                        			<option value="07">juil</option>
                                        			<option value="08">ao�t</option>
                                        			<option value="09">sept</option>
                                        			<option value="10">oct</option>
                                        			<option value="11">nov</option>
                                        			<option value="12">d&eacute;c</option>
                                                </select> 
                                                <input type="text" autocomplete="off" tabindex="4" maxlength="4" size="4" value="2011" name="aa" id="aa"> � 
                                                <input type="text" autocomplete="off" tabindex="4" maxlength="2" size="2" value="11" name="hh" id="hh"> h 
                                                <input type="text" autocomplete="off" tabindex="4" maxlength="2" size="2" value="38" name="mn" id="mn"> min
                                            </div>                                            
                                        </div>
                                     </div><script type="text/javascript">chpub();</script>   
                            </div>
                        </div>
                    </div>
                </div>                      
                <div class="postbox-container" style="width:29%;">
                    <div id="side-sortables" class="meta-box-sortables ui-sortable">
                        <div id="dashboard_quick_press" class="postbox ">
                            <div class="handlediv" title="Cliquer pour inverser."><br/></div>
                            <h3 class="hndle"><span>Cat&eacute;gorie</span></h3>
                            <div class="inside">
                                <h4 id="quick-post-title"><label for="title">Categorie</label></h4>                                   
                                <select name="categorie_article" id="cat" style="width: 200px;">
                                    <?php echo '<option value="'.$annonce->id_category.'">'.$annonce->categorie.'</option>' ?>
                                  
                                    
                                   <?php foreach ($sections as $section):
                                    $this->load->model(array('admin/categorie_model','annonce_model'));
                                    $categories=$this->categorie_model->getListbySec($section->id_section);
                                    echo '<option label="'.$section->section.'">';
                                    
                                    foreach($categories as $categorie):
                                        $nbre=count($this->annonce_model->getListBycat($categorie->id_cat));
                                        echo '<option value="'.$categorie->id_cat.'" class="level-1">&nbsp;&nbsp;&nbsp;'.$categorie->categorie.'&nbsp;&nbsp;('.$nbre.')</option>';
                                    
                                    endforeach;
                                    echo'</optgroup>';
                            
                            
                            endforeach; ?> 
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                </form> 
              <div class="postbox-container" style="width:29%;">
                    <div id="side-sortables" class="meta-box-sortables ui-sortable">
                        <div id="dashboard_quick_press" class="postbox " style="float: left;">
                            <div class="handlediv" title="Cliquer pour inverser."><br/></div>
                            <h3 class="hndle"><span>Photo(s)</span></h3>
                            <div class="inside" style="float: left;">
    <ul id="listImg">
    
        <?php
        if($images!=NULL){
         foreach($images as $image): 
      
            echo '<li id="'.$image->image.'"  style="float: left; margin-right: 10px;"><a href="javascript:"><b><img onclick="changeImage()" width="70" height="50" src="'.base_url().'assets/uploads/'.$image->image.'"/><i onclick="suppImage(\''.$image->image.'\')" class="lien"></i></b></a></li>';                
                                                                 
        endforeach; }?>
    </ul> </div>
                        </div>
                    </div>
                </div>
    <a name="img"></a> 
</div>
                
            </div>                              
            <div class="clear"></div>
        </div>
    </div>        
</div>



<iframe name="frame_image"></iframe>
<script type="text/javascript">  
new TINY.editor.edit('editor',{
	id:'content',
	width:640,
	height:200,
	cssclass:'te',
	controlclass:'tecontrol',
	rowclass:'teheader',
	dividerclass:'tedivider',
	controls:['bold','italic','underline','strikethrough','|','subscript','superscript','|',
			  'orderedlist','unorderedlist','|','outdent','indent','|','leftalign',
			  'centeralign','rightalign','blockjustify','|','unformat','|','undo','redo','n',
			  'font','size','style','|','image','hr','link','unlink','|','cut','copy','paste','print'],
	footer:true,
	fonts:['Verdana','Arial','Georgia','Trebuchet MS'],
	xhtml:true,
	cssfile:'style.css',
	bodyid:'editor',
	footerclass:'tefooter',
	toggle:{text:'source',activetext:'wysiwyg',cssclass:'toggle'},
	resize:{cssclass:'resize'}
});
</script>