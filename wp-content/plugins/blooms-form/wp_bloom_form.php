<?php
/**
 * Plugin Name:  All Bllom Form Data
 * Plugin URI: 
 * Description: All Bllom Form Data
 
 * Author: keshav
 * Author Email: keshav.wowz@gmail.com
 */

 add_action('admin_menu','add_actor_bloom_form');
 add_shortcode("wp_booking_form","wp_booking_form");
 //add_shortcode("wp_saloon_register","wp_saloon_register");
 //add_shortcode("wp_saloon_login","wp_saloon_login");
 
function add_actor_bloom_form(){
	add_menu_page('Teacher Application', 'Teacher Application', 'manage_options', 'blform','show_teacher_application_form');
	add_submenu_page( 'blform', 'Volunteer Form', 'Volunteer Form','manage_options', 'volunteer-form','volunteer_form');
	add_submenu_page( 'blform', 'Partner Inquiry Form', 'Partner Inquiry Form','manage_options', 'partner-inquiry-form','partner_inquiry_form');
	add_submenu_page( 'blform', 'Contact', 'Contact','manage_options', 'contact-form','contact_form');
	add_submenu_page( 'blform', 'Donate', 'Donate','manage_options', 'donate-form','donate_form');
	
}

register_activation_hook( __FILE__, 'myplugin_activate_bl_form' );
function myplugin_activate_bl_form(){
	//include("table.php");
	add_action('init','register_session_custom');
	
}






function register_session_custom(){
    if( !session_id() )
        session_start();
}

function show_teacher_application_form(){
	global $wpdb;
	$prefix = $wpdb->prefix;
	if(isset($_GET['action'])){
		switch($_GET['action']){
		   case 'delete': 
						if(isset($_GET['tid']) && $_GET['tid']!=''){
							$delsql="delete from ".$prefix."teachers_application where id={$_GET['tid']}"; 
							$town=$wpdb->query($delsql);
							$link  = admin_url('admin.php').'?page=blform&msg=delsucc';?>
							<script>window.location.href="<?php echo $link;?>"</script><?php
						}
							break;
						
			default:include("show_teacher_application.php");
		}
	}else{ include("show_teacher_application.php"); } 
}

function volunteer_form(){
	global $wpdb;
	$prefix = $wpdb->prefix;
	if(isset($_GET['action'])){
		switch($_GET['action']){
		
			case 'delete': 
							if(isset($_GET['tid']) && $_GET['tid']!='')
							{
								$delsql="delete from ".$prefix."volunteer_records where volunteer_id={$_GET['tid']}"; 
								$town=$wpdb->query($delsql);
								$link  = admin_url('admin.php').'?page=volunteer-form&msg=delsucc';?>
								<script>window.location.href="<?php echo $link;?>"</script><?php 
							}
							break;
						
			default:include("volunteer_form.php");
		}
	}else{
	
		include("volunteer_form.php");
	} 
}
function partner_inquiry_form(){
	global $wpdb;
	$prefix = $wpdb->prefix;
	if(isset($_GET['action'])){
		switch($_GET['action']){
		
			case 'delete': 
							if(isset($_GET['tid']) && $_GET['tid']!='')
							{
								$delsql="delete from ".$prefix."school_partner_inquiry where id={$_GET['tid']}"; 
								$town=$wpdb->query($delsql);
								$link  = admin_url('admin.php').'?page=partner-inquiry-form&msg=delsucc';?>
								<script>window.location.href="<?php echo $link;?>"</script><?php 
							}
							break;
						
			default:include("partner_inquiry_form.php");
		}
	}else{
	
		include("partner_inquiry_form.php");
	} 
}

function contact_form(){
	global $wpdb;
	$prefix = $wpdb->prefix;
	if(isset($_GET['action'])){
		switch($_GET['action']){
		
			case 'delete': 
							if(isset($_GET['tid']) && $_GET['tid']!='')
							{
								$delsql="delete from ".$prefix."contact where contact_id={$_GET['tid']}"; 
								$town=$wpdb->query($delsql);
								$link  = admin_url('admin.php').'?page=contact-form&msg=delsucc';?>
								<script>window.location.href="<?php echo $link;?>"</script><?php 
								
							}
							break;
						
			default:include("contact_form.php");
		}
	}else{
	
		include("contact_form.php");
	} 
}
function donate_form(){
	global $wpdb;
	if(isset($_GET['action'])){
		switch($_GET['action']){
		
			case 'delete': 
							if(isset($_GET['tid']) && $_GET['tid']!='')
							{
								$delsql="delete from wp_donations where id={$_GET['tid']}"; 
								$town=$wpdb->query($delsql);
								$link  = admin_url('admin.php').'?page=donate-form&msg=delsucc';?>
								<script>window.location.href="<?php echo $link;?>"</script><?php 
							}
							break;
						
			default:include("donate_form.php");
		}
	}else{
	
		include("donate_form.php");
	} 
}








/*function show_solan_staff_member()
{
	global $wpdb;
	if(isset($_GET['action'])){
		switch($_GET['action']){
			case 'edit': 
						
						if(isset($_GET['tid']) && $_GET['tid']!='')
						{
								//require('admin/edit-solan-staff-member.php'); 
						}
						else
						{
							//include("admin/show-solan-staff-member.php");
						}
						break;
			
						
			case 'delete': 
							if(isset($_GET['tid']) && $_GET['tid']!='')
							{
								$delsql="delete from saloon_staff where intSalonStaffID={$_GET['tid']}"; 
								$town=$wpdb->query($delsql);
								$link  = admin_url('admin.php').'/wp-admin?page=staffmember&msg=delsucc';
								wp_redirect($link);
							}
							break;
						
			default:include("admin/show-solan-staff-member.php");
		}
	}else{
	
		//include("admin/show-solan-staff-member.php");
} 
}
*/
?>
