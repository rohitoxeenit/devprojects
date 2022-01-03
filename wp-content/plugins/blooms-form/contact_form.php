<?php 
$dir = plugin_dir_path( __FILE__ );
global $wpdb;
$prefix = $wpdb->prefix;
$sql = "SELECT  * from  ".$prefix."contact  order by  contact_id desc";
$result = $wpdb->get_results($sql);
$wpdb->num_rows;
?>
<h2>Contact Form </h2>
  
   <table id="example" class="display" style="width:100%">
    <thead>
      <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Phone No</th>
        <th>School/Organization</th>
        <th>Topic/Interest</th>
        <th>Message</th>
        <th>Attachment</th>
        <th>Created Date</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php 
	  if(count($result) > 0){
		foreach($result as $k=>$v) { 
			   if(is_numeric($k)) {
				   $dellink  = admin_url('admin.php').'/?page=contact-form&action=delete&tid='.$result[$k]->contact_id; ?>
			  <tr>
				<td><?php echo $result[$k]->contact_firstname;?></td>
				<td><?php echo $result[$k]->contact_secondname;?></td>
				<td><?php echo $result[$k]->contact_emailid;?></td>
				<td><?php echo $result[$k]->contact_phoneno;?></td>
				<td><?php echo $result[$k]->contact_school_org;?></td>
				<td><?php echo $result[$k]->contact_topic_interest;?></td>
				<td><?php echo $result[$k]->contact_message;?></td>
				<td><a download href="<?php echo site_url();?>/wp-content/uploads/2021/12/<?php echo $result[$k]->contact_attachment;?>">Download</a></td>
				<td><?php echo $result[$k]->contact_created;?></td>
				<td><a href="<?php echo $dellink;?>" onClick="return confirm('Are you sure you want to delete it?');">
				<div class="delbtn"> Delete </div>  </a></td>
				</tr><?php } 
			}
	  }
	  ?>
	
    </tbody>
  </table>
 <?php include('footer.php');?>


