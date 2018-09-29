
<!DOCTYPE html>
<html>
	<head>
		<title>Backbencher's Shop</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<script>
function startTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('txt').innerHTML =
    h + ":" + m + ":" + s;
    var t = setTimeout(startTime, 500);
}
function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
}
</script>
	</head>
	
		<body onload="startTime()">




		<?php require("menu.php");?>
		<section>
		<h1 style="text-align: center;">Welcome To BackBencher's Shop</h1>
<div style="text-align: center;" id="txt"></div>

		</section>

	<footer><h6 style="text-align: right;margin: 0;padding: 5px 0px;color: silver">Developed by &copy; BackBenchers  </h6></footer>

	</body>
</html>