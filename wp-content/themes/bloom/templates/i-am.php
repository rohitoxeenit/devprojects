<?php 
/* Template Name: I Am Page */
get_header();

    $pgid = get_the_ID();
?>
<section class="common-header">
    <h1 class="text-white"><?php echo get_field( "sub_header_breadcrumb_title", $pgid);?></h1>
    <h5 class="text-white"><?php echo get_field( "sub_header_breadcrumb_content", $pgid);?></h5>
</section>

<div class="top-breadcrub py-3">
    <div class="container">
        <p> <a href="<?php echo get_home_url(); ?>">Home</a> > <?php the_title();?></p>
    </div>
</div>
<section class="iambody">
    <div class="container">
	<?php
		if( get_field('i_am_fields_sections', $pgid) ) {
			while( the_repeater_field('i_am_fields_sections', $pgid) ) {
				$section_heading = get_sub_field('section_heading');
				$section_image = get_sub_field('section_image');
				$section_image_text = get_sub_field('section_image_text');
				$section_content = get_sub_field('section_content');
				$section_link_to_pagepost = get_sub_field('section_link_to_pagepost');
	?>
				<div class="row iambox">
					<div class="col-md-8">
						<h2 class="mb-2"><a href="<?php echo $section_link_to_pagepost;?>" target="_blank"><?php echo $section_heading;?></a></h2>
						<h4 class="font-weight-normal"><?php echo $section_content;?></h4>
					</div>
					<div class="col-md-4">
						<div class="text-center">
							<a href="<?php echo $section_link_to_pagepost;?>" target="_blank"><img src="<?php echo $section_image['url']; ?>" alt="<?php echo $section_image['title']; ?>"></a>
							<a href="<?php echo $section_link_to_pagepost;?>" target="_blank" class="boxlink"><?php echo $section_image_text;?></a>
						</div>
					</div>
				</div>
				<div class="fullbline"></div>
	<?php		}
		}
	?>
	</div>
</section>
<div class="container">
    <p>Questions?  <a href="<?php echo get_site_url(); ?>/contact/" class="text-underline font-weight-semibold">Contact us</a></p>
</div>


<?php
get_footer();
