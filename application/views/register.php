<style>
form.loginform,form.loginform p {float: left!important;}
.err p{color:rgb(170, 32, 32)}
.err{padding-left: 140px;}
</style>

<div class="content_botbg" style="min-height: 513px;" >
                <div class="content_res" >
                    <!-- full block -->
                    <div class="shadowblock_out"  style="float: left; margin-right: 10px; width: 587px;">
                        <div class="shadowblock" style="width: 555px;float: left;">
                        <h2 class="dotted"><span class="colour">Inscription</span></h2>
						<p>Remplir les champs ci-dessous pour cr&eacute;er votre compte gratuit. Assurez-vous d'
utiliser une adresse email valide. Une fois l'inscription termin&eacute;e, vous serez
en mesure de pr&eacute;senter vos annonces.</p>
						<div class="left-box" style="float: left"
                      
                                                     <div class="err" style="color:#F60">  <?php if(isset($existe)) echo $existe; ?><br /></div>					
            <form action="<?php echo site_url("user/inscription") ?>" method="post" class="loginform" name="registerform" id="registerform">
                <p>
                    <label>Pseudo:</label>
                    <input tabindex="1" class="text" name="pseudo" id="your_username" type="text" value="<?php echo set_value('pseudo'); ?>"/>
                    <div class="err"><?php echo form_error('pseudo') ?></div>
                </p>
                <p>
                    <label>Email:</label>
                    <input tabindex="2" class="text" name="email" id="your_email" type="text" value="<?php echo set_value('email'); ?>"/>
                    <div class="err"><?php echo form_error('email') ?></div>
                </p>
                <p>
                    <label>Mot de Passe:</label>
                    <input tabindex="2" class="text" name="pwd" id="pwd" type="password"/>
                    <div class="err"><?php echo form_error('pwd') ?></div>
                </p>
                <p>
                    <label>Confirmer le Mot de Passe:</label>
                    <input tabindex="2" class="text" name="cpwd" id="cpwd" type="password"/>
                    <div class="err"><?php echo form_error('cpwd') ?></div>
                </p>
                <p></p>
                  <p></p>
                <div id="checksave" style="float: left;">
                    <p class="submit">
                        <input tabindex="6" class="btn_orange" name="register" id="wp-submit" value="Cr&eacute;er un compte" type="submit"/>
                    </p>
                </div>
            </form>
        <script type="text/javascript">document.getElementById('your_username').focus();</script> 	
						</div>	
						<!-- /right-box -->
						<div class="clr"></div>						
						</div><div class="content_right" >
							<?php $this -> load -> view('inc/featured');?>
						</div><!-- /shadowblock -->
					</div><!-- /shadowblock_out -->
			  </div><!-- /content_res -->
			</div>
