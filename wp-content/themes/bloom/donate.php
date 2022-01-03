<?php 
/* Template Name: Donate Template */
get_header();
    $pgid = get_the_ID();

// PayPal configuration  
define('PAYPAL_ID', 'sunpreetmob@gmail.com');  
define('PAYPAL_SANDBOX', TRUE); //TRUE or FALSE  
  
define('PAYPAL_RETURN_URL', 'https://oxeenit.tech/bloomnew/success/');  
define('PAYPAL_CANCEL_URL', 'https://oxeenit.tech/bloomnew/bloomnew/cancel/');  
define('PAYPAL_NOTIFY_URL', 'https://oxeenit.tech/bloomnew/bloomnew/ipn/');  
define('PAYPAL_CURRENCY', 'USD');  

// Change not required  
define('PAYPAL_URL', (PAYPAL_SANDBOX == true)?"https://www.sandbox.paypal.com/cgi-bin/webscr":"https://www.paypal.com/cgi-bin/webscr");

?>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
require_once 'stripe/init.php'; 
$publishable_key    = "pk_test_0twkuUw95mocNNYIHGnEphpk00zgNFdwbe";
$secret_key         = "sk_test_vaHgxmkyyXa8zMmSrTmwaENl00fSiErEVB";
if($_POST['payment'] == 'stripe')
{
if(isset($_POST['stripeToken'])){
    
/*    Stripe::setApiKey($secret_key);*/
// Set API key 
    \Stripe\Stripe::setApiKey($secret_key); 
    
    $description    = 'Donation By ' .$_POST['firstname'];
    $amount     = $_POST['amount'];
    $customer = $_POST['firstname'];
    $tokenid        = $_POST['stripeToken'];
    $amount1 =       $amount * 100;
    try {
    	 if($_POST['frequency'] != 'monthly')
  {
        $charge         = \Stripe\Charge::create(array( 
        "amount"        => $amount1,
        "currency"      => "INR",
        "source"        => $tokenid,
        "description"   => $description,

    )              
        );
    }
  if($_POST['frequency'] == 'monthly')
  {
        $customer = \Stripe\Customer::create(array(
            'source'   => $tokenid,
            'email'    => $_POST['inputEmail1'],
            'name'     => $_POST['firstname']
            ));
        $plan = \Stripe\Plan::create(array( 
                "product" => [ 
                    "name" => "Donation" 
                ], 
                "amount" =>  $amount1, 
                "currency" => 'INR', 
                "interval" => 'month'
            )); 
  if($plan){ 
     $subscription = \Stripe\Subscription::create(array( 
                    "customer" => $customer->id, 
                    "items" => array( 
                        array( 
                            "plan" => $plan->id, 
                        ), 
                    ), 
                )); 
     }

}
        $id         = $charge['id'];
        $amount     = $charge['amount'];
        $balance_transaction = $charge['balance_transaction'];
        $currency   = $charge['currency'];
        $status     = $charge['status'];
        $date   = date("Y-m-d H:i:s");


// store into db

global $wpdb;
$data = array(
           'sub_id'=> $subscription['id'],'charge_id'=> $charge['id'],'amount' => $_POST['amount'],'subscription_amount' => $plan['amount']/100,'firstname' => $_POST['firstname'],'lastename' => $_POST['lastname'],'frequency' => $_POST['pricingRadios'], 'comment' => $_POST['comment'], 'email' => $_POST['email'],'phone' => $_POST['phone'], 'address' => $_POST['address'],'address2'=> $_POST['address2'],'country'=> $_POST['country'], 'city' => $_POST['city'],'state' => $_POST['state'],'zip' => $_POST['zip']
            );
// print_r($data);
// die;
$tableName = 'wp_donations';
$insert_row = $wpdb->insert($tableName, $data, $format = NULL); 
          
          ?>
						<script>
						Swal.fire({
						  position: 'top-end',
						  icon: 'success',
						  title: 'Payment Done',
						  showConfirmButton: false,
						  timer: 1500
						})
						</script>
          <?php 
           
        }catch(Stripe_CardError $e) {           
            $error = $e->getMessage();
            $result = "declined";
            
        }

}
}
//End Stripe Code
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
							<p class = "donate_list">
								<span><?php echo '$ '.$rowpricing_val['specify_price'];?></span><?php echo $rowpricing_val['price_content'];?>
							</p>
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
    	<div id="error-message"></div>
        <form id="msform" method="post" name="cardpayment" onsubmit="return validateForm()" onkeydown="return event.key != 'Enter';">
            <div class="row align-items-center mt-4 mb-4">
                <div class="col-md-12  mt-2 mb-2">
                    <h2>My Donation</h2>
                </div>
                <div class="col-md-12 mt-4 mb-4 myDonationTab">
                    <div class="form-group">
                        <label for="wantgive">I Want to Give</label>
                    </div>
                    <div class="form-group">
                        <div class="form-check form-check-inline active">
                            <input class="form-check-input" type="radio" name="amount" id="amount" value="750">
                            <label class="form-check-label" for="pricingRadios">$ 750</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="amount" id="amount" value="500">
                            <label class="form-check-label" for="pricingRadios">$ 500</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="amount" id="amount" value="250">
                            <label class="form-check-label" for="pricingRadios">$ 250</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="amount" id="amount" value="150">
                            <label class="form-check-label" for="pricingRadios">$ 150</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="amount" id="amount" value="75">
                            <label class="form-check-label" for="pricingRadios">$ 75</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="amount" id="amount" value="50">
                            <label class="form-check-label" for="pricingRadios">$ 50</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="amount" id="pricingRadios" value="other">
                            <label class="form-check-label" for="pricingRadios">$ other</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mt-4 mb-4 FrequencyTab">
                    <div class="form-group">
                        <label for="wantgive">Frequency</label>
                    </div>
                    <div class="form-group">
                        <div class="form-check form-check-inline active">
                            <input class="form-check-input" type="radio" name="frequency" id="frequency" value="onetime">
                            <label class="form-check-label" for="pricingRadios">One Time</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="frequency" id="frequency" value="monthly">
                            <label class="form-check-label" for="pricingRadios">Monthly</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mt-4 mb-4 checkBoxTab">
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
                <div class="col-md-12 mt-4 mb-4 commentBoxTab">
                    <div class="form-group">
                        <label for="wantgive">Leave a comment (optional):</label>
                    </div>
                    <div class="form-group">
                        <textarea name="comment" placeholder="(Optional)"></textarea>
                    </div>
                </div>
            </div>
            <div class="fullbline"></div>
            <div class="row align-items-center mt-4 mb-4 PaymentsTab">
                <div class="col-md-12  mt-4 mb-4">
                    <h2>Payment Details</h2>
                </div>
                <div class="col-md-12 mt-4 mb-4">
                    <div class="form-group">
                        <label for="wantgive">1. Select a method of payment</label>
                    </div>
                    <div class="form-group">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input stripe" type="radio" name="payment" id="payment" value="stripe">
                            <label class="form-check-label" for="pricingpaypalRadios">Credit or Debit Card</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input paypal" type="radio" name="payment" id="payment" value="paypal">
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
					    <input type="text" class="form-control" id="inputFirstName" name="firstname">
				    </div>
				</div>
				<div class="col-md-6">
				    <div class="form-group">
						<label for="inputLastName">Last Name <span>*</span></label>
						<input type="text" class="form-control" id="inputLastName" name="lastname">
					</div>
				</div>
				<div class="col-md-6">
                    <div class="form-group">
                        <label for="inputEmail1">Email<span>*</span></label>
                        <input type="email" class="form-control" id="inputEmail1" name="email">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputPhone">Phone<span>*</span></label>
                        <input type="text" class="form-control" id="inputPhone" name="phone">
                    </div>
                </div>
            </div>
            <div class="row align-items-center mt-4 mb-4 card">
                <div class="col-md-12 mt-4 mb-4">
                    <div class="form-group">
                        <label for="addcard">3.  Add Card</label>
                    </div>
                </div>
          
    			                     <div class="form-group row mb-0">
                                                    <div class="col-md-4">
                                                        <label class="form-label" for="name">Card Holder Name</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input name="holdername" id="name" class="form-input" type="text" required />
                                                    </div>
                                                </div>

                                                

                                                <div class="form-group row mb-0">
                                                    <div class="col-md-4">
                                                        <label class="form-label" for="card">Card Number</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input name="cardnumber" id="card" class="form-input" type="text" maxlength="16" data-stripe="number" oninput="cardFunction()" required />
                                                    </div>
                                                </div>

                                                <div class="form-group2 row mb-0">
                                                    <div class="col-md-12">
                                                        <label class="form-label mb-2" for="password">Expiry Month / Year & CVV</label>
                                                     </div>   
                                                    <div class="col-4">
                                                        <select name="pay-month" id="month" class="form-input2 w-100" data-stripe="exp_month">
                                                            <option value="01">01</option>
                                                            <option value="02">02</option>
                                                            <option value="03">03</option>
                                                            <option value="04">04</option>
                                                            <option value="05">05</option>
                                                            <option value="06">06</option>
                                                            <option value="07">07</option>
                                                            <option value="08">08</option>
                                                            <option value="09">09</option>
                                                            <option value="10">10</option>
                                                            <option value="11">11</option>
                                                            <option value="12">12</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-4 p-0 px-sm-3">
                                                        <select name="pay-year" id="year" class="form-input2 w-100" data-stripe="exp_year">
                                                            <option value="21">2021</option>
                                                            <option value="22">2022</option>
                                                            <option value="23">2023</option>
                                                            <option value="24">2024</option>
                                                            <option value="25">2025</option>
                                                            <option value="26">2026</option>
                                                            <option value="27">2027</option>
                                                            <option value="28">2028</option>
                                                            <option value="29">2029</option>
                                                            <option value="30">2030</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-4">
                                                        <input name="cvv" id="cvv" class="form-input2" type="text" placeholder="CVV" data-stripe="cvc" required />
                                                    </div>
                                                    <div class="form-group">
                                                    <div class="payment-errors"></div>
                                                </div>
                                                </div>
