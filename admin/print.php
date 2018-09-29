<?php 
    if(isset($_GET['eid'])){
        $id = $_GET['eid'];
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>BackBencher's Shop</title>
	 <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<?php require("menu.php"); ?>
<section>
<div id="pdf2htmldiv">



<h3  style="text-align: center;margin: 0;padding: 10px 0px;">BackBencher's Shop </h2>
<h5  style="text-align: center;margin: 0;padding: 0px 0px;">House-182, Road-05, Sector-04, Uttara, Dhaka-1230</h5>
<h5  style="text-align: center;margin: 0;padding: 0px 0px;">Phone: 01616165656</h5>
<h5  style="text-align: center;margin: 0;margin-bottom: 50px; padding: 0px 0px;">Email: info.backbenchers@gmail.com</h5>
<p  style=" margin-left: 30px;">Date:  <?php echo date('Y-m-d H:i:s'); ?></p>



            
             
             <!-- <table> -->
             <!-- <tr><th>Info</th></tr>
             <tr><th>Details</th></tr>
 -->
             <?php

$con = mysqli_connect('localhost', 'root', '', 'dbpos') or die('Database not Found.');
 $query2 = "SELECT available_balance,total_due FROM g_customer  WHERE  g_id='$id'"; 
               
               $query2 = mysqli_query($con, $query2);
               $result2=mysqli_fetch_assoc($query2);

               $query = "SELECT * FROM g_customer  WHERE 	g_id='$id'"; 
               
               $query = mysqli_query($con, $query);
               while ($result=mysqli_fetch_assoc($query)) {
                 
               
            ?>
          
            <input type=" " name="eId" value="<?php echo $id;?>" /><br> <br>
               
             	<p  style=" margin-left: 30px;">Date:  <?php echo date('Y-m-d H:i:s'); ?></p>
               <p style="margin-left: 30px;">Name:  <?php echo $result['name'];?></p>
                <p style="margin-left: 30px;">Phone:  <?php echo $result['phone'];?></p>
                <p style="margin-left: 30px;">Total Due:  <?php echo $result['total_due'];?></p>

                <!-- </table> -->
                
                
                

                
<?php } ?>
<center>

	<table class="table">

            <tr>
                <th>SL</th>
                <th>Name</th>
                <th>Unit Price</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
            <?php
        
             $sid = session_id();
             $sallerid =$_SESSION['uid'];
               $con = mysqli_connect('localhost', 'root', '', 'dbpos') or die('Database not Found.');
               $query = "SELECT sales_details.*,products.name FROM sales_details,products WHERE sales_details.sessionid='$sid' AND sales_details.product_id=products.id"; 
               $i=0;
               $query = mysqli_query($con, $query);
              //  if ($query) {
              //      echo "Ok";
              //  }
              //  else{
              // echo  mysqli_error($con);
              //  }
               $sum=0;
               while ($result=mysqli_fetch_assoc($query)) {
                 $i++;  
               
            ?>
            <tr>
                <td><?php echo $i;?></td>
                <td><?php echo $result['name'];?></td>
                <td><?php echo $result['product_price'];?></td>
                <td><?php echo $result['product_quantity'];?></td>
                <td><?php  
               $stotal = $result['product_price'] * $result['product_quantity'];
               echo $stotal;?>
                TK</td>    
            </tr>
          <?php
            $sum = $sum+$stotal;
          

}
            ?>
            <?php
$abl=$result2['available_balance'];
$due=$result2['total_due'];
$tdue=$due+$sum;
$rblnc=$abl-$tdue;
if($rblnc<0)
{
  echo "Sorry! Pay Your Dues..";
}
else
{
  $query = "UPDATE `g_customer` SET `available_balance`='$rblnc',`total_due`='$tdue' WHERE g_id='$id'; ";
                $sucess = mysqli_query($con, $query);

                echo "total due :".$tdue;
}
?>


<!--             <tr>
                <td colspan="4">Total</td>
                <td colspan="2"><?php echo $sum;?>TK</td>
            </tr> -->

                </table>
                </center>
               <h3 style="text-align: center;">Total Amount: <?php echo $sum;?> Tk</h3>

                
                </div>
                

               <form action="add_sale.php" method="POST">
 			  	<input type="hidden" name="customer_id" value="<?php echo $id;?>">
 			  	<input type="hidden" name="total" value="<?php echo $sum;?>">
          
            <button style="height: 70px; width: 120px; border-radius: 8px; background: #bef4ed;"><a style="color: black; font-weight: bold;" href="javascript:pdfToHTML()">Save To Print</a></button>
        
 		 		</form>


 			
</section>
   <footer>
           <footer><h6 style="text-align: right;margin: 0;padding: 5px 0px;color: silver">Developed by &copy; BackBenchers  </h6></footer>
   </footer>
      <script type="text/javascript" src="js/jspdf.js"></script>
   <script type="text/javascript" src="js/jquery-2.1.3.js"></script>
   <script type="text/javascript" src="js/pdfFromHTML.js"></script>


</body>
</html>