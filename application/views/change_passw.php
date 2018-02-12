<style>form.loginform,form.loginform p {
    float: left!important;width: 500px;
}</style>
            <div class="content_botbg" style="min-height: ;">

                <div class="content_res">
<div class="content_left">
                    <!-- full block -->
                    <div class="shadowblock_out"  style="float: left; margin-right: 10px; width: 587px;">
                        <div class="shadowblock" style="width: 555px;float: left;">

                        <h2 class="dotted"><span class="colour">Entrer votre email</span></h2>
			
												
						<p>S'il vous pla&icirc;t remplissez le champs ci-dessous pour vous g&eacute;n&eacute;rer un nouveau mot de passe.</p>
					    <p style="font-weight: bold;"><?php if(isset($valid)) echo $valid; ?></p>
						<div class="left-box" style="float: left">						
<?php //if(isset($pwd)) echo $pwd;?>
				 <div style="color: red;"><?php if(isset($error)) echo $error; ?></div>
                 <div style="color: #B22222;margin-bottom: 10px;font-weight: bold;"><?php if(isset($errorConnection)) echo $errorConnection; ?></div>			
	<form action="<?php echo site_url("user/change_passw") ?>" method="post" class="loginform">
		<p>
			<label for="login_username">Email:</label>
			<input class="text" name="email" id="login_username" type="text"/>
		</p>

		
		
		<div class="clr"></div>

		<div id="checksave" style="left: ;">
		<p class="submit">
				<input class="btn_orange" name="login" id="login" value="G&eacute;n&eacute;rer" type="submit"/>					
									
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