</div>
    <div>
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
					    <input type="text" class="form-control" id="billingAddress" name="address">
				    </div>
				</div>
				<div class="col-md-6">
				    <div class="form-group">
					    <label for="billingAddress2">Address Line 2 <span>*</span></label>
					    <input type="text" class="form-control" id="billingAddress2" placeholder="Address 2" name="address2">
				    </div>
				</div>
			</div>
			<div class="row align-items-center mt-4 mb-4">
				<div class="col-md-6">
				    <div class="form-group">
					    <label for="billingCountry">Country <span>*</span></label>
					    <input type="text" class="form-control" id="billingCountry" placeholder="United States" name="country">
				    </div>
				</div>
			</div>
			<div class="row align-items-center mt-4 mb-4">
				<div class="col-md-6">
				    <div class="form-group">
					    <label for="billingCity">City <span>*</span></label>
					    <input type="text" class="form-control" id="billingCity" name="city">
				    </div>
				</div>
				<div class="col-md-3">
				    <div class="form-group">
					    <label for="billingState">State <span>*</span></label>
					    <select class="form-control" id="billingState" name="state">
					        <option value=""></option>
					        <option value="America">America</option>
					    </select>
				    </div>
				</div>
				<div class="col-md-3">
				    <div class="form-group">
					    <label for="billingZipcode">Zipcode <span>*</span></label>
					    <input type="text" class="form-control" id="billingZipcode" name="zip">
				    </div>
				</div>
				<div class="col-md-3">
				    <div class="form-group">
					    <!-- <input type="button" class="common_btn" id="submitform" value="Donate $500"> -->
					    <input type="submit" name="make_payment" id="submitform" class="common_btn action-button button login submit-pay" value="Donate"/>
				    </div>
				</div>
            </div>
        </form>
            <!-- Buy button -->
            <form action="<?php echo PAYPAL_URL; ?>" method="post">            
                    <!-- Paypal business test account email id so that you can collect the payments. -->
                    <input type="hidden" name="business" value="<?php echo PAYPAL_ID; ?>">          
                    <!-- Buy Now button. -->
                    <input type="hidden" name="cmd" value="_xclick">            
                    <!-- Details about the item that buyers will purchase. -->
                    <input type="hidden" name="item_name" value="Test Product">

                    <input type="hidden" name="amount" id="paypalAmt" value="750">
                    <input type="hidden" name="currency_code" value="USD">          
                    <!-- URLs -->
                    <input type="hidden" name="cancel_return" value="<?php echo PAYPAL_CANCEL_URL; ?>">
                    <input type="hidden" name="return" value="<?php echo PAYPAL_RETURN_URL; ?>">
                    <input type="hidden" name="notify_url" value="<?php echo PAYPAL_NOTIFY_URL; ?>">                
                    <!-- payment button. -->
                    <input class="common_btn" name="paypal" id="onetime" type="submit" value="Donate" style="display: none;">   
            </form>


                       <form action="<?php echo PAYPAL_URL; ?>" method="post">
                                    <!-- Identify your business so that you can collect the payments -->
                                    <input type="hidden" name="business" value="<?php echo PAYPAL_ID; ?>">
                                    <!-- Specify a subscriptions button. -->
                                    <input type="hidden" name="cmd" value="_xclick-subscriptions">
                                    <!-- Specify details about the subscription that buyers will purchase -->
                                    <input type="hidden" name="item_name" value="Donation">
                                    <input type="hidden" name="item_number" value="JHG987666">
                                    <input type="hidden" name="currency_code" value="USD">

                                    <input type="hidden" name="a3" id="paypalAmt" value="750">
                                    <input type="hidden" name="p3" id="paypalValid" value="1">
                                    <input type="hidden" name="t3" value="M">

                                    <!-- Specify urls -->
                                    <input type="hidden" name="cancel_return" value="<?php echo PAYPAL_CANCEL_URL; ?>">
                                    <input type="hidden" name="return" value="<?php echo PAYPAL_RETURN_URL; ?>">
                                    <input type="hidden" name="notify_url" value="<?php echo PAYPAL_NOTIFY_URL; ?>">
                                    <!-- Display the payment button -->
                                    <input class="common_btn" name="paypal" id="monthly" type="submit" value="Donate" style="display: none;">
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="<?php echo get_template_directory_uri();?>/templates/stripe/js/main.js"></script>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

