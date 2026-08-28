<?php
/**
 * The template for displaying Archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each specific one. For example, Starter Theme
 * already has tag.php for Tag archives, category.php for Category archives,
 * and author.php for Author archives.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Starter_Theme
 * @since Starter Theme 1.0
 */

get_header(); ?>

	<?php if ( have_posts() ) :?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<div class="row sidenav">

			<div class="col-12 col-lg-2 sidecolnav">
				<?php if(current_user_can('mepr-active','rules:137')): ?> 

					<?php $loop = new WP_Query( array( 'post_type' => 'activity', 'posts_per_page' => -1, 'orderby'=> 'title', 'order' => 'ASC'  ) ); ?>
						<h2 class="activity-title">Activity</h2>
						<ul class="sidebar">
						<?php 
						
								while ( $loop->have_posts() ) : $loop->the_post(); 
									the_title( '<li><a href="' . get_permalink() . '" class="btn" title="' . the_title_attribute( 'echo=0' ) . '" rel="bookmark">', '</a></li>' ); 
								endwhile;

								wp_reset_postdata(); 
							
						?>
						</ul>
					
					<h2 class="help-title">Help and Info</h2>
					<?php wp_nav_menu( array( 'theme_location' => 'help-info' ) ); ?>

				<?php endif; ?>
			</div>

			<div class="col-12 col-lg-10 box">
				
				<div class="row">

					<div class="col-12">
					
    
					<?php $tag = get_queried_object(); ?>

							<header class="entry-header">
								<h1 class="entry-title"><?php echo $tag->name; ?> Activities</h1>
							</header>

							<ul class="tagpage-list row">
								<?php while ( have_posts() ) : the_post(); ?>
						
									<li class="col-12 col-lg-4">
										<a href="<?php the_permalink(); ?>">
											<?php 
												$image = get_field('image');
												$size = 'full'; // (thumbnail, medium, large, full or custom size)
												if( $image ) {
													echo wp_get_attachment_image( $image, $size );
												}
											?>
											<div class="tagitemtitle"><?php the_title(); ?></div>
										</a>
									</li>
												
								<?php  endwhile; ?>
							</ul>

					</div>
				
				</div>
	
			</div>
	
		</div>
	
	
	</article> 

	<?php endif; ?>

<?php get_footer();
