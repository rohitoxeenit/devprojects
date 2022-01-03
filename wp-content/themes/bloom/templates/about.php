<?php 
/* Template Name: About Page */
get_header();
    $pgid = get_the_ID();
?>
<section class="common-header">
    <h1 class="text-white"><?php the_title();?></h1>
</section>
<section class="aboutbody  mt-5 mb-4" id="whatwedo">
    <div class="container">
        <div class="row  mt-5 mb-4 align-items-center">
            <div class="col-md-9">
                <h2 class="font-weight-semibold mb-3">
                    <?php echo get_field('heading',$pgid);?>    
                </h2>
                <div class="font-weight-normal mb-4">
                    <?php echo get_field('what_we_do_section_content',$pgid);?>
                </div>
            </div>
            <div class="col-md-3">
                <?php $wdsimg = get_field('image',$pgid); ?>
                <img src="<?php echo $wdsimg['url']; ?>" alt="<?php echo $wdsimg['title']; ?>" class="img-fluid">
            </div>
		</div>
		<div class="row align-items-center mt-3 mb-3">
            <div class="col-md-12">
                <h4 class="font-weight-semibold mb-3">
                    <?php echo get_field('help_section_heading',$pgid);?>
                </h4>
                <div class="mt-4 mb-4">
					<ul>
					<?php
						if( get_field('help_content', $pgid) ) {
							while( the_repeater_field('help_content', $pgid) ) {
								$bullet_point = get_sub_field('bullet_point');
								echo '<li>'.$bullet_point.'</li>';
							}
						}
					?>
					</ul>
                </div>
            </div>
        </div>
        <div class="fullbline"></div>
        <div class="row   mt-5 mb-4" id="whywedoit">
            <div class="col-md-9">
                <h2 class="font-weight-semibold mb-3">
                    <?php echo get_field('arts_section_title',$pgid);?>
                </h2>
                <div class="font-weight-normal mb-4">
                    <?php echo get_field('arts_content_section',$pgid);?>
                </div>
                <a href="<?php echo get_field('arts_section_button_url',$pgid);?>" class="common_btn"><?php echo get_field('arts_section_button_text',$pgid);?></a>
            </div>
            <div class="col-md-3">
                <?php $artssimg = get_field('arts_section_image',$pgid); ?>
                <img src="<?php echo $artssimg['url']; ?>" alt="<?php echo $artssimg['title']; ?>">
            </div>
        </div>
        <div class="fullbline"></div>
        <div class="row  mt-5 mb-4" id="ourimpact">
            <div class="col-md-12">
                <h2 class="font-weight-semibold mb-3">
                    <?php echo get_field('impact_section_heading',$pgid);?>
                </h2>
                <div class="font-weight-normal mb-4">
                    <?php echo get_field('impact_section_content',$pgid);?>
                </div>
                <div class="col-md-9 mx-auto">
                    <div class="imgmiddlebox">
                        <?php $imptsimg = get_field('impact_section_image',$pgid); ?>
                        <img src="<?php echo $imptsimg['url']; ?>" class="img-fluid" alt="<?php echo $imptsimg['title']; ?>">
                        <div class="imgcontnentmbox">
                            <?php echo get_field('impact_image_content',$pgid);?>
                        </div>
                    </div>
                </div>    
            </div>
        </div>
        <div class="row aboutl">
            <div class="col-md-12">
                <h4 class="font-weight-semibold mb-3">
                    <?php echo get_field('location_section_heading',$pgid);?>
                </h4>
                <div class="font-weight-normal mb-4">
                    <ul>
					<?php
						if( get_field('multiple_locations_fields', $pgid) ) {
							while( the_repeater_field('multiple_locations_fields', $pgid) ) {
								$location_text = get_sub_field('location_text');
								echo '<li>'.$location_text.'</li>';
							}
						}
					?>
					</ul>
                </div>
                <div class="pt-5 pb-4 w-90 mx-auto">
                    <?php echo get_field('location_mapiframe',$pgid); ?>
                </div>
            </div>
        </div>
        <div class="fullbline"></div>
        <div class="row  mt-5 mb-4" id="background">
            <div class="col-md-12">
                <h2 class="font-weight-semibold mb-3">
                    <?php echo get_field('location_background_heading',$pgid);?>
                </h2>
                <div class="font-weight-normal mb-4">
                    <?php echo get_field('location_background_content',$pgid);?>
                </div>
            </div>
        </div>
        <div class="fullbline"></div>
        <!--Two Big Boxes section below--->
        <div class="row justify-content-around">
            <div class="col-md-12">
                <h2 class="font-weight-semibold mb-3">
                    <?php echo get_field('learn_more_heading',$pgid);?>
                </h2>
            </div>
			<?php
				if( get_field('buttons_boxes', $pgid) ) {
					while( the_repeater_field('buttons_boxes', $pgid) ) {
						$button_text = get_sub_field('button_text');
						$button_url = get_sub_field('button_url');
						$box_color = get_sub_field('box_color');
			?>
						<div class="col-5 mb-3 mt-5">
							<div class="boxbtn <?php echo $box_color;?>">
								<a href="<?php if(empty($button_url)){echo '#';}else{echo $button_url;}?>"><?php echo $button_text;?> <i class="fas fa-chevron-right pl-2"></i></a>
							</div>
						</div>
			<?php		}
				}
			?>
        </div>
    </div>
</section>

<div class="container">
    <p>Questions?  <a href="<?php echo get_site_url(); ?>/contact/" class="text-underline font-weight-semibold">Contact us</a></p>
</div>

<?php
get_footer();
