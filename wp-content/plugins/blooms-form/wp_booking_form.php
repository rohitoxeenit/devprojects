<?php 


global $wpdb;


if(!empty($_POST['submitBtn'])){
		$Sql ="insert into ts_buy_rent_invest set 
		f_name = '".$_POST['f_name']."',
		l_name = '".$_POST['l_name']."',
		email = '".$_POST['email']."',
		created_date = '".date('y-m-d')."',
		report_status = '2',
		status = '0'
		";
	$insert = $wpdb->query($Sql);
	$lastid =  $wpdb->insert_id;
if($insert){
$verifyLink = site_url().'/verify?uid='.base64_encode($_POST['email']);

$message = "
<html>
<head>
<title>BUY/ RENT/ INVEST</title>
</head>
<body>
<p>Hello </p>

<p>Please click on below link to verify your email</p>
<p><a href=".$verifyLink.">Click Here</a> </p>

<p>Thanks</p>
<p>Team Tsouthall</p>
</body>
</html>";


//php mailer variables
//$to = get_option('admin_email');
$email = "harshkumar283@gmail.com";
$to = $_POST['email'];
$subject = "BUY/ RENT/ INVEST Notification";
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: '. $email .  "\r\n";
//$headers .= 'Cc: harshkumar382@gmail.com' . "\r\n";
 
 //Here put your Validation and send mail
$sent = wp_mail($to, $subject, $message, $headers);
      if($sent) {
		  $link  = site_url().'/facing-foreclosure?msg=thanks';?>
		  <script> window.location.href = "<?php echo $link;?>"; </script>
		  <?php 
      }
}

}
?>
<style>
form#my_buyers_form {
    border: 1px solid #ccc;
    padding: 20px;
    margin: 30px 0;
    display: flex;
    flex-wrap: wrap;
    box-shadow: 0 5px 5px 0 #00000054;
}
.form-group select {
    width: 100%;
    padding: 10px 15px;
    margin-top: 5px;
    margin-bottom: 16px;
    border: 1px solid #ccc;
}
.form-group {
    padding: 0 15px;
}
.w-50 {
    width: 50%;
}
.form-group input {
    width: 100%;
    padding: 10px 15px;
    margin-top: 5px;
    margin-bottom: 16px;
    border: 1px solid #ccc;}
.mes-cls {color: green; font-size: 23px;}
</style>
<article id="post-761" class="post-761 page type-page status-publish hentry entry">




<?php if(isset($_GET['msg']) && $_GET['msg']=='thanks') {?>
<p class="mes-cls">Thank you, Please verify your email to get the report on your Email id.
</p>
<?php } ?>
<form class="formcls" action="<?php echo site_url()?>/facing-foreclosure" method="post" role="form" novalidate="" id="my_buyers_form">
<div class="form-group w-50">
    <label>First Name:</label>
    <input type="text" name="f_name" class="f-name" id="f-name" required="true" >
</div>
<div class="form-group w-50">
    <label>Last Name:</label>
    <input type="text"  name="l_name" class="l-name" id="l-name" required="true">
</div>
<div class="form-group w-100">
    <label>Email:</label>
    <input type="email" name="email" class="email-cls" id="l-name" required="true">
</div>

	
    <!--<input type="number" name="buy_rent_invest" class="buy-rent-cls" id="buy-rent-cls" required="true">-->
</div>
<div class="form-group w-100 bs">
    
    <input type="submit" class="submit-cls" id="submit-cls" value="Submit" name="submitBtn">
</div>
</form>
</article>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$( document ).ready(function() {
  
		$( "#my_buyers_form" ).submit(function( event ){ //on form submit       
        var proceed = true;
        $("#my_buyers_form input[required=true]").each(function(){
                $(this).css('border-color',''); 
                if(!$.trim($(this).val())){ //if this field is empty 
                    $(this).css('border-color','red'); //change border color to red   
					proceed = false; //set do not proceed flag
				}
				//check invalid email
                var email_reg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/; 
                if($(this).attr("type")=="email" && !email_reg.test($.trim($(this).val()))){
                    $(this).css('border-color','red'); //change border color to red  
					proceed = false; //set do not proceed flag            
                }
               
        });
        if(proceed){
			
			$('#my_buyers_form').submit();
			
				
        }
        event.preventDefault(); 
    });
	$("#my_buyers_form input[required=true],textarea[required=true]").keyup(function() { 
        $(this).css('border-color',''); 
	});
});
</script>