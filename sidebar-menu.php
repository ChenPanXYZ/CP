<?php if ( is_active_sidebar( 'menu-1' ) || is_active_sidebar( 'menu-2' ) || is_active_sidebar( 'menu-3' ) ) : ?>


<?php if ( ! is_active_sidebar( 'menu-1' ) &&
	! is_active_sidebar( 'menu-2' ) &&
	! is_active_sidebar( 'menu-3' ) ) {
	return;
}
?>
<div class = "sidebar-container">
	<?php for ( $i = 1; $i <= 3; $i++ ) { ?>
	<aside id="secondary" class="sidebar widget-area-<?php echo esc_attr( $i ); ?>" role="complementary">
	<?php if ( is_active_sidebar( 'menu-' . $i ) ) : ?>
	<?php dynamic_sidebar( 'menu-' . $i ); ?>
	<?php endif; ?>
	</aside>
	<?php } ?>
</div>
<?php endif; ?>
