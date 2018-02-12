<div class="content_right">
	<div class="shadowblock_out">
		<div class="shadowblock">
			<h2 class="dotted">Options de l'utilisateur</h2>
			<div class="recordfromblog">
				<ul>
                                        <li>
						<a href="<?php echo site_url("annonces/add") ?>">Publier annonces</a>
					</li>
					<li>
						<a href="<?php echo site_url("user/my_annonces") ?>">Mes Annonces</a>
					</li>
					<li>
						<a href="<?php echo site_url("user/my_messages") ?>">Mes Messages</a>
					</li>
					<li>
						<a href="<?php echo site_url("user/updateUser") ?>">Modifier le Profil</a>
					</li>
					<li>
						<a href="<?php echo site_url("user/logout") ?>">Déconnexion</a>
					</li>
				</ul>
			</div><!-- /recordfromblog -->
		</div><!-- /shadowblock -->
	</div><!-- /shadowblock_out -->
	<div class="shadowblock_out">
		<div class="shadowblock">
			<h2 class="dotted">Information du compte</h2>
			<div class="avatar"><img alt=""  src="<?php echo base_url().'assets/i/' ?>Icon-user.png" class="avatar avatar-60 photo" height="60" width="60">
			</div>
			<ul class="user-info">
				<li>
					<strong>PSEUDO: </strong> <?php echo $membre->pseudo ?>
				</li>
				<li>
					<strong>Membre depuis: </strong> <?php echo date('d M Y',$membre->dateajout) ?>
				</li>
				<li>
					<strong>T&eacute;l&eacute;phone: </strong> <?php echo$membre->phone ?>
				</li>
				<li>
					<strong>Ville: </strong> <?php echo $membre->ville ?>
				</li>
			</ul>
		</div><!-- /shadowblock -->
	</div><!-- /shadowblock_out -->
	<div class="shadowblock_out">
		<div class="shadowblock">
			<h2 class="dotted">Statistiques du compte</h2>
			<ul class="user-stats">
				<li>
					Annonces en ligne: <strong><?php echo $online;?></strong>
				</li>
				<li>
					Annonces en attente: <strong><?php echo $offline;?></strong>
				</li>
				<li>
					Total des annonces: <strong><?php echo $total;?></strong>
				</li>
			</ul>
		</div><!-- /shadowblock -->
	</div><!-- /shadowblock_out -->
	<!-- no dynamic sidebar so don't do anything -->
</div>