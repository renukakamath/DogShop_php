<?php include 'customerheader.php';
$cid=$_SESSION['cust_id'];
extract($_GET);



// if (isset($_GET['rid'])) {
//   extract($_GET);


// $q1="update tbl_cartchild  set qty='$qty'-1 where cart_child_id='$rid' ";
// update($q1);

 
// $q2="update tbl_cartmaster set total_amount='$total'-'$totamo' where cart_master_id='$cmid'";
// update($q2);

//  $q="delete from tbl_cartchild where cart_child_id='$rid'";
//   delete($q);

// }

 ?>


 <style>
  * {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
  }
  body {
    height: 100%;
    width: 100vw;
    overflow-x: hidden;
  }
  .product-container {
    width: 70%;
    margin: 20px auto;

  }
  .product-item {
    width: 100%;
    padding: 20px;
    /*border-radius: 10px;*/
    font-family: arial;
    /*box-shadow: 0px 5px 10px 5px rgba(0,0,0,0.25);*/
    border-bottom: 2px solid grey;
    display: flex;
    height: 280px;
    margin-bottom: 20px;
  }
  .product-details {
    padding: 20px;
    display: flex;
    width: 100%;
    flex-direction: column;
    justify-content: space-evenly;
  }
  .product-item img {
    margin-right: 20px;
    width: 300px;
    border-radius: 5px;
    object-fit:cover;
  }
  .btn1{
    padding: 5px 10px;
    background: tomato;
    color: white;
    text-decoration: none;
    border-radius: 5px;
  }     
  form {
    margin-bottom: 25px;
    width: 100%;
    display: flex;
    justify-content: center;
  } 
  input[type="text"] {
    width: 60%;
    padding: 5px 10px;
    border-radius: 5px;
    margin-right: 30px;
  }

  input[type="submit"] {
    padding: 5px 10px;
    background: tomato;
    color: white;
    text-decoration: none;
    border-radius: 5px;
  }
</style>


<h1 align="center">view Cart</h1>
<div class="product-container">
  <form>
 <!--  <input type="text" name="q" >
  <input type="submit" value="Search"> -->
  </form>

   <?php 

     $q="SELECT * FROM `tbl_order` INNER JOIN `tbl_cartmaster` USING (`cart_master_id`) INNER JOIN `tbl_cartchild` USING (cart_master_id) INNER JOIN `tbl_item` USING (item_id) inner join tbl_breed using (breed_id) inner join tbl_gender using (gender_id) where cust_id='$cid' and status='pending'";
     $res=select($q);
     $sino=1;

    foreach ($res as $row) {
      ?>


  <div class="product-item">
    <img src="<?php echo $row['item_image']?>" /> 
            
    <div class="product-details">
   <h4>Breed:<?php echo $row['breed_name']?></h4>
              <h4>Gender:<?php echo $row['gender_name']?></h4>
             
              <h4>Age:<?php echo $row['age']?></h4>
              <h4>Price:<?php echo $row['price']?></h4>
               <h4>Description:<?php echo $row['description']?></h4>
               <h4>Quantity:<?php echo $row['qty'] ?></h4>


             

    </div>


    <style type="text/css">
      
          
    </style>


  </div>
 

             


          <?php 
   }
?>


</div>

 <h4 align="center">ToTal Amount:<?php echo $row['total_amount'] ?>
              <a  class="btn btn-success"href="customer_makepayment.php?oid=<?php echo $row['order_id'] ?>&cmid=<?php echo $row['cart_master_id'] ?>&amo=<?php echo $row['total_amount'] ?>">Buy Now </a></h4>


<?php include 'footer.php' ?>