<?php 
$dir = plugin_dir_path( __FILE__ );
global $wpdb;
$prefix = $wpdb->prefix;
$sql = "SELECT  * from  ".$prefix."teachers_application  order by  teachers_id desc";
$result = $wpdb->get_results($sql);
$wpdb->num_rows;
?>
<h2>Teacher Application Form</h2>
  
   <table id="example" class="display" style="width:100%">
    <thead>
      <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Phone No</th>
        <th>interest</th>
        <th>Age Range</th>
        <th>Type of Job</th>
        <th>Resume Attchement</th>
        <th>Created Date</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php 
	  if(count($result) > 0)
	  {
	  foreach($result as $k=>$v) { 
	   if(is_numeric($k)) {
		   
		   $dellink  = admin_url('admin.php').'/wp-admin?page=blform&action=delete&tid='.$result[$k]->teachers_id;
	  ?>
      <tr>
        
		<td><?php echo $result[$k]->teachers_firstname;?></td>
		<td><?php echo $result[$k]->teachers_lastname;?></td>
		<td><?php echo $result[$k]->teachers_emailid;?></td>
		<td><?php echo $result[$k]->teachers_phoneno;?></td>
		<td><?php $interested = json_decode($result[$k]->teachers_are_you_interested);
					echo implode(',',$interested);?></td>
		<td><?php $age_range = json_decode($result[$k]->teachers_age_range);
		echo implode(',',$age_range);
		?></td>
		<td><?php $type_of_job = json_decode($result[$k]->teachers_type_of_job);
		echo implode(',',$type_of_job);?></td>
		
		<td><a download href="<?php echo site_url();?>/wp-content/uploads/2021/12/<?php echo $result[$k]->teachers_resume_attchement;?>">Download<a/></td>
		<td><?php echo $result[$k]->teachers_created;?></td>
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

