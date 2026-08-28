<?php
/**
 * Custom template tags for Starter Theme
 *
 * @package WordPress
 * @subpackage Starter_Theme
 * @since Starter Theme 1.0
 */

if ( ! function_exists( 'startertheme_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 *
 * @since Starter Theme 1.0
 *
 * @return void
 */
function startertheme_paging_nav() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}

	$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
	$pagenum_link = html_entity_decode( get_pagenum_link() );
	$query_args   = array();
	$url_parts    = explode( '?', $pagenum_link );

	if ( isset( $url_parts[1] ) ) {
		wp_parse_str( $url_parts[1], $query_args );
	}

	$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
	$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

	$format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
	$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';

	// Set up paginated links.
	$links = paginate_links( array(
		'base'     => $pagenum_link,
		'format'   => $format,
		'total'    => $GLOBALS['wp_query']->max_num_pages,
		'current'  => $paged,
		'mid_size' => 1,
		'add_args' => array_map( 'urlencode', $query_args ),
		'prev_text' => __( '&larr; Previous', 'startertheme' ),
		'next_text' => __( 'Next &rarr;', 'startertheme' ),
	) );

	if ( $links ) :

	?>
	<nav class="navigation paging-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'startertheme' ); ?></h1>
		<div class="pagination loop-pagination">
			<?php echo $links; ?>
		</div><!-- .pagination -->
	</nav><!-- .navigation -->
	<?php
	endif;
}
endif;

/**
 * Whether the Planning Help sidebar should display on the current page.
 *
 * @param int|null $post_id Optional page ID.
 * @return bool
 */
function homemade_circus_show_planning_sidebar( $post_id = null ) {
	$post_id = $post_id ? (int) $post_id : get_the_ID();

	if ( ! $post_id || 'page' !== get_post_type( $post_id ) ) {
		return false;
	}

	if ( 258 === $post_id ) {
		return false;
	}

	if ( get_field( 'show_planning_sidebar', $post_id ) ) {
		return true;
	}

	// Default for Planning Your Workshop subpages.
	return in_array( 258, get_post_ancestors( $post_id ), true );
}

if ( ! function_exists( 'startertheme_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 *
 * @since Starter Theme 1.0
 *
 * @return void
 */
function startertheme_post_nav() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}

	?>
	<!-- <nav class="navigation post-navigation" role="navigation">
		<h1 class="screen-reader-text">< ?php _e( 'Post navigation', 'startertheme' ); ?></h1>
		<div class="nav-links">
			< ?php
			if ( is_attachment() ) :
				previous_post_link( '%link', __( '<span class="meta-nav">Published In</span>%title', 'startertheme' ) );
			else :
				previous_post_link( '%link', __( '<span class="meta-nav">Previous Post</span>%title', 'startertheme' ) );
				next_post_link( '%link', __( '<span class="meta-nav">Next Post</span>%title', 'startertheme' ) );
			endif;
			?>
		</div>
	</nav> -->
	<?php
}
endif;

if ( ! function_exists( 'startertheme_posted_on' ) ) :
/**
 * Print HTML with meta information for the current post-date/time and author.
 *
 * @since Starter Theme 1.0
 *
 * @return void
 */
function startertheme_posted_on() {
	if ( is_sticky() && is_home() && ! is_paged() ) {
		echo '<span class="featured-post">' . __( 'Sticky', 'startertheme' ) . '</span>';
	}

	// Set up and print post meta information.
	printf( '<span class="entry-date"><a href="%1$s" rel="bookmark"><time class="entry-date" datetime="%2$s">%3$s</time></a></span> <span class="byline"><span class="author vcard"><a class="url fn n" href="%4$s" rel="author">%5$s</a></span></span>',
		esc_url( get_permalink() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		get_the_author()
	);
}
endif;

/**
 * Find out if blog has more than one category.
 *
 * @since Starter Theme 1.0
 *
 * @return boolean true if blog has more than 1 category
 */
function startertheme_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'startertheme_category_count' ) ) ) {
		// Create an array of all the categories that are attached to posts
		$all_the_cool_cats = get_categories( array(
			'hide_empty' => 1,
		) );

		// Count the number of categories that are attached to the posts
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'startertheme_category_count', $all_the_cool_cats );
	}

	if ( 1 !== (int) $all_the_cool_cats ) {
		// This blog has more than 1 category so startertheme_categorized_blog should return true
		return true;
	} else {
		// This blog has only 1 category so startertheme_categorized_blog should return false
		return false;
	}
}

/**
 * Flush out the transients used in startertheme_categorized_blog.
 *
 * @since Starter Theme 1.0
 *
 * @return void
 */
function startertheme_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'startertheme_category_count' );
}
add_action( 'edit_category', 'startertheme_category_transient_flusher' );
add_action( 'save_post',     'startertheme_category_transient_flusher' );

/**
 * Display an optional post thumbnail.
 *
 * Wraps the post thumbnail in an anchor element on index
 * views, or a div element when on single views.
 *
 * @since Starter Theme 1.0
 *
 * @return void
*/
function startertheme_post_thumbnail() {
	if ( post_password_required() || ! has_post_thumbnail() ) {
		return;
	}
}
