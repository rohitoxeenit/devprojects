<?php 

/* Template Name: Pdf Template*/

get_header();

$pgid = get_the_ID();
// PayPal configuration 
//require_once __DIR__ . '/pdfgen/vendor/autoload.php';
//require_once '/home1/oxeenvpc/public_html/bloomnew/pdfgen/vendor/autoload.php';
//echo  $_SERVER['DOCUMENT_ROOT'];
ob_end_clean();
require_once dirname(__FILE__) .'/pdfgen/vendor/autoload.php';
function  generate_pdf($html = '') {
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
                <td style = "padding:5px;padding-left:20px; text-align: left; text-transform: capitalize;"> shrikant jangid</td>
            </tr>
            <tr>
                <td style = "padding:5px; padding-left:20px; text-align: left;text-transform:capitalize;font-weight:600;">Email-id:</td>
                <td style = "padding:5px; padding-left:20px; text-align: left;">xxyyzz@yahoo.com</td>
            </tr>
            <tr>
                <td style = "padding:5px; text-align: left; padding-left:20px; text-transform:capitalize;font-weight:600;">phone no. :</td>
                <td style = "padding:5px; text-align: left;padding-left:20px;">00336655489</td>
            </tr>
            <tr>
                <td style = "padding:5px; padding-left:20px;text-align: left;text-transform:capitalize;font-weight:600;">address:</td>
                <td style = "padding:1px;padding-left:20px; text-align: left;">address1</td>
            </tr>
            <tr>
                <td></td>
                <td style = "padding:1px;padding-left:20px; text-align: left;">address2</td>
            </tr>
            <tr>
                <td></td>
                <td  style = "padding:1px;padding-left:20px; text-align: left;">country</td>
            </tr>
            <tr>
                <td></td>
                <td style = "padding:1px; padding-left:20px;text-align: left;">state</td>
            </tr>
            <tr>
                <td></td>
                <td style = "padding:1px; padding-left:20px;text-align: left;">city</td>
            </tr>
            <tr>
                <td></td>
                <td style = "padding:1px; padding-left:20px;text-align: left;">zipcode</td>
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
              <td style = "padding:5px;text-align:center;margin:5px;"> Monthly </td>
              <td style = "padding:5px;text-align:right;margin:5px;">$1000</td>
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


	//save the file put which location you need folder/filname
	$mpdf->Output("phpflow1.pdf", 'F');


	//out put in browser below output function
	$mpdf->Output();
}
generate_pdf();



get_footer();
?>