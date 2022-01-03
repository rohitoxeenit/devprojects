<?php 
$dir = plugin_dir_path( __FILE__ );
global $wpdb;
$prefix = $wpdb->prefix;
$sql = "SELECT  * from  ".$prefix."school_partner_inquiry  order by  id desc";
$result = $wpdb->get_results($sql);
$wpdb->num_rows;
?>
<h2>Partner Inquiry Form</h2>
  
   <table id="example" class="display" style="width:100%">
    <thead>
      <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Phone No</th>
        <th>Organization</th>
        <th>City</th>
        <th>State</th>
        <th>Zip Code</th>
        <th>Age of kids</th>
        <th>Program Intrested</th>
        <th>Type of Learning</th>
        <th>Like to Contracted</th>
        <th>Message</th>
        <th>Created Date</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php 
	  if(count($result) > 0){
		foreach($result as $k=>$v) { 
			   if(is_numeric($k)) {
				   $dellink  = admin_url('admin.php').'/wp-admin?page=partner-inquiry-form&action=delete&tid='.$result[$k]->id; ?>
			  <tr>
				<td><?php echo $result[$k]->firstname;?></td>
				<td><?php echo $result[$k]->lastname;?></td>
				<td><?php echo $result[$k]->email;?></td>
				<td><?php echo $result[$k]->phone;?></td>
				<td><?php echo $result[$k]->organization;?></td>
				<td><?php echo $result[$k]->city;?></td>
				<td><?php echo $result[$k]->state;?></td>
				<td><?php echo $result[$k]->zipcode;?></td>
				<td><?php echo $result[$k]->ageofkids;?></td>
				<td><?php $programintrested = json_decode($result[$k]->programintrested);
							echo implode(',',$programintrested);?></td>
				<td><?php echo $result[$k]->typeof_learning;?></td>
				
				<td><?php $liketocontracted = json_decode($result[$k]->liketocontracted);
							echo implode(',',$liketocontracted);?></td>
				<td><?php echo $result[$k]->message;?></td>
				<td><?php echo $result[$k]->created;?></td>
				<td><a href="<?php echo $dellink;?>" onClick="return confirm('Are you sure you want to delete it?');">
						<div class="delbtn"> Delete </div>  </a></td>
				</tr><?php } 
			}
	  }
	  ?>
	
    </tbody>
  </table>
 
 <?php include('footer.php');?>

