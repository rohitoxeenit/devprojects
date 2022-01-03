<?php 
/* Template Name: Student Partner Page */
get_header();
    $pgid = get_the_ID();
?>
<style>
    .common_btn{width: 140px;}
     h4 p{margin-bottom: 2rem;}
</style>
<section class="common-header">
    <h1 class="text-white"><?php echo get_field('heading_title',$pgid);?></h1>
    <h4 class="text-white"><?php echo get_field('sub_heading_title',$pgid);?></h4>
</section>
<div class="top-breadcrub py-3">
    <div class="container">
        <p> <a href="<?php echo get_home_url(); ?>">Home</a> > <?php the_title();?></p>  
    </div>
</div>

<section class="studentpbody">
    <div class="container">
        <div class="row tabstyle1 align-items-center">
            <div class="col-md-9">
                <h2 class="font-weight-semibold mb-4"><?php echo get_field('arts_tab_heading',$pgid);?></h2>
                <h4 class="font-weight-normal mb-4 pt-2"><?php echo get_field('arts_tab_content',$pgid);?></h4>
                <div class="mt-4 mb-4 mt-4 mb-4 d-flex align-items-center">
                    <span><?php echo get_field('arts_tab_line',$pgid);?></span><a href="<?php echo get_field('arts_tab_button_url',$pgid);?>" class="common_btn"><?php echo get_field('arts_tab_button_text',$pgid);?></a>
                </div>
            </div>
            <div class="col-md-3">
                <?php $psartsimg = get_field('arts_tab_image',$pgid); ?>
                <img src="<?php echo $psartsimg['url']; ?>" alt="<?php echo $psartsimg['title']; ?>">
            </div>
        </div>  
        <div class="fullbline"></div>
        <!--Programs section below--->
        <div class="row tabstyle1">
            <div class="col-md-10">
                <h2 class="font-weight-semibold mb-4"><?php echo get_field('heading_of_program',$pgid);?></h2>
                <div class="font-weight-normal mb-4 pt-2">
					<?php
						if( get_field('program_section_title_&_content', $pgid) ) {
							while( the_repeater_field('program_section_title_&_content', $pgid) ) {
								$program_title = get_sub_field('program_title');
								$program_content = get_sub_field('program_content');
									echo '<h4 class="font-weight-semibold">'.$program_title.'</h4>';
									echo '<p class="font-weight-normal">'.$program_content.'</p>';
								}
							}
					?>
				</div>
                <div class="mt-4 mb-5">
					<span><?php echo get_field('program_section_line',$pgid);?></span>	<a href="<?php echo get_field('program_section_button_url',$pgid);?>" class="common_btn py-2"><?php echo get_field('program_section_button_title',$pgid);?></a>
                </div>
            </div>
			<?php
				if( get_field('image_boxes', $pgid) ) {
					while( the_repeater_field('image_boxes', $pgid) ) {
						$program_section_image = get_sub_field('program_section_image');
						$image_link = get_sub_field('image_link');
			?>	
						<div class="col-6 d-flex justify-content-center my-md-5">
							<a href="<?php echo $image_link;?>">
								<img src="<?php echo $program_section_image['url']; ?>" alt="<?php echo $program_section_image['title']; ?>">
							</a>
						</div>
			<?php			}
					}
			?>
        </div>
        <div class="fullbline"></div>
        <!--Our Teachers section below--->
        <div class="row tabstyle1">
            <div class="col-md-10">
                <h2 class="font-weight-semibold mb-4"><?php echo get_field('our_teachers_heading',$pgid);?></h2>
                <div class="font-weight-normal mb-4 bottom-space"><?php echo get_field('our_teachers_content',$pgid);?></div>
				<div class="font-weight-normal mb-4 bottom-space">
					<ul>
					<?php
						if( get_field('required_points', $pgid) ) {
							while( the_repeater_field('required_points', $pgid) ) {
								$points = get_sub_field('points');
									echo '<li>'.$points.'</li>';
								}
							}
					?>
					</ul>
				</div>
            </div>            
        </div>
    </div>
</section>

<div class="container">
    <p>Questions?  <a href="<?php echo get_site_url(); ?>/contact/" class="text-underline font-weight-semibold">Contact us</a></p>
</div>

<?php
get_footer();
