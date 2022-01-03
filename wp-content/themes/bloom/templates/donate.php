<?php 
/* Template Name: Donate Template */
if($_POST['payment']!= 'stripe')
{
get_header();
}
$pgid = get_the_ID();
// PayPal configuration  
define('PAYPAL_ID', 'shaanaku@gmail.com');  
define('PAYPAL_SANDBOX', TRUE); //TRUE or FALSE  

define('PAYPAL_RETURN_URL', 'https://oxeenit.tech/bloomnew/success/');  
define('PAYPAL_CANCEL_URL', 'https://oxeenit.tech/bloomnew/cancel/');  
define('PAYPAL_NOTIFY_URL', 'https://oxeenit.tech/bloomnew/ipn/');   
define('PAYPAL_CURRENCY', 'USD');  

// Change not required  
define('PAYPAL_URL', (PAYPAL_SANDBOX == true)?"https://www.sandbox.paypal.com/cgi-bin/webscr":"https://www.paypal.com/cgi-bin/webscr");




global $wpdb;
$prefix = $wpdb->prefix;
$sql = "SELECT  * from  ".$prefix."usa_state";
$result = $wpdb->get_results($sql);

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
    if($_POST['damount'] > 0)
    {
    $amount     = $_POST['damount'];
    }
    if($_POST['oamount'] > 0)
    {
     $amount     = $_POST['oamount']; 
    }
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
        $amount     = $charge['amount']/100;
        $balance_transaction = $charge['balance_transaction'];
        $currency   = $charge['currency'];
        $status     = $charge['status'];
        $date   = date("Y-m-d H:i:s");

        $sess = $_SERVER['REMOTE_ADDR'] .' '. $_SERVER['HTTP_USER_AGENT'];
        
// store into db

global $wpdb;
$data = array(
           'session_id'=>  $sess,'sub_id'=> $subscription['id'],'charge_id'=> $charge['id'],'amount' => $amount,
           'subscription_amount' => $plan['amount']/100,'firstname' => $_POST['firstname'],
           'lastname' => $_POST['lastname'],'frequency' => $_POST['frequency'], 'comment' => $_POST['comment'],
           'email' => $_POST['email'],'phone' => $_POST['phone'], 'address' => $_POST['address'],
           'address2'=> $_POST['address2'],'country'=> $_POST['country'], 'city' => $_POST['city'],
           'state' => $_POST['state'],'zip' => $_POST['zip'],'payment_method' => 'stripe','checkboxData' => json_encode($_POST['checkboxData']),'carddetails' =>json_encode($charge)
            );
$tableName = 'wp_donations';
$insert_row = $wpdb->insert($tableName, $data, $format = NULL); 

