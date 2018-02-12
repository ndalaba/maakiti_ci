<?php if($action=='edit'){ ?>
<div style="overflow: hidden;" id="wpbody-content">
    <div class="wrap">
        <div id="icon-index" class="icon32"><br/></div>
        <h2><?php echo $titre ?></h2>
        <div id="dashboard-widgets-wrap">            
            <?php echo form_open('admin/home/edit',array('onsubmit'=>'return loadContent()')) ?>                   
            <input type="hidden" name="auteur" value="<?php echo $new->UID ?>" />
            <input type="hidden" name="image" id="himage" value="<?php echo $new->image ?>" />
            <input type="hidden" name="doc" id="hdoc" value="<?php echo $new->doc ?>" />
            <input type="hidden" name="id" value="<?php echo $new->AID ?>" />
            <div id="dashboard-widgets" class="metabox-holder">                       
                <div class="postbox-container" style="width:69%;">
                    <div id="side-sortables" class="meta-box-sortables ui-sortable">
                        <div id="dashboard_quick_press" class="postbox ">
                            <div class="handlediv" title="Cliquer pour inverser."><br/></div>
                            <h3 class="hndle"><span>Modifier l'article</span></h3>
                            <div class="inside"> 
                                    <div style="color: red;"><?php echo validation_errors(); ?></div>                                
                                    <h4 id="quick-post-title"><label for="title">Titre</label></h4>
                                    <div class="input-text-wrap">
                                        <input name="title" id="title" tabindex="1" style="width: 99%;" type="text" value="<?php echo utf8_decode($new->titre) ?>"/>
                                    </div>				
                                    <h4 id="content-label"><label for="content">Contenu</label></h4>
                                    <div class="textarea-wrap">
                                        <textarea  id="content" class="mceEditor" rows="3" cols="15" tabindex="2"><?php echo utf8_decode($new->contenu) ?></textarea>
                                        <textarea style="visibility: hidden; height: 10px;" name="comment" id="contenu"></textarea>
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
                                <p><span id="timestamp">Publi&eacute; le: <b id="pub"><?php echo $new->publication ?></b>&nbsp;<a href="javascript:" onclick="$('#divpub').slideToggle();">Modifier</a><br /></span></p>
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
                                        			<option value="08">août</option>
                                        			<option value="09">sept</option>
                                        			<option value="10">oct</option>
                                        			<option value="11">nov</option>
                                        			<option value="12">d&eacute;c</option>
                                                </select> 
                                                <input type="text" autocomplete="off" tabindex="4" maxlength="4" size="4" value="2011" name="aa" id="aa"> à
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
                                    <?php echo '<option value="'.$new->CID.'">'.utf8_decode($new->categorie_article).'</option>' ?>
                                   <?php foreach($categories as $categorie): ?>
                                        <option value="<?php echo $categorie->CID ?>"><?php echo utf8_decode($categorie->categorie_article) ?></option>
                                    <?php endforeach;?>  
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                </form> 
                <div class="postbox-container" style="width:29%;">
                    <div id="side-sortables" class="meta-box-sortables ui-sortable">
                    <?php echo form_open_multipart('admin/home/addImage',array('target'=>'frame_image')) ?>
                        <div id="dashboard_quick_press" class="postbox ">
                            <div class="handlediv" title="Cliquer pour inverser."><br/></div>
                            <h3 class="hndle"><span>Image</span></h3>
                            <div class="inside">                                                                  
                                <input type="file" name="image" id="image" />
                                <input type="submit" class="button" value="ok" />
                            </div>
                            <div id="divImage" style="padding-left:5px;"><?php echo $new->image ?></div>
                        </div>
                    </form>
                    </div>
                </div>
                <div class="postbox-container" style="width:29%;">
                    <div id="side-sortables" class="meta-box-sortables ui-sortable">
                       <?php echo form_open_multipart('admin/Accueil/addFile',array('target'=>'frame_image')) ?>
                        <div id="dashboard_quick_press" class="postbox ">
                            <div class="handlediv" title="Cliquer pour inverser."><br/></div>
                            <h3 class="hndle"><span>Documents</span></h3>
                            <div class="inside">                                                                  
                                <input type="file" name="doc" id="doc"  />
                                <input type="submit" class="button" value="ok" />
                            </div>
                            <div id="divDoc" style="padding-left:5px;"><?php echo $new->doc ?></div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>                              
            <div class="clear"></div>
        </div>
    </div>        
</div>
<?php } else { ?>
<div style="overflow: hidden;" id="wpbody-content">
    <div class="wrap">
        <div id="icon-index" class="icon32"><br/></div>
        <h2><?php echo $titre ?></h2>
        <div id="dashboard-widgets-wrap">
            <?php echo form_open('admin/home/addNews',array('onsubmit'=>'return loadContent()')) ?>                         
            <input type="hidden" name="auteur" value="<?php echo $admin->id ?>" />
            <input type="hidden" name="image" id="himage" />
            <input type="hidden" name="doc" id="hdoc" />
            <div id="dashboard-widgets" class="metabox-holder">                       
                <div class="postbox-container" style="width:69%;">
                    <div id="side-sortables" class="meta-box-sortables ui-sortable">
                        <div id="dashboard_quick_press" class="postbox ">
                            <div class="handlediv" title="Cliquer pour inverser."><br/></div>
                            <h3 class="hndle"><span>Ajouter Article</span></h3>
                            <div class="inside">  
                                    <div style="color: red;"><?php echo validation_errors(); ?></div>                              
                                    <h4 id="quick-post-title"><label for="title">Titre</label></h4>
                                    <div class="input-text-wrap">
                                        <input name="title" id="title" tabindex="1" style="width: 99%;" type="text" value="<?php echo set_value('title')?>"/>
                                    </div>				
                                    <h4 id="content-label"><label for="content">Contenu</label></h4>
                                    <div class="textarea-wrap">
                                        <textarea  id="content" class="mceEditor" rows="3" cols="15" tabindex="2"></textarea>
                                        <textarea style="visibility: hidden; height: 10px;" name="comment" id="contenu"></textarea>
                                    </div>                                                                
                                    <p class="submit" style="text-align: right;">                                            	
                                        <input value="R&eacute;initialiser" class="button" type="reset"/>
                                    	<input name="publish" id="publish" accesskey="p" tabindex="5" class="button-primary" value="Ajouter" type="submit"/>
                                    	<br class="clear"/>
                                    </p>
                                </form>
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
                                <span id="timestamp">Publier <b>Date de publication</b></span>                                    	
                                    	<div class="hide-if-js" id="timestampdiv" style="display: block;">
                                            <div class="timestamp-wrap">
                                                <input type="text" autocomplete="off" tabindex="4" maxlength="2" size="2" value="<?php echo set_value('jj')?>" name="jj" id="jj"/> 
                                                <select tabindex="4" name="mm" id="mm">
                                        			<option value="01">jan</option>
                                        			<option value="02">f&eacute;v</option>
                                        			<option value="03">mar</option>
                                        			<option value="04">avr</option>
                                        			<option value="05">mai</option>
                                        			<option value="06">juin</option>
                                        			<option value="07">juil</option>
                                        			<option value="08">août</option>
                                        			<option value="09">sept</option>
                                        			<option value="10">oct</option>
                                        			<option value="11">nov</option>
                                        			<option value="12">d&eacute;c</option>
                                                </select> 
                                                <input type="text" autocomplete="off" tabindex="4" maxlength="4" size="4" value="<?php echo set_value('aa')?>" name="aa" id="aa"/> à 
                                                <input type="text" autocomplete="off" tabindex="4" maxlength="2" size="2" value="<?php echo set_value('hh')?>" name="hh" id="hh"/> h 
                                                <input type="text" autocomplete="off" tabindex="4" maxlength="2" size="2" value="<?php echo set_value('mn')?>" name="mn" id="mn"/> min
                                            </div>                                            
                                        </div><script type="text/javascript">runClock();</script>
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
                                                                    
                                    <?php foreach($categories as $categorie): ?>
                                        <option value="<?php echo $categorie->CID ?>"><?php echo utf8_decode($categorie->categorie_article) ?></option>
                                    <?php endforeach;?>                                   
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                </form> 
                <div class="postbox-container" style="width:29%;">
                    <div id="side-sortables" class="meta-box-sortables ui-sortable">
                    <?php echo form_open_multipart('admin/home/addImage',array('target'=>'frame_image')) ?>
                        <div id="dashboard_quick_press" class="postbox ">
                            <div class="handlediv" title="Cliquer pour inverser."><br/></div>
                            <h3 class="hndle"><span>Image</span></h3>
                            <div class="inside">                                                                  
                                <input type="file" name="image" id="image" />
                                <input type="submit" class="button" value="ok" />
                            </div>
                            <div id="divImage" style="padding-left:5px;"></div>
                        </div>
                    </form>
                    </div>
                </div>
                <div class="postbox-container" style="width:29%;">
                    <div id="side-sortables" class="meta-box-sortables ui-sortable">
                       <?php echo form_open_multipart('admin/Accueil/addFile',array('target'=>'frame_image')) ?>
                        <div id="dashboard_quick_press" class="postbox ">
                            <div class="handlediv" title="Cliquer pour inverser."><br/></div>
                            <h3 class="hndle"><span>Documents</span></h3>
                            <div class="inside">                                                                  
                                <input type="file" name="doc" id="doc"  />
                                <input type="submit" class="button" value="ok" />
                            </div>
                            <div id="divDoc" style="padding-left:5px;"></div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>                              
            <div class="clear"></div>
        </div>
    </div>        
</div>
<?php }?>
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