<script type="text/javascript">
    Stripe.setPublishableKey('<?php print $publishable_key; ?>');
  
    $(function() {
      var $form = $('#msform');
      $form.submit(function(event) {
        // Disable the submit button to prevent repeated clicks:
        $form.find('.submit-pay').prop('disabled', true);
    
        // Request a token from Stripe:
        Stripe.card.createToken($form, stripeResponseHandler);
    
        // Prevent the form from being submitted:
        return false;
      });
    });

    function stripeResponseHandler(status, response) {
      // Grab the form:
      var $form = $('#msform');
    
      if (response.error) { // Problem!
    
        // Show the errors on the form:
        $form.find('.payment-errors').text(response.error.message);
        $form.find('.submit-pay').prop('disabled', false); // Re-enable submission
    
      } else { // Token was created!
    
        // Get the token ID:
        var token = response.id;

        // Insert the token ID into the form so it gets submitted to the server:
        $form.append($('<input type="hidden" name="stripeToken">').val(token));
    
       
        $form.get(0).submit();
        //return false;
      }
    };

$(document).ready(function(){
        $(".form-check #amount").click(function(){
            var radioValue = $("input[name='amount']:checked").val();
            if(radioValue){
                $('input[name=a3]').val(radioValue);
            }
        });
    });
$(document).ready(function(){
        $(".form-check #frequency").click(function(){
            
            var radioValue2 = $("input[name='payment']:checked").val();
            var radioValue = $("input[name='frequency']:checked").val();
            if(radioValue2 == "paypal")
            {
            if(radioValue == 'onetime'){
                $("#monthly").css("display", "none");
                $("#onetime").css("display", "block");
            }
            else
            {
                $("#onetime").css("display", "none");
                $("#monthly").css("display", "block");
            }
            }
        });
    });
$(document).ready(function(){
        $(".form-check #payment").click(function(){
            var radioValue = $("input[name='payment']:checked").val();
            if(radioValue == 'stripe'){
                $(".card").css("display", "block");
                $("#submitform").css("display", "block");
                
            }
            else
            {
                $(".card").css("display", "none");
                $("#submitform").css("display", "none");
            }
        });
    });
</script>

<?php
get_footer();