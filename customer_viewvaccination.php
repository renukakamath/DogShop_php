
<?php include 'customerheader.php';
extract($_GET);
?>
 <!-- /services -->
    <div class="agile_secives " id="services">
        <div class="container">
            <h3 class="agileits-title two">view Vaccination</h3>
<center>
	<h1></h1>
	<form>
		<table class="table" style="width: 500px">
			<tr>
				<th>sino</th>
				
				<th>Breed</th>
				<th>gender</th>
				<th>Vaccination Type</th>
				<th>Vaccination Date</th>
				<th>Vaccination Dose</th>
		
			</tr>
			<?php 

     $q="select * from tbl_vaccination inner join tbl_item using (item_id) inner join tbl_breed using (breed_id) inner join tbl_gender using (gender_id) where item_id='$item'";
     $res=select($q);
     $sino=1;

    foreach ($res as $row) {?>
    	<tr>
    		<td><?php echo $sino++; ?></td>
    	
    		<td><?php echo $row['breed_name'] ?></td>
    		<td><?php echo $row['gender_name'] ?></td>
    		
    		<td><?php echo $row['vacc_type'] ?></td>
    		<td><?php echo $row['vacc_date'] ?></td>
    		
    		<td><?php echo $row['vacc_dose'] ?></td>
    		
    		

    	
    		
    		<!-- <td><a href="?did=<?php echo $row['member_id'] ?>">delete</a></td>
    		<td><a href="?uid=<?php echo $row['member_id'] ?>">update</a></td> -->
    	</tr>
    <?php }




			 ?>
		</table>
	</form>
</center>
</div></div>
<?php include 'footer.php' ?>