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
    <section class="h-hi-ourteam">
        <div class="container">
            <div class="row pt-5">
                <div class="col-md-12 align-items-center">
					<div class="teambox_single text-center mb-5">
						<img src="<?php echo $director_img['url']; ?>" alt="" class="img-fluid">
						<h2 class="mt-4 font-weight-bold"><?php the_title(); ?></h2>
					    <h5 class="mt-2 mb-1"><?php echo get_field( "designation", $pgid);?></h5>
					</div>
					<div  class="mt-3 mb-2"><p><?php echo get_field( "director_bio_details", $pgid);?></p></div>
				</div>
			</div>
		</div>
	</section>
<?php
get_footer();