<?php 
/* Template Name: An Educator Page */
get_header();
    $pgid = get_the_ID();
?>

<section class="common-header">
    <h1 class="text-white"><?php the_title(); ?></h1>
    <h5 class="text-white"><?php echo get_field('lets_partner_breadcrumb_content',$pgid);?></h5>
</section>

<div class="top-breadcrub py-3">
    <div class="container">
        <p> <a href="<?php echo get_home_url(); ?>">Home</a> > <?php the_title(); ?></p>
    </div>
</div>
<section class="eneducatorbody py-5">
    <div class="container">
        <div class="row">
			<div class="col-md-2 pr-4">
				<nav id="list" class="flex-column scroll-div">
                    <a class="nav-link active" href="#programsTab"><?php echo get_field('program_tab_tile',$pgid);?></a>
                    <a class="nav-link" href="#musicmTab"><?php echo get_field('music_&_movement_title',$pgid);?></a>
                    <a class="nav-link" href="#danceTab"><?php echo get_field('dance_tab_section_title',$pgid);?></a>
                    <a class="nav-link" href="#teachersTab"><?php echo get_field('teachers_title',$pgid);?></a>
                    <a class="nav-link" href="#pricingTab"><?php echo get_field('pricing_title',$pgid);?></a>
                    <a class="nav-link" href="#nextsTab"><?php echo get_field('next_steps_title',$pgid);?></a>
                </nav>
			</div>
			<div class="col-md-9 pl-4 border-left">
				<div  data-spy="scroll" data-target="#list" data-offset="270" class="scrollspy">
                    <div class="ed-tab" id="programsTab">
                        <h2 class="font-weight-semibold mb-3 mt-5"><?php echo get_field('program_tab_tile',$pgid);?></h2>
                        <div class="pb-4">
                            <!--<h5 class="font-weight-semibold mb-2">Who We Serve</h5>
                            <h5 class="font-weight-normal">All Children! We bring expert teachers to schools and youth organizations (onsite or remote).</h5>-->
                            <?php echo get_field('program_tab_content',$pgid);?>
                        </div>
                        <div class="d-flex align-items-center">
                            <h5 class="font-weight-normal">Ready to take the next step? </h5>
                            <a href="#" class="main-btn1">LET’S CHAT</a>
                        </div>
                        <div class="row pt-5 mt-4 mb-4">
                            <div class="col-md-6 pr-5">
                                <?php $prog_tabimg1 = get_field('program_tab_image_1',$pgid); ?>
                                <a href="<?php echo get_field('program_tab_image_1_link',$pgid);?>">
                                    <img src="<?php echo $prog_tabimg1['url']; ?>" alt="<?php echo $prog_tabimg1['title']; ?>" class="w-100">
                                </a>
                            </div>
                            <div class="col-md-6 pl-5">
                                <?php $prog_tabimg1 = get_field('program_tab_image_2',$pgid); ?>
                                <a href="<?php echo get_field('program_tab_image_2_link',$pgid);?>">
                                    <img src="<?php echo $prog_tabimg1['url']; ?>" alt="<?php echo $prog_tabimg1['title']; ?>" class="w-100">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="ed-tab" id="musicmTab">
                        <h2 class="font-weight-semibold mb-3 mt-5"><?php echo get_field('music_&_movement_title',$pgid);?></h2>
                        <?php echo get_field('music_&_movement_content_section_1',$pgid);?>
                        <?php echo get_field('music_&_movement_content_section_2',$pgid);?>
                        <?php echo get_field('music_&_movement_content_section_3',$pgid);?> <span> <a href="<?php echo get_field('music_&_movement_button_link',$pgid);?>" class="common_btn "><?php echo get_field('music_&_movement_button_title',$pgid);?></a></span>
                        <?php $music_tabimg1 = get_field('music_&_movement_image',$pgid); ?>
                        <div class="mt-5">
                            <img src="<?php echo $music_tabimg1['url']; ?>" alt="<?php echo $music_tabimg1['title']; ?>" class="w-100">
                        </div>
                        <!-- <h5 class="font-weight-normal mb-4"><span class="font-weight-semibold">Musical Genres:</span>Jazz, Classical, Folk from around the world, West African, Brazilian, Mexican, Mariachi, Peruvian, American, Cuban, Caribbean and more.  We will introduce students to as many genres as possible to expose their bodies and minds to new sounds, beats, rhythms, languages, and modes of expression.</h5>  
                        <h5 class="font-weight-normal"><span class="font-weight-semibold">Instruments </span> (varies by grade level): Drums, recorders, ukuleles, rhythm sticks, shakers, bells, scarves</h5>-->
                    </div>
                    <div class="ed-tab" id="danceTab">
                        <h2 class="font-weight-semibold mb-3 mt-5"><?php echo get_field('dance_tab_section_title',$pgid);?></h2>
                        <div class="font-weight-normal mb-4"><?php echo get_field('dance_section_1_content',$pgid);?></div>
                        <div class="font-weight-normal mb-4"><?php echo get_field('dance_section_2_content',$pgid);?></div>
                        <div class="font-weight-normal mb-4"><?php echo get_field('dance_section_3_content',$pgid);?> <span> <a href="<?php echo get_field('dance_section_button_link',$pgid);?>" class="common_btn "><?php echo get_field('dance_section_button',$pgid);?></a></span></div>
                        <?php $dance_tabimg1 = get_field('dance_section_image',$pgid); ?>
                        <div class="mt-5">
                            <img src="<?php echo $dance_tabimg1['url']; ?>" alt="<?php echo $dance_tabimg1['title']; ?>" class="w-100">
                        </div>
                    </div>
                    <div class="ed-tab" id="teachersTab">
                        <h2 class="font-weight-semibold mb-3 mt-5"><?php echo get_field('teachers_title',$pgid);?></h2>
                        <div class="font-weight-normal mb-4"><?php echo get_field('teacher_content',$pgid);?> <span> <a href="<?php echo get_field('teachers_button_link',$pgid);?>" class="common_btn "><?php echo get_field('teachers_button',$pgid);?></a></span></div>
                        
                    </div>
                    <div class="ed-tab" id="pricingTab">
                        <h2 class="font-weight-semibold mb-3 mt-5"><?php echo get_field('pricing_title',$pgid);?></h2>
                        <div class="font-weight-normal mb-4"><?php echo get_field('pricing_content',$pgid);?></div>
                            <!--<h5 class="font-weight-normal mb-4">Since arts equity is our primary goal, we focus on removing the cost barrier that prevents students from accessing an arts education.</h5>
                            <h5 class="font-weight-normal mb-4">For schools that have arts funding we offer sliding scale pricing to stay within their budget.</h5>
                            <h5 class="font-weight-normal mb-4">For schools in underprivileged communities with little or no funding, we use gifts from our generous donors to deliver the same high-quality arts education program.</h5>
                            <h5 class="font-weight-normal mb-4">Thanks to our donors, volunteers, educators, parents and communities who believe in the power of the arts, we are able to serve all students.  Reach out to us and we will find a way to bring the joy of music and dance into your community.</h5>-->
                    </div>
                    <div class="ed-tab" id="nextsTab">
                        <h2 class="font-weight-semibold mb-3 mt-5"><?php echo get_field('next_steps_title',$pgid);?></h2>
                        <div class="font-weight-normal mb-4"><?php echo get_field('next_steps_content',$pgid);?></div>
                        <a href="<?php echo get_field('next_steps_button_link',$pgid);?>" class="common_btn"><?php echo get_field('next_steps_button_title',$pgid);?></a>
                        <!--<h2 class="font-weight-semibold mb-3">Next Steps</h2>
                        <h5 class="font-weight-normal">Want Bloom at your school? Or just want to learn more?  We would love to chat and get to know your needs and goals for your school or organization.</h5>
                        <a href="#" class="main-btn1 ml-0 mt-5">LET’S CHAT</a>-->
                    </div>
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


