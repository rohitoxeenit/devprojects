<?php 
$dir = plugin_dir_path( __FILE__ );
global $wpdb;
$prefix = $wpdb->prefix;
$sql = "SELECT  * from  ".$prefix."donations  order by  id desc";
$result = $wpdb->get_results($sql);
$wpdb->num_rows;
?>
<h2>Contact Form </h2>
  
   <table id="example" class="display" style="width:100%">
    <thead>
      <tr>
        <th>Personal Information</th>
       <th>Address</th>
        <th>Address 2</th>
        <th>Country</th>
        <th>Frequency</th>
        <th>Payment Method</th>
        <th>Amount</th>
        <th>Comment</th>
        <th>Created Date</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php 
	  if(count($result) > 0){
		foreach($result as $k=>$v) { 
			   if(is_numeric($k)) {
				   $dellink  = admin_url('admin.php').'/?page=donate-form&action=delete&tid='.$result[$k]->id; ?>
			  <tr>
				<td>
				    <b>Name :</b><?php echo $result[$k]->firstname;?>  <?php echo $result[$k]->lastname;?><br>
				    <b>Email :</b><?php echo $result[$k]->email;?><br>
				    <b>Phone :</b><?php echo $result[$k]->phone;?><br>
				    
				    </td>
			    <td><?php echo $result[$k]->address;?></td>
				<td><?php echo $result[$k]->address2;?></td>
				<td><?php echo $result[$k]->country;?></td>
				
				<td><?php echo $result[$k]->frequency;?></td>
				<td><?php echo $result[$k]->payment_method;?></td>
				<td>$<?php echo $result[$k]->amount;?></td>
				<td><?php echo $result[$k]->comment;?></td>
			
				<td><?php echo $result[$k]->created_at;?></td>
				<td><a href="<?php echo $dellink;?>" onClick="return confirm('Are you sure you want to delete it?');">
				<div class="delbtn"> Delete </div>  </a></td>
				</tr><?php } 
			}
	  }
	  ?>
	
    </tbody>
  </table>
 <?php include('footer.php');?>


