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
	<?php if($pgid==801){?>
		<section class="aboutbody musicM">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-md-12">
						<h2 class="font-weight-semibold mb-3">
							<?php echo get_field('dance_section_title',$pgid);?>    
						</h2>
						<div class="font-weight-normal mt-4 mb-4">
							<?php echo get_field('dance_section_content',$pgid);?>
						</div>
					</div>
					<div class="col-md-10 mt-5 mb-4 mx-auto text-center">
						<?php $danceimg = get_field('dance_section_image',$pgid); ?>
						<a href="<?php echo get_field('dance_section_image_link',$pgid);?>" target="_blank"><img src="<?php echo $danceimg['url']; ?>" alt="<?php echo $danceimg['title']; ?>" class="img-fluid"></a>
					</div>
				</div>
				<div class="row align-items-center">
					<div class="col-md-12">
						 <div class="mb-3 mt-5">
							<h5><?php echo get_field('extra_mile_section_title',$pgid);?></h5>
							<p class="font-weight-normal mt-4 mb-4">
								<?php echo get_field('extra_mile_section_content',$pgid);?>
							</p>							
						</div>
					</div>
					<div class="col-md-12 mb-4">
						<p class="font-weight-normal"><?php echo get_field('extra_mile_section_line',$pgid);?></p>
						<a href="<?php echo get_field('extra_mile_section_button_url',$pgid);?>" class="main-btn1"><?php echo get_field('extra_mile_section_button_text',$pgid);?></a>
					</div>
					<div class="col-md-12 mt-5 mb-4 mx-auto text-center">						
						<?php $dancesec2img = get_field('extra_mile_section_image',$pgid); ?>
						<a href="<?php echo get_field('extar_mile_section_image_link',$pgid);?>" target="_blank">
							<img src="<?php echo $dancesec2img['url']; ?>" alt="<?php echo $dancesec2img['title']; ?>" class="img-fluid">
						</a>
					</div>
				</div>
				<div class="fullbline"></div>
				<div class="row">
					<div class="col-md-12">
						<h2 class="font-weight-semibold mb-3">
							<?php echo get_field('want_bloom_section',$pgid);?>
						</h2>
						<div class="mb-3">
							<?php echo get_field('want_bloom_section_content',$pgid);?>
						</div>
						<a href="<?php echo get_field('want_bloom_button_url',$pgid);?>" class="main-btn1 ml-0"><?php echo get_field('want_bloom_button_text',$pgid);?></a>
					</div>
				</div>
				<div class="fullbline"></div>
				<div class="row justify-content-around">
					<div class="col-md-12">
						<h2 class="font-weight-semibold mb-5">
							<?php echo get_field('learn_more_title',$pgid);?>
						</h2>
					</div>
					<?php
						if( get_field('learn_more_buttons', $pgid) ) {
							while( the_repeater_field('learn_more_buttons', $pgid) ) {
								$learn_more_section_button_text = get_sub_field('learn_more_section_button_text');
								$learn_more_section_button_url = get_sub_field('learn_more_section_button_url');
								$earn_more_section_boxes_color = get_sub_field('learn_more_section_boxes_color');
					?>
								<div class="col-5 mb-3">
									<div class="boxbtn <?php echo $earn_more_section_boxes_color;?>">
										<a href="<?php echo $learn_more_section_button_url;?>"><?php echo $learn_more_section_button_text;?> <i class="fas fa-chevron-right pl-2"></i></a>
									</div>
								</div>
					<?php	}
						}
					?>
				</div>
			</div>
		</section>
<?php } elseif($pgid==800){ ?>
		<section class="aboutbody musicM">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-md-12">
						<h2 class="font-weight-semibold mb-3">
							<?php echo get_field('mm_section_title',$pgid);?>    
						</h2>
						<div class="font-weight-normal mt-4 mb-4">
							<?php echo get_field('music_movement_content',$pgid);?>
						</div>
					</div>
					<div class="col-md-10 mt-5 mb-4 mx-auto text-center">
						<?php $mmimg = get_field('mm_image',$pgid); ?>
						<a href="<?php echo get_field('mm_image_url',$pgid);?>" target="_blank"><img src="<?php echo $mmimg['url']; ?>" alt="<?php echo $mmimg['title']; ?>" class="img-fluid"></a>
					</div>
				</div>
				<div class="row align-items-center">
					<div class="col-md-12">
						 <div class="mb-3 mt-5">
							<h5><?php echo get_field('em_title',$pgid);?></h5>
							<p class="font-weight-normal mt-4 mb-4">
								<?php echo get_field('em_content',$pgid);?>
							</p>							
						</div>
					</div>
					<div class="col-md-12 mb-4">
						<p class="font-weight-normal"><?php echo get_field('em_line',$pgid);?></p>
						<div class="mb-3 mt-4">
							<a href="<?php echo get_field('em_button_link',$pgid);?>" class="main-btn1"><?php echo get_field('em_button_text',$pgid);?></a>
						</div>
					</div>
					<div class="col-md-12 mt-5 mb-4 mx-auto text-center">						
						<?php $mmemimg = get_field('em_image',$pgid); ?>
						<a href="<?php echo get_field('em_image_url',$pgid);?>" target="_blank">
							<img src="<?php echo $mmemimg['url']; ?>" alt="<?php echo $mmemimg['title']; ?>" class="img-fluid">
						</a>
					</div>
				</div>
				<div class="fullbline"></div>
				<div class="row">
					<div class="col-md-12">
						<h2 class="font-weight-semibold mb-3">
							<?php echo get_field('want_bloom_section',$pgid);?>
						</h2>
						<div class="mb-3">
							<?php echo get_field('want_bloom_section_content',$pgid);?>
						</div>
						<a href="<?php echo get_field('want_bloom_button_url',$pgid);?>" class="main-btn1 ml-0"><?php echo get_field('want_bloom_button_text',$pgid);?></a>
					</div>
				</div>
				<div class="fullbline"></div>
				<div class="row justify-content-around">
					<div class="col-md-12">
						<h2 class="font-weight-semibold mb-5">
							<?php echo get_field('learn_more_title',$pgid);?>
						</h2>
					</div>
					<?php
						if( get_field('learn_more_buttons', $pgid) ) {
							while( the_repeater_field('learn_more_buttons', $pgid) ) {
								$learn_more_section_button_text = get_sub_field('learn_more_section_button_text');
								$learn_more_section_button_url = get_sub_field('learn_more_section_button_url');
								$earn_more_section_boxes_color = get_sub_field('learn_more_section_boxes_color');
					?>
								<div class="col-5 mb-3">
									<div class="boxbtn <?php echo $earn_more_section_boxes_color;?>">
										<a href="<?php echo $learn_more_section_button_url;?>"><?php echo $learn_more_section_button_text;?> <i class="fas fa-chevron-right pl-2"></i></a>
									</div>
								</div>
					<?php	}
						}
					?>
				</div>
			</div>
		</section>
<?php } elseif($pgid==799){ ?>
		<section class="aboutbody musicM">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-md-12">
						<h2 class="font-weight-semibold mb-3">
							<?php echo get_field('programs_heading',$pgid);?>    
						</h2>
						<div class="font-weight-normal mt-4 mb-4">
							<?php echo get_field('dance_section_content',$pgid);?>
						</div>
					</div>
					
					<?php if(get_field('title_content_repeater', $pgid)){?>
					<div class="col-md-12">
							<?php  while( the_repeater_field('title_content_repeater', $pgid) ) {
									$programs_section_sub_title = get_sub_field('programs_section_sub_title');
									$programs_section_sub_content = get_sub_field('programs_section_sub_content');
							?>
								<h5><?php echo $programs_section_sub_title;?></h5>
								<p><?php echo $programs_section_sub_content;?></p>
					<?php	} ?>
					</div>
					<?php } ?>
					
					<div class="col-md-12 mb-4">
						<p class="font-weight-normal"><?php echo get_field('programs_line_section',$pgid);?></p>
						<a href="<?php echo get_field('program_button_link',$pgid);?>" class="main-btn1"><?php echo get_field('program_button_text',$pgid);?></a>
					</div>
					<?php if(get_field('programs_image_boxes', $pgid)){?>
							<?php  while( the_repeater_field('programs_image_boxes', $pgid) ) {
									$program_image_link = get_sub_field('program_image_link');
									$prg2img = get_sub_field('program_image');
							?>
							<div class="col-md-6 d-flex justify-content-center my-md-5">
								<a href="<?php echo $program_image_link;?>" target="_blank">
        							<img src="<?php echo $prg2img['url']; ?>" alt="<?php echo $prg2img['title']; ?>" class="img-fluid">
        						</a>
        					</div>
					<?php	} 
					    } 
					   ?>
				</div>
			</div>
		</section>
		<section class="aboutbody musicM">
			<?php $dddid=801 ?>
			<div class="container">
				<div class="row align-items-center">
					<div class="col-md-12">
						<h2 class="font-weight-semibold mb-3">
							<?php echo get_field('dance_section_title',$dddid);?>    
						</h2>
						<div class="font-weight-normal mt-4 mb-4">
							<?php echo get_field('dance_section_content',$dddid);?>
						</div>
					</div>
					<div class="col-md-10 mt-5 mb-4 mx-auto text-center">
						<?php $danceimg = get_field('dance_section_image',$dddid); ?>
						<a href="<?php echo get_field('dance_section_image_link',$dddid);?>" target="_blank"><img src="<?php echo $danceimg['url']; ?>" alt="<?php echo $danceimg['title']; ?>" class="img-fluid"></a>
					</div>
				</div>
				<div class="row align-items-center">
					<div class="col-md-12">
						 <div class="mb-3 mt-5">
							<h5><?php echo get_field('extra_mile_section_title',$dddid);?></h5>
							<p class="font-weight-normal mt-4 mb-4">
								<?php echo get_field('extra_mile_section_content',$dddid);?>
							</p>							
						</div>
					</div>
					<div class="col-md-12 mb-4">
						<p class="font-weight-normal"><?php echo get_field('extra_mile_section_line',$dddid);?></p>
						<a href="<?php echo get_field('extra_mile_section_button_url',$dddid);?>" class="main-btn1"><?php echo get_field('extra_mile_section_button_text',$dddid);?></a>
					</div>
					<div class="col-md-12 mt-5 mb-4 mx-auto text-center">						
						<?php $dancesec2img = get_field('extra_mile_section_image',$dddid); ?>
						<a href="<?php echo get_field('extar_mile_section_image_link',$dddid);?>" target="_blank">
							<img src="<?php echo $dancesec2img['url']; ?>" alt="<?php echo $dancesec2img['title']; ?>" class="img-fluid">
						</a>
					</div>
				</div>
			</div>
		</section>
		<!----->
		<section class="aboutbody musicM">
			<?php $mmid=800 ?>
			<div class="container">
				<div class="row align-items-center">
					<div class="col-md-12">
						<h2 class="font-weight-semibold mb-3">
							<?php echo get_field('mm_section_title',$mmid);?>    
						</h2>
						<div class="font-weight-normal mt-4 mb-4">
							<?php echo get_field('music_movement_content',$mmid);?>
						</div>
					</div>
					<div class="col-md-10 mt-5 mb-4 mx-auto text-center">
						<?php $mmimg = get_field('mm_image',$mmid); ?>
						<a href="<?php echo get_field('mm_image_url',$mmid);?>" target="_blank"><img src="<?php echo $mmimg['url']; ?>" alt="<?php echo $mmimg['title']; ?>" class="img-fluid"></a>
					</div>
				</div>
				<div class="row align-items-center">
					<div class="col-md-12">
						 <div class="mb-3 mt-5">
							<h5><?php echo get_field('em_title',$mmid);?></h5>
							<p class="font-weight-normal mt-4 mb-4">
								<?php echo get_field('em_content',$mmid);?>
							</p>							
						</div>
					</div>
					<div class="col-md-12 mb-4">
						<p class="font-weight-normal"><?php echo get_field('em_line',$mmid);?></p>
						<div class="mb-3 mt-4">
							<a href="<?php echo get_field('em_button_link',$mmid);?>" class="main-btn1"><?php echo get_field('em_button_text',$mmid);?></a>
						</div>
					</div>
					<div class="col-md-12 mt-5 mb-4 mx-auto text-center">						
						<?php $mmemimg = get_field('em_image',$mmid); ?>
						<a href="<?php echo get_field('em_image_url',$mmid);?>" target="_blank">
							<img src="<?php echo $mmemimg['url']; ?>" alt="<?php echo $mmemimg['title']; ?>" class="img-fluid">
						</a>
					</div>
				</div>
				<div class="fullbline"></div>
			</div>
		</section>
		<!----->
		<section class="aboutbody musicM">
			<?php $otid=802 ?>
			<div class="container">
				<div class="row align-items-center">
					<div class="col-md-12">
						<h2 class="font-weight-semibold mb-3">
							<?php echo get_field('teachers_section_heading',$otid);?>    
						</h2>
						<div class="font-weight-normal mt-4 mb-4">
							<?php echo get_field('teachers_content',$otid);?>
						</div>
					</div>
					<div class="col-md-12">
					<?php if(get_field('teachers_follow_points', $otid)){?>
							<ul>
							<?php  while( the_repeater_field('teachers_follow_points', $otid) ) {
									$following_points = get_sub_field('following_points');
							?>
								<li><?php echo $following_points;?></li>
					<?php	} ?>
							</ul>
					<?php } ?>
					</div>
					<div class="col-md-12 mb-4">
						<p class="font-weight-normal"><?php echo get_field('teachers_line',$otid);?></p>
						<a href="<?php echo get_field('teachers_button_url',$otid);?>" class="main-btn1"><?php echo get_field('teachers_button_text',$otid);?></a>
					</div>
				</div>
				<div class="fullbline"></div>
			</div>
		</section>
		<!----->
		<section class="aboutbody musicM">
			<?php $prcid=803 ?>
			<div class="container">
				<div class="row align-items-center">
					<div class="col-md-12">
						<h2 class="font-weight-semibold mb-3">
							<?php echo get_field('pricing_section_title',$prcid);?>    
						</h2>
						<div class="font-weight-normal mt-4 mb-4">
							<?php echo get_field('pricing_section_content',$prcid);?>
						</div>
					</div>
				</div>
				<div class="fullbline"></div>
			</div>
		</section>
		<!----->
		<section class="aboutbody musicM">
			<?php $prcid=805 ?>
			<div class="container">
				<div class="row align-items-center">
					<div class="col-md-12">
						<h2 class="font-weight-semibold mb-3">
							<?php echo get_field('next_step_section_title',$prcid);?>    
						</h2>
						<div class="font-weight-normal mt-4 mb-4">
							<?php echo get_field('next_step_section_content',$prcid);?>
						</div>
					</div>
					<div class="col-md-12 mb-4">
						<div class="mb-3 mt-4">
							<a href="<?php echo get_field('next_step_section_button_url',$prcid);?>" class="main-btn1"><?php echo get_field('next_step_section_button_text',$prcid);?></a>
						</div>
					</div>
				</div>
				<div class="fullbline"></div>
			</div>
		</section>
<?php } elseif($pgid==802){ ?>
		<section class="aboutbody musicM">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-md-12">
						<h2 class="font-weight-semibold mb-3">
							<?php echo get_field('teachers_section_heading',$pgid);?>    
						</h2>
						<div class="font-weight-normal mt-4 mb-4">
							<?php echo get_field('teachers_content',$pgid);?>
						</div>
					</div>
					<div class="col-md-12">
					<?php if(get_field('teachers_follow_points', $pgid)){?>
							<ul>
							<?php  while( the_repeater_field('teachers_follow_points', $pgid) ) {
									$following_points = get_sub_field('following_points');
							?>
								<li><?php echo $following_points;?></li>
					<?php	} ?>
							</ul>
					<?php } ?>
					</div>
					<div class="col-md-12 mb-4">
						<p class="font-weight-normal"><?php echo get_field('teachers_line',$pgid);?></p>
						<a href="<?php echo get_field('teachers_button_url',$pgid);?>" class="main-btn1"><?php echo get_field('teachers_button_text',$pgid);?></a>
					</div>
				</div>
				<div class="fullbline"></div>
				<div class="row">
					<div class="col-md-12">
						<h2 class="font-weight-semibold mb-3">
							<?php echo get_field('want_bloom_section',$pgid);?>
						</h2>
						<div class="mb-3">
							<?php echo get_field('want_bloom_section_content',$pgid);?>
						</div>
						<a href="<?php echo get_field('want_bloom_button_url',$pgid);?>" class="main-btn1 ml-0"><?php echo get_field('want_bloom_button_text',$pgid);?></a>
					</div>
				</div>
				<div class="fullbline"></div>
				<div class="row justify-content-around">
					<div class="col-md-12">
						<h2 class="font-weight-semibold mb-5">
							<?php echo get_field('learn_more_title',$pgid);?>
						</h2>
					</div>
					<?php
						if( get_field('learn_more_buttons', $pgid) ) {
							while( the_repeater_field('learn_more_buttons', $pgid) ) {
								$learn_more_section_button_text = get_sub_field('learn_more_section_button_text');
								$learn_more_section_button_url = get_sub_field('learn_more_section_button_url');
								$earn_more_section_boxes_color = get_sub_field('learn_more_section_boxes_color');
					?>
								<div class="col-5 mb-3">
									<div class="boxbtn <?php echo $earn_more_section_boxes_color;?>">
										<a href="<?php echo $learn_more_section_button_url;?>"><?php echo $learn_more_section_button_text;?> <i class="fas fa-chevron-right pl-2"></i></a>
									</div>
								</div>
					<?php	}
						}
					?>
				</div>
			</div>
		</section>
<?php } elseif($pgid==803){ ?>
		<section class="aboutbody musicM">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-md-12">
						<h2 class="font-weight-semibold mb-3">
							<?php echo get_field('pricing_section_title',$pgid);?>    
						</h2>
						<div class="font-weight-normal mt-4 mb-4">
							<?php echo get_field('pricing_section_content',$pgid);?>
						</div>
					</div>
				</div>
				<div class="fullbline"></div>
				<div class="row justify-content-around">
					<div class="col-md-12">
						<h2 class="font-weight-semibold mb-5">
							<?php echo get_field('want_bloom_section',$pgid);?>
						</h2>
					</div>
					<div class="col-md-12 mb-4">
						<p class="font-weight-normal"><?php echo get_field('want_bloom_section_content',$pgid);?></p>
						<div class="mb-3 mt-4">
							<a href="<?php echo get_field('want_bloom_button_url',$pgid);?>" class="main-btn1"><?php echo get_field('want_bloom_button_text',$pgid);?></a>
						</div>
					</div>
				</div>
				<div class="fullbline"></div>
				<div class="row justify-content-around">
					<div class="col-md-12">
						<h2 class="font-weight-semibold mb-5">
							<?php echo get_field('learn_more_title',$pgid);?>
						</h2>
					</div>
					<?php
						if( get_field('learn_more_buttons', $pgid) ) {
							while( the_repeater_field('learn_more_buttons', $pgid) ) {
								$learn_more_section_button_text = get_sub_field('learn_more_section_button_text');
								$learn_more_section_button_url = get_sub_field('learn_more_section_button_url');
								$earn_more_section_boxes_color = get_sub_field('learn_more_section_boxes_color');
					?>
								<div class="col-5 mb-3">
									<div class="boxbtn <?php echo $earn_more_section_boxes_color;?>">
										<a href="<?php echo $learn_more_section_button_url;?>"><?php echo $learn_more_section_button_text;?> <i class="fas fa-chevron-right pl-2"></i></a>
									</div>
								</div>
					<?php	}
						}
					?>
				</div>
			</div>
		</section>
<?php } else { ?>
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
<?php } ?>
<?php
get_footer();