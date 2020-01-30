<div class="entry-info entry-header col-md-2">

	<?php gomedia_post_author(); // Get the post author info. ?>
	<?php $author_id = get_the_author_meta( 'ID' ); ?>
	<?php gomedia_social_sharing(); // Get the social sharing. ?>
	
	<?php
		$tags_list = get_the_tag_list( '<ul><li>','</li><li>','</li></ul>' );
		if ( $tags_list ) :
	?>
		<div class="entry-tags">
			<p><?php _e( 'Tags', 'gomedia' ); ?></p>
			<?php echo $tags_list; ?>
		</div>
	<?php endif; // End if $tags_list ?>
    
</div><!-- .col-md-2 -->

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<header class="entry-header">
		<?php if ( function_exists('yoast_breadcrumb') ) {
  yoast_breadcrumb( '<span id="breadcrumbs">','</span>' );
} ?>
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">
			<?php if ( function_exists('yoast_breadcrumb') ) {
  yoast_breadcrumb( '<span id="breadcrumbs">','</span>' );
} ?>
			<span>Veröffentlicht von <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>" title="Autor: <?php the_author(); ?>"><?php the_author(); ?></a>
		</span>
		<?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ', ', 'gomedia' ) );
				if ( $categories_list && gomedia_categorized_blog() ) :
			?>
			<span class="cat-links">
				<?php printf( __( 'in %1$s', 'gomedia' ), $categories_list ); ?>
			</span>
			<br/>
			<span class="reading-time"><?php echo theme_slug_reading_time(); ?></span>
			<?php endif; // End if categories ?>
			<?php edit_post_link( __( '&middot; Edit', 'gomedia' ), '<span class="edit-link">', '</span>' ); ?>
		</div><!-- .entry-meta -->

	</header><!-- .entry-header -->

	<div class="entry-content">
		
		<?php the_content(); ?>
		<br/>
		
	<span style="font-size: 1.8em;">Zum weiterlesen:</span><br/>
		<div class="navigation">	
			<?php previous_post_link('%link', '%title', true); ?>
			<br/>	<br/>
			<?php next_post_link('%link', '%title', true); ?>
			<br/>	<br/>
		</div>
	</div><!-- .entry-content -->
	
	 

	<?php

		// If comments are open or we have at least one comment, load up the comment template
		if ( comments_open() || '0' != get_comments_number() ) :
			comments_template();
		endif;
	?>
	
</article><!-- #post-## -->
