  
  <?php  ?> <script src="<?php echo base_url(); ?>assets/j/jquery.MultiFile.min.js" type="text/javascript" language="javascript"></script> 
    <div class="content_botbg">
      <div class="content_res">
        <!-- full block -->
        <div class="shadowblock_out" style="border: 0;">
          <div class="shadowblock" style="float: left;">
                <style> /* hack on new ad submission page until we fix multi-level dropdown issue with .js */
        div#parentCategory select#cat.dropdownlist, div#childCategory select#cat.dropdownlist, form#mainform.form_step select {padding:6px;height: 3em; color:#666; font-size:12px; display: block;}
    </style>
    
  <div id="step1"></div>
      <h2 class="dotted">Modification d'une annonce</h2>
            <!--<img src="<?php echo base_url() ?>assets/i/step1.gif" alt="" class="stepimg" width="" height=""/>-->
            <p>S'il vous pla&icirc;t remplissez les champs ci-dessous pour envoyer votre petite annonce. Les champs obligatoires sont signal&eacute;s par une *.Vous aurez la possibilit&eacute; de faire des modifications apr&egrave;s la publication.</p>


            <p class="dotted">&nbsp;</p>
            
            <div style="color: red;"><?php echo validation_errors(); ?></div>		
                <form name="mainform" id="mainform" class="form_step" action="<?php echo site_url('annonces/edit');?>" method="post" enctype="multipart/form-data">
                    <ol>
                        <li>
                        <input type="hidden" value="<?php echo $annonce->id_annonce ?>" name="idannonce" />
                         <input type="hidden" value="<?php echo $annonce->featured ?>" name="featured" />
                        	<div class="labelwrapper">
                            	<label>Categorie:</label>
							</div>
                           <select tabindex="2" class="dropdownlist required valid" id="cat" name="cat" >
	    <?php foreach ($sections as $section):
            $this->load->model(array('admin/categorie_model','annonce_model'));
            $categories=$this->categorie_model->getListbySec($section->id_section);
            echo '<optgroup label="'.$section->section.'">';
          
            foreach($categories as $categorie):
            
                $nbre=count($this->annonce_model->getListBycat($categorie->id_cat));
                if($categorie->id_cat==$annonce->id_category){
                    $selected='selected=selected';
                }else{$selected='';}
              echo '<option '.$selected.' value="'.$categorie->id_cat.'" class="level-1">&nbsp;&nbsp;&nbsp;'.$categorie->categorie.'&nbsp;&nbsp;('.$nbre.')</option>';
            
            endforeach;
            
            echo'</optgroup>';
    
    
    endforeach; ?>
	
