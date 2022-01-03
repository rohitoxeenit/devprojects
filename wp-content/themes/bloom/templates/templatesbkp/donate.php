<?php 
/* Template Name: Donate Template */
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
    <h4 class="text-white"><?php echo get_field('donate_sub_heading',$pgid);?></h4>
</section>
<div class="top-breadcrub py-3">
    <div class="container">
        <p><a href="<?php echo get_home_url(); ?>">Home</a> > <?php the_title();?></p>
    </div>
</div>
</section>
<section class="studentpbody">
    <div class="container">
        <div class="row align-items-center">
             <div class="col-md-12  mt-2 mb-2">
                <?php echo get_field('donate_content_1',$pgid);?>
            </div>
            <div class="col-md-12  mt-2 mb-2">
                <?php echo get_field('sub_heading_content',$pgid);?>
            </div>
            <div class="col-md-8  mt-2 mb-2">
                <?php 
                    $rows_pricing = get_field('pricing_section');
                    if( $rows_pricing ) {
                        foreach( $rows_pricing as $rowpricing_val ) {
                ?>
                        <div class="donate_boxlist mt-2 mb-2">
                            <span><?php echo $rowpricing_val['specify_price'];?></span><?php echo $rowpricing_val['price_content'];?>
                        </div>
                <?php   }
                    }
                ?>
            </div>
            <div class="col-md-4  mt-4 mb-4 text-center">
                <?php $donateimg = get_field( "image", $partnerid);?>
                <img src="<?php echo $donateimg['url']; ?>" alt="<?php echo $donateimg['title']; ?>" class="img-fluid">
            </div>
            <div class="col-md-12  mt-4 mb-4">
                <?php echo get_field('tag_line_content',$pgid);?>
            </div>
        </div>
    </div>
