<!DOCTYPE HTML>
<html>
<head>  
<script>
	<?php
        $acon=  mysqli_connect('localhost','root','', 'dbpos') or die ('Database not Found.');
        $query = "SELECT products.*,sub_category.company_name,main_category.maincategory_name FROM products,sub_category,main_category WHERE products.subcategory_id=sub_category.id AND sub_category.category_id=main_category.id";
        $result = mysqli_query($acon, $query);
        ?>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "Best Selling Product"
	},
	axisY: {
		title: "SELLS"
	},
	data: [{        
		type: "column",  
		showInLegend: true, 
		legendMarkerColor: "grey",
		legendText: "TOP 5 PRODUCTS",
		dataPoints: [      
			{ y: 300878, label: " " },
			{ y: 266455,  label: "Saudi" },
			{ y: 169709,  label: "Canada" },
			{ y: 158400,  label: "Iran" },
			{ y: 80000,  label: "Russia" }
		]
	}]
});
chart.render();

}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script type="text/javascript" src="js/canvasjs.min.js"></script>
</body>
</html>