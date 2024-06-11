<?php include 'adminheader.php';

if (isset($_GET['iid'])) {
    extract($_GET);

    $q="update tbl_login set status='InActive' where username='$iid'";
    update($q);

}
if (isset($_GET['aid'])) {
    extract($_GET);

    $q="update tbl_login set status='Active' where username='$aid'";
    update($q);
}



 ?>
 <!-- /services -->
    <div class="agile_secives " id="services" >
        <div class="container" >
            <h3 class="agileits-title two">view Customer</h3>
       
<center>
	<h1></h1>
	<form>
		<table class="table" style="width: 500px;color: white">
			<tr>
				<th>sino</th>
			   <th>First Name</th>
				<th>Last Name</th>
                 <th>Phone</th>
				<th>House Name</th>
			     <th>Street</th>
				<th>District</th>
              
				<th>Pincode</th>
               
				<th>Date</th>
				
			
			

				
			</tr>
			<?php 

     $q="select * from tbl_customer inner join tbl_login using (username) ";
     $res=select($q);
     $sino=1;

    foreach ($res as $row) {?>
    	<tr>
    		<td><?php echo $sino++; ?></td>
    		<td><?php echo $row['cust_fname'] ?></td>
    		<td><?php echo $row['cust_lname'] ?></td>
    		 <td><?php echo $row['cust_phone'] ?></td>
    		<td><?php echo $row['cust_hname'] ?></td>
            <td><?php echo $row['cust_street'] ?></td>
    		<td><?php echo $row['cust_district'] ?></td>
    	
    		
    		<td><?php echo $row['cust_pincode'] ?></td>
           
    		<td><?php echo $row['cust_date'] ?></td>

    		<?php if ($row['status']=="Active") {
    			?>

            <td><a class="btn btn-success" href="?iid=<?php echo $row['username'] ?>">InActive</a></td>
            

    		<?php 
    		}elseif ($row['status']=="InActive") {
    			?>
    			<td><a class="btn btn-success" href="?aid=<?php echo $row['username'] ?>">Active</a></td>
    		<?php 
    		} ?>

    
    	</tr>
    <?php }




			 ?>
		</table>
	</form>
</center>
 </div></div>
<?php include 'footer.php' ?>