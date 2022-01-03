<?php 
/* Template Name: Contact Page */
get_header();
    $pgid = get_the_ID();
?>
<style>
    .common_btn {width: 140px;}
     h4 p {margin-bottom: 2rem;}
     .emsg{color: red;}
     .emsg1{color: red;}
     .emsg2{color: red; font-size:12px;}
     .hidden {visibility:hidden;}
</style>

<section class="common-header">
    <h1 class="text-white"><?php the_title();?></h1>
</section>
<section class="cbody contact-formb mb-md-5">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-12">
                <h2 class="font-weight-semibold mb-4 mt-5">
                    <?php echo get_field('title',$pgid);?>    
                </h2>
                <div class="font-weight-normal mt-md-3 mb-4">
                    <?php echo get_field('content',$pgid);?>
                </div>
                <a href="<?php echo get_field('button_url',$pgid);?>" class="common_btn ml-0"><?php echo get_field('button_text',$pgid);?></a>
            </div>
        </div>
    </div>
</section>

<div class="fullbline"></div>

<section class="cbody mt-md-5 mb-md-4">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-12">
                <h2 class="font-weight-semibold mb-md-4 mt-5">
                    <?php echo get_field('form_title',$pgid);?>    
                </h2>
                <h4 class="font-weight-normal mt-md-3 mb-md-4">
                    <?php echo get_field('form_content',$pgid);?>
                </h4>
            </div>
        </div>

        <div class="alert alert-success" role="alert" id="msg-box" style="display:none;">
        Your information has been added successfully.
        </div>
        <form role="form" action="#" method="post" id="contact-form" enctype="multipart/form-data">
            <div class="row align-items-start justify-content-center mt-2 mb-4">
                <div class="col-md-6 mt-md-3 mb-md-3">
                    <div class="form-group">
                        <label class="h4" for="firstname">First Name<span>*</span></label class="h4">
                        <input type="text" name="firstname" class="form-control" id="firstname" placeholder="firstname" onkeypress="return (event.charCode > 64 && 
	event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" required-data='true' autocomplete="off">
                        <!--<p><span class="emsg hidden">Please Enter a Valid Name</span></p>-->
                    </div>
                </div>
                <div class="col-md-6 mt-md-3 mb-md-3">
                    <div class="form-group">
                        <label class="h4" for="lastname">Last Name<span>*</span></label class="h4">
                        <input type="text" name="lastname" class="form-control" id="lastname" placeholder="lastname" onkeypress="return (event.charCode > 64 && 
	event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" required-data='true' autocomplete="off">
                        <!--<p><span class="emsg1 hidden">Please Enter a Valid Last Name</span></p>-->
                    </div>
                </div>
                <div class="col-md-6 mt-md-3 mb-md-3">
                    <div class="form-group">
                        <label class="h4" for="emailid">Email<span>*</span></label class="h4">
                        <input type="email" name="emailid" class="form-control" id="emailid" placeholder="Email Id" required-data='true' autocomplete="off">
                        <p><span class="emsg2 hidden">Please Enter a Valid Email</span></p>
                        
                    </div>
                </div>
                <div class="col-md-6 mt-md-3 mb-md-3">
                    <div class="form-group">
                        <label class="h4" for="phone">Phone<span>*</span></label class="h4">
                        <input type="text" class="form-control numbervalidation" id="phone" name="phone" maxlength="10" required-data="true" autocomplete="off">
                    </div>
                </div>
                <div class="col-md-6 mt-md-3 mb-md-3">
                    <div class="form-group">
                        <label class="h4" for="schoolorg">School/Organization<span>*</span></label class="h4">
                        <input type="text" name="schoolorg" class="form-control" id="schoolorg" placeholder="schoolorg" required-data='true' autocomplete="off">
                    </div>
                </div>
                <div class="col-md-6 mt-md-3 mb-md-3">
                    <div class="form-group">
                        <label class="h4" for="topicinst">Topic/Interest<span>*</span></label class="h4">
                        <select name="topicinst" id="topicinst" class="form-control" required-data=true>
                            <option value="">--Select--</option>
                            <option value="School Partnership">School Partnership</optio>
                            <option value="Programs">Programs</optio>
                            <option value="Donate">Donate</optio>
                            <option value="Share Your Experience">Share Your Experience</optio>
                            <option value="Volunteer">Volunteer</optio>
                            <option value="Jobs">Jobs</optio>
                            <option value="Press">Press</optio>
                            <option value="Other">Other</optio>
                        </select>
                    </div>
                </div>
                <div class="col-md-12 mt-md-3 mb-md-3">
                    <div class="form-group">
                        <label class="h4" for="messagebox">Message<span>*</span></label class="h4">
                        <textarea class="form-control" name="messagebox" id="messagebox" placeholder="messagebox" rows="8" required-data='true' autocomplete="off"></textarea>
                    </div>
                </div>
                <div class="col-md-12 mt-md-3 mb-md-3">
                    <div class="form-inline">
                        <label class="h4" for="attachments">Add Attachment:  </label class="h4"> 
                        <input type="file" name="file" class="form-control" id="attachments" placeholder="attachments">
                        <span id="imageextension" style="display:none;" class="error-image">
						    Sorry, invalid extension. Please upload  only these extension gif, png, jpg, jpeg, pdf</span>                        
						<span id="imagefsize"  class="error-image" style="display:none;">File size too large! Please upload less than 1MB</span>
                    </div>
                </div>
                <div class="col-md-12 mt-md-3 mb-md-3 py-5 text-center">
                    <input  type="submit" class="common_btn" name="contact_submit" value="Submit">
                </div>
            </div>
        </form>
    </div>
</section>
<section class="cbody mt-4 mb-4">
    <div class="container">
        <div class="row align-items-center mt-md-3 mb-md-4">
            <div class="col-md-6 mt-md-3 mb-md-4">
                <?php echo get_field('address_line:_1',$pgid);?>
                <?php echo get_field('address_line:_2',$pgid);?>
                <?php echo get_field('email_id',$pgid);?>
                <?php echo get_field('phone_number',$pgid);?>
            </div>
            <div class="col-md-6 mt-md-3 mb-md-4">
                <?php echo get_field('map_iframe',$pgid);?>
            </div>
        </div>
    </div>
</section>
<?php
get_footer();