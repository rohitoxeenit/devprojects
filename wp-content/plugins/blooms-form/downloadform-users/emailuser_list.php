<?php 
$dir = plugin_dir_path( __FILE__ );
global $wpdb;
$prefix = $wpdb->prefix;
$sql = "SELECT  * FROM  ".$prefix."download_users  ORDER BY user_id DESC";
$result = $wpdb->get_results($sql);
$wpdb->num_rows;
?>
<h2>Users Email ID Who Download PDF's</h2>
  
   <table id="example" class="display" style="width:50%">
    <thead>
      <tr>
        <th>Email ID</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php 
	  if(count($result) > 0)
	  {
		foreach($result as $k=>$v) { 
		
	   if(is_numeric($k)) {
		   $dellink  = admin_url('admin.php').'/wp-admin?page=emlist&action=delete&tid='.$result[$k]->user_id;
	  ?>
      <tr>
		<td><?php echo $result[$k]->user_emailid;?></td>
		<td><a href="<?php echo $dellink;?>" onClick="return confirm('Are you sure you want to delete it?');">
                <div class="delbtn"> Delete </div>  </a></td>
	  </tr>
	<?php } 
	  }
	  }
	  ?>	
    </tbody>
  </table> 
 <?php include('footer.php');?>

