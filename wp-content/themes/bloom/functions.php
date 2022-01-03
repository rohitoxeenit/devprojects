<?php
/**
 * Bloom functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Bloom
 * @since Bloom 1.0
 */
/**
 * Bloom only works in WordPress 4.7 or later.
 */
 add_theme_support( 'post-thumbnails' );
 add_post_type_support( 'themes', 'thumbnail' );
 
 /********** Customized Header Menu Implementation ***********/
 // This theme uses wp_nav_menu() in two locations.  
	register_nav_menus( array(  
	'primary' => __( 'Primary Navigation', 'bloom' ),  
	'secondary' => __('Secondary Navigation', 'bloom')  
	) ); 
	
/**
 * Register widget areas.
 *
 * @since Bloom 1.0
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function bloom_sidebar_registration() {

	// Arguments used in all register_sidebar() calls.
	$shared_args = array(
		'before_title'  => '<h2 class="widget-title subheading heading-size-3">',
		'after_title'   => '</h2>',
		'before_widget' => '<div class="widget %2$s"><div class="widget-content">',
		'after_widget'  => '</div></div>',
	);

	// Footer #1.
	register_sidebar(
		array_merge(
			$shared_args,
			array(
				'name'        => __( 'Footer #1', 'bloom' ),
				'id'          => 'sidebar-1',
				'description' => __( 'Widgets in this area will be displayed in the first column in the footer.', 'bloom' ),
			)
		)
	);

	// Footer #2.
	register_sidebar(
		array_merge(
			$shared_args,
			array(
				'name'        => __( 'Footer #2', 'bloom' ),
				'id'          => 'sidebar-2',
				'description' => __( 'Widgets in this area will be displayed in the second column in the footer.', 'bloom' ),
			)
		)
	);
	
	// Footer #3.
	register_sidebar(
		array_merge(
			$shared_args,
			array(
				'name'        => __( 'Footer #3', 'bloom' ),
				'id'          => 'sidebar-3',
				'description' => __( 'Widgets in this area will be displayed in the second column in the footer.', 'bloom' ),
			)
		)
	);
	register_sidebar(
		array_merge(
			$shared_args,
			array(
				'name'        => __( 'Footer #4', 'bloom' ),
				'id'          => 'sidebar-4',
				'description' => __( 'Widgets in this area will be displayed in the second column in the footer.', 'bloom' ),
			)
		)
	);

}

add_action( 'widgets_init', 'bloom_sidebar_registration' );

add_action( 'admin_init', 'hide_editor' );
function hide_editor() {
  $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
  if( !isset( $post_id ) ) return;
  $about = get_the_title($post_id);
  $contact = get_the_title($post_id);
  if($about == 'Donate'){ 
    remove_post_type_support('page', 'editor');
  }
}


/****************** css enque using function ********************/

