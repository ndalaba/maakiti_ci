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
			<div class="shadowblock_out">
				<div class="shadowblock innerbloc">
					<h1 class="single dotted">Bienvenue <?php echo $membre->pseudo
					?>- Mes annonces</h1>
					<p>
						Ci-dessous vous trouverez une liste de toutes vos annonces class&eacute;es. Cliquez sur l'une des options permettant de supprimer , modifier ou publier/d&eacute;publier une annonce. Si vous avez des questions, s'il vous pla&icirc;t contactez l'administrateur du site..
					</p>
					<table border="0" cellpadding="4" cellspacing="1" class="tblwide">
						<thead>
							<tr>
								<th class="text-left">&nbsp;Titre</th>
								<th width="40px">Vues</th>
								<th width="90px"><div style="text-align: center;">Options</div></th>
							</tr>
						</thead>
						<tbody>
							<?php
							if (isset($my_annonces)) {
								foreach ($my_annonces as $annonce) :
									if ($annonce -> publie == 1) {
										$publie = 0;
										$publication = 'Publi&eacute;';
										$contraire = 'D&eacute;publier';
									} else {$publie = 1;
										$publication = 'En Attente de publication';
										$contraire = 'Publier';
									}
									echo '
									<tr class="even">
										<td><h3><a href="' . base_url() . 'annonces/detail/' . format_url($annonce -> titre) . '_' . $annonce -> id_annonce . '">' .$annonce -> titre . '</a></h3>
										<div class="meta">
											<span class="folder"><a href="' . base_url() . 'categorie/' . format_url($annonce -> categorie) . '_' . $annonce -> id_category . '" rel="tag">' . utf8_decode($annonce -> categorie ). '</a></span> | <span class="clock"><span>' . $annonce -> ajout . '</span></span>
										</div></td>
										<td class="text-center">' . $annonce -> views . '</td>
										<td class="text-center"><a href="' . site_url('annonces/vue_annonce') . '/' . $annonce -> id_annonce . '"><img src="' . base_url() . 'assets/i/pencil.png" title="Modifier" alt="Modifier" border="0"></a>&nbsp;&nbsp; <a href="javascript:;" onclick="Publier(' . $annonce -> id_annonce . ',' . $publie . ')"><img src="' . base_url() . 'assets/i/' . $publie . '.png" title="' . $contraire . '" alt="' . $contraire . '" border="0"></a>
										<br>
										<a onclick="suppAnnonce(' . $annonce -> id_annonce . ')" href="javascript:;"><img src="' . base_url() . 'assets/i/delete.png" title="Supprimer" alt="" border="0"></a>
										<br>
										</td>
									</tr>
									';
								endforeach;
							}
 							?>
							<tr>
								<td id="paging-td" colspan="5">
								<div class="paging">
									<div class="pages">
										<?php echo $pagination;?>
									</div>
									<div class="clr"></div>
								</div>
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
