<?php
if (isset($_GET['detailsid'])) {
    $idr = $_GET['detailsid'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>POS</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="calendar/jquery-ui.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/buttons.dataTables.min.css">
</head>
<body>
	<?php require("menu.php");?>
	<section>

		<h2 style="text-align: center;margin-bottom: 50px;"> Details</h2>
		<table id="table">
		<thead>
			<tr>
				<th>SL</th>
				<th>Name</th>
				<th>Price</th>
				<th>Quentity</th>
				<th>Total</th>
			</tr>
			</thead>
			<tbody>

			<?php


				$query="SELECT sales_details.*,products.* FROM sales_details,products WHERE sales_details.sessionid='$idr' AND sales_details.product_id=products.id"; 
			 

			$con = mysqli_connect('localhost', 'root', '', 'dbpos') or die('Database not Found.');

				$exquery = mysqli_query($con,$query) or die('Somthing went wrong');
				$i=0;
        while ($result = mysqli_fetch_assoc($exquery)) {
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
				<?php }?>
				</tbody>
				<tfoot></tfoot>
			</table>
			
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
			});;
		</script>
						</script>
		  <script type="text/javascript" src="js/jquery-1.12.4.js"></script>
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
            'pdf', 'print'
        ]
    } );
} );
        </script>

	</body>
	</html>