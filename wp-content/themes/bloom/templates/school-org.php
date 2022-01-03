<?php 
/* Template Name: School Inquiry Template */
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
<section class="studentpbody">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-12 mt-4 mb-4 text-partnersPay">
                <h2><?php echo get_field('heading_field',$pgid);?> </h2>
				<p><?php echo get_field('content_field',$pgid);?> </p>
            </div>
        </div>
    </div>
</section>
<section class="cbody mt-4 mb-4">
    <div class="container">
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
                <div class="col-md-6 mt-4 mb-4">
                    <div class="form-group">
                        <label for="schorg">Name of school/organization<span>*</span></label>
                        <input type="text" class="form-control" id="schorg" aria-describedby="schorg">
                    </div>
                </div>
            </div>
            <div class="row align-items-center mt-4 mb-4">
                <div class="col-md-6 mt-4 mb-4">
                    <div class="form-group">
                        <label for="city">City<span>*</span></label>
                        <input type="text" class="form-control" id="city" aria-describedby="city">
                    </div>
                </div>
                <div class="col-md-3 mt-4 mb-4">
                    <div class="form-group">
                        <label for="state">State<span>*</span></label>
                        <select name="state" id="state" class="form-control">
                            <option value="">--Select--</option>
                            <option value="1">Ambala</option>
                            <option value="2">Delhi</option>
                            <option value="3">Chandigarh</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3 mt-4 mb-4">
                    <div class="form-group">
                        <label for="zipcode">Zipcode<span>*</span></label>
                        <input type="text" class="form-control" id="zipcode" aria-describedby="zipcode">
                    </div>
                </div>
                <div class="col-md-6 mt-4 mb-4">
                    <div class="form-group">
                        <label for="city">Age of kids/grades served<span>*</span></label>
                        <input type="text" class="form-control" id="city" aria-describedby="city">
                    </div>
                </div>
                <div class="col-md-12 mt-4 mb-4">
                    <div class="form-group">
                        <label for="instrdin">What program(s) are you interested in? (select all that apply)</label>
                        <div class="fullbox">
                            <input type="checkbox"  id="instrdin" aria-describedby="instrdin" aria-describedby="instrdin" value="music-&-movement"> Music & Movement
                        </div>
                        <div class="fullbox">
                            <input type="checkbox"  id="instrdin" aria-describedby="instrdin" aria-describedby="instrdin" value="dance"> Dance
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mt-4 mb-4">
                    <div class="form-group">
                        <label for="learninglookfor">What type of learning are you looking for? </label>
                        <div class="fullbox">
                            <input type="radio"  id="learninglookfor" name="learninglookfor" aria-describedby="learninglookfor" value="in-person"> In-person
                        </div>
                        <div class="fullbox">
                            <input type="radio"  id="learninglookfor" name="learninglookfor" aria-describedby="learninglookfor" aria-describedby="learninglookfor" value="remote"> Remote
                        </div>
                        <div class="fullbox">
                            <input type="radio"  id="learninglookfor" name="learninglookfor" aria-describedby="learninglookfor" aria-describedby="learninglookfor" value="Other"> Other  <span class="seprate"><input type="text" class="" id="inputInterestTeachingOther" name="inputInterestTeachingOther" value=""></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mt-4 mb-4">
                    <div class="form-group">
                        <label for="liketocontracted">How would you like to be contacted?</label>
                        <div class="fullbox">
                            <input type="checkbox"  id="liketocontracted" aria-describedby="liketocontracted" aria-describedby="liketocontracted" value="email"> Email
                        </div>
                        <div class="fullbox">
                            <input type="checkbox"  id="liketocontracted" aria-describedby="liketocontracted" aria-describedby="liketocontracted" value="phone-call"> Phone Call
                        </div>
                        <div class="fullbox">
                            <input type="checkbox"  id="liketocontracted" aria-describedby="liketocontracted" aria-describedby="liketocontracted" value="text">  Text
                        </div>
                        <div class="fullbox">
                            <input type="checkbox"  id="liketocontracted" aria-describedby="liketocontracted" aria-describedby="liketocontracted" value="no-preference"> No preference
                        </div>
                    </div>
                </div>
            </div>
            <div class="row align-items-center mt-4 mb-4">
                <div class="col-md-12 mt-4 mb-4">
                    <div class="form-group">
                        <label for="messagebox">Anything else you’d like us to know? (optional)</label>
                        <textarea class="form-control" id="messagebox" aria-describedby="messagebox" rows="8" ></textarea>
                    </div>
                </div>
            </div>
            <div class="row align-items-center mt-4 mb-4 justify-content-center">
                <div class="col-md-4 mt-4 mb-4 text-center">
                    <button type="submit" class="common_btn">Submit</button>
                </div>
            </div>
        </form>
    </div>
</section>
<?php
get_footer();
