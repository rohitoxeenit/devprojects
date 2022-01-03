<?php
/**
 * Template Name: Teacher Application Form
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Bloom
 * @since Bloom 1.0
 */
get_header();
?>
<?php $pgid = get_the_ID();?>

<style>
     .emsg{color: red;}
     .emsg1{color: red;}
     .emsg2{color: red; font-size:12px;}
     .hidden {visibility:hidden;}
</style>
	<section class="h-join-now text-justify">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2 class="big-text main-color2 text-center mb-3"><?php the_title(); ?></h2>
				</div>
			</div>
		</div>
    </section>
	<section class="h-hi-work my-5">
        <div class="container">
            <h2 class="font-weight-semibold mb-4"><?php echo get_field('teacher_application_form_heading',$pgid);?></h2> 
            <h4 class="fw-400"><?php echo get_field('teacher_application_form_content',$pgid);?></h4> 
            <div class="alert alert-success" role="alert" id="msg-box" style="display:none;">
	        Your information has been added successfully.
	        </div>
			<form role="form" action="" method="post" id="teacher-form" enctype="multipart/form-data">
				<div class="row pt-5">
                	<div class="col-md-6">
					  <div class="form-group">
						<label class="h4" for="inputFirstName">First Name <span>*</span></label class="h4">
						<input type="text" class="form-control" name="inputFirstName" id="inputFirstName" required-data='true' onkeypress="return (event.charCode > 64 && 
	event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" autocomplete="off">
						<!--<p><span class="emsg hidden">Please Enter a Valid Name</span></p>-->
					  </div>
					</div>
					<div class="col-md-6">
					  <div class="form-group">
						<label class="h4" for="inputLastName">Last Name <span>*</span></label class="h4">
						<input type="text" class="form-control" name="inputLastName" id="inputLastName" required-data='true' onkeypress="return (event.charCode > 64 && 
	event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" autocomplete="off">
						<!--<p><span class="emsg1 hidden">Please Enter a Valid Last Name</span></p>-->
					  </div>
					 </div>
					 <div class="col-md-6">
					  <div class="form-group">
						<label class="h4" for="inputEmail1">Email<span>*</span></label class="h4">
						<input type="email" class="form-control" id="inputEmail1" name="inputEmail1" required-data='true' autocomplete="off">
						<p><span class="emsg2 hidden">Please Enter a Valid Email</span></p>
					  </div>
					 </div>
					 <div class="col-md-6">
					  <div class="form-group">
						<label class="h4" for="inputPhone">Phone<span>*</span></label class="h4">
						<input type="text" class="form-control numbervalidation" name="inputPhone" id="inputPhone" maxlength="10" required-data='true' autocomplete="off">
						
					  </div>
					 </div>
					 <div class="col-md-12 mt-4 mb-4">
					  <div class="form-group">
						<label class="h4" for="inputInterestTeaching">What are you interested in teaching? (select all that apply)</label class="h4">
						<div class="chkbox mb-4">
							<input type="checkbox" class="" id="inputInterestTeaching" name="inputInterestTeaching[]" value="Music & Movement"> Music & Movement
						</div>
						<div class="chkbox mb-4">
							<input type="checkbox" class="" id="inputInterestTeaching" name="inputInterestTeaching[]" value="Dance"> Dance
						</div>
						<div class="chkbox mb-4">
							<input type="checkbox" class="" id="inputInterestTeaching" name="inputInterestTeaching[]" value="Curriculum Development"> Curriculum Development
						</div>
						<div class="chkbox mb-4">
							<input type="checkbox" class="" id="inputInterestTeaching" name="inputInterestTeaching[]" value="Grant Writing"> Grant Writing
						</div>
						<div class="chkbox mb-4">
							<input type="checkbox" class="teacher" id="inputInterestTeaching" name="inputInterestTeaching[]" value="Other"> Other <span class="seprate"><input type="text" class="" id="inputInterestTeachingOther" name="inputInterestTeachingOther" value=""></span>
						</div>
					  </div>
					 </div>
					 <div class="col-md-12 mt-4 mb-4">
					  <div class="form-group">
						<label class="h4" for="inputInterestAgeRange">what age range are you interested in teaching? (select all that apply)</label class="h4">
						<div class="chkbox mb-4">
							<input type="checkbox" class="" id="inputInterestAgeRange" name="inputInterestAgeRange[]" value="TK - 6th Grade"> TK - 6th Grade
						</div>
						<div class="chkbox mb-4">
							<input type="checkbox" class="" id="inputInterestAgeRange" name="inputInterestAgeRange[]" value="7th Grade - 12th Grade"> 7th Grade - 12th Grade
						</div>
					  </div>
					 </div>
					 <div class="col-md-12 mt-4 mb-4">
					  <div class="form-group">
						<label class="h4" for="inputJobLooking">What type of job are you looking for?(Select all that apply)</label class="h4">
						<div class="chkbox mb-4">
							<input type="checkbox" class="" id="inputJobLooking" name="inputJobLooking[]" value="In-person"> In-person
						</div>
						<div class="chkbox mb-4">
							<input type="checkbox" class="" id="inputJobLooking" name="inputJobLooking[]" value="Remote"> Remote
						</div>
						<div class="chkbox mb-4">
							<input type="checkbox" class="" id="inputJobLooking" name="inputJobLooking[]" value="Part time"> Part time
						</div>
						<div class="chkbox mb-4">
							<input type="checkbox" class="" id="inputJobLooking" name="inputJobLooking[]" value="Full time">Full time
						</div>
						<div class="chkbox mb-4">
							<input type="checkbox" class="job" id="inputJobLooking" name="inputJobLooking" value="Other"> Other <span class="seprate"><input type="text" class="" id="inputJobLookingOther" name="inputJobLookingOther" value=""></span>
						</div>
					  </div>
					 </div>
					 <div class="col-md-12 mt-4 mb-4">
					  <div class="form-group overflow-hidden">
						<label class="h4" for="inputResume">Upload your resume<span>*</span></label class="h4">
						<input type="file" class="" name="file" id="inputResume" name="inputResume" required-data='true'>
						<span id="imageextension" style="display:none;" class="error-image">
						    Sorry, invalid extension. Please upload  only these extension gif, png, jpg, jpeg, pdf</span>                        
						<span id="imagefsize"  class="error-image" style="display:none;">File size too large! Please upload less than 1MB</span>
						<span id="fileselect"  class="error-fileup" style="display:none;">Please Select/Upload File First</span>
					  </div>
					 </div>
					 <div class="col-md-12 text-center">
					     <input  type="submit" class="main-btn1 ml-0" name="teacher_submit" value="Submit">
						<!--<button type="submit" class="main-btn1" name="teacher_submit" value="Submit">Submit</button>-->
					</div>
				</div>
			</form>
			</div>
		<!-- </div> -->
	</section>
<?php
get_footer();
