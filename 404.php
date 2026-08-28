<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage Starter_Theme
 * @since Starter Theme 1.0
 */

get_header(); ?>

	<header class="page-header">
		<h1 class="page-title"><?php _e( 'Not Found', 'startertheme' ); ?></h1>
	</header>

	<div class="page-content">
		<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'startertheme' ); ?></p>
	</div>

<?php get_footer();
