<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 */
?>
<?php get_sidebar(); ?>
	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
	
		<div class="site-info">
			<div class="site-brand" id = "footer-brand">
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<div class ="description" id = "footer-description">
				<p class="site-description"><?php echo cp_copyright(); ?></p>
		</div>
		
		<p class= "credit">
			<?php printf( __( '<a href="https://theme.chenpan.xyz/cp" rel="designer">CP is designed by Pan Chen.</a>', 'cp' )); ?>
		</p>
		</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
