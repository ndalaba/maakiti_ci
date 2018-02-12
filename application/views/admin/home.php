<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
    <link rel="stylesheet" media="screen" href="<?php echo base_url().'assets/admin/css/admin/home.css' ?>" />
    <link rel="stylesheet" media="screen" href="<?php echo base_url().'assets/admin/css/admin/style.css' ?>" />
    <link rel="stylesheet" media="screen" href="<?php echo base_url().'assets/admin/css/admin/osx.css' ?>" />      
    <script type="text/javascript" src="<?php echo base_url().'assets/admin/js/admin/jquery.js' ?>"></script>
    <!--<script type="text/javascript" src="<?php echo base_url().'assets/admin/js/admin/jquery.validate.js' ?>"></script>-->    
    <script type="text/javascript" src="<?php echo base_url().'assets/admin/js/admin/tinyeditor.js' ?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'assets/admin/js/admin/jquery.simplemodal.js' ?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'assets/admin/js/admin/osx.js' ?>"></script>
	<title>MAAKITI : <?php echo $titre ?></title>
</head>
<style type="text/css">
	body #wpwrap #wpcontent form{min-width: 900px}
</style>
<script type="text/javascript">
	var ref="<?php echo base_url() ?>"; // variable utilisé dans les fichiers javascript
