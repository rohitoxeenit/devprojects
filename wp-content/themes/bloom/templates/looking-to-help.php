<?php 
/* Template Name: Looking To Help Page */
get_header();
    $pgid = get_the_ID();
?>
<section class="common-header">
    <h1 class="text-white"><?php echo get_field( "looking_to_help_sub_heading_title", $pgid);?></h1>
    <h5 class="text-white"><?php echo get_field( "looking_to_help_sub_heading_content", $pgid);?></h5>
</section>

<div class="top-breadcrub py-3">
    <div class="container">
        <p> <a href="<?php echo get_home_url(); ?>">Home</a> > <?php the_title();?></p>  
    </div>
</div>

<section class="iambody">
    <div class="container">
	<?php
		if( get_field('looking_to_help_sections', $pgid) ) {
			while( the_repeater_field('looking_to_help_sections', $pgid) ) {
				$looking_to_help_section_title = get_sub_field('looking_to_help_section_title');
				$looking_to_help_image = get_sub_field('looking_to_help_image');
				$looking_to_help_section_content = get_sub_field('looking_to_help_section_content');
				$button_text = get_sub_field('button_text');
				$button_link = get_sub_field('button_link');
	?>
		<div class="row iambox">
            <div class="col-md-8">
                <h2 class="mb-2"><?php echo $looking_to_help_section_title; ?></h2>
                <div class="font-weight-normal"><?php echo $looking_to_help_section_content; ?></div>
                <a href="<?php echo $button_link; ?>" class="main-btn1 ml-0 mt-4"><?php echo $button_text; ?></a>
            </div>
            <div class="col-md-4">
                <img src="<?php echo $looking_to_help_image['url']; ?>" alt="<?php echo $looking_to_help_imagess['title']; ?>">
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
