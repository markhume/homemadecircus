<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Starter_Theme
 * @since Starter Theme 1.0
 */

get_header(); ?>

	<?php
		// Start the Loop.
		while ( have_posts() ) : the_post();
			get_template_part( 'content' );
			// Previous/next post navigation.
			startertheme_post_nav();
		endwhile; ?>

<?php get_footer();
