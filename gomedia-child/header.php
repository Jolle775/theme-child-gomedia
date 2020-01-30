<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-156183427-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-156183427-1');
</script>

</head>

<body <?php body_class(); ?>>

<div id="page" class="hfeed site">
	
	<?php get_template_part( 'menu', 'primary' ); // Loads the menu-primary.php template. ?>

	<header id="header" class="site-header" role="banner">

		<div class="container">
			<div class="row">

				<div class="site-branding col-md-4">
					<?php gomedia_site_branding(); // Custom function to display site title or logo. ?>
				</div>
				
				<?php gomedia_header_ad(); // Get the header ad. ?>
				<?php if(is_home() and !is_paged()) echo '<div id="header-text" class="screen-reader-text"><h1 id="site-title"> <a href="https://360kompakt.de/" title="360Kompakt" rel="home">360Kompakt</a></h1>
					<p id="site-description">360Kompakt unterstützt leitende Angestellte, Führungskräfte, Unternehmer und Geschäftsführer, die gerne Neues lernen und sich weiterentwickeln wollen, mit aktuellen, praxisbezogenen Informationen.</p></div>'; ?>
			</div><!-- .row -->
		</div><!-- .container -->

	</header><!-- #header -->

	<?php get_template_part( 'menu', 'secondary' ); // Loads the menu-secondary.php template. ?>

	<div id="main">