// Load the theme stylesheets
function custom_theme_styles(){ 
	// Load all of the styles that need to appear on all pages
	wp_enqueue_style( 'main', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' );
	//wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/css/fontawesome_pro.css' );
	wp_enqueue_style( 'custom', get_template_directory_uri() . '/css/style.css' );
	wp_enqueue_style( 'responsive', get_template_directory_uri() . '/css/responsive.css' );
	wp_enqueue_style( 'loading', get_template_directory_uri() . '/loading/loading.css' );
}
add_action('wp_enqueue_scripts', 'custom_theme_styles');

//Load the theme js files
function custom_js_files()
{
	// Load all of the js that need to appear on all pages

	// Load all of the js that need to appear on all pages
	wp_enqueue_script( 'js-min', get_template_directory_uri() . '/js/jquery-3-min.js');
	//wp_enqueue_script( 'js-min', 'https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js');
	wp_enqueue_script( 'js-popper', get_template_directory_uri() . '/js/popper.min');
	wp_enqueue_script( 'js-bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js');
	wp_enqueue_script( 'js-custom', get_template_directory_uri() . '/js/custom.js');
	wp_enqueue_script( 'js-loading', get_template_directory_uri() . '/loading/loading.js');
}
add_action('wp_enqueue_scripts', 'custom_js_files');

/********** Custom Educator Menu Structure ************/
add_action('admin_menu', 'admin_menu_add_external_links_as_submenu');

function admin_menu_add_external_links_as_submenu() {
    global $submenu;
	$menu_slug = "externallink"; 
    $menu_pos = 32; 
	add_menu_page( 'external_link', 'Educator', 'read', $menu_slug, '', '', $menu_pos);
	$submenu[$menu_slug][] = array('Programs', 'manage_options', 'post.php?post=799&action=edit');
    $submenu[$menu_slug][] = array('Music & Movement', 'manage_options', 'post.php?post=800&action=edit');
    $submenu[$menu_slug][] = array('Dance', 'manage_options', 'post.php?post=801&action=edit');
    $submenu[$menu_slug][] = array('Our Teachers', 'manage_options', 'post.php?post=802&action=edit');
    $submenu[$menu_slug][] = array('Pricing', 'manage_options', 'post.php?post=803&action=edit');
    $submenu[$menu_slug][] = array('Next Steps', 'manage_options', 'post.php?post=805&action=edit');
}


function wpse28782_remove_menu_items() {
    //if( !current_user_can( 'administrator' ) ):
        remove_menu_page( 'edit.php?post_type=i_am_educator' );
    //endif;
}
add_action( 'admin_menu', 'wpse28782_remove_menu_items' );

/*********** Form Section Using Ajax****************/
function get_volunteer_form_data() {
	global $wpdb;
	$prefix = $wpdb->prefix;
	if(!empty($_POST['formdata'])){
			parse_str($_POST['formdata'], $formdata);
			$Sql_insert="insert into ".$prefix."volunteer_records set
				volunteer_firstname ='".$formdata['firstname']."',
				volunteer_lastname ='".$formdata['lastname']."',
				volunteer_emailid ='".$formdata['emailid']."',
				volunteer_phoneno ='".$formdata['phone']."',
				volunteer_interests ='".json_encode($formdata['Interests'])."',
				other_Interests ='".$formdata['other_Interests']."',
				volunteer_lookingto_volunteer ='".$formdata['phone']."',
				volunteer_liketo_volunteer ='".json_encode($formdata['liketovolunteer'])."',
				volunteer_created ='".date('Y-m-d')."'
			";
			$result = $wpdb->query($Sql_insert);
			$to = 'testdemo7993@gmail.com';
                        $from = $formdata['emailid'];
                        $subject = $formdata['organization'];
                        $headers = 'From: '. $from . "\r\n" .
                                   'Reply-To: ' . $from . "\r\n";
                        $headers .= "MIME-Version: 1.0\r\n";
                        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                        
                        $body  = $formdata['firstname'].' '.$formdata['lastname'].'<br/>'.$formdata['emailid'].'<br/>'.$formdata['phone'].'<br/>'.json_encode($formdata['Interests']).'<br/>'.$formdata['other_Interests'].'<br/>'.json_encode($formdata['liketovolunteer']);
                        
            wp_mail($to ,$subject,$body,$headers);
            wp_mail($formdata['emailid'] ,$subject,'Thank You. Your Request Submitted',$headers); 
			if($result){
				echo 1;
			}
		}
	wp_die();
}
add_action( 'wp_ajax_nopriv_get_volunteer_form_data', 'get_volunteer_form_data' );
add_action( 'wp_ajax_get_volunteer_form_data', 'get_volunteer_form_data' );


/********** End Here******************************/



/***********Contact Form Section Using Ajax****************/
function get_contact_form_data() {
	global $wpdb;
	$prefix = $wpdb->prefix;

	/*$arr_img_ext = array('image/png', 'image/jpeg', 'image/jpg', 'image/gif');
    if (in_array($_FILES['attachments']['type'], $arr_img_ext)) {
        $attachmentimg = wp_upload_bits($_FILES["attachments"]["name"], null, file_get_contents($_FILES["attachments"]["tmp_name"]));
       
    }*/

     $attachmentimg = wp_upload_bits($_FILES["attachments"]["name"], null, file_get_contents($_FILES["attachments"]["tmp_name"]));
	if(!empty($_POST['formdata'])){
			parse_str($_POST['formdata'], $formdata);
			 $Sql_insert="insert into ".$prefix."contact set
				contact_firstname ='".$formdata['firstname']."',
				contact_secondname ='".$formdata['lastname']."',
				contact_emailid ='".$formdata['emailid']."',
				contact_phoneno ='".$formdata['phone']."',
				contact_school_org ='".$formdata['schoolorg']."',
				contact_topic_interest ='".$formdata['topicinst']."',
				contact_attachment ='".$_FILES["attachments"]["name"]."',
				contact_message ='".$formdata['messagebox']."',				
				contact_created ='".date('Y-m-d')."'
			";
		
			     $to = 'testdemo7993@gmail.com';
                        $from = $formdata['emailid'];
                        $subject = $formdata['topicinst'];
                        $headers = 'From: '. $from . "\r\n" .
                                   'Reply-To: ' . $from . "\r\n";
                        $headers .= "MIME-Version: 1.0\r\n";
                        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                        
                        $body  = $formdata['firstname'].' '.$formdata['lastname'].'<br/>'.$formdata['emailid'].'<br/>'.$formdata['phone'].'<br/>'.$formdata['schoolorg'].'<br/>'.$formdata['topicinst'].'<br/>'.$formdata['messagebox'];
                        
                 wp_mail($to ,$subject,$body,$headers);
                 wp_mail($formdata['emailid'] ,$subject,'Thank You. Your Request Submitted',$headers);           
			$result = $wpdb->query($Sql_insert);
			
			if($result){
				echo 1;
			}
		}
	wp_die();
}
add_action( 'wp_ajax_nopriv_get_contact_form_data', 'get_contact_form_data' );
add_action( 'wp_ajax_get_contact_form_data', 'get_contact_form_data' );


/********** End Here******************************/


/*********** Form Section Using Ajax****************/
function get_teacher_form_data() {
	
	global $wpdb;
	$prefix = $wpdb->prefix;

	/*$arr_img_ext = array('image/png', 'image/jpeg', 'image/jpg', 'image/gif');
    if (in_array($_FILES['inputResume']['type'], $arr_img_ext)) {
        $attachmentimg = wp_upload_bits($_FILES["inputResume"]["name"], null, file_get_contents($_FILES["inputResume"]["tmp_name"]));
        
    }*/
     $attachmentimg = wp_upload_bits($_FILES["inputResume"]["name"], null, file_get_contents($_FILES["inputResume"]["tmp_name"]));

	if(!empty($_POST['formdata'])){
			parse_str($_POST['formdata'], $formdata);
			$Sql_insert="insert into ".$prefix."teachers_application set
				teachers_firstname ='".$formdata['inputFirstName']."',
				teachers_lastname ='".$formdata['inputLastName']."',
				teachers_emailid ='".$formdata['inputEmail1']."',
				teachers_phoneno ='".$formdata['inputPhone']."',
				teachers_are_you_interested ='".json_encode($formdata['inputInterestTeaching'])."',
				inputInterestTeachingOther ='".$formdata['inputInterestTeachingOther']."',
				teachers_age_range ='".json_encode($formdata['inputInterestAgeRange'])."',
				teachers_type_of_job ='".json_encode($formdata['inputJobLooking'])."',
				inputJobLookingOther ='".$formdata['inputJobLookingOther']."',
				teachers_resume_attchement ='".$_FILES["inputResume"]["name"]."',
				teachers_created ='".date('Y-m-d')."'
			";
			$result = $wpdb->query($Sql_insert);
			$to = 'testdemo7993@gmail.com';
                        $from = $formdata['inputEmail1'];
                        $subject = $formdata['inputFirstName'];
                        $headers = 'From: '. $from . "\r\n" .
                                   'Reply-To: ' . $from . "\r\n";
                        $headers .= "MIME-Version: 1.0\r\n";
                        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                        
                        $body  = $formdata['inputFirstName'].' '.$formdata['inputLastName'].'<br/>'.$formdata['inputEmail1'].'<br/>'.$formdata['inputPhone'].'<br/>'.json_encode($formdata['inputInterestTeaching']).'<br/>'.$formdata['inputInterestTeachingOther'].'<br/>'.json_encode($formdata['inputInterestAgeRange']).'<br/>'.json_encode($formdata['inputJobLooking']).'<br/>'.$formdata['inputJobLookingOther'];
                        
            wp_mail($to ,$subject,$body,$headers);
            wp_mail($formdata['inputEmail1'] ,$subject,'Thank You. Your Request Submitted',$headers);       
			if($result){
				echo 1;
			}
		}
	wp_die();
}
add_action( 'wp_ajax_nopriv_get_teacher_form_data', 'get_teacher_form_data' );
add_action( 'wp_ajax_get_teacher_form_data', 'get_teacher_form_data' );


/********** End Here******************************/


function get_partner_inquiry_form_data() {
	global $wpdb;
	

	$prefix = $wpdb->prefix;
	if(!empty($_POST['formdata'])){
			parse_str($_POST['formdata'], $formdata);
			$Sql_insert="insert into ".$prefix."school_partner_inquiry set
				firstname ='".$formdata['firstname']."',
				lastname ='".$formdata['lastname']."',
				email ='".$formdata['emailid']."',
				phone ='".$formdata['phone']."',
				organization ='".$formdata['organization']."',
				city ='".$formdata['city']."',
				state ='".$formdata['state']."',
				zipcode ='".$formdata['zipcode']."',
				ageofkids ='".$formdata['ageofkids']."',
				programintrested ='".json_encode($formdata['programintrested'])."',
				typeof_learning ='".$formdata['typeof_learning']."',
				liketocontracted ='".json_encode($formdata['liketocontracted'])."',
				message ='".$formdata['message']."',
				created ='".date('Y-m-d')."'
			";
			   $result = $wpdb->query($Sql_insert);
               $to = 'testdemo7993@gmail.com';
                        $from = $formdata['emailid'];
                        $subject = $formdata['organization'];
                        $headers = 'From: '. $from . "\r\n" .
                                   'Reply-To: ' . $from . "\r\n";
                        $headers .= "MIME-Version: 1.0\r\n";
                        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                        
                        $body  = $formdata['firstname'].' '.$formdata['lastname'].'<br/>'.$formdata['emailid'].'<br/>'.$formdata['phone'].'<br/>'.$formdata['organization'].'<br/>'.$formdata['city'].'<br/>'.$formdata['state'].'<br/>'.$formdata['zipcode'].'<br/>'.$formdata['ageofkids'].'<br/>'.json_encode($formdata['programintrested']).'<br/>'.$formdata['typeof_learning'].'<br/>'.$formdata['typeof_learning'].'<br/>'.json_encode($formdata['liketocontracted']).'<br/>'.$formdata['message'];
                        
            wp_mail($to ,$subject,$body,$headers);
            wp_mail($formdata['emailid'] ,$subject,'Thank You. Your Request Submitted',$headers);
			if($result){
				echo 1;
			}
		}
	wp_die();
}
add_action( 'wp_ajax_nopriv_get_partner_inquiry_form_data', 'get_partner_inquiry_form_data' );
add_action( 'wp_ajax_get_partner_inquiry_form_data', 'get_partner_inquiry_form_data' );

/********** Donation******************************/

function donation(){
$firstname = $_POST['firstname']; 
$lastname = $_POST['lastname'];
$email = $_POST['email']; 
$phone = $_POST['phone'];
$address = $_POST['address']; 
$address2 = $_POST['address2'];
$country = $_POST['country'];
$state = $_POST['state'];
$city = $_POST['city'];
$zip = $_POST['zip'];
$frequency = $_POST['frequency'];
$comment=  $_POST['comment'];
$checkboxData=  json_encode($_POST['checkboxData']);
global $wpdb;
$prefix = $wpdb->prefix;
$sess = $_SERVER['REMOTE_ADDR'] .' '. $_SERVER['HTTP_USER_AGENT'];       
$insert="insert into ".$prefix."donations set
                session_id ='".$sess."',
				firstname ='".$firstname."',
				lastname ='".$lastname."',
				email ='".$email."',
				phone ='".$phone."',
				address ='".$address."',
				address2 ='".$address2."',
				country ='".$country."',
				state ='".$state."',
				city ='".$city."',
				zip ='".$zip."',
				frequency ='".$frequency."',
				comment ='".$comment."',
				checkboxData ='".$checkboxData."'
			";    
			$result = $wpdb->query($insert);
		    $lastid = $wpdb->insert_id;
// if row inserted in table
if($result){
    echo $lastid;
    //echo json_encode(array('$lastid'=>$lastid,'res'=>true,'message'=>__('success.')));
    
}else{
     echo 0;
    //echo json_encode(array('res'=>false, 'message'=>__('Something went wrong. Please try again later.')));
}
wp_die();
}
add_action( 'wp_ajax_nopriv_donation', 'donation' );
add_action( 'wp_ajax_donation', 'donation' );

function wpb_sender_name( $original_email_from ) {
    return 'Bloom';
}
add_filter( 'wp_mail_from_name', 'wpb_sender_name' );