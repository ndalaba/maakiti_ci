<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Newsletter</title>
</head>

<body topmargin="0" leftmargin="0" marginheight="0" marginwidth="0" bgcolor="#F4F4F4">
<style type="text/css">
a {
	text-decoration: none;
}

a:hover {
	text-decoration: underline;
}
</style>

<table width="100%" cellpadding="0" cellspacing="0" bgcolor="F4F4F4" style="font-family:Arial, Helvetica, sans-serif;font-size:13px;color:#545454;">
  <tr>
    <td>
			<table align="center" width="552" cellpadding="0" cellspacing="0">
				
				<tr>
				  <td background="  <?php echo base_url().'assets/img_nl/' ?>/i-01.gif" width="552" height="76">
				    <table width="100%" height="76" cellspacing="0" cellpadding="0">
              <tr>
                <td style="padding:24px 0 0 28px;" valign="top" align="left"><a href="#"><img src="  <?php echo base_url().'assets/img_nl/' ?>/logo.gif" width="136" height="35" alt="" border="0"></a></td>
                <td align="right" valign="top" style="padding:20px 28px 0 0;">
								<div style="font-size:18px; color:#545454;"><?php echo date('d M Y',time())?></div>
								</td>
              </tr>
            </table>
				  </td>
			  </tr>
				<tr>
				  <td background="  <?php echo base_url().'assets/img_nl/' ?>/i-02.gif" align="center">
				    <table width="546" cellspacing="0" cellpadding="0">
              <tr>
                <td background="  <?php echo base_url().'assets/img_nl/' ?>/i-03.gif" align="right"><img src="  <?php echo base_url().'assets/img_nl/' ?>/i-05.gif" width="41" height="3" alt=""></td>
              </tr>
              <tr>
                <td bgcolor="#c5d7e7">
                  <table width="100%" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="100" align="center" valign="top" style="padding:13px 21px 13px 25px;"><a href="http://www.maakiti.com"><img src="  <?php echo base_url().'assets/img_nl/' ?>/logo.png" width="100" height="96" alt="Picture"/></a></td>
                      <td align="left" style="padding:13px 0 13px 0;font-size:14px; color:#FFFFFF;" valign="top">
													<strong>L'expertise des petites annonces en Guin&eacute;e</strong><br><br>
													Le site Maakiti.com, pour vendre et acheter toutes sortes de biens !<br>

V&eacute;hicule, Immobilier, Horlogerie et Bijouterie, Habillement et Mode,High-Tech, Maison et Accessoires..., il y a toujours une rubrique qui correspond au bien que vous souhaitez mettre en vente Vous &ecirc;tes s&ucirc;r de pouvoir passer une petite annonce dans une rubrique appropri&eacute;e.
De m&ecirc;me, Maakiti.com vous permet de rechercher tous types de bien 
													 <a href="http://www.maakiti.com/control/apropos" style="font-size:10px; color:#B22222;">Plus d'infos</a>											</td>
                      <td width="25" height="41" valign="top"></td>
                    </tr>
                  </table>
                </td>
              </tr>
              <?php $this->load->view('inc/url')?>
              <tr>
                <td background="  <?php echo base_url().'assets/img_nl/' ?>/i-04.gif" width="1" height="24"><img src="  <?php echo base_url().'assets/img_nl/' ?>/i-04.gif" width="1" height="24" alt=""></td>
              </tr>
              <tr><td><h2 style="color:#545454;font-size:15px;padding-left: 20px;">DERNIERES ANNONCES SUR LE SITE DE MAAKITI.COM</h2></td></tr>
							<?php
					if($annonces!=NULL){
					foreach($annonces as $annonce):
						$image=$this->image_model->getFirst($annonce->id_annonce);
						switch($annonce->monaie){
							case 'DOLLAR' :$monnaie='$';break;
							case 'EURO' :$monnaie ='&euro;';break;
							case 'GNF' :$monnaie ='GNF';break;
							case 'FCFA' :$monnaie ='FCFA';break;
					}
				?>
                            <tr>
								<td align="left" style="padding:0 25px 0 25px;">
									<div style="color:#B22222; padding: 0 0 10px 0;"><strong><a href="<?php echo base_url() . 'annonces/detail/' . format_url($annonce -> titre) . '_' . $annonce -> id_annonce ?>" style="color:#B22222;"><?php echo $annonce -> titre;?></a></strong></div>
									<?php echo character_limiter($annonce -> C_ANNONCE, 150);?>
								</td>
							</tr>
							<tr>
								<td align="right" style="padding:0 25px 0 25px;"><a href="<?php echo base_url() . 'annonces/detail/' . format_url($annonce -> titre) . '_' . $annonce -> id_annonce ?>" style="color:#B22222;">Voir plus <span style="font-size:10px;">>>></span></a></td>
							</tr>
                            
							<tr>
								<td background="  <?php echo base_url().'assets/img_nl/' ?>/i-07.gif"><img src="  <?php echo base_url().'assets/img_nl/' ?>/i-07.gif" alt="" width="1" height="49"></td>
							</tr>
                            <?php endforeach; } ?>
							<!--<tr>
								<td align="left" style="padding:0 25px 0 25px;">
									<div style="color:#B22222; padding: 0 0 10px 0;"><strong>Dolor sit amet, consetetur sadipscing elit</strong>r</div>
									Dolor sit amet, consetetur sadipscing elitr, At accusam aliquyam diam diam dolore 
									dolores duo eirmod eos erat, et nonumy sed tempor et et invidunt justo labore Stet 
									clita ea et gubergren, kasd magna no rebum. sanctus sea sed takimata ut vero 
									voluptua. est Lorem ipsum dolor sit amet.
								</td>
							</tr>
							<tr>
								<td align="right" style="padding:0 25px 0 25px;"><a href="#" style="color:#B22222;">Read more <span style="font-size:10px;">>>></span></a></td>
							</tr>-->
            </table>
				  </td>
			  </tr>
				<tr>
				  <td>
				    <table width="100%" cellspacing="0" cellpadding="0">
              <tr>
                <td width="28"><img src="  <?php echo base_url().'assets/img_nl/' ?>/i-08.gif" width="28" height="36" alt=""></td>
                <td background="  <?php echo base_url().'assets/img_nl/' ?>/i-10.gif">&nbsp;</td>
                <td width="28"><img src="  <?php echo base_url().'assets/img_nl/' ?>/i-09.gif" width="28" height="36" alt=""></td>
              </tr>
            </table>
				  </td>
			  </tr>
				<tr>
				  <td style="font-size:11px; color:#9DA8B7; padding: 15px 28px 0 28px;">
						DEV-IN SARL , Tous droits r&eacute;serv&eacute;s 2012.<br>
						<a href="http://www.maakiti.com/" style="color:#B22222;">Accueil</a> | <a href="http://www.maakiti.com/control/actualites" style="color:#B22222;">Actualit&eacute;s</a> | <a href="http://www.maakiti.com/control/apropos" style="color:#B22222;">Apropos</a> | <a href="http://www.maakiti.com/control/help" style="color:#B22222;">Aide</a> | <a href="http://www.maakiti.com/control/contacts" style="color:#B22222;">Contacts</a>
										</td>	
			  </tr>
			</table>
		</td>
  </tr>
</table>
</body>
</html>
