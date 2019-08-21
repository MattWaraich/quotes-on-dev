<?php
/**
 * The template for displaying the footer.
 *
 * @package QOD_Starter_Theme
 */

?>

<!-- #content -->
<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="main-navigation-container">
			<nav id="site-navigation" class="main-navigation" role="navigation">
					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php echo esc_html( 'Primary Menu' ); ?></button>
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
			</nav>  <!-- #site-navigation -->
	</div>
	<div class="site-info">
	<?php echo ('Brought to you by') ?>
		<a href="<?php echo esc_url('https://www.linkedin.com/in/matt-waraich-36b291160//'); ?>">
		<?php echo ('Quotes on Dev'); ?>
		</a>
	</div>
				
				</footer>
		<?php wp_footer(); ?>

	</body>
</html>
