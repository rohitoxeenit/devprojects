<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Bloom
 * @since Bloom 1.0
 */

get_header();
    $pgid = get_the_ID();
    $director_img = get_field( "director_image", $pgid);
?>
    <section class="common-header">
        <h1 class="text-white"><?php the_title();?></h1>
    </section>
	<section class="aboutbody  mt-4 mb-4">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-12 mt-4 mb-4">
					<?php 	
						// Default Post Tempate Calling
							// Start the Loop.
							while ( have_posts() ) :
								the_post();
								the_content();
							endwhile; // End the loop.
					?>
				</div>
			</div>
		</div>
	</section>
<?php
get_footer();