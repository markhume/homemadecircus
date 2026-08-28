<?php
/**
 * The template for displaying Search Results pages
 *
 * @package WordPress
 * @subpackage Starter_Theme
 * @since Starter Theme 1.0
 */

get_header(); ?>

	<?php if ( have_posts() ) : ?>

	<header class="page-header">
		<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'startertheme' ), get_search_query() ); ?></h1>
	</header><!-- .page-header -->

		<?php
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
