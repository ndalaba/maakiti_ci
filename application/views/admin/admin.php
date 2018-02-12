<div class="wrap nosubsub" style="float: left;">
	<div class="icon32" id="icon-edit"><br/></div>
    <h2>Administrateurs</h2>
    <div id="col-container">
        <div id="col-right">
            <div class="col-wrap">
            <form method="get" action="" id="posts-filter">
                <h3>Listes utilisateurs</h3>                
                <table cellspacing="0" class="widefat fixed">
                	<thead>
                    	<tr>
                        	<th style="width: 20px;" class="manage-column column-cb " id="cb" scope="col"></th>
                        	<th style="" class="manage-column column-name" id="name" scope="col">Login</th>
                        	<th style="" class="manage-column column-description" id="description" scope="col" colspan="2">Nom et Pr&eacute;nom</th>                        	
                        	<th style="" class="manage-column column-posts num" id="posts" scope="col">Droit</th>
                    	</tr>
                	</thead>                	
                	<tbody class="list:cat" id="the-list">
                        <?php if(isset($admins)){ foreach($admins as $admin): ?>
                            <tr class="iedit alternate" id="cat-3" style="">
                                <th class="check-column" title="supprimer l'administrateur" scope="row" onclick="supprimerAdmin('<?php echo $admin->id ?>')"></th>
                                <td class="name column-name"><a id="login<?php echo $admin->id ?>" href="javascript:" class="row-title" onclick="chargerAdmin('<?php echo $admin->id ?>')"><?php echo $admin->login ?></a><br/></td>
                                <td class="name column-name" colspan="2"><a id="nom<?php echo $admin->id ?>"  href="javascript:" class="row-title" onclick="chargerAdmin('<?php echo $admin->id ?>')"><?php echo $admin->nom ?></a><br></td>                            
                                <td class="name column-name"><?php echo $admin->acces?><br/></td>
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
                    <h3>Ajouter un utilisateur</h3>
                    <div id="ajax-response"></div>
                    <?php echo form_open('admin/admin/edit',array('class'=>'add:the-list: validate','id'=>'addcat','name'=>'addcat')) ?>
                        <input type="hidden" name="AID" id="AID" />    
                        <div class="form-field form-required">
                        	<label for="cat_name">Login</label>
                        	<input type="text" aria-required="true" size="40" id="login" name="login" value="" tabindex="1"/>                            
                        </div>
                        <div class="form-field form-required">
                        	<label for="cat_name">Nom et Pr&eacute;nom</label>
                        	<input type="text" aria-required="true" size="40" value="" id="nom" name="nom" value="" tabindex="1"/>                           
                        </div>
                        <div class="form-field form-required">
                        	<label for="cat_name">Droit</label>
                        	<select id="acces" name="acces">
                                    <option value="2">- - - - -</option>
                                    <option value="1">Admin</option>
                                    <option value="2">Normal</option>
                           </select>                           
                        </div>
                        <div class="form-field form-required">
                        	<label for="cat_name">Nouveau mot de passe</label>
                        	<input type="password" aria-required="true" size="40" id="pwd" name="pwd" value="" tabindex="1" style="width: 150px;"/> 
                            Si vous souhaitez changer le mot de passe de l'utilisateur, tapez en un nouveau. Sinon, laissez le champ vide.                           
                        </div>                        
                        <p class="submit">                           
                            <input type="button" value="Modifier" name="edit" class="button" onclick="editAdmin()" tabindex="4"/>
                        </p>
                    </form>
                </div>
            </div>
        </div><!-- /col-left -->
    </div><!-- /col-container -->
</div>