if($insert_row){

ob_end_clean();
require_once dirname(__FILE__) .'/pdfgen/vendor/autoload.php';

	$html = '
	
        <table width = "80%" style = "margin:20px auto;">
            <tr>
                <td colspan="2" style = "padding:10px; text-align: center;border-bottom: 2px solid #ddd;">
                    <img src="http://oxeenit.tech/bloomnew/wp-content/themes/bloom/img/logo.png" alt="">
                </td>
            </tr>
            <tr>
                <td colspan = "2" style = "padding:10px;text-align: left; background:#ccc;margin-top:10px;"><strong>DONOR INFORMATION</td>
            </tr>
            <tr>
                <td style = "padding:5px;padding-left:20px; text-align: left;text-transform:capitalize;font-weight:600;">donated by:</td>
                <td style = "padding:5px;padding-left:20px; text-align: left; text-transform: capitalize;">'.$_POST['firstname'].' '.$_POST['lastname'].'</td>
            </tr>
            <tr>
                <td style = "padding:5px; padding-left:20px; text-align: left;text-transform:capitalize;font-weight:600;">Email-id:</td>
                <td style = "padding:5px; padding-left:20px; text-align: left;">'.$_POST['email'].'</td>
            </tr>
            <tr>
                <td style = "padding:5px; text-align: left; padding-left:20px; text-transform:capitalize;font-weight:600;">phone no. :</td>
                <td style = "padding:5px; text-align: left;padding-left:20px;">'.$_POST['phone'].'</td>
            </tr>
            <tr>
                <td style = "padding:5px; padding-left:20px;text-align: left;text-transform:capitalize;font-weight:600;">address:</td>
                <td style = "padding:1px;padding-left:20px; text-align: left;">'.$_POST['address'].'</td>
            </tr>
            <tr>
                <td></td>
                <td style = "padding:1px;padding-left:20px; text-align: left;">'.$_POST['address2'].'</td>
            </tr>
            <tr>
                <td></td>
                <td  style = "padding:1px;padding-left:20px; text-align: left;">'.$_POST['country'].'</td>
            </tr>
            <tr>
                <td></td>
                <td style = "padding:1px; padding-left:20px;text-align: left;">'.$_POST['state'].'</td>
            </tr>
            <tr>
                <td></td>
                <td style = "padding:1px; padding-left:20px;text-align: left;">'.$_POST['city'].'</td>
            </tr>
            <tr>
                <td></td>
                <td style = "padding:1px; padding-left:20px;text-align: left;">'.$_POST['zip'].'</td>
            </tr>
            
     </table>
        <table class="line-items-container" width = "80%" style = "margin:20px auto;">
            <tr>
                <td colspan = "2" style = "padding:10px;background:#ccc;"><strong>DONATION INFORMATION</strong></td>
            </td>    
          <thead>
            <tr>
              <th style = "padding:10px 5px;text-align:center;margin:5px;border-bottom: 2px solid #ddd;">Donation Type</th>
              <th style = "padding:10px 5px;text-align:right;margin:5px;border-bottom: 2px solid #ddd;">Donation Amount</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td style = "padding:5px;text-align:center;margin:5px;">'.$_POST['frequency'].'</td>
              <td style = "padding:5px;text-align:right;margin:5px;">$'.$_POST['damount'].$_POST['oamount'].'</td>
            </tr>
          </tbody>   
    </table>
        <table class="footerPDF-container" width = "80%" style = "margin:20px auto;border-top: 2px solid #ddd;border-bottom: 2px solid #ddd;">
            <tr>
                <td style = "padding:10px 2px 2px 2px;text-align:left;margin:0 5px;">www.bloomarts.org</td>
                <td style = "padding:10px 2px 2px 2px;text-align:right;margin:0 5px;">info@bloomarts.org</td>
            </tr>
            <tr>
                <td style = "padding:2px;text-align:left;margin:0 5px;">Bloom Arts Foundation 5555 Culver Blvd,</td>
                <td style = "padding:2px;text-align:right;margin:0 5px;">(310) 555-5555</td>
            </tr>
            <tr>
                <td colspan = "2" style = "padding:2px;text-align:left;margin:0 5px;"> Culver City, CA 90230</td>
            </tr>
            <tr>
                <td colspan = "2"  style = "padding:2px;text-align:center;margin:5px;">
                    <img style = "width: 16px;display: inline-block;"src="http://oxeenit.tech/bloomnew/wp-content/uploads/2021/12/heart.png" alt="heart">
                    <span>Thank you!</span>
                    <img style = "width: 16px;display: inline-block;"src="http://oxeenit.tech/bloomnew/wp-content/uploads/2021/12/heart.png" alt="heart">
                </td>
            </tr>
        </table>
    
    ';
	$mpdf = new \Mpdf\Mpdf();
	$mpdf->WriteHTML($html);

	//call watermark content aand image
	$mpdf->SetWatermarkText('');
	$mpdf->showWatermarkText = true;
	$mpdf->watermarkTextAlpha = 0.1;
	//$mpdf->SetWatermarkImage('http://oxeenit.tech/bloomnew/wp-content/themes/bloom/img/logo.png' , 0.2 ,' ', array(75,70));
    //$mpdf->showWatermarkImage = true;
     
     $filename = 'D'.rand().'.pdf';
     $dir=  WP_CONTENT_DIR. '/invoice/';
	//save the file put which location you need folder/filname
	$mpdf->Output($dir.$filename , 'F');


$to = "testdemo7993@gmail.com";
$email = $_POST['email'];
$subject = "Report";
$attachments = array(WP_CONTENT_DIR . '/invoice/'.$filename);
$message ="<html>
<head>
<title>Donation Notification</title>
</head>
<body>
<p>Dear Admin</p>
<table>
<tr>
<td><p>New Gift has been  received from ".$_POST['firstname']." And Amount is $".$amount."</p></td>
</tr>
<tr><td><p>Thank You</p></td>
</tr>
</tr>
<tr><td><p>Bloom</p></td>
</tr>
</table>
</body>
</html>";
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From: '. $email . "\r\n" .
'Reply-To: ' . $email . "\r\n";
wp_mail($email, $subject, $message, $headers, $attachments);
$sent = wp_mail($to, $subject, $message, $headers, $attachments);
if($sent){
	$link  = site_url().'/donation-thank-you';?>
	<script>window.location.href="<?php echo $link;?>"</script><?php 
	}
} 

