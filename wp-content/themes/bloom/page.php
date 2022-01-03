<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header();
?>
<section class="aboutbody  mt-4 mb-4">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-12 mt-4 mb-4">
                <?php
                    /* Start the Loop */
                    while ( have_posts() ) :
                    	the_post();
                    	the_content();
                    	//get_template_part( 'templates/content/content-page' );
                    
                    	// If comments are open or there is at least one comment, load up the comment template.
                    	if ( comments_open() || get_comments_number() ) {
                    		comments_template();
                    	}
                    endwhile; // End of the loop.
                ?>
            </div>
        </div>
    </div>
</section>
<?php
get_footer();