<?php
/**
 * The generic template file for a Page to show posts.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * 
 * 
 *
 */


get_header();

?>
	<main id="main" class="site-main" role="main">
	<div class="entry-wrapper">
		<header class="entry-header">
			<h1 class="entry-title"><?php the_title(); ?></h1>
		</header><!-- .entry-header -->
		<div class="entry-content">
			<?php the_content(); ?>
		</div><!-- .entry-content -->
		
		<?php edit_post_link( __( 'Edit', 'story' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>

<?php
	/**
	 * Setup query to show the ‘’ post type with ‘20’ posts.
	 * Output the title without an excerpt.
	 */

	$args = array(  
		'category_name' => '',
		'posts_per_page'=> 20,
		'post_type' => 'post',
		'post_status' => 'publish', 
		'orderby' => 'title', 
		'order' => 'ASC', 
	);


	// the query
	$the_query = new WP_Query( $args ); ?>
	
	<?php if ( $the_query->have_posts() ) : ?>
	
		<!-- pagination here -->
	
		<!-- the loop -->
		<?php while ( $the_query->have_posts() ) : $the_query->the_post(); 
		echo '<h2><a href="'.get_permalink().'">';
		echo the_title();
		echo '</a></h2>'; ?>

		<?php endwhile; ?>
		<!-- end of the loop -->
	
		<!-- pagination here -->
	
		<?php wp_reset_postdata(); ?>
	
	<?php else : ?>
		<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
	<?php endif;  ?>
	</div><!-- .entry-wrapper -->
	</main><!-- #main -->
get_footer();