</section>
<section class="cbody mt-4 mb-4">
    <div class="container">
        <form>
            <div class="row align-items-center mt-4 mb-4">
                <div class="col-md-12  mt-2 mb-2">
                    <h2>My Donation</h2>
                </div>
                <div class="col-md-12 mt-4 mb-4">
                    <div class="form-group">
                        <label for="wantgive">I Want to Give</label>
                    </div>
                    <div class="form-group">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="pricingRadios" id="pricingRadios" value="750" checked>
                            <label class="form-check-label" for="pricingRadios">$ 750</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="pricingRadios" id="pricingRadios" value="500">
                            <label class="form-check-label" for="pricingRadios">$ 500</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="pricingRadios" id="pricingRadios" value="250">
                            <label class="form-check-label" for="pricingRadios">$ 250</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="pricingRadios" id="pricingRadios" value="150">
                            <label class="form-check-label" for="pricingRadios">$ 150</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="pricingRadios" id="pricingRadios" value="75">
                            <label class="form-check-label" for="pricingRadios">$ 75</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="pricingRadios" id="pricingRadios" value="50">
                            <label class="form-check-label" for="pricingRadios">$ 50</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="pricingRadios" id="pricingRadios" value="other">
                            <label class="form-check-label" for="pricingRadios">$ other</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mt-4 mb-4">
                    <div class="form-group">
                        <label for="wantgive">Frequency</label>
                    </div>
                    <div class="form-group">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="pricingRadios" id="pricingRadios" value="onetime" checked>
                            <label class="form-check-label" for="pricingRadios">One Time</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="pricingRadios" id="pricingRadios" value="monthly">
                            <label class="form-check-label" for="pricingRadios">Monthly</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mt-4 mb-4">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="This gift is in honor or dedicated to a loved one" id="defaultCheck1" checked>
                      <label class="form-check-label" for="defaultCheck1">
                        This gift is in honor or dedicated to a loved one
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="This gift is on behalf of a company or organization" id="defaultCheck1">
                      <label class="form-check-label" for="defaultCheck1">
                        This gift is on behalf of a company or organization
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="I wish to remain anonymous" id="defaultCheck1">
                      <label class="form-check-label" for="defaultCheck1">
                        I wish to remain anonymous
                      </label>
                    </div>
                </div>
                <div class="col-md-12 mt-4 mb-4">
                    <div class="form-group">
                        <label for="wantgive">Leave a comment (optional):</label>
                    </div>
                    <div class="form-group">
                        <textarea placeholder="(Optional)"></textarea>
                    </div>
                </div>
            </div>
            <div class="fullbline"></div>
            <div class="row align-items-center mt-4 mb-4">
                <div class="col-md-12  mt-4 mb-4">
                    <h2>Payment Details</h2>
                </div>
                <div class="col-md-12 mt-4 mb-4">
                    <div class="form-group">
                        <label for="wantgive">1. Select a method of payment</label>
                    </div>
                    <div class="form-group">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="pricingcdcRadios" id="pricingcdcRadios" value="Credit or Debit Card" checked>
                            <label class="form-check-label" for="pricingpaypalRadios">Credit or Debit Card</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="pricingpaypalRadios" id="pricingpaypalRadios" value="Pay Pal">
                            <label class="form-check-label" for="pricingpaypalRadios">Paypal</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="pricingpaypalRadios" id="pricingpaypalRadios" value="Apple Pal">
                            <label class="form-check-label" for="pricingpaypalRadios">Paypal</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mt-4 mb-4">
                    <div class="form-group">
                        <label for="wantgive">2.  Personal Information</label>
                    </div>
                </div>
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
            </div>
            <div class="row align-items-center mt-4 mb-4">
                <div class="col-md-12 mt-4 mb-4">
                    <div class="form-group">
                        <label for="addcard">3.  Add Card</label>
                    </div>
                </div>
                <div class="col-md-6">
				    <div class="form-group">
					    <label for="inputCardNumber">Card Number <span>*</span></label>
					    <input type="text" class="form-control" id="inputCardNumber">
				    </div>
				</div>
				<div class="col-md-3">
				    <div class="form-group">
					    <label for="inputExpiry">Expiration Date <span>*</span></label>
					    <input type="text" class="form-control" id="inputExpiry" placeholder="MM/YY">
				    </div>
				</div>
				<div class="col-md-3">
				    <div class="form-group">
					    <label for="inputSecurityCode">Security Code <span>*</span></label>
					    <input type="text" class="form-control" id="inputSecurityCode" placeholder="XXX">
				    </div>
				</div>
            </div>
            <div class="row align-items-center mt-4 mb-4">
                <div class="col-md-12 mt-4 mb-4">
                    <div class="form-group">
                        <label for="billinginfo">4.  Billing Information</label>
                    </div>
                </div>
                <div class="col-md-6">
				    <div class="form-group">
					    <label for="billingAddress">Address <span>*</span></label>
					    <input type="text" class="form-control" id="billingAddress">
				    </div>
				</div>
				<div class="col-md-6">
				    <div class="form-group">
					    <label for="billingAddress2">Address Line 2 <span>*</span></label>
					    <input type="text" class="form-control" id="billingAddress2" placeholder="MM/YY">
				    </div>
				</div>
			</div>
			<div class="row align-items-center mt-4 mb-4">
				<div class="col-md-6">
				    <div class="form-group">
					    <label for="billingCountry">Country <span>*</span></label>
					    <input type="text" class="form-control" id="billingCountry" placeholder="United States">
				    </div>
				</div>
			</div>
			<div class="row align-items-center mt-4 mb-4">
				<div class="col-md-6">
				    <div class="form-group">
					    <label for="billingCity">City <span>*</span></label>
					    <input type="text" class="form-control" id="billingCity">
				    </div>
				</div>
				<div class="col-md-3">
				    <div class="form-group">
					    <label for="billingState">State <span>*</span></label>
					    <select class="form-control" id="billingState">
					        <option value=""></option>
					        <option value="America">America</option>
					    </select>
				    </div>
				</div>
				<div class="col-md-3">
				    <div class="form-group">
					    <label for="billingZipcode">Zipcode <span>*</span></label>
					    <input type="text" class="form-control" id="billingZipcode">
				    </div>
				</div>
				<div class="col-md-3">
				    <div class="form-group">
					    <input type="button" class="common_btn" id="submitform" value="Donate $500">
				    </div>
				</div>
            </div>
        </form>
    </div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-8  mt-4 mb-4">
                <?php echo get_field('bottom_content',$pgid);?>
            </div>
            <div class="col-md-2  mt-4 mb-4">
                <?php $btr1img = get_field( "bottom_right_image1", $partnerid);?>
                <img src="<?php echo $btr1img['url']; ?>" alt="<?php echo $btr1img['title']; ?>" class="img-fluid">
            </div>
            <div class="col-md-2  mt-4 mb-4">
                <?php $btr2img = get_field( "bottom_right_image2", $partnerid);?>
                <img src="<?php echo $btr2img['url']; ?>" alt="<?php echo $btr2img['title']; ?>" class="img-fluid">
            </div>
        </div>
    </div>
</section>
<?php
get_footer();