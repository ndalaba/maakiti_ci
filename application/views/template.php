<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//FR" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html    xmlns="http://www.w3.org/1999/xhtml" lang="en-US">
	<head profile="http://gmpg.org/xfn/11">
		<meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
		
		<meta name="DESCRIPTION" content="<?php  if(isset($description)) echo $description ?>">
        <meta name="KEYWORDS" content="Petites annonces, annonces gratuites, petites annonces gratuites, produits d'occasion, immobilier, vehicules ...">
		
		<title><?php echo $titre ?> - MAAKITI l'expertise des petites annonces en Guinée </title>
		<link rel="shortcut icon" href="<?php echo base_url().'assets/i/favicon.ico'?>">
		<link rel="stylesheet" id="sexy-bookmarks-css" href="<?php echo base_url().'assets/'?>c/style.css" type="text/css" media="all">
		<link rel="stylesheet" id="at-color-css" href="<?php echo base_url().'assets/'?>c/red.css" type="text/css" media="all"/>
		<link rel="stylesheet" id="autocomplete-css" href="<?php echo base_url().'assets/'?>c/jquery-ui-1.css" type="text/css" media="all">
		<script type="text/javascript" src="<?php echo base_url().'assets/'?>j/jquery.js"></script>
		<script type="text/javascript" src="<?php echo base_url()?>assets/j/jquery.validate.js"></script>		
		<style type="text/css" media="screen">
			/* Begin Contact Form CSS */
			.contactform {position: static;overflow: hidden;width: 95%;}
			.contactleft {width: 25%;white-space: pre;text-align: right;clear: both;float: left;display: inline;padding: 4px;margin: 5px 0;}
			.contactright {width: 70%;text-align: left;float: right;display: inline;padding: 4px;margin: 5px 0;}
			.contacterror {border: 1px solid #ff0000;}
			.contactsubmit {}
			/* End Contact Form CSS */

		</style>
		<?php $this -> load -> view('inc/url');?> <!--[if gte IE 9]> <script type="text/javascript"> Cufon.set('engine', 'canvas'); </script> <![endif]-->
		<!-- cufon fonts  
		<script src="<?php echo base_url().'assets/'?>j/Vegur_400-Vegur_700.js" type="text/javascript"></script>
		<script src="<?php echo base_url().'assets/'?>j/Liberation_Serif_400.js" type="text/javascript"></script>-->
		<!-- end cufon fonts  -->
		<!-- cufon font replacements -->
		<script type="text/javascript">
			// <![CDATA[
			Cufon.replace('.content_right h2.dotted', {
				fontFamily : 'Liberation Serif',
				textShadow : '0 1px 0 #FFFFFF'
			});
			// ]]>
		</script>
		<!-- end cufon font replacements -->
		<script type="text/javascript">
			var ref="<?php echo base_url() ?>"; // variable utilisé dans les fichiers javascript
		</script>
		<script type="text/javascript" src="<?php echo base_url().'assets/'?>j/script.js"></script>	
        <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-32676487-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<!-- cript pour le zoom des image des annonces -->
<script type="text/javascript" src="<?php echo base_url().'assets/'?>j/jquery.hoverpulse.js"></script>
<script type="text/javascript">
	$(function() {		                
                $('#thumbs-pic a img').hoverpulse({//function pour le zoom
                    size: 100,  // number of pixels to pulse element (in each direction)
                    speed: 400 // speed of the animation 
                });  
                $('#thumbs-pic a').css({
                    display:'inline-block',
                    width:'50px',
                    marginRight:'7px'
                });
	});

</script>
<!-- fin script -->
	</head>	
	<body class="home blog" id="<?php echo $id;?>">
		<div class="container">
			<!-- HEADER -->
			<?php $this->load->view('inc/header') ?>
			<!-- /HEADER -->
			
			<!-- Recherche -->
			<?php $this->load->view('inc/recherche') ?>
			<!-- Recherche -->
			
			<!-- content -->
			<div class="content">
				<?php echo $this->load->view($contents) ?>
			</div>
			<!-- /content -->
			
			<!-- FOOTER -->
			<?php $this->load->view('inc/footer') ?>
			<!-- /FOOTER -->
			
		</div><!-- /container -->
	</body>
</html>
