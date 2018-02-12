<style>form.loginform,form.loginform p {
    float: left!important;width: 500px;
}</style>
            <div class="content_botbg" style="min-height: ;">

                <div class="content_res">
<div class="content_left">
                    <!-- full block -->
                    <div class="shadowblock_out"  style="float: left; margin-right: 10px; width: 587px;">
                        <div class="shadowblock" style="width: 555px;float: left;">

                        <h2 class="dotted"><span class="colour">Connexion</span></h2>
			
												
						<p>S'il vous pla&icirc;t remplissez les champs ci-dessous pour vous connecter &agrave; votre compte.</p>
					
						<div class="left-box" style="float: left">						

				 <div style="color: red;"><?php echo validation_errors(); ?></div>
                 <div style="color: #B22222;margin-bottom: 10px;font-weight: bold;"><?php if(isset($errorConnection)) echo $errorConnection; ?></div>			
	<form action="<?php echo site_url("user/connexion") ?>" method="post" class="loginform">
		<p>
			<label for="login_username">Email:</label>
			<input class="text" name="pseudo" id="login_username" type="text"/>
		</p>

		<p>
			<label for="login_password">Mot de passe:</label>
			<input class="text" name="pwd" id="login_password" value="" type="password"/>
		</p>
		<p style="padding-left: 140px; padding-bottom: 15px;">
		    <a href="<?php echo base_url().'user/change_passw/'?>">Mot de passe oubli&eacute; ?</a>&nbsp;&nbsp;&nbsp;&nbsp;
		     <a href="<?php echo base_url().'user/inscription/'?>">Pas encore inscrit ?</a>
		  </p>
		<div class="clr"></div>

		<div id="checksave" style="left: ;">
		<p class="submit">
				<input class="btn_orange" name="login" id="login" value="Login" type="submit"/>					
									
			</p>
			
			</div>

	</form>
	
	<script type="text/javascript">document.getElementById('login_username').focus();</script> 


						</div>	
						
						<!-- /right-box -->

						<div class="clr"></div>						
		    
						</div><!-- /shadowblock -->

					</div></div><!-- /shadowblock_out -->

<div class="content_right" >
							<?php $this -> load -> view('inc/featured');?>
						</div>
			  </div><!-- /content_res -->

			</div><!-- /content_botbg -->