</select> <div class="clr"></div>
                        </li>
                        
            
            <li>
                <div class="labelwrapper">
                    <label><a title="" href="#"  ><div class="helpico"></div></a>Prix: <span class="colour">*</span></label>
					                </div>
                            <input name="prix" id="cp_price"  value="<?php echo number_format($annonce -> prix, 0, 0, ' ')?>" class="text " type="text" style="width: 180px; margin-right: 18px;"/>
                <select name="monaie"  class="dropdownlist" style="width: 100px;">
                                <option value="GNF">Monnaie</option>
                                <option value="GNF" <?php $selected=($annonce->monaie=='GNF')? 'selected="selected"':''; echo $selected;?>>GNF</option>
                                <option value="DOLLAR" <?php $selected=($annonce->monaie=='DOLLAR')? 'selected="selected"':''; echo $selected;?>>DOLLAR</option>
                                <option value="EURO" <?php $selected=($annonce->monaie=='EURO')? 'selected="selected"':''; echo $selected;?>>EURO</option>
                                <option value="FCFA" <?php $selected=($annonce->monaie=='FCFA')? 'selected="selected"':''; echo $selected;?>>FCFA</option>
                             </select>
                <div class="clr"></div>
            </li>
            <li>
                <div class="labelwrapper">
                    <label><a href="#"  ><div class="helpico"></div></a>Titre: <span class="colour">*</span></label>
					                </div>
                            <input name="titre" id="post_title" value="<?php echo $annonce->titre ?> " class="text " type="text">
                <div class="clr"></div>
            </li>
            <li>
                <div class="labelwrapper">
                    <label>Type Annonce: <span class="colour">*</span></label>
					                </div>
                            <select name="type_annonce"  class="dropdownlist">
                               <option value="0"<?php $selected=($annonce->type_annonce=='0')? 'selected="selected"':''; echo $selected;?>>Location</option>
                               <option value="1"<?php $selected=($annonce->type_annonce=='1')? 'selected="selected"':''; echo $selected;?>>Vente</option>
                               <option value="2"<?php $selected=($annonce->type_annonce=='2')? 'selected="selected"':''; echo $selected;?>>Recherche</option>
                            
                            </select>
                <div class="clr"></div>
            </li>
            <li>
                <div class="labelwrapper">
                    <label>Ville: <span class="colour">*</span></label>
					                </div>
                            <input name="ville" id="cp_city"  value="<?php echo $annonce->ville ?>" class="text" type="text">
                <div class="clr"></div>
            </li>
            
            <li>
                <div class="labelwrapper">
                    <label><a href="#" ><div class="helpico"></div></a>Pays: <span class="colour">*</span></label>
					                </div>
                
            
                
                 <input name="pays" id="pays"  value="<?php echo $annonce->pays ?>" class="text" type="text"/>
                <div class="clr"></div>
            </li>
            
            <li>
                <div class="labelwrapper">
                    <label>Description: <span class="colour">*</span></label>
					                    <br>
					                </div>
                <textarea   rows="8" cols="40" name="description" id="post_content" class=""><?php echo $annonce->detail ?></textarea>
                <div class="clr"></div>
                                    
            </li>
            
                   
    
        <li>
                <div class="labelwrapper">
                    <label>Publier Maintenant: <span class="colour">*</span></label>
					                    <br>
					                </div>
               <input type="radio"  name="publier" value="1"<?php $selected=($annonce->publie=='1')? 'checked="checked"':''; echo $selected;?>/>
                <div class="clr"></div>
                                    
            </li>
            <li>
                <div class="labelwrapper">
                    <label>Enregistrer et publier plutard: <span class="colour">*</span></label>
					                    <br>  
					                </div>
               <input type="radio" name="publier" value="0" <?php $selected=($annonce->publie=='0')? 'checked="checked"':''; echo $selected;?>/>
                <div class="clr"></div>
                                    
            </li>
    <div class="clr"></div>
        
			
                        <p class="btn1">
                            <input name="save" id="step1" class="btn_orange" value="Continue >>" type="submit"/>
                        </p>
                    </ol>
                       
                </form>
 <div id="imgcont">               
<div class="photos"> 
    <p class="header">Photos</p>                         
    <ul id="listImg">
    
        <?php
        if($images!=NULL){
         foreach($images as $image): 
      
            echo '<li id="'.$image->image.'"><a href="javascript:"><b><img onclick="changeImage()" width="70" height="50" src="'.base_url().'assets/uploads/'.$image->image.'"/><i onclick="suppImage(\''.$image->image.'\')" class="lien"></i></b></a></li>';                
                                                                 
        endforeach; }?>
    </ul>
    <a name="img"></a> 
</div>

<div class="photos right">
 <p class="header">AJOUTER UNE IMAGE</p>     
     <?php echo form_open_multipart('annonces/ajouterImage',array('target'=>'loadImage','id'=>'form')); ?>                                
        <input type="hidden" id="id" name="id" value="<?php echo $annonce->id_annonce; ?>"/>                                 
    <div class="inside" style="float: left;">                                
        <div style="float: left; ">                                                           
             <input type="file" name="image" id="image"/>                                                                                                         
             <input type="button" style="margin-top: 8px;" onclick="ajouterImage()" value="Ajouter"/>
        </div> 
        </form>
    </div>                                                            
    
 </div><div id="frame"><iframe name="loadImage" style="width: 1px;border: 0;"></iframe></div></div><!-- /shadowblock -->
        </div><!-- /shadowblock_out -->
        <div class="clr"></div>
      </div><!-- /content_res -->
    </div><!-- /content_botbg -->
