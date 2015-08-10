<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Budgeter</title>

	<link rel="stylesheet" href="css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="includes/chartjs/Chart.js"></script>
	<script src="includes/generateGraphs.js"></script>
</head>
<body>
	<div id="page-wrapper">

		<h1>Budgeter_v2</h1>

		<div>
			<?php
				include('includes/conn.php');

				$query = mysqli_query($conn, "SELECT * FROM person");
				if (!$query) {
					die('Invalid query: ' . mysql_error());
				}

				echo "<select name='users'>";
				while ( $row = mysqli_fetch_assoc( $query )) {
					echo "<option value='" . $row['personid'] . "'>" . $row['username'] . "</option>";
				}
				echo "</select>";
			?>
		</div>

		<div>
			Select a text file: 
			<input type="file" id="fileInput">
			<button type="button" id="submit" onclick="submit()">Submit</button>
			<div style="display:none;" id="submitsuccess">Successfully added</div>
		</div>

		<br>
		<pre id="fileDisplayArea"></pre>
				<div id="canvas-holder">
			<canvas id="chart-area" width="500" height="500"/>
		</div>

	</div>

	<script src="includes/parsefile.js"></script>
	<script>
		function submit() {
			// AJAX code to submit form.
			console.log(description);
			$.ajax({
					type: "POST",
					url: "includes/submit.php",
					data: {fileContents: fileContents},
					cache: false,
					success: function(html) {
					$("#submitsuccess").fadeIn(200, function () {
						$("#submitsuccess").fadeOut(1500);
					});     
					
				}
			});
		
			return false;
		}
	</script>

</body>
</html>