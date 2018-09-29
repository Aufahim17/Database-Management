<!DOCTYPE html>
<html>
<head>
	<title>BackBencher's Shop</title>
	 <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<?php require("menu.php"); ?>
<section>
<h2 style="text-align: center;margin-bottom:30px; font-weight: bold;">Customer Information</h2>
 <?php
            if (isset($_POST['button'])) {

                $con = mysqli_connect('localhost', 'root', '', 'dbpos') or die('Database not Found.');
                $name = $_POST['name'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $address = $_POST['address'];
               
                $sid = session_id();

                $query = "INSERT INTO customer(customer_name,customer_email,customer_phone,customer_address,sessionid)VALUES('$name','$email','$phone',' $address','$sid')";
                $sucess = mysqli_query($con, $query);
                if ($sucess) {
                    
                	header("LOCATION:confirm.php");
                } 
                
                    
                    // echo mysqli_error($con);
                
            }
            ?>
            <center>
	         <td><a href="print1.php?eid=<?php echo $result['customer_id'];?>">CASH</a></td>
         </center>

	 <table class="table">
            <tr>
                <th>SL</th>
                <th>Customer ID</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Available</th>
                <th>Action</th>
            </tr>
            <?php
        
             $sid = session_id();
             
           
               $con = mysqli_connect('localhost', 'root', '', 'dbpos') or die('Database not Found.');
               $query = "SELECT * FROM g_customer"; 
               $i=0;
               $query = mysqli_query($con, $query);
               $sum=0;
               while ($result=mysqli_fetch_assoc($query)) {
                 $i++;  
               
            ?>
            <tr>
                <td><?php echo $i;?></td>
                <td><?php echo $result['g_id'];?></td>
                <td><?php echo $result['name'];?></td>
                <td><?php echo $result['phone'];?></td>
                <td><?php echo $result['available_balance'];?></td> 
                  <td><a href="print.php?eid=<?php echo $result['g_id'];?>">GO</a></td>    
            </tr>

            <?php
}
            ?>

                </table>
</section>
   <footer>
            <footer><h6 style="text-align: right;margin: 0;padding: 5px 0px;color: silver">Developed by &copy; BackBenchers  </h6></footer>
   </footer>

</body>
</html>