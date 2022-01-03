<?php 
/* Template Name: Contact Page */
get_header();
    $pgid = get_the_ID();
?>
<style>
    .common_btn {width: 140px;}
     h4 p {
    margin-bottom: 2rem;
}
</style>

<section class="common-header">
    <h1 class="text-white"><?php the_title();?></h1>
</section>
<section class="cbody mb-4">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-12">
                <h2 class="font-weight-semibold mb-4 mt-5">
                    <?php echo get_field('title',$pgid);?>    
                </h2>
                <div class="font-weight-normal mt-4 mb-4">
                    <?php echo get_field('content',$pgid);?>
                </div>
                <a href="<?php echo get_field('button_url',$pgid);?>" class="common_btn"><?php echo get_field('button_text',$pgid);?></a>
            </div>
        </div>
    </div>
</section>
<section class="cbody mt-4 mb-4">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-12">
                <h2 class="font-weight-semibold mb-4 mt-5">
                    <?php echo get_field('form_title',$pgid);?>    
                </h2>
                <div class="font-weight-normal mt-4 mb-4">
                    <?php echo get_field('form_content',$pgid);?>
                </div>
            </div>
        </div>
        <form>
            <div class="row align-items-center mt-4 mb-4">
                <div class="col-md-6 mt-4 mb-4">
                    <div class="form-group">
                        <label for="firstname">First Name<span>*</span></label>
                        <input type="text" class="form-control" id="firstname" aria-describedby="firstname">
                    </div>
                </div>
                <div class="col-md-6 mt-4 mb-4">
                    <div class="form-group">
                        <label for="lastname">Last Name<span>*</span></label>
                        <input type="text" class="form-control" id="lastname" aria-describedby="lastname">
                    </div>
                </div>
                <div class="col-md-6 mt-4 mb-4">
                    <div class="form-group">
                        <label for="emailid">Email<span>*</span></label>
                        <input type="text" class="form-control" id="emailid" aria-describedby="emailid">
                    </div>
                </div>
                <div class="col-md-6 mt-4 mb-4">
                    <div class="form-group">
                        <label for="phone">Phone<span>*</span></label>
                        <input type="text" class="form-control" id="phone" aria-describedby="phone">
                    </div>
                </div>
            </div>
            <div class="row align-items-center mt-4 mb-4">
                <div class="col-md-6 mt-4 mb-4">
                    <div class="form-group">
                        <label for="schoolorg">School/Organization<span>*</span></label>
                        <input type="text" class="form-control" id="schoolorg" aria-describedby="schoolorg">
                    </div>
                </div>
            </div>
            <div class="row align-items-center mt-4 mb-4">
                <div class="col-md-6 mt-4 mb-4">
                    <div class="form-group">
                        <label for="topicinst">Topic/Interest<span>*</span></label>
                        <select name="topicinst" id="topicinst" class="form-control">
                            <option value="">--Select--</option>
                            <optio value="1">School Partnership</optio>
                            <optio value="2">Programs</optio>
                            <optio value="3">Donate</optio>
                            <optio value="4">Share Your Experience</optio>
                            <optio value="5">Volunteer</optio>
                            <optio value="6">Jobs</optio>
                            <optio value="7">Press</optio>
                            <optio value="8">Other</optio>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row align-items-center mt-4 mb-4">
                <div class="col-md-12 mt-4 mb-4">
                    <div class="form-group">
                        <label for="messagebox">Message<span>*</span></label>
                        <textarea class="form-control" id="messagebox" aria-describedby="messagebox" rows="8" ></textarea>
                    </div>
                </div>
            </div>
            <div class="row align-items-center mt-4 mb-4">
                <div class="col-md-6 mt-4 mb-4">
                    <div class="form-inline">
                        <label for="attachments">Add Attachment:  </label> 
                        <input type="file" class="form-control" id="attachments" aria-describedby="attachments">
                    </div>
                </div>
            </div>
            <div class="row align-items-center mt-4 mb-4">
                <div class="col-md-4 mt-4 mb-4">
                    <button type="submit" class="common_btn">Submit</button>
                </div>
            </div>
        </form>
    </div>
</section>
<section class="cbody mt-4 mb-4">
    <div class="container">
        <div class="row align-items-center mt-4 mb-4">
            <div class="col-md-6 mt-4 mb-4">
                <?php echo get_field('address_line:_1',$pgid);?>
                <?php echo get_field('address_line:_2',$pgid);?>
                <?php echo get_field('email_id',$pgid);?>
                <?php echo get_field('phone_number',$pgid);?>
            </div>
            <div class="col-md-6 mt-4 mb-4">
                <?php echo get_field('map_iframe',$pgid);?>
            </div>
        </div>
    </div>
</section>
<?php
get_footer();