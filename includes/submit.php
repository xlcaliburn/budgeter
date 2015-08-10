<?php
	include('conn.php');

	$query = mysqli_query($conn, "SELECT MAX(rawgroupid) AS groupid FROM rawdata");
	$row = mysqli_fetch_assoc( $query );
	$groupid = $row['groupid'] + 1;

	foreach(preg_split("/((\r?\n)|(\r\n?))/", $_POST['fileContents']) as $line){
		if ($line != NULL) {
			$split = explode(",",$line);

			$date = date("Y-m-d",strtotime($split[0]));

			$description = str_replace('\'', '\\\'', $split[1]);
			if ($split[2] == ''){$debit = 0;} else {$debit = $split[2];}
			if ($split[3] == ''){$credit = 0;} else {$credit = $split[3];}

			$query = mysqli_query($conn,"INSERT INTO rawdata (userid, date, description, debit, credit, rawgroupid)
					VALUES (1, '".$date."', '".$description."', $debit, $credit, $groupid )");
			if (!$query) {
				die('Invalid query: ' . mysql_error());
			}
		}
	} 
?>