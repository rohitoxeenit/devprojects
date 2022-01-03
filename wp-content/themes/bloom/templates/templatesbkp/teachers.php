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
            <?php the_content(); ?>
			<form action="" method="POST">
				<div class="row pt-5">
                	<div class="col-md-6">
					  <div class="form-group">
						<label for="inputFirstName">First Name <span>*</span></label>
						<input type="text" class="form-control" id="inputFirstName">
					  </div>
					</div>
					<div class="col-md-6">
					  <div class="form-group">
						<label for="inputLastName">Last Name <span>*</span></label>
						<input type="text" class="form-control" id="inputLastName">
					  </div>
					 </div>
					 <div class="col-md-6">
					  <div class="form-group">
						<label for="inputEmail1">Email<span>*</span></label>
						<input type="email" class="form-control" id="inputEmail1" name="inputEmail1">
					  </div>
					 </div>
					 <div class="col-md-6">
					  <div class="form-group">
						<label for="inputPhone">Phone<span>*</span></label>
						<input type="email" class="form-control" id="inputPhone" name="inputPhone">
					  </div>
					 </div>
					 <div class="col-md-12">
					  <div class="form-group">
						<label for="inputInterestTeaching">What are you interested in teaching? (select all that apply)</label>
						<div class="chkbox">
							<input type="checkbox" class="" id="inputInterestTeaching" name="inputInterestTeaching" value="music-&-movement"> Music & Movement
						</div>
						<div class="chkbox">
							<input type="checkbox" class="" id="inputInterestTeaching" name="inputInterestTeaching" value="dance"> Dance
						</div>
						<div class="chkbox">
							<input type="checkbox" class="" id="inputInterestTeaching" name="inputInterestTeaching" value="curriculum-development"> Curriculum Development
						</div>
						<div class="chkbox">
							<input type="checkbox" class="" id="inputInterestTeaching" name="inputInterestTeaching" value="grant-writing"> Grant Writing
						</div>
						<div class="chkbox">
							<input type="checkbox" class="" id="inputInterestTeaching" name="inputInterestTeaching" value="Other"> Other <span class="seprate">_____________</span>
						</div>
					  </div>
					 </div>
					 <div class="col-md-12">
					  <div class="form-group">
						<label for="inputInterestAgeRange">what age range are you interested in teaching? (select all that apply)</label>
						<div class="chkbox">
							<input type="checkbox" class="" id="inputInterestAgeRange" name="inputInterestAgeRange" value="tk-6th-grade"> TK - 6th Grade
						</div>
						<div class="chkbox">
							<input type="checkbox" class="" id="inputInterestAgeRange" name="inputInterestAgeRange" value="7th-grade-12th-grade"> 7th Grade - 12th Grade
						</div>
					  </div>
					 </div>
					 <div class="col-md-12">
					  <div class="form-group">
						<label for="inputJobLooking">What type of job are you looking for?(Select all that apply)</label>
						<div class="chkbox">
							<input type="checkbox" class="" id="inputJobLooking" name="inputJobLooking" value="in-person"> In-person
						</div>
						<div class="chkbox">
							<input type="checkbox" class="" id="inputJobLooking" name="inputJobLooking" value="remote"> Remote
						</div>
						<div class="chkbox">
							<input type="checkbox" class="" id="inputJobLooking" name="inputJobLooking" value="part-time"> Part time
						</div>
						<div class="chkbox">
							<input type="checkbox" class="" id="inputJobLooking" name="inputJobLooking" value="full-time">Full time
						</div>
						<div class="chkbox">
							<input type="checkbox" class="" id="inputJobLooking" name="inputJobLooking" value="Other"> Other <span class="seprate">_____________</span>
						</div>
					  </div>
					 </div>
					 <div class="col-md-12">
					  <div class="form-group">
						<label for="inputResume">Upload your resume<span>*</span></label>
						<input type="file" class="" id="inputResume" name="inputResume">
					  </div>
					 </div>
					 <div class="col-md-4 offset-4  text-center">
						<button type="submit" class="main-btn1">Submit</button>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php
get_footer();
