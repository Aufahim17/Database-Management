<!DOCTYPE html>
<html>
<head>
	<title>BackBencher's Shop</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="js/datatables.min.css"/>
</head>
	<body>
		<?php require("menu.php");?>
		<section>
				<h2 style="text-align: center;">Products</h2>
          <?php 
       if (isset($_GET['action'])){
           
           if($_GET['action']=='yes'){
               echo "<span style='display:block;text-align:center; margin:29px; color:green;font-size:18px;'>Data Updated.</span>";
           }
    else {
                echo "<span style='display:block;text-align:center; margin:29px; color:red;font-size:18px;'>Data not Updated.</span>";
        }
       }
    ?>


     <?php
    $con=  mysqli_connect('localhost','root','', 'dbpos') or die ('Database not Found.');
        if(isset($_GET['iddelete'])){
            $delid = $_GET['iddelete'];
            $query = "DELETE FROM g_customer where id='$delid'";
            $delete = mysqli_query($con, $query);
            if($delete){
                echo "<span style='color:green;text-align:center;' >Data Deleted successfully!!</span>";
            } else {
                echo "<span style='color:red;text-align:center;' >Data Not Deleted!!</span>";
            }
        }
    ?>
   
         <table id="table">
                            <thead>
			<tr>
				<th>SL</th>
                <th>G_ID</th>
				<th>Name</th>
				<th>Present Address</th>
                <th>Permanent Address</th>
				<th>Phone</th>
				<th>NID</th>
				<th>Email</th>
                <th>Available Balance</th>
                <th>Total Due</th>
				
				<th width="20%">Action</th>
			</tr>
                            </thead>
                            <tbody>
       <?php
        $acon=  mysqli_connect('localhost','root','', 'dbpos') or die ('Database not Found.');
        $query = "SELECT * From g_customer";
        $result = mysqli_query($acon, $query);
        $i=0;
        while ($row = mysqli_fetch_array($result)) {
           $i++;
       ?> 
		
				<tr>
				                        <td><?php echo $i;?></td>
                                        <td><?php echo $row['g_id'];?></td> 
					                    <td><?php echo $row['name'];?></td>
                                        <td><?php echo $row['present_address'];?></td>
                                        <td><?php echo $row['permanent_address'];?></td>
                                        <td><?php echo $row['phone'];?></td>
                                        <td><?php echo $row['nid'];?></td>
                                        <td><?php echo $row['email'];?></td>
                                        <td><?php echo $row['available_balance'];?></td>
                                        <td><?php echo $row['total_due'];?></td>  
                                        <td>
					<a href="edit_customer.php?idedit=<?php echo $row['g_id'];?>" class="editbutton">Edit ||</a>
					<a onclick="return confirm('Are you sure to delte data?');" href="?iddelete=<?php echo $row['g_id'];?>" class="deletebutton">Delete</a>
                </td>
				</tr>
        <?php } ?>
                             </tbody>
                             <tfoot></tfoot>
			</table>
		</section>
		<footer>
			<footer><h6 style="text-align: right;margin: 0;padding: 5px 0px;color: silver">Developed by &copy; BackBenchers  </h6></footer>
		</footer>
            <script type="text/javascript" src="js/datatables.min.js"></script>
            <script>
                $(document).ready( function () {
                    $('#table').DataTable();
                } );
            </script>
            
	</body>
</html>




                                