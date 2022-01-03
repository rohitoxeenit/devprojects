<?php 
/* Template Name: Testimonial Template */
get_header();
    $pgid = get_the_ID();
?>
<section class="common-header">
    <h1 class="text-white"><?php the_title();?></h1>
</section>

<div class="top-breadcrub py-3">
    <div class="container">
        <p> <a href="<?php echo get_home_url(); ?>">Home</a> > <?php the_title();?></p>  
    </div>
</div>
<section class="h-hi-street">
		<div class="container">
			<?php
				$args_testimonials = array(  
					'post_type' => 'testimonials',
					'post_status' => 'publish',
					'posts_per_page' => 5, 
					'orderby' => 'ID', 
					'order' => 'DESC', 
				);
				$loop_testimonials = get_posts($args_testimonials);
			?>
			<?php foreach ($loop_testimonials as $mytestimonials){?>
			<div class="row mt-5 mb-4">
				<div class="col-md-2 col-2">
					<img src="<?php echo get_template_directory_uri(); ?>/img/quote-left.png" alt="" class="img-fluid q-img">
				</div>
				<div class="col-md-8 col-8">
					<h2 class="main-color text-center font-weight-bold mb-4"><?php echo $mytestimonials->post_title; ?></h2> 
					<p class="pt-3 main-color"><?php echo $mytestimonials->post_content; ?></p>
				</div>
				<div class="col-md-2 col-2">
					<img src="<?php echo get_template_directory_uri(); ?>/img/quote-right.png" alt="" class="img-fluid q-img">
				</div>
			</div>
			<?php } ?>			
		</div>
	</section>
<div class="container">
    <p>Questions?  <a href="<?php echo get_site_url(); ?>/contact/" class="text-underline font-weight-semibold">Contact us</a></p>
</div>
<?php
get_footer();
