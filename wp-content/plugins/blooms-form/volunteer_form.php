<?php 
$dir = plugin_dir_path( __FILE__ );
global $wpdb;
$prefix = $wpdb->prefix;
$sql = "SELECT  * from  ".$prefix."volunteer_records  order by  volunteer_id desc";
$result = $wpdb->get_results($sql);
$wpdb->num_rows;
?>
<h2>Volunteer Application Form</h2>
  
   <table id="example" class="display" style="width:100%">
    <thead>
      <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Phone No</th>
        <th>interest</th>
        <th>looking to volunteer</th>
        <th>like to volunteer</th>
        <th>Created Date</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php 
	  if(count($result) > 0){
		foreach($result as $k=>$v) { 
			   if(is_numeric($k)) {
				   $dellink  = admin_url('admin.php').'/wp-admin?page=volunteer-form&action=delete&tid='.$result[$k]->volunteer_id; ?>
			  <tr>
				<td><?php echo $result[$k]->volunteer_firstname;?></td>
				<td><?php echo $result[$k]->volunteer_lastname;?></td>
				<td><?php echo $result[$k]->volunteer_emailid;?></td>
				<td><?php echo $result[$k]->volunteer_phoneno;?></td>
				<td><?php $interested = json_decode($result[$k]->volunteer_interests);
							echo implode(',',$interested);?></td>
				<td><?php echo $result[$k]->volunteer_lookingto_volunteer;?></td>
				<td><?php $liketo_volunteer = json_decode($result[$k]->volunteer_liketo_volunteer);
							echo implode(',',$liketo_volunteer);?></td>
				<td><?php echo $result[$k]->volunteer_created;?></td>
				<td><a href="<?php echo $dellink;?>" onClick="return confirm('Are you sure you want to delete it?');">
						<div class="delbtn"> Delete </div>  </a></td>
				</tr><?php } 
			}
	  }
	  ?>
	
    </tbody>
  </table>
 
 <?php include('footer.php');?>

