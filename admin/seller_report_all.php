<?php
if (isset($_GET['idview'])) {
    $sellerid = $_GET['idview'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>POS</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="calendar/jquery-ui.css" rel="stylesheet">
<!--    <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/buttons.dataTables.min.css"> -->
</head>
<body>
	<?php require("menu.php");?>
	<section>
		<center>
				<h2 style="text-align: center;margin-bottom: 50px;"> Details</h2>
			
			<form action="" method="post" >
				From:<input id="datepicker"  type="text" style="width: 223px; padding:14px; display: inline-block; margin-top: 40px; margin-bottom: 60px;" name="d1" class ="tcal" required> 
				To:<input id="datepicker1"  type="text" style="width: 223px; padding:14px; display: inline-block; margin-top: 15px;" name="d2" class ="tcal" required>
				<input style="width: 100px; margin-top: 15px; display: inline-block;" type="submit" name="button" value="Search">
			</form>

		</center>

<div id="pdf2htmldiv">
		<table class ="table">

			<tr>
				<th>SL</th>
				<th>Ordernumber</th>
				<th>Date</th>
				<th>Amount</th>
				<th>Action</th>
			</tr>
		

			<?php
			if(isset($_POST['button'])){
				$sallerid =$_SESSION['uid'];
				$from = $_POST['d1'];
				$to = $_POST['d2'];
				$query="SELECT * FROM sale_product WHERE sellerid='$sellerid' AND sale_date >= '$from' AND sale_date <= '$to'";
			 }
			 else{

			 	$query="SELECT * FROM sale_product  WHERE sellerid='$sellerid'";
			 }
			$con = mysqli_connect('localhost', 'root', '', 'dbpos') or die('Database not Found.');

				$exquery = mysqli_query($con,$query);
				$i=0;
				$sum=0;
        while ($result = mysqli_fetch_array($exquery)) {
           $i++;

				?>
				<tr>
					<td><?php echo $i;?></td>
					<td><?php echo $result['voucher_number'];?></td>
					<td><?php echo $result['sale_date'];?></td>
					<td><?php $total_all=$result['total_amount']; echo $total_all;?></td>
					<td><a href="report_detaild.php?detailsid=<?php echo $result['voucher_number'];?>">Details</a></td>
				</tr>
			

				<?php $sum = $sum+$total_all;?>
				<?php }?>


			
			</table>
			<p style="font-weight: bold; text-align: center; margin-left: 50%; margin-top: 0px;">Total Sale: <?php echo $sum; ?> Tk</p>
			</div>
				    <ul><li ><a  href="javascript:pdfToHTML()"> Print</a></li></ul>
			
		</section>
		<footer>
			<footer><h6 style="text-align: right;margin: 0;padding: 5px 0px;color: silver">Developed by &copy; BackBenchers  </h6></footer>
		</footer>
		<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
		<script type="text/javascript" src="calendar/jquery-ui.js"></script>
		<script>
			$( "#datepicker" ).datepicker({
				dateFormat: "dd-mm-yy"
			});
			$( "#datepicker1" ).datepicker({
				dateFormat: "dd-mm-yy"
			});
		</script>
		</script>
		 <script type="text/javascript" src="js/jspdf.js"></script>
   <script type="text/javascript" src="js/jquery-2.1.3.js"></script>
   <script type="text/javascript" src="js/pdfFromHTML.js"></script>
		  <!-- <script type="text/javascript" src="js/jquery-1.12.4.js"></script>
        <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="js/dataTables.buttons.min.js"></script>
        <script type="text/javascript" src="js/buttons.flash.min.js"></script>
        <script type="text/javascript" src="js/jszip.min.js"></script>
        <script type="text/javascript" src="js/pdfmake.min.js"></script>
        <script type="text/javascript" src="js/vfs_fonts.js"></script>
        <script type="text/javascript" src="js/buttons.html5.min.js"></script>
        <script type="text/javascript" src="js/buttons.print.min.js"></script>
        <script>
            $(document).ready(function() {
    $('#table').DataTable( {
        dom: 'Bfrtip',
        buttons: [
           'excel', 'pdf', 'print'
        ]
    } );
} );
        </script>
 -->
	</body>
	</html>