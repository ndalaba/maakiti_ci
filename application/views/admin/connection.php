<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />	
    <link rel="stylesheet" media="screen" href="<?php echo base_url().'assets/admin/css/admin/connection.css' ?>" />
	<title><?php echo $titre ?></title>
</head>

<body>
    <div id="Connexion" style="margin-top: 100px; display: block;">
    <?php echo form_open("admin/admin/connection",array('id'=>'formulaireConnexion')) ?>   
    <table width="500" cellspacing="0" cellpadding="0" border="0" align="center">
        <tbody>
        <tr>
            <td width="50%" class="zone_titre_p1">&nbsp;Connexion</td>
            <td width="50%" class="zone_titre_p2">&nbsp;</td>
        </tr>
        <tr class="zone_titre_p3">
            <td colspan="2"></td>
        </tr>
        <tr>
            <td colspan="2" class="zonefiche2">
                <table width="100%" cellspacing="2" cellpadding="0" border="0">
                <tbody>
                <tr>
                  <td colspan="2">
                    <table width="100%" cellspacing="0" cellpadding="0" class="CGcodetresclair zonegroupe">
                      <tbody>
                      <tr>
                        <td><span class="CGblanc CGtxcodeclair titregroupe">Authentification</span></td>
                      </tr>
                      <tr>
                        <td class="contenugroupe"> 
                          <table width="100%" cellspacing="2" cellpadding="0" border="0">
                            <tbody>
                            <tr>
                                <td valign="top">Login</td>
                                <td colspan="3"><input type="text" id="j_username" name="login" value="<?php echo set_value('login') ?>" size="60" maxlength="100"/><?php echo form_error('login') ?></td>
    						    <td style="width: 20%;">&nbsp;</td>
                            </tr>
                            <tr>
                              <td style="width: 50%;">Mot de passe</td>
                              <td><input type="password" id="j_password" name="pwd" value="<?php echo set_value('pwd') ?>" size="30" maxlength="100"/><?php echo form_error('pwd') ?></td>
    						  <td style="width: 20%;">&nbsp;</td>
                            </tr>
                          	</tbody>
                          </table>
                        </td>
                      </tr>
                    </tbody>
                    </table>
                  </td>
                  </tr>    
                  <tr>
                  <td colspan="2">
                  	<div align="right"><input type="image" src="<?php echo base_url().'assets/admin/img/admin/'?>BoutSeConnect.gif" /></div>
                  </td>
                </tr>
                </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="2" class="finzonefiche2">&nbsp;<?php echo $error; ?></td>
        </tr>
    	</tbody>
    	</table>
    </form>
    </div>
</body>
</html>