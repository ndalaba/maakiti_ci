<script>
 $(window).load(function() {
     $('.nav li').removeClass('current_page_item');
     $('#contact .nav .contact ').addClass('current_page_item');
  
  });
</script>
    <div class="content_botbg">
        <div class="content_res">
            <div id="breadcrumb">
                <div id="crumbs"><a href="<?php echo base_url() ?>">Accueil</a> &raquo; Contact<span class="current"></span></div>
            </div>
            <div class="content_left">
                        <div class="shadowblock_out">
                            <div class="shadowblock">
                                <div class="post">
                                    <h1 class="single dotted">Contact</h1>
                                    <p><b>Besoin d'aide ?</b><br /><br />
Si vous rencontrez des difficult&eacute;s, consultez notre aide en ligne qui vous aidera &agrave; trouver les r&eacute;ponses aux questions les plus fr&eacute;quemment pos&eacute;es.
Si vous ne trouvez pas la r&eacute;ponse &agrave; votre question dans nos pages d'aide, vous pouvez nous contacter<br /><br />

<b>Professionnels ?</b><br /><br />
Vous souhaitez nous confier vos campagnes de communication ou devenir partenaire de Maakiti.com?
Annonceurs, centrales d'achat, nous vous proposons de construire la campagne de communication qui vous convient.

Pour en savoir plus, contactez notre r&eacute;gie Internet par mail ci-dessus et choisissez le sujet "Partenariats et Publicit&eacute;"
</p>
<div class="contactform">
<form action="<?php echo base_url() ?>control/contact/" method="post">
<div class="contactleft"><label for="nom">Noms et Pr&eacute;noms: </label></div>
<div class="contactright">
<input name="nom" id="nom" size="30" maxlength="50" type="text" class="text"/> </div>
<div class="contactleft"><label for="email">Email:</label></div>
<div class="contactright">
<input name="email" id="email" size="30" maxlength="50" type="text" class="text"/> </div>
<div class="contactleft"><label for="sujet">Sujet</label></div>
<div class="contactright">
<select class="text texterror" name="sujet" id="sujet" style="width: 265px;">
     <option value="Choisissez un sujet..." selected="selected">Choisissez un sujet...</option>
     <option value="D&eacute;p�t d'annonce">D&eacute;p&ocir;t d'annonce</option>
     
     <option value="Modification ou suppression d'annonce">Modification ou suppression d'annonce</option>
     
     <option value="Probl&egrave;me technique">Probl&egrave;me technique</option>
      <option value="Annonce &agrave; Une">Annonce &agrave; Une</option>
     <option value="Annonce frauduleuse, arnaques">Annonce frauduleuse, arnaques</option>
     <option value="Partenariats et publicit&eacute;">Partenariats et publicit&eacute;</option>
     <option value="Commentaire ou suggestion">Commentaire ou suggestion</option>
     <option value="Donn&eacute;es personnelles">Donn&eacute;es personnelles</option>
     
    
     <option value="Je ne trouve pas mon annonce sur le site">Je ne trouve pas mon annonce sur le site</option>
     <option value="Je souhaite me d&eacute;sinscrire">Je souhaite me d&eacute;sinscrire</option>
     <option value="Autre sujet">Autre sujet</option>
</select></div>
<div class="contactleft"><label for="wpcf_msg">Votre Message: </label></div>
<div class="contactright"><textarea style="width: 330px;"name="message" id="wpcf_msg" cols="35" rows="8" class="text"></textarea></div>
<div class="contactright">
<input name="Submit" value="Envoyer" id="contactsubmit" type="submit" class="btn_orange"/>
</div>
<p></p></form>
<p></p></div>


                                    <div class="prdetails">
									</div>

                                </div><!--/post-->
                            </div><!-- /shadowblock -->
                        </div><!-- /shadowblock_out -->
					<div class="clr"></div>
    <!-- /shadowblock_out -->
                </div><!-- /content_left -->
                <!-- right block -->
<div class="content_right">
     <?php $this->load->view('inc/featured'); ?> <?php $this -> load -> view('inc/facebook');?><!-- /shadowblock_out --><!--<div class="shadowblock_out" id="widget_appthemes_facebook"><div class="shadowblock"><h2 class="dotted"><cufon style="width: 84px; height: 20px;" alt="Facebook " class="cufon cufon-canvas"><canvas style="width: 100px; height: 20px; top: 2px; left: -1px;" height="20" width="100"></canvas><cufontext>Facebook </cufontext></cufon><cufon style="width: 61px; height: 20px;" alt="Friends" class="cufon cufon-canvas"><canvas style="width: 74px; height: 20px; top: 2px; left: -1px;" height="20" width="74"></canvas><cufontext>Friends</cufontext></cufon></h2>		<div class="pad5"></div>
        <iframe src="Contact%20_%20ClassiPress%20Demo_fichiers/likebox.htm" style="border: medium none; overflow: hidden; width: 305px; height: 290px;" allowtransparency="true" frameborder="0" scrolling="no"></iframe>
		<div class="pad5"></div>
        </div><!-- /shadowblock --></div><!-- /shadowblock_out -->    
</div><!-- /content_right -->
            <div class="clr"></div>
        </div><!-- /content_res -->
    </div><!-- /content_botbg -->