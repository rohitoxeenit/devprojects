<?php 
/* Template Name: Our Team Page */
get_header();
?>
<?php 
    $pgid = get_the_ID();
    $sec1_img = get_field( "section1_image", $pgid);
?>
<section class="common-header">
    <h1 class="text-white"><?php the_title(); ?></h1>
</section>

<!--<div class="top-breadcrub py-3">-->
<!--    <div class="container">-->
<!--        <p> <a href="/bloom">Home</a> > <?php //the_title();?></p>-->
<!--    </div>-->
<!--</div>-->

<section class="h-partners text-justify">
		<div class="container text-center">
		    <h1 class="font-weight-semibold text-left mt-3 mb-4 ml-5">Board of Directors</h1>
			<?php
				$args_partners = array(  
					'post_type' => 'our_team',
					'post_status' => 'publish',
					'posts_per_page' => 9, 
					'orderby' => 'date', 
					'order' => 'ASC', 
				);
				$loop_partners = get_posts($args_partners);
				//echo "<pre>";
				//echo $loop_partners->post_title;
				//ID
				//post_title
				$i=1;
			?>
			<div class="row my-5">
				<?php 
					foreach ($loop_partners as $mypartners){
					    $partnerid = $mypartners->ID;
						$partnerimg = get_field( "director_image", $partnerid);
						?>
							<div class="col-md-6 mb-6">
								<div class="team_box">
								    <a href="<?php echo get_permalink( $partnerid );?>" target="_blank"><img src="<?php echo $partnerimg['url']; ?>" alt="" class="img-fluid"></a>
								</div>
								<h4 class="mt-3 mb-1 font-weight-bold"><a href="<?php echo get_permalink( $partnerid );?>" target="_blank"><?php echo $mypartners->post_title;?></a></h4>
								<h4><?php echo get_field( "designation", $partnerid);?></h4>
							</div>
				<?php } ?>
			</div>
		</div>
    </section>


<?php
get_footer();
