<?php if ( has_nav_menu( 'secondary' ) ) : // Check if there's a menu assigned to the 'secondary' location. ?>
<?php 
$kategorie = get_the_category($post->ID);
$kategorie = $kategorie[0];
$name_der_kategorie = $kategorie->name;
$category_ID = $kategorie->ID;
$site_url = get_site_url();
$homeID = get_option('page_on_front');
$category_link = get_category_link( $kategorie ); ?>

	<nav id="secondary-nav" class="main-navigation navbar navbar-light navbar-expand-lg " role="navigation">
		<div class="container">
			<div class="row">

			<a class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			Menü aufklappen
</a>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	<?php if ( is_single()) : ?>	
		<ul id="secondary-menu" class="sf-menu col-md-9 l_tinynav1 sf-js-enabled sf-arrows">
			
	<li id="menu-item-<?php echo $homeID;?>" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-<?php echo $homeID;?>" data-children-count="0"><a href="<?php echo $site_url;?>" data-wpel-link="internal" target="_self" title="360Kompakt">Zur Startseite</a></li>
					<li id="menu-item-<?php echo $category_ID ?>" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-709" data-children-count="0"><a href="<?php echo $category_link; ?>" data-wpel-link="internal" target="_self" title="<?php echo $name_der_kategorie; ?>">Weitere Artikel zum Thema <?php echo $name_der_kategorie; ?></a></li>
		
</ul>			
	<?php else : ?>

		<?php wp_nav_menu(
					array(
						'theme_location'  => 'secondary',
						'container'       => '',
						'menu_id'         => 'menu-second_menu',
						'menu_class'      => 'navbar-nav mr-auto sf-menu col-md-9 sf-arrows',
						'fallback_cb'     => ''
					)
				); ?>

					
	<?php endif; ?>


				
				
				<?php get_search_form(); // Loads the searchform.php template. ?>
				</div>
			</div>
		</div><!-- .container -->
	</nav><!-- #secondary-nav -->

<?php endif; // End check for menu. ?>