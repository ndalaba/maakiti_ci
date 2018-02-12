<div style="overflow: hidden;" id="wpbody-content">
    <div class="wrap">
        <div id="icon-index" class="icon32"><br/></div>
        <h2>Tableau de bord</h2>
        <div id="dashboard-widgets-wrap">                                  
            <div id="dashboard-widgets" class="metabox-holder">
                <!-- debut bloc -->
                <div class="postbox-container" style="width:39%;">
                    <div id="side-sortables" class="meta-box-sortables ui-sortable">
                        <div id="dashboard_quick_press" class="postbox ">
                            <div class="handlediv" title="Cliquer pour inverser."><br/></div>
                            <h3 class="hndle"><span>Statistique</span></h3>
                            <div class="inside">                                    
                                <p style="font-size: 14px;">Inscrits sur maakiti: <span style="font-weight: bold; font-size: 15px;"><?php echo $inscrits ?></span></p>
                                <p style="font-size: 14px;">Annonces sur maakiti: <span style="font-weight: bold; font-size: 15px;"><?php echo $annonces ?></span></p>
                                <p style="font-size: 14px;">Annonces publi&eacute;es sur maakiti: <span style="font-weight: bold; font-size: 15px;"><?php echo $publies ?></span></p>
                                <p style="font-size: 14px;">Annonces non publi&eacute;es sur maakiti: <span style="font-weight: bold; font-size: 15px;"><?php echo $non_publies ?></span></p>
                            </div>
                        </div>
                    </div>	
                </div>  
                <!-- fin bloc -->
                <!-- debut bloc -->
                 <div class="postbox-container" style="width:49%;">
                    <div id="side-sortables" class="meta-box-sortables ui-sortable">
                        <div id="dashboard_quick_press" class="postbox ">
                            <form method="POST" action="#" style="min-width: 49%;width:49%;">
                            <div class="handlediv" title="Cliquer pour inverser."><br/></div>
                            <h3 class="hndle"><span>ACTION SUR LES EMAILS</span></h3>
                            <div class="inside">
                                <p style="font-size: 14px;">Ajouter ou Supprimer</p>                                    
                                <select name="do">
                                    <option value="1">Ajouter</option>
                                    <option value="0">Supprimer</option>
                                </select> 
                                <p style="font-size: 14px;">Adresse Emails &agrave; s&eacute;par&eacute;s par une virgule</p>                                    
                                <textarea cols="59" rows="5" name="email"></textarea>  
                                <input type="submit"/>
                            </div>
                            </form>
                        </div>
                    </div>	
                </div>  
                <!-- fin bloc -->
                <!-- debut bloc -->                
                 <div class="postbox-container" style="width:39%;">
                     <form method="POST" action="#" id="fmsql" style="min-width: 39%;width:39%;">
                    <div id="side-sortables" class="meta-box-sortables ui-sortable">
                        <div id="dashboard_quick_press" class="postbox ">
                            <div class="handlediv" title="Cliquer pour inverser."><br/></div>
                            <h3 class="hndle"><span>EXECUTER REQUETE SUR MAAKITI</span></h3>
                            <div class="inside">
                                <p style="font-size: 14px;">Requ&ecirc;te &agrave; ex&eacute;cuter</p>                                    
                                <textarea cols="45" rows="5" name="sql"></textarea>  
                                <input type="button" value="Envoyer" onclick="if(window.confirm('executer la requete')) document.getElementById('fmsql').submit()"/>
                            </div>
                        </div>
                    </div>
                   </form>
                </div>  
                <!-- fin bloc -->
            </div>                
           </div>                              
            <div class="clear"></div>
        </div>
    </div>        
</div>