<?php /* Template name: success */ 
//get_header(); ?>
<?php
ob_end_clean();
require_once dirname(__FILE__) .'/pdfgen/vendor/autoload.php';
   //echo"<pre>";
   //print_r($_GET);
  
    // Get transaction information from URL  
    $id = $_GET['cm'];   
    $item_number = $_GET['item_number'];   
    $txn_id = $_GET['tx'];  
    $payment_gross = $_GET['amt'];  
    $currency_code = $_GET['cc'];  
    $payment_status = $_GET['st']; 
    $custom = $_GET['cm']; 
    $address= $_GET['address_street'];
    $address2= $_GET['shipping2'];
    $city = $_GET['address_city'];
    $state = $_GET['address_state'];
    $country = $_GET['address_country_code'];
    $zip = $_GET['address_zip'];
    $payer_email = $_GET['payer_email'];
    $first = $_GET['first_name'];
    $last = $_GET['last_name'];
    $phone = '9858585858';
    $frequency = 'Gjd45dh66';
    $comment = $_GET['custom'];
    $sess = $_SERVER['REMOTE_ADDR'] .' '. $_SERVER['HTTP_USER_AGENT'];
    global $wpdb;
    $table_name = $wpdb->prefix."donations";
$data = array(
             'charge_id'=> $txn_id,'amount' => $payment_gross,
           'subscription_amount' => $payment_gross,'payment_method' => 'paypal','carddetails' =>json_encode($_GET)
            );
            

$success = $wpdb->update($table_name, $data, array('id' => $id));
$results = $wpdb->get_results( "SELECT * FROM $table_name WHERE `session_id` = '$sess' ORDER BY id DESC
LIMIT 1");
/*echo $wpdb->last_query;
die();*/

foreach($results as $row) {
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
                <td style = "padding:5px;padding-left:20px; text-align: left; text-transform: capitalize;">'.$row->firstname.' '.$row->lastname.'</td>
            </tr>
            <tr>
                <td style = "padding:5px; padding-left:20px; text-align: left;text-transform:capitalize;font-weight:600;">Email-id:</td>
                <td style = "padding:5px; padding-left:20px; text-align: left;">'.$row->email.'</td>
            </tr>
            <tr>
                <td style = "padding:5px; text-align: left; padding-left:20px; text-transform:capitalize;font-weight:600;">phone no. :</td>
                <td style = "padding:5px; text-align: left;padding-left:20px;">'.$row->phone.'</td>
            </tr>
            <tr>
                <td style = "padding:5px; padding-left:20px;text-align: left;text-transform:capitalize;font-weight:600;">address:</td>
                <td style = "padding:1px;padding-left:20px; text-align: left;">'.$row->address.'</td>
            </tr>
            <tr>
                <td></td>
                <td style = "padding:1px;padding-left:20px; text-align: left;">'.$row->address2.'</td>
            </tr>
            <tr>
                <td></td>
                <td  style = "padding:1px;padding-left:20px; text-align: left;">'.$row->country.'</td>
            </tr>
            <tr>
                <td></td>
                <td style = "padding:1px; padding-left:20px;text-align: left;">'.$row->state.'</td>
            </tr>
            <tr>
                <td></td>
                <td style = "padding:1px; padding-left:20px;text-align: left;">'.$row->city.'</td>
            </tr>
            <tr>
                <td></td>
                <td style = "padding:1px; padding-left:20px;text-align: left;">'.$row->zip.'</td>
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
              <td style = "padding:5px;text-align:center;margin:5px;">'.$row->frequency.'</td>
              <td style = "padding:5px;text-align:right;margin:5px;">$'.$row->amount.'</td>
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
<td><p>New Gift has been  received from ".$row->firstname." And Amount is $".$row->amount."</p></td>
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
$headers .= 'From: '. $row->email . "\r\n" .
'Reply-To: ' . $row->email . "\r\n";
wp_mail($row->email, $subject, $message, $headers, $attachments);
$sent = wp_mail($to, $subject, $message, $headers, $attachments); 

}

if($sent){
	$link  = site_url().'/donation-thank-you';?>
	<script>window.location.href="<?php echo $link;?>"</script>
	
<?php } ?>

<?php //get_footer();?>
