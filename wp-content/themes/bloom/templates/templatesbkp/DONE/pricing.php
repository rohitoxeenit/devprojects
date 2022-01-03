<?php 
/* Template Name: Pricing Template */
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
                    <?php echo get_field('pricing_title',$pgid);?>    
                </h2>
                <div class="font-weight-normal mt-4">
                    <?php echo get_field('pricing_content',$pgid);?>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="fullbline"></div>
<section class="aboutbody musicM">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-12">
                <h2 class="font-weight-semibold mb-3">
                    <?php echo get_field('section2_title',$pgid);?>    
                </h2>
                <div class="font-weight-normal mt-4 mb-4">
                    <?php echo get_field('section2_content',$pgid);?>
                </div>
            </div>
            <div class="col-md-12 mb-4">
                <a href="<?php echo get_field('button_link',$pgid);?>" class="main-btn1 ml-0"><?php echo get_field('button_text',$pgid);?></a>
            </div>
        </div>
        <div class="fullbline"></div>
        <div class="row justify-content-around">
            <div class="col-md-12">
                <h2 class="font-weight-semibold mb-5">
                    <?php echo get_field('bottom_title',$pgid);?>
                </h2>
            </div>
            <div class="col-5 mb-3">
                <div class="boxbtn boxbtn_lf">
                    <a href="<?php echo get_field('box1_link',$pgid);?>"><?php echo get_field('box1_text',$pgid);?> <i class="fas fa-chevron-right pl-2"></i></a>
                </div>
            </div>
            <div class="col-5 mb-3">
                <div class="boxbtn boxbtn_lf_purple">
                    <a href="<?php echo get_field('box2_link',$pgid);?>"><?php echo get_field('box2_title',$pgid);?> <i class="fas fa-chevron-right pl-2"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
