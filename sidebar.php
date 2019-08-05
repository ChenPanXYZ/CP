<?php if ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) ) : ?>


<?php if ( ! is_active_sidebar( 'footer-1' ) &&
	! is_active_sidebar( 'footer-2' ) &&
	! is_active_sidebar( 'footer-3' ) ) {
	return;
}
?>
<div class = "sidebar-container" id = "footer-siderbar-container">
	<?php for ( $i = 1; $i <= 3; $i++ ) { ?>
	<aside id="secondary" class="sidebar widget-area-<?php echo esc_attr( $i ); ?> footer-sidebar" role="complementary">
	<?php if ( is_active_sidebar( 'footer-' . $i ) ) : ?>
	<?php dynamic_sidebar( 'footer-' . $i ); ?>
	<?php endif; ?>
	</aside>
	<?php } ?>
</div>
<?php endif; ?>
