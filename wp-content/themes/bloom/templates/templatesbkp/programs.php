<?php 
/* Template Name: Programs Template */
get_header();
    $pgid = get_the_ID();
?>
<section class="common-header">
    <h1 class="text-white"><?php the_title();?></h1>
</section>
<section class="aboutbody musicM">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-12">
                <h2 class="font-weight-semibold mb-3">
                    <?php echo get_field('programs_title',$pgid);?>    
                </h2>
                <div class="font-weight-normal mt-4 mb-4">
                    <?php echo get_field('programs_content',$pgid);?>
                </div>

                <div class="font-weight-normal mt-4 mb-4 d-flex align-items-center">
                    <p><?php echo get_field('programs_line',$pgid);?></p>
                    <a href="<?php echo get_field('programs_button_link',$pgid);?>" class="main-btn1 ml-3 mb-4"><?php echo get_field('programs_button_text',$pgid);?></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 d-flex justify-content-center my-md-5">
                <?php $prgmbsimg1 = get_field('programs_image1',$pgid); ?>
                <a href="<?php echo get_field('programs_image1_link',$pgid);?>">
                    <img src="<?php echo $prgmbsimg1['url']; ?>" alt="<?php echo $prgmbsimg1['title']; ?>">
                </a>
            </div>
            <div class="col-md-6 d-flex justify-content-center my-md-5">
                <?php $prgmbsimg2 = get_field('programs_image2',$pgid); ?>
                <a href="<?php echo get_field('programs_image1_link',$pgid);?>">
                    <img src="<?php echo $prgmbsimg2['url']; ?>" alt="<?php echo $prgmbsimg2['title']; ?>">
                </a>
            </div>
        </div>
        <div class="row align-items-center">
            <?php
				$args_programs = array(  
						'post_type' => 'programs',
						'post_status' => 'publish',
						'posts_per_page' => 3, 
						'orderby' => 'title', 
						'order' => 'DESC', 
					);
				$loop_programs = get_posts($args_programs);
				/*echo "<pre>";
				print_r($loop_programs);
				echo $loop_programs[0]->post_name;*/
				foreach($loop_programs as $lpgram){
				    //echo"<pre>";
				    //print_r($lpgram);
				}
			?>
        </div>
    </div>
</section>
<?php
get_footer();
