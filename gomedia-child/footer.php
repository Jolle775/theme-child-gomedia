	</div><!-- #main -->

	<footer id="footer" class="site-footer" role="contentinfo">
		
		<div class="container">
			<div class="row">

				<?php get_sidebar( 'footer' ); // Loads the sidebar-footer.php template. ?> 

				<div id="site-bottom" class="clearfix">

					<?php get_template_part( 'menu', 'subsidiary' ); // Loads the menu-subsidiary.php template. ?>

					

				</div>
				
			</div><!-- .row -->
		</div><!-- .container -->

	</footer><!-- #footer -->
	
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
