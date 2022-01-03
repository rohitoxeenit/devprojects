<?php 
/* Template Name: Partner Inquiry Form Template */
get_header();
    $pgid = get_the_ID();
    
global $wpdb;
$prefix = $wpdb->prefix;
$sql = "SELECT  * from  states";
$result = $wpdb->get_results($sql);
?>
<style>
     .emsg{color: red;}
     .emsg1{color: red;}
     .emsg2{color: red; font-size:12px;}
     .hidden {visibility:hidden;}
</style>

<section class="common-header">
    <h1 class="text-white"><?php the_title();?></h1>
</section>
<section class="studentpbody">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-12 mt-4 mb-4 text-center">
                <h2 class="text-center"><?php echo get_field('heading_field',$pgid);?> </h2>
				<p class="text-center"><?php echo get_field('content_field',$pgid);?> </p>
            </div>
        </div>
    </div>
</section>
<section class="cbody mt-4 mb-4">
    <div class="container">
	
       <form role="form" action="#" method="post" id="partner-inquiry-form" novalidate>
            <div class="row align-items-start mt-4 mb-4">
                <div class="col-md-6 mt-4 mb-4">
                    <div class="form-group">
                        <label for="firstname">First Name<span>*</span></label>
                        <input type="text" class="form-control" id="firstname" name="firstname" required-data='true' onkeypress="return (event.charCode > 64 && 
	event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" autocomplete="off">
                        <!--<p><span class="emsg hidden">Please Enter a Valid Name</span></p>-->
                    </div>
                </div>
                <div class="col-md-6 mt-4 mb-4">
                    <div class="form-group">
                        <label for="lastname">Last Name<span>*</span></label>
                        <input type="text" class="form-control" id="lastname" name="lastname"  required-data='true' onkeypress="return (event.charCode > 64 && 
	event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" autocomplete="off">
                        <!--<p><span class="emsg1 hidden">Please Enter a Valid Last Name</span></p>-->
                    </div>
                </div>
                <div class="col-md-6 mt-4 mb-4">
                    <div class="form-group">
                        <label for="emailid">Email<span>*</span></label>
                        <input type="email" class="form-control" id="emailid" name="emailid" required-data='true' autocomplete="off">
                        <p><span class="emsg2 hidden">Please Enter a Valid Email</span></p>
                    </div>
                </div>
                <div class="col-md-6 mt-4 mb-4">
                    <div class="form-group">
                        <label for="phone">Phone<span>*</span></label>
                        <input type="text" class="form-control numbervalidation" id="phone" name="phone" maxlength="10" required-data='true' autocomplete="off">
                    </div>
                </div>
                <div class="col-md-6 mt-4 mb-4">
                    <div class="form-group">
                        <label for="schorg">Name of school/organization<span>*</span></label>
                        <input type="text" class="form-control" id="schorg" name="organization" required-data='true' autocomplete="off">
                    </div>
                </div>
            </div>
            <div class="row align-items-center mt-4 mb-4">
                <div class="col-md-6 mt-4 mb-4">
                    <div class="form-group">
                        <label for="city">City<span>*</span></label>
                        <input type="text" class="form-control" id="city" name="city" required-data='true' autocomplete="off">
                    </div>
                </div>
                <div class="col-md-3 mt-4 mb-4">
                    <div class="form-group">
                        <label for="state">State<span>*</span></label>
                        <select name="state" id="state" class="form-control" name="state" required-data='true'> 
                            <option value="">--Select--</option>
                            <?php foreach($result as $value){?>
                            <option value="<?php echo  $value->name;?>"><?php echo  $value->name;?></option>
                            <?php } ?>
                            
                        </select>
                    </div>
                </div>
                <div class="col-md-3 mt-4 mb-4">
                    <div class="form-group">
                        <label for="zipcode">Zipcode<span>*</span></label>
                        <input type="text" class="form-control" id="zipcode" name="zipcode" required-data='true' autocomplete="off">
                    </div>
                </div>
                <div class="col-md-6 mt-4 mb-4">
                    <div class="form-group">
                        <label for="city">Age of kids/grades served<span>*</span></label>
                        <input type="text" class="form-control" id="ageofkids" name="ageofkids" required-data='true' autocomplete="off">
                    </div>
                </div>
                <div class="col-md-12 mt-4 mb-4">
                    <div class="form-group">
                        <label for="instrdin">What program(s) are you interested in? (select all that apply)</label>
                        <div class="fullbox">
                            <input type="checkbox"  class="instrdin"  value="Music & Movement" name="programintrested[]"> Music & Movement
                        </div>
                        <div class="fullbox">
                            <input type="checkbox"  class="instrdin"  value="Dance" name="programintrested[]"> Dance
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mt-4 mb-4">
                    <div class="form-group">
                        <label for="learninglookfor">What type of learning are you looking for? </label>
                        <div class="fullbox">
                            <input type="radio"  id="learninglookfor" name="typeof_learning"  value="In-person"> In-person
                        </div>
                        <div class="fullbox">
                            <input type="radio"  id="learninglookfor" name="typeof_learning" value="Remote"> Remote
                        </div>
                        <div class="fullbox">
                            <input type="radio"  id="learninglookfor" name="typeof_learning"  value="Other"> Other  <span class="seprate"><input type="text" class="" id="inputInterestTeachingOther" name="inputInterestTeachingOther" value=""></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mt-4 mb-4">
                    <div class="form-group">
                        <label for="liketocontracted">How would you like to be contacted?</label>
                        <div class="fullbox">
                            <input type="checkbox"  class="liketocontracted" name="liketocontracted[]" value="Email"> Email
                        </div>
                        <div class="fullbox">
                            <input type="checkbox"  class="liketocontracted"  name="liketocontracted[]" value="Phone Call"> Phone Call
                        </div>
                        <div class="fullbox">
                            <input type="checkbox"  class="liketocontracted"   name="liketocontracted[]" value="Text">  Text
                        </div>
                        <div class="fullbox">
                            <input type="checkbox" id="liketocontracted" class="liketocontracted"   name="liketocontracted[]" value="No preference"> No preference
                        </div>
                    </div>
                </div>
            </div>
            <div class="row align-items-center mt-4 mb-4">
                <div class="col-md-12 mt-4 mb-4">
                    <div class="form-group">
                        <label for="messagebox">Anything else you’d like us to know? (optional)</label>
                        <textarea class="form-control" id="messagebox" rows="8"  name="message" autocomplete="off"></textarea>
                    </div>
                </div>
            </div>
            <div class="row align-items-center mt-4 mb-4">
                <div class="col-md-12 mt-4 mb-4 text-center">
                   <input  type="submit" class="common_btn ml-0" name="partner_submit" value="Submit">
                </div>
            </div>
        </form>
    </div>
</section>
<?php
get_footer();
