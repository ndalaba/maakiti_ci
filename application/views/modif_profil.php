        <!-- left block -->
<script>
 $(window).load(function() {
     $('.nav li').removeClass('current_page_item');
     $('#profil .nav .profil ').addClass('current_page_item');
  
  });
</script>
<div class="content_botbg">
      <div class="content_res">

        <div class="content_left">
            <div class="shadowblock_out">
            <div class="shadowblock">
				<h1 class="single dotted">Bienvenue <?php echo $membre->pseudo ?> - Mon Profil</h1>
                <div style="color: red;"> <?php echo validation_errors(); ?></div>
		<form name="profile" id="your-profile" action="<?php echo site_url("user/updateUser") ?>" method="post">
		<table class="form-table">
			<tbody><tr><input name="id"  type="hidden" value="<?php echo $membre->id_user ?>"/><input name="pass"  type="hidden" value="<?php echo $membre->pwd ?>"/>
				<th><label for="user_login">Pseudo :</label></th>
				<td><input name="pseudo" class="regular-text" id="pseudo" value="<?php echo $membre->pseudo ?>" maxlength="100"  disabled="disabled" type="text"/></td>
			</tr>
			<tr>
				<th><label for="noms">Noms et Pr&eacute;nom(s):</label></th>
				<td><input name="nom" class="regular-text required" id="noms" maxlength="100" type="text" value="<?php echo $membre->nom ?>"/></td>
			</tr>
			
			<tr>
				<th><label for="phone">T&eacute;l&eacute;phone:</label></th>
				<td><input name="phone" class="regular-text" id="phone"  maxlength="100" type="text"  value="<?php echo $membre->phone ?>"/></td>
			</tr>
			<tr>
				<th><label for="ville">Ville:</label></th>
				<td><input name="ville" class="regular-text" id="ville"  maxlength="100" type="text"  value="<?php echo $membre->ville ?>"/></td>			
			</tr>
            <tr>
				<th><label for="display_name">Pays:</label></th>
							<td><input name="pays" class="regular-text" id="nickname"  maxlength="100" type="text"  value="<?php echo $membre->pays ?>"/></td>			
			</tr>
		<tr>
			<th><label for="email">Email:</label></th>
			<td><input name="email" class="regular-text" id="email" maxlength="100" type="text" disabled="disabled"  value="<?php echo $membre->mail ?>"/></td>
		</tr>
		<tr>
			<th><label for="description">Adresse:</label></th>
			<td><textarea name="adresse" class="regular-text" id="adresse" rows="10" cols="50" > <?php echo $membre->adresse ?></textarea></td>
		</tr>
		<tr>
			<th><label for="pass1">Nouveau mot de passe :</label></th>
			<td>
				<input name="pwd" class="regular-text" id="pwd" maxlength="50" value="" type="password"/><br/>
				<span class="description">Laisser ce champ vide si vous ne voulez pas modifier le mot de passe.</span>
			</td>
		</tr>
		<tr>
		<th><label for="pass1">Retaper le nouveau mot de passe :</label></th>
			<td>
				<input name="cpwd" class="regular-text" id="cpwd" maxlength="50" value="" type="password"/><br/>
				<!--<span class="description">Taper votre nouveau mot de passe.</span>-->
			</td>
		</tr>
		</tbody></table>
		<table class="form-table" id="userphoto">
			<tbody><tr>
				<th><label for="user_login">&nbsp;</label></th>
				<td></td>
			</tr>
		</tbody></table>
		<br>
		<p class="submit center">
			<input id="cpsubmit" class="btn_orange" value="Modifier Profil >>" name="submit" type="submit"/>
		 </p>
		</form>
            </div><!-- /shadowblock -->
            </div><!-- /shadowblock_out -->
        </div><!-- /content_left -->
<!-- right sidebar -->
<?php $this->load->view('inc/profil_right') ?><!-- /content_right -->
        <div class="clr"></div>
      </div><!-- /content_res -->
    </div>