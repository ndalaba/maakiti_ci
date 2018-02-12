<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

// labels
$lang['header']			=	'Étape 2: Check requirements';
$lang['intro_text']		= 	'La première &eacute;tape de l\'installation va v&eacute;rifir si votre serveur supporte PyroCMS. La plupart des serveurs peuvent lancer cette proc&eacute;dure sans aucun problème.';
$lang['mandatory']		= 	'Mandatory'; #translate
$lang['recommended']	= 	'Recommended'; #translate

$lang['server_settings']= 	'Paramètres serveur HTTP';
$lang['server_version']	=	'Les logiciels de votre serveur :';
$lang['server_fail']	=	'Les logiciels de votre serveur ne sont pas support&eacute;s, PyroCMS peut ou ne peut pas fonctionner. Tant que votre PHP et votre MySQL n\'est pas mis à jour. PyroCMS devrait être en mesure de fonctionner correctement, il suffit de nettoyer les URL.';

$lang['php_settings']	=	'Paramètres PHP';
$lang['php_required']	=	'PyroCMS n&eacute;cessite la version PHP 5.0 ou sup&eacute;rieure.';
$lang['php_version']	=	'Votre serveur a la bonne version';
$lang['php_fail']		=	'Votre version de PHP n\'est pas support&eacute;e. PyroCMS n&eacute;cessite la version PHP 5.0 ou sup&eacute;rieure pour fonctionner correctement.';

$lang['mysql_settings']	=	'Paramètres MySQL';
$lang['mysql_required']	=	'PyroCMS n&eacute;cessite un accès à une base de donn&eacute;es MySQL en version 5.0 ou sup&eacute;rieure.';
$lang['mysql_version1']	=	'Votre serveur a la bonne version';
$lang['mysql_version2']	=	'Votre client a la bonne version';
$lang['mysql_fail']		=	'Votre version de MySQL n\'est pas support&eacute;e. PyroCMS n&eacute;c&eacute;ssite MySQL version 5.0 ou sup&eacute;rieure pour fonctionner correctement.';

$lang['gd_settings']	=	'Paramètres GD';
$lang['gd_required']	= 	'PyroCMS n&eacute;cessite GD library 1.0 ou sup&eacute;rieur pour manipuler les images.';
$lang['gd_version']		= 	'Votre serveur a la bonne version';
$lang['gd_fail']		=	'Nous ne pouvons pas d&eacute;terminer la version de GD library. Cela signifie que GD n\'est pas install&eacute;. PyroCMS peut tourner correctement sur votre serveur, mais certaines actions sur les images seront pas possibles. Il est vivement recommand&eacute; d\'activer GD library.';

$lang['summary']		=	'R&eacute;sum&eacute;';

$lang['zlib']			=	'Zlib'; // needs to be translated
$lang['zlib_required']	= 	'PyroCMS requires Zlib in order to unzip and install themes.'; // needs to be translated
$lang['zlib_fail']		=	'Zlib can not be found. This usually means that Zlib is not installed. PyroCMS will still run properly but installation of themes will not work. It is highly recommended to install Zlib.'; // needs to be translated

$lang['curl']			=	'Curl'; #translate
$lang['curl_required']	=	'PyroCMS requires Curl in order to make connections to other sites.'; #translate
$lang['curl_fail']		=	'Curl can not be found. This usually means that Curl is not installed. PyroCMS will still run properly but some of the functions might not work. It is highly recommended to enable the Curl library.'; #translate

$lang['summary_success']	=	'Votre serveur est prêt pour l\'installation de PyroCMS, cliquez sur le bouton ci-dessous pour passer à la prochaine &eacute;tape.';
$lang['summary_partial']	=	'Votre serveur contient quasiment tous les logiciels n&eacute;cessaires à l\'installation de PyroCMS. Cela signifie vous pouvez lancer l\'installation, mais vous pourriez rencontrer des problèmes lors de la redimension d\'image et la cr&eacute;ation de vignette.';
$lang['summary_failure']	=	'Il semblerait que votre serveur ne puisse pas install&eacute; PyroCMS. Merci de contacter votre administrateur serveur ou votre h&eacute;bergeur pour r&eacute;soudre ce problème..';
$lang['next_step']		=	'Passer à la prochaine &eacute;tape';
$lang['step3']			=	'Étape 3';
$lang['retry']			=	'Essayez encore';

// messages
$lang['step1_failure']	=	'Merci de remplir les champs obligatoires pour les paramètres de la base de donn&eacute;es dans le formulaire ci-dessous...';

/* End of file step_2_lang.php */
/* Location: ./installer/language/french/step_2_lang.php */