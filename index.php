<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one
 * of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query,
 * e.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Starter_Theme
 * @since Starter Theme 1.0
 */

get_header(); ?>

	<?php
		if ( have_posts() ) :
			// Start the Loop.
			while ( have_posts() ) : the_post();
				get_template_part( 'content' );
			endwhile;
			// Previous/next post navigation.
			startertheme_paging_nav();

		else :
			// If no content, include the "No posts found" template.

		endif;
	?>

<?php get_footer();
