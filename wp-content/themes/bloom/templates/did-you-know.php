<?php 
/* Template Name: Did You Know Page */
get_header();
    $pgid = get_the_ID();
?>
<style>
    .common_btn {width: 140px;}
     h4 p {margin-bottom: 2rem;}
</style>

<section class="common-header">
    <h1 class="text-white"><?php echo get_field('heading_section',$pgid);?></h1>
    <h4 class="text-white"><?php echo get_field('sub_heading_section',$pgid);?></h4>
</section>
<section class="studentpbody">
    <div class="container">
        <div class="row tabstyle1 align-items-center">
            <h2 class="font-weight-semibold"><?php echo get_field('did_you_know_content_heading',$pgid);?></h2>
            <div class="mt-4 mb-4">
				<ul>
                <?php
					if( get_field('did_you_know_content_section', $pgid) ) {
						while( the_repeater_field('did_you_know_content_section', $pgid) ) {
							$did_you_know_content = get_sub_field('did_you_know_content');
				?>
						<li><?php echo $did_you_know_content;?></li>
				<?php		}
					}
				?>
				</ul>
            </div>
        </div>
    </div>
</section>
<?php
get_footer();
