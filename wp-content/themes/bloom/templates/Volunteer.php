<?php 
/* Template Name: Volunteer Form Template */
get_header();
    $pgid = get_the_ID();
?>
<style>
     .emsg{color: red;}
     .emsg1{color: red;}
     .emsg2{color: red;}
     .hidden {visibility:hidden;}
</style>

<section class="common-header">
    <h1 class="text-white"><?php the_title();?></h1>
</section>
<section class="studentpbody">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-12 mt-4 mb-4">
                <h2 class="font-weight-semibold mb-4"><?php echo get_field('volunteer_form_heading',$pgid);?> </h2>
				<h4 class="fw-400"><?php echo get_field('volunteer_form_content',$pgid);?> </h4>
            </div>
        </div>
    </div>
</section>
<section class="cbody mt-4 mb-4">
    <div class="container">
	<div class="alert alert-success" role="alert" id="msg-box" style="display:none;">
		Your information has been added successfully.Admin can contact shortly as soon as possible !
	</div>
       <form role="form" action="#" method="post" id="volunteer-form" novalidate>
            <div class="row align-items-center mt-4 mb-4">
                <div class="col-md-6 mt-4 mb-4">
                    <div class="form-group">
                        <label class="h4" for="firstname">First Name<span>*</span></label>
                        <input type="text" class="form-control" id="firstname"  name="firstname" required-data='true'>
                        <p><span class="emsg hidden">Please Enter a Valid Name</span></p>
                    </div>
                </div>
                <div class="col-md-6 mt-4 mb-4">
                    <div class="form-group">
                        <label class="h4" for="lastname">Last Name<span>*</span></label>
                        <input type="text" class="form-control" id="lastname" name="lastname"  required-data='true'>
                        <p><span class="emsg1 hidden">Please Enter a Valid Last Name</span></p>
                    </div>
                </div>
                <div class="col-md-6 mt-4 mb-4">
                    <div class="form-group">
                        <label class="h4" for="emailid">Email<span>*</span></label>
                        <input type="email" class="form-control" id="emailid"  name="emailid" required-data='true'>
                        <p><span class="emsg2 hidden">Please Enter a Valid Email</span></p>
                    </div>
                </div>
                <div class="col-md-6 mt-4 mb-4">
                    <div class="form-group">
                        <label class="h4" for="phone">Phone<span>*</span></label>
                        <input type="text" class="form-control numbervalidation" id="phone" name="phone" maxlength="10" required-data='true'>
                    </div>
                </div>
                <div class="col-md-12 mt-4 mb-4">
                    <div class="form-group">
                        <label class="h4" for="intrest">Interests (select all that apply)</label>
                        <div class="fullbox mb-4">
                            <input type="checkbox"  class="intrest"  name="Interests[]" value="Writing grant applications"> Writing grant applications
                        </div>
                        <div class="fullbox mb-4">
                            <input type="checkbox"  class="intrest"  name="Interests[]" value="Photography/videography"> Photography/videography
                        </div>
                        <div class="fullbox mb-4">
                            <input type="checkbox"  class="intrest"  name="Interests[]" value="Work with students"> Work with students
                        </div>
                        <div class="fullbox mb-4">
                            <input type="checkbox"  class="intrest"  name="Interests[]" value="Events"> Events
                        </div>
                        <div class="fullbox mb-4">
                            <input type="checkbox"  class="intrest"  name="Interests[]" value="Office work"> Office work
                        </div>
                        <div class="fullbox mb-4">
                            <input type="checkbox"  id="intrest" class="intrest" name="Interests[]" value="Other"> Other  <span class="seprate">
							<input type="text"  id="inputInterestTeachingOther" name="other_Interests" value=""></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mt-4 mb-4">
                    <div class="form-group">
                        <label class="h4" for="lookingvolunteer">How often are you looking to volunteer? </label>
                        <div class="fullbox mb-4">
                            <input type="radio"  class="lookingvolunteer" name="lookingvolunteer"  value="One-time"> One-time
                        </div>
                        <div class="fullbox mb-4">
                            <input type="radio"  class="lookingvolunteer" name="lookingvolunteer"  value="Regularly"> Regularly
                        </div>
                        <div class="fullbox mb-4">
                            <input type="radio"  class="lookingvolunteer" name="lookingvolunteer"  value="Whenever I can"> Whenever I can
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mt-4 mb-4">
                    <div class="form-group">
                        <label class="h4" for="liketovolunteer">When would you like to volunteer? (select all that apply)</label>
                        <div class="fullbox mb-4">
                            <input type="checkbox"  class="liketovolunteer" name="liketovolunteer[]" value="Weekdays only"> Weekdays only
                        </div>
                        <div class="fullbox mb-4">
                            <input type="checkbox"  class="liketovolunteer"  name="liketovolunteer[]" value="Weekends only"> Weekends only
                        </div>
                        <div class="fullbox mb-4">
                            <input type="checkbox"  class="liketovolunteer"  name="liketovolunteer[]" value="Work with students"> Work with students
                        </div>
                        <div class="fullbox mb-4">
                            <input type="checkbox"  class="liketovolunteer"  name="liketovolunteer[]" value="During the day"> During the day
                        </div>
                        <div class="fullbox mb-4">
                            <input type="checkbox"  class="liketovolunteer"  name="liketovolunteer[]" value="Evenings"> Evenings
                        </div>
                        <div class="fullbox mb-4">
                            <input type="checkbox"  class="liketovolunteer"  name="liketovolunteer[]" value="Anytime"> Anytime
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mt-4 mb-4">
                <div class="col-md-12 mt-4 mb-4 text-center">
                    <input  type="submit" class="common_btn ml-0" name="volunteer_submit" value="Submit">
                </div>
            </div>
        </form>
    </div>
</section>
<?php
get_footer();
