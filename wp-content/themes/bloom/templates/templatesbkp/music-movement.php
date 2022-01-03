<?php 
/* Template Name: Music & Movement Template */
get_header();
    $pgid = get_the_ID();
?>
<section class="common-header">
    <h1 class="text-white"><?php the_title();?></h1>
</section>
<div class="top-breadcrub py-3">
    <div class="container">
        <p> <a href="<?php echo get_home_url(); ?>">Home</a> > <?php the_title();?></p>  
    </div>
</div>
<section class="aboutbody musicM">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-12">
                <h2 class="font-weight-semibold mb-3">
                    <?php echo get_field('section_1_title',$pgid);?>    
                </h2>
                <div class="font-weight-normal mt-4 mb-4">
                    <?php echo get_field('section1_content',$pgid);?>
                </div>
            </div>
            <div class="col-md-10 mt-5 mb-4 mx-auto">
                <?php $mmimg = get_field('section1_image',$pgid); ?>
                <img src="<?php echo $mmimg['url']; ?>" alt="<?php echo $mmimg['title']; ?>" class="img-fluid">
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-md-12">
                 <div class="mb-3">
                    <?php echo get_field('section2_content',$pgid);?>
                </div>
            </div>
        </div>
        <div class="fullbline"></div>
        <div class="row">
            <div class="col-md-12 mb-4">
                <h2 class="font-weight-semibold mb-3">
                    <?php echo get_field('section2_title',$pgid);?>
                </h2>
                <div class="font-weight-normal mb-4">
                    <?php echo get_field('section_below_title_content',$pgid);?>
                </div>
                <a href="<?php echo get_field('section2_button_link',$pgid);?>" class="main-btn1 ml-0"><?php echo get_field('section2_button_text',$pgid);?></a>
            </div>
        </div>
        <div class="fullbline"></div>
        <div class="row justify-content-around">
            <div class="col-md-12">
                <h2 class="font-weight-semibold mb-5">
                    <?php echo get_field('section3_title',$pgid);?>
                </h2>
            </div>
            <div class="col-5 mb-3">
                <div class="boxbtn boxbtn_lf_purple">
                    <a href="<?php echo get_field('section3_box1_link',$pgid);?>"><?php echo get_field('section3_box1_title',$pgid);?> <i class="fas fa-chevron-right pl-2"></i></a>
                </div>
            </div>
            <div class="col-5 mb-3">
                <div class="boxbtn boxbtn_rg_green">
                    <a href="<?php echo get_field('section3_box2_link',$pgid);?>"><?php echo get_field('section3_box2_title',$pgid);?> <i class="fas fa-chevron-right pl-2"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
get_footer();
