<?php
/**
 * Template Name: Bloom Home
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Bloom
 * @since Bloom 1.0
 */
get_header();
?>
	<section class="h-feedback">
        <div class="">
            <div id="demo" class="carousel slide" data-ride="carousel">
			<!-- The slideshow -->
			  <div class="carousel-inner">
				<?php
					$args_slider = array(  
						'post_type' => 'sliders',
						'post_status' => 'publish',
						'posts_per_page' => 3, 
						'orderby' => 'title', 
						'order' => 'ASC', 
					);
					$loop_slider = get_posts($args_slider);
					if($loop_slider):
					  // Loop the posts
					  $counter = 1;
					  foreach ($loop_slider as $mypost){
						$sliderid = $mypost->ID;
						if($counter==1){ $style="active";}else{$style="";} ?>
					<div class="carousel-item <?php echo $style;?>">
						<?php $sliderimg = get_field("slider_image", $sliderid); ?>
						<img src="<?php echo $sliderimg['url']; ?>" alt="Bloom-2" class="img-fluid w-100">
						<div class="carousel-itembox">
							<h4 class="text-white"><?php echo $mypost->post_title; ?></h4>
							<div class="btnbox">
								<a href="<?php echo get_field( "button_url", $sliderid); ?>" class="main-btn1" target="_blank"><?php echo get_field( "button_text", $sliderid); ?></a>
							</div>
						</div>	
					</div>
					  <?php 
					  $counter = $counter + 1;
					  }
				wp_reset_postdata(); ?>
				<?php endif; ?>
			  </div>
			  
			  <!-- Left and right controls -->
			  <a class="carousel-control-prev" href="#demo" data-slide="prev">
				<span class="carousel-control-prev-icon"></span>
			  </a>
			  <a class="carousel-control-next" href="#demo" data-slide="next">
				<span class="carousel-control-next-icon"></span>
			  </a>
			</div>
        </div>
    </section>
	<section class="h-join-now text-justify">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<?php $pgid = get_the_ID();?>
					<h2 class="big-text main-color2 text-center mb-3"><?php echo get_field( "we_believe_tab_title", $pgid);?></h2>
					<?php echo get_field( "we_believe_tab_content", $pgid);?>
				</div>
			</div>
		</div>
    </section>
	<section class="h-hi-work">
        <div class="container">
            <h2 class="main-color text-center font-weight-bold"><?php echo get_field( "guide_section_main_title", $pgid);?></h2> 
			<div class="row pt-5">
			<?php
				if( get_field('guide_title_image_&_link', $pgid) ) {
					while( the_repeater_field('guide_title_image_&_link', $pgid) ) {
						$image = get_sub_field('guide_image');
						$title = get_sub_field('guide_title');
						$guide_link = get_sub_field('guide_link');
			?>			
						<div class="col-md-4">
							<div class="hibox hs-section">
								<a href="<?php if(empty($guide_link)){ echo '#';}else{echo $guide_link;} ?>" target="_blank"><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['title']; ?>"></a>
								<a href="<?php if(empty($guide_link)){ echo '#';}else{echo $guide_link;} ?>" target="_blank" class="boxlink"><?php echo $title; ?></a>
							</div>
						</div>
			<?php		}
				}
			?>
			</div>
		</div>
	</section>
	<section class="h-hi-ourprogram">
        <div class="container">
            <h2 class="main-color text-center font-weight-bold"><?php echo get_field( "title", $pgid);?></h2> 
			<div class="row pt-md-5 justify-content-center">
			<?php
				if( get_field('our_program_section', $pgid) ) {
					while( the_repeater_field('our_program_section', $pgid) ) {
						$image_ourprogram = get_sub_field('image');
						$page_url = get_sub_field('page_url');
			?>
						<div class="col-md-5 col-6 pr-md-5">
							<div class="hiopbox">
								<a href="<?php echo $page_url; ?>" target="_blank">
									<img src="<?php echo $image_ourprogram['url']; ?>" alt="<?php echo $image_ourprogram['title']; ?>" class="w-100">
								</a>
							</div>
						</div>
			<?php		}
				}
			?>                
			</div>
		</div>
	</section>
	<section class="h-hi-street">
		<div class="container">
			<div class="row">
			    <?php
					$args_testimonials = array(  
						'post_type' => 'testimonials',
						'post_status' => 'publish',
						'posts_per_page' => 1, 
						'orderby' => 'ID', 
						'order' => 'DESC', 
					);
					$loop_testimonials = get_posts($args_testimonials);
				?>
				<?php foreach ($loop_testimonials as $mytestimonials){?>
					<div class="col-md-2 col-1 px-md-3 pr-0">
						<img src="<?php echo get_template_directory_uri(); ?>/img/quote-left.png" alt="" class="img-fluid q-img">
					</div>
					<div class="col-md-8 col-10">
						<h2 class="main-color text-center font-weight-bold mb-4"><?php echo $mytestimonials->post_title; ?></h2> 
						<p class="pt-3 main-color"><?php echo $mytestimonials->post_content; ?></p>
					</div>
					<div class="col-md-2 col-1 px-md-3 pl-0">
						<img src="<?php echo get_template_directory_uri(); ?>/img/quote-right.png" alt="" class="img-fluid q-img">
					</div>
				<?php } ?>
			    <div class="col-md-11 pt-5 font-weight-bold d-flex align-items-center justify-content-end">
			        <a href="<?php echo get_site_url(); ?>/testimonials/" class="main-color underline-link">See more testimonials</a> <span class="main-color ml-2">or</span> <a href="<?php echo get_site_url(); ?>/contact/" class="main-btn1">SHARE YOUR <br> EXPERIENCE</a>
			    </div>
			    
			</div>
		</div>
	</section>
	<section class="h-vedio text-justify d-flex align-items-center justify-content-center text-center">
		<img src="http://oxeenit.tech/bloomnew/wp-content/uploads/2021/11/Untitled-1.jpg" alt="" class="img-fluid">
	</section>
	<section class="h-partners text-justify">
		<div class="container text-center">
			<h2 class="big-text main-color mb-3 font-weight-bold"><?php echo get_field( "our_partner_section_title", $pgid);?></h2>
			<?php
				$args_partners = array(  
					'post_type' => 'our_partners',
					'post_status' => 'publish',
					'posts_per_page' => 5, 
					'orderby' => 'date',
					'order' => 'DESC', 
				);
				$loop_partners = get_posts($args_partners);
				$i=1;
			?>
			<div class="row my-5">
				<?php 
					foreach ($loop_partners as $mypartners){
						$partnerid = $mypartners->ID;
						$partnerimg = get_field( "partner_image", $partnerid);
						if($i<=3){ ?>
							<div class="col-sm-4 my-md-5">
								<img src="<?php echo $partnerimg['url']; ?>" alt="<?php echo $partnerimg['title']; ?>" class="img-fluid">
							</div>
						<?php } else { ?>
							<div class="col-sm-6">
								<img src="<?php echo $partnerimg['url']; ?>" alt="<?php echo $partnerimg['title']; ?>" class="img-fluid">
							</div>
						<?php }
							$i++;
						} 
				?>
			</div>
		</div>
    </section>
<?php
get_footer();