?>

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
.hidecls{display:none;}
.payment-errors{color: red;padding: 6px 0 0 17px;}
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
             <div class="col-md-12 mb-1">
                <?php echo get_field('donate_content_1',$pgid);?>
            </div>
            <div class="col-md-12 mb-1">
                <?php echo get_field('sub_heading_content',$pgid);?>
            </div>
            <div class="col-md-8  mt-4 mb-2">
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
            <div class="col-md-12  mt-4 mb-md-4">
                <?php echo get_field('tag_line_content',$pgid);?>
            </div>
        </div>
    </div>
</section>
<section class="cbody mt-md-4 mb-4">
    <div class="container">
    	<div id="error-message"></div>
        <form id="msform" method="post" name="cardpayment">
            <div class="row align-items-center mt-4 mb-4">
                <div class="col-md-12  mt-2 mb-2">
                    <h2>My Donation</h2>
                </div>
                <div class="col-md-12 mt-4 mb-4 myDonationTab" id="myDonationTab">
                    <div class="form-group">
                        <label for="wantgive">I Want to Give</label>
                    </div>
                    <div class="form-group">
					 <?php 
						$rows_pricing_D = get_field('pricing_section');
						if( $rows_pricing_D ) {
							$counter =1;
                        foreach( $rows_pricing_D as $rowpricing_val ) { ?>
							 <div class="form-check form-check-inline mb-3">
								<input class="form-check-input damount" type="radio" name="damount"  value="<?php echo $rowpricing_val['specify_price']?>">
								<label class="form-check-label" for="pricingRadios">$ <?php echo $rowpricing_val['specify_price']?></label>
							</div><?php 
							$counter = $counter + 1;
							}
							}	?>
					
					 
					
					
               
                        <div class="form-check form-check-inline mb-3">
                            <input class="form-check-input" type="radio" name="damount" id="otheramount" value="other">
                            <label class="form-check-label" for="pricingRadios">$ other</label>
                        </div>
						
                        <div class="form-group" id="oamount" style="display:none;">
                        <label class="form-check-label" for="pricingRadios">Enter Amount</label>   
                        <input class="form-control oamount numbervalidation" type="text"  id="oamountid" name="oamount"  value="" style="width: 72%;">
                    </div>
                    </div>
                    
                </div>
                <div class="col-md-12 mt-4 mb-4 FrequencyTab hidecls" id="frequencyDiv">
                    <div class="form-group">
                        <label for="wantgive">Frequency</label>
                    </div>
                    <div class="form-group">
                        <div class="form-check form-check-inline active">
                            <input class="form-check-input frequency" type="radio" name="frequency" id="frequency" value="onetime" >
                            <label class="form-check-label" for="pricingRadios">One Time</label>
                            <div class="heart-aniamtion">
                                <div class="heart-i hi1"></div>
                                <div class="heart-i hi2"></div>
                                <div class="heart-i hi3"></div>
                                <div class="heart-i hi4"></div>
                                <div class="heart-i hi5"></div>
                            </div>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input frequency" type="radio" name="frequency" id="frequency" value="monthly">
                            <label class="form-check-label" for="pricingRadios">Monthly</label>
                            <div class="heart-aniamtion">
                                <div class="heart-i hi1"></div>
                                <div class="heart-i hi2"></div>
                                <div class="heart-i hi3"></div>
                                <div class="heart-i hi4"></div>
                                <div class="heart-i hi5"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mt-4 mb-4 checkBoxTab hidecls" id="checkboxDiv">
                    <div class="form-check">
                      <input class="form-check-input" name="checkboxData[]" type="checkbox" value="This gift is in honor or dedicated to a loved one" id="defaultCheck1" checked>
                      <label class="form-check-label" for="defaultCheck1">
                        This gift is in honor or dedicated to a loved one
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input"  name="checkboxData[]" type="checkbox" value="This gift is on behalf of a company or organization" id="defaultCheck2">
                      <label class="form-check-label" for="defaultCheck2">
                        This gift is on behalf of a company or organization
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" name="checkboxData[]" type="checkbox" value="I wish to remain anonymous" id="defaultCheck3">
                      <label class="form-check-label" for="defaultCheck3">
                        I wish to remain anonymous
                      </label>
                    </div>
                </div>
                <div class="col-md-12 mt-4 mb-4 commentBoxTab hidecls" id="commentDiv">
                    <div class="form-group">
                        <label for="wantgive">Leave a comment (optional):</label>
                    </div>
                    <div class="form-group">
                        <textarea id="comment" name="comment" placeholder="(Optional)" autocomplete="off"></textarea></textarea>
                    </div>
                </div>
            </div>
            <div class="fullbline"></div>
            <div class="row align-items-start pt-4 PaymentsTab">
                <div class="col-md-12 hidecls" id="paymentDetailsDiv">
                    <h2>Payment Details</h2>
                </div>
                <div class="col-md-12 mt-4 hidecls" id="paymentmethodDiv">
                    <div class="form-group">
                        <label for="wantgive">1. Select a method of payment</label>
                    </div>
                    <div class="form-group">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input stripe payment" type="radio" name="payment" id="payment" value="stripe" >
                            <label class="form-check-label" for="pricingpaypalRadios">Credit or Debit Card</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input paypal payment" type="radio" name="payment" id="payment" value="paypal">
                            <label class="form-check-label" for="pricingpaypalRadios">Paypal</label>
                        </div>
                    </div>
                </div>
			<div class="row mx-0 hidecls" id="personalDiv">
                <div class="col-md-12 mt-4">
                    <div class="form-group">
                        <label for="wantgive">2.  Personal Information</label>
                    </div>
                </div>
                <div class="col-md-6">
				    <div class="form-group">
					    <label for="inputFirstName">First Name <span>*</span></label>
					    <input type="text" class="form-control" id="inputFirstName" name="firstname" autocomplete="off" onkeypress="return (event.charCode > 64 && 
	event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)">
				    </div>
				</div>
				<div class="col-md-6">
				    <div class="form-group">
						<label for="inputLastName">Last Name <span>*</span></label>
						<input type="text" class="form-control" id="inputLastName" name="lastname" autocomplete="off" onkeypress="return (event.charCode > 64 && 
	event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)">
					</div>
				</div>
				<div class="col-md-6">
                    <div class="form-group">
                        <label for="inputEmail1">Email<span>*</span></label>
                        <input type="email" class="form-control" id="inputEmail1" name="email" autocomplete="off">
						
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputPhone">Phone<span>*</span></label>
                        <input type="text" class="form-control numbervalidation" id="inputPhone" name="phone" maxlength="10" autocomplete="off">
                    </div>
                </div>
            </div>
            </div>
            <div class="row mt-4 hidecls" id="cardinfoDiv" > 
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="addcard">3.  Add Card</label>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label class="form-label" for="name">Card Holder Name</label>
                    <input name="holdername" id="name" class="form-input form-control" type="text" required  autocomplete="off" />
                </div>
                <div class="form-group col-md-6">
                    <label class="form-label" for="card">Card Number</label>
                    <input name="cardnumber" id="card" class="form-input form-control numbervalidation" type="text" maxlength="16" data-stripe="number"  required  autocomplete="off" />
                </div>
                <div class="form-group row mx-0 w-100 ">
                    <div class="col-md-12">
                        <label class="form-label mb-2" for="password">Expiry Month / Year & CVV</label>
                     </div>   
                    <div class="col-4">
                        <select name="pay-month" id="month" class="form-input2 form-control w-100" data-stripe="exp_month">
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
                        <select name="pay-year" id="year" class="form-input2 form-control w-100" data-stripe="exp_year">
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
                        <input name="cvv" id="cvv" class="form-input2 form-control numbervalidation" type="text" placeholder="CVV" data-stripe="cvc"  maxlength="3" required  autocomplete="off" />
                    </div>
					<span class="payment-errors"></span>
                </div>
            </div>
            <div class="row mt-md-4 hidecls" id="billingDiv">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="billinginfo">4.  Billing Information</label>
                    </div>
                </div>
                <div class="col-md-6">
				    <div class="form-group">
					    <label for="billingAddress">Address <span>*</span></label>
					    <input type="text" class="form-control" id="billingAddress" name="address" autocomplete="off">
				    </div>
				</div>
				<div class="col-md-6 ">
				    <div class="form-group">
					    <label for="billingAddress2">Address Line 2 <span>*</span></label>
					    <input type="text" class="form-control" id="billingAddress2" placeholder="Address 2" name="address2" autocomplete="off"> 
				    </div>
				</div>
				<div class="col-md-6">
				    <div class="form-group">
					    <label for="billingCountry">Country <span>*</span></label>
					    <input type="text" class="form-control" id="billingCountry" placeholder="United States" name="country" autocomplete="off">
				    </div>
				</div>
				<div class="col-md-6"></div>
				<div class="col-md-3 col-6">
				    <div class="form-group">
					    <label for="billingState">State <span>*</span></label>
					    <select class="form-control" id="billingState" name="state" autocomplete="off">
					        <option value="">Select State</option>
					        <?php foreach($result as $value){?>
							<option value="<?php echo $value->state_name?>"><?php echo $value->state_name;?></option>
							<?php } ?>
					    </select>
				    </div>
				</div>
				<div class="col-md-6">
				    <div class="form-group">
					    <label for="billingCity">City <span>*</span></label>
					    <input type="text" class="form-control" id="billingCity" name="city" autocomplete="off">
				    </div>
				</div>
				
				<div class="col-md-3 col-6">
				    <div class="form-group">
					    <label for="billingZipcode">Zipcode <span>*</span></label>
					    <input type="text" class="form-control" id="billingZipcode" name="zip">
				    </div>
				</div>
				<div class="col-12 hidecls" id="stripeDiv">
				    <div class="form-group">
					    <!-- <input type="button" class="common_btn" id="submitform" value="Donate $500"> -->
					    <input type="submit" name="make_payment" id="submitform" class="common_btn action-button button submit-pay" value="Donate"/>
				    </div>
				</div>
            </div>
        </form>
            <!-- Buy button -->
            <form action="<?php echo PAYPAL_URL; ?>" method="post" id="paypalbtn" >            
                    <!-- Paypal business test account email id so that you can collect the payments. -->
                    <input type="hidden" name="business" value="<?php echo PAYPAL_ID; ?>">          
                    <!-- Buy Now button. -->
                            
                    <!-- Details about the item that buyers will purchase. -->
                    <input type="hidden" name="item_name" value="Donation">
                    <input type="hidden" name="currency_code" value="USD">
					<input type="hidden" name="custom" id="custom" value="0">					
                    <!-- URLs -->
                    <input type="hidden" name="cancel_return" value="<?php echo PAYPAL_CANCEL_URL; ?>">
                    <input type="hidden" name="return" value="<?php echo PAYPAL_RETURN_URL; ?>">
                    <input type="hidden" name="notify_url" value="<?php echo PAYPAL_NOTIFY_URL; ?>">                
                    <!-- payment button. -->
                     <input type="hidden" name="action" value="donation" style="display: none; visibility: hidden; opacity: 0;">
                    
                    <!--<input class="common_btn action-button button pay hidecls" name="paypal"  id="paypalBtn" rel="onetime"  type="submit" value="Donate" >--> 

					<div class="col-12 hidecls" id="PaypalDiv">
				    <div class="form-group">
					    <!-- <input type="button" class="common_btn" id="submitform" value="Donate $500"> -->
					    <input class="common_btn action-button button pay" name="paypal"  id="paypalBtn" rel="onetime"  type="button" value="Donate" >
				    </div>
				</div>

					
            </form>


           <?php /* <form action="<?php echo PAYPAL_URL; ?>" method="post" id="paypalbtn" rel="monthly">
                                    <!-- Identify your business so that you can collect the payments -->
                                    <input type="hidden" name="business" value="<?php echo PAYPAL_ID; ?>">
                                    <!-- Specify a subscriptions button. -->
                                    <input type="hidden" name="cmd" value="_xclick-subscriptions">
                                    <!-- Specify details about the subscription that buyers will purchase -->
                                    <input type="hidden" name="item_name" value="Donation">
                                    <input type="hidden" name="item_number" value="JHG987666">
                                    <input type="hidden" name="currency_code" value="USD">
                                    <input type="hidden" name="a3" id="paypalAmt" value="">
                                    <input type="hidden" name="p3" id="paypalValid" value="1">
                                    <input type="hidden" name="t3" value="M">

                                    <!-- Specify urls -->
                                    <input type="hidden" name="cancel_return" value="<?php echo PAYPAL_CANCEL_URL; ?>">
                                    <input type="hidden" name="return" value="<?php echo PAYPAL_RETURN_URL; ?>">
                                    <input type="hidden" name="notify_url" value="<?php echo PAYPAL_NOTIFY_URL; ?>">
                                    <!-- Display the payment button -->
                                      <input type="hidden" name="action" value="donation" style="display: none; visibility: hidden; opacity: 0;">
                               
                                    <input class="common_btn action-button button pay"  rel="monthly" name="paypal" id="monthly" type="submit" value="Donate" style="display: none;">
             </form>
*/ ?>

       <input type="hidden" name="allamount" id="allamount" value="">                 
    </div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-8 mt-4 mb-md-4">
                <?php echo get_field('bottom_content',$pgid);?>
            </div>
            <div class="col-md-2 col-6 text-center mt-md-4 mb-md-4">
                <?php $btr1img = get_field( "bottom_right_image1", $partnerid);?>
                <img src="<?php echo $btr1img['url']; ?>" alt="<?php echo $btr1img['title']; ?>" class="img-fluid">
            </div> 
            <div class="col-md-2 col-6 text-center mt-md-4 mb-md-4">
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
		  var allamount = $('#allamount').val();
		   if(allamount==''){
			$('#oamountid').css('border-color','red');
					var focusElement = $("#myDonationTab"); 
					$(focusElement).focus(); 
					ScrollToTopTab_donation(focusElement);
				 return false;
		   }	
       $form.find('.submit-pay').prop('disabled', true);
		Stripe.card.createToken($form, stripeResponseHandler);
		return false;
      });
    });

    function stripeResponseHandler(status, response) {
      var $form = $('#msform');
		if (response.error) { 
			$form.find('.payment-errors').text(response.error.message);
			$form.find('.submit-pay').prop('disabled', false);
			var focusElement = $("#cardinfoDiv"); 
					$(focusElement).focus(); 
					ScrollToTopTab_donation(focusElement);
		} else { 
		var token = response.id;
			$form.append($('<input type="hidden" name="stripeToken">').val(token));
				H5_loading.show();
				$form.get(0).submit();
			
        //return false;
      }
    };