</script>
<script type="text/javascript" src="<?php echo base_url().'assets/admin/js/admin/admin.js' ?>"></script>
<body class="wp-admin js  index-php">
    <div id="wpwrap">
        <div id="wpcontent">
            <div id="wphead" style="background-color:rgb(167, 31, 31);">
                <img id="header-logo" src="<?php echo base_url().'assets/i/favicon.ico' ?>" alt="" height="32" width="32"/> 
                <h1 id="site-heading">
                    <a href="<?php echo base_url()?>" title="Aller sur le site" target="_blank">
                        <span id="site-title">MAAKITI - La solution des ventes et achats d'occasion </span><em id="site-visit-button">Aller sur le site</em>
                    </a>
                </h1>
                <h1>
                    <a href="<?php echo base_url().'admin/home/sendnl'?>" title="Envoyer la Newsletter" target="_blank">
                        <em id="site-visit-button">Envoyer la Newsletter</em>
                    </a></h1>
                <div id="wphead-info">
                    <div id="user_info">
                        <p>Salutations, <a href="#" title="Modifier votre profil"><?php echo $admin->login ?></a>&nbsp;! |
                        <?php echo anchor('admin/admin/deconnection','Se d&eacute;connecter',array('title'=>'Se d&eacute;connecter')) ?></p>
                    </div>
                    <div id="favorite-actions">
                        <div class="" id="favorite-first"><?php echo anchor('admin/home/article','Nouvel article') ?></div>
                        <div id="favorite-toggle"><br/></div>                       
                    </div>
                </div>
            </div>
            <div id="wpbody">
              <ul id="adminmenu">
                <li class="wp-first-item current menu-top menu-top-first menu-top-last" id="menu-dashboard">
                    <div class="wp-menu-image"><?php echo anchor('admin/home','<br/>')?></div>                
                    <?php echo anchor('admin/home','Tableau de bord',array('class'=>'wp-first-item current menu-top menu-top-first menu-top-last')) ?>
                </li>           
                <li class="wp-has-submenu open-if-no-js menu-top menu-top-first wp-menu-open" id="menu-posts">
                    <div class="wp-menu-image"><a href="#"><br/></a></div>
                    <div class="wp-menu-toggle"><br/></div><?php echo anchor('admin/home/dolist','Annonces',array("class"=>'wp-has-submenu open-if-no-js menu-top menu-top-first')) ?>
                    <div class="wp-submenu">
                        <div class="wp-submenu-head">Articles</div>
                        <ul>
                                              
                            <li><?php echo anchor('admin/home/section','Sections') ?></li>
                            <li><?php echo anchor('admin/home/categorie','Cat&eacute;gories') ?></li>
                        </ul>
                    </div>
                </li>
                <li class="wp-has-submenu open-if-no-js menu-top menu-top-first wp-menu-open" id="menu-posts">
                    <div class="wp-menu-image"><a href="#"><br/></a></div>
                    <div class="wp-menu-toggle"><br/></div><?php echo anchor('admin/home/articles','Actualit&eacute;s',array("class"=>'wp-has-submenu open-if-no-js menu-top menu-top-first')) ?>
                    <div class="wp-submenu">
                        <div class="wp-submenu-head">Articles</div>
                        <ul>
                            <li><?php echo anchor('admin/home/article','Nouvel article') ?></li>                        
                            <li><?php echo anchor('admin/home/categorie_article','Cat&eacute;gories') ?></li>
                        </ul>
                    </div>
                </li>           
                <li class="wp-has-submenu menu-top wp-menu-open" id="menu-users">
                    <div class="wp-menu-image"><a href="#"><br/></a></div>
                    <div class="wp-menu-toggle"><br/></div>
                    <?php echo anchor('admin/admin/','Admin',array('class'=>'wp-has-submenu menu-top')) ?>
                    <div class="wp-submenu">
                        <?php if($admin->acces==1){ ?>
                        <div class="wp-submenu-head">Administrateurs</div>
                        <ul>
                            <li class="wp-first-item"><?php echo anchor('admin/admin/','Administrateurs',array('class'=>'wp-first-item')) ?></li>
                            <li><a href="javascript:" style="border-bottom: 1px solid rgb(204, 204, 204);" tabindex="1" id="jouer">Ajouter</a></li>
                            <!--<li><a href="#" tabindex="1"  style="border-bottom: 1px solid rgb(204, 204, 204);">Votre profil</a></li>-->
                        </ul>
                        <?php }?>
                    </div>
                </li>
                 <!--<li class="wp-has-submenu menu-top wp-menu-open" id="menu-users">               
                    <div class="wp-menu-toggle"><br/></div>
                    <a href="#" class="wp-has-submenu menu-top" tabindex="1">Aujourd'hui</a>
                    <div class="wp-submenu">
                        <div class="wp-submenu-head">Aujourd'hui</div>
                        <ul>
                            <li class="wp-first-item"><a href="#" class="wp-first-item" tabindex="1">1 Utilisateurs</a></li>
                            <li><a href="#" tabindex="1"> 1 Articles</a></li>
                            <li><a href="#" tabindex="1"  style="border-bottom: 1px solid rgb(204, 204, 204);"> 1 Categories</a></li>
                        </ul>
                    </div>
                </li>-->            
            </ul>
            
            <?php $this->load->view($content) ?>
   
        </div>        
    </div>  
    </div>    
    <div id="osx-modal-content">
    	<div id="osx-modal-title">Ajouter un administrateur</div>
    	<div class="close"><a href="#" class="simplemodal-close">x</a></div>
    	<div id="osx-modal-data">
    		 <?php echo form_open("admin/admin/addAdmin",array('onsubmit'=>'return validation()')) ?>
                <p>
                    <label for="Fnom">Nom et Pr&eacute;nom:</label>
                    <input type="text" id="Fnom" name="nom" value=""/>
                </p>
                <p>
                    <label for="Flogin">Login:</label>
                    <input type="text" id="Flogin" name="login" value=""/>
                </p> 
                <p>
                    <label for="Fpwd">Mot de passe:</label>
                    <input type="password" id="Fpwd" name="pwd" value=""/>
                </p> 
                <p>
                   <label for="pwd">Niveau Acc�s:</label>
                   <select id="acces" name="acces">
                            <option value="2">- - - - -</option>
                            <option value="1">Admin</option>
                            <option value="2">Normal</option>
                   </select>
                </p>                                                    
                 <p class="button"> 
                    <input type="submit" id="submit" value="Enregistrer"/> 
                  </p> 
              </form> 
        </div> 
    </div>      
</body>
</html>
