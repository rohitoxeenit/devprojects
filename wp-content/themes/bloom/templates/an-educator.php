<?php 
/* Template Name: An Educator Page */
get_header();
$pgid = get_the_ID();
?>
<section class="common-header">
    <h1 class="text-white"><?php echo get_field('educator_heading',$pgid);?></h1>
    <h5 class="text-white"><?php echo get_field('educator_sub-heading',$pgid);?></h5>
</section>

<div class="top-breadcrub py-3 en-edu-b">
    <div class="container">
        <p> <a href="<?php echo get_home_url(); ?>">Home</a> > <?php the_title(); ?></p>
    </div>
</div>
<section class="eneducatorbody py-5">
    <div class="container">
        <div class="row">
			<div class="col-lg-2 pr-4">
		            <nav id="list" class="flex-column scroll-div">
                    <a class="nav-link active" href="javascript:;" id="tab1"><span>Programs</span></a>
                    <a class="nav-link" href="javascript:;" id="tab2"><span>Music & Movement</span></a>
                    <a class="nav-link" href="javascript:;" id="tab3"><span>Dance</span></a>
                    <a class="nav-link" href="javascript:;" id="tab4"><span>Our Teachers</span></a>
                    <a class="nav-link" href="javascript:;" id="tab5"><span>Pricing</span></a>
                    <a class="nav-link" href="javascript:;" id="tab6"><span>Next Step</span></a>
                </nav>
			</div>
			<div class="col-lg-9 pl-lg-4 border-lg-left">
				<div  data-spy="scroll" data-target="#list" data-offset="270" class="scrollspy">
                    <div class="ed-tab" id="programsTab">
						<?php $program_id= 799; ?>
							<h2 class="font-weight-semibold mb-3 mt-2"><?php echo get_post_meta( $program_id, 'programs_heading', true );?></h2>
						<?php while( the_repeater_field('title_content_repeater', $program_id) ) { ?>
							<div class="pb-4">
								<h5 class="font-weight-semibold mb-2"><?php echo get_sub_field('programs_section_sub_title'); ?></h5>
								<p class="font-weight-normal"><?php echo get_sub_field('programs_section_sub_content');?></p>
							</div>
                        <?php } ?>
							<div class="d-flex align-items-center">
								<p class="font-weight-normal"><?php echo get_post_meta( $program_id, 'programs_line_section', true );?></p>
								<a href="<?php echo get_post_meta( $program_id, 'program_button_link', true );?>" class="main-btn1"><?php echo get_post_meta( $program_id, 'program_button_text', true );?></a>
							</div>
							<div class="row pt-5 mt-4 mb-4">
							<?php while(the_repeater_field('programs_image_boxes', $program_id)){ ?>
									<div class="col-md-6 pr-5">
										<?php $prog_tabimg = get_field('program_image',$program_id); ?>
										<a href="<?php echo get_field('program_image_link',$program_id);?>">
											<img src="<?php echo $prog_tabimg['url']; ?>" alt="<?php echo $prog_tabimg['title']; ?>" class="w-100">
										</a>
									</div>
							<?php } ?>
							</div>
							<div class="fullbline"></div>
                    </div>
                    <div class="ed-tab" id="musicmTab">
                        <?php $musicmove_id= 800; ?>
						<div class="row pt-5 mt-4 mb-4">
							<h2 class="font-weight-semibold mb-3 mt-5"><?php echo get_field('mm_section_title',$musicmove_id);?></h2>
							<p class="font-weight-normal"><?php echo get_field('music_movement_content',$musicmove_id);?></p>
							<div class="d-flex align-items-center">
								<?php $imgbox_mm = get_field('mm_image',$musicmove_id); ?>
								<a href="<?php echo get_field('mm_image_url',$musicmove_id);?>" target="_blank"><img src="<?php echo $imgbox_mm['url']?>" alt="<?php echo $imgbox_mm['title']?>" class="w-100"></a>
							</div>
						</div>
						<div class="row pt-5 mt-3 mb-3">
							<h5 class="font-weight-semibold mb-3 mt-5"><?php echo get_field('em_title',$musicmove_id);?></h5>
							<p class="font-weight-normal"><?php echo get_field('em_content',$musicmove_id);?></p>
							<div class="mt-4 mb-4">
								<span><?php echo get_field('em_line',$musicmove_id);?></span><a href="<?php echo get_field('em_button_link',$musicmove_id);?>" class="common_btn"><?php echo get_field('em_button_text',$musicmove_id);?></a>
							</div>
							<div class="d-flex align-items-center mt-4 mb-4">
								<?php $imgbox_em = get_field('em_image',$musicmove_id); ?>
								<a href="<?php echo get_field('em_image_url',$musicmove_id);?>" target="_blank">
									<img src="<?php echo $imgbox_em['url']?>" alt="<?php echo $imgbox_em['title']?>" class="w-100">
								</a>
							</div>							
						</div>
						<div class="fullbline"></div>
                    </div>
                    <div class="ed-tab" id="danceTab">
                        <?php $dance_id= 801; ?>
						<div class="row pt-5 mt-4 mb-4">
							<h2 class="font-weight-semibold mb-3 mt-5"><?php echo get_field('dance_section_title',$dance_id);?></h2>
							<p class="font-weight-normal"><?php echo get_field('dance_section_content',$dance_id);?></p>
							<div class="d-flex align-items-center mt-4 mb-4">
								<?php $imgbox_dance = get_field('dance_section_image',$dance_id); ?>
								<a href="<?php echo get_field('dance_section_image_link',$dance_id);?>" target="_blank"><img src="<?php echo $imgbox_dance['url']?>" alt="<?php echo $imgbox_dance['title']?>" class="w-100"></a>
							</div>
						</div>
						<div class="row pt-5 mt-3 mb-3">
							<h5 class="font-weight-semibold mb-3 mt-5"><?php echo get_field('extra_mile_section_title',$dance_id);?></h5>
							<p class="font-weight-normal"><?php echo get_field('extra_mile_section_content',$dance_id);?></p>
							<div class="mt-4 mb-4">
								<span><?php echo get_field('extra_mile_section_line',$dance_id);?></span><a href="<?php echo get_field('extra_mile_section_button_url',$dance_id);?>" class="common_btn"><?php echo get_field('extra_mile_section_button_text',$dance_id);?></a>
							</div>
							<div class="d-flex align-items-center mt-4 mb-4">
								<?php $imgbox_danceem = get_field('extra_mile_section_image',$dance_id); ?>
								<a href="<?php echo get_field('extar_mile_section_image_link',$dance_id);?>" target="_blank">
									<img src="<?php echo $imgbox_danceem['url']?>" alt="<?php echo $imgbox_danceem['title']?>" class="w-100">
								</a>
							</div>							
						</div>
						<div class="fullbline"></div>
                    </div>
                    <div class="ed-tab" id="teachersTab">
                        <?php $ourteachers_id= 802; ?>
						<div class="row pt-5 mt-4 mb-4">
							<h2 class="font-weight-semibold mb-3 mt-5"><?php echo get_field('teachers_section_heading',$ourteachers_id);?></h2>
							<p class="font-weight-normal"><?php echo get_field('teachers_content',$ourteachers_id);?></p>
							<?php if( get_field('teachers_follow_points', $ourteachers_id) ) { ?>
								<div class="mt-2 mb-4">
									<ul>
									<?php while( the_repeater_field('teachers_follow_points', $ourteachers_id) ) {
											$following_points = get_sub_field('following_points');?>
											<li><?php echo $following_points;?></li>
									<?php } ?>
									</ul>
								</div>
							<?php } ?>
							<div class="mt-4 mb-4">
								<span><?php echo get_field('teachers_line',$ourteachers_id);?></span><a href="<?php echo get_field('teachers_button_url',$ourteachers_id);?>" class="common_btn"><?php echo get_field('teachers_button_text',$ourteachers_id);?></a>
							</div>							
						</div>
						<div class="fullbline"></div>
                    </div>
                    <div class="ed-tab" id="pricingTab">
                        <?php $pricing_id= 803; ?>
						<div class="row pt-5 mt-4 mb-4">
							<h2 class="font-weight-semibold mb-3 mt-5"><?php echo get_field('pricing_section_title',$pricing_id);?></h2>
							<p class="font-weight-normal"><?php echo get_field('pricing_section_content',$pricing_id);?></p>
						</div>
						<div class="fullbline"></div>
                    </div>
                    <div class="ed-tab" id="nextsTab">
                        <?php $nextstep_id= 805; ?>
						<div class="row pt-5 mt-4 mb-4">
							<h2 class="font-weight-semibold mb-3 mt-5"><?php echo get_field('next_step_section_title',$nextstep_id);?></h2>
							<p class="font-weight-normal"><?php echo get_field('next_step_section_content',$nextstep_id);?></p>
							<div class="mt-4 mb-4">
								<a href="<?php echo get_field('next_step_section_button_url',$nextstep_id);?>" class="common_btn"><?php echo get_field('next_step_section_button_text',$nextstep_id);?></a>
							</div>
						</div>
                    </div>
			    </div>
			</div>
		</div>
    </div>
</section>

<div class="container">
    <p>Questions?  <a href="<?php echo site_url()?>/contact" class="text-underline font-weight-semibold">Contact us</a></p>
</div>

<?php
get_footer();


