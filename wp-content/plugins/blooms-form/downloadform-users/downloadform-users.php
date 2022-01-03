<?php
/**
 * Plugin Name:  All User Download Form Data
 * Plugin URI: 
 * Description: All User Download Form Data
 
 * Author: keshav
 * Author Email: rohit@oxeenit.com
 */
 
 add_action('admin_menu','user_email_data');
 function user_email_data(){
	add_menu_page('Download Users Email', 'Download Users Email', 'manage_options', 'emlist','emailuser_list');
}

function emailuser_list(){
	global $wpdb;
	$prefix = $wpdb->prefix;
	if(isset($_GET['action'])){
		switch($_GET['action']){
		   case 'delete': 
						if(isset($_GET['tid']) && $_GET['tid']!=''){
							$delsql="delete from ".$prefix."download_users where user_id={$_GET['tid']}"; 
							$town=$wpdb->query($delsql);
							$link  = admin_url('admin.php').'?page=emlist&msg=delsucc';?>
							<script>window.location.href="<?php echo $link;?>"</script><?php
						}
							break;
						
			default:include("emailuser_list.php");
		}
	}else{ include("emailuser_list.php"); } 
	
}