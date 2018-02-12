
<div class="content_botbg">
      <div class="content_res">
        <!-- left block -->
        <div class="content_left">
            <div class="shadowblock_out ">
            <div class="shadowblock innerbloc">
              	<h1 class="single dotted">Voir Message</h1>
                <div class="msgbloc"><b>Exp&eacute;diteur :</b>  <?php echo $message->nom;?></div>
                <div  class="msgbloc"><b>Date :</b>  <?php echo date('d  M  Y',$message->datemessage)?></div>
                <div  class="msgbloc"><b>Sujet :</b>  <?php echo $message->sujet;?></div>
                <div  class="msgbloc"><b>T&eacute;l&eacute;phone :</b>  <?php echo $message->phone;?></div>
                <div  class="msgbloc1"><b>Message :</b></div>
                <p><?php echo $message->message;?></p>
                
            </div><!-- /shadowblock -->
            </div><!-- /shadowblock_out -->
        </div><!-- /content_left -->
<!-- right sidebar -->
<?php $this->load->view('inc/profil_right') ?><!-- /content_right -->
        <div class="clr"></div>
      </div><!-- /content_res -->
    </div>