$("#oamountid").keyup(function() { 
        $(this).css('border-color',''); 
	});
	

$(document.body).on("click",".damount",function(){
	   var radioValue = $(this).val();
			if(radioValue){
                $('input[name=a3]').val(radioValue);
                $('input[name=allamount]').val(radioValue);
				$('input[name=amount]').val(radioValue);
                $("#oamount").css("display", "none");
                $('.oamount').val('');
                $('#frequencyDiv').removeClass('hidecls');
            }
        });
    

 $(document).ready(function() {
  $(".oamount").keyup(function() {
    $('input[name=a3]').val($(this).val());
    $('input[name=allamount]').val($(this).val());
    $('input[name=amount]').val($(this).val());
	$('#frequencyDiv').removeClass('hidecls');
  });
}); 


$(document).ready(function(){
        $(".form-check .payment,.form-check .frequency").on('click',function(){
          $('#checkboxDiv,#commentDiv,#paymentDetailsDiv,#paymentmethodDiv').removeClass('hidecls');
            var payment = $("input[name='payment']:checked").val();
			var allamount = $('#allamount').val();
            var frequency = $("input[name='frequency']:checked").val();
			if(payment == 'paypal' && frequency == "onetime"){
               $('#cmd,#paypalAmt,#t3').remove();
				$('#paypalbtn').append($('<input type="hidden" name="cmd" id="cmd" value="_xclick">'));
				$('#paypalbtn').append($('<input type="hidden" name="amount" id="paypalAmt">').val(allamount));
				$('#paypalBtn').attr('rel','onetime');
				$('#personalDiv').removeClass('hidecls');
				
            } 
            else if(payment == 'paypal' && frequency == "monthly")
            {
                $("#paypalBtn").css("display", "block");
				$('#cmd,#paypalAmt,#t3').remove();
				$('#paypalbtn').append($('<input type="hidden" name="cmd" id="cmd" value="_xclick-subscriptions">'));
				$('#paypalbtn').append($('<input type="hidden" name="a3" id="paypalAmt">').val(allamount));
				$('#paypalbtn').append($('<input type="hidden" name="p3" id="paypalValid" value="1">'));
				$('#paypalbtn').append($('<input type="hidden" name="t3"  id="t3" value="M">'));
				$('#paypalBtn').attr('rel','monthly');
				$('#personalDiv').removeClass('hidecls');
            }
            else if(payment == 'stripe'){
                $(".card").css("display", "block");
                $("#submitform").css("display", "block");
                $("#onetime").css("display", "none");
                $("#monthly").css("display", "none");
				$('#personalDiv').removeClass('hidecls');
                
            }
            else
            {
                $(".card").css("display", "none");
                $("#submitform").css("display", "none");
                
            }
        });
       
        
    });
    
	$("#paypalBtn").click(function(){
	 var allamount = $('#allamount').val();
		   if(allamount==''){
			$('#oamountid').css('border-color','red');
					var focusElement = $("#myDonationTab"); 
					$(focusElement).focus(); 
					ScrollToTopTab_donation(focusElement);
				 return false;
		   }	
		
		
	var pay =$('.pay').attr('rel');
	var firstname = $('#inputFirstName').val();
	var lastname = $('#inputLastName').val();
	var email = $('#inputEmail1').val();
	var phone = $('#inputPhone').val();
	var address = $('#billingAddress').val();
	var address2 = $('#billingAddress2').val();
	var country = $('#billingCountry').val();
	var city = $('#billingCity').val();
	var state = $('#billingState').val();
	var zip = $('#billingZipcode').val();
	var frequency = $('#frequency').val();
	var comment = $('#comment').val();
	
	var checkboxData = $('input[name="checkboxData[]"]').map(function(){
				return $(this).val();
		}).get();
	
	var payment_method = $('#payment').val();
	if(firstname=='' &&  lastname=='' &&  email=='' && phone=='' && address=='' && country=='' && city=='' && state=='' && zip==''){
		$('#inputFirstName,#inputLastName,#inputEmail1,#inputPhone,#billingAddress,#billingCountry,#billingCity,##billingState,#billingZipcode').css('border-color','red');
		return false;
	}
	if(firstname==''){
		$('#inputFirstName').css('border-color','red');
		return false;
	}
	if(inputLastName==''){
		$('#inputLastName').css('border-color','red');
		return false;
	}
	if(inputEmail1==''){
		$('#inputEmail1').css('border-color','red');
		return false;
	}
	if(inputPhone==''){
		$('#inputPhone').css('border-color','red');
		return false;
	}
H5_loading.show();
// calling ajax
$.ajax({
    type: 'POST',
    dataType: 'json',
    url: "../wp-admin/admin-ajax.php", 
    data: { 
        'action' : 'donation',
        'firstname': firstname,
        'lastname': lastname,
        'email':email,
        'phone': phone,
        'address' : address,
        'address2' : address2,
        'country' : country,
        'city':city,
        'state': state,
        'zip': zip,
        'frequency': frequency,
        'comment': comment,
        'checkboxData': checkboxData,
    },
   
    success: function(msg){
		H5_loading.hide();
		if(msg > 0){
			$('#custom').val(msg);
			$( "#paypalbtn" ).submit();
			return false;
		}else{
			
		}
        
    }
});
		
		
});	
	
	
$(document.body).on("keyup blur","#inputFirstName,#inputLastName,#inputEmail1,#inputPhone",function(){
	var firstname = $('#inputFirstName').val();
	var lastname = $('#inputLastName').val();
	var email = $('#inputEmail1').val();
	var phone = $('#inputPhone').val();
    var payment = $("input[name='payment']:checked").val();
	if((firstname!='') &&  (lastname!='') &&  (email!='') && (phone!='')){
		if(payment=='stripe'){
			$('#cardinfoDiv').removeClass('hidecls');
		}else{
			$('#billingDiv').removeClass('hidecls');
		}
		$('#inputFirstName,#inputLastName,#inputEmail1,#inputPhone').css('border-color','');
		return false;
	}else{
		
		
		if(firstname==''){ $('#inputFirstName').css('border-color','red'); }else{ $('#inputFirstName').css('border-color',''); }
		if(lastname==''){ $( '#inputLastName').css('border-color','red'); }else{ $('#inputLastName').css('border-color',''); }
		if(email==''){ $('#inputEmail1').css('border-color','red'); }
		else { 
		$('#inputEmail1').css('border-color',''); 
		  
		}
		/*if(IsEmail(email)==false){
               $('#inputEmail1').css('border-color','red');
			   $('#emailError').show();
                return false;
            }else{
				$('#inputEmail1').css('border-color',''); 
			}
		
		*/
		
		if(phone==''){ $('#inputPhone').css('border-color','red'); } else { $('#inputPhone').css('border-color',''); }
		
		if(payment=='stripe'){
			$('#cardinfoDiv').addClass('hidecls');
		}else{
			$('#billingDiv').addClass('hidecls');
		}
		return false;
	}
	});




