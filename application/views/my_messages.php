<script>
 $(window).load(function() {
     $('.nav li').removeClass('current_page_item');
     $('#profil .nav .profil ').addClass('current_page_item');
  
  });
</script>
<div class="content_botbg">
      <div class="content_res">
        <!-- left block -->
        <div class="content_left">
            <div class="shadowblock_out" >
            <div class="shadowblock innerbloc" >
              	<h1 class="single dotted">Bienvenue <?php echo $membre->pseudo ?> - Mes messages</h1>
                <p>Ci-dessous vous trouverez une liste de tous vos messages class&eacute;s. Cliquez sur l'une des options permettant de lire ,supprimer un message. Si vous avez des questions, s'il vous pla&icirc;t contactez l'administrateur du site..</p>
                <table border="0" cellpadding="4" cellspacing="1" class="tblwide">
                    <thead>
                        <tr>
                             <th class="text-left">&nbsp;Nom</th>
							<th width="40px">Sujet</th>
                             <th width="90px"><div style="text-align: center;">Options</div></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if(isset($my_messages)){foreach($my_messages as $message):
                        echo '<tr class="even">
                             <td><h3>
                                    <a href="'.site_url('user/vue_message').'/'.$message->id_message.'">'.$message->nom.'</a>
                                </h3>
                                <div class="meta"> <span class="clock"><span>'.date('d  M  Y',$message->datemessage).'</span></span></div>
                            </td>
						
                            	<td class="text-center">'.$message->sujet.'</td>
                             <td class="text-center">
                              <a href="'.site_url('user/vue_message').'/'.$message->id_message.'"><img src="'.base_url().'assets/i/icon_voir.gif" title="Voir" alt="Voir" border="0"></a>&nbsp;&nbsp;
                               <a href="javascript:;"><img src="'.base_url().'assets/i/delete.png" title="Supprimer" alt="Supprimer" border="0" onclick="suppMessage('.$message->id_message.')"></a><br>
                              							                           </td>
                        </tr>';
                          endforeach ;}?>  
							<tr>
                            
								<td id="paging-td" colspan="5">
									<div class="paging">
<div class="pages"><?php echo $pagination; ?></div><div class="clr"></div></div>
								</td>
							</tr>
                    </tbody>
                </table>
            </div><!-- /shadowblock -->
            </div><!-- /shadowblock_out -->
        </div><!-- /content_left -->
<!-- right sidebar -->
<?php $this->load->view('inc/profil_right') ?><!-- /content_right -->
        <div class="clr"></div>
      </div><!-- /content_res -->
    </div>