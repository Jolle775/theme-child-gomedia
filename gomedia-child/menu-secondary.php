<?php if ( has_nav_menu( 'secondary' ) ) : // Check if there's a menu assigned to the 'secondary' location. ?>
<?php 
$kategorie = get_the_category($post->ID);
$kategorie = $kategorie[0];
$name_der_kategorie = $kategorie->name;
$name_der_kategorie_klein = strtolower($name_der_kategorie);?>

	<nav id="secondary-nav" class="main-navigation" role="navigation">
		<div class="container">
			<div class="row">

				<ul id="secondary-menu" class="sf-menu col-md-9 l_tinynav1 sf-js-enabled sf-arrows">
	<?php if ( is_single()) : ?>	
					
	<li id="menu-item-710" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-710" data-children-count="0"><a href="https://360kompakt.de" data-wpel-link="internal" target="_self" title="360Kompakt">Zur Startseite</a></li>
					<li id="menu-item-709" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-709" data-children-count="0"><a href="https://360kompakt.de/<?php echo $name_der_kategorie_klein; ?>" data-wpel-link="internal" target="_self" title="<?php echo $name_der_kategorie; ?>">Weitere Artikel zum Thema <?php echo $name_der_kategorie; ?></a></li>
					
	<?php else : ?>
	<li id="menu-item-712" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-712" data-children-count="0"><a href="https://360kompakt.de/finanzen" data-wpel-link="internal" target="_self" title="Finanzen">Finanzen</a></li>
	
	<li id="menu-item-713" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-713" data-children-count="0"><a href="https://360kompakt.de/technologie" data-wpel-link="internal" target="_self" title="Technologie">Technologie</a></li>
	
	
	
	<li id="menu-item-714" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-714" data-children-count="0"><a href="https://360kompakt.de/lifestyle" data-wpel-link="internal" target="_self" title="Lifestyle">Lifestyle</a></li>
	
	
	
	<li id="menu-item-715" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-715" data-children-count="0"><a href="https://360kompakt.de/management" data-wpel-link="internal" target="_self" title="Management">Management</a></li>
	
	
	
	<li id="menu-item-716" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-716" data-children-count="0"><a href="https://360kompakt.de/marketing" data-wpel-link="internal" target="_self" title="Marketing">Marketing</a></li>
	
	
	
	<li id="menu-item-717" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-717" data-children-count="0"><a href="https://360kompakt.de/recht" data-wpel-link="internal" target="_self" title="Recht">Recht</a></li>
					
	<?php endif; ?>


</ul>
				
				
				<?php get_search_form(); // Loads the searchform.php template. ?>

			</div>
		</div><!-- .container -->
	</nav><!-- #secondary-nav -->

<?php endif; // End check for menu. ?>