$(document.body).on("keyup blur","#name,#card,#cvv",function(){
	var firstname = $('#name').val();
	var card = $('#card').val();
	var cvv = $('#cvv').val();
	if((firstname!='') &&  (card!='') &&  (cvv!='')){
		$('#billingDiv').removeClass('hidecls');
		$('#name,#card,#cvv').css('border-color','');
		return false;
	}else{
		if(firstname==''){ $('#name').css('border-color','red'); }else{ $('#name').css('border-color',''); }
		if(card==''){ $( '#card').css('border-color','red'); }else{ $('#card').css('border-color',''); }
		if(cvv==''){ $('#cvv').css('border-color','red'); }else{ $('#cvv').css('border-color',''); }
		$('#billingDiv').addClass('hidecls');
		return false;
	}
});

$(document.body).on("keyup blur","#billingAddress,#billingAddress2,#billingCountry,#billingCity,#billingZipcode",function(){
	var billingAddress = $('#billingAddress').val();
	var billingAddress2 = $('#billingAddress2').val();
	var billingCountry = $('#billingCountry').val();
	var billingCity = $('#billingCity').val();
	var billingZipcode = $('#billingZipcode').val();
	var payment = $("input[name='payment']:checked").val();
	console.log(payment);
	if((billingAddress!='') &&  (billingAddress2!='') &&  (billingCountry!='') &&  (billingCity!='') && (billingZipcode!='')){
		$('#billingDiv').removeClass('hidecls');
		$('#billingAddress,#billingAddress2,#billingCountry,#billingCity,#billingZipcode').css('border-color','');
		if(payment=='stripe'){
			$('#stripeDiv').removeClass('hidecls');
		}else{
			$('#PaypalDiv').removeClass('hidecls');
		}
		
		
	}else{
		if(billingAddress==''){ $('#billingAddress').css('border-color','red'); }else{ $('#billingAddress').css('border-color',''); }
		if(billingAddress2==''){ $( '#billingAddress2').css('border-color','red'); }else{ $('#billingAddress2').css('border-color',''); }
		if(billingCountry==''){ $('#billingCountry').css('border-color','red'); }else{ $('#billingCountry').css('border-color',''); }
		if(billingCity==''){ $('#billingCity').css('border-color','red'); }else{ $('#billingCity').css('border-color',''); }
		$('#billingDiv').addClass('hidecls');
		if(billingZipcode==''){ $('#billingZipcode').css('border-color','red'); }else{ $('#billingZipcode').css('border-color',''); }
		$('#billingDiv').removeClass('hidecls');
		//$('#stripeDiv').addClass('hidecls');
		if(payment=='stripe'){
			$('#stripeDiv').addClass('hidecls');
		}else{
			$('#PaypalDiv').addClass('hidecls');
		}
		
		//return false;
	}
});

 function IsEmail(email) {
	 
        var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if(!regex.test(email)) {
           return false;
        }else{
           return true;
        }
      }

 function ScrollToTopTab_donation(el) { 
    $('html, body').animate({ scrollTop: $(el).offset().top - 120 }, 'fast');           
}   
/*$(function() {
var lots_of_stuff_already_done = false;
$('#paypalbtn .pay').on('click', function(e){
	alert('hello');
 if (lots_of_stuff_already_done) {
        lots_of_stuff_already_done = false; // reset flag
        return; // let the event bubble away
    }
e.preventDefault();
var firstname = $('#inputFirstName').val();
var lastname = $('#inputLastName').val();
var email = $('#inputEmail1').val();
var phone = $('#inputPhone').val();
var address = $('#billingAddress').val();
var address2 = $('#billingAddress2').val();
var country = $('#billingCountry').val();
var city = $('#billingCity').val();
var state = $('#billingState').val();
var zip = $('#billingZipcode').val();
var frequency = $('#frequency').val();
var comment = $('#comment').val();
var payment_method = $('#payment').val();
// calling ajax
$.ajax({
    type: 'POST',
    dataType: 'json',
    url: "../wp-admin/admin-ajax.php", 
    data: { 
        'action' : 'donation',
        'firstname': firstname,
        'lastname': lastname,
        'email':email,
        'phone': phone,
        'address' : address,
        'address2' : address2,
        'country' : country,
        'city':city,
        'state': state,
        'zip': zip,
        'frequency': frequency,
        'comment': comment,
    },
   
    success: function(data){
        
        if (data.res == true){
            console.log(data.message);
           
        }else{
            console.log(data.message);    // fail
        }
    }
});
setTimeout(
  function() 
  {
   lots_of_stuff_already_done = true; // set flag
   $(this).trigger('click');
  }, 5000);
 
});
});  */ 
</script>
<script type="text/javascript">
  $(document).ready(function(){ 
    $(".form-group #otheramount").click(function(){
        
        $('#oamount').css("display", "block");
     
      
    });
   });
</script>
<?php
get_footer();?>